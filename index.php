<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $message = $_POST['message'];
    $submiton= isset( $_POST['submiton']);
    $sql = "INSERT INTO `portfoliofrom`.`form` (`name`, `email`, `mobile`, `message`,`submiton`) VALUES ('$name',  '$email', '$mobile', '$message', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./Connecttome.css">
</head>
<body>
    <!-- <img class="bg" src="./pexels-andrew-neel-3178786.jpg" alt=""> -->
    <div class="container">
        <h1>wanna have chat?</h3>
        <p>Let's meet on coffee </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We will meet soon</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="mobile" name="mobile" id="mobile" placeholder="Enter your mobile">
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="./script.js"></script>
    
</body>
</html>
