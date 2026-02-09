# ------------------------------------------------------------------

# Mô tả về website Fruité Garden:

Fruité Garden là một website thương mại điện tử bán thực phẩm và trái cây trực tuyến,
được xây dựng theo mô hình Fullstack với: - Frontend: ReactJS - Backend: PHP Laravel (RESTful API) - Database: MySQL

Dự án website được thực hiện nhằm học tập và rèn luyện kỹ năng lập trình về Frontend, Backend, API, Database,
và mục tiêu mong muốn là xây dựng được một ứng dụng web thực tế, từ giao diện người dùng, xử lý dữ liệu phía client
đến thiết kế API và cơ sở dữ liệu phía server.

# ------------------------------------------------------------------

# Chức năng chỉnh của hệ thống:

Đối với Người dùng (Khách hàng) có các chức năng như:

- Đăng ký, đăng nhập, đăng xuất
- Xem danh sách sản phẩm
- Xem sản phẩm theo danh mục
- Tìm kiếm sản phẩm
- Lọc sản phẩm theo khoảng giá
- Xem chi tiết sản phẩm
- Thêm sản phẩm vào giỏ hàng
- Tăng / giảm số lượng sản phẩm trong giỏ hàng
- Xóa sản phẩm khỏi giỏ hàng
- Đặt hàng (Checkout)

Đối với Quản trị viên (Admin) có các chức năng cơ bản như:

- Quản lý danh mục sản phẩm (Thêm/Sửa/Xóa)
- Quản lý sản phẩm (Thêm/Sửa/Xóa)
- Xem danh sách đơn đặt hàng
- Chi tiết đơn đặt hàng
- Xử lý đơn đặt hàng

# ------------------------------------------------------------------

# Công nghệ sử dụng:

Frontend: - ReactJS - React Router DOM - Redux Toolkit - Axios - SCSS

Backend: - PHP Laravel - RESTful API

Database: - MySQL

# ------------------------------------------------------------------

# Cơ sở dữ liệu:

Bao gồm các bảng dữ liệu chính: - users - categories - products - orders - order_details
Ngoài ra còn có: - cart - cart_items (dùng để lưu trữ tạm thời giỏ hàng cho khách hàng)

# ------------------------------------------------------------------

# Hướng dẫn chạy dự án Fruité Garden:

\*\*\*Đối với Backend (PHP Laravel):

git clone https://github.com/PhiPham0101/fruite_garden_backend.git
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

\*\*\*Đối với Frontend (ReactJS):

git clone https://github.com/PhiPham0101/fruite_garden_frontend.git
cd frontend
npm install
npm start

\*\*\*Tài khoản demo:
User:
Email: ppham@gmail.com
Password: 123456

Admin:
Email: admin@gmail.com
Password: 123456

# Hạn chế & hướng phát triển

- Chưa tích hợp thanh toán online
- Phân quyền người dùng còn đơn giản
- Có thể cải thiện UI/UX và tối ưu hiệu năng.

# Thông tin khác:

GitHub: https://github.com/PhiPham0101/
