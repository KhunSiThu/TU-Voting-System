<?php require_once "../Components/header.php"; ?>

<?php require_once "../Components/navBar.php" ?>

<!-- Add New Candidate Modal -->
<div id="addCandidateModal" class="modal fixed inset-0 bg-blur flex justify-center items-center z-50 hidden">
    <div class="modal-content bg-white p-6 rounded-lg shadow-lg w-1/3">
        <h2 class="text-2xl font-bold text-center mb-4">Add New Candidate</h2>

        <!-- Form -->
        <form id="addCandidateForm" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="candidateName" class="block text-lg font-medium">Candidate Name</label>
                <input type="text" id="candidateName" name="candidateName" class="w-full px-4 py-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="candidateNumber" class="block text-lg font-medium">Candidate Number</label>
                <input type="number" id="candidateNumber" name="candidateNumber" class="w-full px-4 py-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="candidateMajor" class="block text-lg font-medium">Major</label>
                <select id="candidateMajor" name="candidateMajor" class="w-full px-4 py-2 border rounded-md" required>
                    <option value="EC">Electrical Engineering</option>
                    <option value="EP">Electronic Power Engineering</option>
                    <option value="ME">Mechanical Engineering</option>
                    <option value="CE">Civil Engineering</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="candidateEmail" class="block text-lg font-medium">Candidate Email</label>
                <input type="email" id="candidateEmail" name="candidateEmail" class="w-full px-4 py-2 border rounded-md" required>
            </div>

            <!-- Gender Selection -->
            <div class="mb-4">
                <label class="block text-lg font-medium">Gender</label>
                <div class="flex space-x-4">
                    <label for="male" class="flex items-center">
                        <input type="radio" id="male" name="candidateGender" value="Male" class="mr-2">
                        Male
                    </label>
                    <label for="female" class="flex items-center">
                        <input type="radio" id="female" name="candidateGender" value="Female" class="mr-2">
                        Female
                    </label>
                    <label for="other" class="flex items-center">
                        <input type="radio" id="other" name="candidateGender" value="Other" class="mr-2">
                        Other
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label for="candidateImage" class="block text-lg font-medium">Candidate Image</label>
                <input type="file" id="candidateImage" name="candidateImage" accept="image/*" class="w-full px-4 py-2 border rounded-md">
            </div>

            <div class="flex justify-between items-center">
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md">Add Candidate</button>
                <button type="button" id="cancelAddModal" class="bg-red-600 text-white px-5 py-2 rounded-md">Cancel</button>
            </div>
        </form>
    </div>
</div>


<!-- Edit Candidate Modal -->
<div id="editModal" class="modal fixed inset-0 bg-blur flex justify-center items-center hidden z-50">
    <div class="modal-content bg-white p-6 rounded-lg shadow-lg w-1/3">
        <h2 class="text-2xl font-bold text-center mb-4">Edit Candidate</h2>

        <!-- Form -->
        <form id="editCandidateForm" enctype="multipart/form-data">
            <input type="hidden" id="editCandidateId" name="candidateId">

            <div class="mb-4">
                <label for="editCandidateName" class="block text-lg font-medium">Candidate Name</label>
                <input type="text" id="editCandidateName" name="candidateName" class="w-full px-4 py-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="editCandidateNumber" class="block text-lg font-medium">Candidate Number</label>
                <input type="number" id="editCandidateNumber" name="candidateNumber" class="w-full px-4 py-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="editCandidateMajor" class="block text-lg font-medium">Major</label>
                <select id="editCandidateMajor" name="candidateMajor" class="w-full px-4 py-2 border rounded-md" required>
                    <option value="EC">Electrical Engineering</option>
                    <option value="EP">Electronic Power Engineering</option>
                    <option value="ME">Mechanical Engineering</option>
                    <option value="CE">Civil Engineering</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="editCandidateEmail" class="block text-lg font-medium">Candidate Email</label>
                <input type="email" id="editCandidateEmail" name="candidateEmail" class="w-full px-4 py-2 border rounded-md" required>
            </div>

            <!-- Gender Selection -->
            <div class="mb-4">
                <label class="block text-lg font-medium">Gender</label>
                <div class="flex space-x-4">
                    <label for="editMale" class="flex items-center">
                        <input type="radio" id="editMale" name="candidateGender" value="Male" class="mr-2">
                        Male
                    </label>
                    <label for="editFemale" class="flex items-center">
                        <input type="radio" id="editFemale" name="candidateGender" value="Female" class="mr-2">
                        Female
                    </label>
                    <label for="editOther" class="flex items-center">
                        <input type="radio" id="editOther" name="candidateGender" value="Other" class="mr-2">
                        Other
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label for="editCandidateImage" class="block text-lg font-medium">Candidate Image</label>
                <input type="file" id="editCandidateImage" name="candidateImage" accept="image/*" class="w-full px-4 py-2 border rounded-md">
            </div>

            <div class="flex justify-between items-center">
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md">Save Changes</button>
                <button type="button" id="cancelEditModal" class="bg-red-600 text-white px-5 py-2 rounded-md">Cancel</button>
            </div>
        </form>
    </div>
