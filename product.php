
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
                <h2>All Products</h2><br>
            </div>
            <div>
                <?php 
                    $query="select * from product";
                    $data=mysqli_query($cn,$query);
                    $count=mysqli_num_rows($data);
                    if($count!=0)
                    {
                ?>
                    <form method="post" >
                        <table class="table table-striped">
                            <tr>
                                <th>Product Id</th>
                                <th>Name</th>
                                <th>Price </th>
                                <th>Image Name</th>
                                <th colspan="2" >Operations </th>
                            </tr>
                            <?php
                            while($request=mysqli_fetch_assoc($data))
                            {
                                echo "<tr>
                                <td>".$request['pid']."</td>
                                <td>".$request['pname']."</td>
                                <td>".$request['price']."</td>
                                <td>".$request['img']."</td>
                                <td><a href='pedit.php?pid=$request[pid]&pname=$request[pname]&price=$request[price]' >Edit   </a>
                                <td><a href='pdelete.php?pid=$request[pid]' onclick='checkdel()'> Delete </a> </td></tr>
                                ";
                            }
                        }
                            else
                            {
                                echo "<h3>Products Not Available </h3>";
                            }
                            ?>
                            <tr>
                            <td colspan="2">
                            <input type="submit" name="add"  class="btn btn-success" value="Add Product" />
                        </td>
                    </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['add']))
    {
        echo "<script> window.location.href='padd.php' </script>";
    }
?>
