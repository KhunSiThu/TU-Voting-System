<?php require_once "../Components/header.php" ?>

<?php require_once "../Components/navBar.php" ?>

<div id="main-section" class="sm:ml-64 bg-gradient-to-r from-blue-100 via-white to-pink-100">

    <div id="winnersPage" class="  mt-14 rounded-xl">

        <!-- Hero Section -->
        <section class="text-center py-24  ">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-extrabold mb-6 tracking-tight">King & Queen Election Results</h1>
                <p class="text-xl md:text-2xl mb-10">Join us in celebrating the winners from each major. These exceptional individuals have earned recognition for their leadership and contributions to their communities.</p>
                <a href="#major-results" class="text-lg text-indigo-500 font-semibold inline-block px-6 py-3 border-2 border-indigo-200 rounded-full transition-all duration-300 hover:bg-indigo-200">View Major Results</a>
            </div>
        </section>

        <!-- Overall Winners Section -->
        <section class="py-20rounded-xl mx-8 mb-16">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-semibold mb-12 text-center ">Overall Winners</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-10">
                    <!-- Overall King -->
                    <div class="flex flex-col items-center bg-white shadow-2xl rounded-3xl p-8 transform hover:scale-105 hover:shadow-blue-400 transition-all duration-500 animate-bounce-on-hover">
                        <div class="w-40 h-40 overflow-hidden rounded-full mx-auto mb-4">
                            <img src="https://via.placeholder.com/150" alt="Overall King Photo" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-2xl font-semibold mb-2 text-indigo-800">Overall King: John Doe (First Year)</h3>
                        <p class="text-gray-600 mb-4">Major: Computer Science</p>
                        <p class="text-gray-700">John has shown remarkable leadership skills by initiating a coding project that supports student engagement and community development. His vision for technology is one of inclusivity and innovation.</p>
                        <div class="flex justify-between items-center mt-4">
                            <p class="text-gray-600">Votes: <strong>1500</strong></p>
                            <a href="#!" class="text-indigo-600 hover:text-indigo-800 font-semibold">Learn More</a>
                        </div>
                    </div>

                    <!-- Overall Queen -->
                    <div class="flex flex-col items-center bg-white shadow-2xl rounded-3xl p-8 transform hover:scale-105 hover:shadow-pink-400 transition-all duration-500 animate-bounce-on-hover">
                        <div class="w-40 h-40 overflow-hidden rounded-full mx-auto mb-4">
                            <img src="https://via.placeholder.com/150" alt="Overall Queen Photo" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-2xl font-semibold mb-2 text-indigo-800">Overall Queen: Jane Smith (First Year)</h3>
                        <p class="text-gray-600 mb-4">Major: Electrical Engineering</p>
                        <p class="text-gray-700">Jane has been a catalyst for innovation, leading multiple community outreach programs and championing projects that integrate technology with social good.</p>
                        <div class="flex justify-between items-center mt-4">
                            <p class="text-gray-600">Votes: <strong>1350</strong></p>
                            <a href="#!" class="text-indigo-600 hover:text-indigo-800 font-semibold">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Major Results Sections -->
        <section id="major-results" class="py-20">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-semibold mb-12 text-center text-indigo-700">Major Results</h2>

                <!-- Electronic Engineering Section -->
                <div class="mb-16">
                    <h3 class="text-3xl font-semibold text-indigo-600 mb-6">Electronic Engineering</h3>
                    <p class="text-lg text-gray-600 mb-6">These outstanding students have demonstrated exceptional skills in areas like circuit design and innovative tech solutions. Their work reflects the future of engineering.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-12">
                        <!-- King Card -->
                        <div class="bg-white p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                            <div class="w-32 h-32 overflow-hidden rounded-full mx-auto mb-6">
                                <img src="https://via.placeholder.com/150" alt="King Photo" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-2xl font-semibold mb-2 text-indigo-800">King: Ethan Walker (First Year)</h3>
                            <p class="text-gray-700 mb-4">Major: Electronic Engineering</p>
                            <p class="text-gray-600 mb-4">Ethan's work in microcontroller programming has transformed projects in smart home technology and automated systems. He’s a forward-thinking leader with hands-on experience.</p>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-gray-600">Votes: <strong>880</strong></p>
                                <a href="#!" class="text-indigo-600 hover:text-indigo-800 font-semibold">Learn More</a>
                            </div>
                        </div>

                        <!-- Queen Card -->
                        <div class="bg-white p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                            <div class="w-32 h-32 overflow-hidden rounded-full mx-auto mb-6">
                                <img src="https://via.placeholder.com/150" alt="Queen Photo" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-2xl font-semibold mb-2 text-indigo-800">Queen: Sophia Davis (First Year)</h3>
                            <p class="text-gray-700 mb-4">Major: Electronic Engineering</p>
                            <p class="text-gray-600 mb-4">Sophia has excelled in embedded systems and smart tech, enhancing user experience and optimizing functionality in everyday devices.</p>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-gray-600">Votes: <strong>795</strong></p>
                                <a href="#!" class="text-indigo-600 hover:text-indigo-800 font-semibold">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Electrical Power Engineering Section -->
                <div class="mb-16">
                    <h3 class="text-3xl font-semibold text-indigo-600 mb-6">Electrical Power Engineering</h3>
                    <p class="text-lg text-gray-600 mb-6">Our winners from Electrical Power Engineering have excelled in power systems and renewable energy, driving innovations for a sustainable future.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-12">
                        <!-- King Card -->
                        <div class="bg-white p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                            <div class="w-32 h-32 overflow-hidden rounded-full mx-auto mb-6">
                                <img src="https://via.placeholder.com/150" alt="King Photo" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-2xl font-semibold mb-2 text-indigo-800">King: Liam Johnson (First Year)</h3>
                            <p class="text-gray-700 mb-4">Major: Electrical Power Engineering</p>
                            <p class="text-gray-600 mb-4">Liam’s innovative approaches in renewable energy integration have set new benchmarks in energy systems management.</p>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-gray-600">Votes: <strong>840</strong></p>
                                <a href="#!" class="text-indigo-600 hover:text-indigo-800 font-semibold">Learn More</a>
                            </div>
                        </div>

                        <!-- Queen Card -->
                        <div class="bg-white p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                            <div class="w-32 h-32 overflow-hidden rounded-full mx-auto mb-6">
                                <img src="https://via.placeholder.com/150" alt="Queen Photo" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-2xl font-semibold mb-2 text-indigo-800">Queen: Ava Martinez (First Year)</h3>
                            <p class="text-gray-700 mb-4">Major: Electrical Power Engineering</p>
                            <p class="text-gray-600 mb-4">Ava has spearheaded projects in grid optimization and renewable energy storage, making her a standout in her field.</p>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-gray-600">Votes: <strong>820</strong></p>
                                <a href="#!" class="text-indigo-600 hover:text-indigo-800 font-semibold">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mechanical Engineering Section -->
                <div class="mb-16">
                    <h3 class="text-3xl font-semibold text-indigo-600 mb-6">Mechanical Engineering</h3>
                    <p class="text-lg text-gray-600 mb-6">Mechanical Engineering students are pushing the boundaries of robotics, thermodynamics, and mechanical design.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-12">
                        <!-- King Card -->
                        <div class="bg-white p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                            <div class="w-32 h-32 overflow-hidden rounded-full mx-auto mb-6">
                                <img src="https://via.placeholder.com/150" alt="King Photo" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-2xl font-semibold mb-2 text-indigo-800">King: Mason Lee (First Year)</h3>
                            <p class="text-gray-700 mb-4">Major: Mechanical Engineering</p>
                            <p class="text-gray-600 mb-4">Mason has created a revolutionary robotic arm design that could change the way we approach automation in the future.</p>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-gray-600">Votes: <strong>900</strong></p>
                                <a href="#!" class="text-indigo-600 hover:text-indigo-800 font-semibold">Learn More</a>
                            </div>
                        </div>

                        <!-- Queen Card -->
                        <div class="bg-white p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                            <div class="w-32 h-32 overflow-hidden rounded-full mx-auto mb-6">
                                <img src="https://via.placeholder.com/150" alt="Queen Photo" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-2xl font-semibold mb-2 text-indigo-800">Queen: Isabella Brown (First Year)</h3>
                            <p class="text-gray-700 mb-4">Major: Mechanical Engineering</p>
                            <p class="text-gray-600 mb-4">Isabella has designed a new type of fuel-efficient engine that promises to reduce emissions and improve vehicle performance.</p>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-gray-600">Votes: <strong>875</strong></p>
                                <a href="#!" class="text-indigo-600 hover:text-indigo-800 font-semibold">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>

    <?php require_once "../Components/footer.php" ?>

</div>

</body>

</html>
