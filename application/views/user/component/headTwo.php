<div class="container-fluid fixed-top bg-white">
    <div class="row">
        <div class="col-12 py-3">
            <form action="<?= base_url('users_user/cari') ?>" method="get">
            <div class="input-group input-group-sm">
                    <span class="input-group-text span-profil bg-white border-0">
                    <a href="<?=base_url('dashboard_user')?>" class="text-dark" id="text-name"><i class="fas fa-chevron-left fa-xl"></i></a>
                    <!-- <div class="text" id="text-name" onclick="window.history.back()"><i class="fas fa-chevron-left fa-xl"></i></div> -->
                    </span>
                    <input type="search" name="cari" class="form-control input-search me-2 my-auto" placeholder="Cari Pengguna"
                        aria-label="Cari Pengguna" aria-describedby="basic-addon2" value="<?=$cari?>" onchange="this.form.submit();" autofocus>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->

<!-- /Modal Option -->