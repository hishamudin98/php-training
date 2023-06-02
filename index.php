<?php

require_once "config.php";

$sql = "SELECT * FROM users";

$result = mysqli_query($conn, $sql);

$x = 0;

// echo "<script>alert('hs');</script>"

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Testing PHP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="bg-light">

    <div class="container mt-5 border rounded bg-white w-25">
        <form class="p-3" action="process/insert.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="username">Name</label>
                <input type="text" class="form-control" id="username" placeholder="Enter name" name="username" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Date of birth</label>
                <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Enter date" name="dob" required>
            </div>

            <label>Tahun</label>

            <div class="form-group form-check ">

                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tahun" id="1" value="1" required>
                    Tahun 1
                </label>

                <label class="form-check-label ml-5">
                    <input type="radio" class="form-check-input" name="tahun" id="2" value="2">
                    Tahun 2
                </label>
            </div>

            <div class="form-group">
                <label for="fakulti">Fakulti</label>
                <select class="form-control" name="fakulti" id="fakulti" required>
                    <option selected value="">Sila pilih</option>
                    <option value="ftmk">FTMK</option>
                    <option value="fkp">FKP</option>
                    <option value="fkm">FKM</option>
                </select>
            </div>

            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>


    <div class="container mt-5 mb-5 ">
        <h2 class='mb-3'>List User</h2>
        <table id="example" class="table table-striped table-bordered .d-flex bg-white" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Password</th>
                    <th>Tahun</th>
                    <th>Fakulti</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    $x += 1;
                    echo "<tr>";
                    // please make number column is increment
                    echo "<td>" . $x . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['dob'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
                    echo "<td>" . $row['tahun'] . "</td>";
                    echo "<td>" . $row['fakulti'] . "</td>";
                    echo "<td> <a href='edit.php?id=" . $row['id'] . "' class='mr-3' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a> <a href='process/delete.php?id=" . $row['id'] . "' class='mr-3' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash '></span></a></td> ";

                    echo "</tr>";
                }
                ?>


            </tbody>
        </table>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    <script>
        console.log(" Hello World");
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>