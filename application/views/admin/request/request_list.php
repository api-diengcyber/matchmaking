<div class="container-fluid pt-3 px-4 ">
    <div class="row mb-2">
        <div class="col-12 mb-2">
            <h2>Request List</h2>
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
        <div class="col-md-1 text-right">
        </div>
        <div class="col-md-3 text-right">
        </div>
        <div class="col-12 pt-4">
            <div class="table-responsive">
                <table class="table table-bordered bg-white w-100" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User 1</th>
                            <th>User 2</th>
                            <th class="text-center">Status</th>
                            <th>Tgl Update</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($request_admin_data as $request_admin) {
                            ?>

                            <tr>
                                <td width="80px"><?php echo $no++ ?></td>
                                <td><?php echo $request_admin->nama_user1 ?></td>
                                <td><?php echo $request_admin->nama_user2 ?></td>

                                <td class="text-center">
                                    <?php
                                    if ($request_admin->status == 1) {
                                        echo '<p class="badge bg-danger">Menunggu user 2</p>';
                                    } elseif ($request_admin->status == 2) {
                                        echo '<p class="badge bg-primary">Dikonfirmasi user 2</p>';
                                    } elseif ($request_admin->status == 3) {
                                        echo '<p class="badge bg-primary">Ditolak</p>';
                                    } elseif ($request_admin->status == 4) {
                                        echo '<p class="badge bg-primary">Room dibuat</p>';

                                    } elseif ($request_admin->status == 6) {
                                        echo '<p class="badge bg-primary">Room berlangsung</p>';

                                    } elseif ($request_admin->status == 7) {
                                        echo '<p class="badge bg-primary">Room Selesai</p>';
                                    } else {
                                        echo '<p class="badge bg-success">Room Ditolak</p>';
                                    }

                                    ?>
                                </td>
                                <td><?php echo $request_admin->tgl_update ?></td>
                                <td>
                                    <?php
                                    if ($request_admin->status == 2) { ?>
                                        <!-- <a href="<?= base_url('request_admin/make_room/' . $request_admin->id_request) ?>"
                                            class="btn btn-primary btn-sm">
                                            Buat room
                                        </a> -->
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#buatRoom<?=$request_admin->id_request?>">
                                            Buat Room
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="buatRoom<?=$request_admin->id_request?>" tabindex="-1"
                                            aria-labelledby="buatRoom<?=$request_admin->id_request?>Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <form action="<?= base_url('request_admin/confirm')?>" method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="buatRoom<?=$request_admin->id_request?>Label">Buat Room</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    
                                                                        <input type="hidden" name="id_request" value="<?=$request_admin->id_request?>">
                                                                        <div class="mb-3">
                                                                            <label for="">Tgl Meet</label>
                                                                            <input type="date" name="tgl" id="" class="form-control" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="">Link Zoom</label>
                                                                            <input type="text" name="link_zoom" id="" class="form-control" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="">Jam</label>
                                                                            <select name="jam" id="" class="form-select" required>
                                                                                <option value="">--Pilih--</option>
                                                                                <?php foreach($jam as $j){?>
                                                                                    <option value="<?=$j->id?>"><?=$j->jam_mulai?> - <?=$j->jam_selesai?></option>
                                                                                    <?php }?>
                                                                            </select>
                                                                        </div>                                                                  
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Buat</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    } elseif ($request_admin->status == 4) {?>
                                    
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#updateRoom<?=$request_admin->id_request?>">
                                            Update Room
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="updateRoom<?=$request_admin->id_request?>" tabindex="-1"
                                            aria-labelledby="updateRoom<?=$request_admin->id_request?>Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <form action="<?= base_url('request_admin/update')?>" method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="updateRoom<?=$request_admin->id_request?>Label">Update Room</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    
                                                                        <input type="hidden" name="id_request" value="<?=$request_admin->id_request?>">
                                                                        <div class="mb-3">
                                                                            <label for="">Tgl Meet</label>
                                                                            <input type="date" name="tgl" id="" class="form-control" required value="<?=$request_admin->tgl_meeting?>">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="">Link Zoom</label>
                                                                            <input type="text" name="link_zoom" id="" class="form-control" required value="<?=$request_admin->link_zoom?>">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="">Jam</label>
                                                                            <select name="jam" id="" class="form-select" required>
                                                                                <option value="">--Pilih--</option>
                                                                                <?php foreach($jam as $j){?>
                                                                                    <option value="<?=$j->id?>"><?=$j->jam_mulai?> - <?=$j->jam_selesai?></option>
                                                                                    <?php }?>
                                                                            </select>
                                                                        </div>                                                                  
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Buat</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        echo '<p class="badge bg-primary">Dikonfirmasi user 2</p>';
                                    } elseif ($request_admin->status == 3) {
                                        echo '<p class="badge bg-primary">Ditolak</p>';
                                    } elseif ($request_admin->status == 4) {
                                        echo '<p class="badge bg-primary">Room dibuat</p>';

                                    } elseif ($request_admin->status == 4) {
                                        echo '<p class="badge bg-primary">Room selesai</p>';

                                    } elseif ($request_admin->status == 4) {
                                        echo '<p class="badge bg-primary">Room ditolak</p>';
                                    } else {
                                        echo '<p class="badge bg-success">-</p>';
                                    }

                                    ?>

                                    <a href="<?= base_url('request_admin/read/' . $request_admin->id_request) ?>"
                                        class="btn btn-success btn-sm">
                                        <i class="fa fa-info"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#hapus<?= $request_admin->id_request ?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <!-- Modal hapus -->
                                    <div class="modal fade" id="hapus<?= $request_admin->id_request ?>" tabindex="-1"
                                        aria-labelledby="hapus<?= $request_admin->id_request ?>Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="hapus<?= $request_admin->id_request ?>Label">hapus Request</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 class="text-danger">Yakin Hapus Request?</h5>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="<?= base_url('request_admin/delete/' . $request_admin->id_request) ?>"
                                                        class="btn btn-primary" id="konfirmasi-btn">Ya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal hapus -->




                                    <?php if ($request_admin->status == 0) { ?>

                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#konfirmasi<?= $request_admin->id_request ?>">
                                            <i class="fa fa-check"></i> Konfirmasi
                                        </button>
                                        <!-- Modal Konfirmasi -->
                                        <form action="<?= base_url('request_admin/confirm') ?>" method="POST" id="form-confirm">
                                            <div class="modal fade" id="konfirmasi<?= $request_admin->id_request ?>"
                                                tabindex="-1" aria-labelledby="konfirmasi<?= $request_admin->id_request ?>Label"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="konfirmasi<?= $request_admin->id_request ?>Label">Konfirmasi
                                                                Request</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <h5>Jadwal</h5>
                                                                </div>
                                                                <div class="col-12">

                                                                    <input type="hidden" name="id_request" id=""
                                                                        value="<?= $request_admin->id_request ?>">
                                                                    <div class="form-group mb-3">
                                                                        <label for="">Tgl</label>
                                                                        <input type="date" name="tgl" id="" class="form-control"
                                                                            placeholder="Masukkan Tanggal">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="">Link Zoom</label>
                                                                        <input type="text" name="link_zoom" id=""
                                                                            class="form-control"
                                                                            placeholder="Masukkan link zoom">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="">Jam</label>
                                                                        <select name="jam" id="" class="form-select">
                                                                            <option value="">--Pilih Jam--</option>
                                                                            <?php
                                                                            foreach ($jam as $j) {
                                                                                ?>
                                                                                <option value="<?= $j->id ?>">
                                                                                    <?= $j->jam_mulai . ' - ' . $j->jam_selesai ?>
                                                                                </option>
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

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                id="konfirmasi-btn">Konfirm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Modal Konfirmasi -->


                                    <?php } else {
                                    // echo 'Dikonfirmasi';
                                } ?>

                                </td>
                            </tr>
                        </tbody>
                        <?php
                        }
                        ?>
                </table>
            </div>
        </div>

    </div>
</div>
</div>
</div>