<?php
    $insert=false;
    if(isset($_POST['name'])){
        $server="localhost";
        $username="root";
        $password="";

        $con=mysqli_connect($server, $username, $password);

        if(!$con){
            die("Connection to database failed due to ".mysqli_connect_error());
        }
        // echo "Successfully connected to database";

        $name = $_POST['name'];
        $age= $_POST['age'];
        $gender= $_POST['gender'];
        $email= $_POST['email'];
        $phone= $_POST['phone'];
        $decs= $_POST['decs'];

        $sql="INSERT INTO travel.trip (`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$decs', current_timestamp())";

        //echo $sql;

        if($con->query($sql)==true){
            //echo "Succesfully Inserted";
            $insert=true;
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }

        $con->close();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Welcome to Travel Form
    </title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container">
        <h1>Welcome to Travel form</h1>
        <p>Enter your details</p>
        <?php
            if($insert==true){
                echo "<p class='submitMsg'>Data successfully submited</p>";
            }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="decs" id="decs" cols="30" rows="10" placeholder="Enter any other information"></textarea>

            <button class="btn">Submit</button>

        </form>

    </div>
    <script src="index.js"></script>
</body> 
</html>