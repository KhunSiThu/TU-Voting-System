<?php require_once "../Components/header.php" ?>

<div id="winnersPage" class="bg-gray-50 text-gray-900">

    <?php require_once "../Components/navBar.php" ?>

    <!-- Hero Section -->
    <section class="text-center py-16 bg-gradient-to-r from-indigo-600 to-indigo-400 text-white shadow-md">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">King and Queen Election Results</h1>
            <p class="text-lg md:text-xl mb-8">We proudly announce the winners of the King and Queen election for each major. These individuals were selected for their leadership, dedication, and vision. Here are the results!</p>
        </div>
    </section>

    <!-- Overall Winners Section -->
    <section class="py-20 text-center bg-white shadow-lg rounded-xl mx-8 mb-16">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-semibold mb-8 text-indigo-700">Overall Winners</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-12">
                <!-- Overall King -->
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-2xl transition-all duration-300">
                    <img src="https://via.placeholder.com/150" alt="Overall King Photo" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-2xl font-semibold mb-2 text-indigo-700">Overall King: John Doe (First Year)</h3>
                    <p class="text-gray-700 mb-2">Major: Computer Science</p>
                    <p class="text-gray-700 mb-4">John has shown remarkable leadership skills by initiating a coding project that supports student engagement and community development. He has a clear vision for technology that benefits everyone.</p>
                    <p class="text-gray-600 mb-2">Votes: <strong>1500</strong></p>
                    <a href="#!" class="text-indigo-600 hover:text-indigo-800">Learn More About John</a>
                </div>
                <!-- Overall Queen -->
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-2xl transition-all duration-300">
                    <img src="https://via.placeholder.com/150" alt="Overall Queen Photo" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-2xl font-semibold mb-2 text-indigo-700">Overall Queen: Jane Smith (First Year)</h3>
                    <p class="text-gray-700 mb-2">Major: Electrical Engineering</p>
                    <p class="text-gray-700 mb-4">Jane has been a catalyst for innovation, leading multiple community outreach programs and championing projects that integrate technology with social good.</p>
                    <p class="text-gray-600 mb-2">Votes: <strong>1350</strong></p>
                    <a href="#!" class="text-indigo-600 hover:text-indigo-800">Learn More About Jane</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Major Results Sections -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-semibold mb-8 text-indigo-700">Major Results</h2>

            <!-- Electronic Engineering Section -->
            <h3 class="text-2xl font-semibold mt-8 text-indigo-600">Electronic Engineering</h3>
            <p class="text-gray-700 mb-8">These outstanding students from Electronic Engineering have demonstrated exceptional skills in areas like circuit design and innovative tech solutions. Their work reflects the future of engineering.</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-12">
                <!-- King Card -->
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-2xl transition-all duration-300">
                    <img src="https://via.placeholder.com/150" alt="King Photo" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-2xl font-semibold mb-2 text-indigo-700">King: Ethan Walker (First Year)</h3>
                    <p class="text-gray-700 mb-2">Major: Electronic Engineering</p>
                    <p class="text-gray-700 mb-4">Ethan's work in microcontroller programming has transformed projects in smart home technology and automated systems. He’s a forward-thinking leader with hands-on experience.</p>
                    <p class="text-gray-600 mb-2">Votes: <strong>880</strong></p>
                    <a href="#!" class="text-indigo-600 hover:text-indigo-800">Learn More About Ethan</a>
                </div>
                <!-- Queen Card -->
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-2xl transition-all duration-300">
                    <img src="https://via.placeholder.com/150" alt="Queen Photo" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-2xl font-semibold mb-2 text-indigo-700">Queen: Sophia Davis (First Year)</h3>
                    <p class="text-gray-700 mb-2">Major: Electronic Engineering</p>
                    <p class="text-gray-700 mb-4">Sophia has excelled in embedded systems and smart tech, enhancing user experience and optimizing functionality in everyday devices.</p>
                    <p class="text-gray-600 mb-2">Votes: <strong>795</strong></p>
                    <a href="#!" class="text-indigo-600 hover:text-indigo-800">Learn More About Sophia</a>
                </div>
            </div>

            <!-- Additional Sections for Other Majors -->
            <h3 class="text-2xl font-semibold mt-8 text-indigo-600">Civil Engineering</h3>
            <p class="text-gray-700 mb-8">Our Civil Engineering winners have demonstrated their commitment to building sustainable infrastructure and improving communities through their innovative designs.</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-12">
                <!-- King Card -->
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-2xl transition-all duration-300">
                    <img src="https://via.placeholder.com/150" alt="King Photo" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-2xl font-semibold mb-2 text-indigo-700">King: Daniel Carter (First Year)</h3>
                    <p class="text-gray-700 mb-2">Major: Civil Engineering</p>
                    <p class="text-gray-700 mb-4">Daniel has been an advocate for eco-friendly construction techniques and is working on energy-efficient building designs that contribute to greener cities.</p>
                    <p class="text-gray-600 mb-2">Votes: <strong>900</strong></p>
                    <a href="#!" class="text-indigo-600 hover:text-indigo-800">Learn More About Daniel</a>
                </div>
                <!-- Queen Card -->
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-2xl transition-all duration-300">
                    <img src="https://via.placeholder.com/150" alt="Queen Photo" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-2xl font-semibold mb-2 text-indigo-700">Queen: Olivia Lee (First Year)</h3>
                    <p class="text-gray-700 mb-2">Major: Civil Engineering</p>
                    <p class="text-gray-700 mb-4">Olivia’s contributions to urban stormwater management and sustainable infrastructure improvements have made her an emerging leader in Civil Engineering.</p>
                    <p class="text-gray-600 mb-2">Votes: <strong>920</strong></p>
                    <a href="#!" class="text-indigo-600 hover:text-indigo-800">Learn More About Olivia</a>
                </div>
            </div>

            <!-- Additional sections for other majors -->

        </div>
    </section>

</div>

<?php require_once "../Components/footer.php" ?>
