<?php require_once('functions.php') ?>
<?php

if (isset($_POST['submit'])) {
    $userId = $_POST['userId'];
    $movieId = $_POST['movieId'];
    $rating = $_POST['rating'];

    insert_rating($userId, $movieId, $rating);
    header("Location: http://localhost:8080/");

} else {
    echo "Something wrong";
}
?>