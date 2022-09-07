<?php
include('config/db.php');

//delete 1 from db
if (isset($POST['delete'])) {
    $id_to_delete=mysqli_real_escape_string($conn,$_POST['id']);
    $sql="DELETE * FROM pizzas WHERE id= $id_to_delete";

//make query
if(mysqli_query($conn,$sql)){
header('location:index.php');
} else{
    echo 'error:'.mysqli_error($conn);
}
}


//get 1 from db
if (isset($_GET['id'])) {
    $id=mysqli_real_escape_string($conn,$_GET['id']);
    $sql="SELECT * FROM pizzas WHERE id= $id";

//make query
$result=mysqli_query($conn,$sql);

//fetch result

$pizza=mysqli_fetch_assoc($result);

//free result/close connection
mysqli_free_result($result);
mysqli_close($conn);

// print_r($pizza);
}


?>

<html>
<?php include('templates/header.php');?>
<h2>details</h2>

<!-- display 1 pizza details -->
<div class="brand">
    <?php if ($pizza):?>
        <h4>pizza type:<?php echo $pizza['Title'];?></h4>
        <h4>date created:<?php echo $pizza['Created_at'];?></h4>
        <h4>ingredients: <?php echo $pizza['Ingredients'];?></h4>
<!-- delete 1 pizza from db-->
        <form action="details.php" method="POST">
<input type="hidden" name='id_to_delete' value='<?php echo $pizza['id']?>'>
<input type="submit" name='delete' value="Delete">
    </form>
    <!-- update 1 pizza on db -->
    <form action="details.php" method="POST">
<input type="hidden" name='id_to_update' value='<?php echo $pizza['id']?>'>
<input type="submit" name='update' value="Update">
    </form>

        <?php else:?>
            <h4>no such pizza!</h4>
<?php endif;?>
    </div>


<?php include('templates/footer.php');?>

</html>