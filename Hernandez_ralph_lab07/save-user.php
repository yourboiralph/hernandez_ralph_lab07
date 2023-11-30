<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"] . '/Hernandez_ralph_lab07/database.php';

$stmt = $conn->prepare("INSERT INTO users (lastname, firstname, middle_initial, age, contact_number, email, address) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $lastname, $firstname, $middle_initial, $age, $contact_number, $email, $address);

$lastname = $_SESSION["lastName"];
$firstname = $_SESSION["firstName"];
$middle_initial = $_SESSION["middleInitial"];
$age = $_SESSION["age"];
$contact_number = $_SESSION["contactNo"];
$email = $_SESSION["email"];
$address = $_SESSION["address"];

$stmt->execute();

$stmt->close();
$conn->close();

header("location: index.php");
exit;
