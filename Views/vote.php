<?php require_once "../Components/header.php" ?>

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

            <!-- Filter Buttons -->
            <div class="flex gap-3 md:gap-12 sm:gap-12 mt-10">
                <button id="filterKingBtn" class="flex justify-center w-40 items-center bg-blue-500 text-lg md:text-2xl font-bold text-white py-3 px-5 rounded hover:bg-blue-700 transition">
                    <i class="fas fa-crown text-white mr-2 md:mr-4 cursor-pointer" id="kingIcon"></i>
                    <span>King</span>
                </button>

                <button id="filterQueenBtn" class="flex justify-center w-40 items-center bg-pink-500 text-lg md:text-2xl font-bold text-white py-3 px-5 rounded hover:bg-pink-700 transition">
                    <i class="fas fa-crown text-white mr-2 md:mr-4 cursor-pointer" id="queenIcon"></i>
                    <span>Queen</span>
                </button>
            </div>



        </div>

        <div class="flex items-center justify-center mt-10 h3 text-blue-500">
            <h3 class="text-xl md:text-3xl sm:text-3xl font-bold mr-5">Contestants For King </h3>
            <i class="fas fa-crown cursor-pointer text-3xl" id="kingIcon"></i>
        </div>

        <div id="filter_king" class="grid mt-12 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-12 p-2 max-w-8xl m-auto">
            <!-- Contestants for King will be displayed here -->
        </div>

        <div id="filter_queen" class="grid mt-12 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-12 p-2 hidden max-w-8xl m-auto">
            <!-- Contestants for Queen will be displayed here -->
        </div>

    </section>

</div>

<script src="../JS/vote.js"></script>


<?php require_once "../Components/footer.php" ?>