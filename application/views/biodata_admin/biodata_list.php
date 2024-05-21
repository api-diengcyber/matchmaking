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
        <h2 style="margin-top:0px">Biodata List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('biodata_admin/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('biodata_admin/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('biodata_admin'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id User</th>
		<th>Nama</th>
		<th>Tgl Lahir</th>
		<th>Hobi</th>
		<th>Pekerjaan</th>
		<th>Deskripsi Diri</th>
		<th>Kriteria Pasangan</th>
		<th>Ig</th>
		<th>Fb</th>
		<th>Jenis Kelamin</th>
		<th>Foto</th>
		<th>Tgl Register</th>
		<th>Action</th>
            </tr><?php
            foreach ($biodata_admin_data as $biodata_admin)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $biodata_admin->id_user ?></td>
			<td><?php echo $biodata_admin->nama ?></td>
			<td><?php echo $biodata_admin->tgl_lahir ?></td>
			<td><?php echo $biodata_admin->hobi ?></td>
			<td><?php echo $biodata_admin->pekerjaan ?></td>
			<td><?php echo $biodata_admin->deskripsi_diri ?></td>
			<td><?php echo $biodata_admin->kriteria_pasangan ?></td>
			<td><?php echo $biodata_admin->ig ?></td>
			<td><?php echo $biodata_admin->fb ?></td>
			<td><?php echo $biodata_admin->jenis_kelamin ?></td>
			<td><?php echo $biodata_admin->foto ?></td>
			<td><?php echo $biodata_admin->tgl_register ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('biodata_admin/read/'.$biodata_admin->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('biodata_admin/update/'.$biodata_admin->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('biodata_admin/delete/'.$biodata_admin->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>