<?php
require_once 'database.php';

class Timetable
{
    // ============================
    // LẤY TKB THEO HỌC SINH
    // ============================
    public static function forStudent($student_id)
    {
        $db = Database::conn();

        $stmt = $db->prepare("
            SELECT *
            FROM timetables
            WHERE student_id = ?
            ORDER BY day_of_week ASC, time_range ASC
        ");

        $stmt->bind_param("i", $student_id);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // ============================
    // LẤY TKB THEO LỚP
    // ============================
    public static function forClass($class_name)
    {
        $db = Database::conn();

        $stmt = $db->prepare("
            SELECT *
            FROM timetables
            WHERE class_name = ?
            ORDER BY day_of_week ASC, time_range ASC
        ");

        $stmt->bind_param("s", $class_name);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // ============================
    // GIÁO VIÊN / ADMIN THÊM TKB
    // ============================
    public static function create($class_name, $day_of_week, $subject, $time_range, $room)
    {
        $db = Database::conn();

        $stmt = $db->prepare("
            INSERT INTO timetables (student_id, class_name, subject, day_of_week, time_range, room, created_at)
            VALUES (NULL, ?, ?, ?, ?, ?, NOW())
        ");

        $stmt->bind_param("sssss", $class_name, $subject, $day_of_week, $time_range, $room);

        return $stmt->execute();
    }

    // ============================
    // XÓA 1 BUỔI HỌC
    // ============================
    public static function delete($id)
    {
        $db = Database::conn();

        $stmt = $db->prepare("
            DELETE FROM timetables WHERE id = ?
        ");
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    // ============================
    // LẤY TKB THEO ID (để update nếu cần)
    // ============================
    public static function find($id)
    {
        $db = Database::conn();

        $stmt = $db->prepare("SELECT * FROM timetables WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // ============================
    // CẬP NHẬT TKB
    // ============================
    public static function update($id, $class_name, $day_of_week, $subject, $time_range, $room)
    {
        $db = Database::conn();

        $stmt = $db->prepare("
            UPDATE timetables
            SET class_name = ?, subject = ?, day_of_week = ?, time_range = ?, room = ?
            WHERE id = ?
        ");

        $stmt->bind_param("sssssi", $class_name, $subject, $day_of_week, $time_range, $room, $id);

        return $stmt->execute();
    }
}
