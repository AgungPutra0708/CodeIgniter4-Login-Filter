<?= $this->include('template/header') ?>
<?= $this->include('template/sidebar') ?>
<?= $this->include('template/topbar') ?>
<div class="container">
	<h5>Users Data</h5>
	<div class="form-group">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUsersModal">Create User</button>
	</div>
	<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Username</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no=1;
			foreach ($users as $user) :
				?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $user['username']; ?></td>
					<td>
						<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editUsersModal_<?= $user['id']; ?>">Ubah</button>
						<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteUsersModal_<?= $user['id']; ?>">Hapus</button>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
		</div>
	</div>

	<!-- Modal Add New-->
	<div class="modal fade" id="addUsersModal" tabindex="-1" aria-labelledby="addUsersModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addUsersModalLabel">Create User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="<?= base_url('users/addUser'); ?>">
					<div class="modal-body">
						<div class="form-group">
							<label for="formGroupExampleInput">Username</label>
							<input type="text" class="form-control" id="username" name="username">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput">Password</label>
							<input type="text" class="form-control" id="password" name="password">
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

	<!-- Modal Edit Users-->
	<?php 
	foreach ($users as $i) :
		?>
		<div class="modal fade" id="editUsersModal_<?= $i['id']; ?>" tabindex="-1" aria-labelledby="addUsersModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addUsersModalLabel">Change User Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="post" action="<?= base_url('users/editUser'); ?>">
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
	<div class="modal fade" id="deleteUsersModal_<?= $d['id']; ?>" tabindex="-1" aria-labelledby="addUsersModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addUsersModalLabel">Hapus Data</h5>
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