function toggleSidebar() {
  var sidebar = document.getElementById("side-nav");
  var body = document.body;
  
  // Toggle the 'open' class on the sidebar
  sidebar.classList.toggle("open");
  
  // Toggle a class on the body to indicate whether the sidebar is open or closed
  if (sidebar.classList.contains("open")) {
      body.classList.add("shifted");
  } else {
      body.classList.remove("shifted");
  }
}

document.addEventListener('DOMContentLoaded', function() {
  const calendarDays = document.querySelectorAll('.calendar .day');
  
  calendarDays.forEach(function(day) {
    day.addEventListener('click', function() {
      const date = this.getAttribute('rel');
      // Here you would open a modal or navigate to a detail view
      // For example, you could open a form to add an event
      console.log('Date clicked:', date);
      // You might use AJAX here to send a request to the server
    });
  });
});

