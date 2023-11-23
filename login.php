
<div class="card" style="padding: 50px; width: 40%; margin: 0 auto; margin-top: 10%;
-webkit-box-shadow: 25px -24px 0px -15px rgba(0,0,0,0), 0px 0px 14px 4px rgba(0,0,0,0.08); 
box-shadow: 25px -24px 0px -15px rgba(0,0,0,0), 0px 0px 14px 4px rgba(0,0,0,0.08);
border-radius: 8px">

<h2 style="text-align: center; border-bottom: 5px solid #ef69bf; padding-bottom: 7px; margin-left: 80px;
margin-right: 80px; font-weight: bold; color:#ef69bf; margin-top: -10px" class="text">Login</h2>

<h6 style="text-align: center; margin-top:42px; letter-spacing: 1px;
font-size: 14px" class="text">Selamat Datang di Pelayanan Mayarakat <br/>
mohon untuk mengisi data dibawah </h6>
	<form method="POST">
		<div style="margin-top:42px" class="input_field">
			<label for="username">Username</label>
			<input type="text" name="username" required>
		</div>
		<div class="input_field">
			<label for="password">Password</label>
			<input id="password" type="password" name="password" required>
		</div>
		<input style="margin-top: 20px; width: 100%; background: linear-gradient(135deg, #ef69bf, #fab2ea);
		font-weight: bold; margin-bottom: 15px" type="submit" name="login" value="Login" class="btn">
		<a style="justify-content: center;" href="register.php">Belum punya akun?</a>
	</form>
</div>
<?php 
	if(isset($_POST['login'])){
		$username = mysqli_real_escape_string($koneksi,$_POST['username']);
		$password = mysqli_real_escape_string($koneksi,md5($_POST['password']));
	
		$sql = mysqli_query($koneksi,"SELECT * FROM masyarakat WHERE username='$username' AND password='$password' ");
		$cek = mysqli_num_rows($sql);
		$data = mysqli_fetch_assoc($sql);
	
		$sql2 = mysqli_query($koneksi,"SELECT * FROM petugas WHERE username='$username' AND password='$password' ");
		$cek2 = mysqli_num_rows($sql2);
		$data2 = mysqli_fetch_assoc($sql2);

		if($cek>0){
			session_start();
			$_SESSION['username']=$username;
			$_SESSION['data']=$data;
			$_SESSION['level']='masyarakat';
			header('location:masyarakat/');
		}
		elseif($cek2>0){
			if($data2['level']=="admin"){
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['data']=$data2;
				header('location:admin/');
			}
			elseif($data2['level']=="petugas"){
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['data']=$data2;
				header('location:petugas/');
			}
		}
		else{
			echo "<script>alert('username atau password salah')</script>";
		}

	}
 ?>