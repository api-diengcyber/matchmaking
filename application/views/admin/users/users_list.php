<div class="container-fluid pt-3 px-4 ">
    <div class="row mb-2">
        <div class="col-12 mb-2">
            <h2>Users List</h2>
        </div>
    </div>
    <div class="row bg-light py-4">
        <div class="col-md-4">
            <!-- <?php echo anchor(site_url('users_admin/create'), 'Create', 'class="btn btn-primary"'); ?> -->
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 8px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-12">
            <!-- <form action="<?= base_url('users_admin/index') ?>" method="post" class="row gx-3 gy-2 align-items-center">
                <div class="col-sm-3">
                    <select name="sort" id="" class="form-select" onchange="this.form.submit();">
                        <option value="desc" <?php if($sort=='desc'){echo "selected";}?>>Terbaru</option>
                        <option value="asc" <?php if($sort=='asc'){echo "selected";}?>>Terlama</option>
                    </select>                                                        
                </div>
                <div class="col-sm-3">
                    <select name="status" id="" class="form-select" onchange="this.form.submit();">
                        <option value="" <?php if($status==''){echo "selected";}?>>Semua</option>
                        <option value="1" <?php if($status=='1'){echo "selected";}?>>Menunggu Konfirmasi Teman</option>
                        <option value="8" <?php if($status=='8'){echo "selected";}?>>Dibatalkan</option>
                        <option value="2" <?php if($status=='2'){echo "selected";}?>>Diterima, Menuggu Room</option>
                        <option value="3" <?php if($status=='3'){echo "selected";}?>>Ditolak</option>
                        <option value="4" <?php if($status=='4'){echo "selected";}?>>Room Aktif</option>
                        <option value="5" <?php if($status=='5'){echo "selected";}?>>Room Selesai</option>
                        <option value="6" <?php if($status=='6'){echo "selected";}?>>Room Ditolak</option>
                        <option value="7" <?php if($status=='7'){echo "selected";}?>>Expired</option>
                    </select>                                                        
                </div>
            </form> -->
        </div>
        <div class="col-12 pt-4">
            <div class="table-responsive">
                <table class="table table-bordered bg-white w-100" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tgl Lahir</th>
                            <th>Email</th>                           
                                                  
                            <th>Tgl Register</th>                           
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($users_data as $u) {
                            ?>

                            <tr>
                                <td width="80px"><?php echo $no++ ?></td>
                                <td><?=$u->nama ?></td>
                                <td><?php
                                    if($u->jenis_kelamin==1){
                                        echo 'Laki-laki';
                                    }elseif($u->jenis_kelamin== 2){
                                        echo 'Perempuan';
                                    }else{
                                        echo '-';                                        
                                    }
                                ?></td>
                                <td><?= date('d-m-Y', strtotime($u->tgl_lahir)) ?></td>
                                <td><?=$u->email ?></td>
                               
                                <td><?= date('d-m-Y', strtotime($u->tgl_register)) ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('users_admin/read/' . $u->id_user) ?>" class="btn btn-success btn-sm">
                                        <i class="fa fa-info-circle"></i>
                                    </a>
                                    <!-- <a href="<?= base_url('users_admin/update/' . $u->id_user) ?>" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pen"></i>
                                    </a> -->
                                    <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal"
                                            data-bs-target="#hapus<?= $u->id_user ?>">
                                        <i class="fa fa-trash"></i>

                                    </button>
                                    <!-- Modal hapus -->
                                    <div class="modal fade" id="hapus<?= $u->id_user ?>" tabindex="-1"
                                            aria-labelledby="hapus<?= $u->id_user ?>Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="hapus<?= $u->id_user ?>Label">hapus Request</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h5 class="text-danger text-center">Yakin Hapus User?</h5>
                                                            </div>
    
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('users_admin/delete/' . $u->id_user) ?>"
                                                            class="btn btn-primary" id="konfirmasi-btn">Ya</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal hapus -->   
                                </td>

                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
</div>
</div>