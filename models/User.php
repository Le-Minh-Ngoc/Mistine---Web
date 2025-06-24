<?php
require_once __DIR__ . '/../core/BaseModel.php';
class User extends BaseModel {
    public function login($username, $password) {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
        $stmt->execute([$username, md5($password)]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getByUsername($username) {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updatePassword($id, $newpass) {
        $stmt = $this->db->prepare('UPDATE users SET password = ? WHERE id = ?');
        return $stmt->execute([md5($newpass), $id]);
    }
    public function createUser($username, $password, $address = null, $birthday = null, $avatar = null) {
        $stmt = $this->db->prepare('INSERT INTO users (username, password, address, birthday, avatar) VALUES (?, ?, ?, ?, ?)');
        return $stmt->execute([$username, md5($password), $address, $birthday, $avatar]);
    }
    public function updateInfo($id, $address, $birthday, $avatar = null) {
        if ($avatar === null) {
            $stmt = $this->db->prepare('UPDATE users SET address = ?, birthday = ? WHERE id = ?');
            return $stmt->execute([$address, $birthday, $id]);
        } elseif ($avatar) {
            $stmt = $this->db->prepare('UPDATE users SET address = ?, birthday = ?, avatar = ? WHERE id = ?');
            return $stmt->execute([$address, $birthday, $avatar, $id]);
        } else {
            $stmt = $this->db->prepare('UPDATE users SET address = ?, birthday = ? WHERE id = ?');
            return $stmt->execute([$address, $birthday, $id]);
        }
    }
} 