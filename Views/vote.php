<?php require_once "../Components/header.php" ?>

<div id="votePage" class="bg-gray-100 text-gray-900">

    <?php require_once "../Components/navBar.php" ?>

    <!-- Hero Section -->
    <section id="Hero" class="text-center relative bg-cover bg-center pb-10 mx-auto"
        style="background-image: url('../Images/vote-hero.jpg')">

        <div class="bg-white z-10 flex flex-col items-center py-5 sticky w-full header">

            <h1 class="text-blue-500 sm:text-5xl md:text-6xl font-bold mb-3">
                Electrical Engineering Major
            </h1>

            <p class="text-lg text-black sm:text-xl md:text-2xl mb-2 opacity-50">
                Help your favorite contestants shine by casting your vote today!
            </p>

            <!-- Filter Buttons -->
            <div class="flex gap-3 md:gap-12 sm:gap-12 mt-10">
                <button id="filterKingBtn"
                    class="flex justify-center w-40 items-center bg-blue-500 text-lg md:text-2xl font-bold text-white py-3 px-5 rounded hover:bg-blue-700 transition">
                    <i class="fas fa-crown text-white mr-2 md:mr-4 cursor-pointer" id="kingIcon"></i>
                    <span>King</span>
                </button>

                <button id="filterQueenBtn"
                    class="flex justify-center w-40 items-center bg-pink-500 text-lg md:text-2xl font-bold text-white py-3 px-5 rounded hover:bg-pink-700 transition">
                    <i class="fas fa-crown text-white mr-2 md:mr-4 cursor-pointer" id="queenIcon"></i>
                    <span>Queen</span>
                </button>
            </div>

            <!-- Voting Timer -->
            <div id="timer" class="space-y-6 relative md:absolute sm:absolute bottom-10 right-10">
                <h1 class="text-xl opacity-50">Voting Ends In</h1>
                <div class="flex justify-center gap-4 text-sm items-center">
                    <div class="flex flex-col items-center text-yellow-300">
                        <span id="days" class="text-3xl font-bold">00</span>
                        <span>Days</span>
                    </div>
                    <div class="flex flex-col items-center text-blue-500">
                        <span id="hours" class="text-3xl font-bold">00</span>
                        <span>Hours</span>
                    </div>
                    <div class="flex flex-col items-center text-green-400">
                        <span id="minutes" class="text-3xl font-bold">00</span>
                        <span>Minutes</span>
                    </div>
                    <div class="flex flex-col items-center text-red-600">
                        <span id="seconds" class="text-3xl font-bold">00</span>
                        <span>Seconds</span>
                    </div>
                </div>
                <p id="expired" class="hidden text-xl font-semibold text-red-500">
                    Voting has ended!
                </p>
            </div>

        </div>

        <div class="flex items-center justify-center mt-10 h3 text-blue-500">
            <h3 class="text-3xl font-bold mr-5">Contestants For King </h3>
            <i class="fas fa-crown cursor-pointer text-3xl" id="kingIcon"></i>
        </div>

        <div id="filter_king" class="grid mt-12 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-12 px-10 max-w-8xl m-auto">
            <!-- Contestants for King will be displayed here -->
        </div>

        <div id="filter_queen" class="grid mt-12 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-12 hidden px-10 max-w-8xl m-auto">
            <!-- Contestants for Queen will be displayed here -->
        </div>

    </section>

</div>

