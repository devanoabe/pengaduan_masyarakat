<table class="responsive-table" style="width: 100%;">
		<h4 style="font-weight: bold; border-left: 5px solid black;
		padding-left: 7px" class="text">Tulis <span style="color:#ef69bf">Laporan</span></h4>
		<td style="padding: 20px;">
			<form method="POST" enctype="multipart/form-data">
				<textarea class="materialize-textarea" name="laporan" placeholder="Tulis Laporan"></textarea><br><br>
				<h5 style="margin-bottom: 15px">Upload Gambar</h5>
				<input type="file" name="foto"><br><br>
				<input style="float: right; background:#ef69bf;
				font-weight: bold;" type="submit" name="kirim" value="Kirim" class="btn">
			</form>
			<br/>
		</td>
	
			<table style="-webkit-box-shadow: 3px 3px 6px 0px rgba(0,0,0,0.19); 
			box-shadow: 3px 3px 6px 0px rgba(0,0,0,0.19);" 
			class="responsive-table">
			<h4 style="font-weight: bold; border-left: 5px solid black;
			padding-left: 7px; margin-top: 40px; margin-bottom: 60px" class="text">Daftar <span style="color:#ef69bf">Laporan</span></h4>
				<tr style="background-color:#ef69bf; font-weight: bold; color: white;">
					<td style="text-align: center;">No</td>
					<td style="text-align: center;">NIK</td>
					<td style="text-align: center;">Nama</td>
					<td style="text-align: center;">Tanggal Masuk</td>
					<td style="text-align: center;">Status</td>
					<td style="text-align: center;">Opsi</td>
				</tr>
				<?php 
					$no=1;
					$pengaduan = mysqli_query($koneksi,"SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan WHERE pengaduan.nik='".$_SESSION['data']['nik']."' ORDER BY pengaduan.id_pengaduan DESC");
					while ($r=mysqli_fetch_assoc($pengaduan)) { ?>
					<tr style="background-color: white;">
						<td style="text-align: center;"><?php echo $no++; ?></td>
						<td style="text-align: center;"><?php echo $r['nik']; ?></td>
						<td style="text-align: center;"><?php echo $r['nama']; ?></td>
						<td style="text-align: center;"><?php echo $r['tgl_pengaduan']; ?></td>
						<td style="text-align: center;"><?php echo $r['status']; ?></td>
						<td style="text-align: center;">
							<a style="color: #ef69bf; background-color: white;
							border: 2.5px solid #ef69bf; box-shadow: none;
							font-weight: bold" class="btn modal-trigger" href="#tanggapan&id_pengaduan=<?php echo $r['id_pengaduan'] ?>">More</a> 
							<a style="color: white; background-color: #ef69bf;
							border: 2.5px solid #ef69bf; box-shadow: none;
							font-weight: bold" class="btn" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="index.php?p=pengaduan_hapus&id_pengaduan=<?php echo $r['id_pengaduan'] ?>">Hapus</a></td>

<!-- ditanggapi -->
        <div id="tanggapan&id_pengaduan=<?php echo $r['id_pengaduan'] ?>" class="modal">
          <div class="modal-content">
            <h4 style="font-weight: bold; color:#ef69bf"class="text">Detail</h4>
            <div class="col s12">
				<p>NIK : <?php echo $r['nik']; ?></p>
            	<p>Dari : <?php echo $r['nama']; ?></p>
				<p>Tanggal Masuk : <?php echo $r['tgl_pengaduan']; ?></p>
				<p>Tanggal Ditanggapi : <?php echo $r['tgl_tanggapan']; ?></p>
				<?php 
					if($r['foto']=="kosong"){ ?>
						<img src="../img/noImage.png" width="100">
				<?php	}else{ ?>
					<img width="100" src="../img/<?php echo $r['foto']; ?>">
				<?php }
				 ?>
				<br><b>Pesan</b>
				<p><?php echo $r['isi_laporan']; ?></p>
				<br><b>Respon</b>
				<p><?php echo $r['tanggapan']; ?></p>
            </div>

          </div>
          <div class="modal-footer col s12">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
          </div>
        </div>
<!-- ditanggapi -->

					</tr>
				<?php	}
				 ?>
			</table>

		
	</tr>
</table>
<?php 
	
	 if(isset($_POST['kirim'])){
	 	$nik = $_SESSION['data']['nik'];
	 	$tgl = date('Y-m-d');


	 	$foto = $_FILES['foto']['name'];
	 	$source = $_FILES['foto']['tmp_name'];
	 	$folder = './../img/';
	 	$listeks = array('jpg','png','jpeg');
	 	$pecah = explode('.', $foto);
	 	$eks = $pecah['1'];
	 	$size = $_FILES['foto']['size'];
	 	$nama = date('dmYis').$foto;

		if($foto !=""){
		 	if(in_array($eks, $listeks)){
		 		if($size<=10000000){
					move_uploaded_file($source, $folder.$nama);
					$query = mysqli_query($koneksi,"INSERT INTO pengaduan VALUES (NULL,'$tgl','$nik','".$_POST['laporan']."','$nama','proses')");

		 			if($query){
			 			echo "<script>alert('Pengaduan Akan Segera di Proses')</script>";
			 			echo "<script>location='index.php';</script>";
		 			}

		 		}
		 		else{
		 			echo "<script>alert('Akuran Gambar Tidak Lebih Dari 100KB')</script>";
		 		}
		 	}
		 	else{
		 		echo "<script>alert('Format File Tidak Di Dukung')</script>";
		 	}
		}
		else{
			$query = mysqli_query($koneksi,"INSERT INTO pengaduan VALUES (NULL,'$tgl','$nik','".$_POST['laporan']."','noImage.png','proses')");
			if($query){
			 	echo "<script>alert('Pengaduan Akan Segera Ditanggapi')</script>";
	 			echo "<script>location='index.php';</script>";
 			}
		}

	 }

 ?>