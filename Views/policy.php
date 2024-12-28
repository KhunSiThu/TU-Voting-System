<?php require_once "../Components/header.php" ?>

<div id="policyPage" class="bg-gray-100 text-gray-900">

    <?php require_once "../Components/navBar.php" ?>

    <!-- Page Header -->
    <header class="bg-blue-700 text-white py-8">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-extrabold">Voting Policy</h1>
            <p class="mt-3 text-xl">A fair and transparent voting process for all students.</p>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="container mx-auto px-6 lg:px-20 py-10 ">

        <!-- Overview Section -->
        <section class="space-y-8">
            <h2 class="text-3xl font-semibold text-blue-600">Overview</h2>
            <p class="text-lg text-gray-800 leading-relaxed">
                The voting process is designed to ensure fairness and transparency in selecting the King and Queen for each academic major.
                As a student, you are allowed to vote for one King and one Queen from your respective major. This policy helps maintain
                the integrity of the voting process and ensures an unbiased selection.
            </p>
        </section>

        <!-- Eligibility Requirements Section -->
        <section class="space-y-8 mt-10">
            <h2 class="text-3xl font-semibold text-blue-600">Eligibility Requirements</h2>
            <div class="space-y-4">
                <p class="text-lg text-gray-700">
                    To participate in the voting process, ensure that you meet the following requirements:
                </p>
                <ul class="list-disc pl-6 text-gray-700 space-y-2">
                    <li>You must be an active student at the university.</li>
                    <li>You must be enrolled in one of the participating majors.</li>
                    <li>Each student is allowed one vote for King and one vote for Queen within their major.</li>
                </ul>
            </div>
        </section>

        <!-- Voting Process Section -->
        <section class="space-y-8 mt-10">
            <h2 class="text-3xl font-semibold text-blue-600">Voting Process</h2>
            <div class="space-y-4">
                <p class="text-lg text-gray-700">
                    The voting process is simple and can be completed in a few easy steps. Here's how:
                </p>
                <ol class="list-decimal pl-6 text-gray-700 space-y-2">
                    <li>Login to your student portal with your university credentials.</li>
                    <li>Navigate to the “Vote Now” section.</li>
                    <li>Select your King and Queen candidates from the list of nominees in your major.</li>
                    <li>Click “Submit” to cast your vote.</li>
                    <li>Your vote is final, and cannot be changed once submitted.</li>
                </ol>
            </div>
        </section>

        <!-- Voting Rules Section -->
        <section class="space-y-8 mt-10">
            <h2 class="text-3xl font-semibold text-blue-600">Voting Rules</h2>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                <ul class="list-disc pl-6 text-gray-700 space-y-2">
                    <li><strong>One vote per student:</strong> You may cast one vote for the King and one vote for the Queen.</li>
                    <li><strong>Vote within your major:</strong> Only vote for candidates from your academic major.</li>
                    <li><strong>Confidentiality:</strong> Your vote is private, and each student is only allowed one vote for each title.</li>
                    <li><strong>Rule violations:</strong> Any violations of these rules may result in disqualification.</li>
                </ul>
            </div>
        </section>

        <!-- Voting Period Section -->
        <section class="space-y-8 mt-10 bg-yellow-100 border-l-4 border-yellow-500 p-6 rounded-lg">
            <h2 class="text-3xl font-semibold text-yellow-600">Voting Period</h2>
            <p class="text-lg text-gray-800">
                The voting period will begin on <strong>January 10, 2024</strong> and will close on <strong>January 20, 2024</strong>.
                <span class="text-red-500 font-semibold">Make sure to cast your vote within this timeframe!</span>
            </p>
            <p id="countdown" class="text-lg text-gray-700 font-semibold"></p>
        </section>

        <!-- Frequently Asked Questions (FAQ) -->
        <section class="space-y-8 mt-10">
            <h2 class="text-3xl font-semibold text-blue-600">Frequently Asked Questions (FAQ)</h2>
            <div class="space-y-6 text-lg text-gray-700">
                <!-- FAQ Item 1 -->
                <div class="faq-item">
                    <div class="faq-question cursor-pointer flex items-center justify-between bg-blue-100 p-4 rounded-md shadow-sm hover:bg-blue-200 transition-all duration-300" onclick="toggleAnswer('answer1')">
                        <p class="font-semibold">Q: Can I change my vote after submission?</p>
                        <span id="icon1" class="faq-icon text-blue-600">+</span>
                    </div>
                    <div id="answer1" class="faq-answer hidden max-h-0 overflow-hidden bg-gray-50 p-4 transition-all duration-300 ease-in-out">
                        <p>A: No, once you submit your vote, it is final. Please ensure you make your selection carefully before submitting.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item">
                    <div class="faq-question cursor-pointer flex items-center justify-between bg-blue-100 p-4 rounded-md shadow-sm hover:bg-blue-200 transition-all duration-300" onclick="toggleAnswer('answer2')">
                        <p class="font-semibold">Q: How do I know if I am eligible to vote?</p>
                        <span id="icon2" class="faq-icon text-blue-600">+</span>
                    </div>
                    <div id="answer2" class="faq-answer hidden max-h-0 overflow-hidden bg-gray-50 p-4 transition-all duration-300 ease-in-out">
                        <p>A: You are eligible if you are currently enrolled in a participating major. If you are unsure, please reach out to the student registration office.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item">
                    <div class="faq-question cursor-pointer flex items-center justify-between bg-blue-100 p-4 rounded-md shadow-sm hover:bg-blue-200 transition-all duration-300" onclick="toggleAnswer('answer3')">
                        <p class="font-semibold">Q: What should I do if I encounter a problem while voting?</p>
                        <span id="icon3" class="faq-icon text-blue-600">+</span>
                    </div>
                    <div id="answer3" class="faq-answer hidden max-h-0 overflow-hidden bg-gray-50 p-4 transition-all duration-300 ease-in-out">
                        <p>A: If you face any issues, contact support immediately at <a href="mailto:support@example.com" class="text-blue-600 hover:underline">support@example.com</a> or call +1 (123) 456-7890.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Information -->
        <section class="space-y-8 mt-10">
            <h2 class="text-3xl font-semibold text-blue-600">Need Assistance?</h2>
            <p class="text-lg text-gray-700">
                If you have any questions or face any issues during the voting process, feel free to contact our support team:
            </p>
            <p class="text-lg text-blue-600">Email: <a href="mailto:support@example.com">support@example.com</a></p>
            <p class="text-lg text-blue-600">Phone: +1 (123) 456-7890</p>
        </section>

        <!-- Privacy Policy Link -->
        <section class="mt-10">
            <p class="text-center text-blue-500">
                <a href="./policy.php" class="hover:underline">Privacy Policy</a>
            </p>
        </section>

    </main>


    <!-- JavaScript Section -->
    <script>
        // Countdown Timer for Voting Period
        const votingEndDate = new Date("2024-12-31T23:59:59").getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const timeRemaining = votingEndDate - now;

            const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

            document.getElementById("countdown").innerHTML =
                `${days}d ${hours}h ${minutes}m ${seconds}s remaining to vote.`;

            if (timeRemaining < 0) {
                document.getElementById("countdown").innerHTML = "Voting period has ended.";
            }
        }

        // Toggle FAQ answers with smooth transition
        function toggleAnswer(answerId) {
            const answer = document.getElementById(answerId);
            const icon = document.getElementById("icon" + answerId.charAt(answerId.length - 1));

            // Toggle the answer visibility
            answer.classList.toggle("hidden");

            // Adjust icon based on the state (open or closed)
            if (answer.classList.contains("hidden")) {
                icon.textContent = "+";
            } else {
                icon.textContent = "−";
            }

            // Smooth transition for the answer
            if (!answer.classList.contains("hidden")) {
                answer.style.maxHeight = answer.scrollHeight + "px"; // Expand answer
            } else {
                answer.style.maxHeight = "0"; // Collapse answer
            }
        }

        // Scroll smooth behavior for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Update the countdown every second
        setInterval(updateCountdown, 1000);

        // Initialize countdown when the page loads
        updateCountdown();
    </script>
</div>

<?php require_once "../Components/footer.php" ?>