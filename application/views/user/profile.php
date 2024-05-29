<div class="d-none d-md-none d-sm-none d-lg-block">
    <style>
        .color-1 {
            color: #7575fa;
        }

        .color-2 {
            color: #d600ff;
        }

        .bn45 {
            width: 170px;
            height: 50px;
        }

        .bn46 {
            width: 150px;
            height: 50px;
        }

        .form-label {
            font-size: 14px;
        }

        .form-control {
            font-size: 14px;

        }

        .form-check-label {
            font-size: 12px;

        }

        small {
            font-size: 12px;
        }

        .pad-t {
            padding-top: 40%;
        }

        .pad-t-2 {
            padding-top: 7%;
            margin-bottom: 20px;
        }

        .card-login {
            border: 2px solid blue;
            border-radius: 10px;
        }

        label {
            color: #7575fa;
        }

        small {

            color: #7575fa;

        }

        .form-control:focus {
            border-color: #7575fa;
            box-shadow: none;
            -webkit-box-shadow: none;
        }

        .has-error .form-control:focus {
            box-shadow: none;
            -webkit-box-shadow: none;
        }

        .bg-1 {
            background-color: #7575fa
        }

        @media (max-width:991.98px) {
            .bn45 {
                width: 80px;
                height: 20px;
            }

            .bn46 {
                width: 90px;
                height: 20px;
            }

            .pad-t {
                padding-top: 10%;
            }

            .pad-t-2 {
                margin-bottom: 20px;
            }
        }
    </style>
    <div class="container-fluid overflow-hidden" style="background-color:#e8e8e8">
        <div class="row g-0 vh-100 overflow-y-auto">
            <div class="col offset-lg-2 offset-xl-2 d-flex flex-column vh-100">
                <main class="row overflow-auto py-4 px-3">

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h5>Profil</h5>
                            </div>
                        </div>
                        <div class="row">
                            <form action="<?= base_url('profile_user/update') ?>" method="post" enctype="multipart/form-data">
                                <div class="col-lg-12">
                                    <div class="card card-all">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3 text-center">
                                                        <img src="<?= base_url('assets/admin/img/user.png') ?>" class="items-center my-auto" alt="..." class="thumbnail" width="80" height="80">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama</label>
                                                        <input type="text" name="nama" class="form-control form-control-sm" id="nama" placeholder="Masukkan nama lengkap" value="<?= $nama ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tgl_lahir" class="form-label">Tgl Lahir</label>
                                                        <input type="date" name="tgl_lahir" class="form-control form-control-sm" id="tgl_lahir" placeholder="" value="<?= $tgl_lahir ?>">
                                                    </div>
                                                    <div class="">
                                                        <label for="nama" class="form-label">Jenis Kelamin</label>
                                                    </div>
                                                    <div class="mb-3 form-check-inline">
                                                        <input type="radio" class="form-check-input" id="jk1">
                                                        <label class="form-check-label text-dark" for="jk1" <?php if ($jenis_kelamin == 1) {
                                                                                                                echo 'selected';
                                                                                                            } ?>>
                                                            Laki-laki
                                                        </label>
                                                    </div>
                                                    <div class="mb-3 form-check-inline">
                                                        <input type="radio" class="form-check-input" id="jk-2" <?php if ($jenis_kelamin == 2) {
                                                                                                                    echo 'selected';
                                                                                                                } ?>>
                                                        <label class="form-check-label text-dark" for="jk-2">Perempuan</label>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="hobi" class="form-label">Hobi</label>
                                                        <input type="text" name="hobi" class="form-control form-control-sm" id="hobi" placeholder="Hobi" value="<?= $hobi ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                                        <input type="text" name="pekerjaan" class="form-control form-control-sm" id="pekerjaan" placeholder="Pekerjaan" value="<?= $pekerjaan ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="deskripsikan diri anda" class="form-label">Deskripsikan diri anda</label>
                                                        <textarea name="deskripsi-diri" id="" class="form-control" placeholder="Tuliskan tentang diri anda"><?= $deskripsi_diri ?></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="kriteria" class="form-label">Kriteria pasangan</label>
                                                        <textarea name="deskripsi-diri" id="" class="form-control" placeholder="Tuliskan kriteria pasangan anda"><?= $kriteria_pasangan ?></textarea>
                                                    </div>
                                                    <!-- <div class="input-group mb-3">
                                                        <span class="input-group-text" id="email">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                                        <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email">
                                                    </div> -->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="phone">
                                                            <i class="fa fa-phone"></i>
                                                        </span>
                                                        <input type="phone" name="phone" class="form-control" placeholder="phone" aria-label="phone" aria-describedby="phone" value="<?= $phone ?>">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="fb">
                                                            <i class="fas fa-facebook"></i>
                                                        </span>
                                                        <input type="fb" name="fb" class="form-control" placeholder="fb" aria-label="fb" aria-describedby="fb" value="<?= $fb ?>">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="ig">
                                                            <i class="fa fa-instagram"></i>
                                                        </span>
                                                        <input type="ig" name="ig" class="form-control" placeholder="ig" aria-label="ig" aria-describedby="ig" value="<?= $ig ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                <p>Provinsi :</p>
		<select name="prov" class="form-control" id="provinsi">
			<option>- Select Provinsi -</option>
			<?php 
				foreach($provinsi as $prov)
				{
					echo '<option value="'.$prov->id.'">'.$prov->nama.'</option>';
				}
			?>
		</select>
		<p>Kabupaten :</p>
		<select name="kab" class="form-control" id="kabupaten">
			<option value=''>Select Kabupaten</option>
		</select>
		<p>Kecamatan :</p>
		<select name="kec" class="form-control" id="kecamatan">
			<option>Select Kecamatan</option>
		</select>
		<p>Desa :</p>
		<select name="des" class="form-control" id="desa">
			<option>Select Desa</option>
		</select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
                <footer class="row bg-light py-4 mt-auto">
                    <div class="col"> Footer content here... </div>
                </footer>
            </div>
        </div>
    </div>
