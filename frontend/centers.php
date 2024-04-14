<?php 
require_once '../lib/database.php';

$center = $_GET["center"];
$sql = "SELECT * FROM interventioncentre_t WHERE area=$center ORDER BY centreName";
$result = $conn->query($sql);
$results = json_encode($result);
$db->close();
echo '{"issuccess":true,"data":'. $results .'}';
exit;
?>
