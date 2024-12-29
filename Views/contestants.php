<?php require_once "../Components/header.php";
echo $user_major; ?>

<div id="contestantsPage" class="bg-gray-100 text-gray-900">

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
                    <li><strong>Vote within your major:</strong> Only vote for contestants in your department.</li>
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
            <h2 class="text-2xl font-extrabold text-gray-800 mb-4">Confirm Your Selection</h2>
            <p class="text-gray-600 mb-6 prose text-justify">
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

    <!-- Mismatch Major Modal -->
    <div id="mismatchModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50 bg-blur p-3">
        <div class="bg-white rounded-xl shadow-lg p-6 max-w-lg w-full text-center ">
            <span class=""><i class="mb-6 fa-solid fa-circle-exclamation fa-shake text-7xl" style="color: #ff0a0a;"></i></span>
            <h2 class="text-3xl font-extrabold text-red-600 mb-4">Vote Rejected</h2>
            <p class="text-gray-600 mb-6 prose text-justify">
                You cannot vote for
                <span id="mismatchContestantName" class="font-bold text-gray-800"></span> (#<span id="mismatchContestantNumber" class="font-bold text-gray-800"></span>) as they are from a different major.
                Please select a contestant from your department.
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
    <section class="py-16 px-3 text-center ">
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

<!-- <script src="../JS/contestants.js"></script> -->

<script>
    const contestantsShowCon = document.querySelector("#contestants-show-con");


    const allMajor = {
        EC: "Electrical Engineering",
        ME: "Mechanical Engineering",
        CE: "Civil Engineering",
        EP: "Electronic Power Engineering"
    };

    console.log(allMajor.CE)



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

                let majorName = "";

                if (contestant.major == "EC") {
                    majorName = "Electrical Engineering";
                } else if (contestant.major == "EP") {
                    majorName = "Electronic Power Engineering";
                } else if (contestant.major == "ME") {
                    majorName = "Mechanical Engineering";
                } else if (contestant.major == "CE") {
                    majorName = "Civil Engineering";
                }

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
                    <p class="font-bold">Major - ${majorName}</p>
                    <button 
                        class="voteBtn bg-blue-700 text-white px-4 py-2 rounded mt-4" 
                        data-name="${contestant.name}" 
                        data-number="${contestant.contestant_no}" 
                        data-major="${contestant.major}"
                        data-gender="${contestant.gender}"
                        data-email="${contestant.email}">
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
            button.addEventListener("click", e => {
                const name = button.getAttribute("data-name");
                const number = button.getAttribute("data-number");
                const major = button.getAttribute("data-major");
                const email = button.getAttribute("data-email");

                let userMajor = <?php echo json_encode($_SESSION['user_major']); ?>;
                console.log(userMajor);

                if (major === userMajor) {
                    matchContestantName.textContent = name;
                    matchContestantNumber.textContent = number;
                    matchModal.classList.remove("hidden");
                    document.querySelector("#confirmMatchVote").addEventListener("click", () => confirmVote(email));
                    closeMatchModal.addEventListener("click", () => matchModal.classList.add("hidden"));
                } else {
                    mismatchModal.classList.remove("hidden");
                    document.getElementById("mismatchContestantName").textContent = name;
                    document.getElementById("mismatchContestantNumber").textContent = number;
                }
            });
        });

        closeMatchModal.addEventListener("click", () => matchModal.classList.add("hidden"));
        closeMismatchModal.addEventListener("click", () => {
            mismatchModal.classList.add("hidden");
            localStorage.removeItem("policy");
            document.querySelector("#policyModal").classList.remove('hidden');
        });


        if (localStorage.getItem("policy")) {
            document.querySelector("#policyModal").classList.add('hidden');
        }

        document.querySelector("#closePolicyModal").addEventListener("click", () => {
            document.querySelector("#policyModal").classList.add('hidden');
            localStorage.setItem("policy", "show");
        })
    }

    function filterContestants(major) {
        const cards = document.querySelectorAll('.contestant-card');
        cards.forEach(card => {
            if (major === 'all' || card.getAttribute('data-major') === major) {
                card.classList.remove('hidden');
            } else {
                card.classList.add('hidden');
            }
        });
    }

    // Search filter
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('input', function() {
        const query = searchInput.value.toLowerCase();
        const cards = document.querySelectorAll('.contestant-card');
        cards.forEach(card => {
            const name = card.querySelector('h2').textContent.toLowerCase();
            const number = card.querySelector('.w-16').textContent;
            if (name.includes(query) || number.includes(query)) {
                card.classList.remove('hidden');
            } else {
                card.classList.add('hidden');
            }
        });
    });

    async function confirmVote(email) {
        const matchModal = document.getElementById("matchModal");
        matchModal.classList.add("hidden");

        const voteData = {
            email
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