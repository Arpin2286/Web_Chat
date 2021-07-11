<?php
    session_start();
    include 'koneksi.php';

    // cek cookie
    if(isset($_COOKIE["kepo"]) && isset($_COOKIE["apaya"])){
        $id= $_COOKIE["kepo"];
        $nim=$_COOKIE["apaya"];
        $result = mysqli_query($conn, "SELECT nim FROM user WHERE id = '$id'");
        $row = mysqli_fetch_assoc($result);

        if($username === hash('whirlpool', $row["username"])){
            $_SESSION['login'] = true;

        }
    }

    if(isset($_SESSION["login"])){
        header("Location: index.php");
    }

    if(isset($_POST["login"])){
        $nim = $_POST["nim"];
        $password = $_POST["password"];

        $check = mysqli_query($conn, "SELECT * FROM user WHERE nim = '$nim'");

        //cek username ada atau tidak
        if(mysqli_num_rows($check) === 1){

            //cek passwordnya
            $row = mysqli_fetch_assoc($check);
            if(password_verify($password, $row["password"])){
                
                //atur session
                $_SESSION["login"] = true;

                //cek remember me 
                if(isset($_POST["remember"])){
                    //create cookie
                    setcookie('kepo', $row["id"], time() + 3600);
                    setcookie('apaya', hash('whirlpool', $row["nim"]),time() + 3600);
                }

                header("Location: index.php");
                exit;
            }
        }
        $error = true;   
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="shortcut icon" href="img/UNDIKSHA.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>
<body onload="myFunction()" style="margin:0;" class="my-login-page" >
    <div id="loader"></div>

    <div style="display:none;" id="myDiv" class="animate-bottom">
        <section class="h-100">
                <div class="container h-100">
                    <div class="row justify-content-md-center h-100">
                            <?php if(isset($error)) : ?>
                                <div class="alert alert-danger">
                                    <h4>NIM atau Password Salah</h4>
                                </div>
                            <?php endif; ?>
                        <div class="card-wrapper">
                            <div class="brand">
                                <img src="img/UNDIKSHA.png" alt="logo">
                            </div>
                            <div class="card fat">
                                <div class="card-body">
                                    <h4 class="card-title text-center">Login</h4>
                                    <form action="" method="post" class="my-login-validation">
                                        <div class="form-group text-start">
                                            <label for="nim">NIM</label>
                                            <input id="nim" type="nim" class="form-control" placeholder="NIM Mahasiswa" name="nim" value="" required autofocus>
                                            <div class="invalid-feedback">
                                                NIM masih kosong
                                            </div>
                                        </div>

                                        <div class="form-group text-start">
                                            <label for="password">Password</label>
                                            <input id="password" type="password" class="form-control" placeholder="*********" name="password" required data-eye>
                                            <div class="invalid-feedback">
                                                password masih kosong
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                                <label for="remember" class="custom-control-label">Remember Me</label>
                                            </div>
                                            <a href="forgot.php" class="float-md-none">
                                                    Forgot Password?
                                                </a>
                                        </div>

                                        <div class="form-group m-0">
                                            <input type="submit" class="btn btn-primary btn-block" name="login" value="login">
                                        </div>
                                        <div class="mt-4 text-center">
                                            Belum punya akun ? <a href="Register.php">Register</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="footer">
                                Copyright &copy; 2021 &mdash; Tim 7
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    <script>
    var myVar;
        function myFunction() {
        myVar = setTimeout(showPage, 2000);
        }

        function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
    }
    </script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>