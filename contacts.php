<?php

//require_once "services/database.php";
require_once "boot.php";

$request_method = $_SERVER['REQUEST_METHOD'];
$query = $_SERVER['QUERY_STRING'];
$query_array = explode("&", $query);

$user = '';
$myContacts_id = '';
$params = [];

if (!empty($query_array[0])) {
    foreach ($query_array AS $param) {
        $exp = explode("=", $param);
        $params[$exp[0]] = $exp[1];
    }
}

if (isset($params['user'])) {
    $user = $params['user'];
}

if (isset($params['contact_id'])) {
    $myContacts_id = $params['contact_id'];
}

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


function editContact() {
    global $contactsController;

    if (!$contactsController->editContact($_GET['id'])) {
        return http_response_code(400);
    }

    return http_response_code(200);
}