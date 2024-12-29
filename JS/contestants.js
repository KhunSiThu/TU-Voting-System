
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
