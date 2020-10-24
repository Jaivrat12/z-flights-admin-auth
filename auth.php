<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

$_POST = json_decode(file_get_contents('php://input'), true);

if(isset($_POST) && !empty($_POST)) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin' && $password == 'pass') {
?>
        {
            "success": true,
            "secret": "This is the secret no one knows but the admin"
        }
<?php
    }
    else {
?>
        {
            "success": false,
            "message": "Invalid Credentials"
        }
<?php
    }
}
else {
?>
    {
        "success": false,
        "message": "Only POST access accepted"
    }
<?php
}
?>
