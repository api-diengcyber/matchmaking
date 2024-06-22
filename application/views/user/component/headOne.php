<div class="container-fluid fixed-top bg-white">
    <div class="row">
        <div class="col-12 py-3">
                <div class="input-group input-group-sm">
                    <a href="<?= base_url('users_user/cari') ?>" class="form-control input-search me-2 my-auto text-decoration-none" style="padding:10px">
                    <i class="fas fa-search"></i> Cari Pengguna
                    </a>
                   
                    <span class="input-group-text span-profil bg-white border-0">
                      
                        <a href="#" data-bs-toggle="modal" data-bs-target="#option">
                            <?php
                            if ($this->session->userdata('foto') == null) { ?>
                                
                                <img src="<?= base_url('assets/admin/img/user.png') ?>"
                                    alt="user" width="40" height="40" class="rounded-circle">

                                <?php

                            } else { ?>
                                <img src="<?= base_url('assets/user/foto/' . $this->session->userdata('foto')) ?>"
                                    alt="user" width="40" height="40" class="rounded-circle">
                                <?php

                            }
                            ?>
                        </a>
                    </span>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        <div class="scrollmenu" id="scrollmenu">
        <a href="<?= base_url('dashboard_user') ?>"  class="<?php if ($this->uri->segment(1) == 'dashboard_user') echo 'active'; ?>">
            Beranda
        </a>
        <a href="<?= base_url('request_user/masuk/all') ?>" class="<?php if ($this->uri->segment(2) == 'masuk' && $this->uri->segment(3) == 'all') echo 'active'; ?>">
            Request Masuk
        </a>
        <a href="<?= base_url('request_user/masuk/1') ?>" class="<?php if ($this->uri->segment(2) == 'masuk' && $this->uri->segment(3) == '1') echo 'active'; ?>">
           Masuk Menunggu
        </a>
        <a href="<?= base_url('request_user/keluar/allkeluar') ?>" class="<?php if ($this->uri->segment(3) == 'allkeluar') echo 'active'; ?>">
            Request Keluar
        </a>
        <a href="<?= base_url('request_user/keluar/1') ?>" class="<?php if ($this->uri->segment(2) == 'keluar' && $this->uri->segment(3) == '1') echo 'active'; ?>">
            Request Keluar Menunggu
        </a>
        <a href="<?= base_url('jadwal_user/') ?>" class="<?php if ($this->uri->segment(1) == 'jadwal_user') echo 'active'; ?>">
           Jadwal Meet
        </a>
        <!-- <a href="<?= base_url('request_user/masuk/4') ?>" class="<?php if ($this->uri->segment(3) == '4') echo 'active'; ?>">
            Room Aktif
        </a>
        <a href="<?= base_url('request_user/masuk/5') ?>" class="<?php if ($this->uri->segment(3) == '5') echo 'active'; ?>">
            Room Selesai
        </a>
        <a href="<?= base_url('request_user/masuk/6') ?>" class="<?php if ($this->uri->segment(3) == '6') echo 'active'; ?>">
            Room Ditolak
            
        </a>
        <a href="<?= base_url('request_user/masuk/7') ?>" class="<?php if ($this->uri->segment(3) == '7') echo 'active'; ?>">
            Expired
        </a>
        <a href="<?= base_url('request_user/masuk/8') ?>" class="<?php if ($this->uri->segment(3) == '8') echo 'active'; ?>">
            Di batalkan
        </a> -->
        
        
        </div>
        <script>
    // Function to center the active element in the scroll menu
    
</script>
        </div>
        <!-- <div class="col-12">
            <nav class="nav nav-tabs overflow-auto mulish-400 nav-fill" id="myTab">
                <button class="nav-link active" id="beranda-tab" data-bs-toggle="tab" data-bs-target="#beranda"
                    type="button" role="tab" aria-controls="beranda" aria-selected="true">Beranda</button>
                <button class="nav-link" id="request-masuk-tab" data-bs-toggle="tab" data-bs-target="#request-masuk"
                    type="button" role="tab" aria-controls="request-masuk" aria-selected="false">Request Masuk</button>
                <button class="nav-link" id="menunggu-tab" data-bs-toggle="tab" data-bs-target="#menunggu" type="button"
                    role="tab" aria-controls="menunggu" aria-selected="false">Menunggu</button>
                <button class="nav-link" id="request-keluar-tab" data-bs-toggle="tab" data-bs-target="#request-keluar"
                    type="button" role="tab" aria-controls="request-keluar" aria-selected="false">Request
                    Keluar</button>
                <button class="nav-link" id="request-jadwal-tab" data-bs-toggle="tab" data-bs-target="#request-jadwal"
                    type="button" role="tab" aria-controls="request-jadwal" aria-selected="false">Jadwal
                    Pertemuan</button>
            </nav>
        </div> -->
    </div>

</div>
<!-- Modal -->
<div class="modal fade px-5" id="option" tabindex="-1" aria-labelledby="optionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
        <div class="modal-content r-20">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 p-4">
                        <div class="d-grid gap-2">
                            <a href="<?= base_url('profile_user/') ?>"
                                class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10">Edit Profil</a>
                            <a href="<?= base_url('auth/logout') ?>"
                                class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10">Logout</a>
                            <a href="<?= base_url('auth/change_password') ?>"
                                class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10">Ubah Password</a>
                            <button class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10" type="button"
                                data-bs-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Modal Option -->

<script>
     function centerActiveElement() {
        const scrollmenu = document.getElementById('scrollmenu');
        const activeElement = scrollmenu.querySelector('.active');

        if (activeElement) {
            const scrollmenuRect = scrollmenu.getBoundingClientRect();
            const activeElementRect = activeElement.getBoundingClientRect();
            const offset = activeElementRect.left - scrollmenuRect.left - (scrollmenuRect.width / 2) + (activeElementRect.width / 2);

            scrollmenu.scrollLeft += offset;
        }
    }

    // Call the function to center the active element
    window.addEventListener('load', centerActiveElement);
    window.addEventListener('resize', centerActiveElement);
</script>