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

            const cardHTML = `
                <div class="bg-white rounded-xl shadow-lg candidate-card p-5 card-hover" id="${candidate.id}">
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

                document.querySelector("#confirmMatchVote").addEventListener("click", () => confirmVote(email,id));
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

async function confirmVote(email,id) {
    const matchModal = document.getElementById("matchModal");
    matchModal.classList.add("hidden");

    const voteData = { email,id };

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
