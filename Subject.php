<?php
require_once __DIR__ . '/database.php';

class Subject {

    public static function all() {
        $db = Database::conn();
        $sql = "SELECT * FROM subjects";
        $res = $db->query($sql);
        return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    }

    public static function create($name) {
        $db = Database::conn();
        $stmt = $db->prepare("INSERT INTO subjects (name) VALUES (?)");
        $stmt->bind_param("s", $name);
        return $stmt->execute();
    }

    public static function delete($id) {
        $db = Database::conn();
        $stmt = $db->prepare("DELETE FROM subjects WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
