<?php
require_once __DIR__ . '/database.php';

class Teacher
{
    /* ===========================================
        LẤY TẤT CẢ GIÁO VIÊN
    ============================================ */
    public static function all()
    {
        $db = Database::conn();
        $sql = "SELECT * FROM teachers ORDER BY id DESC";
        $res = $db->query($sql);
        return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    }

    /* ===========================================
        TÌM GIÁO VIÊN THEO ID
    ============================================ */
    public static function find($id)
    {
        $db = Database::conn();
        $stmt = $db->prepare("SELECT * FROM teachers WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    /* ===========================================
        TẠO GIÁO VIÊN – CHUẨN
        1. Tạo user trong bảng users
        2. Lấy user_id
        3. Tạo teacher liên kết user_id
    ============================================ */
    public static function create($full_name, $email)
    {
        $db = Database::conn();

        // 1. Tạo user trước
        $username = explode("@", $email)[0]; // tự tạo username từ email
        $password = password_hash("123456", PASSWORD_DEFAULT);
        $role_id = 2; // 2 = teacher

        $stmt = $db->prepare("
            INSERT INTO users (username, password, email, role_id)
            VALUES (?, ?, ?, ?)
        ");
        $stmt->bind_param("sssi", $username, $password, $email, $role_id);

        if (!$stmt->execute()) {
            return false;
        }

        // Lấy user_id vừa tạo
        $user_id = $db->insert_id;

        // 2. Tạo teacher
        $stmt2 = $db->prepare("
            INSERT INTO teachers (user_id, full_name, email, department_id)
            VALUES (?, ?, ?, NULL)
        ");
        $stmt2->bind_param("iss", $user_id, $full_name, $email);

        return $stmt2->execute();
    }

    /* ===========================================
        CẬP NHẬT GIÁO VIÊN
    ============================================ */
    public static function update($id, $full_name, $email)
    {
        $db = Database::conn();
        $stmt = $db->prepare("
            UPDATE teachers
            SET full_name = ?, email = ?
            WHERE id = ?
        ");
        $stmt->bind_param("ssi", $full_name, $email, $id);
        return $stmt->execute();
    }

    /* ===========================================
        XÓA GIÁO VIÊN + XÓA USER
    ============================================ */
    public static function delete($id)
    {
        $db = Database::conn();

        // Lấy user_id
        $teacher = self::find($id);
        $user_id = $teacher["user_id"];

        // Xóa giáo viên
        $stmt = $db->prepare("DELETE FROM teachers WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        // Xóa user liên quan
        $stmt2 = $db->prepare("DELETE FROM users WHERE id = ?");
        $stmt2->bind_param("i", $user_id);
        return $stmt2->execute();
    }

    /* ===========================================
        GÁN GIÁO VIÊN CHO LỚP
    ============================================ */
    public static function assignToClass($teacher_id, $class_id)
    {
        $db = Database::conn();

        $db->query("
            CREATE TABLE IF NOT EXISTS teacher_class (
                id INT AUTO_INCREMENT PRIMARY KEY,
                teacher_id INT NOT NULL,
                class_id INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ");

        $check = $db->prepare("
            SELECT * FROM teacher_class WHERE teacher_id = ? AND class_id = ?
        ");
        $check->bind_param("ii", $teacher_id, $class_id);
        $check->execute();

        if ($check->get_result()->num_rows > 0) {
            return false;
        }

        $stmt = $db->prepare("
            INSERT INTO teacher_class (teacher_id, class_id)
            VALUES (?, ?)
        ");
        $stmt->bind_param("ii", $teacher_id, $class_id);
        return $stmt->execute();
    }

    /* ===========================================
        LẤY LỚP GIÁO VIÊN ĐANG DẠY
    ============================================ */
    public static function getAssignedClasses($teacher_id)
    {
        $db = Database::conn();

        $sql = "
            SELECT c.id, c.class_name
            FROM teacher_class tc
            JOIN classes c ON tc.class_id = c.id
            WHERE tc.teacher_id = ?
        ";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $teacher_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
