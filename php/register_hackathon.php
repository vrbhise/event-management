<?php
require 'connect.php';
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    
    $email = $_POST['email'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $team_size = $_POST['team_size'];
    $problem_statement = $_POST['problem_statement'];

    // Prepare an array for team members
    $team_members = [];
    for ($i = 1; $i <= $team_size; $i++) {
        $team_members[] = $_POST["team_member_$i"];
    }

    // Convert team members array to JSON format
    $team_members_json = json_encode($team_members);

    // Insert into the database
    $sql = "INSERT INTO hackathon_registrations (email, name, contact, team_size, team_members, problem_statement) 
            VALUES ('$email', '$name', '$contact', '$team_size', '$team_members_json', '$problem_statement')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Registration successful!<h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>
