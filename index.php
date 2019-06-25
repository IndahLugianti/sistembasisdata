

<!DOCTYPE html>
<html>
<head>
	<title>Tugas SIMBADA</title>
</head>
<body>

	<a href="index.php" >Refresh</a><br>

	<table border="1px">
	<tr style="background-color: green;">
		<th>NIM</th>
		<th>NAMA</th>
		<th>Semester</th>
		<th>Umur</th>
		<th>Alamat</th>
		<th>No Telp</th>
		<th>Menu</th>

		
	</tr>
	<?php 
	include'koneksi.php';

	if (isset($_GET['delete'])) {
		$idx = $_GET['id'];
		mysqli_query($kons, "DELETE FROM mahasiswa WHERE nim = '$idx'");
	}

	$squl=mysqli_query($kons, "SELECT * FROM mahasiswa");
	if ($squl==FALSE) {
		die(mysqli_error($squl));
	}
	while ($tangkap=mysqli_fetch_array($squl)) {
	?>
	<tr>
		<td><?php echo $tangkap['nim']; ?> </td>	
		<td><?php echo $tangkap['nama']; ?> </td>
		<td><?php echo $tangkap['semester']; ?> </td>
		<td><?php echo $tangkap['umur']; ?> </td>
		<td><?php echo $tangkap['alamat']; ?> </td>
		<td><?php echo $tangkap['no_hp']; ?> </td>	
		
		<td><a href="index.php?delete=true&id=<?php echo $tangkap['nim']; ?>"> Hapus Data</a></td>
	</tr>
	<?php
	}
	?>
</table>
	
	<br>

	<?php 
	if (isset($_POST['nim'])) {
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$semester = $_POST['semester'];
		$umur = $_POST['umur'];
		$alamat = $_POST['alamat'];
		$no_hp = $_POST['no_hp'];

		include 'koneksi.php';

		mysqli_query($kons, "INSERT INTO `mahasiswa`(`nim`,`nama`, `semester`, `umur`, `alamat`, `no_hp`) VALUES ('$nim','$nama','$semester','$umur','$alamat','$no_hp')");

			
	}
 ?>
<form action="#" method="POST">
	<table>
		<tr>
			<td>Nim</td>
			<td>:</td>
			<td><input type="text" name="nim" required></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" required></td>
		</tr>
		
		<tr>
			<td>Semester</td>
			<td>:</td>
			<td><input type="text" name="semester" required></td>
		</tr>
	
		<tr>
			<td>Umur</td>
			<td>:</td>
			<td><input type="text" name="umur" required></td>
		</tr>
		
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><input type="text" name="alamat" required></td>
		</tr>

		<tr>
			<td>No Telp</td>
			<td>:</td>
			<td><input type="text" name="no_hp" required></td>
		</tr>

		<tr>
			<td colspan="3"><button type="submit" style="width: 100%;">+ Tambah</button></td>
		</tr>
		
	</table>
</form>

	
</body>
</html>
