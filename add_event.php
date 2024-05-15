<?php
include 'mainphp/header.php';
include 'backend/events.php'; // Include backend script for CRUD operations

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST['title'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    // Validate form data (you can add more validation as needed)

    // Insert event data into database
    if (addEvent($title, $date, $time, $location, $description)) {
        // Event added successfully, redirect to index.php or display success message
        header("Location: index.php");
        exit();
    } else {
        // Error occurred while adding event, display error message
        echo "Error: Unable to add event.";
    }
}
?>

<div class="container">
    <h2>Add Event</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" id="location" name="location">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Event</button>
    </form>
</div>

<?php include 'mainphp/footer.php'; ?>
