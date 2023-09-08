<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
    <center>
        <?php

$servername = "localhost";
$username = "Portfolio_Wouter";
$password = "p%9Gfa811";

try {
  $conn = new PDO("mysql:host=$servername;dbname=Portfolio_Wb", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

        // Taking all 5 values from the form data(input)
        $first_name = $_REQUEST['first-name'];
        $last_name = $_REQUEST['last-name'];
        $email = $_REQUEST['email'];
        $subject = $_REQUEST['subject'];
        $message = $_REQUEST['message'];

        // We are going to insert the data into our sampleDB table
        $sql = "INSERT INTO Email_info VALUES ('$first_name',
            '$last_name','$email','$subject','$message')";


        // Check if the query is successful
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";

            echo nl2br("\n$first_name\n $last_name\n "
                . "$email\n $subject\n $message");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>

</html>