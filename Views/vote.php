<?php
session_start();

echo $_SESSION['voteKingId'];

echo $_SESSION['voteQueenId'];

require_once "../Components/header.php"

?>


<div id="votePage" class="bg-gray-100 text-gray-900">

    <!-- Confirm Vote Modal -->
    <div id="matchModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50 bg-blur p-2">
        <div class="bg-white rounded-xl shadow-lg p-6 max-w-lg w-full text-center relative">
            <div class="flex w-full justify-center items-center text-sm mb-6">
                <span class="w-20 h-20 text-3xl font-bold bg-blue-100 text-blue-800 flex items-center justify-center rounded-full mr-3">
                    <i class="fa-solid fa-question fa-shake text-blue-400"></i>
                </span>
            </div>

            <h2 class="text-xl font-extrabold text-gray-800 mb-4">Confirm Your Selection</h2>
            <p class="text-gray-600 mb-6 text-xl md:text-xl prose text-justify">
                Are you sure you want to vote for
                <span id="matchContestantName" class="font-bold text-gray-800"></span> (#<span id="matchContestantNumber" class="font-bold text-gray-800"></span>)?
                Once submitted, votes cannot be changed.
            </p>
            <div class="flex justify-evenly">
                <button id="closeMatchModal" class="bg-gray-300 text-gray-700 font-medium px-5 py-3 rounded-lg hover:bg-gray-400 transition duration-200">
                    Cancel
                </button>
                <button id="confirmMatchVote" class="bg-blue-500 text-white font-medium px-3 py-3 rounded-lg hover:bg-blue-700 transition duration-200">
                    Confirm Vote
                </button>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 p-2 bg-black bg-opacity-50 hidden flex justify-center items-center z-50 bg-blur">
        <div class="bg-white p-6 rounded-lg shadow-xl w-96">
            <button id="closeSuccessModal" class="absolute top-2 right-2 text-2xl font-bold text-gray-600">&times;</button>
            <h2 class="text-xl font-semibold text-green-600 mb-4">Success</h2>
            <p id="successMessage" class="text-sm text-gray-700 prose text-justify"></p>
            <div class="mt-4">
                <button class="bg-green-600 text-white py-2 px-4 rounded" id="closeSuccessModalBtn">Close</button>
            </div>
        </div>
    </div>


    <!-- Error Modal -->
    <div id="errorModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex  justify-center items-center z-50 bg-blur p-2">
        <div class="bg-white p-6 rounded-lg shadow-xl w-96 text-center">
            <button id="closeErrorModal" class="absolute top-2 right-2 text-2xl font-bold text-gray-600">&times;</button>
            <h2 class="text-xl font-semibold text-red-600 mb-4">Error</h2>
            <p id="errorMessage" class="text-sm text-gray-700 prose text-justify"></p>
            <div class="mt-4">
                <button class="bg-blue-600 text-white py-2 px-4 rounded" id="closeErrorModalBtn">Close</button>
            </div>
        </div>
    </div>

    <?php require_once "../Components/navBar.php" ?>

    <!-- Hero Section -->
    <section id="Hero" class="text-center relative bg-cover bg-center pb-10 mx-auto" style="background-image: url('../Images/vote-hero.jpg')">

        <div class="bg-white z-10 flex flex-col items-center py-5 sticky w-full header">

            <h1 class="text-blue-500 text-2xl sm:text-4xl md:text-4xl font-bold py-4">
                <?= $major ?> Major
            </h1>

            <p class="text-sm text-black sm:text-xl md:text-2xl mb-2 opacity-50">
                Help your favorite contestants shine by casting your vote today!
            </p>

            <div class="flex gap-3 md:gap-12 sm:gap-12 mt-10">
                <div>
                    <h2 class="font-bold text-2xl mb-5">KING ?</h2>
                    <div class="w-40 mb-4 h-30 overflow-hidden object-cover border-2 border-gray-300 rounded">
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/question-mark-3d-icon-download-in-png-blend-fbx-gltf-file-formats--help-ask-user-interface-pack-icons-4652954.png?f=webp" alt="">
                    </div>
                </div>


                <div>
                    <h2 class="font-bold text-2xl mb-5">QUEEN ?</h2>
                    <div class="w-40 mb-4 h-30 overflow-hidden object-cover border-2 border-gray-300 rounded">
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/question-mark-3d-icon-download-in-png-blend-fbx-gltf-file-formats--help-ask-user-interface-pack-icons-4652954.png?f=webp" alt="">
                    </div>
                </div>
            </div>

  

            <!-- Voting Timer -->
            <div id="timer" class="space-y-2 relative md:absolute sm:absolute md:bottom-10 md:right-10">
                <h1 class="text-lg opacity-50">Voting Ends In</h1>
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

        <div class=" max-w-8xl m-auto flex gap-12 items-center p-10">
            <!-- Filter Buttons -->
            <div class="flex gap-3 md:gap-12 sm:gap-12">


                <button id="filterKingBtn" class="flex justify-center w-40 items-center bg-blue-500 text-lg md:text-2xl font-bold text-white py-3 px-5 rounded hover:bg-blue-700 transition">
                    <i class="fas fa-crown text-white mr-2 md:mr-4 cursor-pointer" id="kingIcon"></i>
                    <span>King</span>
                </button>

                <button id="filterQueenBtn" class="flex justify-center w-40 items-center bg-pink-500 text-lg md:text-2xl font-bold text-white py-3 px-5 rounded hover:bg-pink-700 transition">
                    <i class="fas fa-crown text-white mr-2 md:mr-4 cursor-pointer" id="queenIcon"></i>
                    <span>Queen</span>
                </button>
            </div>


            <div class=" h3 text-blue-500 flex justify-center items-center">
                <h3 class="text-xl md:text-3xl sm:text-3xl font-bold mr-5">Candidates For King </h3>
                <i class="fas fa-crown cursor-pointer text-3xl" id="kingIcon"></i>
            </div>

        </div>


        <div id="filter_king" class="grid mt-12 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-12 p-2 max-w-8xl m-auto">
            <!-- Contestants for King will be displayed here -->
        </div>

        <div id="filter_queen" class="grid mt-12 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-12 p-2 hidden max-w-8xl m-auto">
            <!-- Contestants for Queen will be displayed here -->
        </div>

    </section>

</div>

<!-- <script src="../JS/vote.js"></script> -->

<script>
    let voteKingId = <?php echo json_encode($_SESSION['voteKingId']); ?>;
    let voteQueenId = <?php echo json_encode($_SESSION['voteQueenId']); ?>;

    console.log(voteKingId);
    console.log(voteQueenId);

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

    // Fetch candidate data
    fetch("../Controllers/getMajorCandidate.php")
        .then((response) => response.json())
        .then((data) => {
            if (!data || data.length === 0) {
                filterKing.innerHTML = '<p class="text-gray-700">No data available</p>';
                filterQueen.innerHTML = '<p class="text-gray-700">No data available</p>';
                return;
            }

            let king = "";
            let queen = "";

            data.forEach((candidate) => {
                let majorName = getMajorName(candidate.major);

                if (voteKingId == candidate.id) {
                    bgColor = "bg-blue-200";
                } else if (voteQueenId == candidate.id) {
                    bgColor = "bg-pink-200";
                } else {
                    bgColor = "bg-white";
                }

                const cardHTML = `
                <div class="${bgColor} rounded-xl shadow-lg candidate-card p-5 card-hover" id="${candidate.id}">
                    <div class="relative">
                        <img class="w-full h-60 object-cover" src="${candidate.profileImg || '../uploads/candidate/contestant3.jpg'}" alt="Profile image of ${candidate.name}" />
                        <div class="flex absolute left-5 bottom-5 items-center text-sm">
                            <span class="w-16 h-16 text-3xl font-bold bg-blue-100 text-blue-800 flex items-center justify-center rounded-full mr-3">
                                ${candidate.candidate_no}
                            </span>
                        </div>
                    </div>
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-blue-800 my-4">${candidate.name}</h1>
                        <p class="mb-3 font-bold">Major - ${majorName}</p>
                    </div>
                   <button 
                    class="voteBtn bg-blue-700 text-white px-4 py-2 rounded mt-4" 
                    data-name="${candidate.name}" 
                    data-number="${candidate.candidate_no}" 
                    data-major="${candidate.major}"
                    data-gender="${candidate.gender}"
                    data-email="${candidate.email}"
                    data-id="${candidate.id}">
                    Vote Now
                </button>
                </div>`;

                if (candidate.gender === "Male") {
                    king += cardHTML;
                } else {
                    queen += cardHTML;
                }
            });

            filterKing.innerHTML = king || '<p class="text-gray-700">No candidate available for King.</p>';
            filterQueen.innerHTML = queen || '<p class="text-gray-700">No candidate available for Queen.</p>';

            // Event listener for vote buttons
            document.querySelector("#votePage").addEventListener("click", (event) => {
                if (event.target.classList.contains("voteBtn")) {
                    const matchModal = document.getElementById("matchModal");
                    const matchContestantName = document.getElementById("matchContestantName");
                    const matchContestantNumber = document.getElementById("matchContestantNumber");
                    const closeMatchModal = document.getElementById("closeMatchModal");

                    const name = event.target.getAttribute("data-name");
                    const number = event.target.getAttribute("data-number");
                    const major = event.target.getAttribute("data-major");
                    const gender = event.target.getAttribute("data-gender");
                    const email = event.target.getAttribute("data-email");
                    const id = event.target.getAttribute("data-id");

                    matchContestantName.textContent = name;
                    matchContestantNumber.textContent = number;
                    matchModal.classList.remove("hidden");

                    document.querySelector("#confirmMatchVote").addEventListener("click", () => confirmVote(email, id));
                    closeMatchModal.addEventListener("click", () => matchModal.classList.add("hidden"));
                }
            });
        })
        .catch((error) => {
            console.error("Error fetching candidate:", error);
            filterKing.innerHTML = '<p class="text-red-600">Error loading King candidate. Please try again later.</p>';
            filterQueen.innerHTML = '<p class="text-red-600">Error loading Queen candidate. Please try again later.</p>';
        });

    // Add event listeners for filtering
    filterKingBtn.addEventListener("click", () => {
        togglecandidateVisibility(filterKing, filterQueen);
        document.querySelector("#Hero .h3").innerHTML = `
        <h3 class="text-xl md:text-3xl font-bold mr-5">Candidates For King </h3>
        <i class="fas fa-crown cursor-pointer text-3xl" id="kingIcon"></i>
    `;
    });

    filterQueenBtn.addEventListener("click", () => {
        togglecandidateVisibility(filterQueen, filterKing);
        document.querySelector("#Hero .h3").innerHTML = `
        <h3 class="text-xl md:text-3xl font-bold mr-5 text-pink-500">Candidates For Queen </h3>
        <i class="fas fa-crown cursor-pointer text-3xl text-pink-500" id="kingIcon"></i>
    `;
    });

    // Function to toggle visibility of candidate
    function togglecandidateVisibility(showElement, hideElement) {
        showElement.classList.remove("hidden");
        hideElement.classList.add("hidden");
    }

    // Helper function to map major codes to full names
    function getMajorName(majorCode) {
        const majorNames = {
            "EC": "Electrical Engineering",
            "EP": "Electronic Power Engineering",
            "ME": "Mechanical Engineering",
            "CE": "Civil Engineering"
        };
        return majorNames[majorCode] || "Unknown Major";
    }

    async function confirmVote(email, id) {
        const matchModal = document.getElementById("matchModal");
        matchModal.classList.add("hidden");

        const voteData = {
            email,
            id
        };

        try {
            const response = await fetch("../Controllers/submit_vote.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(voteData),
            });

            const result = await response.json();

            if (result.status === "success") {
                showSuccessModal(result.message);
            } else {
                showErrorModal(result.message);
            }
        } catch (error) {
            console.error("Error:", error);
            showErrorModal("An error occurred while submitting your vote.");
        }
    }

    function showSuccessModal(message) {
        const successModal = document.getElementById("successModal");
        const successMessage = document.getElementById("successMessage");
        const closeSuccessModal = document.getElementById("closeSuccessModal");
        const closeSuccessModalBtn = document.getElementById("closeSuccessModalBtn");

        successMessage.textContent = message;
        successModal.classList.remove("hidden");
        errorModal.classList.add("hidden");

        closeSuccessModal.addEventListener("click", () => {
            successModal.classList.add("hidden");
        });

        closeSuccessModalBtn.addEventListener("click", () => {
            successModal.classList.add("hidden");
        });

        window.addEventListener("click", (event) => {
            if (event.target === successModal) {
                successModal.classList.add("hidden");
            }
        });
    }

    function showErrorModal(message) {
        const errorModal = document.getElementById("errorModal");
        const errorMessage = document.getElementById("errorMessage");
        const closeErrorModal = document.getElementById("closeErrorModal");
        const closeErrorModalBtn = document.getElementById("closeErrorModalBtn");

        errorMessage.textContent = message;
        errorModal.classList.remove("hidden");

        closeErrorModal.addEventListener("click", () => {
            errorModal.classList.add("hidden");
        });

        closeErrorModalBtn.addEventListener("click", () => {
            errorModal.classList.add("hidden");
        });

        window.addEventListener("click", (event) => {
            if (event.target === errorModal) {
                errorModal.classList.add("hidden");
            }
        });
    }
</script>


<?php require_once "../Components/footer.php" ?>