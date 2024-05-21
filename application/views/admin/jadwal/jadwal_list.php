<div class="container-fluid pt-3 px-4 ">
    <div class="row mb-2">
        <div class="col-12 mb-2">
            <h2>Jadwal List</h2>
        </div>
    </div>
    <div class="row py-4 bg-light">
            <div class="col-md-4 py-2 mb-3">
                <?php echo anchor(site_url('jadwal_admin/create'), 'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">               
            </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered bg-white" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Request</th>
                            <th>Tgl/Jam Meeting</th>
                            <th>Waktu</th>
                            <th>Link Zoom</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        foreach ($jadwal_admin_data as $jadwal_admin) {
                    ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td>
                                <?php echo $jadwal_admin->nama_user1 ?>
                                <i class="fas fa-arrows-alt-h fa-2xl text-primary "></i>
                                <?php echo $jadwal_admin->nama_user2 ?>
                        
                            </td>
                            <td>
                                <?= date('d-m-Y', strtotime($jadwal_admin->tgl_meeting)) ?>
                                /
                                <?= $jadwal_admin->jmm ?>
                                -
                                <?= $jadwal_admin->jms ?>
                            </td>
                            <td><?php echo $jadwal_admin->waktu ?> Menit</td>
                            <td><?php echo $jadwal_admin->link_zoom ?></td>
                           
                            <td class="text-center">
                                <?php
                                if ($jadwal_admin->status == 0) {
                                    echo '<p class="badge bg-danger">Menunggu..</p>';
                                } elseif ($jadwal_admin->status == 1) {
                                    echo '<p class="badge bg-primary">Dikonfirmasi</p>';
                                } elseif ($jadwal_admin->status == 2) {
                                    echo '<p class="badge bg-primary">Meet Sedang Berlangsung</p>';
                                } else {
                                    echo '<p class="badge bg-success">Selesai</p>';
                                }

                                                        ?>
                            </td>
                          
                            <td style="text-align:center" width="200px">
                                <a href="<?= site_url('jadwal_admin/read/' . $jadwal_admin->id) ?>" class="btn btn-success btn-sm">
                                    <i class="fa fa-info"></i>
                                </a>
                                <a href="<?= site_url('jadwal_admin/update/' . $jadwal_admin->id) ?>" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?= $jadwal_admin->id ?>">
                                <i class="fa fa-trash"></i> 
                                </button>
                                <!-- Modal hapus -->
                                <div class="modal fade" id="hapus<?= $jadwal_admin->id ?>" tabindex="-1" aria-labelledby="hapus<?= $jadwal_admin->id ?>Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapus<?= $jadwal_admin->id ?>Label">Hapus Jadwal</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5 class="text-danger">Yakin Hapus Jadwal?</h5>
                                                    <p class="text-primary">(Jika anda menghapus jadwal ini, maka request dengan jadwal terkait akan ikut terhapus)</p>
                                                </div>
                                            
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a href="<?= base_url('jadwal_admin/delete/' . $jadwal_admin->id) ?>" class="btn btn-primary" id="konfirmasi-btn">Ya</a>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                <!-- End Modal hapus -->
                                <?php
                                if ($jadwal_admin->status == 2) {
                                    ?>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#selesai<?= $jadwal_admin->id ?>">
                                        <i class="fa fa-check"></i> Selesai
                                        </button>
                                        <!-- Modal selesai -->
                                       
                                        <div class="modal fade" id="selesai<?= $jadwal_admin->id ?>" tabindex="-1" aria-labelledby="selesai<?= $jadwal_admin->id ?>Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="selesai<?= $jadwal_admin->id ?>Label">Selesai Meet?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12 px-2">
                                                            <h5 class="text-danger text-center">Tutup Jadwal Meet??</h5>
                                                        </div>
                                                      
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="<?= site_url('jadwal_admin/finish/' . $jadwal_admin->id) ?>" class="btn btn-primary" id="selesai-btn">YA</a>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        <!-- End Modal selesai -->
                                        <?php
                                }
                                                                    ?>

                               
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

