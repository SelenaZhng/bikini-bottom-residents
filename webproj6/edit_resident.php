<?php 
    require('proj6_db.php');

           
    $resident_id = $_GET['id'];
    $query = "SELECT * FROM RESIDENT WHERE resident_id = $resident_id";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);

    // Check if the form has been submitted:
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $password = $_POST['password'];
        $resident_id = $_POST['resident_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $job = $_POST['job'];
        $favcolor = $_POST['favcolor'];
        $status = $_POST['status'];
        $pfp = $_FILES['upload']['name'];

        // Check password
        if (password_verify($password, $row['resident_password'])) {

        } else {
            echo "Incorrect password. Please try again.";
            exit();
        } 

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

        $update_query = "UPDATE RESIDENT
        SET first_name = '$firstname', 
            last_name = '$lastname', 
            email_address = '$email',
            age = $age,
            gender = '$gender',
            job = '$job',
            favorite_color = '$favcolor',
            resident_status = '$status',
            profile_picture = '$pfp'
            WHERE resident_id = $resident_id";
        $update_result = mysqli_query($connection, $update_query);
                
        if ($update_result) {
            header("Location: https://heyselena.me/webproj6/homepage.php");
        } else {
            echo "update failed";
        }
            exit();
        }
?>


<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="proj6_styles.css">
        <title>Update Resident</title>
    </head>

    <body>
        <h1 class="pageheader">Update Resident Information</h1>

        <div class="registerform" style="margin-top:75px">
        <form enctype="multipart/form-data" action="edit_resident.php?id=<?php echo $_GET['id']; ?>"  method="post">  
            <p>Resident Password: <input type="password" name="password" required></p>
            <p>Resident ID: <input type="text" name="resident_id" readonly value="<?php echo $row['resident_id']; ?>"></p>
            <p>First Name: <input type="text    " name="firstname" value="<?php echo $row['first_name']; ?>" required></p>   
            <p>Last Name: <input type="text" name="lastname" value="<?php echo $row['last_name']; ?>" required></p>  
            <p>Email Address: <input type="text" name="email" value="<?php echo $row['email_address']; ?>" required></p>

            <label for="age">Age: </label>
            <input type="number" id="age" name="age" min="1" max="100" value="<?php echo $row['age']; ?>">

            <p>Gender: 
            <input type="radio" id="male" name="gender" value="Male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label>
            <input type="radio" id="nonbinary" name="gender" value="Nonbinary">
            <label for="nonbinary">Non-Binary</label>
            <input type="radio" id="other" name="gender" value="Other">
            <label for="other">Other</label></p>

            <p>Job: <input type="text" name="job" value="<?php echo $row['job']; ?>" required></p>

            <label for="favcolor">Favorite Color: </label>
            <select name="favcolor" id="favcolor">
            <option value="<?php echo $row['favorite_color']; ?>"><?php echo $row['favorite_color']; ?></option>
            <option value="Red">Red</option>
            <option value="Orange">Orange</option>
            <option value="Yellow">Yellow</option>
            <option value="Green">Green</option>
            <option value="Blue">Blue</option>
            <option value="Purple">Purple</option>
            <option value="Black">Black</option>
            <option value="Brown">Brown</option>
            </select>

            <p>Status: <input type="text" name="status" value="<?php echo $row['resident_status']; ?>" required></p>
            <p style="font-size:10px">** Typing "I" for Status will inactivate your user information **</p>

            <input type="hidden" name="MAX_FILE_SIZE" value="750000">
            <p>Profile Picture (optional):</p>
            <p>Upload JPEG or PNG image of 750KB or smaller<input type="file" name="upload"></p>

            <input type="submit" value="Confirm Edits" id="submit">
        </form> 
        </div>
    
    </body>
</html>