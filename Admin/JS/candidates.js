const candidatesShowCon = document.querySelector("#candidates-show-con");
const deleteModal = document.getElementById('deleteModal');
const editModal = document.getElementById('editModal');
const confirmDeleteButton = document.getElementById('confirmDelete');
const cancelDeleteButton = document.getElementById('cancelDelete');
const cancelEditModalButton = document.getElementById('cancelEditModal');
const editCandidateForm = document.getElementById('editCandidateForm');
let candidateToDelete = null;
let candidateToEdit = null;

// Fetch candidates from the database
async function fetchCandidates() {
    try {
        const response = await fetch("../Controllers/getAllCandidate.php");
        if (!response.ok) {
            throw new Error("Failed to fetch candidates data: " + response.statusText);
        }
        const data = await response.json();

        if (!data || data.length === 0) {
            candidatesShowCon.innerHTML = '<p class="text-gray-700">No candidates available</p>';
            return;
        }

        candidatesShowCon.innerHTML = "";

        // Generate candidate cards
        data.forEach(candidate => {
            const candidateCard = document.createElement("div");
            candidateCard.classList.add("candidate-card", "rounded-xl", "shadow-lg", "p-5", "card-hover", "bg-white");
            candidateCard.setAttribute("data-id", candidate.id);
            candidateCard.setAttribute('data-major', candidate.major); // Store major for filtering

            let majorName = getMajorName(candidate.major);

            candidateCard.innerHTML = `
            <div class="relative flex flex-col items-center">
                <div class="relative w-60 h-60 rounded-full overflow-hidden shadow-lg border-4 border-pink-500">
                    <img src="../${candidate.profile_image}" alt="${candidate.name}" class="w-full h-full object-cover">
                </div>
                <div class="flex absolute left-0 bottom-0 items-center text-sm">
                    <span class="w-16 h-16 text-3xl font-bold bg-blue-100 text-blue-800 flex items-center justify-center rounded-full mr-3">
                        ${candidate.candidate_no}
                    </span>
                </div>
            </div>
            <h2 class="text-2xl font-bold text-blue-800 my-4">${candidate.name}</h2>
            <p class="font-bold">Major - ${majorName}</p>
            <div class="mt-5">
                <button type="button" id="edit-${candidate.id}" class="mr-3 text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-500 font-medium rounded-lg text-sm px-5 py-2.5">Edit</button>
                <button type="button" id="delete-${candidate.id}" class="delete-button focus:outline-none text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-500 font-medium rounded-lg text-sm px-5 py-2.5">Delete</button>
            </div>
        `;

            candidatesShowCon.appendChild(candidateCard);

            // Add edit button event listener
            document.getElementById(`edit-${candidate.id}`).addEventListener('click', function () {
                candidateToEdit = candidate;
                showEditModal(candidate);
            });

            // Add delete button event listener
            document.getElementById(`delete-${candidate.id}`).addEventListener('click', function () {
                candidateToDelete = candidate.id;
                deleteModal.classList.remove('hidden');
            });
        });
    } catch (error) {
        console.error("Error loading candidates:", error);
        candidatesShowCon.innerHTML = `<p class="text-red-600">Error loading candidates. Please try again later. ${error.message}</p>`;
    }
}

function getMajorName(majorCode) {
    const majorMap = {
        "EC": "Electrical Engineering",
        "EP": "Electronic Power Engineering",
        "ME": "Mechanical Engineering",
        "CE": "Civil Engineering",
    };
    return majorMap[majorCode] || "Unknown Major";
}

function filtercandidates(major) {
    const cards = document.querySelectorAll('.candidate-card');
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
    const cards = document.querySelectorAll('.candidate-card');
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


// Function to show the edit modal with existing candidate data
function showEditModal(candidate) {
    document.getElementById('editCandidateId').value = candidate.id;
    document.getElementById('editCandidateName').value = candidate.name;
    document.getElementById('editCandidateNumber').value = candidate.candidate_no;
    document.getElementById('editCandidateEmail').value = candidate.email;
    document.getElementById('editCandidateMajor').value = candidate.major;

    // Set gender radio buttons
    if (candidate.gender) {
        document.querySelector(`#edit${candidate.gender}`).checked = true;
    }

    // Show the modal
    document.getElementById('editModal').classList.remove('hidden');
}

// Add event listener to handle form submission
document.getElementById('editCandidateForm').addEventListener('submit', async function (e) {
    e.preventDefault(); // Prevent default form submission

    const formData = new FormData(this); // Get form data

    try {
        const response = await fetch("../editCandidate.php", {
            method: "POST",
            body: formData
        });

        const result = await response.json();

        if (result.success) {
            alert('Candidate updated successfully!');
            document.getElementById('editModal').classList.add('hidden'); // Close the modal
            fetchCandidates(); // Refresh the candidate list
        } else {
            alert('Failed to update candidate: ' + result.message);
        }
    } catch (error) {
        console.error("Error editing candidate:", error);
        alert("An error occurred while editing the candidate.");
    }
});


// Cancel Edit
cancelEditModalButton.addEventListener('click', () => {
    editModal.classList.add('hidden');
    candidateToEdit = null;
});

// Confirm Delete
confirmDeleteButton.addEventListener('click', async () => {
    if (candidateToDelete) {
        try {
            const response = await fetch("../Controllers/deleteCandidate.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: new URLSearchParams({ candidateId: candidateToDelete })
            });

            const result = await response.json();

            if (result.success) {
                // Remove the candidate card from the page
                const candidateCard = document.querySelector(`[data-id='${candidateToDelete}']`);
                if (candidateCard) {
                    candidateCard.remove();
                }

                alert(result.message);
            } else {
                alert(result.message);
            }
        } catch (error) {
            console.error("Error deleting candidate:", error);
            alert("An error occurred while deleting the candidate.");
        }
    }
    deleteModal.classList.add('hidden');
    candidateToDelete = null;
});

// Cancel Delete
cancelDeleteButton.addEventListener('click', () => {
    deleteModal.classList.add('hidden');
    candidateToDelete = null;
});

// Initial fetch
fetchCandidates();


const addCandidateModal = document.getElementById("addCandidateModal");
const addCandidateForm = document.getElementById("addCandidateForm");
const cancelAddModalButton = document.getElementById("cancelAddModal");

// Open the Add New Candidate Modal
function openAddCandidateModal() {
    addCandidateModal.classList.remove('hidden');
}

// Close the Add New Candidate Modal
cancelAddModalButton.addEventListener('click', () => {
    addCandidateModal.classList.add('hidden');
});

addCandidateForm.addEventListener('submit', async function (e) {
    e.preventDefault(); // Prevent default form submission

    const formData = new FormData(this); // Get form data

    try {
        const response = await fetch("../Controllers/addCandidate.php", {
            method: "POST",
            body: formData
        });

        const result = await response.json();

        if (result.success) {
            alert('Candidate added successfully!');
            addCandidateModal.classList.add('hidden'); // Close the modal
            fetchCandidates(); // Refresh the candidate list
        } else {
            alert('Failed to add candidate: ' + result.message);
        }
    } catch (error) {
        console.error("Error adding candidate:", error);
        alert("An error occurred while adding the candidate.");
    }
});


