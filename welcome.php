<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');
        *{
            font-family: 'Poppins', sans-serif;
            margin:0; padding:0;
            box-sizing: border-box;
            outline: none; 
            border:none;
            text-decoration: none;
            align-items:center;
            justify-content: center;
        }

        .header{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 16px 10%;
            background: transparent;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100;
            box-shadow: 0 5px 10px rgba(0,0,0,.1);
        }

        .logo{
            font-size: 18px;
            color: #367588;
            text-decoration: none;
            font-weight: 600;
        }
 
        body{
            background: #333;
            align-items:center;
            justify-content: center;
            background: url('image-med-app-4.jpg') no-repeat;
            background-size: auto;
        }
        .container {
            border-radius: 7px;
            box-shadow: 0 5px 10px rgba(0,0,0,.1);
            min-height: 70vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding:20px;
            padding-bottom: 60px;
            background: #fff;
            text-align: center;
            width: 500px;
            margin:auto;
            margin-top: 100px;
        }
        .container .content h3{
            font-size: 30px;
            color:#333;
        }

        .username {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .button-container {
            margin-top: 40px;
        }

        .button-container button{
            /*width: 200px;
            margin-bottom: 20px;
            display: block;
            background: #fbd0d9;
            color:crimson;
            text-transform: capitalize;
            font-size: 13px;
            cursor: pointer;
            padding:10px 30px;*/

            width: 270px;
            display: block;
            background: #A4DDED;
            color:#002147;
            text-transform: capitalize;
            font-size: 20px;
            cursor: pointer;
            padding:10px 30px;
            margin-top: 40px;
            border-radius: 5px;
        }

        .button-container button:hover{
            background: #002147;
            color:#A4DDED;
        }
    </style>
</head>
<body>
    <header class="header">
    <a href='logout.php' class="logo">LOGOUT</a>
    </header>
    
    <div class="container">
        <div class="content">
        <h3>Welcome</h3>
        <?php
        // Establish database connection
        @include "config.php";
        session_start();
        // Retrieve username from the database
        $userId = $_SESSION['user_name'];
        /*$sql = "SELECT username FROM users WHERE username = '$userId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user_name = $row['username'];
        }*/

        echo "<div class='username'>Welcome, " . $userId . "</div>";

        $conn->close();
        ?>
        <div class="button-container">
            <button onclick="window.location.href='medicine form/index.php'">Medicine Schedule</button>
            <button onclick="window.location.href='graphs/newwChamo.php'">Patient Details</button>
        </div>
        <!--<div><a href='logout.php'>Logout</a></div>-->
        </div>
    </div>
</body>
</html>
