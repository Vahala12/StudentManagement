<?php
require_once __DIR__ . '/../config.php';

class Score
{
    // Lấy tất cả điểm + tên sinh viên
    public static function all()
    {
        $db = Database::conn();
        $sql = "SELECT scores.*, students.full_name AS student_name
                FROM scores
                JOIN students ON students.id = scores.student_id";

        $result = $db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Tạo điểm mới
    public static function create($student_id, $subject, $midterm, $final)
    {
        $db = Database::conn();
        $sql = "INSERT INTO scores (student_id, subject, midterm, final, created_at)
                VALUES (?, ?, ?, ?, NOW())";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("isdd", $student_id, $subject, $midterm, $final);
        return $stmt->execute();
    }

    // Lấy điểm theo ID
    public static function find($id)
    {
        $db = Database::conn();
        $sql = "SELECT * FROM scores WHERE id = ? LIMIT 1";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // Cập nhật điểm
    public static function update($id, $subject, $midterm, $final)
    {
        $db = Database::conn();
        $sql = "UPDATE scores
                SET subject = ?, midterm = ?, final = ?
                WHERE id = ?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("sddi", $subject, $midterm, $final, $id);
        return $stmt->execute();
    }

    // Xóa điểm
    public static function delete($id)
    {
        $db = Database::conn();
        $sql = "DELETE FROM scores WHERE id = ?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Lấy điểm theo sinh viên
    public static function byStudent($student_id)
    {
        $db = Database::conn();
        $sql = "SELECT * FROM scores WHERE student_id = ?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $student_id);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
