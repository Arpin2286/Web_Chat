<?php
    session_start();
	include 'koneksi.php';
	
	if(isset($_SESSION["login"])){
        header("Location: index.php");
    }

    if(isset($_POST["register"])){
        if(register($_POST)>0){
            echo"<script> 
            alert('Anda Berhasil Melakukan Pendaftaran');
			window.location='login.php';
            </script>";
			
        }else{
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="shortcut icon" href="img/UNDIKSHA.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>
<body onload="myFunction()" style="margin:0;" class="my-login-page">
	<div id="loader"></div>

	<div style="display:none;" id="myDiv" class="animate-bottom">
		<section class="h-100">
			<div class="container h-100">
				<div class="row justify-content-md-center h-100">
						<?php if(isset($error)) : ?>
							<div class="alert alert-danger">
								<p>Username atau Password Salah</p>
							</div>
						<?php endif; ?>
					<div class="card-wrapper">
						<div class="brand">
							<img src="img/UNDIKSHA.png" alt="logo undiksha">
						</div>
						<div class="card fat">
							<div class="card-body">
								<h4 class="card-title text-center">Register</h4>
								<form method="POST" class="my-login-validation" novalidate="">
									<div class="form-group text-start">
										<label for="nama">Nama Lengkap</label>
										<input id="nama" type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required autofocus>
										<div class="invalid-feedback">
											Siapa nama Lengkapmu ?
										</div>
									</div>

									<div class="form-group text-start">
										<label for="nim">NIM</label>
										<input id="nim" type="nim" class="form-control" placeholder="NIM Mahasiswa" name="nim" required>
										<div class="invalid-feedback">
											NIM kosong
										</div>
									</div>

									<div class="form-group text-start">
										<label for="password">Password</label>
										<input id="password" type="password" class="form-control" placeholder="********" name="password" required data-eye>
										<div class="invalid-feedback">
											Password masih kosong
										</div>
									</div>

									<div class="form-group text-start">
										<label for="password2">Konfirmasi Password</label>
										<input id="password2" type="password" class="form-control" placeholder="********" name="password2" required data-eye>
										<div class="invalid-feedback">
											Password masih kosong
										</div>
									</div>

									<div class="form-group text-start">
										<div class="custom-checkbox custom-control">
											<input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
											<label for="agree" class="custom-control-label">Saya menyetujui<b> Syarat dan Ketentuan</b></label>
											<div class="invalid-feedback">
												Kamu harus menyetujui segala syarat dan ketentuan
											</div>
										</div>
									</div>

									<div class="form-group m-0">
										<input type="submit" class="btn btn-primary btn-block" name="register" value="Register">    
									</div>
									<div class="mt-4 text-center">
										Sudah punya akun ? <a href="login.php">Login</a>
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
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>