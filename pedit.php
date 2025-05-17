<?php
include "connection.php";
?>
<?php
    include "connection.php";
    // sesstion maintain ---- start
    session_start();
    
?>
<?php
$pid=$name=$price='';
$piderror=$nameerror=$priceerror='';

// pid 
    $pid=$_GET['pid'];
// name validation

    if(empty(trim($_POST['txtname']??'')))
    {
        $nameerror="Enter the Name";
    }
    else
    {
        $name=trim($_POST['txtname']);
    }
// price validation
    if(empty(trim($_POST['txtprice']??'')))
    {
        $priceerror="Enter the Price" ;
    }
    else if(trim($_POST['txtprice']??'')<=0)
    {
        $priceerror="Enter the Possitive number ...";
    }
    else
    {
        $price=trim($_POST['txtprice']);
    }
// validation to all
    if(empty($piderror) && empty($nameerror) && empty($priceerror))
    {
        $update="update product set pname='$name',price='$price' where pid='$pid'";
        if(mysqli_query($cn,$update))
        {
            header("Location:product.php");
        }
    }
    else
    {
        echo "<script> alert('kem chho'); </script>";
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
                <h2>Update Product</h2><br>
            </div>
            <div>
                <form method="post" >
                    <table class="table table-striped">
                        <tr>
                            <td><lable>Product Id</lable></td>
                            <td>
                                <input type="number" name="txtpid" value="<?php echo $_GET['pid'] ;?>" />
                            </td>
                        </tr>
                        <tr>
                            <td><lable>Name</lable></td>
                            <td>
                                <input type="text" name="txtname" value="<?php echo $_GET['pname'] ;?>" />
                            </td>
                        </tr>
                        <tr>
                            <td><lable>Price</lable></td>
                            <td>
                                <input type="number" name="txtprice" value="<?php echo $_GET['price'] ;?>" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="btnupdate" class="btn btn-success" value="Update"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>