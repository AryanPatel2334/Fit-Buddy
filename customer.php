
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
                <h2>All Customers</h2><br>
            </div>
            <div>
                <?php 
                    $query="select * from customer";
                    $data=mysqli_query($cn,$query);
                    $count=mysqli_num_rows($data);
                    if($count!=0)
                    {
                ?>
                    <form method="post" >
                        <table class="table table-striped">
                            <tr>
                                <th>Customer Id </th>
                                <th>Name</th>
                                <th>Gender </th>
                                <th>Age </th>
                                <th>Mobile Number </th>
                                <th>Email </th>
                            </tr>
                            <?php
                            while($request=mysqli_fetch_assoc($data))
                            {
                                echo "<tr>
                                <td>".$request['id']."</td>
                                <td>".$request['name']."</td>
                                <td>".$request['gender']."</td>
                                <td>".$request['age']."</td>
                                <td>".$request['mobile']."</td>
                                <td>".$request['email']."</td>";
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

