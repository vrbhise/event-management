<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event_management";

// Create connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the submitted form data
    $email = $_POST['email'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $team_size = $_POST['team_size'];

    // Get team member names
    $team_members = [];
    for ($i = 1; $i <= $team_size; $i++) {
        $team_members[] = $_POST["team_member_$i"];
    }

    // Convert the team members array to a string (to store in the database)
    $team_members_json = json_encode($team_members);

    // SQL query to insert data into the coding_competition table
    $sql = "INSERT INTO coding_competition (email, name, contact, team_size, team_members)
            VALUES ('$email', '$name', '$contact', '$team_size', '$team_members_json')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Registration Successful!</h2>";
       
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request method!";
}
?>


