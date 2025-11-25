<?php
// models/Student.php
require_once 'database.php';

class Student {

    // ===== CREATE (đã sửa đúng số cột) =====
    public static function create($user_id, $full_name, $student_code, $class_name, $major, $dob, $phone, $address) {
        $db = Database::conn();
        $stmt = $db->prepare("
            INSERT INTO students 
            (user_id, full_name, student_code, class_name, major, dob, phone, address, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())
        ");
        $stmt->bind_param("isssssss", $user_id, $full_name, $student_code, $class_name, $major, $dob, $phone, $address);
        return $stmt->execute();
    }

    public static function all() {
        $db = Database::conn();
        $res = $db->query("SELECT s.*, u.username FROM students s LEFT JOIN users u ON s.user_id = u.id ORDER BY s.id DESC");
        return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    }

    public static function findByUserId($user_id) {
        $db = Database::conn();
        $stmt = $db->prepare("SELECT * FROM students WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function find($id) {
        $db = Database::conn();
        $stmt = $db->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function update($id, $full_name, $student_code, $class_name, $major, $dob, $phone, $address) {
        $db = Database::conn();
        $stmt = $db->prepare("
            UPDATE students 
            SET full_name=?, student_code=?, class_name=?, major=?, dob=?, phone=?, address=? 
            WHERE id = ?
        ");
        $stmt->bind_param("sssssssi", $full_name, $student_code, $class_name, $major, $dob, $phone, $address, $id);
        return $stmt->execute();
    }

    public static function delete($id) {
        $db = Database::conn();
        $stmt = $db->prepare("DELETE FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // ===== FIND BY NAME =====
    public static function findByName($name) {
        $db = Database::conn();
        $stmt = $db->prepare("SELECT * FROM students WHERE full_name = ? LIMIT 1");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
