<?php require_once "../Components/header.php" ?>

<?php require_once "../Components/navBar.php" ?>

<style>
    #countdown {

        height: 100vh;
        right: 0;
        top: 0;
    }
</style>



<div id="main-section" class="sm:ml-64 bg-gradient-to-r from-blue-100 via-white to-pink-100 relative">

    <!-- Countdown Timer Section -->
    <section id="countdown" class="bg-white p-5 md:p-20 sm:p-20 text-center flex items-center justify-center ">
      <div class="countdown-container text-center space-y-8">
        <h1 class="text-3xl font-bold uppercase tracking-wide">
          Countdown to Voting Deadline
        </h1>
        <p class="text-gray-400">Keep track of the remaining time to cast your vote:</p>

        <!-- Circular Progress Bars -->
        <div class="block md:flex sm:flex justify-between">

          <div class="flex gap-6 justify-between mb-5">
            <!-- Days -->
            <div class="circle">
              <svg width="120" height="120">
                <circle class="background" cx="60" cy="60" r="50"></circle>
                <circle id="progress-days" class="progress text-yellow-400" cx="60" cy="60" r="50" stroke="#FFD700"></circle>
              </svg>
              <div class="label ">
                <span id="days" class="text-2xl">00</span><br />
                <small>Days</small>
              </div>
            </div>

            <!-- Hours -->
            <div class="circle">
              <svg width="120" height="120">
                <circle class="background" cx="60" cy="60" r="50"></circle>
                <circle id="progress-hours" class="progress" cx="60" cy="60" r="50" stroke="#1E90FF"></circle>
              </svg>
              <div class="label">
                <span id="hours" class="text-2xl">00</span><br />
                <small>Hours</small>
              </div>
            </div>
          </div>


          <div class="flex gap-6 justify-between">
            <!-- Minutes -->
            <div class="circle ">
              <svg width="120" height="120">
                <circle class="background" cx="60" cy="60" r="50"></circle>
                <circle id="progress-minutes" class="progress" cx="60" cy="60" r="50" stroke="#32CD32"></circle>
              </svg>
              <div class="label">
                <span id="minutes" class="text-2xl">00</span><br />
                <small>Minutes</small>
              </div>
            </div>

            <!-- Seconds -->
            <div class="circle ">
              <svg width="120" height="120">
                <circle class="background" cx="60" cy="60" r="50"></circle>
                <circle id="progress-seconds" class="progress" cx="60" cy="60" r="50" stroke="#FF4500"></circle>
              </svg>
              <div class="label">
                <span id="seconds" class="text-2xl">00</span><br />
                <small>Seconds</small>
              </div>
            </div>
          </div>

        </div>
        <p class="mt-4 text-gray-600">Don't miss the opportunity! Vote before it's too late!</p>
        <div id="" class="mt-3"> <a href="./vote.php" class=" font-bold bg-blue-700 text-white px-4 py-3 rounded ">Vote Now </a></div>
      </div>

    </section>

    <div id="winnersPage" class="hidden  mt-14 rounded-xl">

        <!-- Hero Section -->
        <section class="text-center py-24  px-3">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-2xl md:text-4xl font-extrabold mb-6 tracking-tight text-blue-500">King & Queen Election Results</h1>
                <p class="text-sm md:text-xl mb-10 prose text-justify">Join us in celebrating the winners from each major. These exceptional individuals have earned recognition for their leadership and contributions to their communities.</p>
                <a href="#major-results" class="text-lg text-indigo-500 font-semibold inline-block px-6 py-3 border-2 border-indigo-200 rounded-full transition-all duration-300 hover:bg-indigo-200">View Major Results</a>
            </div>
        </section>

        <!-- Overall Winners Section -->
        <section class="py-20 rounded-xl mx-5 mb-16">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-semibold mb-12 text-center ">Overall Winners</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-10">
                    <!-- Overall King -->
                    <div id="overallKing" class="flex flex-col items-center border-blue-400 border-2 bg-white shadow-2xl rounded-3xl p-8 transform hover:scale-105 hover:shadow-blue-400 transition-all duration-500 animate-bounce-on-hover">
                        <h1 class="font-bold text-center">Data not found!</h1>
                    </div>

                    <!-- Overall Queen -->
                    <div id="overallQueen" class="flex flex-col items-center border-pink-400 border-2 bg-white shadow-2xl rounded-3xl p-8 transform hover:scale-105 hover:shadow-pink-400 transition-all duration-500 animate-bounce-on-hover">
                        <h1 class="font-bold text-center">Data not found!</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Major Results Sections -->
        <section id="major-results" class="py-20 px-6">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-semibold mb-12 text-center text-indigo-700">Major Results</h2>

                <!-- Electronic Engineering Section -->
                <div class="mb-16 ">
                    <h3 class="text-3xl font-semibold text-indigo-600 mb-6">Electronic Engineering</h3>
                    <p class="text-sm md:text-xl text-gray-600 mb-6">These outstanding students have demonstrated exceptional skills in areas like circuit design and innovative tech solutions. Their work reflects the future of engineering.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-12">
                        <!-- King Card -->
                        <div id="ECKing" class="bg-white border-blue-400 border-2 p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                            <h1 class="font-bold text-center">Data not found!</h1>
                        </div>

                        <!-- Queen Card -->
                        <div id="ECQueen" class="bg-white border-pink-400 border-2 p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                            <h1 class="font-bold text-center">Data not found!</h1>
                        </div>
                    </div>
                </div>

                <!-- Electrical Power Engineering Section -->
                <div class="mb-16">
                    <h3 class="text-2xl font-semibold text-indigo-600 mb-6">Electrical Power Engineering</h3>
                    <p class="text-sm md:text-xl text-gray-600 mb-6 prose text-justify">Our winners from Electrical Power Engineering have excelled in power systems and renewable energy, driving innovations for a sustainable future.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-12">
                        <!-- King Card -->
                        <div id="EPKing" class="bg-white border-blue-400 border-2 p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                            <h1 class="font-bold text-center">Data not found!</h1>
                        </div>

                        <!-- Queen Card -->
                        <div id="EPQueen" class="bg-white border-pink-400 border-2 p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                            <h1 class="font-bold text-center">Data not found!</h1>
                        </div>
                    </div>
                </div>

                <!-- Mechanical Engineering Section -->
                <div class="mb-16">
                    <h3 class="text-2xl font-semibold text-indigo-600 mb-6">Mechanical Engineering</h3>
                    <p class="text-sm md:text-xl text-gray-600 mb-6 prose text-justify">Mechanical Engineering students are pushing the boundaries of robotics, thermodynamics, and mechanical design.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-12">
                        <!-- King Card -->
                        <div id="MEKing" class="bg-white border-blue-400 border-2 p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                            <h1 class="font-bold text-center">Data not found!</h1>
                        </div>

                        <!-- Queen Card -->
                        <div id="MEQueen" class="bg-white border-pink-400 border-2 p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                            <h1 class="font-bold text-center">Data not found!</h1>
                        </div>
                    </div>
                </div>

                <!-- Civil Engineering Section -->
                <div class="mb-16">
                    <h3 class="text-3xl font-semibold text-indigo-600 mb-6">Civil Engineering</h3>
                    <p class="text-sm md:text-xl text-gray-600 mb-6 prose text-justify" >Civil Engineering students are designing the infrastructure of tomorrow, focusing on sustainable building practices and innovative construction methods.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-12">
                        <!-- King Card -->
                        <div id="CEKing" class="bg-white border-blue-400 border-2 p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                            <h1 class="font-bold text-center">Data not found!</h1>
                        </div>

                        <!-- Queen Card -->
                        <div id="CEQueen" class="bg-white border-pink-400 border-2 p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                            <h1 class="font-bold text-center">Data not found!</h1>
                        </div>
                    </div>
                </div>

            </div>
        </section>


    </div>

    <?php require_once "../Components/footer.php" ?>

