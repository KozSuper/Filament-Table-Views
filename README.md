# Table Views Plugin

Một plugin mạnh mẽ và linh hoạt để quản lý và tùy chỉnh hiển thị bảng dữ liệu trong ứng dụng của bạn.

## Tính năng chính

- **Quản lý View linh hoạt**
  - Tạo và lưu các view tùy chỉnh cho bảng dữ liệu
  - Hỗ trợ view mặc định và view được lưu
  - Phân quyền truy cập view (public/private)
  - Đánh dấu view yêu thích

- **Tùy chỉnh hiển thị**
  - Tùy chỉnh cột hiển thị
  - Sắp xếp dữ liệu
  - Lọc và tìm kiếm
  - Phân trang
  - Nhóm dữ liệu

- **Quản lý dữ liệu**
  - CRUD operations (Create, Read, Update, Delete)
  - Hỗ trợ bulk actions
  - Phân quyền chi tiết cho từng thao tác

- **Giao diện**
  - Responsive design
  - Hỗ trợ đa ngôn ngữ (có sẵn tiếng Việt)
  - Tùy chỉnh layout (Dropdown/Modal)
  - Tùy chỉnh kích thước form

## Cài đặt

1. Clone repository này vào thư mục plugins của dự án
2. Chạy `composer install` để cài đặt dependencies
3. Thêm plugin vào cấu hình ứng dụng

## Cấu hình

Plugin hỗ trợ các tùy chọn cấu hình sau:

```php
return [
    'table_views' => [
        'per_page' => 10,
        'default_sort' => 'id',
        'default_order' => 'desc',
        'layout' => 'dropdown', // hoặc 'modal'
        'form_max_height' => '500px',
        'form_width' => 'sm' // xs, sm, md, lg, xl, 2xl, 3xl, 4xl, 5xl, 6xl, 7xl
    ]
];
```

## Sử dụng

### Cơ bản

```php
// Sử dụng trong controller
$table = new TableView();
$table->setData($yourData);
return $table->render();
```

### Nâng cao

- **Tạo view mới**
  - Lưu cấu hình hiện tại thành view mới
  - Tùy chỉnh tên, icon, màu sắc
  - Đặt quyền truy cập (public/private)

- **Quản lý view**
  - Chỉnh sửa view đã lưu
  - Xóa view
  - Đánh dấu view yêu thích
  - Thay thế cấu hình view hiện tại

- **Tùy chỉnh hiển thị**
  - Bật/tắt cột
  - Sắp xếp dữ liệu
  - Lọc theo điều kiện
  - Tìm kiếm toàn bộ hoặc theo cột
  - Phân trang
  - Nhóm dữ liệu

## Hỗ trợ đa ngôn ngữ

Plugin có sẵn hỗ trợ tiếng Việt. Để thêm ngôn ngữ mới:

1. Tạo file ngôn ngữ mới tại `src/lang/{mã_ngôn_ngữ}/table-views.php`
2. Theo cấu trúc tương tự như file ngôn ngữ hiện có

## Phân quyền

Plugin hỗ trợ phân quyền chi tiết cho các thao tác:
- Xem danh sách view
- Tạo view mới
- Chỉnh sửa view
- Xóa view
- Xóa nhiều view
- Khôi phục view đã xóa
- Sao chép view
- Sắp xếp lại view

## Đóng góp

1. Fork repository
2. Tạo branch mới cho tính năng
3. Commit thay đổi
4. Push lên branch
5. Tạo Pull Request

## Giấy phép

Dự án này được cấp phép theo MIT License - xem file LICENSE để biết thêm chi tiết.

## Hỗ trợ

Để được hỗ trợ, vui lòng tạo issue trong GitHub repository. 