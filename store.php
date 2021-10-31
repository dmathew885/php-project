<head>
    <style>
        h1 {text-align: center;}
        div {text-align: center;}
         </style> 
 <h1>   
booKKart
</h1>
<div class="topnav">
       <a href="index.html">Home</a>
       <a href="store.php">Store</a>  
      </div>
</head>
 
<body>
  
<h2>Please Click on a Book you like to Buy!!!</h2>
<?php
    session_start();

    require("mysqli_connect.php");
    $q = "SELECT * FROM products WHERE quantity > 0";
    $r = mysqli_query($dbc,$q) or die(mysqli_error($dbc));
    while($row=mysqli_fetch_array($r)){
        echo '<p><a href="details.php?id='.$row['productid'].'">'.$row['bookname'].'</p></a>';
    }
?>