</div>
<!-- Mobile -->
<div class="d-lg-none">
    <div class="container">
        <div class="row py-5">
            <form action="<?= base_url('profile_user/update') ?>" method="post" enctype="multipart/form-data">
                <div class="col-lg-12">
                    <div class="card card-all">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 text-center">
                                        <img src="<?= base_url('assets/admin/img/user.png') ?>" class="items-center my-auto" alt="..." class="img-thumbnail" width="80" height="80">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" name="nama" class="form-control form-control-sm" id="nama" placeholder="Masukkan nama lengkap" value="<?= $nama ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tgl_lahir" class="form-label">Tgl Lahir</label>
                                        <input type="date" name="tgl_lahir" class="form-control form-control-sm" id="tgl_lahir" placeholder="" value="<?= $tgl_lahir ?>">
                                    </div>
                                    <div class="">
                                        <label for="nama" class="form-label">Jenis Kelamin</label>
                                    </div>
                                    <div class="mb-3 form-check-inline">
                                        <input type="radio" class="form-check-input" id="jk1">
                                        <label class="form-check-label text-dark" for="jk1" <?php if ($jenis_kelamin == 1) {
                                                                                                echo 'selected';
                                                                                            } ?>>
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="mb-3 form-check-inline">
                                        <input type="radio" class="form-check-input" id="jk-2" <?php if ($jenis_kelamin == 2) {
                                                                                                    echo 'selected';
                                                                                                } ?>>
                                        <label class="form-check-label text-dark" for="jk-2">Perempuan</label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="hobi" class="form-label">Hobi</label>
                                        <input type="text" name="hobi" class="form-control form-control-sm" id="hobi" placeholder="Hobi" value="<?= $hobi ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                        <input type="text" name="pekerjaan" class="form-control form-control-sm" id="pekerjaan" placeholder="Pekerjaan" value="<?= $pekerjaan ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsikan diri anda" class="form-label">Deskripsikan diri anda</label>
                                        <textarea name="deskripsi-diri" id="" class="form-control" placeholder="Tuliskan tentang diri anda"><?= $deskripsi_diri ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kriteria" class="form-label">Kriteria pasangan</label>
                                        <textarea name="deskripsi-diri" id="" class="form-control" placeholder="Tuliskan kriteria pasangan anda"><?= $kriteria_pasangan ?></textarea>
                                    </div>
                                    <!-- <div class="input-group mb-3">
                                                        <span class="input-group-text" id="email">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                                        <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email">
                                                    </div> -->
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="phone">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                        <input type="phone" name="phone" class="form-control" placeholder="phone" aria-label="phone" aria-describedby="phone" value="<?= $phone ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="fb">
                                            <i class="fas fa-facebook"></i>
                                        </span>
                                        <input type="fb" name="fb" class="form-control" placeholder="fb" aria-label="fb" aria-describedby="fb" value="<?= $fb ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="ig">
                                            <i class="fa fa-instagram"></i>
                                        </span>
                                        <input type="ig" name="ig" class="form-control" placeholder="ig" aria-label="ig" aria-describedby="ig" value="<?= $ig ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <h1>Data Seluruh wilayah di indonesia</h1>
		
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>