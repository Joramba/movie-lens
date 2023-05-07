<?php require_once('functions.php') ?>
<?php include("header.php") ?>
<?php

$movieId = $_GET['movieId'];
get_movie_by_movieId($movieId);
?>