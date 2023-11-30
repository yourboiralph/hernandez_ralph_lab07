<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'index.php';
    $formInfo = new FormInfoClass();

    // Check if the key exists in $_POST before using it
    $formInfo->setLastName(isset($_POST['lastName']) ? $_POST['lastName'] : "");
    $formInfo->setFirstName(isset($_POST['firstName']) ? $_POST['firstName'] : "");
    $formInfo->setMiddleInitial(isset($_POST['middleInitial']) ? $_POST['middleInitial'] : "");
    $formInfo->setAge(isset($_POST['age']) ? $_POST['age'] : "");
    $formInfo->setContactNumber(isset($_POST['contactNo']) ? $_POST['contactNo'] : "");
    $formInfo->setEmail(isset($_POST['email']) ? $_POST['email'] : "");
    $formInfo->setAddress(isset($_POST['address']) ? $_POST['address'] : "");

    // Assign to session only if set in $_POST
    $_SESSION['lastName'] = $formInfo->getLastName();
    $_SESSION['firstName'] = $formInfo->getFirstName();
    $_SESSION['middleInitial'] = $formInfo->getMiddleInitial();
    $_SESSION['age'] = $formInfo->getAge();
    $_SESSION['contactNo'] = $formInfo->getContactNumber();
    $_SESSION['email'] = $formInfo->getEmail();
    $_SESSION['address'] = $formInfo->getAddress();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #3498db;
        }

        div {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
            border: 1px solid #2980b9;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form{
            display: none;
        }
    </style>
</head>
<body>
    <div>
        <h2>Result</h2>
        <?php
            if (isset($formInfo)) {
                echo "<p>Last Name: " . $formInfo->getLastName() . "</p>";
                echo "<p>First Name: " . $formInfo->getFirstName() . "</p>";
                echo "<p>Middle Initial: " . $formInfo->getMiddleInitial() . "</p>";
                echo "<p>Age: " . $formInfo->getAge() . "</p>";
                echo "<p>Contact Number: " . $formInfo->getContactNumber() . "</p>";
                echo "<p>Email: " . $formInfo->getEmail() . "</p>";
                echo "<p>Address: " . $formInfo->getAddress() . "</p>";
                echo '<a href="save-user.php"><button>Save</button></a>';
            } else {
                echo "<p>No form submission data available.</p>";
            }
        ?>
    </div>
</body>
</html>
