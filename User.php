<?php
// models/User.php
require_once __DIR__ . '/database.php';

class User
{
    /* ----------------------------------------------------
        LẤY USER THEO USERNAME
    ----------------------------------------------------- */
    public static function findByUsername($username)
    {
        $db = Database::conn();

        $stmt = $db->prepare("
            SELECT  u.*, 
                    r.name AS role_name
            FROM users u
            JOIN roles r ON u.role_id = r.id
            WHERE u.username = ?
            LIMIT 1
        ");

        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        return $result;
    }

    /* ----------------------------------------------------
        LẤY USER THEO ID
    ----------------------------------------------------- */
    public static function findById($id)
    {
        $db = Database::conn();

        $stmt = $db->prepare("
            SELECT  u.*, 
                    r.name AS role_name
            FROM users u
            JOIN roles r ON u.role_id = r.id
            WHERE u.id = ?
            LIMIT 1
        ");

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        return $result;
    }

    /* ----------------------------------------------------
        LẤY TẤT CẢ USER
    ----------------------------------------------------- */
    public static function all()
    {
        $db = Database::conn();

        $sql = "
            SELECT  u.id,
                    u.username,
                    u.email,
                    r.name AS role_name,
                    u.created_at
            FROM users u
            JOIN roles r ON u.role_id = r.id
            ORDER BY u.id DESC
        ";

        $res = $db->query($sql);

        return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    }

    /* ----------------------------------------------------
        ĐẾM SỐ USER
    ----------------------------------------------------- */
    public static function countUsers()
    {
        $db = Database::conn();
        $res = $db->query("SELECT COUNT(*) AS total FROM users");

        return $res ? $res->fetch_assoc()['total'] : 0;
    }

    /* ----------------------------------------------------
        TẠO USER MỚI
    ----------------------------------------------------- */
    public static function create($username, $password, $email, $role_id)
    {
        $db = Database::conn();

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $db->prepare("
            INSERT INTO users (username, password, email, role_id)
            VALUES (?, ?, ?, ?)
        ");

        $stmt->bind_param("sssi", $username, $hash, $email, $role_id);

        $success = $stmt->execute();
        $stmt->close();

        return $success;
    }

    /* ----------------------------------------------------
        XÓA USER
    ----------------------------------------------------- */
    public static function delete($id)
    {
        $db = Database::conn();

        $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);

        $success = $stmt->execute();
        $stmt->close();

        return $success;
    }

    /* ----------------------------------------------------
        KIỂM TRA ĐĂNG NHẬP
    ----------------------------------------------------- */
    public static function attempt($username, $plainPassword)
    {
        $user = self::findByUsername($username);

        if (!$user) {
            return false;
        }

        if (password_verify($plainPassword, $user['password'])) {
            return $user;    // bao gồm role_name
        }

        return false;
    }
}
