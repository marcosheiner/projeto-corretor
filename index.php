<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("Location: pages/dashboard.php");
} elseif (!isset($_SESSION['usuario'])) {
    header("Location: home/sobre.php");
}

?>