<?php
include 'mainphp/header.php';
include 'backend/auth.php'; // Include backend script for user authentication

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form data (you can add more validation as needed)

    // Insert user data into database
    if (register($username, $email, $password)) {
        // User registered successfully, redirect to login page
        header("Location: login.php");
        exit();
    } else {
        // Error occurred while registering user, display error message
        echo "Error: Unable to register user.";
    }
}
?>

<div class="container">
    <h2>Register</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<?php include 'mainphp/footer.php'; ?>
