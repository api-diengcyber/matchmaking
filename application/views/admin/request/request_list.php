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
        <div class="col-12">
            <form action="<?= base_url('request_admin/index') ?>" method="post" class="row gx-3 gy-2 align-items-center">
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
            </form>
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
                                        echo '<span class="badge py-2 bg-warning text-dark">Menunggu User 2 <i class="fas fa-spinner text-info"></i></span>';
                                    } elseif ($request_admin->status == 2) {
                                        echo '<span class="badge py-2 bg-warning text-dark">Dikonfirmasi User 2 <i class="fas fa-user-check text-success"></i></span>';
                                    } elseif ($request_admin->status == 3) {
                                        echo '<span class="badge py-2 bg-danger">Ditolak User 2 <i class="fas fa-user-times "></i></span>';
                                    } elseif ($request_admin->status == 4) {
                                        echo '<span class="badge py-2 bg-primary">Room dibuat <i class="fas fa-restroom"></i></span>';

                                    } elseif ($request_admin->status == 5) {
                                        echo '<span class="badge py-2 bg-success">Room Selesai <i class="fas fa-check"></i></span>';

                                    } elseif ($request_admin->status == 6) {
                                        echo '<span class="badge py-2 bg-danger">Request room ditolak <i class="fas fa-times-circle"></i></span>';
                                   
                                    } elseif ($request_admin->status == 7) {
                                        echo '<span class="badge py-2 bg-danger">Request Expired <i class="fas fa-clock"></i></span>';
                                    } elseif ($request_admin->status == 8) {
                                        echo '<span class="badge py-2 bg-danger">Request Dibatalkan <i class="fas fa-ban"></i></span>';                                    
                                    } else {
                                        
                                    }

                                    ?>
                                </td>
                                <td><?php echo $request_admin->tgl_update ?></td>
                                <td class="d-flex justify-content-between">
                                    <?php
                                    if ($request_admin->status == 2) { ?>
                                     <div class="btn-group me-2" role="group" aria-label="Basic example">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#buatRoom<?=$request_admin->id_request?>">
                                            <i class="fa fa-check"></i>
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
                                                                            <label for="">Link Google meet</label>
                                                                            <a href="https://meet.google.com/?hs=193&hl=id&pli=1" target="_blank"> Buat Link</a>
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
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#tolakRequest<?=$request_admin->id_request?>">
                                            <i class="far fa-times-circle"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="tolakRequest<?=$request_admin->id_request?>" tabindex="-1"
                                            aria-labelledby="tolakRequest<?=$request_admin->id_request?>Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="tolakRequest<?=$request_admin->id_request?>Label">Tolak Request Room</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                   
                                                                    <h5 class="text-center text-danger">Yakin tolak request room?</h5>                                                                 
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                            <a href="<?= base_url('request_admin/update_status/' . $request_admin->id_request) ?>"
                                                        class="btn btn-primary" id="konfirmasi-btn">Ya</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <?php

                                    } elseif ($request_admin->status == 4) {?>
                                    <div class="btn-group me-2" role="group">
                                        <button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal"
                                            data-bs-target="#updateRoom<?=$request_admin->id_request?>">
                                            <i class="fas fa-pen-square"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="updateRoom<?=$request_admin->id_request?>" tabindex="-1"
                                            aria-labelledby="updateRoom<?=$request_admin->id_request?>Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <form action="<?= base_url('request_admin/update_request')?>" method="post">
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
                                                                            <label for="">Link Google meet</label>
                                                                            <a href="https://meet.google.com/?hs=193&hl=id&pli=1" target="_blank"> Buat Link Baru</a>
                                                                            <input type="text" name="link_zoom" id="" class="form-control" required value="<?=$request_admin->link_zoom?>">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="">Jam</label>
                                                                            <select name="jam" id="" class="form-select" required>
                                                                                <option value="">--Pilih--</option>
                                                                                <?php foreach($jam as $j){?>
                                                                                    <option value="<?=$j->id?>" <?php if($request_admin->id_jam==$j->id){echo "selected";}?>><?=$j->jam_mulai?> - <?=$j->jam_selesai?></option>
                                                                                    <?php }?>
                                                                            </select>
                                                                        </div>                                                                  
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <?php
                                       
                                    } elseif ($request_admin->status == 3) {?>
                                    
                                    <div class="btn-group me-2" role="group" aria-label="Basic example"></div>
                                    <?php
                                    } elseif ($request_admin->status == 4) {?>
                                    
                                        <div class="btn-group me-2" role="group" aria-label="Basic example"></div>
                                        <?php

                                    } elseif ($request_admin->status == 4) {?>
                                    
                                        <div class="btn-group me-2" role="group" aria-label="Basic example"></div>
                                        <?php

                                    } elseif ($request_admin->status == 5) {?>
                                    
                                        <div class="btn-group me-2" role="group" aria-label="Basic example"></div>
                                        <?php
                                    } elseif ($request_admin->status == 6) {?>
                                    
                                        <div class="btn-group me-2" role="group" aria-label="Basic example"></div>
                                        <?php
                                    } elseif ($request_admin->status == 7) {?>
                                    
                                        <div class="btn-group me-2" role="group" aria-label="Basic example"></div>
                                        <?php
                                    } elseif ($request_admin->status == 7) {
                                        ?>
                                    
                                        <div class="btn-group me-2" role="group" aria-label="Basic example"></div>
                                        <?php
                                    } else {
                                        ?>
                                    
                                        <div class="btn-group me-2" role="group" aria-label="Basic example"></div>
                                        <?php
                                        
                                    }

                                    ?>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="<?= base_url('request_admin/read/' . $request_admin->id_request) ?>"
                                            class="btn btn-success btn-sm">
                                            <i class="fas fa-info-circle"></i>
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
                                                                <h5 class="text-danger text-center">Yakin Hapus Request?</h5>
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
                                    </div>




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
                                                                        <label for="">Link Google meet</label>
                                                                        <input type="text" name="link_zoom" id=""
                                                                            class="form-control"
                                                                            placeholder="Masukkan Link Google meet">
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