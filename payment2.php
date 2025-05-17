<?php
    include "connection.php";
     // sesstion maintain ---- start
     session_start();
?>
<?php 

    $id=$_SESSION['id'];
    $name=$_SESSION['user'];
    $pid=$_SESSION['pid1'];
    $qty=$_SESSION['qty'];
    $price=$_SESSION['price'];
    $total=$_SESSION['total'];
    if(isset($_POST['pay']))
    {
    
   $insert="insert into product_buy values('','$id','$name','$pid','$qty','$price','$total')";
   if(mysqli_query($cn,$insert))
   {
    echo "<script> alert('payment Succcessfully........') ; </script>";
    // header("Location:index2.php");
   }
   unset($_SESSION['pid1']);
   unset($_SESSION['qty']);
   unset($_SESSION['price']);
   unset($_SESSION['total']);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Form</title>
    <link rel="stylesheet" href="payment.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Confirm Your Payment</h1>
        <div class="first-row">
            <div class="owner">
                <h3>Total Payable Amount</h3>
                <form method="post" >
                <div class="input-field">
                    <input type="text" value="<?php echo $total; ?>"required />
                </div>
            </div>
                    <input type="submit" value="Pay" name="pay"class="pay">
                </form>
                
        </div>
    
                <div class="cards">
                    <img src="mc.png" alt="">
                    <img src="vi.png" alt="">
                    <img src="pp.png" alt="">
                </div>

                <div class="qr">
                    <img src="QR2.jpg" alt="" height="220px" width="210px">
                </div>
   
        <!-- <a href="">Confirm</a> -->
    </div>
</body>
</html>