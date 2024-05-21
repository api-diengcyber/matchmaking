<div class="container-fluid pt-3 px-4 ">
    <div class="row mb-2">
        <div class="col-12 mb-2">
            <h2>Request <?php echo $button ?></h2>
        </div>
    </div>
    <div class="row bg-light py-4">
       
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group mb-3">
                <label for="int">Pilih Pengguna (Laki-laki) <?php echo form_error('id_user1') ?></label>
                <select name="" id="" class="form-select">
                    <?php
                        if ($lp == null) {
                            ?>
                            <option value="">--Pilih--</option>
                            
                            <?php
                            foreach ($l as $pl) {
                                                    ?>
                            <option value="<?= $pl->id_user ?>"><?= $pl->nama ?></option>

                        <?php
                            }
                        } else {
                            foreach ($l as $pl) {
                                                ?>
                        <option value="<?= $pl->id_user ?>" <?php if ($pl->id_user == $lp) { echo 'selected'; } ?>><?= $pl->nama ?></option>

    <?php
                            }

                            ?>

                        <?php
                        }
                                                ?>
                </select>
                <input type="text" class="form-control" name="id_user1" id="id_user1" placeholder="Id User1" value="<?php echo $id_user1; ?>" />
            </div>
            <div class="form-group mb-3">
                <label for="int">Pilih Pengguna (Perempuan) <?php echo form_error('id_user2') ?></label>
                <input type="text" class="form-control" name="id_user2" id="id_user2" placeholder="Id User2" value="<?php echo $id_user2; ?>" />
            </div>
            <div class="form-group mb-3">
                <label for="int">Status <?php echo form_error('status') ?></label>
                <input type="" class="form-control" name="status" id="status" placeholder="Status" value="Menunggu" />
            </div>
            <!-- <div class="form-group">
                <label for="datetime">Tgl Update <?php echo form_error('tgl_update') ?></label>
                <input type="text" class="form-control" name="tgl_update" id="tgl_update" placeholder="Tgl Update" value="<?php echo $tgl_update; ?>" />
            </div> -->
            <div class="form-group pt-5">
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                <a href="<?php echo site_url('request_admin') ?>" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>