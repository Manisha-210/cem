<?php
include 'db_connection.php'; // Include database connection script

// CREATE operation: Add a new event to the database
function addEvent($title, $date, $time, $location, $description) {
    global $conn;
    $title = mysqli_real_escape_string($conn, $title);
    $date = mysqli_real_escape_string($conn, $date);
    $time = mysqli_real_escape_string($conn, $time);
    $location = mysqli_real_escape_string($conn, $location);
    $description = mysqli_real_escape_string($conn, $description);

    $sql = "INSERT INTO events (title, date, time, location, description) 
            VALUES ('$title', '$date', '$time', '$location', '$description')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// READ operation: Get all events from the database
function getEvents() {
    global $conn;

    $sql = "SELECT * FROM events";
    $result = $conn->query($sql);

    $events = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
    }
    return $events;
}

// UPDATE operation: Update an existing event in the database
function updateEvent($id, $title, $date, $time, $location, $description) {
    global $conn;
    $title = mysqli_real_escape_string($conn, $title);
    $date = mysqli_real_escape_string($conn, $date);
    $time = mysqli_real_escape_string($conn, $time);
    $location = mysqli_real_escape_string($conn, $location);
    $description = mysqli_real_escape_string($conn, $description);

    $sql = "UPDATE events 
            SET title='$title', date='$date', time='$time', location='$location', description='$description' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}




// Include database connection script
include 'db_connection.php';

// Function to delete an event from the database
function deleteevn($eventId) {
    global $conn;
    // Prepare and execute SQL statement to delete event with given ID
    $sql = "DELETE FROM events WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eventId);
    if ($stmt->execute()) {
        // Event deleted successfully
        return true;
    } else {
        // Error deleting event
        return false;
    }
}


