<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Voting End Date</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        // Disable past dates in the input field
        document.addEventListener('DOMContentLoaded', function () {
            const today = new Date().toISOString().slice(0, 16);
            document.getElementById('votingEndDate').setAttribute('min', today);
        });
    </script>
</head>
<body class="bg-gray-50 font-sans antialiased">

    <div class="min-h-screen flex justify-center items-center">
        <!-- Card with Soft Shadows -->
        <div class="bg-white p-8 rounded-lg shadow-lg w-96">
            <h1 class="text-2xl font-semibold text-center text-gray-800 mb-6">Set Voting End Date</h1>

            <!-- Form Section with Minimalistic Inputs -->
            <form id="votingForm" action="save_voting_end.php" method="POST">
                <div class="mb-6">
                    <label for="votingEndDate" class="block text-gray-700 text-sm font-medium mb-2">Select Voting End Date</label>
                    <input type="datetime-local" id="votingEndDate" name="votingEndDate"
                           class="w-full p-3 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                           required>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" class="bg-indigo-600 text-white py-3 px-8 rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition duration-150">
                        Set Voting End Date
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
