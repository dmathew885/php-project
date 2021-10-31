<h1>   
booKKart
</h1>
<span>
 <a href="index.html">home</a>
 <a href="store.php">store</a>    
</span><br>
<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='GET'){
    
    $_SESSION['id'] = $_GET['id'];
    $productid = $_GET['id'];
    require("mysqli_connect.php");
    $q = "SELECT * FROM products WHERE productid=".$productid;
    $r = mysqli_query($dbc,$q) or die(mysqli_error($dbc));

    while($row=mysqli_fetch_array($r)){
        echo "The book you selected is ".$row['bookname'].". Please enter details to purchase";
    }
   


}
if ($_SERVER['REQUEST_METHOD']=='POST'){
    require("mysqli_connect.php");
    if(empty($_POST['fname']) ||empty($_POST['lname']) ||empty($_POST['email']) || empty($_POST['phone']) ||
    empty($_POST['address']) ||empty($_POST['postalcode']) ||empty($_POST['card']) ||empty($_POST['date']) ||
    empty($_POST['cvv'])){

        echo "please enter valid text";
       
    }else
    {
        
        $q = "INSERT INTO ORDERS VALUES (NULL,?,?)";
        $stmt = mysqli_prepare($dbc, $q); 
        $quant = 1;
        mysqli_stmt_bind_param($stmt, 'si',  $_SESSION['id'], $quant);

        mysqli_stmt_execute($stmt);
        echo mysqli_stmt_error($stmt);
        if (mysqli_affected_rows($dbc) == 1) {
            echo "in update".$_SESSION['id'];
            $q2 = "UPDATE products SET quantity = quantity-1 WHERE productid = ". $_SESSION['id'];
            $r2 = mysqli_query($dbc,$q2) or die(mysqli_error($dbc));
            if (mysqli_affected_rows($dbc) == 1){
                
                header("location: index.html");
            }   
        }
        else {
            echo "Incorrect account information. Please try again!";
        }

    }
    
}




?>
<form action="details.php" method="POST">
<h1>Shipping details</h1>   
<p>First Name: <input type="text" name="fname"></p>
<p>Last Name : <input type="text" name="lname"></p>
<p>Phone: <input type="text" name="phone"></p>
<p>Email: <input type="text" name="email"></p>
<p>Address: <input type="text" name="address"></p>
<p>Postal Code: <input type="text" name="postalcode"></p>
<h1>payment details</h1>
<input type="radio" id="debit" name="payment" >
<label for="debit">Debit</label><br>
<input type="radio" id="credit" name="payment" >
<label for="credit">Credit</label><br>
<p>Card No: <input type="text" name="card"></p>
<p>MM/YY: <input type="text" name="date"></p>
<p>CVV: <input type="text" name="cvv"></p>
<p><input type="submit" name="submit" value="buynow"></p>
</form>