<div class="container-fluid pt-3 px-4 ">
    <div class="row mb-2">
        <div class="col-12 mb-2">
            <h2>Saldo User</h2>
        </div>
    </div>
    <div class="row bg-light py-4">
        <div class="col-md-4">
            <!-- <?php echo anchor(site_url('request_admin/create'), 'Create', 'class="btn btn-primary"'); ?> -->
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 8px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-12">
            <form action="<?= base_url('request_admin/index') ?>" method="post"
                class="row gx-3 gy-2 align-items-center">
                <div class="col-sm-3">
                    <!-- <select name="sort" id="" class="form-select" onchange="this.form.submit();">
                        <option value="desc" <?php if ($sort == 'desc') {
                            echo "selected";
                        } ?>>Terbaru</option>
                        <option value="asc" <?php if ($sort == 'asc') {
                            echo "selected";
                        } ?>>Terlama</option>
                    </select> -->
                </div>
                <div class="col-sm-3">
                    <!-- <select name="status" id="" class="form-select" onchange="this.form.submit();">
                        <option value="" <?php if ($status == '') {
                            echo "selected";
                        } ?>>Semua</option>
                        <option value="1" <?php if ($status == '1') {
                            echo "selected";
                        } ?>>Menunggu Konfirmasi Teman</option>
                        <option value="8" <?php if ($status == '8') {
                            echo "selected";
                        } ?>>Dibatalkan</option>
                        <option value="2" <?php if ($status == '2') {
                            echo "selected";
                        } ?>>Diterima, Menuggu Room</option>
                        <option value="3" <?php if ($status == '3') {
                            echo "selected";
                        } ?>>Ditolak</option>
                        <option value="4" <?php if ($status == '4') {
                            echo "selected";
                        } ?>>Room Aktif</option>
                        <option value="5" <?php if ($status == '5') {
                            echo "selected";
                        } ?>>Room Selesai</option>
                        <option value="6" <?php if ($status == '6') {
                            echo "selected";
                        } ?>>Room Ditolak</option>
                        <option value="7" <?php if ($status == '7') {
                            echo "selected";
                        } ?>>Expired</option>
                    </select> -->
                </div>
            </form>
        </div>
        <div class="col-12 pt-2">
            <div class="table-responsive">
                    <table class="table table-bordered bg-white w-100" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id User</th>
                                <th>Nominal</th>
                                <th>Jenis</th>
                                <th>Keterangan</th>
                                <th>Saldo</th>
                                <th>Tgl Update</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            foreach ($saldo as $s) {
                                ?>
                                <tr>
                                    <td ><?php echo $no++ ?></td>
                                    <td><?php echo $s->nama_user?></td>
                                    <td><?php echo $s->nominal ?></td>
                                    <td><?php echo $s->jenis ?></td>
                                    <td><?php echo $s->keterangan ?></td>
                                    <td><?php echo number_format($s->saldo) ?></td>
                                    <td><?php echo $s->tgl_update ?></td>
                                    <td class="text-center">
                                        <?php if($s->status=='belum-validasi'){?>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#validasi<?= $s->id ?>">Validasi <i class="fas fa-check"></i>
                                        </button>

                                         <!-- Modal validasi -->
                                        <div class="modal fade" id="validasi<?= $s->id ?>" tabindex="-1"
                                            aria-labelledby="validasi<?= $s->id ?>Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="validasi<?= $s->id ?>Label">Validasi Pembelian</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                               <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="mb-2">
                                                                            <label for="">Bukti Bayar</label>
                                                                            
                                                                        </div>
                                                                        <div class="mb-2">
                                                                        <img src="<?=base_url('assets/user/saldo/'.$s->bukti_bayar)?>" alt="">
                                                                        </div>
                                                                    </div>
                                                               </div>
                                                            </div>    
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                            <a href="<?= base_url('saldo_admin/validasi/' . $s->id) ?>"
                                                            class="btn btn-primary" id="konfirmasi-btn">Validasi</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal validasi -->     


                                        <?php }else{?>
                                            <button type="button" class="btn btn-primary btn-sm disabled" >Ter-Validasi <i class="fas fa-check"></i></button>

                                            <?php }?>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#hapus<?= $s->id ?>"><i class="fas fa-trash"></i>
                                            </button>

                                         <!-- Modal validasi -->
                                        <div class="modal fade" id="hapus<?= $s->id ?>" tabindex="-1"
                                            aria-labelledby="hapus<?= $s->id ?>Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="hapus<?= $s->id ?>Label">Hapus Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                               <div class="row">
                                                                    <h4 class="text-danger">Yakin Hapus Data?</h4>
                                                               </div>
                                                            </div>    
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                            <a href="<?= base_url('saldo_admin/delete/' . $s->id) ?>"
                                                            class="btn btn-primary" id="konfirmasi-btn">Ya</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal validasi -->     
                                       
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