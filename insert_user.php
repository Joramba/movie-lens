<?php require_once('functions.php') ?>
<?php

if (isset($_POST['submit'])) {
    $userId = $_POST['userId'];
    $login = $_POST['login'];

    insert_user($userId, $login);
    header("Location: http://localhost:8080/");

} else {
    echo "Something wrong";
}
?>