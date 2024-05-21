<div class="container-fluid pt-3 px-4 ">
    <div class="row mb-2">
        <div class="col-12 mb-2">
            <h2 style="margin-top:0px">Jadwal <?php echo $button ?></h2>
        </div>
    </div>
    <div class="row py-4 bg-light">
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group mb-3">
                <label for="int">Request <?php echo form_error('id_request') ?></label>
                <div class="input-group mb-3">
                    <?php if ($request_pilih != null) { ?>
                        <input type="hidden" name="id_request" id="" value="<?= $request_pilih ?>">
                <input type="text" class="form-control" placeholder="User" value="<?= $nama_user1 ?>" aria-label="User" >
                <span class="input-group-text" id="basic-addon1">  <i class="fas fa-arrows-alt-h fa-2xl text-primary "></i></span>
                <input type="text" class="form-control" placeholder="User" value="<?= $nama_user2 ?>" aria-label="User" >
                </div>
                <?php } else { ?>


                <select name="id_request" id="" class="form-select" required>
                    <option value="" selected disabled>--Pilih Request--</option>
                    <?php

                    foreach ($request as $r) {
                    ?>

                    <option value="<?= $r->idRequest ?>"><?php echo $r->nama_user1 ?>
                                &
                                <?php echo $r->nama_user2 ?></option>
                    <?php
                    }

                                    ?>


                </select>
                <?php } ?>
            </div>
            <div class="form-group mb-3">
                <label for="link_zoom">Link Zoom <?php echo form_error('link_zoom') ?></label>
                <input type="text" class="form-control" rows="3" name="link_zoom" id="link_zoom" placeholder="Link Zoom" value="<?php echo $link_zoom; ?>">
            </div>
            <div class="form-group mb-3">
                <label for="date">Tgl Meeting <?php echo form_error('tgl_meeting') ?></label>
                <input type="date" class="form-control" name="tgl_meeting" id="tgl_meeting" placeholder="Tgl Meeting" value="<?php echo $tgl_meeting; ?>" />
            </div>
            <div class="form-group mb-3">
                <label for="int">jam <?php echo form_error('jam') ?></label>
                <?= $jam_pilih ?>
                <select name="jam" id="" class="form-select" required>
                    <option value="" selected disabled>--Pilih Jam--</option>
                    <?php
                        if ($jam_pilih == null) {
                            foreach ($jam as $j) {
                    ?>

                    <option value="<?= $j->id ?>"><?php echo $j->jam_mulai ?>
                                -
                                <?php echo $j->jam_selesai ?></option>
                    <?php
                            }
                        } else {
                            foreach ($jam as $j) {
                                            ?>
        
                            <option value="<?= $j->id ?> " <?php if ($j->id == $jam_pilih) { echo 'selected'; } ?>><?php echo $j->jam_mulai ?>
                                        -
                                        <?php echo $j->jam_selesai ?></option>
                            <?php
                            }
                        }
                                                    ?>


                </select>
            </div>
            <!-- <div class="form-group mb-2">
                <label for="int">Waktu <?php echo form_error('waktu') ?></label>
                <input type="text" class="form-control" name="waktu" id="waktu" placeholder="Waktu" value="<?php echo $waktu; ?>" />
            </div> -->
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('jadwal_admin') ?>" class="btn btn-default">Cancel</a>
        </form>
    </div>
</div>