<?php
include('config/db.php');

//get all from db
$sql="SELECT title,ingredients,id FROM pizzas ORDER BY created_at";

//make query
$result=mysqli_query($conn,$sql);

//fetch result

$pizzas=mysqli_fetch_all($result,MYSQLI_ASSOC);

//close connection
mysqli_free_result($result);
mysqli_close($conn);

// print_r($pizzas);


?>


<!DOCTYPE html>
<html>
<?php include('templates/header.php');?>
<a href="add.php" class='brand'>add a pizza</a>
<h4 class='brand'>pizzas!</h4>
<div class='container'>
    <div class="row">

    <!-- display all from db -->
<?php foreach ($pizzas as $pizza):?>
    <div class="col s6 md3">
    <div class="card-z-depth-0">
    <div class="card-content-center">
    <?php echo htmlspecialchars($pizza['id']);?>
    <h4><?php echo htmlspecialchars($pizza['title']);?></h4>
    <ul><?php foreach (explode(',',$pizza['ingredients']) as $ing): ?>
        <li><?php  echo htmlspecialchars($ing)?></li>
    <?php endforeach; ?>
</ul>
    </div>
    <div class="card-action-right-align">
    <a href="details.php?id=<?php echo $pizza['id']?>" class="brand">more info</a>
    </div>
    </div>
    </div>
<?php endforeach;?>
<?php 
define('AGE','twenty two');
echo 'this is my page   ';


$name='yoshi'; 
echo   $name;
?>
<?php echo AGE;?>
    </div>
</div>

<?php include('templates/footer.php');?>

</html>