</div>



<div id="deleteModal" class="fixed hidden inset-0 bg-blur bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center max-w-sm w-full">
        <h3 class="text-lg font-semibold mb-4">Are you sure?</h3>
        <p class="text-gray-700 mb-6">Do you really want to delete this candidate? This action cannot be undone.</p>
        <div class="flex justify-center gap-4">
            <button id="confirmDelete" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-800">Yes, Delete</button>
            <button id="cancelDelete" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
        </div>
    </div>
</div>


<div id="main-section" class="sm:ml-64">
    <div id="candidatesPage" class="bg-gray-100 text-gray-900  rounded-lg dark:border-gray-700 mt-14">

        <!-- Search Section -->
        <section class="py-10 text-center">
            <div class="max-w-6xl mx-auto px-4 sm:px-0 lg:px-8">
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-semibold mb-4">Search candidates</h2>
                <input
                    type="text"
                    id="searchInput"
                    placeholder="Search by Name or candidate Number"
                    class="px-4 py-2 border border-gray-300 rounded-lg w-full max-w-md mx-auto text-lg">
            </div>
        </section>

        <!-- Filter Section -->
        <section class="hidden pb-10 text-center lg:block">
            <div class="max-w-6xl mx-auto px-0 sm:px-0 lg:px-8">
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-semibold mb-4">candidates by Major</h2>
                <div class="flex flex-wrap justify-center gap-5 ">
                    <button class="bg-blue-500 text-white p-3 rounded text-sm sm:text-base" onclick="filtercandidates('all')">All</button>
                    <button class="bg-blue-500 text-white p-3 rounded text-md sm:text-base" onclick="filtercandidates('CE')">Civil Engineering</button>
                    <button class="bg-blue-500 text-white p-3 rounded text-md sm:text-base" onclick="filtercandidates('EP')">Electrical Power Engineering</button>
                    <button class="bg-blue-500 text-white p-3 rounded text-md sm:text-base" onclick="filtercandidates('EC')">Electronic Engineering</button>
                    <button class="bg-blue-500 text-white p-3 rounded text-md sm:text-base" onclick="filtercandidates('ME')">Mechanical Engineering</button>
                </div>
            </div>

            <button class="mt-10 bg-blue-500 text-white p-3 rounded text-sm sm:text-base" onclick="openAddCandidateModal()">Add New Candidate</button>
        </section>

        

        <!-- candidate Sections -->
        <section class="py-16 px-3 text-center ">
            <div id="candidates-show-con" class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-12">
            </div>
        </section>


    </div>

    <?php require_once "../Components/footer.php" ?>
</div>

<script src="../JS/candidates.js"></script>




</body>

</html>