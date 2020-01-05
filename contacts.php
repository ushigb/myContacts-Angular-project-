<?php

require_once "boot.php";
$request_method = $_SERVER['REQUEST_METHOD'];

$contactsController = new ContactsController();
$contacts = [];
header("Content-Type: application/json;charset=utf-8");
switch ($request_method) {
    case 'POST':
        echo save();
        break;
    case 'PUT':
        echo "put";
        break;
    case 'DELETE':
        deleteContact();
        break;
    case 'GET':
        echo getContacts();
        break;
    default:
        die("No Contact");
        break;
}

function save() {
    global $contactsController;
    $post = json_decode(file_get_contents('php://input'), 1);
    $result = $contactsController->save($post);
    if (!$result) {
        return http_response_code(400);
    }
    return json_encode($result);
}

function getContacts() {
    global $contactsController;
    global $user;
    global $myContacts_id;
    $result = [];
    if (!empty($user)) {
        $result = $contactsController->getContacts('', $user);
    } else if (!empty($myContacts_id)) {
        $result = $contactsController->getContact($myContacts_id);
    } else {
        $result = $contactsController->listContacts();
    }
    return json_encode($result);
}

function deleteContact() {
    global $contactsController;

    if (!$contactsController->deleteContact($_GET['id'])) {

        return http_response_code(400);
    }
    return json_encode();
}


