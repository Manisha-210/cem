<?php
include 'backend/events.php'; // Include backend script for CRUD operations
include 'mainphp/header.php';
$events = getEvents(); // Get all events from the database
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendar App</title>
  <link href="asstes/css/style.css" rel="stylesheet">
  <!-- Include Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <h1 class="mt-5 mb-4">Calendar</h1>

    <!-- Calendar Navigation Controls -->
    <div class="row mb-3">
      <div class="col-md-6">
        <button class="btn btn-primary mr-2" id="prevMonthBtn">&lt; Prev Month</button>
        <button class="btn btn-primary" id="nextMonthBtn">Next Month &gt;</button>
      </div>
      <div class="col-md-6 text-right">
        <button class="btn btn-secondary mr-2" id="prevYearBtn">&lt;&lt; Prev Year</button>
        <button class="btn btn-secondary" id="nextYearBtn">Next Year &gt;&gt;</button>
      </div>
    </div>

    <!-- Calendar Interface -->
    <div id="calendar" class="mb-4"></div>

    <!-- Event Listing -->
    <h3>Events</h3>
    <ul id="eventList">
      <?php foreach ($events as $event): ?>
        <li><?php echo $event['title']; ?> - <?php echo $event['date']; ?></li>
        <button onclick="deleteEvent(<?php echo $event['id']; ?>)">Delete</button>
      <?php endforeach; ?>
    </ul>


    <div class="container">
      <h1>Calendar</h1>
      <!-- Event listing section -->
      <div id="event-list">
        <?php
        // Retrieve events from the database and display them
        $events = getEvents(); // Implement this function in events.php to fetch events from the database
        foreach ($events as $event) {
          echo "<div class='event'>";
          echo "<h3>{$event['title']}</h3>";
          echo "<p>Date: {$event['date']}</p>";
          echo "<p>Time: {$event['time']}</p>";
          echo "<p>Location: {$event['location']}</p>";
          echo "<p>Description: {$event['description']}</p>";
          echo "</div>";
        }
        ?>
      </div>
    </div>



  </div>

  </div>


  <!-- Include Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Include custom script for calendar functionality -->
  <script src="asstes/js/script.js"></script>
  <?php include 'mainphp/footer.php'; ?>

</body>

</html>