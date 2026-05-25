<?php

include "db_conn.php"; //using database connection file here

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM students WHERE id='$id'";
    $result = mysqli_query($conn,$sql);

    if ($result) {
        echo "<script>alert('User Deleted Successfully'); window.location='index.php'</script>";
    } else {
        echo "<script>alert('User Not Deleted'); window.location='index.php'</script>";
    }
}
$conn->close();
?>