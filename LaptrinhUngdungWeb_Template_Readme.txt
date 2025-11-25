README - ĐỒ ÁN LẬP TRÌNH ỨNG DỤNG WEB

NHÓM: 6
HỌC PHẦN: Lập Trình Ứng Dụng Web
Mã lớp học phần: 251_71ITSE30503_0303
Giảng viên: Ngô Thị Ngọc Thắm

I. THÔNG TIN THÀNH VIÊN

2474802010229 – Đinh Hoàng Mạnh – Nhóm trưởng (Fullstack / Triển khai / Tổng hợp)

2474802010111 – Bùi Thanh Hiếu – Thành viên (Backend / Database / Phân tích)

2474802010531 – Nguyễn Ngọc Quỳnh – Thành viên (Frontend / Tester)
II. MÔ TẢ ĐỀ TÀI

Tên đề tài: XÂY DỰNG HỆ THỐNG WEBSITE QUẢN LÝ SINH VIÊN (STUDENT MANAGEMENT SYSTEM)

Mô tả ngắn:
Website mô phỏng hệ thống quản lý đào tạo thực tế tại trường đại học, sử dụng HTML5, CSS3, JavaScript, PHP thuần và MySQL.
Hệ thống phân quyền 3 vai trò (Admin, Giáo viên, Sinh viên) hỗ trợ các chức năng:

Admin: Quản lý người dùng, lớp học, môn học, phân công giảng dạy.

Giáo viên: Nhập điểm, xem lịch dạy, gửi thông báo.

Sinh viên: Xem điểm số, xem thời khóa biểu, xem thông báo.

III. CÁCH CÀI ĐẶT & CHẠY DỰ ÁN (LOCALHOST - XAMPP)

Cài đặt XAMPP (phiên bản hỗ trợ PHP 8.0 trở lên).

Copy toàn bộ thư mục mã nguồn vào thư mục:
C:/xampp/htdocs/student_management/

Khởi động Apache và MySQL trong XAMPP Control Panel.

Import Database:

Truy cập: http://localhost/phpmyadmin

Tạo database mới tên: student_management

Chọn tab "Import" -> Chọn file: Database/student_management.sql (hoặc file .sql trong source) -> Bấm Go.

Cấu hình kết nối (nếu cần):

Mở file: config.php (hoặc db.php)

Kiểm tra thông số: host=localhost, db=student_management, user=root, pass= (rỗng).

Chạy dự án:
Truy cập trình duyệt: http://localhost/student_management

IV. TÀI KHOẢN ĐĂNG NHẬP (Dữ liệu mẫu)

Quản trị viên (Admin):

User: mạnh

Pass: manh13092006

Giáo viên (Teacher):

User: bảo trân

Pass: baotran123456

Sinh viên (Student):

User: tuấn

Pass: tuan

V. LINK TRIỂN KHAI ONLINE (FREE HOST)

URL: http://studentproject1.infinityfreeapp.com

VI. LINK GITHUB (BẮT BUỘC)

Repo chính (public):
https://www.google.com/search?q=https://github.com/Vahala12/StudentManagement

Nhánh từng sinh viên (Log commit):

SV1 (Mạnh): https://www.google.com/search?q=https://github.com/Vahala12/StudentManagement/tree/manh-database

SV2 (Hiếu): https://www.google.com/search?q=https://github.com/Vahala12/StudentManagement/tree/dev-hieu-teacher

Ghi chú:
=> Mỗi thành viên phải có log commit rõ ràng xuyên suốt 3 tuần.
=> Không có log = không đạt đồ án (theo yêu cầu học phần).

----------------------------------------------------------------------
VII. CẤU TRÚC THƯ MỤC BÀI NỘP
----------------------------------------------------------------------
/SourceCode
    (Toàn bộ mã nguồn website)
    
/Database
    database.sql (script tạo bảng & dữ liệu mẫu)

/Documents
    BaoCao_DoAn_WebApp.pdf
    PhanCongThanhVien.pdf (hoặc nằm trong báo cáo)

/Slides
    SlideThuyetTrinh.pdf hoặc .pptx

/Video (tùy chọn - khuyến khích)
/README.txt

----------------------------------------------------------------------
VIII. GHI CHÚ QUAN TRỌNG
----------------------------------------------------------------------
- Website phải chạy trên XAMPP và free host.
- Database phải import được không lỗi.
- Mã nguồn phải có comment, đặt tên rõ ràng.
- Báo cáo 10–15 trang kèm sơ đồ chức năng + ERD.
- Slide thuyết trình chuẩn bị đúng hạn.
- Đảm bảo mỗi thành viên hiểu phần mình làm.
