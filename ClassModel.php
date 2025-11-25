<?php
require_once __DIR__ . '/../config.php';

class ClassModel {

    /**
     * Lấy danh sách lớp + giáo viên (dùng để hiển thị bảng phân công)
     */
    public static function allWithTeacher() {
    $db = Database::conn();

    $sql = "SELECT 
                c.id,
                c.class_name,
                c.teacher_id,
                t.full_name AS teacher_name
            FROM classes c
            LEFT JOIN teachers t ON t.id = c.teacher_id
            ORDER BY c.id ASC";

    $res = $db->query($sql);

    if (!$res) return [];

    return $res->fetch_all(MYSQLI_ASSOC);
}


    /**
     * Lấy toàn bộ lớp (không join)
     */
    public static function all() {
        $db = Database::conn();

        $sql = "SELECT id, class_name, teacher_id FROM classes ORDER BY id ASC";
        $result = $db->query($sql);
        if (!$result) return [];

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    /**
     * Tìm lớp theo ID
     */
    public static function find($id) {
        $db = Database::conn();

        $stmt = $db->prepare("SELECT id, class_name, teacher_id FROM classes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }


    /**
     * Tạo lớp mới
     */
    public static function create($className) {
        $db = Database::conn();

        $stmt = $db->prepare("INSERT INTO classes (class_name) VALUES (?)");
        $stmt->bind_param("s", $className);

        return $stmt->execute();
    }


    /**
     * Xóa lớp
     */
    public static function delete($id) {
        $db = Database::conn();

        $stmt = $db->prepare("DELETE FROM classes WHERE id = ?");
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }


    /**
     * Gán giáo viên cho lớp
     */
    public static function assignTeacher($classId, $teacherId) {
        $db = Database::conn();

        $stmt = $db->prepare("UPDATE classes SET teacher_id = ? WHERE id = ?");
        $stmt->bind_param("ii", $teacherId, $classId);

        return $stmt->execute();
    }
}
