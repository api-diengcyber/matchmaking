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
        <h2 style="margin-top:0px">Biodata Read</h2>
        <table class="table">
	    <tr><td>Id User</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Tgl Lahir</td><td><?php echo $tgl_lahir; ?></td></tr>
	    <tr><td>Hobi</td><td><?php echo $hobi; ?></td></tr>
	    <tr><td>Pekerjaan</td><td><?php echo $pekerjaan; ?></td></tr>
	    <tr><td>Deskripsi Diri</td><td><?php echo $deskripsi_diri; ?></td></tr>
	    <tr><td>Kriteria Pasangan</td><td><?php echo $kriteria_pasangan; ?></td></tr>
	    <tr><td>Ig</td><td><?php echo $ig; ?></td></tr>
	    <tr><td>Fb</td><td><?php echo $fb; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
	    <tr><td>Tgl Register</td><td><?php echo $tgl_register; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('biodata_admin') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>