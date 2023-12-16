<?php
    global $conn;
    include "db_conn.php";
    $id = $_GET['studid'];
    if(isset($_POST['submit'])){
        $firstname = mysqli_real_escape_string($conn, $_POST['first_name']);
        $lastname = mysqli_real_escape_string($conn, $_POST['last_name']);
        $prelim = floatval($_POST['prelims']);
        $midterm = floatval($_POST['midterms']);
        $finals = floatval($_POST['finals']);
        $final_grade = floatval($_POST['finals_grade']);

        $sql = "UPDATE students SET firstname='$firstname', lastname='$lastname', prelim=$prelim, midterm=$midterm, finals=$finals, final_grade=$final_grade WHERE studid=$id";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("Location: index.php?msg=Record Updated");
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
                background-color: #f8f9fa;
            }
            .navbar {
                background-color: #007bff;
                color: #ffffff;
                font-weight: bold;
                box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1);
            }
        </style>


        <script>
            function updateAverage() {
                var prelimGrades = parseFloat(document.getElementById('prelims').value) || 0;
                var midtermGrades = parseFloat(document.getElementById('midterms').value) || 0;
                var finalGrades = parseFloat(document.getElementById('finals').value) || 0;
                var average = (prelimGrades + midtermGrades + finalGrades) / 3;
                document.getElementById('finals_grade').value = average.toFixed(2);
            }
        </script>

        <script>
            function checkFormValidity() {
                var firstName = document.getElementById('first_name').value;
                var lastName = document.getElementById('last_name').value;
                var prelims = parseFloat(document.getElementById('prelims').value);
                var midterms = parseFloat(document.getElementById('midterms').value);
                var finals = parseFloat(document.getElementById('finals').value);

                document.getElementById('submit').disabled = firstName.trim() === '' || lastName.trim() === '' || isNaN(prelims) || isNaN(midterms) || isNaN(finals);
            }

        </script>



        <title>Edit Student Record</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light justify-content-center fs-3 mb-5">
        <a class="navbar-brand text-white" href="#">PHP MYSQL CRUD</a>
    </nav>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit Student Record</h3>
        </div>
        <?php
        $sql = "SELECT * FROM students WHERE studid = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:65vw; min-width:300px;" oninput="checkFormValidity()">
                <div class="row mb-3">
                    <div class="col">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row['firstname']?>">
                    </div>

                    <div class="col">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row['lastname']?>">
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="prelims" class="form-label">Prelims</label>
                        <input type="number" class="form-control" id="prelims" name="prelims" min="0" max="100.00" step="0.01" oninput="updateAverage()" value="<?php echo $row['prelim']?>">
                    </div>

                    <div class="col">
                        <label for="midterms" class="form-label">Midterms</label>
                        <input type="number" class="form-control" id="midterms" name="midterms" min="0" max="100.00" step="0.01" oninput="updateAverage()" value="<?php echo $row['midterm']?>">
                    </div>

                    <div class="col">
                        <label for="finals" class="form-label">Finals</label>
                        <input type="number" class="form-control" id="finals" name="finals" min="0" max="100.00" step="0.01" oninput="updateAverage()" value="<?php echo $row['finals']?>">
                    </div>

                    <div class="col">
                        <label for="finals_grade" class="form-label">Final Grade</label>
                        <input type="number" class="form-control" id="finals_grade" name="finals_grade" min="0" max="100.00" value="<?php echo $row['final_grade']?>" readonly>
                    </div>
                </div>
                <button type="submit" class="btn btn-success" id="submit" name="submit" disabled>Update</button>
                <a href="index.php" class="btn btn-danger">Home</a>
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


