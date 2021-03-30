<?php 
    
    //include('header.php');
    
    
    /*if(isset($_GET['submit'])){
        echo $_GET['email'];
        echo $_GET['title'];
        echo $_GET['ingredients'];
    }*/

    $title = $email = $ingredients = ""; 

    $errors = array('email'=>'', 'title'=>'', 'ingredients'=>'');

    if(isset($_POST['submit'])){
        //echo htmlspecialchars($_POST['email']);
        //echo htmlspecialchars($_POST['title']);
        //echo htmlspecialchars($_POST['ingredients']);


        //check 
        if(empty($_POST['email'])){
            $errors['email'] = "an email is required"."<br>";
        }else{
            //echo htmlspecialchars($_POST['email']);
            $email = $_POST['email'];
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                //echo "must be valid email address"."<br>";
                $errors['email'] = 'must be valid email address';
            }
        }


        if(empty($_POST['title'])){
            $errors['title'] = "an title is required"."<br>";
        }else{
            //echo htmlspecialchars($_POST['title']);
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
                //echo 'title must be valid'."<br>";
                $errors['title'] = 'title must be valid ';
            }
    
        }
//comma eke dala hadana eke pregmatch eka hariyata enne ne
        /*if(empty($_POST['ingredients'])){
            $errors['ingredients'] = "an ingredients is required"."<br>";
        }else{
            //echo htmlspecialchars($_POST['ingredients']);
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s])*)*$/',$ingredients)){
                //echo 'ingredient must be valid'."<br>";
                $errors['ingredients'] = 'ingredients must be valid ';
            }
     
        }*/



        if(empty($_POST['title'])){
            $errors['title'] = "an title is required"."<br>";
        }else{
            //echo htmlspecialchars($_POST['title']);
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
                //echo 'title must be valid'."<br>";
                $errors['title'] = 'title must be valid ';
            }
    
        }





        if(array_filter($errors)){

        }else{
           header('Location: index.php');
        }



    }



?>

<!DOCTYPE html>

<html lang="en">

    <?php include('templates/header.php')?>

    
    <section class="container grey-text">
        <h4 class="center">Add Item</h4>
        <form action="add.php" method="POST" class="white">
            <label>Your email</label>
            <input type="text" name="email" value="<?php echo $email ?>">
            <div class="red-text"><?php echo $errors['email']; ?></div>


            <label>Item Name</label>
            <input type="text" name="title" value="<?php echo $title ?>"> 
            <div class="red-text"><?php echo $errors['title']; ?></div>


            <label>Ingredients</label>
            <input type="text" name="ingredients" value="<?php echo $ingredients ?>">
            <div class="red-text"><?php echo $errors['ingredients']; ?></div>

            <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php')?>
    
</html>