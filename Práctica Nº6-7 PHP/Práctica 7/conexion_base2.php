<?php
$link = mysqli_connect('localhost', 'root', '', 'base2');

if (!$link) {
    die('Error de conexión: ' . mysqli_connect_error());
}

mysqli_set_charset($link, 'utf8');
?>