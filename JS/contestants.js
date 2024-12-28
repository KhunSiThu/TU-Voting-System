const contestantsShowCon = document.querySelector("#contestants-show-con");

// Fetch data from the backend
fetch("../Controllers/getAllContestants.php")
    .then((response) => {
        if (!response.ok) {
            throw new Error("Failed to fetch contestants data");
        }
        return response.json();
    })
    .then((data) => {
        // Check if data is available
        if (!data || data.length === 0) {
            contestantsShowCon.innerHTML = '<p class="text-gray-700">No data available</p>';
            return;
        }

        // Define majors and their containers
        const majors = {
            EC: { label: "Electronic Engineering", container: document.querySelector("#EC"), content: "" },
            CE: { label: "Civil Engineering", container: document.querySelector("#CE"), content: "" },
            EP: { label: "Electrical Engineering", container: document.querySelector("#EP"), content: "" },
            ME: { label: "Mechanical Engineering", container: document.querySelector("#ME"), content: "" },
        };

        // Generate HTML for each contestant
        data.forEach((e) => {
            if (!majors[e.major]) {
                console.warn(`Contestant with major ${e.major} does not have a corresponding container.`);
                return;
            }

            majors[e.major].content += `
                <div class="bg-white rounded-xl shadow-lg contestant-card p-5 card-hover">
                    <div class="relative">
                        <img class="w-full h-60 object-cover rounded-t-lg" src="${e.profileImg || '../uploads/contestants/contestant3.jpg'}" alt="Profile image of ${e.name}" />
                        <div class="flex absolute left-5 bottom-5 items-center text-sm">
                            <span class="w-16 h-16 text-3xl font-bold bg-blue-100 text-blue-800 flex items-center justify-center rounded-full mr-3">
                                ${e.contestant_no}
                            </span>
                        </div>
                    </div>
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-blue-800 my-4">${e.name}</h1>
                        <p class="mb-3">Major - ${majors[e.major].label}</p>
                    </div>
                    <a href="#" 
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-3 text-center voteBtn" 
                        data-name="${e.name}" 
                        data-number="${e.contestant_no}" 
                        data-major="${e.major}">
                        Vote Now
                    </a>
                </div>`;
        });

        // Render HTML for each major
        Object.keys(majors).forEach((key) => {
            if (majors[key].container) {
                majors[key].container.innerHTML = majors[key].content || '<p class="text-gray-700">No contestants in this category</p>';
            }
        });

        // Add event listeners to "Vote Now" buttons
        setupVoteButtons();
    })
    .catch((error) => {
        console.error("Error fetching contestants:", error);
        contestantsShowCon.innerHTML = '<p class="text-red-600">Error loading contestants data. Please try again later.</p>';
    });

// Function to filter contestants by major
function filterContestants(major) {
    const sections = document.querySelectorAll(".major-section");
    sections.forEach((section) => {
        if (major === "all" || section.getAttribute("data-major") === major) {
            section.classList.remove("hidden");
        } else {
            section.classList.add("hidden");
        }
    });
}

// Function to set up event listeners for vote buttons
function setupVoteButtons() {
    const voteButtons = document.querySelectorAll(".voteBtn");
    const modal = document.getElementById("voteModal");
    const closeModal = document.getElementById("closeModal");
    const contestantNameSpan = document.getElementById("contestantName");
    const contestantNumberSpan = document.getElementById("contestantNumber");
    const confirmVote = document.getElementById("confirmVote");

    // Validate modal elements exist
    if (!modal || !closeModal || !contestantNameSpan || !contestantNumberSpan || !confirmVote) {
        console.error("Modal elements are missing from the DOM.");
        return;
    }

    voteButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
            e.preventDefault();

            // Get button data attributes
            const name = button.getAttribute("data-name");
            const number = button.getAttribute("data-number");
            const major = button.getAttribute("data-major");
            const requiredMajor = "EC"; // Change this to your criteria

            if (!name || !number || !major) {
                console.warn("Button data attributes are missing or invalid.");
                return;
            }

            // Check major condition
            if (major === requiredMajor) {
                // Populate modal content for a valid vote
                contestantNameSpan.textContent = name;
                contestantNumberSpan.textContent = number;

                // Show modal
                modal.classList.remove("hidden");
                modal.style.display = "flex"; // Ensure modal is displayed as flex
            } else {
                alert("You cannot vote for this contestant because their major does not match your criteria.");
            }
        });
    });

    // Close modal on cancel
    closeModal.addEventListener("click", () => {
        modal.classList.add("hidden");
        modal.style.display = "none"; // Hide modal properly
    });

    // Close modal when clicking outside the modal content
    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.classList.add("hidden");
            modal.style.display = "none"; // Hide modal properly
        }
    });

    // Confirm vote action
    confirmVote.addEventListener("click", () => {
        alert("Your vote has been submitted!");
        modal.classList.add("hidden");
        modal.style.display = "none"; // Hide modal properly
    });
}

