<?php include 'connection.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css" /> 
    <style>
        
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
            font-size: 25px;
            color: #25354e;
            text-decoration: none;
            font-weight: 700;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: while;
        }

        li {
            float: left;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {background-color: #f5f5f5;}

        .delete-btn {
            background-color: #0096e2;
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
        .delete-btn:hover {background-color: #008dd8;}

    </style>
</head>
<body style="background: #1f75fe">
    <header class="header">
        <a href="http://localhost/web%20application/welcome.php" class="logo">BACK</a>
    </header>
    <div class="container" style="padding-top: 70px">
        <div class="row my-4">
            <div class="col-lg-20 mx-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Add Schedule</h4>
                    </div>
                    <div class="card-body p-10">
                        <form action="action.php" method="POST" name="add_form" id="add_form">
                            <div id="show_item">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <input type="text" name="d_name" class="form-control"
                                        placeholder="Name of the Drug" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="d_dose" class="form-control" min="0.25" max="10" step="0.25"
                                        placeholder="Drug quantity" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                    <label for="time">Enter the time:</label><br>
                                        <input type="checkbox" id="morning" name="d_time[]" value="m">
                                        <label for="morning"> Morning</label>
                                        <input type="checkbox" id="afternoon" name="d_time[]" value="a">
                                        <label for="afternoon"> Afternoon</label>
                                        <input type="checkbox" id="evening" name="d_time[]" value="e">
                                        <label for="evening"> Evening</label>
                                        <input type="checkbox" id="night" name="d_time[]" value="n">
                                        <label for="night"> Night</label>
                                    </div>

                                </div>
                            </div>

                            <div>
                                <input type="submit" value="Submit" class="btn btn-primary w-25" id="add_btn" onclick="return submitValidateForm()">
                            </div>

                        </form> 
                         
                    </div>
                    <div class="card-header">
                    <form action="" method="POST" name="time_form" id="time_form">
                            <ul id="time_list">
                                <?php
                                    $sql = "SELECT DISTINCT d_time FROM d_time_table";
                                    $result = mysqli_query($connection, $sql);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if($row['d_time']=='m'){
                                            echo "<li>Morning</li>";
                                            continue;
                                        }
                                        if($row['d_time']=='a'){
                                            echo "<li>Afternoon</li>";
                                            continue;
                                        }
                                        if($row['d_time']=='e'){
                                            echo "<li>Evening</li>";
                                            continue;

                                        }
                                        if($row['d_time']=='n'){
                                            echo "<li>Night</li>";
                                            continue;
                                        }
                                        
                                        //return array ($m, $a, $e, $n);
                                        //echo "<li>" . $row['d_time'] . "</li>";
                                    }
                                    $size= 4-mysqli_num_rows($result);
                                    for ($x = 0; $x < $size; $x++) {
                                        echo "<li>-</li>";
                                      }
                                ?>
                            </ul>
                            <input type="submit" value="Finish" class="btn btn-primary w-25" id="finish_btn">
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <!--retrive and delete data-->
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-20 mx-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Shedule</h4>
                    </div>
                    <div class="card-body p-10">
                        <form action="" method="POST" name="add_form" id="add_form">
                            <div id="show_item">
                                <div class="row">
                                <table>

                                    <?php
                                        // Retrieve data from the database
                                        $sql = "SELECT * FROM d_dose_table";
                                        $result = mysqli_query($connection, $sql);

                                        // Loop through the rows and display them in the table
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['d_name'] . "</td>";
                                            echo "<td>" . $row['d_dose'] . "</td>";
                                            echo "<td><form method='POST' action='delete.php'><input type='hidden' name='id' value='" . $row['d_name'] . "'><input type='submit' value='Delete' class='delete-btn'></form></td>";
                                            echo "</tr>";
                                        }

                                        // Close the database connection
                                        //mysqli_close($connection);
                                    ?>

                                </table>

                                </div>
                            </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    


<script>
    //validation

    function submitValidateForm(){
        let x=document.forms["add_form"]["d_name"].value;
            let y=document.forms["add_form"]["d_dose"].value;
            var valid=false;
            if(x==""){
                alert("Name of the Drug should be filled");
                return false;
            }
            else if(y==""){
                alert("Drug Quantity should be filled");
                return false;
            }


            else if(document.getElementById("morning").checked){
                valid=true;
            }
            else if(document.getElementById("afternoon").checked){
                valid=true;
            }
            else if(document.getElementById("evening").checked){
                valid=true;
            }
            else if(document.getElementById("night").checked){
                valid=true;
            }

           
            else{
                alert("Select atleast one checkbox");
                return false;
            }
    }

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/7.14.1-0/firebase.js"></script>
<script src="main.js" type="module"></script>

</body>
</html>
        



