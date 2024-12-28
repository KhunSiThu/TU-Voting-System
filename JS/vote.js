const filterKing = document.querySelector("#filter_king");
const filterQueen = document.querySelector("#filter_queen");
const filterKingBtn = document.querySelector("#filterKingBtn");
const filterQueenBtn = document.querySelector("#filterQueenBtn");

fetch("../Controllers/getMajorContestants.php")
    .then((response) => {
        if (!response.ok) {
            throw new Error("Failed to fetch contestants data");
        }
        return response.json();
    })
    .then((data) => {
        // Check if data is available
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
    filterContestants(filterKing, filterQueen);
    document.querySelector("#Hero .h3").innerHTML = `
    <h3 class=" text-3xl font-bold mr-5">Contestants For King </h3>
    <i class="fas fa-crown cursor-pointer text-3xl" id="kingIcon"></i>
    `;
});
filterQueenBtn.addEventListener("click", () => {
    filterContestants(filterQueen, filterKing);
    document.querySelector("#Hero .h3").innerHTML = `
    <h3 class=" text-3xl font-bold mr-5 text-pink-500 ">Contestants For Queen </h3>
    <i class="fas fa-crown cursor-pointer text-3xl text-pink-500" id="kingIcon"></i>
    `;
}
);

// Function to filter contestants
function filterContestants(showElement, hideElement) {
    showElement.classList.remove("hidden");
    hideElement.classList.add("hidden");
}
