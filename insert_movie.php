<?php require_once('functions.php') ?>
<?php

if (isset($_POST['submit'])) {
    $movieId = $_POST['movieId'];
    $title = $_POST['title'];
    $genres = $_POST['genres'];

    if (
        isset($title) and (isset($genres))
        and !empty($title) and (!empty($genres))
    ) {
        insert_movie($title, $genres, $movieId);
        header("Location: http://localhost:8080/");
    }

} else {
    echo "Something wrong";
}
?>