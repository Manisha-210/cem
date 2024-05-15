<?php
include 'db_connection.php'; // Include database connection script

function deleteEvent($id) {
    global $conn;

    $sql = "DELETE FROM events WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

