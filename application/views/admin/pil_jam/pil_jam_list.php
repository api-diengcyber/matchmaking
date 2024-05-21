<div class="container-fluid pt-3 px-4 ">
    <div class="row mb-2">
        <div class="col-12 mb-2">
            <h2>Pil Jam List</h2>
        </div>
    </div>
    <div class="row bg-light pt-4 py-4">
        <div class="col-md-4">
            <?php echo anchor(site_url('pil_jam_admin/create'), 'Create', 'class="btn btn-primary"'); ?>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 8px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-1 text-right">
        </div>
        <div class="col-12 pt-4">
            <div class="table-responsive">
                <table class="table table-bordered bg-white" id="myTable">
                    <thead>
                        <tr>
                            <th style="width:10px">No</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($pil_jam_admin_data as $pil_jam_admin) {
                        ?>

                        <tr>
                            <td width="10px!important"><?php echo $no++?></td>
                            <td><?php echo $pil_jam_admin->jam_mulai ?></td>
                            <td><?php echo $pil_jam_admin->jam_selesai ?></td>
                            <td class="text-center">
                                <!-- <a href="<?= base_url('pil_jam_admin/read/' . $pil_jam_admin->id) ?>" class="btn btn-success btn-sm">
                                    <i class="fa fa-info"></i>
                                </a> -->
                                <a href="<?= base_url('pil_jam_admin/update/' . $pil_jam_admin->id) ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?= $pil_jam_admin->id ?>">
                                <i class="fa fa-trash"></i> 
                                </button>
                                <!-- Modal hapus -->
                                <div class="modal fade" id="hapus<?= $pil_jam_admin->id ?>" tabindex="-1" aria-labelledby="hapus<?= $pil_jam_admin->id ?>Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapus<?= $pil_jam_admin->id ?>Label">Hapus Jam</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5 class="text-danger">Yakin Hapus Jam?</h5>
                                                </div>
                                            
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a href="<?= base_url('pil_jam_admin/delete/' . $pil_jam_admin->id) ?>" class="btn btn-primary" id="konfirmasi-btn">Ya</a>
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
       
       