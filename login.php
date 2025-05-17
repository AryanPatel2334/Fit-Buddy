<?php
    include "connection.php";
?>
<?php
    // sesstion maintain ---- start
    session_start();
    $_SESSION['user']='';

    //intialization of variable
    $user=$passwordlogin=$categorylogin='';
    $usererror=$passwordloginerror=$categoryloginerror='';
    if(isset($_POST['login']))
    {
      
        //category validation
        if(empty(isset($_POST['txtcategorylogin'])))
        {
            $categoryloginerror="Please Select the Category";
        }
        else
        {
            $categorylogin=$_POST['txtcategorylogin'];
        }

        // user name validation
        if(empty(trim($_POST['txtuser'])))
        {
            $usererror="Enter the valid UserName" ;
        }
        else
        {
            $user=trim($_POST['txtuser']);
        }

        //password validation
        if(empty(trim($_POST['txtpasswordlogin'])))
        {
            $passwordloginerror="Enter the Password";
        }
        elseif(strlen(trim($_POST['txtpasswordlogin']))!=6)
        {
            $passwordloginerror="Password should be 6 Charcter";
        }
        else
        {
            $passwordlogin=trim($_POST['txtpasswordlogin']);
            $soltedpasswordlogin=$passwordlogin."@#$%^";
        }

        //check the error and login to selected category
        if(empty($usererror) && empty($passwordloginerror) && empty($categoryloginerror))
        {
            if($categorylogin=="customer")
            {
                $query="select * from customer where (password='$soltedpasswordlogin') and (mobile='$user' or email='$user' or name='$user' )";
                $data=mysqli_query($cn,$query);
                $count=mysqli_num_rows($data);
                if($count==1)
                {
                    while($result=mysqli_fetch_assoc($data))
                    {
                        $_SESSION['user']=$result['name'];
                        $_SESSION['id']=$result['id'];
                        // $user = $_SESSION['user'];
                        // echo $user;
                        header("Location:index2.php");
                    }
                }
                else
                {
                    echo "<script> alert('Invalid Password or Username'); </script>";
                }
            }
            elseif($categorylogin=="admin")
            {
                $query="select * from admin where (password='$soltedpasswordlogin') and (mobile='$user' or email='$user' or name='$user')";
                $data=mysqli_query($cn,$query);
                $count=mysqli_num_rows($data);
                if($count==1)
                {
                    while($result=mysqli_fetch_assoc($data))
                    {
                        
                        $_SESSION['user1']=$result['name'];
                        $_SESSION['id']=$result['id'];
                        
                        header("Location:admin.php");
                    }
                }
                else
                {
                    echo "<script> alert('Invalid Password or Username'); </script>";
                }
            }
            else
            {
                echo "Something Wrong";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login1.css">
    <link rel="shortcut icon" href="./favivon.png" type="image/svg+xml">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Login Page</title>
</head>
<body>
    <div class="wrapper">
      <div class="container main">
          <div class="row">
              <div class="col-md-6 side-image">
                         
                  <!-------------      image     ------------->
                  <div class="logo">
                  <ion-icon name="barbell-outline" aria-hidden="true"></ion-icon>
                </div>
                <p class="fit">Fit-Buddy</p>
                  <!-- <div class="text">
                      <p>Join Our Gym<i>- Fit-Buddy</i></p>
                  </div> -->
                  
              </div>
              <div class="col-md-6 right">
                  
                  <div class="input-box">
                     
                     <header>Login Here</header>
                     <form method="post" >
                        <div class="input-field">
                            <select id="category" class="category"  name="txtcategorylogin">
                                <option value="" disabled selected>~Select Valid Category~</optiojn>
                                <option value="customer">Customer</option>
                                <option value="admin">Admin</option>
                            </select>
                            <span style="color:red"><?php echo $categoryloginerror ;?></span>
                        </div> 
                        <div class="input-field">
                            <input type="text" class="input" name="txtuser" id="username"  autocomplete="off">
                            <label for="email">UserName</label> 
                            <span style="color:red"><?php echo $usererror ;?></span>
                        </div> 
                        <div class="input-field">
                            <input type="password" class="input" name="txtpasswordlogin" id="password" >
                            <label for="pass">Password</label>
                            <span style="color:red"><?php echo $passwordloginerror ;?></span>
                        </div> 
                        <div class="input-field">
                            
                            <input type="submit" class="submit" name="login" value="Log In">
                        </div> 
                    </form>
                     <div class="signin">
                      <span>Don't have an account? <a href="registration.php">Register here</a></span>
                     </div>
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
