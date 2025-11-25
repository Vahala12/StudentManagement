<?php
require_once __DIR__ . '/database.php';

class Notification
{
    public static function create($student_id, $title, $content)
    {
        $db = Database::conn();

        $stmt = $db->prepare("
            INSERT INTO notifications (student_id, title, content, created_at)
            VALUES (?, ?, ?, NOW())
        ");
        $stmt->bind_param("iss", $student_id, $title, $content);
        return $stmt->execute();
    }

    public static function getByStudent($student_id)
    {
        $db = Database::conn();

        $stmt = $db->prepare("
            SELECT *
            FROM notifications
            WHERE student_id = ?
            ORDER BY id DESC
        ");
        $stmt->bind_param("i", $student_id);
        $stmt->execute();
        
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public static function all()
    {
        $db = Database::conn();
        $result = $db->query("SELECT * FROM notifications ORDER BY id DESC");
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public static function delete($id)
    {
        $db = Database::conn();

        $stmt = $db->prepare("DELETE FROM notifications WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
