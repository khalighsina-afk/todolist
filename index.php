
<?php
    //index-->
    include ("database.php");

    $title  = "my first task";
    $desc   = "testing my firat task";

    $sql = "INSERT INTO tasks(title, descr) VALUES ('$title', '$desc')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>
