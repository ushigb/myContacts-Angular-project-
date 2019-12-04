<?php

class ContactsController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new ContactsModel();
    }

    public function getContacts($user_id = '')
    {
         if (empty($user_id)) {
             $user_id = $_SESSION['user']['id'];
         }

        return $this->model->getContacts($user_id, '');
    }

    public function getContact($myContacts_id = '')
    {

        if (isset($_GET['show_contact']))
        {
            $myContacts_id = $_GET['show_contact'];
        }

        return $this->model->getContacts('', $myContacts_id);
    } 

    public function save($data) {
                if (empty($data)) {
            return false;
        }

        return $this->model->save($data);
    }
    

    public function listContacts()
    {
        return $this->model->listcontacts();
    }

    public function deleteContact($id) {
        return $this->model->delete($id);
    }
    
    public function editContacts($id) {
        return $this->model->edit($id);
    }
}