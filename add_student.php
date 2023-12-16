<?php
    global $conn;
    include "db_conn.php";
    if(isset($_POST['submit'])){
        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $prelim = floatval($_POST['prelims']);
        $midterm = floatval($_POST['midterms']);
        $finals = floatval($_POST['finals']);
        $final_grade = floatval($_POST['finals_grade']);

        $sql = "INSERT INTO students (studid, lastname, firstname, prelim, midterm, finals, final_grade)
                VALUES (NULL, '$lastname', '$firstname', '$prelim', '$midterm', '$finals', '$final_grade')";
        $result = mysqli_query($conn, $sql);

//TODO: MAKE THIS CUE BETTER
        if ($result) {
            echo "Record added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>






    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa; /* Set a light background color */
        }

        .navbar {
            background-color: #007bff; /* Set the navbar background color */
            color: #ffffff; /* Set the text color */
            font-weight: bold;
            box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
        }
    </style>


    <script>
        function updateAverage() {
            var prelimGrades = parseFloat(document.getElementById('prelims').value) || 0;
            var midtermGrades = parseFloat(document.getElementById('midterms').value) || 0;
            var finalGrades = parseFloat(document.getElementById('finals').value) || 0;

            // Calculate the average for the first three numbers
            var average = (prelimGrades + midtermGrades + finalGrades) / 3;
            // Calculate the average

            // Update the value of the average number box
            document.getElementById('finals_grade').value = average.toFixed(2);
        }
    </script>



    <title>Add Student</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light justify-content-center fs-3 mb-5">
        <a class="navbar-brand text-white" href="#">PHP MYSQL CRUD</a>
    </nav>
    <div class="container">
        <div class="text-center mb-4">
             <h3>Add Student</h3>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:65vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name">
                    </div>

                    <div class="col">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name">
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="prelims" class="form-label">Prelims</label>
                        <input type="number" class="form-control" id="prelims" name="prelims" min="0" max="100.00" step="0.01" oninput="updateAverage()" value="0">
                    </div>

                    <div class="col">
                        <label for="midterms" class="form-label">Midterms</label>
                        <input type="number" class="form-control" id="midterms" name="midterms" min="0" max="100.00" step="0.01" oninput="updateAverage()" value="0">
                    </div>

                    <div class="col">
                        <label for="finals" class="form-label">Finals</label>
                        <input type="number" class="form-control" id="finals" name="finals" min="0" max="100.00" step="0.01" oninput="updateAverage()" value="0">
                    </div>

                    <div class="col">
                        <label for="finals_grade" class="form-label">Final Grade</label>
                        <input type="number" class="form-control" id="finals_grade" name="finals_grade" min="0" max="100.00" value="0" readonly>
                    </div>
                </div>
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
<!--                    <a href="index.php" class="btn btn-danger">Home</a>-->
                <div
            </form>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>


<?php


