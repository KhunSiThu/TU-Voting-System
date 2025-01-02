<?php 

$conn = mysqli_connect("localhost","khun","khun","voting_system");

if(!$conn) {
    echo mysqli_connect_error();
}