<div class="container-fluid pt-3 px-4 ">
    <div class="row mb-2">
        <div class="col-12 mb-2">
            <h2 style="margin-top:0px">Jadwal Read</h2>
        </div>
    </div>
    <div class="row py-4 bg-light mb-4">
        <div class="col-md-6 p-3">
            <div class="card p-2 border-primary bg-white">
                <div class="row">
                        <div class="col-12 d-flex justfy-content-center py-4">
                            <img class="rounded-circle" src="<?= base_url('assets/admin/img/user.png') ?>" alt="" style="width: 80px; height: 80px;margin-left: auto;
                            margin-right: auto;">
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
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-3">
            <div class="card p-2 border-primary bg-white">
                <div class="row">
                        <div class="col-12 d-flex justfy-content-center py-4">
                            <img class="rounded-circle" src="<?= base_url('assets/admin/img/user.png') ?>" alt="" style="width: 80px; height: 80px;margin-left: auto;
                            margin-right: auto;">
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
                        </div>
                </div>
            </div>
        </div>
        <div class="col-12 pt-2">
            <div class="card p-2 border-primary bg-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4>Jadwal</h4>
                        </div>
                        <div class="col-12">
                            <table class="table">
                                <tr><td>Tgl</td><td><?= date('d-m-Y', strtotime($tgl_meeting)) ?></td></tr>
                                <tr><td>Jam</td><td><?php echo $jam; ?></td></tr>
                                <tr><td>Waktu</td><td><?php echo $waktu; ?> Menit</td></tr>
                                <tr><td>Link Zoom</td><td><?php echo $link_zoom; ?></td></tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 pt-2">
            <a href="<?php echo site_url('jadwal_admin') ?>" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>