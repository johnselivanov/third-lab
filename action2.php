<?php
header('Content-Type: text/xml');
header('Cache-Control: no-cache, must-revalidate');
echo '<?xml version="1.0" ?>';
echo "<root>";
include "connection.php";
$start = $_GET["start"];
$stop = $_GET["stop"];
$sqlSelect = $dbh->prepare(
    "SELECT * FROM $db.client
    join $db.seanse 
    on $db.client.id_client = $db.seanse.fid_client
    WHERE $db.seanse.start >= :start and $db.seanse.stop <= :stop" );
$sqlSelect->execute(array('start' => $start, 'stop' => $stop));
while($cell=$sqlSelect->fetch(PDO::FETCH_BOTH)){
    echo "<row><name>$cell[1]</name><IP>: $cell[4]</IP><balance>$cell[5]</balance><start>$cell[7]</start><stop>$cell[7]</stop><in>$cell[9]</in><out>$cell[10]</out></row>";
}
echo "</root>"
?>
