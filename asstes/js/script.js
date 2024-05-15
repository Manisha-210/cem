document.addEventListener('DOMContentLoaded', function() {
    // Get current date
    var currentDate = new Date();
  
    // Display calendar
    displayCalendar(currentDate);
  
    // Event listeners for navigation buttons
    document.getElementById('prevMonthBtn').addEventListener('click', function() {
      currentDate.setMonth(currentDate.getMonth() - 1);
      displayCalendar(currentDate);
    });
  
    document.getElementById('nextMonthBtn').addEventListener('click', function() {
      currentDate.setMonth(currentDate.getMonth() + 1);
      displayCalendar(currentDate);
    });
  
    document.getElementById('prevYearBtn').addEventListener('click', function() {
      currentDate.setFullYear(currentDate.getFullYear() - 1);
      displayCalendar(currentDate);
    });
  
    document.getElementById('nextYearBtn').addEventListener('click', function() {
      currentDate.setFullYear(currentDate.getFullYear() + 1);
      displayCalendar(currentDate);
    });
  });
  
  function displayCalendar(date) {
    var calendar = document.getElementById('calendar');
    var year = date.getFullYear();
    var month = date.getMonth();
    var monthNames = ["January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December"
    ];
  
    // Display month and year
    calendar.innerHTML = "<h3>" + monthNames[month] + " " + year + "</h3>";
  
    // Calculate number of days in the month
    var numDays = new Date(year, month + 1, 0).getDate();
  
    // Display calendar days
    for (var i = 1; i <= numDays; i++) {
      calendar.innerHTML += "<div class='calendar-day'>" + i + "</div>";
    }
  }
// Function to handle event deletion
function deleteEvent(eventId) {
  // Send AJAX request to delete_event.php with event ID
  $.ajax({
      url: 'delete_event.php',
      type: 'POST',
      data: { eventId: eventId },
      success: function(response) {
          // Reload the calendar or update the UI as needed
          // For example, remove the deleted event from the UI
          $('#event_' + eventId).remove();
          console.log('Event deleted successfully');
      },
      error: function(xhr, status, error) {
          console.error('Error deleting event:', error);
      }
  });
}


  