<?php
include "connection.php";
?>
<?php
    include "connection.php";
    // sesstion maintain ---- start
    session_start();
    
?>
<?php
$pid=$name=$price=$img='';
$piderror=$nameerror=$priceerror=$imgerror='';
// pid validation
    $query="select * from product order by pid desc limit 1";
    $data=mysqli_query($cn,$query);
    $result=mysqli_fetch_assoc($data);
    $count=$result['pid'];
    $pid=$count+1;
    if(isset($_POST['btnsubmit']))
    {
// name validation

    if(empty(trim($_POST['txtname']??'')))
    {
        $nameerror="Enter the Product Name";
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
    // else if(trim($_POST['txtprice']??''))
    // {
    //     $priceerror="Enter the Possitive number ...";   
    // }
    else
    {
        $price=trim($_POST['txtprice']);
    }
// img validation
    if(empty(trim($_POST['txtimg']??'')))
    {
        $imgerror="Enter the Image Name" ;
    }
    else
    {
        $img=trim($_POST['txtimg']);
        $img1=$img.".jpeg";
    }
// validation to all
    if(empty($piderror) && empty($nameerror)  && empty($priceerror) && empty($imgerror))
    {
        $insert="insert into product values('$pid','$name','$price','$img1')";
        $data=mysqli_query($cn,$insert);
        if($data)
        {
            header("Location:product.php");
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
                <h1>Add Product</h1>
            </div>
            <div>
                <form method="post" >
                    <table class="table table-striped">
                        <tr>
                            <td><lable>Product Id</lable></td>
                            <td>
                                <input type="number" name="txtpid" value="<?php echo $pid ;?>" />
                            </td>
                            <td>
                                <span style="color:red"><?php echo $piderror ;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><lable>Name</lable></td>
                            <td>
                                <input type="text" name="txtname" />
                            </td>
                            <td>
                                <span style="color:red"><?php echo $nameerror ;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><lable>price</lable></td>
                            <td>
                                <input type="number" name="txtprice" />
                            </td>
                            <td>
                                <span style="color:red"><?php echo $priceerror ;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><lable>image</lable></td>
                            <td>
                                <input type="text" name="txtimg" placeholder="Image Name only"/> 
                            </td>
                            <td>
                                <span style="color:red"><?php echo $imgerror ;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="btnsubmit" class="btn btn-success" value="Insert Product"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
