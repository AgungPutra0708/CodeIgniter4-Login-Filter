<?= $this->include('template/header') ?>
<?= $this->include('template/sidebar') ?>
<?= $this->include('template/topbar') ?>
<div class="container">
	<h5>Employee Data</h5>
	<div class="form-group">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEmployeeModal">Create Employee</button>
	</div>
	<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Nama</th>
				<th scope="col">NIK</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no=1;
			foreach ($employee as $e) :
				?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $e['name']; ?></td>
					<td><?= $e['nik']; ?></td>
					<td>
						<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editEmployeeModal_<?= $e['id']; ?>">Ubah</button>
						<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteEmployeeModal_<?= $e['id']; ?>">Hapus</button>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
		</div>
	</div>

	<!-- Modal Add New-->
	<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addEmployeeModalLabel">Create User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="<?= base_url('employee/addEmployee'); ?>">
					<div class="modal-body">
						<div class="form-group">
							<label for="formGroupExampleInput">Name</label>
							<input type="text" class="form-control" id="username" name="username">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput">NIK</label>
							<input type="text" class="form-control" id="nik" name="nik">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput">Address</label>
							<textarea class="form-control" id="address" name="address"></textarea>
						</div>
						<div class="col-md-12">
							<label>File</label>
							<div class="form-group">
								<input type="file" name="file_upload" id="file_upload" class="form-control"> 
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button class="btn btn-primary" type="submit">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal Edit Employee-->
	<?php 
	foreach ($employee as $i) :
		?>
		<div class="modal fade" id="editEmployeeModal_<?= $i['id']; ?>" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addEmployeeModalLabel">Change Employee Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="post" action="<?= base_url('employee/editEmployee'); ?>">
						<div class="modal-body">
							<input type="hidden" class="form-control" name="id" value="<?= $i['id']; ?>">
							<div class="form-group">
								<label for="formGroupExampleInput">Username</label>
								<input type="text" class="form-control" id="username" name="username" value="<?= $i['username']; ?>">
							</div>
							<div class="form-group">
								<label for="formGroupExampleInput">Password</label>
								<input type="text" class="form-control" id="password" name="password">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
							<button class="btn btn-primary" type="submit">Simpan Perubahan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php endforeach; ?>

		<?php 
	foreach ($users as $d) :
		?>
	<div class="modal fade" id="deleteEmployeeModal_<?= $d['id']; ?>" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addEmployeeModalLabel">Hapus Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="<?= base_url('users/deleteUser'); ?>">
					<div class="modal-body">
						<p>Apakan Anda Yakin Akan Menghapus?</p>
						<input type="hidden" class="form-control" name="id" value="<?= $d['id']; ?>">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
						<button class="btn btn-primary" type="submit">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
	
	<?= $this->include('template/footer') ?>