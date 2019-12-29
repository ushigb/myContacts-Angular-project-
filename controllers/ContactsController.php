<?php

class ContactsController extends Controller {

    private $model;

    public function __construct() {
        $this->model = new ContactsModel();
    }
    
    public function save($data) {
        if (empty($data)) {
            return false;
        }
        return $this->model->save($data);
    }

    public function listContacts() {
        return $this->model->listcontacts();
    }

    public function deleteContact($id) {
        return $this->model->delete($id);
    }
    
    }
