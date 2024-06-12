<div class="container-fluid pt-3 px-4 ">
	<div class="row mb-2">
		<div class="col-12 mb-2">
			<h2 style="margin-top:0px">Request Read</h2>
		</div>
		<div class="col-md-12 text-center">
			<div style="margin-top: 8px" id="message">
				<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
			</div>
		</div>
	</div>
	<div class="row py-4">
		<div class="col-md-12">
			<div class="card p-2 border-primary bg-light">
				<div class="row">
						<h4>
							<b>Data Diri</b>
						</h4>
					<div class="col-12 d-flex justfy-content-center py-4">
						<img class="rounded-circle" src="<?= base_url('assets/admin/img/user.png') ?>" alt="" style="width: 80px; height: 80px;margin-left: auto;
						margin-right: auto;">
						<!-- <?php
						if ($foto = null) {
							?> -->
							<!-- <img class="rounded-circle" src="<?= base_url('assets/admin/img/user.png') ?>" alt="" style="width: 40px; height: 40px;"> -->
							<!-- <?php
						} else {
							?> -->

							<!-- <img class="rounded-circle" src="<?= base_url('assets/user/upload/img/' . $foto) ?>" alt="" style="width: 40px; height: 40px;"> -->
							<!-- <?php
						}
						?> -->

					</div>
					<div class="col-12 pt-3 d-flex justify-content-center">
						<h4 class="text-center p-2 rounded-3 bg-success text-white"><?= $nama ?></h4>
					</div>
					<div class="col-12 d-flex justify-content-center">
						<p class="text-center badge bg-primary text-white">
							<?php
							if ($jenis_kelamin == 1) {
								echo 'Laki-laki';
							} elseif ($jenis_kelamin == 2) {
								echo 'Perempuan';
							} ?>
						</p>
					</div>
					<div class="col-12">
						<h4 class="text-center">
							<?= $nama ?>
						</h4>
						<p class="text-center">
							<?php
							if ($jenis_kelamin == 1) {
								echo 'Pria';
							} else {
								echo 'Wanita';
							}
							?>
						</p>
						<hr>
						<table class="table">
							<tr>
								<td>Tgl Lahir</td>
								<td><?= date('d-m-Y', strtotime($tgl_lahir)) ?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><?= $alamat ?></td>
							</tr>
							<tr>
								<td>Hobi</td>
								<td><?= $hobi ?></td>
							</tr>
							<tr>
								<td>Pekerjaan</td>
								<td><?= $pekerjaan ?></td>
							</tr>
							<tr>
								<td>Profil</td>
								<td><?= $deskripsi_diri ?></td>
							</tr>
							<tr>
								<td>Kriteria</td>
								<td><?= $kriteria_pasangan ?></td>
							</tr>
							<tr>
								<td>Instagram</td>
								<td><?= $ig ?></td>
							</tr>
							<tr>
								<td>Facebook</td>
								<td><?= $fb ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 pt-3">
			<div class="card p-2 border-primary bg-light">
				<div class="row">
					<div class="col-12">
						<h4>
							<b>Info Akun</b>
						</h4>
						<table class="table" >
							<tr>
								<th>Email</th>
								<td><?=$email?></td>
							</tr>
							<tr>
								<th>Telp/Hp</th>
								<td><?=$phone?></td>
							</tr>
							<tr>
								<th>Tgl Register</th>
								<td><?= date('d-m-Y', strtotime($tgl_register)) ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 py-4">
		<a href="<?php echo site_url('users_admin') ?>" class="btn btn-default">Cancel</a>
		</div>
	</div>
</div>