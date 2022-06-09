<?php
include "connection.php";
$client = $_GET["statistic"];
$sqlSelect = $dbh->prepare(
    "SELECT * FROM $db.client
    join $db.seanse 
    on $db.client.id_client = $db.seanse.fid_client
    WHERE $db.client.name = :client");
$sqlSelect->execute(array('client' => $client));
echo "Статистика пользователя $client в сети: <ol>";
while($cell=$sqlSelect->fetch(PDO::FETCH_BOTH)){
    echo "<li>Имя: $cell[1], IP: $cell[4], balance: $cell[5], начало: $cell[7], конец: $cell[8], входящий трафик: $cell[9], выходящий трафик: $cell[10]</li>";
}
echo "</ol>"
?>