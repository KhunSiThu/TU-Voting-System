<?php
session_start();

$user_major = $_SESSION['user_major'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>

    <link href="../src/output.css" rel="stylesheet">
    <link rel="stylesheet" href="../src/app.css">
    <link rel="stylesheet" href="../src/login.css">
    <link rel="stylesheet" href="../src/mobile.css">

    <link rel="stylesheet" href="../src/mainPage.css" />
    <link rel="stylesheet" href="../src/responsive.css" />

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.5.0/dist/flowbite.min.js"></script>
</head>

<body>

    <div id="loading">
        <i class="fa-solid fa-spinner fa-spin-pulse"></i>
    </div>