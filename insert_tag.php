<?php require_once('functions.php') ?>
<?php

if (isset($_POST['submit'])) {
    $userId = $_POST['userId'];
    $movieId = $_POST['movieId'];
    $tag = $_POST['tag'];

    insert_tag($userId, $movieId, $tag);
    header("Location: http://localhost:8080/");

} else {
    echo "Something wrong";
}
?>