<?php
    session_start();

    require("mysqli_connect.php");
    $q = "SELECT * FROM products";
    $r = mysqli_query($dbc,$q) or die(mysqli_error($dbc));

    while($row=mysqli_fetch_array($r)){
        echo $row['bookname'];
    }
?>