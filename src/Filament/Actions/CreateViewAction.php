<?php

namespace KozSuper\TableViews\Filament\Actions;

use Filament\Actions\Action;
use Filament\Actions\Concerns\CanCustomizeProcess;
use Filament\Forms;
use Filament\Support\Enums\MaxWidth;
use KozSuper\TableViews\Models\TableView;
use KozSuper\TableViews\Models\TableViewFavorite;

class CreateViewAction extends Action
{
    use CanCustomizeProcess;

    public static function getDefaultName(): ?string
    {
        return 'table_views.save.action';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->model(TableView::class)
            ->form([
                Forms\Components\TextInput::make('name')
                    ->label(__('table-views::filament/actions/create-view.form.name'))
                    ->autofocus()
                    ->required(),
                Forms\Components\Select::make('color')
                    ->label(__('table-views::filament/actions/create-view.form.color'))
                    ->options(function () {
                        return collect([
                            'danger'  => __('table-views::filament/actions/create-view.form.options.danger'),
                            'gray'    => __('table-views::filament/actions/create-view.form.options.gray'),
                            'info'    => __('table-views::filament/actions/create-view.form.options.info'),
                            'success' => __('table-views::filament/actions/create-view.form.options.success'),
                            'warning' => __('table-views::filament/actions/create-view.form.options.warning'),
                        ])->mapWithKeys(function ($value, $key) {
                            return [
                                $key => '<div class="flex items-center gap-4"><span class="flex h-4 w-4 rounded-full" style="background: rgb(var(--' . $key . '-500))"></span> ' . $value . '</span>',
                            ];
                        });
                    })
                    ->native(false)
                    ->allowHtml(),
                \Guava\FilamentIconPicker\Forms\IconPicker::make('icon')
                    ->label(__('table-views::filament/actions/create-view.form.icon'))
                    ->sets(['heroicons'])
                    ->columns(4)
                    ->preload()
                    ->optionsLimit(50),
                Forms\Components\Toggle::make('is_favorite')
                    ->label(__('table-views::filament/actions/create-view.form.add-to-favorites'))
                    ->helperText(__('table-views::filament/actions/create-view.form.add-to-favorites-help')),
                Forms\Components\Toggle::make('is_public')
                    ->label(__('table-views::filament/actions/create-view.form.make-public'))
                    ->helperText(__('table-views::filament/actions/create-view.form.make-public-help')),
            ])->action(function (): void {
                $model = $this->getModel();

                $record = $this->process(function (array $data) use ($model): TableView {
                    $record = new $model;
                    $record->fill($data);

                    $record->save();

                    TableViewFavorite::create([
                        'view_type'       => 'saved',
                        'view_key'        => $record->id,
                        'filterable_type' => $record->filterable_type,
                        'user_id'         => auth()->id(),
                        'is_favorite'     => $data['is_favorite'],
                    ]);

                    return $record;
                });

                $this->record($record);

                $this->success();
            })
            ->successNotificationTitle(__('table-views::filament/actions/create-view.form.notification.created'))
            ->hiddenLabel()
            ->icon('heroicon-o-plus')
            ->iconButton()
            ->slideOver()
            ->modalHeading(__('table-views::filament/actions/create-view.form.modal.title'))
            ->modalWidth(MaxWidth::Medium);
    }
}