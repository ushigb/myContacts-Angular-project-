<?php

class ContactsModel {

    private $db;

    public function __construct() {
        $db = new Database();
        $this->db = $db->getDB();
    }

    public function listContacts() {
        $sql = "SELECT * FROM `mycontacts` WHERE user_id =" . $_SESSION['user']['id'];
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        try {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $result = false;
            $_SESSION['error'] = $e->getMessage();
        }
        return $result;
    }

    public function save($data) {
        $sql = "INSERT INTO `mycontacts` (`name`, `phone`, `email`, `user_id`) VALUES (:name, :phone, :email, :user_id)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
                    ':name' => $data['name'],
                    ':phone' => $data['phone'],
                    ':email' => $data['email'],
                    ':user_id' => $_SESSION['user']['id']
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM `mycontacts` WHERE `id` = :contact_id";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
                    ':contact_id' => $id
        ]);
    }
}
