<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   <header class="header">
        <a href="home.php" class="logo">BACK</a>
   </header>
   
   <div class="form-container">

    <form action="re_data_store.php" method="POST">
    <h2>Registration Now</h2>
         <?php
            /*if(isset($error)){
            foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
            };
         };*/
         ?>

        <input type="text" name="username" id="username" required placeholder="enter your name"><br>
        <input type="date" name="dob" id="dob" required><br>
        <input type="email" name="email" id="email" required placeholder="enter your email"><br>
        <input type="password" name="password" id="password" required placeholder="enter your password"><br>
        <input type="password" name="confirm_password" id="confirm_password" required placeholder="confirm your password"><br>
        <div class="radio_btn">
        <label>Gender:</label>
        <div><input type="radio" name="gender" value="Male" required>Male</div>
        <div><input type="radio" name="gender" value="Female" required>Female</div><br>
        </div>

        <input type="submit" value="Register" class="form-btn"><br>

        <p>Already have an account? <a href="login_form.php">login now</a></p>
    </form>
</div>

</body>
</html>