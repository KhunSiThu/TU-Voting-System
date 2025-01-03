<?php
session_start();


require_once "../Components/header.php"

?>

<?php require_once "../Components/navBar.php" ?>

<div id="main-section" class="sm:ml-64">

<!-- Modal Background -->
<div id="votingModal" class="fixed inset-0 bg-blur bg-opacity-60 flex items-center justify-center z-50 hidden transition-opacity duration-300">
    <!-- Modal Box -->
    <div class="bg-white rounded-2xl shadow-xl w-10/12 max-w-lg p-6 relative overflow-hidden">
        <!-- Close Icon -->
        <button
            onclick="closeVoteEndModal()"
            class="absolute top-3 right-3 bg-gray-100 text-gray-500 hover:text-gray-700 p-2 rounded-full shadow-md transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Title -->
        <h2 class="text-2xl font-bold text-blue-600 text-center mb-4">🎉 Voting Closed!</h2>

        <!-- Message -->
        <p class="text-gray-700 text-center text-lg mb-4">
            Thank you for your participation. The results will be announced shortly. Stay tuned!
        </p>

        <!-- Action Buttons -->
        <div class="flex flex-col gap-4">
            <!-- View Results Button (Optional) -->
            <button
                onclick="closeVoteEndModal()"
                class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                Close
            </button>
        </div>
    </div>
</div>


    <div id="votePage" class="bg-gray-100 text-gray-900 rounded-lg dark:border-gray-700 mt-14">

        <!-- Voting Policy Modal -->
        <div id="policyModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center bg-blur z-50 p-2">
            <div class="bg-white rounded-2xl shadow-lg p-8 max-w-2xl w-full transform scale-95 transition-all duration-300 ease-in-out">
                <h2 class="text-3xl font-bold text-blue-600 mb-5">Voting Guidelines</h2>
                <div class="text-gray-700 leading-relaxed mb-6">
                    <p class="text-lg hidden md:block sm:block mb-4 prose text-justify">
                        Voting aims to maintain fairness and transparency in selecting the King and Queen for each major.
                        <strong>Each student may vote for one King and one Queen</strong> from their respective department only. This ensures equal opportunities for all participants.
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-6 prose text-justify">
                        <li><strong>One vote per student:</strong> Cast <strong>one vote for King</strong> and <strong>one vote for Queen</strong>.</li>
                        <li><strong>Vote within your major:</strong> Only vote for candidates in your department.</li>
                        <li><strong>Confidentiality and fairness:</strong> Votes are confidential; each student is allowed <strong>one vote per position</strong>.</li>
                        <li><strong>Rule violations:</strong> Violations may lead to <strong>disqualification</strong> or other disciplinary measures.</li>
                    </ul>
                    <div class="bg-yellow-100 hidden md:block sm:block  border-l-4 border-yellow-500 p-4 mb-6 rounded-lg">
                        <h3 class="font-semibold text-lg text-yellow-600">Voting Period:</h3>
                        <p class="text-gray-700">
                            <strong>Start:</strong> January 10, 2024<br>
                            <strong>End:</strong> January 20, 2024<br>
                            <span class="text-red-500 font-medium">Please submit your votes on time!</span>
                        </p>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <a href="./policy.php" class="text-blue-500 hover:text-blue-700 transition duration-200 pb-3 hover:underline">Privacy Policy</a>
                    <button id="closePolicyModal" class="bg-blue-500 text-white font-semibold px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                        Got it!
                    </button>
                </div>
            </div>
        </div>

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
        <div id="successModal" class="fixed inset-0  p-3 bg-black bg-opacity-50 flex hidden flex-col justify-center items-center z-50 bg-blur">

            <div class="bg-white pb-6 rounded-lg shadow-xl w-96 flex flex-col justify-center items-center">
                <img src="../Images/success-tick-dribbble.gif" class="w-60" alt="">
                <button id="closeSuccessModal" class="absolute top-3 right-3 text-3xl font-bold text-gray-200">&times;</button>
                <h2 class="text-xl font-semibold text-green-400 mb-4">Success</h2>
                <p id="successMessage" class="text-sm text-gray-700 prose text-justify"></p>
                <div class="mt-4">
                    <a href="./vote.php" class="bg-green-400 text-white py-2 px-4 rounded" id="closeSuccessModalBtn">Close</a>
                </div>
            </div>
        </div>


        <!-- Error Modal -->
        <div id="errorModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex  justify-center items-center z-50 bg-blur p-2">
            <div class="bg-white p-6 rounded-lg shadow-xl w-96 text-center">
                <button id="closeErrorModal" class="absolute top-3 right-3 text-2xl font-bold text-gray-200">&times;</button>
                <h2 class="text-xl font-semibold text-red-600 mb-4">Error</h2>
                <p id="errorMessage" class="text-sm text-gray-700 prose text-justify"></p>
                <div class="mt-4">
                    <button class="bg-blue-600 text-white py-2 px-4 rounded" id="closeErrorModalBtn">Close</button>
                </div>
            </div>
        </div>

        <!-- Hero Section -->
        <section id="Hero" class="text-center relative bg-cover bg-center pb-10 mx-auto" style="background-image: url('../Images/vote-hero.jpg')">

            <div class="bg-white z-10 flex flex-col items-center py-5  px-3 sticky w-full header">

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

            <div class="flex flex-col max-w-8xl m-auto   justify-start items-center mt-10 md:block md:w-full  sm:flex-row">
                <!-- Filter Buttons -->
                <div class="flex gap-3 md:gap-12 sm:gap-12 mb-5">


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
                    <h3 class="text-xl md:text-4xl sm:text-4xl font-bold mr-5">Candidates For King </h3>
                    <i class="fas fa-crown cursor-pointer text-3xl" id="kingIcon"></i>
                </div>

            </div>


            <div id="filter_king" class="grid mt-12 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-12 p-4 max-w-8xl m-auto">
                <!-- Contestants for King will be displayed here -->
            </div>

            <div id="filter_queen" class="grid mt-12 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-12 p-4 hidden max-w-8xl m-auto">
                <!-- Contestants for Queen will be displayed here -->
            </div>

        </section>

    </div>

    <?php require_once "../Components/footer.php" ?>

