<?php
include_once "../Controllers/db_connect.php";
session_start();

// Check if a file was uploaded
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../uploads/';  // Specify the directory where the images will be uploaded
    $fileName = basename($_FILES['image']['name']);
    $uploadFile = $uploadDir. uniqid() . $fileName;

    // Check if the uploaded file is an image
    if (getimagesize($_FILES['image']['tmp_name'])) {
        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            // Get the current user's ID (assuming it's stored in the session)
            $userEmail = $_SESSION['user_email']; // You should store the user ID in the session upon login

            // Update the user's profile image in the database
            $sql = "UPDATE users SET proFileImage = ? WHERE email = ?";
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ss", $uploadFile, $userEmail);
                if (mysqli_stmt_execute($stmt)) {
                    // Successfully updated the profile image
                    $_SESSION['message'] = "Profile image updated successfully.";
                    header("Location: ../Views/home.php");  // Redirect to profile page after success
                    exit();
                } else {
                    // Handle SQL error
                    $_SESSION['message'] = "Failed to update the profile image. Please try again.";
                    header("Location: ../Views/upProFile.php?error=1");  // Redirect back with error flag
                    exit();
                }
                mysqli_stmt_close($stmt);
            }
        } else {
            // Handle upload error
            $_SESSION['message'] = "Failed to upload the image. Please try again.";
            header("Location: ../Views/upProFile.php?error=1");  // Redirect back with error flag
            exit();
        }
    } else {
        // If the file is not an image
        $_SESSION['message'] = "The uploaded file is not a valid image.";
        header("Location: ../Views/upProFile.php?error=1"); // Redirect back with error flag
        exit();
    }
} else {
    // If no file was uploaded, use the default image
    $defaultImage = "https://yelp.leoafricainstitute.org/wp-content/uploads/2022/05/default-profile-picture1.jpg";
    $userEmail = $_SESSION['user_email'];

    // Update the user's profile image with the default image
    $sql = "UPDATE users SET proFileImage = ? WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $defaultImage, $userEmail);
        if (mysqli_stmt_execute($stmt)) {
            // Successfully updated the profile image
            $_SESSION['message'] = "Profile image updated successfully.";
            header("Location: ../Views/home.php"); 
            exit();
        } else {
            // Handle SQL error
            $_SESSION['message'] = "Failed to update the profile image. Please try again.";
            header("Location: ../Views/upProFile.php?error=1");  // Redirect back with error flag
            exit();
        }
        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn); // Close the database connection
?>
