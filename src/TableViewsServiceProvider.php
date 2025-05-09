<?php

namespace KozSuper\TableViews;

use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use KozSuper\TableViews\Models\TableView;
use Filament\Support\Facades\FilamentView;
use Filament\Tables\View\TablesRenderHook;
use Spatie\LaravelPackageTools\Package as Pack;
use KozSuper\TableViews\Policies\TableViewPolicy;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class TableViewsServiceProvider extends PackageServiceProvider
{
    public static string $name = 'table-views';

    public static string $viewNamespace = 'table-views';

    public function configurePackage(Pack $package): void
    {
        $package->name(static::$name)
            ->hasViews()
            ->hasTranslations()
            ->hasMigrations([
                '2024_11_19_142134_create_table_views_table',
                '2024_11_21_142134_create_table_view_favorites_table',
            ]);
    }
    // public function configureCustomPackage(Package $package): void
    // {
    //     $package->name(static::$name)
    //         ->isCore()
    //         ->hasViews()
    //         ->hasTranslations()
    //         ->hasMigrations([
    //             '2024_11_19_142134_create_table_views_table',
    //             '2024_11_21_142134_create_table_view_favorites_table',
    //         ])
    //         ->runsMigrations();
    // }

    public function packageBooted(): void
    {
        Gate::policy(TableView::class, TableViewPolicy::class);
    }

    public function packageRegistered()
    {
        FilamentView::registerRenderHook(
            PanelsRenderHook::RESOURCE_PAGES_LIST_RECORDS_TABLE_BEFORE,
            fn(): View => view('table-views::filament.resources.pages.list-records.favorites-views'),
        );

        FilamentView::registerRenderHook(
            PanelsRenderHook::RESOURCE_PAGES_MANAGE_RELATED_RECORDS_TABLE_BEFORE,
            fn(): View => view('table-views::filament.resources.pages.list-records.favorites-views'),
        );

        FilamentView::registerRenderHook(
            TablesRenderHook::TOOLBAR_SEARCH_AFTER,
            fn(): View => view('table-views::filament.tables.table-views'),
        );
    }
}
// class TableViewsServiceProvider extends PackageServiceProvider
// {
//     public static string $name = 'table-views';

//     public static string $viewNamespace = 'table-views';

//     public function configureCustomPackage(Package $package): void
//     {
//         $package->name(static::$name)
//             ->isCore()
//             ->hasViews()
//             ->hasTranslations()
//             ->hasMigrations([
//                 '2024_11_19_142134_create_table_views_table',
//                 '2024_11_21_142134_create_table_view_favorites_table',
//             ])
//             ->runsMigrations();
//     }

//     public function packageBooted(): void
//     {
//         Gate::policy(TableView::class, TableViewPolicy::class);
//     }

//     public function packageRegistered()
//     {
//         FilamentView::registerRenderHook(
//             PanelsRenderHook::RESOURCE_PAGES_LIST_RECORDS_TABLE_BEFORE,
//             fn(): View => view('table-views::filament.resources.pages.list-records.favorites-views'),
//         );

//         FilamentView::registerRenderHook(
//             PanelsRenderHook::RESOURCE_PAGES_MANAGE_RELATED_RECORDS_TABLE_BEFORE,
//             fn(): View => view('table-views::filament.resources.pages.list-records.favorites-views'),
//         );

//         FilamentView::registerRenderHook(
//             TablesRenderHook::TOOLBAR_SEARCH_BEFORE,
//             fn(): View => view('table-views::filament.tables.table-views'),
//         );
//     }
// }