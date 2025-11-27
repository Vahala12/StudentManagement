<?php
// models/Role.php
require_once 'database.php';

class Role {

    // Lấy tất cả roles (fix lỗi Role::all())
    public static function all() {
        $db = Database::conn();
        $res = $db->query("SELECT * FROM roles ORDER BY id ASC");
        return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    }

    // Tìm role theo tên
    public static function findByName($name) {
        $db = Database::conn();
        $stmt = $db->prepare("SELECT * FROM roles WHERE name = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Tìm role theo ID
    public static function find($id) {
        $db = Database::conn();
        $stmt = $db->prepare("SELECT * FROM roles WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result ? $result->fetch_assoc() : null;
    }
}
