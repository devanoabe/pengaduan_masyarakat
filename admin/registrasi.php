        <div class="row">
          <div class="col s12 m9">
            <h3 style="font-weight: bold; border-left: 6.5px solid black;
		padding-left: 7px; color:#ef69bf; margin-top: 120px" class="text">Masyarakat</h3>
          </div>  
          
        <table style="-webkit-box-shadow: 3px 3px 6px 0px rgba(0,0,0,0.19); 
			box-shadow: 3px 3px 6px 0px rgba(0,0,0,0.19);
			width:94%; border-radius: 10px;" class="display responsive-table">
          <thead style="font-weight: bold; background-color:#ef69bf; color: white;">
              <tr>
					<th style="text-align: center;">No</th>
					<th style="text-align: center;">NIK</th>
					<th style="text-align: center;">Nama</th>
					<th style="text-align: center;">Username</th>
					<th style="text-align: center;">Telp</th>
                	<th style="text-align: center;">Opsi</th>
              </tr>
          </thead>

	
            <div class="section">
            <a style="float: right;
			margin-right: 20px;"class="waves-effect waves-light btn modal-trigger black" href="#modal1">
			<i class="material-icons">add</i></a>
          	</div>
    
          <tbody>

            
	<?php 
		$no=1;
		$query = mysqli_query($koneksi,"SELECT * FROM masyarakat ORDER BY nik ASC");
		while ($r=mysqli_fetch_assoc($query)) { ?>
		<tr>
			<td style="text-align: center;"><?php echo $no++; ?></td>
			<td style="text-align: center;"><?php echo $r['nik']; ?></td>
			<td style="text-align: center;"><?php echo $r['nama']; ?></td>
			<td style="text-align: center;"><?php echo $r['username']; ?></td>
			<td style="text-align: center;"><?php echo $r['telp']; ?></td>
			<td style="text-align: center;">

			<a style="color: #ef69bf; background-color: white;
							border: 2.5px solid #ef69bf; box-shadow: none;
							font-weight: bold" class="btn modal-trigger" 
							href="#regis_edit?nik=<?php echo $r['nik'] ?>">Edit</a> 
			
			<a style="color: white; background-color: #ef69bf;
							border: 2.5px solid #ef69bf; box-shadow: none;
							font-weight: bold;" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" class="btn" href="index.php?p=regis_hapus&nik=
			<?php echo $r['nik'] ?>">Hapus</a></td>

<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
        <!-- Modal Structure -->
        <div id="regis_edit?nik=<?php echo $r['nik'] ?>" class="modal">
          <div class="modal-content">
            <h3 style="font-weight: bold; color: #ef69bf;">Edit</h3>
			<form method="POST">
				<div class="col s12 input-field">
					<label for="nik">NIK</label>
					<input id="nik" type="number" name="nik" value="<?php echo $r['nik']; ?>">
				</div>
				<div class="col s12 input-field">
					<label for="nama">Nama</label>
					<input id="nama" type="text" name="nama" value="<?php echo $r['nama']; ?>">
				</div>
				<div class="col s12 input-field">
					<label for="username">Username</label>		
					<input id="username" type="text" name="username" value="<?php echo $r['username']; ?>">
				</div>
				<div class="col s12 input-field">
					<label for="telp">Telp</label>
					<input id="telp" type="number" name="telp" value="<?php echo $r['telp']; ?>">
				</div>
				<div class="col s12 input-field">
					<input style="color: white; background-color: #ef69bf;
							border: 2.5px solid #ef69bf; box-shadow: none;
							font-weight: bold; float: right;" type="submit" name="Update" value="Simpan" class="btn">
				</div>
			</form>

			<?php 
				if(isset($_POST['Update'])){
					$update=mysqli_query($koneksi,"UPDATE masyarakat SET nik='".$_POST['nik']."',nama='".$_POST['nama']."',username='".$_POST['username']."',telp='".$_POST['telp']."' WHERE nik='".$r['nik']."' ");
					if($update){
						echo "<script>alert('Data Tersimpan')</script>";
						echo "<script>location='location:index.php?p=registrasi';</script>";
					}
				}
			 ?>
          </div>
          <!-- <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
          </div> -->
        </div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->

		</tr>
            <?php  }
             ?>

          </tbody>
        </table>        

        <!-- Modal Structure -->
        <div id="modal1" class="modal">
          <div class="modal-content">
            <h3 style="font-weight: bold; color: #ef69bf;">Tambah Masyarakat</h3>
			<form method="POST">
				<div class="col s12 input-field">
					<label for="nik">NIK</label>
					<input id="nik" type="number" name="nik">
				</div>
				<div class="col s12 input-field">
					<label for="nama">Nama</label>
					<input id="nama" type="text" name="nama">
				</div>
				<div class="col s12 input-field">
					<label for="username">Username</label>		
					<input id="username" type="text" name="username"><br><br>
				</div>
				<div class="col s12 input-field">
					<label for="password">Password</label>
					<input id="password" type="password" name="password"><br><br>
				</div>
				<div class="col s12 input-field">
					<label for="telp">Telp</label>
					<input id="telp" type="number" name="telp"><br><br>
				</div>
				<div class="col s12 input-field">
					<input style="color: white; background-color: #ef69bf;
							border: 2.5px solid #ef69bf; box-shadow: none;
							font-weight: bold; float: right; margin-bottom: 25px;" type="submit" name="simpan" value="Simpan" class="btn right">
				</div>
			</form>

			<?php 
				if(isset($_POST['simpan'])){
					$password = md5($_POST['password']);

					$query=mysqli_query($koneksi,"INSERT INTO masyarakat VALUES ('".$_POST['nik']."','".$_POST['nama']."','".$_POST['username']."','".$password."','".$_POST['telp']."')");
					if($query){
						echo "<script>alert('Data Tesimpan')</script>";
						echo "<script>location='location:index.php?p=registrasi';</script>";
					}
				}
			 ?>
          </div>
          <!-- <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
          </div> -->
        </div>