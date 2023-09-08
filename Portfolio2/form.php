<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
        <?php



    $con = mysqli_connect("localhost", "root", "p%9Gfa811", "Portfolio_Wouter");

    echo ($con);
        // Taking all 5 values from the form data(input)
        $first_name = $_REQUEST['first-name'];
        $last_name = $_REQUEST['last-name'];
        $email = $_REQUEST['email'];
        $subject = $_REQUEST['subject'];
        $message = $_REQUEST['message'];

        // We are going to insert the data into our sampleDB table
        $sql = "INSERT INTO Email_info VALUES ('$first_name',
            '$last_name','$email','$subject','$message')";
        echo ($sql);
        echo (  $first_name);
        echo ( $last_name);
        echo ($email);

        // Check if the query is successful
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";

            echo ("\n$first_name\n $last_name\n "
                . "$email\n $subject\n $message");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        ?>
    
</body>

</html>