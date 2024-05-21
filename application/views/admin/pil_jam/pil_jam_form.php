<div class="container-fluid pt-3 px-4 ">
    <div class="row mb-2">
        <div class="col-12 mb-2">
            <h2 style="margin-top:0px">Jam <?php echo $button ?></h2>
        </div>
    </div>
    <form action="<?php echo $action; ?>" method="post">
    <div class="row pt-3 bg-light">
            <div class="col-md-12 col-lg-6 p-3">
                <div class="form-group mb-3">
                    <label for="jam_mulai">Jam Mulai <?php echo form_error('jam_mulai') ?></label>
                    <input type="time" class="form-control" rows="3" name="jam_mulai" id="jam_mulai" placeholder="Jam Mulai" value="<?php echo $jam_mulai; ?>">
                </div>
            </div>
            <div class="col-md-12 col-lg-6 p-3">
                <div class="form-group mb-3">
                    <label for="jam_selesai">Jam Selesai <?php echo form_error('jam_selesai') ?></label>
                    <input type="time" class="form-control" rows="3" name="jam_selesai" id="jam_selesai" placeholder="Jam Selesai" value="<?php echo $jam_selesai; ?>">
                </div>
            </div>
        <div class="col-md-12 col-lg-12 p-3">
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('pil_jam_admin') ?>" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</form>
</div>