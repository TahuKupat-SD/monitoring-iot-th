<?php
include "../config/database.php";


$webhookResponse = json_decode(file_get_contents('php://input'), true);
$topic = $webhookResponse["topic"];
$payload = $webhookResponse["payload"];

$topicExplode = explode("/", $topic);
$serialNumber = $topicExplode[1];

$type = $topicExplode[2];

$sql = "INSERT INTO data (serial_number, sensor_actuator, value, name, topic)
        VALUES('$serialNumber', '$type', '$payload', '{$topicExplode['3']}', '$topic')";

mysqli_query($conn, $sql);
?>