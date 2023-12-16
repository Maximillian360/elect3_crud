<?php
    global $conn;
    include "db_conn.php";
    $id = $_GET["studid"];
    $sql = "DELETE FROM `students` WHERE studid = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=Record deleted successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }