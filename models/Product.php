<?php
require_once __DIR__ . '/../core/BaseModel.php';
class Product extends BaseModel {
    public function getAll() {
        $stmt = $this->db->query('SELECT p.*, c.name as category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id ORDER BY LENGTH(p.id) ASC, p.id ASC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id) {
        $stmt = $this->db->prepare('SELECT p.*, c.name as category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE p.id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($data) {
        $stmt = $this->db->prepare('INSERT INTO products (code, name, category_id, price, stock, status, description, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        return $stmt->execute([$data['code'], $data['name'], $data['category_id'], $data['price'], $data['stock'], $data['status'], $data['description'], $data['image']]);
    }
    public function update($id, $data) {
        $stmt = $this->db->prepare('UPDATE products SET code=?, name=?, category_id=?, price=?, stock=?, status=?, description=?, image=?, sold=? WHERE id=?');
        return $stmt->execute([$data['code'], $data['name'], $data['category_id'], $data['price'], $data['stock'], $data['status'], $data['description'], $data['image'], $data['sold'], $id]);
    }
    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM products WHERE id=?');
        return $stmt->execute([$id]);
    }
    public function search($name, $description) {
        $sql = 'SELECT p.*, c.name as category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE 1';
        $params = [];
        if ($name) {
            $sql .= ' AND p.name LIKE ?';
            $params[] = '%' . $name . '%';
        }
        if ($description) {
            $sql .= ' AND p.description LIKE ?';
            $params[] = '%' . $description . '%';
        }
        $sql .= ' ORDER BY LENGTH(p.id) ASC, p.id ASC';
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllPublic() {
        $stmt = $this->db->prepare('SELECT * FROM products ORDER BY created_at DESC');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getByCategory($category_id) {
        $stmt = $this->db->prepare('SELECT * FROM products WHERE category_id = ? ORDER BY created_at DESC');
        $stmt->execute([$category_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getFeatured($limit = 4) {
        $sql = "SELECT * FROM products WHERE status='active' ORDER BY sold DESC LIMIT ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} 