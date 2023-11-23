        <div class="row">
          <div class="col s12 m9">
            <h3 style="font-weight: bold; border-left: 6.5px solid black;
		padding-left: 7px; color:#ef69bf; margin-top: 120px" class="text">User</h3>
          </div>  
          <div class="col s12 m3">
            <div class="section"></div>
            <a style="float: right;
			margin-right: 20px;" class="waves-effect waves-light btn modal-trigger black" href="#modal1"><i class="material-icons">add</i></a>
          </div>
        </div>

        <table style="-webkit-box-shadow: 3px 3px 6px 0px rgba(0,0,0,0.19); 
			box-shadow: 3px 3px 6px 0px rgba(0,0,0,0.19);
			width:94%;" class="display responsive-table" style="width:100%">
          <thead style="font-weight: bold; background-color:#ef69bf; color: white;">
              <tr>
				<th style="text-align: center;">No</th>
				<th style="text-align: center;">Nama</th>
				<th style="text-align: center;">Username</th>
				<th style="text-align: center;">Telephone</th>
				<th style="text-align: center;">level</th>
				<th style="text-align: center;">Opsi</th>
              </tr>
          </thead>
	
<tbody>        
	<?php 
		$no=1;
		$tampil = mysqli_query($koneksi,"SELECT * FROM petugas ORDER BY nama_petugas ASC");
		while ($r=mysqli_fetch_assoc($tampil)) { ?>
		<tr>
			<td style="text-align: center;"><?php echo $no++; ?></td>
			<td style="text-align: center;"><?php echo $r['nama_petugas']; ?></td>
			<td style="text-align: center;"><?php echo $r['username']; ?></td>
			<td style="text-align: center;"><?php echo $r['telp_petugas']; ?></td>
			<td style="text-align: center;"><?php echo $r['level']; ?></td>
			<td style="text-align: center;">
			<a style="color: #ef69bf; background-color: white;
							border: 2.5px solid #ef69bf; box-shadow: none;
							font-weight: bold" class="btn modal-trigger" href="#user_edit<?php echo $r['id_petugas'] ?>">Edit</a> 
							
			<a style="color: white; background-color: #ef69bf;
							border: 2.5px solid #ef69bf; box-shadow: none;
							font-weight: bold;" class="btn" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="index.php?p=user_hapus&id_petugas=<?php echo $r['id_petugas'] ?>">Hapus</a></td>
<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
        <!-- Modal Structure -->
        <div id="user_edit<?php echo $r['id_petugas'] ?>" class="modal">
          <div class="modal-content">
            <h4 style="font-weight: bold; color: #ef69bf;">Edit</h4>
			<form method="POST">
				<div class="col s12 input-field">
					<label for="nama">Nama</label>
					<input hidden type="text" name="id_petugas" value="<?php echo $r['id_petugas']; ?>">
					<input id="nama" type="text" name="nama" value="<?php echo $r['nama_petugas']; ?>">
				</div>
				<div class="col s12 input-field">
					<label for="username">Username</label>		
					<input id="username" type="text" name="username" value="<?php echo $r['username']; ?>">
				</div>
				<div class="col s12 input-field">
					<label for="telp">Telp</label>
					<input id="telp" type="number" name="telp" value="<?php echo $r['telp_petugas']; ?>">
				</div>
				<div class="col s12 input-field">
					<p>
						<label>
						  <input value="admin" class="with-gap" name="level" type="radio" <?php if($r['level']=="admin"){echo "checked";} ?> />
						  <span>Admin</span>
						</label>
						<label>
						  <input value="petugas" class="with-gap" name="level" type="radio" <?php if($r['level']=="petugas"){echo "checked";} ?> />
						  <span>Petugas</span>
						</label>
					</p>
				</div>
				<div class="col s12 input-field">
					<input style="color: white; background-color: #ef69bf;
							border: 2.5px solid #ef69bf; box-shadow: none;
							font-weight: bold;" type="submit" name="Update" value="Simpan" class="btn right">
				</div>
			</form>

			<?php 
				if(isset($_POST['Update'])){
					// echo $_POST['nama'].$_POST['username'].$_POST['telp'].$_POST['level'];
					$update=mysqli_query($koneksi,"UPDATE petugas SET nama_petugas='".$_POST['nama']."',username='".$_POST['username']."',telp_petugas='".$_POST['telp']."',level='".$_POST['level']."' WHERE id_petugas='".$_POST['id_petugas']."' ");
					if($update){
						echo "<script>alert('Data di Update')</script>";
						echo "<script>location='index.php?p=user'</script>";
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
            <h3 style="font-weight: bold; color: #ef69bf;">Tambah User</h3>
			<form method="POST">
				<div class="col s12 input-field">
					<label for="nama">Nama</label>
					<input id="nama" type="text" name="nama">
				</div>
				<div class="col s12 input-field">
					<label for="username">Username</label>		
					<input id="username" type="text" name="username">
				</div>
				<div class="col s12 input-field">
					<label for="telp_petugas">Telepon</label>
					<input id="telp_petugas" type="number" name="telp">
				</div>
				<div class="col s12 input-field">
					<label for="password">Password</label>
					<input id="password" type="password" name="password">
				</div>
				<div class="col s12 input-field">
					<select class="default" name="level">
						<option selected disabled="">Pilih Level</option>
						<option value="admin">Admin</option>
						<option value="petugas">Petugas</option>
					</select>
				</div>
				<div class="col s12 input-field">
					<input style="color: white; background-color: #ef69bf;
							border: 2.5px solid #ef69bf; box-shadow: none;
							font-weight: bold; margin-bottom: 20px;" type="submit" name="input" value="Simpan" class="btn right">
				</div>
			</form>
					

			<?php 
				if(isset($_POST['input'])){
					$password = md5($_POST['password']);

					$query=mysqli_query($koneksi,"INSERT INTO petugas VALUES (NULL,'".$_POST['nama']."','".$_POST['username']."','".$password."','".$_POST['telp']."','".$_POST['level']."')");
					if($query){
						echo "<script>alert('Data Ditambahkan')</script>";
						echo "<script>location='index.php?p=user'</script>";
					}
				}
			 ?>
          </div>
          <!-- <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
          </div> -->
        </div>