<!-- Include JavaScript for Timer and Filtering -->
<script>
    const daysEl = document.getElementById("days");
    const hoursEl = document.getElementById("hours");
    const minutesEl = document.getElementById("minutes");
    const secondsEl = document.getElementById("seconds");
    const expiredEl = document.getElementById("expired");

    // Set the voting deadline date and time
    const deadline = new Date("2024-12-31T23:59:59").getTime();

    // Countdown function to update the timer
    const updateCountdown = () => {
        const now = new Date().getTime();
        const distance = deadline - now;

        if (distance <= 0) {
            clearInterval(interval);
            document.getElementById("timer").classList.add("hidden");
            expiredEl.classList.remove("hidden");
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        daysEl.textContent = days.toString().padStart(2, "0");
        hoursEl.textContent = hours.toString().padStart(2, "0");
        minutesEl.textContent = minutes.toString().padStart(2, "0");
        secondsEl.textContent = seconds.toString().padStart(2, "0");
    };

    const interval = setInterval(updateCountdown, 1000);
    updateCountdown();

    const filterKing = document.querySelector("#filter_king");
    const filterQueen = document.querySelector("#filter_queen");
    const filterKingBtn = document.querySelector("#filterKingBtn");
    const filterQueenBtn = document.querySelector("#filterQueenBtn");

    // Fetch contestants data
    fetch("../Controllers/getMajorContestants.php")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Failed to fetch contestants data");
            }
            return response.json();
        })
        .then((data) => {
            // If no contestants are found, display a message
            if (!data || data.length === 0) {
                filterKing.innerHTML = '<p class="text-gray-700">No data available</p>';
                filterQueen.innerHTML = '<p class="text-gray-700">No data available</p>';
                return;
            }

            let king = ``;
            let queen = ``;

            // Generate HTML for each contestant
            data.forEach((contestant) => {
                const cardHTML = `
                    <div class="bg-white rounded-xl shadow-lg contestant-card p-5 card-hover">
                        <div class="relative">
                            <img class="w-full h-60 object-cover" src="${contestant.profileImg || '../uploads/contestants/contestant3.jpg'}" alt="Profile image of ${contestant.name}" />
                            <div class="flex absolute left-5 bottom-5 items-center text-sm">
                                <span class="w-16 h-16 text-3xl font-bold bg-blue-100 text-blue-800 flex items-center justify-center rounded-full mr-3">
                                    ${contestant.contestant_no}
                                </span>
                            </div>
                        </div>
                        <div class="mb-6">
                            <h1 class="text-2xl font-bold text-blue-800 my-4">${contestant.name}</h1>
                            <p class="mb-3">Major - ${contestant.major}</p>
                        </div>
                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-3 text-center">Vote Now</a>
                    </div>`;

                if (contestant.gender === "Male") {
                    king += cardHTML;
                } else {
                    queen += cardHTML;
                }
            });

            filterKing.innerHTML = king || '<p class="text-gray-700">No contestants available for King.</p>';
            filterQueen.innerHTML = queen || '<p class="text-gray-700">No contestants available for Queen.</p>';
        })
        .catch((error) => {
            console.error("Error fetching contestants:", error);
            filterKing.innerHTML = '<p class="text-red-600">Error loading King contestants. Please try again later.</p>';
            filterQueen.innerHTML = '<p class="text-red-600">Error loading Queen contestants. Please try again later.</p>';
        });

    // Add event listeners for filtering
    filterKingBtn.addEventListener("click", () => {
        toggleContestantsVisibility(filterKing, filterQueen);
        document.querySelector("#Hero .h3").innerHTML = `
            <h3 class="text-3xl font-bold mr-5">Contestants For King </h3>
            <i class="fas fa-crown cursor-pointer text-3xl" id="kingIcon"></i>
        `;
    });

    filterQueenBtn.addEventListener("click", () => {
        toggleContestantsVisibility(filterQueen, filterKing);
        document.querySelector("#Hero .h3").innerHTML = `
            <h3 class="text-3xl font-bold mr-5 text-pink-500">Contestants For Queen </h3>
            <i class="fas fa-crown cursor-pointer text-3xl text-pink-500" id="kingIcon"></i>
        `;
    });

    // Function to toggle visibility of contestants
    function toggleContestantsVisibility(showElement, hideElement) {
        showElement.classList.remove("hidden");
        hideElement.classList.add("hidden");
    }
</script>

<?php require_once "../Components/footer.php" ?>
