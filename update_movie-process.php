<?php require_once('functions.php') ?>

<?php


$movieId = $_POST['movieId'];
$title = $_POST['title'];
$genres = $_POST['genres'];

if (
    isset($movieId) and (isset($title))
    and isset($genres)
) {
    update_movie($movieId, $title, $genres);
}
?>