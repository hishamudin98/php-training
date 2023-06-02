<?php

require_once "config.php";

$id = $_GET['id'];
$sql = "SELECT * FROM users where id = '$id'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- MDB -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet" /> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="bg-light">

    <div class="container mt-5 border rounded bg-white w-25">
        <form class="p-3" action="process/update.php" method="post" enctype="multipart/form-data">

            <input type="text" class="form-control" id="id"  name="id" value="<?php echo $row['id'] ?>" required hidden>


            <div class="form-group">
                <label for="username">Name</label>
                <input type="text" class="form-control" id="username" placeholder="Enter name" name="username" value="<?php echo $row['username'] ?>" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $row['email'] ?>" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
            </div>

            <label>Tahun</label>

            <div class="form-group form-check ">

                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tahun" id="1" value="1" <?php if ($row['tahun'] == 1) echo 'checked'  ?> required>
                    Tahun 1
                </label>

                <label class="form-check-label ml-5">
                    <input type="radio" class="form-check-input" name="tahun" id="2" value="2" <?php if ($row['tahun'] == 2) echo 'checked'  ?> required>
                    Tahun 2
                </label>
            </div>

            <div class="form-group">
                <label for="fakulti">Fakulti</label>
                <select class="form-control" name="fakulti" id="fakulti">
                    <option value="ftmk" <?php if ($row['fakulti'] == 'ftmk') echo 'selected' ?>>FTMK</option>
                    <option value="fkp" <?php if ($row['fakulti'] == 'fkp') echo 'selected' ?>>FKP</option>
                    <option value="fkm" <?php if ($row['fakulti'] == 'fkm') echo 'selected' ?>>FKM</option>
                </select>
            </div>

            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>


    <script>
        console.log(" Hello World");
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>