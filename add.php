<?php
include('templates/header.php');
include('config/db.php');

$title=$email=$ingredients='';
$errors=array('email'=>'','title'=>'','ingredients'=>'');

if (isset($_POST['submit'])) {
   
//validation
//check email
if (empty($_POST['Email'])) {
$errors['email']= 'email is required <br/>';
}else {
    $Email=$_POST['Email'];
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $errors['email']= 'email adress must be valid';
    }
}
//check title
if (empty($_POST['Title'])) {
    $errors['title'] ='title is required <br/>';
    }else {
        $Title=$_POST['Title'];
        // if (!preg_match($title,'/^[a-zA-Z\s]+$/')) {
        //     $errors['title']= 'titles must be valid';
        // }
    }
//check ingredients
    if (empty($_POST['Ingredients'])) {
        $errors['ingredients']= 'ingredients required <br/>';
        }else {
            $Ingredients= $_POST['Ingredients'];

            // if (!preg_match($ingredients,'')) {
            //     $errors['email']= 'email adress must be valid';
            // }
        }
//redirect to homepage
        if(array_filter($errors)){
            echo 'form has errors';
        }else {
            //prevent sql injection to db;
            $email=mysqli_real_escape_string($conn,$_POST['Email']);
            $title=mysqli_real_escape_string($conn,$_POST['Title']);
            $ingredients=mysqli_real_escape_string($conn,$_POST['Ingredients']);
            
            //add to db
            $sql="INSERT INTO pizzas(email,title,ingredients) VALUES('$Email','$Title','$Ingredients')";
            
            //save to db and check
            if (mysqli_query($conn,$sql)) {
                header('Location:index.php');
                
            }else {
                echo 'query error:'.mysqli_error($conn);
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<div class='container'>
    <form class='brand'action="add.php" method="POST">
    <label>email</label>
    <input type="email" name="" id="">
    <div class='error'><?php  echo $errors['email'] ;?></div>
    <label>pizza type</label>
    <input type="text" name='title'>
    <div class='error'><?php  echo $errors['title'] ;?></div>
    <label>ingredients:</label>
    <input type="text" name='ingredients'>
    <div class='error'><?php  echo $errors['title'] ;?></div>
    <div>
        <input type="submit" value="submit" class='brand'>
    </div>
</form>
</div>

<?php include('templates/footer.php');?>

</html>