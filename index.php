<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
        <title>Student Records</title>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var deleteLinks = document.getElementsByClassName('delete-link');

                Array.from(deleteLinks).forEach(function (link) {
                    link.addEventListener('click', function () {
                        var studid = this.getAttribute('data-studid');
                        var confirmDelete = confirm('Are you sure you want to delete this record?');

                        if (confirmDelete) {
                            window.location.href = 'delete.php?studid=' + studid;
                        }
                    });
                });
            });
        </script>

    </head>

    <body>

    <nav class="navbar navbar-expand-lg navbar-light justify-content-center fs-3 mb-5">
        <a class="navbar-brand text-white" href="#">PHP MYSQL CRUD</a>
    </nav>

    <div class="container mt-5">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["msg"])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            ' . $_GET["msg"] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            }
        ?>
        <h3>Student Records</h3>
        <a href="add_student.php" class="btn btn-dark mb-5 mt-3" >New</a>
        <a href="search.php" class="btn btn-dark mb-5 mt-3">Search</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Student ID</th>
                <th scope="col">Last Name</th>
                <th scope="col">First Name</th>
                <th scope="col">Prelims</th>
                <th scope="col">Midterms</th>
                <th scope="col">Finals</th>
                <th scope="col">Final Grade</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
                global $conn;
                include "db_conn.php";
                $sql = "SELECT * FROM students";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td> <?php echo $row['studid'] ?></td>
                            <td> <?php echo $row['lastname'] ?></td>
                            <td> <?php echo $row['firstname'] ?></td>
                            <td> <?php echo $row['prelim'] ?></td>
                            <td> <?php echo $row['midterm'] ?></td>
                            <td> <?php echo $row['finals'] ?></td>
                            <td> <?php echo $row['final_grade'] ?></td>
                            <td>
                                <a href="edit.php?studid=<?php echo $row["studid"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                <a href="javascript:void(0);" class="link-dark delete-link" data-studid="<?php echo $row["studid"] ?>"><i class="fa-solid fa-trash fs-5"></i></a>
                            </td>
                        </tr>
                        <?php
                }
            ?>
            </tbody>
        </table>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
    </html>

<?php


