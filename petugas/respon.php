        <div class="row">
          <div class="col s12 m9">
            <h3 style="font-weight: bold; border-left: 6.5px solid black;
			padding-left: 7px; color:#ef69bf; margin-top: 120px" class="text">Respon</h3>
          </div>
        </div>

        <table style="-webkit-box-shadow: 3px 3px 6px 0px rgba(0,0,0,0.19); 
			box-shadow: 3px 3px 6px 0px rgba(0,0,0,0.19);
			width:94%;" class="display responsive-table" style="width:100%">
          <thead style="font-weight: bold; background-color:#ef69bf; color: white;">
              <tr>
				<th style="text-align: center;">No</th>
				<th style="text-align: center;">NIK</th>
				<th style="text-align: center;">Nama</th>
				<th style="text-align: center;">Petugas</th>
				<th style="text-align: center;">Tanggal Masuk</th>
				<th style="text-align: center;">Tanggal Ditanggapi</th>
				<th style="text-align: center;">Status</th>
				<th style="text-align: center;">Opsi</th>
              </tr>
          </thead>
          <tbody>
            
	<?php 
		$no=1;
		$query = mysqli_query($koneksi,"SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas WHERE tanggapan.id_petugas='".$_SESSION['data']['id_petugas']."' ORDER BY tanggapan.id_pengaduan DESC");
		while ($r=mysqli_fetch_assoc($query)) { ?>
		<tr>
			<td style="text-align: center;"><?php echo $no++; ?></td>
			<td style="text-align: center;"><?php echo $r['nik']; ?></td>
			<td style="text-align: center;"><?php echo $r['nama']; ?></td>
			<td style="text-align: center;"><?php echo $r['nama_petugas']; ?></td>
			<td style="text-align: center;"><?php echo $r['tgl_pengaduan']; ?></td>
			<td style="text-align: center;"><?php echo $r['tgl_tanggapan']; ?></td>
			<td style="text-align: center;"><?php echo $r['status']; ?></td>
			<td style="text-align: center;">
			<a style="text-align: center;"><a style="color: #ef69bf; background-color: white;
							border: 2.5px solid #ef69bf; box-shadow: none;
							font-weight: bold; padding-left: 20px; 
							padding-right: 20px;" class="btn modal-trigger" 
			href="#more?id_tanggapan=<?php echo $r['id_tanggapan'] ?>">More</a> 

			<a style="color: white; background-color: #ef69bf;
							border: 2.5px solid #ef69bf; box-shadow: none;
							font-weight: bold;" class="btn" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" 
			href="index.php?p=tanggapan_hapus&id_tanggapan=<?php echo $r['id_tanggapan'] ?>">Hapus</a></td>
		

<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
        <!-- Modal Structure -->
        <div id="more?id_tanggapan=<?php echo $r['id_tanggapan'] ?>" class="modal">
          <div class="modal-content">
            <h4 class="orange-text">Detail</h4>
            <div class="col s12">
				<p>NIK : <?php echo $r['nik']; ?></p>
            	<p>Dari : <?php echo $r['nama']; ?></p>
            	<p>Petugas : <?php echo $r['nama_petugas']; ?></p>
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
<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->

		</tr>
            <?php  }
             ?>

          </tbody>
        </table>        