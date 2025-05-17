
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
                <h1>Availble membership</h1>
            </div>
            <div>
                <?php 
                    $query="select * from membership";
                    $data=mysqli_query($cn,$query);
                    $count=mysqli_num_rows($data);
                    if($count!=0)
                    {
                ?>
                    <form method="post" >
                        <table class="table table-striped">
                            <tr>
                                <th>Package Id </th>
                                <th>Amount</th>
                                <th>Days </th>
                                <th>Personal Trainer </th>
                                <th>Full Access </th>
                                <th>Personal Locker </th>
                                <th>cardio </th>
                                <th>steam </th>
                                <th colspan="2" >Operations </th>
                            </tr>
                            <?php
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
                                    echo "Some Think Worng";
                                }
                                echo "<tr>
                                    <td>".$request['pid']."</td>
                                    <td>".$request['amount']."</td>
                                    <td>".$request['days']."</td>
                                    <td>".$trainer."</td>
                                    <td>".$access."</td>
                                    <td>".$locker."</td>
                                    <td>".$cardio."</td>
                                    <td>".$steam."</td>
                                    <td><a href='edit.php?pid=$request[pid]&amount=$request[amount]&days=$request[days]&trainer=$request[trainer]&access=[access]&locker=$request[locker]&cardio=$request[cardio]&steam=$request[steam]' >Edit   </a>
                                    <td><a href='delete.php?pid=$request[pid]' onclick='checkdel()'> Delete </a> </td>
                                    </tr>";
                            }
                    }
                    else
                    {
                        echo "<h3>No membership plan Available </h3>";
                    }
                    ?>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="add"  class="btn btn-success" value="Add Membership Package" />
                        </td>
                    </tr>
                    </table>
                </form>
            </div>
        </div>
        <script>
            function checkdel()
            {
                if(confirm("Are you sure want to Delete the membership ??"))
            }
        </script>
    </body>
</html>

<?php
    if(isset($_POST['add']))
    {
        echo "<script> window.location.href='add.php' </script>";
    }
?>
