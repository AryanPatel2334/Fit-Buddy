<?php
include "connection.php";
?>
<?php
    include "connection.php";
    // sesstion maintain ---- start
    session_start();
    
?>
<?php
$pid=$amount=$days=$trainer=$access=$locker=$cardio=$steam='';
$piderror=$amounterror=$dayserror=$trainererror=$accesserror=$lockererror=$cardioerror=$steamerror='';
// pid validation
    $query="select * from membership order by pid desc limit 1";
    $data=mysqli_query($cn,$query);
    $result=mysqli_fetch_assoc($data);
    $count=$result['pid'];
    $pid=$count+1;
    if(isset($_POST['btnsubmit']))
    {
// amount validation

    if(empty(trim($_POST['txtamount']??'')))
    {
        $amounterror="Enter the Amount";
    }
    else if(trim($_POST['txtamount']??'')<=0)
    {
        $amounterror="Enter the amount in possitive number " ;
    }
    else
    {
        $amount=trim($_POST['txtamount']);
    }
// days validation
    if(empty(trim($_POST['txtdays']??'')))
    {
        $dayserror="Enter the Days" ;
    }
    else
    {
        $days=trim($_POST['txtdays']);
    }
// trainer validation
    if(empty(isset($_POST['txttrainer'])))
    {
        $trainererror="Select the proper option";
    }
    else
    {
        $trainer=$_POST['txttrainer'];
    }
// access validation
    if(empty(isset($_POST['txtaccess'])))
    {
        $accesserror="Select the proper option";
    }
    else
    {
        $access=$_POST['txtaccess'];
    }
// locker validation
    if(empty(isset($_POST['txtlocker'])))
    {
        $lockererror="Select the proper option";
    }
    else
    {
        $locker=$_POST['txtlocker'];
    }
// cardio validation
    if(empty(isset($_POST['txtcardio'])))
    {
        $cardioerror="Select the proper option";
    }
    else
    {
        $cardio=$_POST['txtcardio'];
    }
// steam validation
    if(empty(isset($_POST['txtsteam'])))
    {
        $steamerror="Select the proper option";
    }
    else
    {
        $steam=$_POST['txtsteam'];
    }
// validation to all
    if(empty($piderror) && empty($amounterror)  && empty($dayserror) && empty($trainererror)  &&  empty($accesserror) && empty($lockererror) && empty($cardioerror) && empty($steamerror))
    {
        $insert="insert into membership values('$pid','$amount','$days','$trainer','$access','$locker','$cardio','$steam')";
        $data=mysqli_query($cn,$insert);
        if($data)
        {
            header("Location:member.php");
        }
    }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Member Page</title>
</head>
    <body>
    <header class="header">
        <a href="admin.php">Go To Dashboard</a>

        <div class="logout">
        <form method="post">
                <input type="submit" class="btn btn-secondary"  name="logout"  value="Log Out"/>
        </form>
        <?php
        if(isset($_POST['logout']))
        {
        $_SESSION['user1']='';
        header("Location:index2.php");
        }
        ?>
        </div>

    </header> 
    <aside>

        <ul class="data">

            <div class="links">
            <li>
                <a href='' style="font-size:25px">
                <?php
                  if(!empty($_SESSION['user1']))
                  {
                    $username = $_SESSION['user1'];
                    echo "Welcome $username";
                  }
                ?>
                </a>
                </li>

                <li>
                <a href="buyer.php">MEMBERSHIPS BUYERS</a>
                </li>

                <li>
                    <a href="product_buy.php">PRODUCT BUYERS</a>
                </li>

                <li>
                    <a href="product.php">PRODUCT</a>
                </li>

                <li>
                    <a href="member.php">SHOW MEMBERSHIPS</a>
                </li>

                <li>
                    <a href="customer.php">SHOW CUSTOMERS</a>
                </li>
             </div>

        </ul>

    </aside>
    
        <div class="content">
            <div>
                <h1>Add Membership Package</h1>
            </div>
            <div>
                <form method="post" >
                    <table class="table table-striped">
                        <tr>
                            <td><lable>Package Id</lable></td>
                            <td>
                                <input type="number" name="txtpid" value="<?php echo $pid ;?>" />
                            </td>
                            <td>
                                <span style="color:red"><?php echo $piderror ;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><lable>Amount</lable></td>
                            <td>
                                <input type="number" name="txtamount" />
                            </td>
                            <td>
                                <span style="color:red"><?php echo $amounterror ;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><lable>Days</lable></td>
                            <td>
                                <input type="number" name="txtdays" />
                            </td>
                            <td>
                                <span style="color:red"><?php echo $dayserror ;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><lable>Personal Trainer</lable></td>
                            <td>
                                <input type="radio" name="txttrainer" value="1" />Allocate
                                <input type="radio" name="txttrainer" value="0" />Not Allocate
                            </td>
                            <td>
                                <span style="color:red"><?php echo $trainererror ;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><lable>All Access</lable></td>
                            <td>
                            <input type="radio" name="txtaccess" value="1" />Allocate
                            <input type="radio" name="txtaccess" value="0" />Not Allocate
                            </td>
                            <td>
                                <span style="color:red"><?php echo $accesserror ;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><lable>Personal Locker</lable></td>
                            <td>
                            <input type="radio" name="txtlocker" value="1" />Allocate
                            <input type="radio" name="txtlocker" value="0" />Not Allocate
                            </td>
                            <td>
                                <span style="color:red"><?php echo $lockererror ;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><lable>cardio</lable></td>
                            <td>
                            <input type="radio" name="txtcardio" value="1" />Allocate
                            <input type="radio" name="txtcardio" value="0" />Not Allocate
                            </td>
                            <td>
                                <span style="color:red"><?php echo $cardioerror ;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><lable>steam</lable></td>
                            <td>
                            <input type="radio" name="txtsteam" value="1" />Allocate
                            <input type="radio" name="txtsteam" value="0" />Not Allocate
                            </td>
                            <td>
                                <span style="color:red"><?php echo $steamerror ;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="btnsubmit" class="btn btn-success" value="Insert Membership Packages"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
