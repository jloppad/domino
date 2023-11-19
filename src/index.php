<?php
require_once "config.php";
global $db;
session_start();

if (isset($_SESSION['username'])) {
    header("Location: lobby.php");
} else {
    header("Location: login.php");
    die();
}