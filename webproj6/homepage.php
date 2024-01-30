<!DOCTYPE html>
<html>

    <head>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="proj6_styles.css">
        <title>Bikini Bottom Home</title>
    </head>
    
    <?php
        require('proj6_db.php');
    ?>

    <body>

        <h1 class="pageheader">Bikini Bottom Residents</h1>

        <p style="text-align:center;margin-top:50px">
            <a href="register.php" target="_blank">Add Resident</a>
        </p>


        <?php
        // create a query and store to the $query variable
        $query = "SELECT * FROM RESIDENT WHERE resident_status='A'";

        // open a db connect and run query
        $result = mysqli_query($connection, $query);

        /*
        // open table
        echo "<table><thead><td>Name</td>
        <td>Email</td>
        <td>Status</td>
        <td>PFP</td>
        </thead>";


    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr style='font-size:80%'><td>" . $row['first_name']. " " . $row['last_name'] . "</td><td>" . $row['email_address'] . "</td><td>" . 
        $row['resident_status'] . "</td><td>" . "<img src='uploads/" . $row['profile_picture'] . "' style='height:15px'>" . 
        "</td></tr>";
    }

    echo "</table>"; //close table
    */

        echo "            
        <div class='container'>
        <div class='main-body'>
            <div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 gutters-sm'>";

        while ($row = mysqli_fetch_assoc($result)) {

            if (strlen($row['profile_picture']) > 0) {
                $image = $row['profile_picture'];
            } else {
                $image = "empty_image.png";
            }

            echo "
                <div class='col mb-3'>
                <div class='card'>
                    <div class='card-body text-center'>
                    <img src='uploads/" . $image . "' style='width:100px;margin-top:-65px' alt='User' class='img-fluid img-thumbnail rounded-circle border-0 mb-3'>
                    <h5 class='card-title'>" . $row['first_name'] . " " . $row['last_name'] . "</h5>
                    <p class='text-secondary mb-1'>" . $row['email_address'] . "</p>

                    <button type='button' class='collapsible'>more</button>
                    <div class='content'>
                    <p style='margin-top:10px'>
                    Age: " . $row['age'] . "<br>Gender: " . $row['gender'] . "<br>Job: " . $row['job'] . "<br>Favorite Color: " . $row['favorite_color'] . "
                    </p>
                    </div>

                    </div>

                    <div class='card-footer'>
                        <a href='edit_resident.php?id=" . $row['resident_id'] . "' target='_blank' class='btn btn-light btn-sm bg-white has-icon btn-block'><input type=button value='Edit/Delete'></a>
                    </div>
                </div>
                </div>
            ";
        }

        echo "
            </div>
        </div>
        </div>";

    ?>

    <!--
    <div class="container">
    <div class="main-body">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 gutters-sm">
            <div class="col mb-3">
            <div class="card">
                <div class="card-body text-center">
                <img src="uploads/empty_image.png" style="width:100px;margin-top:-65px" alt="User" class="img-fluid img-thumbnail rounded-circle border-0 mb-3">
                <h5 class="card-title">Spongebob Squarepants</h5>
                <p class="text-secondary mb-1">spongebob@gmail.com</p>
                </div>
            </div>
            </div>

        </div>
    </div>
    </div>


    <button class='btn btn-light btn-sm bg-white has-icon btn-block' type='button'>Edit</button>
    <button class='btn btn-light btn-sm bg-white has-icon ml-2' type='button'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
    <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
    </svg></button>
    -->

        
        
        <script>
            var coll = document.getElementsByClassName("collapsible");
            var i;

            for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                content.style.display = "none";
                } else {
                content.style.display = "block";
                }
            });
            }
        </script>


    </body>


</html>