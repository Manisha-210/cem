<?php
include 'mainphp/header.php';
include 'backend/auth.php'; // Include backend script for user authentication

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form data (you can add more validation as needed)

    // Authenticate user
    if (login($email, $password)) {
        // User authenticated successfully, redirect to index.php or any other page
        header("Location: index.php");
        exit();
    } else {
        // Authentication failed, display error message
        echo "Invalid email or password.";
    }
}
?>

<div class="container">
    <h2>Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<?php include 'mainphp/footer.php'; ?>
