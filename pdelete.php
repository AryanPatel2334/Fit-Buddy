<?php 
    include "connection.php";
?>

<?php 
    $pid=$_GET['pid'];  
    $ch="select * from product_buy where pid=$pid";
    $ct=mysqli_query($cn,$ch);
    $count=mysqli_num_rows($ct);
    if($count>0)
    {
        echo"<script> alert('This product can not delete Because This product is buy from the Customer'); </script>";
        header("Location:product.php");
        
    }
    else
    {
        $delete='delete from product where pid='.$_GET["pid"];
        if(mysqli_query($cn,$delete))
        {
            echo"<script> alert(' Delete successfully...'); </script>";
            header("Location:product.php");
            exit();
        }
        else
        {
            echo "Some thing is Wrong";
        }
    }
   
   
?>