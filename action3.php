<?php
include "connection.php";
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');
$where = 0;
$sqlSelect = $dbh->prepare(
    "SELECT * FROM $db.client 
    WHERE $db.client.balance < :balance");
$sqlSelect->execute(array('balance' => $where));
$cell=$sqlSelect->fetchAll(PDO::FETCH_OBJ);
echo json_encode($cell);
?>
