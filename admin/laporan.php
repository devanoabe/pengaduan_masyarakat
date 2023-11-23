        <div class="row">
          <div class="col s12 m9">
            <h3 style="font-weight: bold; border-left: 6.5px solid black;
			padding-left: 7px; color:#ef69bf; margin-top: 120px" class="text">Laporan</h3>
          </div> 
          <div class="col s12 m3">
            <div class="section"></div>
            <a style="float: right;
			margin-right: 20px;" class="waves-effect waves-light btn black" href="cetak.php"><i class="material-icons">print</i></a>
          </div>
        </div>

        <table style="-webkit-box-shadow: 3px 3px 6px 0px rgba(0,0,0,0.19); 
			box-shadow: 3px 3px 6px 0px rgba(0,0,0,0.19);
			width:90%;" class="display responsive-table">
          <thead style="font-weight: bold; background-color:#ef69bf; color: white;">
              <tr>
				<th style="text-align: center;">No</th>
				<th style="text-align: center;">NIK Pelapor</th>
				<th style="text-align: center;">Nama Pelapor</th>
				<th style="text-align: center;">Nama Petugas</th>
				<th style="text-align: center;">Tanggal Masuk</th>
				<th style="text-align: center;">Tanggal Ditanggapi</th>
				<th style="text-align: center;">Status</th>
				<th style="text-align: center;">Opsi</th>
              </tr>
          </thead>
          <tbody>
            
	<?php 
		$no=1;
		$query = mysqli_query($koneksi,"SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN tanggapan ON tanggapan.id_pengaduan=pengaduan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas ORDER BY tgl_pengaduan DESC");
		while ($r=mysqli_fetch_assoc($query)) { ?>
		<tr>*
			<td style="text-align: center;"><?php echo $no++; ?></td>
			<td style="text-align: center;"><?php echo $r['nik']; ?></td>
			<td style="text-align: center;"><?php echo $r['nama']; ?></td>
			<td style="text-align: center;"><?php echo $r['nama_petugas']; ?></td>
			<td style="text-align: center;"><?php echo $r['tgl_pengaduan']; ?></td>
			<td style="text-align: center;"><?php echo $r['tgl_tanggapan']; ?></td>
			<td style="text-align: center;"><?php echo $r['status']; ?></td>
			<td style="text-align: center;">
			<a style="color: #ef69bf; background-color: white;
							border: 2.5px solid #ef69bf; box-shadow: none;
							font-weight: bold" class="btn modal-trigger" href="#laporan?id_tanggapan=<?php echo $r['id_tanggapan'] ?>">More</a></td>

<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
        <!-- Modal Structure -->
        <div id="laporan?id_tanggapan=<?php echo $r['id_tanggapan'] ?>" class="modal">
          <div class="modal-content">
            <h4 style="font-weight: bold; color: #ef69bf;" class="text">Detail</h4>
            <div class="col s12 m6">
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