<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="proj6_styles.css">
        <style>
        .error {
            font-weight: bold;
            color: #C00;
        }
        </style>
        <title>Add Resident</title>
    </head>

    <body>
        
        <h1 class="pageheader">Register as a Resident</h1>

        <div class="registerform">
        <form enctype="multipart/form-data" action="process_resident.php" method="post">  
            <p>First Name: <input type="text" name="firstname" required></p>   
            <p>Last Name: <input type="text" name="lastname" required></p>
            <p>Email Address: <input type="email" name="email" required></p>

            <label for="age">Age: </label>
            <input type="number" id="age" name="age" min="1" max="100">

            <p>Gender: 
            <input type="radio" id="male" name="gender" value="Male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label>
            <input type="radio" id="nonbinary" name="gender" value="Nonbinary">
            <label for="nonbinary">Non-Binary</label>
            <input type="radio" id="other" name="gender" value="Other">
            <label for="other">Other</label></p>

            <p>Job: <input type="text" name="job" required></p> 

            <label for="favcolor">Favorite Color: </label>
            <select name="favcolor" id="favcolor">
            <option value="Red">Red</option>
            <option value="Orange">Orange</option>
            <option value="Yellow">Yellow</option>
            <option value="Green">Green</option>
            <option value="Blue">Blue</option>
            <option value="Purple">Purple</option>
            <option value="Black">Black</option>
            <option value="Brown">Brown</option>
            </select>

            <p>Password: <input type="password" name="password" required></p>

            <input type="hidden" name="MAX_FILE_SIZE" value="750000">
            <p>Profile Picture (optional):</p>
            <p>Upload JPEG or PNG image of 750KB or smaller<input type="file" name="upload"></p>

            <input type="submit" value="Add Resident" id="submit">
        </form> 
        </div>

    </body>
  
</html>