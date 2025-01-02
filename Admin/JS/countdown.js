fetch('../Controllers/get_voting_end.php')
  .then(response => response.json())  // Get the response in JSON format
  .then(data => {

const votingEndDate = new Date(data).getTime();

function updateCountdown() {
  const now = new Date().getTime();
  const distance = votingEndDate - now;

  const totalSecondsInDay = 24 * 60 * 60;
  const totalSecondsInHour = 60 * 60;
  const totalSecondsInMinute = 60;

  // Time calculations
  const days = Math.floor(distance / (1000 * 60 * 60 * 24));
  const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Opposite progress calculation
  const totalDays = Math.ceil((votingEndDate - new Date(votingEndDate).setHours(0, 0, 0, 0)) / (1000 * 60 * 60 * 24));
  const remainingDays = (days / totalDays) * 100;
  const remainingHours = (hours / 24) * 100;
  const remainingMinutes = (minutes / 60) * 100;
  const remainingSeconds = (seconds / 60) * 100;

  // Update text
  document.getElementById("days").textContent = days.toString().padStart(2, '0');
  document.getElementById("hours").textContent = hours.toString().padStart(2, '0');
  document.getElementById("minutes").textContent = minutes.toString().padStart(2, '0');
  document.getElementById("seconds").textContent = seconds.toString().padStart(2, '0');

  // Update progress bars
  document.getElementById("progress-days").setAttribute("stroke-dasharray", `${remainingDays * 3.14}, 314`);
  document.getElementById("progress-hours").setAttribute("stroke-dasharray", `${remainingHours * 3.14}, 314`);
  document.getElementById("progress-minutes").setAttribute("stroke-dasharray", `${remainingMinutes * 3.14}, 314`);
  document.getElementById("progress-seconds").setAttribute("stroke-dasharray", `${remainingSeconds * 3.14}, 314`);

  // Stop timer when time is up
  if (distance < 0) {
    clearInterval(interval);
    document.querySelector("body").innerHTML = `
      <div class="text-center text-3xl font-bold text-red-400">Voting has ended!</div>
    `;
  }
}

// Set up SVG progress circle
document.querySelectorAll(".progress").forEach((circle) => {
  circle.setAttribute("stroke-dasharray", "314, 314");
});

// Update countdown every second
const interval = setInterval(updateCountdown, 1000);

})
.catch(error => {
  console.error('Error fetching voting end time:', error);
});