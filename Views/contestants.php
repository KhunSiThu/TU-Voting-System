<?php require_once "../Components/header.php" ?>

<div id="contestantsPage" class="bg-gray-100 text-gray-900">

    <!-- Voting Policy Modal -->
    <div id="policyModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden bg-blur z-50 p-5">
        <div class="bg-white rounded-2xl shadow-lg p-8 max-w-2xl w-full transform scale-95 transition-all duration-300 ease-in-out">
            <!-- Modal Header -->
            <h2 class="text-3xl font-bold text-blue-600 mb-5">Voting Policy</h2>

            <!-- Voting Policy Information -->
            <div class="text-gray-700 leading-relaxed mb-6">
                <p class="text-lg mb-4 prose text-justify">
                    The voting process is designed to ensure fairness and transparency in selecting the King and Queen for each academic major.
                    <strong>Each student is allowed to vote for only one King and one Queen</strong> from within their respective major. This policy ensures equal opportunity for leadership selection.
                </p>

                <!-- Voting Guidelines List -->
                <ul class="list-disc list-inside text-gray-600 mb-6 prose text-justify">
                    <li><strong>One vote per student:</strong> You may cast <strong>one vote for the King</strong> and <strong>one vote for the Queen</strong> only.</li>
                    <li><strong>Vote within your major:</strong> Ensure your votes are for contestants within your respective major.</li>
                    <li><strong>Confidentiality and fairness:</strong> Your vote is confidential, and each student is allowed only <strong>one vote per title</strong> (King and Queen).</li>
                    <li><strong>Rule violations:</strong> Violations may lead to <strong>disqualification</strong> or other disciplinary actions.</li>
                </ul>

                <!-- Voting Period Section -->
                <div class="bg-yellow-100 border-l-4 border-yellow-500 p-4 mb-6 rounded-lg">
                    <h3 class="font-semibold text-lg text-yellow-600">Voting Period:</h3>
                    <p class="text-gray-700">
                        <strong>Start Date:</strong> January 10, 2024 <br>
                        <strong>End Date:</strong> January 20, 2024 <br>
                        <span class="text-red-500 font-medium">Ensure you cast your vote within this timeframe!</span>
                    </p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-between items-center">

                <a href="./policy.php" class="text-blue-500 hover:text-blue-700 transition duration-200 pb-3 hover:underline">Privacy Policy</a>
                <button id="closePolicyModal" class="bg-blue-500 text-white font-semibold px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                    I Understand
                </button>
            </div>
        </div>
    </div>




    <div id="matchModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50 bg-blur p-10">
        <div class="bg-white rounded-xl shadow-lg p-6 max-w-lg w-full text-center relative">

            <div class="flex w-full justify-center items-center text-sm mb-6">
                <span class="w-20 h-20 text-3xl font-bold bg-blue-100 text-blue-800 flex items-center justify-center rounded-full mr-3">
                    <i class="fa-solid fa-question fa-shake text-blue-400"></i>
                </span>
            </div>

            <h2 class="text-3xl font-extrabold text-gray-800 mb-4">Confirm Your Vote</h2>
            <p class="text-gray-600 mb-6">
                Are you sure you want to vote for
                <span id="matchContestantName" class="font-bold text-gray-800"></span> (#<span id="matchContestantNumber" class=" font-bold text-gray-800"></span>)?
                <br> You cannot change this vote once submitted.
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

    <!-- Modal for Not Matching Major -->
    <div id="mismatchModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50 bg-blur p-10">
        <div class="bg-white rounded-xl shadow-lg p-6 max-w-lg w-full text-center">
            <span class=""><i class="mb-6 fa-solid fa-circle-exclamation fa-shake text-7xl" style="color: #ff0a0a;"></i></span>
            <h2 class="text-3xl font-extrabold text-red-600 mb-4">Vote Not Allowed</h2>
            <p class="text-gray-600 mb-6">
                Sorry, you cannot vote for
                <span id="mismatchContestantName" class="font-bold text-gray-800"></span> (#<span id="mismatchContestantNumber" class="font-bold text-gray-800"></span>) because they belong to a different major.
                Please choose a contestant from your own major.
            </p>
            <div class="flex justify-center">
                <button id="closeMismatchModal" class="bg-gray-300 text-gray-700 font-medium px-5 py-2 rounded-lg hover:bg-gray-400 transition duration-200">
                    Close
                </button>
            </div>
        </div>
    </div>

    <?php require_once "../Components/navBar.php" ?>

    <!-- Hero Section -->
    <section id="hero" class="bg-gradient-to-r from-indigo-600 to-indigo-400 text-center py-20 relative bg-cover bg-center" style="background-image: url('../Images/school.png')">
        <div class="absolute inset-0 bg-gradient-to-r from-black to-black opacity-70"></div>
        <div class="relative px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl sm:text-4xl lg:text-6xl font-bold text-white mb-4 sm:mb-6">Meet the Contestants</h1>
            <p class="text-base sm:text-lg lg:text-2xl text-white mb-6 sm:mb-8">
                Get to know the contestants vying for the title of King and Queen!
            </p>
            <div class="grid grid-cols-4 sm:grid-cols-4 gap-4 justify-center items-center max-w-3xl mx-auto z-20">
                <img src="../Images/EC.png" class="w-32 sm:w-20 lg:w-32 h-auto" alt="EC">
                <img src="../Images/ME.png" class="w-32 sm:w-20 lg:w-32 h-auto" alt="ME">
                <img src="../Images/CE.png" class="w-32 sm:w-20 lg:w-32 h-auto" alt="CE">
                <img src="../Images/EP.png" class="w-32 sm:w-20 lg:w-32 h-auto" alt="EP">
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="py-10 text-center">
        <div class="max-w-6xl mx-auto px-4 sm:px-0 lg:px-8">
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-semibold mb-4">Search Contestants</h2>
            <input
                type="text"
                id="searchInput"
                placeholder="Search by Name or Contestant Number"
                class="px-4 py-2 border border-gray-300 rounded-lg w-full max-w-md mx-auto text-lg">

        </div>
    </section>

    <!-- Filter Section -->
    <section class="hidden pb-10 text-center lg:block">
        <div class="max-w-6xl mx-auto px-0 sm:px-0 lg:px-8">
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-semibold mb-4">Contestants by Major</h2>
            <div class="flex flex-wrap justify-center gap-5 ">
                <button class="bg-blue-500 text-white p-3 rounded text-sm sm:text-base" onclick="filterContestants('all')">All</button>
                <button class="bg-blue-500 text-white p-3 rounded text-md sm:text-base" onclick="filterContestants('CE')">Civil Engineering</button>
                <button class="bg-blue-500 text-white p-3 rounded text-md sm:text-base" onclick="filterContestants('EP')">Electrical Power Engineering</button>
                <button class="bg-blue-500 text-white p-3 rounded text-md sm:text-base" onclick="filterContestants('EC')">Electronic Engineering</button>
                <button class="bg-blue-500 text-white p-3 rounded text-md sm:text-base" onclick="filterContestants('ME')">Mechanical Engineering</button>
            </div>
        </div>
    </section>

    <!-- Contestant Sections -->
    <section class="pb-16 text-center ">
        <div id="contestants-show-con" class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-12">

        </div>
    </section>

    <!-- About the Event Section -->
    <section class="py-16 px-10 text-center bg-gray-50">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-semibold mb-8">About the Event</h2>
            <p class="text-lg mb-8 prose text-justify">The King and Queen Selection event is a prestigious competition held annually at the Technological University (Yamethin). Students from various majors participate to showcase their talents and leadership qualities. Join us in celebrating the brightest stars of our university!</p>
            <img src="https://via.placeholder.com/800x400" alt="Event Image" class="mx-auto rounded-lg shadow-lg">
        </div>
    </section>

</div>

<script>
    const contestantsShowCon = document.querySelector("#contestants-show-con");

    fetch("../Controllers/getAllContestants.php")
        .then(response => {
            if (!response.ok) {
                throw new Error("Failed to fetch contestants data: " + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (!data || data.length === 0) {
                contestantsShowCon.innerHTML = '<p class="text-gray-700">No contestants available</p>';
                return;
            }

            contestantsShowCon.innerHTML = ""


            // Generate contestant cards
            data.forEach(contestant => {
                const contestantCard = document.createElement('div');
                contestantCard.classList.add('contestant-card', 'bg-white', 'rounded-xl', 'shadow-lg', 'p-5', 'card-hover');
                contestantCard.setAttribute('data-major', contestant.major); // Store major for filtering

                contestantCard.innerHTML = `
                    <div class="relative">
                        <img class="w-full h-60 object-cover" src="${contestant.profileImg || '../uploads/contestants/contestant3.jpg'}" alt="Profile image of ${contestant.name}" />
                        <div class="flex absolute left-5 bottom-5 items-center text-sm">
                            <span class="w-16 h-16 text-3xl font-bold bg-blue-100 text-blue-800 flex items-center justify-center rounded-full mr-3">
                                ${contestant.contestant_no}
                            </span>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-blue-800 my-4">${contestant.name}</h2>
                    <p>Major - ${contestant.major}</p>
                    <button 
                        class="voteBtn bg-blue-700 text-white px-4 py-2 rounded mt-4" 
                        data-name="${contestant.name}" 
                        data-number="${contestant.contestant_no}" 
                        data-major="${contestant.major}">
                        Vote Now
                    </button>
                `;

                contestantsShowCon.appendChild(contestantCard);
            });

            setupVoteButtons();
        })
        .catch(error => {
            console.error("Error loading contestants:", error);
            contestantsShowCon.innerHTML = `<p class="text-red-600">Error loading contestants. Please try again later. ${error.message}</p>`;
        });

    // Setup vote buttons
    function setupVoteButtons() {
        const voteButtons = document.querySelectorAll(".voteBtn");
        const matchModal = document.getElementById("matchModal");
        const mismatchModal = document.getElementById("mismatchModal");
        const matchContestantName = document.getElementById("matchContestantName");
        const matchContestantNumber = document.getElementById("matchContestantNumber");
        const closeMatchModal = document.getElementById("closeMatchModal");
        const closeMismatchModal = document.getElementById("closeMismatchModal");
        const confirmMatchVote = document.getElementById("confirmMatchVote");

        voteButtons.forEach(button => {
            button.addEventListener("keyup", e => {
                const name = button.getAttribute("data-name");
                const number = button.getAttribute("data-number");
                const major = button.getAttribute("data-major");

                let userMajor = <?php echo json_encode($_SESSION['user_major']); ?>;

                if (major === userMajor) {
                    matchContestantName.textContent = name;
                    matchContestantNumber.textContent = number;
                    matchModal.classList.remove("hidden");
                } else {
                    mismatchModal.querySelector("#mismatchContestantName").textContent = name;
                    mismatchModal.querySelector("#mismatchContestantNumber").textContent = number;
                    mismatchModal.classList.remove("hidden");
                }
            });
        });

        closeMatchModal.addEventListener("click", () => matchModal.classList.add("hidden"));
        closeMismatchModal.addEventListener("click", () => {
            localStorage.removeItem("policy");
            location.reload();
        });
        confirmMatchVote.addEventListener("click", () => {
            alert("Your vote has been submitted!");
            matchModal.classList.add("hidden");
        });
    }

    // Filter contestants by major
    function filterContestants(major) {
        const contestantCards = document.querySelectorAll(".contestant-card");

        contestantCards.forEach(card => {
            if (major === "all" || card.getAttribute("data-major") === major) {
                card.classList.remove("hidden");
            } else {
                card.classList.add("hidden");
            }
        });
    }

    // Search functionality
    document.addEventListener("DOMContentLoaded", () => {
        const searchInput = document.getElementById("searchInput");
        const contestantCards = document.querySelectorAll(".contestant-card");

        // Update search functionality to work on keyup event
        searchInput.addEventListener("keyup", function() {
            const query = this.value.toLowerCase(); // Get the search query in lowercase

            contestantCards.forEach(card => {
                const name = card.querySelector("h2").textContent.toLowerCase(); // Convert name to lowercase
                const number = card.querySelector("span").textContent.toLowerCase(); // Convert contestant number to lowercase

                // Show card if query matches name or contestant number, otherwise hide it
                if (name.includes(query) || number.includes(query)) {
                    card.classList.remove("hidden"); // Show matching card
                } else {
                    card.classList.add("hidden"); // Hide non-matching card
                }
            });
        });
    });


    document.addEventListener("DOMContentLoaded", function() {
        const policyModal = document.getElementById("policyModal");
        const closePolicyModal = document.getElementById("closePolicyModal");

        if (!localStorage.getItem("policy")) {
            // Show the modal when the page loads
            policyModal.classList.remove("hidden");
        }

        // Hide the modal when the user clicks "I Understand"
        closePolicyModal.addEventListener("click", () => {
            policyModal.classList.add("hidden");
            localStorage.setItem("policy", "show");
        });
    });
</script>

<?php require_once "../Components/footer.php" ?>