
<div class="container-fluid pt-3 px-4 ">
    <div class="row mb-2">
        <div class="col-12 mb-2">
            <h2 style="margin-top:0px">Request Read</h2>
        </div>
    </div>
    <div class="row py-4">


        <div class="col-md-6">
            <div class="card p-2 border-primary bg-light">
                <div class="row">
                    <div class="col-12 d-flex justfy-content-center py-4">
                        <img class="rounded-circle" src="<?= base_url('assets/admin/img/user.png') ?>" alt="" style="width: 80px; height: 80px;margin-left: auto;
                        margin-right: auto;">
                                            <!-- <?php
if ($foto_user1 = null) {
?> -->
                                                    <!-- <img class="rounded-circle" src="<?= base_url('assets/admin/img/user.png') ?>" alt="" style="width: 40px; height: 40px;"> -->
                                                    <!-- <?php
} else {
?> -->
    
                                                    <!-- <img class="rounded-circle" src="<?= base_url('assets/user/upload/img/' . $foto_user1) ?>" alt="" style="width: 40px; height: 40px;"> -->
                                                <!-- <?php
}
?> -->
    
                    </div>
                    <div class="col-12">
                        <h4 class="text-center">
                            <?= $nama_user1 ?>
                        </h4>
                        <p class="text-center">
                            <?php
                                if ($jenis_kelamin_user1 == 1) {
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
                                <td><?= date('d-m-Y', strtotime($tgl_lahir_user1)) ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?= $alamat_user1 ?></td>
                            </tr>
                            <tr>
                                <td>Hobi</td>
                                <td><?= $hobi_user1 ?></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td><?= $pekerjaan_user1 ?></td>
                            </tr>
                            <tr>
                                <td>Profil</td>
                                <td><?= $deskripsi_diri_user1 ?></td>
                            </tr>
                            <tr>
                                <td>Kriteria</td>
                                <td><?= $kriteria_pasangan_user1 ?></td>
                            </tr>
                            <tr>
                                <td>Instagram</td>
                                <td><?= $ig_user1 ?></td>
                            </tr>
                            <tr>
                                <td>Facebook</td>
                                <td><?= $fb_user1 ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-2 border-primary bg-light">
                <div class="row">
                    <div class="col-12 d-flex justfy-content-center py-4">
                        <img class="rounded-circle" src="<?= base_url('assets/admin/img/user.png') ?>" alt="" style="width: 80px; height: 80px;margin-left: auto;
                        margin-right: auto;">
                                            <!-- <?php
if ($foto_user2 = null) {
?> -->
                                                    <!-- <img class="rounded-circle" src="<?= base_url('assets/admin/img/user.png') ?>" alt="" style="width: 40px; height: 40px;"> -->
                                                    <!-- <?php
} else {
?> -->
    
                                                    <!-- <img class="rounded-circle" src="<?= base_url('assets/user/upload/img/' . $foto_user2) ?>" alt="" style="width: 40px; height: 40px;"> -->
                                                <!-- <?php
}
?> -->
    
                    </div>
                    <div class="col-12">
                        <h4 class="text-center">
                            <?= $nama_user2 ?>
                        </h4>
                        <p class="text-center">
                            <?php
                                if ($jenis_kelamin_user2 == 1) {
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
                                <td><?= date('d-m-Y', strtotime($tgl_lahir_user2)) ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?= $alamat_user2 ?></td>
                            </tr>
                            <tr>
                                <td>Hobi</td>
                                <td><?= $hobi_user2 ?></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td><?= $pekerjaan_user2 ?></td>
                            </tr>
                            <tr>
                                <td>Profil</td>
                                <td><?= $deskripsi_diri_user2 ?></td>
                            </tr>
                            <tr>
                                <td>Kriteria</td>
                                <td><?= $kriteria_pasangan_user2 ?></td>
                            </tr>
                            <tr>
                                <td>Instagram</td>
                                <td><?= $ig_user2 ?></td>
                            </tr>
                            <tr>
                                <td>Facebook</td>
                                <td><?= $fb_user2 ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 pt-4">
        <a href="<?php echo site_url('request_admin') ?>" class="btn btn-light">Cancel</a>
        <?php if ($status == 0) { ?>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#konfirmasi<?= $id_request ?>">
                            <i class="fa fa-check"></i> Konfirmasi
                            </button>
                            <!-- Modal Konfirmasi -->
                            <div class="modal fade" id="konfirmasi<?= $id_request ?>" tabindex="-1" aria-labelledby="konfirmasi<?= $id_request ?>Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="konfirmasi<?= $id_request ?>Label">Konfirmasi Request</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5>Jadwal</h5>
                                            </div>
                                            <div class="col-12">
                                                <form action="<?= base_url('request_admin/confirm') ?>" method="POST" id="form-confirm">
                                                    <input type="hidden" name="id_request" id="" value="<?= $id_request ?>">
                                                    <div class="form-group mb-3">
                                                        <label for="">Tgl</label>
                                                        <input type="date" name="tgl" id="" class="form-control" placeholder="Masukkan Tanggal" >
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Link Zoom</label>
                                                        <input type="text" name="link_zoom" id="" class="form-control" placeholder="Masukkan link zoom">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Jam</label>
                                                        <select name="jam" id="" class="form-select">
                                                            <option value="">--Pilih Jam--</option>
                                                            <?php
                                                            foreach ($jam as $j) {
                                                                ?>
                                                                    <option value="<?= $j->id ?>"><?= $j->jam_mulai . ' - ' . $j->jam_selesai ?></option>
                                                                    <?php
                                                            }
                                                                                                                            ?>
                                                        </select>
                                                    </div>
                                                    <!-- <div class="form-group mb-3">
                                                        <label for="">Waktu</label>
                                                        <div class="input-group mb-3">
                                                            <input type="number" name="waktu" class="form-control" placeholder="Waktu" aria-label="Waktu" aria-describedby="basic-addon2" max="40" min="0" value="0">
                                                            <span class="input-group-text" id="basic-addon2">Menit</span>
                                                        </div>
                                                    </div> -->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="konfirmasi-btn">Konfirm</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            <!-- End Modal Konfirmasi -->
                            <?php
} elseif ($status == 1) {
    echo '<p class="badge bg-primary">Dikonfirmasi</p>';
} else {
    echo 'Selesai';
}
?>
                           
        </div>

     
      
</div>
</div>