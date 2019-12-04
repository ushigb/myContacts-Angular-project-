<?php

class ContactsModel
{
    private $db;

    public function __construct()
    {
        $db = new Database();
        $this->db = $db->getDB();
        
    }

//    public function getContacts($user_id = '', $myContacts_id = ''){       
//        $result = false;        
//        if (!empty($user_id)) {
//            $sql = "SELECT c.id AS id, c.name, c.phone, c.email FROM users AS u 
//            JOIN mycontacts AS c ON c.user_id = u.id WHERE c.user_id = :user_id";
//            $stmt = $this->db->prepare($sql);            
//            $stmt->execute([':user_id' => $user_id]);            
//            try {
//                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//            } catch(Exception $e) {
//                $result = false;
//                $_SESSION['error'] = $e->getMessage();
//            }
//        } else if(!empty($myContacts_id)){
//            $sql = "SELECT c.id AS id, c.name, c.phone, c.email FROM users AS u
//            JOIN mycontacts AS c ON c.user_id = u.id WHERE c.id = :contact_id";
//            $stmt = $this->db->prepare($sql);
//            $stmt->execute([':contact_id' => $myContacts_id]);            
//            try {
//                $result = $stmt->fetch(PDO::FETCH_ASSOC);
//            } catch(Exception $e) {
//                $result = false;
//                $_SESSION['error'] = $e->getMessage();
//            }    
//        }        
//        return $result;        
//    }
    
    public function listContacts()
    {
        $sql = "SELECT * FROM `mycontacts` WHERE user_id =" . $_SESSION['user']['id'];
            $stmt = $this->db->prepare($sql);
            $stmt->execute();            
            try {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(Exception $e) {
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
            ':user_id'=> $_SESSION['user']['id']
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