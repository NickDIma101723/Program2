<?php
require 'config.php';
require_once 'session.inc.php';

$query = "SELECT * FROM anime_agenda";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
$amountRows = $stmt->rowCount();

include 'views/index_view.php';