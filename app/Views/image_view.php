<?php
require_once __DIR__ . '/db.php';
if (isset($_GET['image'])) {
    $result = $_GET['image'];

    $row = $result->fetch_assoc();
    header("Content-type: jpeg");
    echo $row["imageData"];
}
?>