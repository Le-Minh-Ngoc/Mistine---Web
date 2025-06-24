<?php
require_once __DIR__ . '/../core/BaseModel.php';
class Category extends BaseModel {
    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM categories ORDER BY LENGTH(id) ASC, id ASC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($data) {
        $stmt = $this->db->prepare('INSERT INTO categories (name, description) VALUES (?, ?)');
        return $stmt->execute([$data['name'], $data['description']]);
    }
    public function getById($id) {
        $stmt = $this->db->prepare('SELECT * FROM categories WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id, $data) {
        $stmt = $this->db->prepare('UPDATE categories SET name=?, description=? WHERE id=?');
        return $stmt->execute([$data['name'], $data['description'], $id]);
    }
    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM categories WHERE id=?');
        return $stmt->execute([$id]);
    }
    public function search($name, $description) {
        $sql = 'SELECT * FROM categories WHERE 1';
        $params = [];
        if ($name) {
            $sql .= ' AND name LIKE ?';
            $params[] = '%' . $name . '%';
        }
        if ($description) {
            $sql .= ' AND description LIKE ?';
            $params[] = '%' . $description . '%';
        }
        $sql .= ' ORDER BY LENGTH(id) ASC, id ASC';
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} 