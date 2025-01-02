<?php require_once "../Components/header.php" ?>

<?php require_once "../Components/navBar.php" ?>

<style>
    #countdown {
    background: #0a1323; /* Dark royal blue */
    font-family: 'Poppins', sans-serif;
    color: #ffffff;

    .circle {
        position: relative;
        width: 120px;
        height: 120px;
      }
      .circle svg {
        transform: rotate(-90deg);
      }
      .circle .progress {
        fill: none;
        stroke-width: 12;
        stroke-linecap: round;
        transform-origin: center;
      }
      .circle .background {
        fill: none;
        stroke: rgba(255, 255, 255, 0.1);
        stroke-width: 12;
      }
      .circle .label {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        font-weight: bold;
      }
  }
  
</style>



<div class="min-h-screen flex justify-center items-center flex-col">


    <!-- Countdown Timer Section -->
    <section id="countdown" class="p-10 text-center flex items-center justify-center mb-10 rounded-lg">
        <div class="countdown-container text-center space-y-8">
            <h1 class="text-3xl font-bold uppercase tracking-wide">
                Countdown to Voting Deadline
            </h1>
           

            <!-- Circular Progress Bars -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-10 justify-between items-center">
                <!-- Days -->
                <div class="circle">
                    <svg width="120" height="120">
                        <circle class="background" cx="60" cy="60" r="50"></circle>
                        <circle id="progress-days" class="progress text-yellow-400" cx="60" cy="60" r="50" stroke="#FFD700"></circle>
                    </svg>
                    <div class="label">
                        <span id="days" class="text-2xl">00</span><br />
                        <small>Days</small>
                    </div>
                </div>

                <!-- Hours -->
                <div class="circle">
                    <svg width="120" height="120">
                        <circle class="background" cx="60" cy="60" r="50"></circle>
                        <circle id="progress-hours" class="progress" cx="60" cy="60" r="50" stroke="#1E90FF"></circle>
                    </svg>
                    <div class="label">
                        <span id="hours" class="text-2xl">00</span><br />
                        <small>Hours</small>
                    </div>
                </div>

                <!-- Minutes -->
                <div class="circle">
                    <svg width="120" height="120">
                        <circle class="background" cx="60" cy="60" r="50"></circle>
                        <circle id="progress-minutes" class="progress" cx="60" cy="60" r="50" stroke="#32CD32"></circle>
                    </svg>
                    <div class="label">
                        <span id="minutes" class="text-2xl">00</span><br />
                        <small>Minutes</small>
                    </div>
                </div>

                <!-- Seconds -->
                <div class="circle">
                    <svg width="120" height="120">
                        <circle class="background" cx="60" cy="60" r="50"></circle>
                        <circle id="progress-seconds" class="progress" cx="60" cy="60" r="50" stroke="#FF4500"></circle>
                    </svg>
                    <div class="label">
                        <span id="seconds" class="text-2xl">00</span><br />
                        <small>Seconds</small>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <!-- Card with Soft Shadows -->
    <div class="w-[300px]">
        <h1 class="text-2xl font-semibold text-center text-gray-800 mb-10">Set Voting End Date</h1>

        <!-- Form Section with Minimalistic Inputs -->
        <form id="votingForm" action="../Controllers/save_voting_end.php" method="POST">
            <div class="mb-10">
                <label for="votingEndDate" class="block text-gray-700 text-sm font-medium mb-2">Select Voting End Date</label>
                <input type="datetime-local" id="votingEndDate" name="votingEndDate"
                    class="w-full p-3 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                    required>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="bg-indigo-600 text-white py-3 px-8 rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition duration-150">
                    Set Voting End Date
                </button>
            </div>
        </form>
    </div>



</div>


<script>
    // Fetch the voting end time from the PHP script using AJAX
fetch('../Controllers/get_voting_end.php')
  .then(response => response.json())  // Get the response in JSON format
  .then(data => {
    const votingEndDate = new Date(data);  // Convert the received string to a Date object
    const votingEndTimestamp = votingEndDate.getTime(); // Get timestamp in milliseconds

    // Now, start the countdown using the retrieved voting end time
    function updateCountdown() {
      const now = new Date().getTime();
      const distance = votingEndTimestamp - now;

      // Time calculations
      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Total time available (in ms)
      const totalTime = votingEndTimestamp - new Date().setHours(0, 0, 0, 0);  // Total time in a full day

      // Progress bar calculation for each unit (days, hours, minutes, seconds)
      const remainingDays = (distance / totalTime) * 100; // Progress in % for the whole time left
      const remainingHours = (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60) * 100; // Hour percentage
      const remainingMinutes = (distance % (1000 * 60 * 60)) / (1000 * 60) * 100; // Minute percentage
      const remainingSeconds = (distance % (1000 * 60)) / 1000 * 100; // Second percentage

            // Stop timer when time is up
            if (distance <= 0) {
        clearInterval(interval);
        document.querySelector('#countdown').innerHTML = "<h1 class='font-bold text-4xl text-red-600' >Voting Ended!</h1>"
      }

      // Update countdown text
      document.getElementById("days").textContent = days.toString().padStart(2, '0');
      document.getElementById("hours").textContent = hours.toString().padStart(2, '0');
      document.getElementById("minutes").textContent = minutes.toString().padStart(2, '0');
      document.getElementById("seconds").textContent = seconds.toString().padStart(2, '0');

      // Update progress bars with stroke-dasharray for circular SVG progress
      document.getElementById("progress-days").setAttribute("stroke-dasharray", `${remainingDays * 3.14}, 314`);
      document.getElementById("progress-hours").setAttribute("stroke-dasharray", `${remainingHours * 3.14}, 314`);
      document.getElementById("progress-minutes").setAttribute("stroke-dasharray", `${remainingMinutes * 3.14}, 314`);
      document.getElementById("progress-seconds").setAttribute("stroke-dasharray", `${remainingSeconds * 3.14}, 314`);


    }

    // Set up SVG progress circle
    document.querySelectorAll(".progress").forEach((circle) => {
      circle.setAttribute("stroke-dasharray", "314, 314"); // Ensure the circle starts from full
    });

    // Update countdown every second
    const interval = setInterval(updateCountdown, 1000);
  })
  .catch(error => {
    console.error('Error fetching voting end time:', error);
  });

</script>

</body>

</html>