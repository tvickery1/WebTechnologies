<?php
if (count($_POST) < 1 && count($_GET) < 1) {
    echo json_encode("No data");
    exit;
}
( $_SERVER["REQUEST_METHOD"] === "POST") ? $data = $_POST : $data = $_GET;
$data["Response"] = "Got it!";
echo json_encode($data);
?>