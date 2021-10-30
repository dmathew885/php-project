<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
    $productid = $_GET['id'];

    require("mysqli_connect.php");
    $q = "SELECT * FROM products WHERE productid=?";
    $stmt=mysqli_prepare($dbc,$q);
    mysqli_stmt_bind_param($stmt, 'i', $productid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result))
        {
            echo row['bookname'];
        }
    


}


?>
