<?php

    session_start();

    //IMAGE STUFF

    // Check if the form has been submitted:
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Check for an uploaded file:
        if (isset($_FILES['upload'])) {

            // Validate the type. Should be JPEG or PNG.
            $allowed = ['image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png'];
            if (in_array($_FILES['upload']['type'], $allowed)) {
    
            } else { // Invalid type.
                $pfp = "empty_image.png";
            }
    
        } // End of isset($_FILES['upload']) IF.
    
        // Check for an error:
        if ($_FILES['upload']['error'] > 0) {

            // Use empty image
            switch ($_FILES['upload']['error']) {
                case 1:
                    $pfp = "empty_image.png";
                    break;
                case 2:
                    $pfp = "empty_image.png";
                    break;
                case 3:
                    $pfp = "empty_image.png";
                    break;
                case 4:
                    $pfp = "empty_image.png";
                    break;
                case 6:
                    $pfp = "empty_image.png";
                    break;
                case 7:
                    $pfp = "empty_image.png";
                    break;
                case 8:
                    $pfp = "empty_image.png";
                    break;
                default:
                    $pfp = "empty_image.png";
                    break;
                } // End of switch.
    
            } // End of error IF.

        // Delete the file if it still exists:
        if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name']) ) {
            unlink ($_FILES['upload']['tmp_name']);
        }

    } // End of the submitted conditional.

    // END OF IMAGE STUFF

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $job = $_POST['job'];
    $favcolor = $_POST['favcolor'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $pfp = $_FILES['upload']['name'];

    require('proj6_db.php');

    // create a query and store to the $query variable
    $query = "INSERT INTO RESIDENT (first_name, last_name, email_address, age, gender, job, favorite_color, resident_password, profile_picture) 
    VALUES ('$firstname', '$lastname', '$email', $age, '$gender', '$job', '$favcolor', '$hashed_password', '$pfp')";

    if (mysqli_query($connection, $query)) {
        header("Location: https://heyselena.me/webproj6/homepage.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }

?>

<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="proj6_styles.css">
        <title>Confirmation</title>
    </head>

</html>