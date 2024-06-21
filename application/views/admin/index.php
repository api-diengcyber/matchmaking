<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-retweet fa-3x text-success"></i>
                <div class="ms-3">
                    <p class="mb-2">Request Aktif</p>
                    <h6 class="mb-0"><?= $requestActive->total ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-retweet fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Request</p>
                    <h6 class="mb-0"><?= $requestAll->total_semua ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-calendar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Jadwal Hari Ini</p>
                    <h6 class="mb-0"><?= $jadwalActive->jadwal ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->

<!-- Widgets Start -->
<style>
    .not {
        padding: 8px;
        max-height: 75vh;
        overflow-x: hidden;
        overflow-y: auto;
    }

    /* Custom scrollbar for WebKit browsers */
    .not::-webkit-scrollbar {
        width: 4px;
        /* Width of the scrollbar */
    }

    .not::-webkit-scrollbar-track {
        background: #f1f1f1;
        /* Color of the track */
    }

    .not::-webkit-scrollbar-thumb {
        background: #888;
        /* Color of the scrollbar thumb */
        border-radius: 4px;
        /* Rounded corners */
    }

    .not::-webkit-scrollbar-thumb:hover {
        background: #555;
        /* Color of the scrollbar thumb on hover */
    }
</style>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-6">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-2 ">
                    <h6 class="mb-0">Request Masuk</h6>
                    <a href="<?= base_url('request_admin') ?>">Lihat Semua</a>
                </div>
                <div class="not">

                    <?php
                    foreach ($requestMasuk as $rm) { ?>
                        <div class="d-flex align-items-center border-bottom py-3">
                            <img class="rounded-circle flex-shrink-0" src="<?= base_url('assets/admin/img/user.png') ?>"
                                alt="" style="width: 40px; height: 40px;">
                            <div class="w-100 ms-3">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-0">
                                    <a href="<?=base_url('request_admin/read/'.$rm->id)?>">
                                        <?= $rm->nama ?>
                                    
                                    </a>
                                    </h6>
                                    <small><?= diffForHumans($rm->tgl_update) ?></small>
                                </div>
                                <small>Menunggu Jadwal</small>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                   
                </div>
                <!-- <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.png" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.png" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.png" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div> -->
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Calender</h6>
                    <!-- <a href="">Show All</a> -->
                </div>
                <div id="calender"></div>
            </div>
        </div>
    </div>
</div>
<!-- Widgets End -->


<!-- Footer Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded-top p-4">
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
                &copy; <a href="#">Matchmaking</a>, All Right Reserved.
            </div>

        </div>
    </div>
</div>
<!-- Footer End -->


</div>
<!-- Content End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>