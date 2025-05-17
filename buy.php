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
                    <div class="mem"><p>Your Membership</p></div>
                <?php 
                    $pid=$_GET['pid'];
                    $_SESSION['pid']=$pid;
                    $query="select * from membership where pid='$pid'";
                    $data=mysqli_query($cn,$query);
                    $count=mysqli_num_rows($data);
                    if($count!=0)
                    {
                        while($request=mysqli_fetch_assoc($data))
                        {
                            $trainer=$request['trainer'];
                            $access=$request['access'];
                            $locker=$request['locker'];
                            $cardio=$request['cardio'];
                            $steam=$request['steam'];
                            //trainer
                            if($trainer==1)
                            {
                                $trainer="Allocate";
                            }
                            elseif($trainer==0)
                            {
                                $trainer="Not Allocate";
                            }
                            else
                            {
                                echo "Some Think Worng";
                            }
                            //access
                            if($access==1)
                            {
                                $access="Allocate";
                            }
                            elseif($access==0)
                            {
                                $access="Not Allocate";
                            }
                            else
                            {
                                echo "Some Think Worng";
                            }
                            //locker
                            if($locker==1)
                            {
                                $locker="Allocate";
                            }
                            elseif($locker==0)
                            {
                                $locker="Not Allocate";
                            }
                            else
                            {
                                echo "Some Think Worng";
                            }
                            //cardio
                            if($cardio==1)
                            {
                                $cardio="Allocate";
                            }
                            elseif($cardio==0)
                            {
                                $cardio="Not Allocate";
                            }
                            else
                            {
                                echo "Some Think Worng";
                            }
                            //steam
                            if($steam==1)
                            {
                                $steam="Allocate";
                            }
                            elseif($steam==0)
                            {
                                $steam="Not Allocate";
                            }
                            else
                            {
                                echo "SomeThing Worng";
                            }
                            echo "<li class='scrollbar-item'>
                                <div class='membership-card'>
                                <div class='card-content'>
                                <div class='pricing_box'>";

                            echo "<span>".$request['days']." Days</span>
                            <h2>₹".$request['amount']."/-</h2>
                            <ul>
                                <li>";
                                if($trainer=="Allocate")
                                {
                                    echo "<image src='true.png' heigth='10px'  class='true' width='15px' ></image>" ;
                                } 
                                else if($trainer=="Not Allocate")
                                {
                                    echo "<image src='false.png' heigth='20px'  width='20px' class='false' ></image>";
                                }echo "General Trainer</li>
                                <li>";
                                if($access=="Allocate")
                                {
                                    echo "<image src='true.png' heigth='10px'  width='15px' class='true' ></image>";
                                } 
                                else if($access=="Not Allocate")
                                {
                                    echo "<image src='false.png' heigth='10px'  width='15px' class='false'></image>";
                                }echo "Full Gym Access</li>
                                <li>";
                                if($locker=="Allocate")
                                {
                                    echo "<image src='true.png' heigth='10px'  width='15px' class='true' ></image>" ;
                                } 
                                else if($locker=="Not Allocate")
                                {
                                    echo "<image src='false.png' heigth='10px'  width='15px' class='false'></image>" ;
                                } echo "Locker</li>
                                <li>";
                                if($cardio=="Allocate")
                                {
                                    echo "<image src='true.png' heigth='10px'  width='15px' class='true' ></image>" ;
                                } 
                                else if($cardio=="Not Allocate")
                                {
                                    echo "<image src='false.png' heigth='10px'  width='15px' class='false'></image>" ;
                                }echo "Cardio</li>
                                <li>";
                                if($steam=="Allocate")
                                {
                                    echo "<image src='true.png' heigth='10px'  width='15px' class='true' ></image>" ;
                                } 
                                else if($steam=="Not Allocate")
                                {
                                    echo "<image src='false.png' heigth='10px'  width='15px' class='false'></image>" ;
                                } echo "Steam</li>
                            </ul>
                           
                            </div>
                        
                        </div>
                        
                        </div>
                    
                    </li>";
                }
            }
            else
            {
                echo "<h3>No membership plan Availble </h3>";
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
                        echo "
                     <form method='post' action='payment.php?pid=$pid'>";
                     ?>
                        <?php
                            if(!empty($_SESSION['user']))
                            {
                                $id=$_SESSION['id'];
                                $query="select * from customer where id='$id'";
                                $data=mysqli_query($cn,$query);
                                while($rs=mysqli_fetch_assoc($data))
                                {
                                    $mobile=$rs['mobile'];
                                   
                                }
                            }
                            else
                            {
                                header("Location:login.php");
                            }
                        ?>
                        <div class="input-field">
                            <input type="text" class="input" name="txtmobile" id="mobile" required="" value="<?php echo $mobile ; ?>"autocomplete="off">
                            <label for="Mobile">Mobile</label> 
                        </div> 
                       
                        <div class="input-field">
                            
                            <input type="submit" class="submit" name="buy" value="Make Payment">
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
