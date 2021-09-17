<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sign up</title>
</head>

<body>
    <?php
    include_once('header.php');
    ?>
    <div class="container-md w-20 mt-5">
        <form onsubmit="return verifyPasswords()" action="dbh/newuser.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" onkeyup="hideFailed()" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="pass1" class="form-label">Password</label>
                <input type="password" class="form-control" id="pass1" name="password" required onkeyup="hideError()">
            </div>
            <div class="mb-3">
                <label for="pass2" class="form-label">Retype</label>
                <input type="password" class="form-control" id="pass2" required onkeyup="hideError()">
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-dark">Signup</button>
            </div>

            <div class="alert alert-danger mt-2" role="alert" id="error" style="visibility:hidden">
                Passwords Do Not Match
            </div>

            <?php
                if(isset($_GET['failed'])){
                    echo("<div class='alert alert-danger mt-2' role='alert' id='failed' >
                        User Already Exists
                    </div>");
                }
            ?>
            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        </form>
    </div>

    <script>
        function verifyPasswords() {
            var p1 = document.getElementById("pass1").value;
            var p2 = document.getElementById("pass2").value;
            if (p1 != p2) {
                document.getElementById("error").style.visibility = "visible";
                return false;
            } else {
               return true;
            }
        }

        function hideError() {
            document.getElementById("error").style.visibility="hidden";
            hideFailed()
        }
        function hideFailed() {
            document.getElementById("failed").style.visibility="hidden";

        }
    </script>
</body>

</html>