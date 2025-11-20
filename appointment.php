<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book an Appointment | FurEver Care</title>
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_green.css">
</head>
<body>

  <?php include 'partials/navbar.php'; ?>

  <section class="hero">
    <h1>Book an Appointment</h1>
    <p>Schedule a visit with our expert veterinarians. We’ll make sure your furry friends receive the care they deserve.</p>
  </section>

  <section class="section alt-bg">
    <div class="container"> <h2>Appointment Form</h2>
        
        <?php if(isset($_GET['error']) && $_GET['error'] == 'date_taken'): ?>
            <div class="alert alert-danger text-center">Sorry, that date was just booked by someone else. Please choose another.</div>
        <?php endif; ?>

        <form class="comment-form" action="process_appointment.php" method="POST">
          <input type="text" name="owner_name" placeholder="Your Full Name" required>
          <input type="email" name="email" placeholder="Your Email" required>
          <input type="text" name="phone" placeholder="Your Phone Number" required>
          <input type="text" name="pet_name" placeholder="Your Pet’s Name" required>

          <select name="pet_type" required>
            <option value="" disabled selected>Select Pet Type</option>
            <option value="Dog">Dog</option>
            <option value="Cat">Cat</option>
            <option value="Other">Other</option>
          </select>

          <select name="service" required>
            <option value="" disabled selected>Select Service</option>
            <option value="Check-up">General Check-up</option>
            <option value="Vaccination">Vaccination</option>
            <option value="Grooming">Grooming</option>
            <option value="Surgery">Surgery</option>
          </select>

          <label for="date">Preferred Date</label>
          <input type="text" id="date" name="date" placeholder="Select a Date" required style="background-color: white;">

          <label for="time">Preferred Time</label>
          <input type="time" id="time" name="time" required>

          <textarea name="notes" rows="4" placeholder="Additional Notes (optional)"></textarea>

          <button type="submit" class="btn-primary">Book Appointment</button>
        </form>
    </div>
  </section>

  <?php include 'partials/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fetch the booked dates from our PHP API
        fetch('php/get_booked_dates.php')
            .then(response => response.json())
            .then(bookedDates => {
                
                // Initialize the date picker
                flatpickr("#date", {
                    minDate: "today", // Can't pick past dates
                    dateFormat: "Y-m-d", // Database friendly format
                    disable: bookedDates, // This disables the specific dates!
                    onChange: function(selectedDates, dateStr, instance) {
                        // Optional: You could add logic here to warn them if they try to type it manually
                    }
                });

            })
            .catch(error => console.error('Error fetching dates:', error));
    });
  </script>
</body>
</html>
