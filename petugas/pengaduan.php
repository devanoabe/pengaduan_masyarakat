        <div class="row">
          <div class="col s12 m9">
            <h3 style="font-weight: bold; border-left: 6.5px solid black;
		padding-left: 7px; color:#ef69bf; margin-top: 120px" class="text">Pengaduan</h3>
          </div>
        </div>

        <table style="-webkit-box-shadow: 3px 3px 6px 0px rgba(0,0,0,0.19); 
			box-shadow: 3px 3px 6px 0px rgba(0,0,0,0.19);
			width:94%;" class="display responsive-table">
          <thead style="font-weight: bold; background-color:#ef69bf; color: white;">
              <tr>
				<th style="text-align: center;">No</th>
				<th style="text-align: center;">NIK</th>
				<th style="text-align: center;">Nama</th>
				<th style="text-align: center;">Tanggal Masuk</th>
				<th style="text-align: center;">Status</th>
				<th style="text-align: center;">Opsi</th>
              </tr>
          </thead>
		  
<tbody>
            
	<?php 
		$no=1;
		$query = mysqli_query($koneksi,"SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik WHERE pengaduan.status='proses' ORDER BY pengaduan.id_pengaduan DESC");
		while ($r=mysqli_fetch_assoc($query)) { ?>
		<tr>
			<td style="text-align: center;"><?php echo $no++; ?></td>
			<td style="text-align: center;"><?php echo $r['nik']; ?></td>
			<td style="text-align: center;"><?php echo $r['nama']; ?></td>
			<td style="text-align: center;"><?php echo $r['tgl_pengaduan']; ?></td>
			<td style="text-align: center;"><?php echo $r['status']; ?></td>
			<td style="text-align: center;"><a style="color: #ef69bf; background-color: white;
							border: 2.5px solid #ef69bf; box-shadow: none;
							font-weight: bold" class="btn modal-trigger" 
			href="#more?id_pengaduan=<?php echo $r['id_pengaduan'] ?>">More</a>

			<a style="color: white; background-color: #ef69bf;
							border: 2.5px solid #ef69bf; box-shadow: none;
							font-weight: bold;" class="btn" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" 
			href="index.php?p=pengaduan_hapus&id_pengaduan=<?php echo $r['id_pengaduan'] ?>">Hapus</a></td>

<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
        <!-- Modal Structure -->
        <div id="more?id_pengaduan=<?php echo $r['id_pengaduan'] ?>" class="modal">
          <div class="modal-content">
            <h4 style="font-weight: bold; color:#ef69bf" class="text">Detail</h4>
            <div class="col s12 m6">
				<p>NIK : <?php echo $r['nik']; ?></p>
            	<p>Dari : <?php echo $r['nama']; ?></p>
				<p>Tanggal Masuk : <?php echo $r['tgl_pengaduan']; ?></p>
				<?php 
					if($r['foto']=="kosong"){ ?>
						<img src="../img/noImage.png" width="100">
				<?php	}else{ ?>
					<img width="100" src="../img/<?php echo $r['foto']; ?>">
				<?php }
				 ?>
				<br><b>Pesan</b>
				<p><?php echo $r['isi_laporan']; ?></p>
				<p>Status : <?php echo $r['status']; ?></p>
            </div>
            <?php 
            	if($r['status']=="proses"){ ?>
	            <div class="col s12 m6">
					<form method="POST">
						<div class="col s12 input-field">
							<label for="textarea">Tanggapan</label>
							<textarea id="textarea" name="tanggapan" class="materialize-textarea"></textarea>
						</div>
						<div class="col s12 input-field">
							<input style="color: white; background-color: #ef69bf;
							border: 2.5px solid #ef69bf; box-shadow: none;
							font-weight: bold" type="submit" name="tanggapi" value="Kirim" class="btn right">
						</div>
					</form>
	            </div>
            <?php	}
             ?>

			<?php 
				if(isset($_POST['tanggapi'])){
					$tgl = date('Y-m-d');
					$query = mysqli_query($koneksi,"INSERT INTO tanggapan VALUES (NULL,'".$r['id_pengaduan']."','".$tgl."','".$_POST['tanggapan']."','".$_SESSION['data']['id_petugas']."')");
					if($query){
						$update=mysqli_query($koneksi,"UPDATE pengaduan SET status='selesai' WHERE id_pengaduan='".$r['id_pengaduan']."'");
						if($update){
							echo "<script>alert('Tanggapan Terkirim')</script>";
							echo "<script>location='index.php?p=pengaduan';</script>";
						}
					}
				}
			 ?>
          </div>
          <div class="modal-footer col s12">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
          </div>
        </div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->

		</tr>
            <?php  }
             ?>

          </tbody>
        </table>        