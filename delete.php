<?php 
    include "connection.php";
?>

<?php 
    $pid=$_GET['pid'];  
    $delete='delete from membership where pid='.$_GET["pid"];
    if(mysqli_query($cn,$delete))
    {
        header("Location:member.php");
        exit();
    }
    else
    {
        echo "Some thinng Wrong";
    }
?>