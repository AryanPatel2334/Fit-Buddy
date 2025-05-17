<?php
    include "connection.php";
     // sesstion maintain ---- start
     session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="buy.css">
    <link rel="shortcut icon" href="./favivon.png" type="image/svg+xml">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Buy Now</title>
</head>
<body>
    <div class="wrapper">
      <div class="container main">
          <div class="row">
              <div class="col-md-6 side-image ">
                
                  <div class="logo">
                  <ion-icon name="barbell-outline" aria-hidden="true"></ion-icon>
                </div>
                <p class="fit">Fit-Buddy</p>
                <p class="fit">
                    <div class="mem"><p>Your Product</p></div>
                <?php 
                    $pid=$_GET['pid'];
                    $_SESSION['pid1']=$pid;
                    $query="select * from product where pid='$pid'";
                    $data=mysqli_query($cn,$query);
                    $count=mysqli_num_rows($data);
                    if($count!=0)
                    {
                        while($request=mysqli_fetch_assoc($data))
                        {
                            $img=$request['img'];
                            $pname=$request['pname'];
                            $_SESSION['price']=$request['price'];
                            echo "<li class='scrollbar-item'>
                                <div class='membership-card'>
                                <div class='card-content'>
                                <div class='pricing_box'>
                                <figure class='card-banner img-holder' style='height:200; --width:500;'>
                                <img src='./assets/images/$img' alt='$pname' class='products' height='150' width='250' loading='lazy'>
                                </figure>";

                            echo "<span>".$request['pname']." </span>
                            <h2>₹".$request['price']."/-</h2>
                            <ul>
                                
                               
                            </ul>
                           
                            </div>
                        
                        </div>
                        
                        </div>
                    
                    </li>";
                }
            }
            else
            {
                echo "<h3>No Product Availble </h3>";
            }
            ?>
                </p>
                  <!-- <div class="text">
                      <p>Join Our Gym<i>- Fit-Buddy</i></p>
                  </div> -->
                  
              </div>
              <div class="col-md-6 right">
                  
                  <div class="input-box">
                     
                     <header>Buy Now</header>
                     <?php 
                        echo " <form method='post'";
                       
                            if(!empty($_SESSION['user']))
                            {
                                $id=$_SESSION['id'];
                                $query="select * from customer where id='$id'";
                                $data=mysqli_query($cn,$query);
                                while($rs=mysqli_fetch_assoc($data))
                                {
                                    $mobile=$rs['mobile'];
                                    
                                }
                                echo "
                                    <div class='input-field'>
                                        <input type='number' class='input' name='txtqty' id='qty'  placeholder='             1' autocomplete='off'>
                                        <label for='qty'>Qty</label> 

                                        
                                        <button for='qty' name='qty' > Go </button>
                                        
                                    </div> ";
                                    $price=$_SESSION['price'];
                                    $total=$price;
                                    if(isset($_POST['qty']))
                                    {
                                        if(trim($_POST['txtqty'])<=0)
                                        {
                                            echo "<script> alert('Please Enter the Qty in possitive number.');</script>";
                                        }
                                        else
                                        {
                                            $qty=$_POST['txtqty'];
                                            $_SESSION['qty']=$qty;
                                            $total=$qty*$price;
                                        }
                                        
                                    }
                                    
                                    echo "
                                    <div class='input-field'>
                                        <input type='number' class='input' name='txttotal' id='total' required='' value='$total'autocomplete='off'>
                                        <label for='total'>Total</label> 
                                    </div> 
                                    
                                    ";
                            }
                           
                            else
                            {
                               header("Location:login.php");
                            }
                        ?>
                        <div class="input-field">
                            
                            <input type="submit" class="submit" name="buy1" value="Make Payment">
                        </div> 
                    </form>
                  </div>  
              </div>
          </div>
      </div>
  </div>
  <!-- ION-ICON Link -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  </body>
</html>
<?php 
 if(isset($_POST['buy1']))
 {
     header("Location:payment2.php");
 }
   
   
    $total1=$_POST['txttotal'];
    $_SESSION['total']=$total1;
   
?>
 