</div>




<!-- <script src="../JS/vote.js"></script> -->

<script>
    // Function to open the modal
    function openVoteEndModal() {
        const modal = document.getElementById("votingModal");
        modal.classList.remove("hidden");
        modal.classList.add("opacity-100");
    }

    function fetchKingQueenData(gender, majorCode, elementForKing) {
            fetch(`../Controllers/get_king_queen.php?gender=${gender}&major=${majorCode}`)
                .then(response => response.json()) // Parse the JSON response
                .then(data => {
                    if (data.error) {
                        console.log(data.error);
                    } else {
                        if (gender == "Male") {
                            // King Section
                            elementForKing.innerHTML = `

                            <!-- King -->
                           <h2 class="text-3xl font-bold text-blue-700 mb-6">👑 King</h2>
                            <div class="relative w-64 h-64 mx-auto rounded-full overflow-hidden shadow-lg border-8 border-blue-600 transform hover:rotate-6 transition-transform duration-500">
                                <img src="${data.profile_image}" alt="King" class="w-full h-full object-cover">
                            </div>
                            <p class="text-blue-700 font-extrabold text-2xl mt-6">${data.name}</p>
                            
                            <p class="text-gray-700 text-lg mt-2">
                                <i class="fas fa-vote-yea text-blue-600"></i> Votes: <span class="font-semibold text-gray-900">${data.count_email}</span>
                            </p>


                        `;
                        } else {
                            // Queen Section
                            elementForKing.innerHTML = `
                            <h2 class="text-3xl font-bold text-pink-600 mb-6">👑 Queen</h2>
                            <div class="relative w-64 h-64 mx-auto rounded-full overflow-hidden shadow-lg border-8 border-pink-500 transform hover:rotate-6 transition-transform duration-500">
                                <img src="${data.profile_image}" alt="Queen" class="w-full h-full object-cover">
                            </div>
                            <p class="text-pink-600 font-extrabold text-2xl mt-6">${data.name}</p>
                            
                            <p class="text-gray-700 text-lg mt-2">
                                <i class="fas fa-vote-yea text-pink-500"></i> Votes: <span class="font-semibold text-gray-900">${data.count_email}</span>
                            </p>
                `;
                        }

                    }
                })
                .catch(error => {
                    console.error('Error fetching the data:', error);
                });
        }

    // Function to close the modal
    function closeVoteEndModal() {

        const modal = document.getElementById("votingModal");
        modal.classList.add("hidden");

        modal.classList.remove("opacity-100");

        document.getElementById("timer").classList.add("hidden");

        document.querySelector("#votePage").innerHTML = `
        <div class="flex flex-col items-center justify-center py-12 px-6 bg-gradient-to-r from-blue-100 via-white to-pink-100 min-h-screen animate-page-entry">
            <!-- Title -->
            <h1 class="text-2xl md:text-5xl font-extrabold text-blue-700 drop-shadow-xl mb-6 text-center">
                Electrical Engineering Major Results
            </h1>
            <p class="text-gray-800 text-lg md:text-xl text-center max-w-3xl mb-10 prose text-justify">
                The results are in! Celebrate with us as we announce the winners of the King & Queen titles. Thank you for being a part of this exciting journey!
            </p>

            <!-- King & Queen Result Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center animate-fade-in">
                <!-- King -->
                <div id="kingCard" class="flex flex-col items-center bg-white shadow-2xl rounded-3xl p-8 transform hover:scale-105 hover:shadow-blue-400 transition-all duration-500 animate-bounce-on-hover">
                     <h1 class="font-bold text-center">Data not found!</h1>
                </div>

                <!-- Queen -->
                <div id="queenCard" class="flex flex-col items-center bg-white shadow-2xl rounded-3xl p-8 transform hover:scale-105 hover:shadow-pink-400 transition-all duration-500 animate-bounce-on-hover">
                     <h1 class="font-bold text-center">Data not found!</h1>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="mt-12 bg-gradient-to-r from-blue-700 to-pink-600 text-white p-6 rounded-3xl shadow-lg w-full max-w-3xl text-center">
                <h3 class="text-2xl font-bold mb-3">🎉 Keep Supporting Our Contestants! 🎉</h3>
                <p class="text-lg prose text-justify">
                    Stay connected with us for more events and celebrations. Share the joy and celebrate the spirit of teamwork and talent!
                </p>
                <button
                    onclick="alert('Thank you for staying connected!')"
                    class="mt-6 bg-white text-blue-700 font-bold py-3 px-8 rounded-lg hover:bg-blue-100 hover:shadow-xl transition-all duration-300 hover:translate-y-1 hover:scale-110">
                    Learn More
                </button>
            </div>
        </div>

        <!-- Tailwind Animations -->
        <style>
        @keyframes fade-in {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes page-entry {
            0% {
                opacity: 0;
                transform: translateX(-50px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes bounce-on-hover {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .animate-fade-in {
            animation: fade-in 1.5s ease-in-out;
        }

        .animate-page-entry {
            animation: page-entry 1s ease-out;
        }

        .animate-bounce-on-hover:hover {
            animation: bounce-on-hover 0.5s ease-in-out;
        }
        </style>
        `;

        const kingCard = document.querySelector("#kingCard");
        const queenCard = document.querySelector("#queenCard");

        fetchKingQueenData("Male", "EC", kingCard);
        fetchKingQueenData("Female", "EC", queenCard);


    }

    let voteKingId = <?php echo json_encode($_SESSION['voteKingId']); ?>;
    let voteQueenId = <?php echo json_encode($_SESSION['voteQueenId']); ?>;

    const daysEl = document.getElementById("days");
    const hoursEl = document.getElementById("hours");
    const minutesEl = document.getElementById("minutes");
    const secondsEl = document.getElementById("seconds");
    const expiredEl = document.getElementById("expired");

    // Fetch the voting end time from the PHP script
    fetch('../Controllers/get_voting_end.php')
        .then(response => response.json()) // Get the response in JSON format
        .then(data => {
            const deadline = new Date(data).getTime(); // Convert the received string to a Date object

            // Countdown function to update the timer
            const updateCountdown = () => {
                const now = new Date().getTime();
                const distance = deadline - now;

                // If countdown reaches zero, stop the timer
                if (distance <= 0) {
                    clearInterval(interval);

                    openVoteEndModal();

                    expiredEl.classList.remove("hidden");
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Update countdown text
                daysEl.textContent = days.toString().padStart(2, "0");
                hoursEl.textContent = hours.toString().padStart(2, "0");
                minutesEl.textContent = minutes.toString().padStart(2, "0");
                secondsEl.textContent = seconds.toString().padStart(2, "0");
            };

            // Start the countdown timer
            const interval = setInterval(updateCountdown, 1000);
            updateCountdown(); // Initial call to set the countdown immediately
        })
        .catch(error => {
            console.error('Error fetching voting end time:', error);
        });


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

                let btnController = "";

                if (voteKingId && candidate.gender == "Male") {
                    btnController = "hidden";
                }

                if (voteQueenId && candidate.gender == "Female") {
                    btnController = "hidden";
                }

                let borderColor = "";

                if (candidate.gender === "Male") {
                    borderColor = "border-blue-500";
                } else {
                    borderColor = "border-pink-500";
                }

                const cardHTML = `
                <div class="${bgColor} rounded-xl shadow-lg candidate-card p-5 card-hover" id="${candidate.id}">
                    <div class="relative flex flex-col items-center">
                        <div class="relative  h-40 md:w-60 md:h-60 ms:w-60 ms:h-60 rounded-full overflow-hidden shadow-lg border-4 ${borderColor}">
                            <img src="${candidate.profile_image}" alt="Queen" class="w-full h-full object-cover">
                        </div>
                        <div class="flex absolute  left-0 -bottom-8 items-center text-sm">
                            <span class="w-16 h-16 text-3xl font-bold bg-blue-100 text-blue-800 flex items-center justify-center rounded-full mr-3">
                                ${candidate.candidate_no}
                            </span>
                        </div>
                    </div>
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-blue-800 my-2">${candidate.name}</h1>
                        <p class="mb-3 font-bold">Major - ${majorName}</p>
                    </div>
                   <button 
                    class="voteBtn bg-blue-700 text-white px-4 py-2 rounded ${btnController}" 
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
        <h3 class="text-xl md:text-4xl sm:text-4xl font-bold mr-5 mr-5">Candidates For King </h3>
        <i class="fas fa-crown cursor-pointer text-3xl" id="kingIcon"></i>
        `;
    });

    filterQueenBtn.addEventListener("click", () => {
        togglecandidateVisibility(filterQueen, filterKing);
        document.querySelector("#Hero .h3").innerHTML = `
        <h3 class="text-xl md:text-4xl sm:text-4xl font-bold mr-5 text-pink-500">Candidates For Queen </h3>
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

    if (localStorage.getItem("policy")) {
        document.querySelector("#policyModal").classList.add('hidden');
    }

    document.querySelector("#closePolicyModal").addEventListener("click", () => {
        document.querySelector("#policyModal").classList.add('hidden');
        localStorage.setItem("policy", "show");
    })
</script>