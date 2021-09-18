<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Another Website</title>
    <link rel="shortcut icon" type="image/x-icon" href="icons/favicon.ico" />
</head>
<body>
    <?php include_once('header.php'); ?>
    <div class="container-md w-50 mt-5">
        <form method="POST" form-control-lg action="dbh/login.php">
            <div class="text-center mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
            </div>
             <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" required onkeyup="hideInvalid()" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
             </div>
             <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="pass" class="form-control" id="exampleInputPassword1" onkeyup="hideInvalid()" required>
             </div>
             <button type="submit" class="btn btn-warning">Login</button>
             <a href="signup.php" class="btn btn-outline-dark">Signup</a>
            <?php
                if(isset($_GET['success'])){
                    echo("<div class='alert alert-success w-20 mt-2' role='alert' id='success'>
                    Signup Successful! Login Now 
                  </div>");
                }

                if(isset($_GET['invalid'])){
                    echo("<div class='alert alert-danger w-20 mt-2' role='alert' id='invalid'>
                    Error! Invalid Login
                  </div>");
                }
            ?>
        </form>
    </div>  
    
    <script>
        function hideInvalid() {
            document.getElementById("invalid").style.visibility="hidden";
            hideFailed()
        }
    </script>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>