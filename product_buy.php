
<?php
    include "connection.php";
?>
<?php
    include "connection.php";
    // sesstion maintain ---- start
    session_start();
    
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
                <h1>All Product Buyer Customers</h1>
            </div>
            <div>
                <?php 
                    $query="select * from product_buy";
                    $data=mysqli_query($cn,$query);
                    $count=mysqli_num_rows($data);
                    if($count!=0)
                    {
                ?>
                    <form method="post" >
                        <table class="table table-striped">
                            <tr>
                                <th>Payment Id </th>
                                <th>Customer Id</th>
                                <th>Name </th>
                                <th>Product Name </th>
                                <th>Qty </th>
                                <th>Price </th>
                                <th>Total </th>
                            </tr>
                            <?php
                            while($request=mysqli_fetch_assoc($data))
                            {
                                $pid=$request['pid'];
                                $q1="select * from product where pid=$pid";
                                $data1=mysqli_query($cn,$q1);
                                while($rs=mysqli_fetch_assoc($data1))
                                {
                                    $pname=$rs['pname'];
                                }
                                echo "<tr>
                                <td>".$request['payid']."</td>
                                <td>".$request['id']."</td>
                                <td>".$request['name']."</td>
                                <td>".$pname."</td>
                                <td>".$request['qty']."</td>
                                <td>".$request['price']."</td>
                                <td>".$request['total']."</td>";
                            }
                        }
                            else
                            {
                                echo "<h3>No Customer Availble </h3>";
                            }
                            ?>
                            <tr>
                        
                    </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>

