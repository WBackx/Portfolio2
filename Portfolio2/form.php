<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
        <?php


$servername = "localhost";
$username = "Portfolio_Wouter";
$password = "p%9Gfa811";
$dbname = "Portfolio_Wb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Taking all 5 values from the form data(input)
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
        // Prepare the SQL statement to insert data
        $stmt = $conn->prepare("INSERT INTO Email_info (first_name, last_name, email, subject, message) 
            VALUES (:first_name, :last_name, :email, :subject, :message)");

        // Bind parameters to prepared statement
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':message', $message);

        // Execute the statement
        $stmt->execute();

        echo "<h3>Data stored in the database successfully.</h3>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

        // Close connection
        mysqli_close($conn);
        ?>
    
</body>

</html>
