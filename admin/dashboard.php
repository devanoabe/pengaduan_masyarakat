
<h3 style="font-weight: bold; border-left: 6.5px solid black;
		padding-left: 7px; color:#ef69bf;" class="text">Dahsboard</h3>

	<div class="row">

		<div class="col m6">
			<div style="border-radius: 20px" class="card white">
				<div class="card-content">
				<a><h4 style="text-align: center;
				size: 30px; margin-bottom: 30px; margin-top: -2px;
				font-weight: bold;" class="black-text name"><?php echo ucwords($_SESSION['data']['nama_petugas']); ?>, Welcome Back </h4></a>
				<a href="#user"><img style="width: 80%;
									display: block;
									margin-bottom: 30px;
    								margin-left: auto;
    								margin-right: auto;" 
								src="../img/unnamed.png"></a>
				<a><h6 style="text-align: center;
				font-size: 25px; font-weight: bold;" class="black-text name"><?php echo ucwords($_SESSION['data']['telp_petugas']); ?></h6></a>
				</div>
			</div>
		</div>

		<div class="col m3">
		  <div style="border-radius: 20px" class="card white">
		    <div class="card-content black-text">
			<?php 
				$query = mysqli_query($koneksi,"SELECT * FROM pengaduan");
				$jlmmember = mysqli_num_rows($query);
				if($jlmmember<1){
					$jlmmember=0;
				}
			 ?>
			 <i class="material-icons">book</i>
		      <span style="font-weight: bold; margin-top: 20px" class="card-title">Laporan yang terkumpul</span>
		      <h5 stlye="font-weight: bold;"><?php echo $jlmmember; ?></h5>
		    </div>
		  </div>
		</div>	

		<div class="col m3">
		    <div style="
			border-radius: 20px"  class="card white">
		    <div class="card-content black-text">
			<?php 
				$query = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE status='selesai'");
				$jlmmember = mysqli_num_rows($query);
				if($jlmmember<1){
					$jlmmember=0;
				}
			 ?>
			  <i class="material-icons">question_answer</i>
		      <span style="font-weight: bold; margin-top: 20px" class="card-title">Laporan yang telah direspon</span>
		      <h5 stlye="margin-bottom: -12px;" ><?php echo $jlmmember; ?></h5>
		    </div>
		  </div>
		</div>

		<div class="col m6">
		    <div style="background-color:#ef69bf;
			border-radius: 20px" class="card">
		    <div class="card-content white-text">
			  <i class="material-icons">question_answer</i>
		      <span style="font-weight: bold; margin-top: 20px" class="card-title">Informasi user</span>
			  <span style="font-weight: bold; margin-top: 20px" class="card-title">username :</span>
			  <a><h6 style="font-size: 20px; font-weight: bold;" class="white-text name"><?php echo ucwords($_SESSION['data']['username']); ?></h6></a>
			  <span style="font-weight: bold; margin-top: 20px" class="card-title">level :</span>
			  <a><h6 style="font-size: 20px; font-weight: bold;" class="white-text name"><?php echo ucwords($_SESSION['data']['level']); ?></h6></a>
		    </div>	
	</div>