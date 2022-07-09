<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Sewa Baju Lestari</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- menggunakan css framework bootstrap & font -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
		<!-- memberikan style pada tag yang diinginkan -->
	<style>
		/* memberi background warna */
		body {
			background-color: whitesmoke;
		}
		/* memberi margin pada bagian kanan kiri atas bawah dari h1 */
		h1{
			margin: 10px;
		}
		
		tbody tr {
			transition:0.4s;
		}
		/* memberi efek scale dan warna di table row pada table body */
		tbody tr:hover{
			background-color: #e1fcfc;
			transform: scale(1.03);
			
		}
		/* memberi warna pada table header  */
		thead{
			background-color: lightskyblue !important;
		}
	</style>
</head>
<body class="container">
	<h1 style="font-family:Pacifico" align="center" margin="20px;" padding="20px;">Sewa Baju Lestari</h1>
	<div class="d-flex justify-content-between mb-3">
		<a href="../mvc" class="btn btn-info">Manage Baju</a>
		<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahRent">Tambah Sewa Baju</button>
	</div>
	<table class="table table-striped table-hover">
		<thead>
		  <tr style="color : black;">
			<th scope="col">No</th>
			<th scope="col">Nama Penyewa</th>
			<th scope="col">Baju</th>
			<th scope="col">Tanggal Sewa</th>
			<th scope="col">Tanggal Pengembalian</th>
			<th scope="col">Jumlah Hari</th>
			<th scope="col">Biaya Sewa</th>
			<th scope="col">Aksi</th>
		  </tr>
		</thead>
		<tbody>
			<!-- mengambil data pada table model.php  -->
			<?php foreach ($rent as $key => $data){ ?>
				<tr>
					<th scope="row"><?=$key+1?></th>
					<td><?=$data["nama"]?></td>
					<td>
						<table class="table">
							<?php foreach($data["baju"] as $baju){ ?>
								<tr>
									<td><?=$baju["name"]?></td>
									<td><?=$baju["costPerDay"]?>/hari</td>
								</tr>
							<?php } ?>
							<tr>
								<th>TOTAL</th>
								<td><?=$data["harga"]?></td>
							</tr>
						</table>
					</td>
					<td><?=$data["start_date"]?></td>
					<td><?=$data["end_date"]?></td>
					<td><?=$data["hari"]?></td>
					<td><?=$data["harga"]*$data["hari"]?></td>
					<td>
					<form action="./rent/delete" method="post">
						<input type="hidden" name="id" value="<?=$data["id"]?>">
						<button class="btn btn-danger" type="submit" name="submit">Hapus</button>
					</form>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<div class="modal fade" id="modalTambahRent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<form action="./rent/insert" method="post" class="form modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Sewa Baju</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-3">
					<label class="form-label">Nama Penyewa</label>
					<input type="text" placeholder="Nama Penyewa" name="nama" class="form-control">
				</div>
				<div class="mb-3">
					<label class="form-label">Baju yang di sewa</label>
					<?php foreach($clothes as $data) { ?>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="<?=$data['id']?>" name="clothes_id[]">
						<label class="form-check-label">
							<?=$data["name"]?>
						</label>
					</div>
					<?php } ?>
				</div>
				<div class="mb-3">
					<label class="form-label">Jumlah hari di sewa</label>
					<input type="number" name="hari" placeholder="Jumlah hari di sewa" class="form-control">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
			</div>
			</div>
		</form>
	</div>

	<div class="modal fade" id="modalEditBaju" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<form id="editBaju" method="post" class="form modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Baju</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id" id="editId">
				<div class="mb-3">
					<label class="form-label">Nama</label>
					<input type="text" placeholder="Nama Baju" id="editName" name="name" class="form-control">
				</div>
				<div class="mb-3">
					<label class="form-label">Tipe Baju</label>
					<select name="type" class="form-control" id="editType">
						<option value="Baju Adat">Baju Adat</option>
						<option value="Baju Cosplay">Baju Cosplay</option>
						<option value="Baju Profesi">Baju Profesi</option>
						<option value="Baju Pernikahan">Baju Pernikahan</option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Gender</label>
					<select name="gender" class="form-control" id="editGender">
						<option value="Wanita">Wanita</option>
						<option value="Pria">Pria</option>
						<option value="Anak Laki-laki">Anak Laki-laki</option>
						<option value="Anak Perempuan">Anak Perempuan</option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Biaya Per Hari</label>
					<input type="number" name="costPerDay" class="form-control" id="editCostPerDay">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
			</div>
			</div>
		</form>
	</div>
<!-- menggunakan css framework bootstrap  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
	let formEditBaju = document.getElementById("editBaju")
	let editId = document.getElementById("editId")
	let editName = document.getElementById("editName")
	let editType = document.getElementById("editType")
	let editGender = document.getElementById("editGender")
	let editCostPerDay = document.getElementById("editCostPerDay")
	const myModal = new bootstrap.Modal('#modalEditBaju', {
		keyboard: false
	})
	
	function editBaju(id, name, type, gender, costPerDay){
		formEditBaju.action = "./baju/update"
		editId.value = id
		editName.value = name
		editType.value = type
		editGender.value = gender
		editCostPerDay.value = costPerDay
		myModal.show()
	}
</script>
</body>
</html>