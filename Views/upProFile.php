<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="../src/output.css">
    <link rel="stylesheet" href="../src/mobile.css">
</head>

<style>
    body {
        .profile-con {
            width: 350px;
            height: 350px;

            button {
                width: 350px;
                opacity: 0;
                height: 350px;
                display: flex;
                justify-content: center;
                position: absolute;
                top: 0;
                color: white;
                font-size: 40px;
            }

            button:hover {
                background-color: rgba(0, 0, 0, 0.77);
                opacity: 1;
            }
        }
    }

    @media (max-width: 600px) {

        #desktop {
            display: none;
        }

        #mobile {
            display: block;
        }

        body {
            width: 100vw;
            height: 100vh;

            .profile-con {
                width: 250px;
                height: 250px;

                button {
                    width: 250px;
                    height: 250px;
                }
            }
        }

    }
</style>

<body>

    <!-- Show Error Alert if error parameter exists in URL -->
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-error" style="background-color: red; color: white; padding: 10px; text-align: center;">
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);  // Clear message after displaying
            }
            ?>
        </div>
    <?php endif; ?>

    <!-- Profile Update Form -->
    <form enctype="multipart/form-data" action="../Controllers/uploadProFile.php" method="POST" class="flex items-center justify-center w-screen h-screen">
        <!-- Profile Card -->
        <div class="p-10 relative">
            <h1 class="text-3xl font-bold text-center mb-8">Upload Your Profile</h1>

            <!-- Profile Image -->
            <div class="flex p-6 justify-center mb-8">
                <div class="relative group profile-con">
                    <!-- Profile Image -->
                    <img id="profile-image"
                        src="https://yelp.leoafricainstitute.org/wp-content/uploads/2022/05/default-profile-picture1.jpg"
                        alt="Profile Image"
                        class="rounded-full border-4 border-gray-300 shadow-lg object-cover transition-transform group-hover:scale-105"
                        style="object-fit: cover; width: 100%; height: 100%;" />
                    <input id="image-input" name="image" type="file" accept="image/*" class="hidden" />
                    <button type="button" onclick="document.getElementById('image-input').click()"
                        class="absolute bottom-0 right-0 text-black text-sm rounded-full shadow-md transition flex flex-col items-center justify-end pb-5">
                        Change
                    </button>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-evenly gap-8 space-x-6 upProfile-btns">
                <button id="cancel-button" type="button" class="py-3 w-full  border-2 border-blue-500 text-blue-500 rounded-lg text-lg font-medium shadow-md transition">Reset</button>
                <button type="submit" class="py-3 w-full text-white rounded-lg text-lg font-medium shadow-md transition bg-cyan-400 hover:bg-cyan-500">Confirm</button>
            </div>
        </div>
    </form>

    <!-- Cancel Button JS to Reset Form -->
    <script>
        document.getElementById("cancel-button").addEventListener("click", () => {
            document.getElementById("profile-image").src = "https://yelp.leoafricainstitute.org/wp-content/uploads/2022/05/default-profile-picture1.jpg";
            document.getElementById("image-input").value = "";
        });

        // Handle image preview
        document.getElementById("image-input").addEventListener("change", (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    document.getElementById("profile-image").src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

</body>

</html>

<?php
// Clear session message after displaying
if (isset($_SESSION['message'])) {
    unset($_SESSION['message']);
}
?>
