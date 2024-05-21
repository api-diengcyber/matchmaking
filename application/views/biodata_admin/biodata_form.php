<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Biodata <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tgl Lahir <?php echo form_error('tgl_lahir') ?></label>
            <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="hobi">Hobi <?php echo form_error('hobi') ?></label>
            <textarea class="form-control" rows="3" name="hobi" id="hobi" placeholder="Hobi"><?php echo $hobi; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Pekerjaan <?php echo form_error('pekerjaan') ?></label>
            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo $pekerjaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="deskripsi_diri">Deskripsi Diri <?php echo form_error('deskripsi_diri') ?></label>
            <textarea class="form-control" rows="3" name="deskripsi_diri" id="deskripsi_diri" placeholder="Deskripsi Diri"><?php echo $deskripsi_diri; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="kriteria_pasangan">Kriteria Pasangan <?php echo form_error('kriteria_pasangan') ?></label>
            <textarea class="form-control" rows="3" name="kriteria_pasangan" id="kriteria_pasangan" placeholder="Kriteria Pasangan"><?php echo $kriteria_pasangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="ig">Ig <?php echo form_error('ig') ?></label>
            <textarea class="form-control" rows="3" name="ig" id="ig" placeholder="Ig"><?php echo $ig; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="fb">Fb <?php echo form_error('fb') ?></label>
            <textarea class="form-control" rows="3" name="fb" id="fb" placeholder="Fb"><?php echo $fb; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" />
        </div>
	    <div class="form-group">
            <label for="foto">Foto <?php echo form_error('foto') ?></label>
            <textarea class="form-control" rows="3" name="foto" id="foto" placeholder="Foto"><?php echo $foto; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">Tgl Register <?php echo form_error('tgl_register') ?></label>
            <input type="text" class="form-control" name="tgl_register" id="tgl_register" placeholder="Tgl Register" value="<?php echo $tgl_register; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('biodata_admin') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>