</div>

</body>

<!-- <script src="../JS/countdown.js"></script> -->

<script>
    fetch('../Controllers/get_voting_end.php')
        .then(response => response.json()) // Get the response in JSON format
        .then(data => {

            const votingEndDate = new Date(data).getTime();

            function updateCountdown() {
                const now = new Date().getTime();
                const distance = votingEndDate - now;

                const totalSecondsInDay = 24 * 60 * 60;
                const totalSecondsInHour = 60 * 60;
                const totalSecondsInMinute = 60;

                // Time calculations
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Opposite progress calculation
                const totalDays = Math.ceil((votingEndDate - new Date(votingEndDate).setHours(0, 0, 0, 0)) / (1000 * 60 * 60 * 24));
                const remainingDays = (days / totalDays) * 100;
                const remainingHours = (hours / 24) * 100;
                const remainingMinutes = (minutes / 60) * 100;
                const remainingSeconds = (seconds / 60) * 100;

                // Update text
                document.getElementById("days").textContent = days.toString().padStart(2, '0');
                document.getElementById("hours").textContent = hours.toString().padStart(2, '0');
                document.getElementById("minutes").textContent = minutes.toString().padStart(2, '0');
                document.getElementById("seconds").textContent = seconds.toString().padStart(2, '0');

                // Update progress bars
                document.getElementById("progress-days").setAttribute("stroke-dasharray", `${remainingDays * 3.14}, 314`);
                document.getElementById("progress-hours").setAttribute("stroke-dasharray", `${remainingHours * 3.14}, 314`);
                document.getElementById("progress-minutes").setAttribute("stroke-dasharray", `${remainingMinutes * 3.14}, 314`);
                document.getElementById("progress-seconds").setAttribute("stroke-dasharray", `${remainingSeconds * 3.14}, 314`);

                // Stop timer when time is up
                if (distance < 0) {
                    clearInterval(interval);
                    resultShow();
                    document.querySelector("#countdown").classList.add("hidden");
                    document.querySelector("#winnersPage").classList.remove("hidden");
                }
            }

            // Set up SVG progress circle
            document.querySelectorAll(".progress").forEach((circle) => {
                circle.setAttribute("stroke-dasharray", "314, 314");
            });

            // Update countdown every second
            const interval = setInterval(updateCountdown, 1000);

        })
        .catch(error => {
            console.error('Error fetching voting end time:', error);
        });

    function resultShow() {
        const overallKingElement = document.querySelector("#overallKing");
        const overallQueenElement = document.querySelector("#overallQueen");
        const ECKing = document.querySelector("#ECKing");
        const ECQueen = document.querySelector("#ECQueen");
        const EPKing = document.querySelector("#EPKing");
        const EPQueen = document.querySelector("#EPQueen");
        const MEKing = document.querySelector("#MEKing");
        const MEQueen = document.querySelector("#MEQueen");
        const CEKing = document.querySelector("#CEKing");
        const CEQueen = document.querySelector("#CEQueen");

        function getMajorName(majorCode) {
            const majorNames = {
                "EC": "Electronic Engineering",
                "EP": "Electrical Power Engineering",
                "ME": "Mechanical Engineering",
                "CE": "Civil Engineering"
            };
            return majorNames[majorCode] || "Unknown Major";
        }

        function fetchKingQueenData(gender, majorCode, elementForKing) {
            fetch(`../Controllers/get_king_queen.php?gender=${gender}&major=${majorCode}`)
                .then(response => response.json()) // Parse the JSON response
                .then(data => {
                    if (data.error) {
                        console.log(data.error);
                    } else {
                        if (gender == "Male") {
                            // King Section
                            elementForKing.innerHTML = `

                            <!-- King -->
                           <h2 class="text-3xl font-bold text-blue-700 mb-6">👑 King</h2>
                            <div class="relative  w-60 h-60 mx-auto rounded-full overflow-hidden shadow-lg border-8 border-blue-600 transform hover:rotate-6 transition-transform duration-500">
                                <img src="${data.profile_image}" alt="King" class="w-full h-full object-cover">
                            </div>
                            <p class="text-blue-700 font-extrabold text-2xl mt-6">${data.name}</p>
                            <p class="text-gray-700 my-2 font-bold">Major : ${getMajorName(data.major)}</p>
                            <p class="text-gray-700 text-lg ">
                                <i class="fas fa-vote-yea text-blue-600"></i> Votes : <span class="font-semibold text-gray-900">${data.count_email}</span>
                            </p>


                        `;
                        } else {
                            // Queen Section
                            elementForKing.innerHTML = `
                            <h2 class="text-3xl font-bold text-pink-600 mb-6">👑 Queen</h2>
                            <div class="relative w-60 h-60 mx-auto rounded-full overflow-hidden shadow-lg border-8 border-pink-500 transform hover:rotate-6 transition-transform duration-500">
                                <img src="${data.profile_image}" alt="Queen" class="w-full h-full object-cover">
                            </div>
                            <p class="text-pink-600 font-extrabold text-2xl ">${data.name}</p>
                            <p class="text-gray-700 my-2 font-bold">Major : ${getMajorName(data.major)}</p>
                            <p class="text-gray-700 text-lg">
                                <i class="fas fa-vote-yea text-pink-500"></i> Votes : <span class="font-semibold text-gray-900">${data.count_email}</span>
                            </p>
                `;
                        }

                    }
                })
                .catch(error => {
                    console.error('Error fetching the data:', error);
                });
        }

        // Fetching data for each major and gender combination
        fetchKingQueenData("Male", "EC", ECKing);
        fetchKingQueenData("Female", "EC", ECQueen);

        fetchKingQueenData("Male", "EP", EPKing);
        fetchKingQueenData("Female", "EP", EPQueen);

        fetchKingQueenData("Male", "ME", MEKing);
        fetchKingQueenData("Female", "ME", MEQueen);

        fetchKingQueenData("Male", "CE", CEKing);
        fetchKingQueenData("Female", "CE", CEQueen);

        // Overall King and Queen
        fetch("../Controllers/get_king_queen.php?gender=Male")
            .then(response => response.json()) // Parse the JSON response
            .then(data => {
                if (data.error) {
                    console.log(data.error);
                } else {
                    overallKingElement.innerHTML = `
                    <!-- King -->
                   
                        <h2 class="text-3xl font-bold text-blue-700 mb-6">👑 King</h2>
                        <div class="relative h-60 md:h-80 sm:h-80 m rounded-full overflow-hidden shadow-lg border-8 border-blue-600 transform hover:rotate-6 transition-transform duration-500">
                            <img src="${data.profile_image}" alt="King" class="w-full h-full object-cover">
                        </div>
                        <p class="text-blue-700 font-extrabold text-2xl mt-6">${data.name}</p>
                        <p class="text-gray-700 my-2 font-bold ">Major : ${getMajorName(data.major)}</p>
                        <p class="text-gray-700 text-lg ">
                            <i class="fas fa-vote-yea text-blue-600"></i> Votes : <span class="font-semibold text-gray-900">${data.count_email}</span>
                        </p>
                  
            `;
                }
            })
            .catch(error => {
                console.error('Error fetching the data:', error);
            });

        fetch("../Controllers/get_king_queen.php?gender=Female")
            .then(response => response.json()) // Parse the JSON response
            .then(data => {
                if (data.error) {
                    console.log(data.error);
                } else {
                    overallQueenElement.innerHTML = `
                    <h2 class="text-3xl font-bold text-pink-600 mb-6">👑 Queen</h2>
                    <div class="relative h-60 md:h-80 sm:h-80 rounded-full overflow-hidden shadow-lg border-8 border-pink-500 transform hover:rotate-6 transition-transform duration-500">
                        <img src="${data.profile_image}" alt="Queen" class="w-full h-full object-cover">
                    </div>
                    <p class="text-pink-600 font-extrabold text-2xl mt-6">${data.name}</p>
                    <p class="text-gray-700 my-2 font-bold ">Major : ${getMajorName(data.major)}</p>
                    <p class="text-gray-700 text-lg">
                        <i class="fas fa-vote-yea text-pink-500"></i> Votes : <span class="font-semibold text-gray-900">${data.count_email}</span>
                    </p>
            `;
                }
            })
            .catch(error => {
                console.error('Error fetching the data:', error);
            });
    }
</script>


</html>