<?php require_once "../Components/header.php" ?>


<?php require_once "../Components/navBar.php" ?>

<div id="main-section" class="sm:ml-64">
  <div id="homePage" class="bg-gray-100 text-gray-900  rounded-lg dark:border-gray-700 mt-14">
    <!-- Hero Section -->
    <section id="Hero" class="text-center py-10 relative bg-cover bg-center flex justify-center items-center"
      style="background-image: url('../Images/school.png')">
      <div class="absolute inset-0 bg-gradient-to-r from-black to-black opacity-70"></div>
      <div class="relative z-10 flex justify-between home-main">
        <div class="w-full flex justify-center uniLogoCon">
          <img src="../Images/uni_logo.png" alt="University Logo" class="mr-3" />
        </div>

        <div class="mainHeader flex justify-center flex-col items-center">
          <h1 class="text-3xl text-white sm:text-4xl md:text-5xl font-bold mb-4">
            <span class="text-blue-500 text-7xl">King and Queen Selection</span>
            <span class="s2 block my-6">Technological University (Yamethin)</span>
          </h1>
          <p class="text-lg text-white sm:text-xl md:text-2xl mb-2 opacity-70">
            Vote for your favorite candidates from your major and help them shine bright!
          </p>
        </div>
      </div>
    </section>

    <!-- Countdown Timer Section -->
    <section id="countdown" class="bg-white p-5 md:p-20 sm:p-20 text-center flex items-center justify-center ">
      <div class="countdown-container text-center space-y-8">
        <h1 class="text-3xl font-bold uppercase tracking-wide">
          Countdown to Voting Deadline
        </h1>
        <p class="text-gray-400 text-sm  sm:text-xl md:text-2xl">Keep track of the remaining time to cast your vote:</p>

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
        <p class="mt-4 text-gray-600 text-sm  sm:text-xl md:text-2xl">Don't miss the opportunity! Vote before it's too late!</p>
        <div id="viewResultBtn" class="mt-3 hidden"> <a href="./results.php" class="voteBtn font-bold bg-blue-700 text-white px-4 py-3 rounded "> View Results </a></div>
      </div>

    </section>



    <!-- Candidates by Major Section -->
    <section id="majorCon" class="pb-5 text-center flex justify-center items-center">
      <div class="w-full px-4">
        <h2 class="text-3xl md:text-4xl font-semibold text-blue-500 my-5">
          Candidates by Major
        </h2>
        <p class="text-lg mb-10">
          Select your major and support the King and Queen of your department by voting!
        </p>

        <!-- Major Categories -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-14">
          <!-- Electronic Engineering -->
          <div class="bg-white rounded-lg shadow-lg flex flex-col justify-between items-center p-6 card-hover">
            <img src="../Images/EC.png" alt="Electronic Engineering" class="w-full object-cover rounded-t-lg mb-4" />
            <h3 class="text-2xl font-semibold mb-4">Electronic Engineering</h3>
            <p class="text-gray-600 mb-4 prose text-justify">
              Vote for the King and Queen from the Electronic Engineering major. Leading innovation and technological advancement.
            </p>
            <a href="./candidate.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
              Vote Now
            </a>
          </div>

          <!-- Electrical Power Engineering -->
          <div class="bg-white rounded-lg shadow-lg flex flex-col justify-between items-center p-6 card-hover">
            <img src="../Images/EP.png" alt="Electrical Power Engineering" class="w-full object-cover rounded-t-lg mb-4" />
            <h3 class="text-2xl font-semibold mb-4">
              Electrical Power Engineering
            </h3>
            <p class="text-gray-600 mb-4 prose text-justify">
              Cast your vote for the King and Queen of the Electrical Power Engineering major. Empowering the future of energy systems.
            </p>
            <a href="./candidate.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
              Vote Now
            </a>
          </div>

          <!-- Mechanical Engineering -->
          <div class="bg-white rounded-lg shadow-lg flex flex-col justify-between items-center p-6 card-hover">
            <img src="../Images/ME.png" alt="Mechanical Engineering" class="w-full object-cover rounded-t-lg mb-4" />
            <h3 class="text-2xl font-semibold mb-4">Mechanical Engineering</h3>
            <p class="text-gray-600 mb-4 prose text-justify">
              Vote for the King and Queen from Mechanical Engineering. Shaping the future of technology and innovation.
            </p>
            <a href="./candidate.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
              Vote Now
            </a>
          </div>

          <!-- Civil Engineering -->
          <div class="bg-white rounded-lg shadow-lg flex flex-col justify-between items-center p-6 card-hover">
            <img src="../Images/CE.png" alt="Civil Engineering" class="w-full object-cover rounded-t-lg mb-4" />
            <h3 class="text-2xl font-semibold mb-4">Civil Engineering</h3>
            <p class="text-gray-600 mb-4 prose text-justify">
              Cast your vote for the King and Queen of the Civil Engineering major. Building a strong foundation for the future.
            </p>
            <a href="./candidate.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
              Vote Now
            </a>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php require_once "../Components/footer.php" ?>
</div>



<script src="../JS/countdown.js"></script>