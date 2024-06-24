<div class="d-none d-md-none d-sm-none d-lg-block">
    <style>
        .bg-1 {
            background-color: #7575fa
        }
    </style>
    <div class="container-fluid overflow-hidden" style="background-color:#e8e8e8">
        <div class="success" id="success"
            success="<?php echo $this->session->userdata('success') <> '' ? $this->session->userdata('success') : ''; ?>">
        </div>
        <div class="row g-0 vh-100 overflow-y-auto">
            <div class="col offset-lg-2 offset-xl-2 d-flex flex-column vh-100">
                <main class="row overflow-auto py-4 px-3">
                    <div class="col-12"  >
                        <div class="card text-white" style="border-radius:10px;background-image:url('<?= base_url('assets/temuser/rose-petals.svg') ?>');background-size:cover;background-repeat:no-repeat;position:relative;height:40vh">
                            <div class="card-body">
                               
                            </div>
                        </div>
                        <div class="card card-all mx-5" style="margin-top:-90px">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
                                    <?php if ($users->foto == null) { ?>
                                                    <img src="https://st.depositphotos.com/1537427/3571/v/450/depositphotos_35717211-stock-illustration-vector-user-icon.jpg" alt="" class="rounded-2" width="100px" height="100px">
                                                <?php } else { ?>
                                                    <img src="<?= base_url('assets/user/foto/' . $users->foto) ?>" alt="" class="rounded-2" width="100px" height="100px">
                                                <?php } ?>
                                               
                                    </div>
                                    <div class="col-8 my-auto">
                                        <h5>

                                            <?= $users->nama ?>
                                        </h5>
                                        <p>
                                            <b>
                                            <?php
                                                if ($users->jenis_kelamin == 1) {
                                                    echo 'Laki-laki';
                                                } elseif ($users->jenis_kelamin == 2) {
                                                    echo 'Perempuan';
                                                } ?>
                                            </b>
                                        </p>
                                        <p class="color-4">
                                          <?= $users->kabupaten.', '.$users->provinsi ?>
                                                     
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pt-5 ">
                        <div class="row">
                        <div class="col-md-12 col-lg-12 mb-3">
                                <div class="card card-all">
                                    <div class="card-body ">
                                        <div class="row">
                                            
                                            <div class="col-12">
                                                <div class="row">
                                                    <!-- <div class="col-12">
                                                        <h5 class="text-center">Tentang</h5>
                                                        <hr>
                                                    </div> -->
                                                    <div class="col-12">
                                                        <h6 class="">Tentang <?= $users->nama ?></h6>
                                                        <p><?= $users->deskripsi_diri ?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">
                                                        <h6 class="">Tanggal Lahir </h6>
                                                        <p><?= $users->tgl_lahir ?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="">Pekerjaan</h6>
                                                        <p><?= $users->pekerjaan ?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="">Hobi</h6>
                                                        <p><?= $users->hobi ?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">
                                                        <h6 class="">Kriteria </h6>
                                                        <p><?= $users->kriteria_pasangan ?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">
                                                        <h6 class="my-auto"><i class="fa-solid fa-location-dot fa-xl"></i>
                                                        <?= $users->kabupaten.', '.$users->provinsi ?>
                                                        </h6>
                                                        <p></p>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="col-12 py-2">
                                                    
                                                    <?php
                                                    if ($cekRequest == null) {
                                                        echo '
                                                                    <button type="button" class="btn bg-1 text-white" data-bs-toggle="modal" data-bs-target="#request">
                                                                                        Request <i class="fa-solid fa-retweet"></i>
                                                                                    </button>
                                                                                    
                                                                                    <!-- Request Modal -->
                                                                                    <div class="modal fade" id="request" tabindex="-1" aria-labelledby="requestLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title" id="requestLabel">Request Matching</h5>
                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-12 py-4">
                                                                                                        <h5 class="text-center">
                                                                                                            Yakin coba request matching dengan ' . $users->nama . '?
                                                                                                        </h5>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn btn-primary">Ya</a>
                                                                                            </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Request Modal -->
                                                                                    
                                                                    ';

                                                    } else {
                                                        if ($cekRequest->id_user1 == $isUser) {
                                                            if ($cekRequest->status == 1) {
                                                                // echo "Menuggu";
                                                                $pill = '<span class="badge bg-info rounded-pill mb-3">Request terkirim, menunggu konfirmasi dari ' . $users->nama . '</span> </br>
                                                                                        <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#batal">
                                                                                        Batalkan Request <i class="fa-solid fa-circle-xmark"></i>
                                                                                        </button>
                                                                                        <!-- MOdal batal -->
                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="batal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="batalLabel" aria-hidden="true">
                                                                                            <div class="modal-dialog">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <h5 class="modal-title" id="batalLabel">Batalkan Request</h5>
                                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        Yakin Batalkan Request Dengan ' . $users->nama . ' ?
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                        <a href="' . base_url('request_user/cancel/' . $cekRequest->id) . '" class="btn btn-primary">Ya</a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- MOdal batal -->
                                                                                        
                                                                                        ';

                                                            } elseif ($cekRequest->status == 2) {
                                                                // echo "Menunggu room";
                                                                $pill = '<span class="badge bg-primary rounded-pill mb-3">Request telah diterima oleh ' . $users->nama . ' menunggu room meet dari admin</span> </br>
                                                                                        <a href="' . base_url('request_user/keluar/allkeluar/' . $cekRequest->id) . '" class="btn bg-1 text-white">
                                                                                        Lihat Request <i class="fa-solid fa-circle-info"></i>
                                                                                        </a>
                                                                                        
                                                                                        
                                                                                        ';

                                                            } elseif ($cekRequest->status == 3) {
                                                                $pill = '<span class="badge bg-danger rounded-pill mb-3">Request ditolak oleh ' . $users->nama . ' </span> </br>
                                                                                                
                                                                                                    <button type="button" class="btn bg-1 text-white" data-bs-toggle="modal" data-bs-target="#request">
                                                                                        Request lagi <i class="fa-solid fa-retweet"></i>
                                                                                    </button>
                                                                                    
                                                                                    <!-- Request Modal -->
                                                                                    <div class="modal fade" id="request" tabindex="-1" aria-labelledby="requestLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title" id="requestLabel">Request Matching</h5>
                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-12 py-4">
                                                                                                        <h5 class="text-center">
                                                                                                            Yakin coba request matching dengan ' . $users->nama . '?
                                                                                                        </h5>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn btn-primary">Ya</a>
                                                                                            </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Request Modal -->
                                                                                                    
                                                                                                    ';

                                                            } elseif ($cekRequest->status == 4) {
                                                                // echo "activation";
                                                    
                                                                $pill = '<span class="badge bg-info rounded-pill mb-3">Request di konfirmasi oleh admin </span> </br></br>' . $text . ' </br>
                                                                                                    <a href="' . base_url('jadwal_user/index/' . $cekRequest->id) . '" class="btn bg-1 text-white"> Lihat Jadwal <i class="fa-solid fa-calendar-days"></i>
                                                                                                    </a>';

                                                                // if()
                                                    

                                                            } elseif ($cekRequest->status == 5) {
                                                                // echo "finish";
                                                                $pill = '<span class="badge bg-success rounded-pill mb-3">Request Selesai</span> </br>
                                                                                                                <button type="button" class="btn bg-1 text-white" data-bs-toggle="modal" data-bs-target="#request">
                                                                                                                Request <i class="fa-solid fa-retweet"></i>
                                                                                                                </button>
                                                                                                                <a href="' . base_url('jadwal_user/index/' . $cekRequest->id) . '" class="btn bg-1 text-white">
                                                                                                                Lihat Jadwal <i class="fa-solid fa-calendar-days"></i>
                                                                                                            </a>
                                                                                                                <!-- Request Modal -->
                                                                                                                <div class="modal fade" id="request" tabindex="-1" aria-labelledby="requestLabel" aria-hidden="true">
                                                                                                                    <div class="modal-dialog">
                                                                                                                        <div class="modal-content">
                                                                                                                        <div class="modal-header">
                                                                                                                            <h5 class="modal-title" id="requestLabel">Request Matching</h5>
                                                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                                        </div>
                                                                                                                        <div class="modal-body">
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-12 py-4">
                                                                                                                                    <h5 class="text-center">
                                                                                                                                        Yakin coba request matching dengan ' . $users->nama . '?
                                                                                                                                    </h5>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="modal-footer">
                                                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                                            <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn btn-primary">Ya</a>
                                                                                                                        </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <!-- Request Modal -->
                                                                                                                ';

                                                            } elseif ($cekRequest->status == 6) {
                                                                $pill = '<span class="badge bg-danger rounded-pill mb-3">Request ditolak oleh admin</span> </br>
                                                                                                                <br>
                                                                                                                <button type="button" class="btn bg-1 text-white" data-bs-toggle="modal" data-bs-target="#request">
                                                                                                                    Request Lagi <i class="fa-solid fa-retweet"></i>
                                                                                                                </button>    
                                                                                                                <!-- Request Modal -->
                                                                                                                <div class="modal fade" id="request" tabindex="-1" aria-labelledby="requestLabel" aria-hidden="true">
                                                                                                                    <div class="modal-dialog">
                                                                                                                        <div class="modal-content">
                                                                                                                        <div class="modal-header">
                                                                                                                            <h5 class="modal-title" id="requestLabel">Request Matching</h5>
                                                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                                        </div>
                                                                                                                        <div class="modal-body">
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-12 py-4">
                                                                                                                                    <h5 class="text-center">
                                                                                                                                        Yakin coba request matching dengan ' . $users->nama . '?
                                                                                                                                    </h5>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="modal-footer">
                                                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                                            <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn btn-primary">Ya</a>
                                                                                                                        </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <!-- Request Modal -->
                                                                                                                ';

                                                            } elseif ($cekRequest->status == 7) {
                                                                $pill = '<span class="badge bg-danger rounded-pill mb-3">Request Expired</span>
                                                                                                                <!-- Request Modal -->
                                                                                                                <br>
                                                                                                                <button type="button" class="btn bg-1 text-white" data-bs-toggle="modal" data-bs-target="#request">
                                                                                                                    Request <i class="fa-solid fa-retweet"></i>
                                                                                                                </button>    
                                                                                                                <div class="modal fade" id="request" tabindex="-1" aria-labelledby="requestLabel" aria-hidden="true">
                                                                                                                    <div class="modal-dialog">
                                                                                                                        <div class="modal-content">
                                                                                                                        <div class="modal-header">
                                                                                                                            <h5 class="modal-title" id="requestLabel">Request Matching</h5>
                                                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                                        </div>
                                                                                                                        <div class="modal-body">
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-12 py-4">
                                                                                                                                    <h5 class="text-center">
                                                                                                                                        Yakin coba request matching dengan ' . $users->nama . '?
                                                                                                                                    </h5>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="modal-footer">
                                                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                                            <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn btn-primary">Ya</a>
                                                                                                                        </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <!-- Request Modal -->
                                                                                                                ';

                                                            } elseif ($cekRequest->status == 8) {
                                                                echo "Keluar batal";
                                                                $pill = '<span class="badge bg-danger rounded-pill mb-3">Request dibatalkan oleh anda</span> </br>
                                                                                                                <button type="button" class="btn bg-1 text-white" data-bs-toggle="modal" data-bs-target="#request">
                                                                                                                Request Ulang <i class="fa-solid fa-rotate"></i>
                                                                                                                </button>
                                                                                                                <!-- Request Modal -->
                                                                                                                <div class="modal fade" id="request" tabindex="-1" aria-labelledby="requestLabel" aria-hidden="true">
                                                                                                                    <div class="modal-dialog">
                                                                                                                        <div class="modal-content">
                                                                                                                        <div class="modal-header">
                                                                                                                            <h5 class="modal-title" id="requestLabel">Request Matching</h5>
                                                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                                        </div>
                                                                                                                        <div class="modal-body">
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-12 py-4">
                                                                                                                                    <h5 class="text-center">
                                                                                                                                        Yakin coba request matching dengan ' . $users->nama . '?
                                                                                                                                    </h5>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="modal-footer">
                                                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                                            <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn btn-primary">Ya</a>
                                                                                                                        </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <!-- Request Modal -->
                                                                                                                ';

                                                            } else {
                                                                // echo "Lainya";
                                                            }


                                                        } else {

                                                            if ($cekRequest->status == 1) {
                                                                $pill = '<span class="badge bg-info rounded-pill mb-3">Request dari ' . $users->nama . ' menunggu konfirmasi dari Anda</span> </br>
                                                                            <button type="button" class="btn bg-1 text-white" data-bs-toggle="modal" data-bs-target="#terima">
                                                                            Terima Request <i class="fa-solid fa-check"></i>
                                                                            </button>
                                                                            <!-- MOdal Terima -->
                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="terima" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="terimaLabel" aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="terimaLabel">Terima Request</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            Yakin Terima Request Dari ' . $users->nama . ' ?
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                            <a href="' . base_url('request_user/acc/' . $cekRequest->id) . '" class="btn btn-primary">Ya</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- MOdal Terima -->
                                                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tolak">
                                                                            Tolak Request <i class="fa-solid fa-circle-xmark"></i>
                                                                            </button>
                                                                            <!-- MOdal tolak -->
                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="tolak" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tolakLabel" aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="tolakLabel">Tolak Request</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            Yakin Tolak Request Dari ' . $users->nama . ' ?
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                            <a href="' . base_url('request_user/reject/' . $cekRequest->id) . '" class="btn btn-primary">Ya</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- MOdal tolak -->
                                                                            
                                                                            ';
                                                            } elseif ($cekRequest->status == 2) {
                                                                // echo "Menunggu room";
                                                                $pill = '<span class="badge bg-primary rounded-pill mb-3">Request dari ' . $users->nama . ' menunggu room meet dari admin</span> </br>
                                                                                        <a href="' . base_url('request_user/masuk/' . $cekRequest->id) . '" class="btn bg-1 text-white">
                                                                                        Lihat Request <i class="fa-solid fa-circle-info"></i>
                                                                                        </a>
                                                                                        
                                                                                        
                                                                                        ';

                                                            } elseif ($cekRequest->status == 3) {
                                                                // echo "reject";
                                                                $pill = '<span class="badge bg-danger rounded-pill mb-3">Request ditolak oleh anda </span> </br>
                                                                                        <button type="button" class="btn bg-1 text-white" data-bs-toggle="modal" data-bs-target="#request">
                                                                                        Request <i class="fa-solid fa-retweet"></i>
                                                                                    </button>
                                                                                    
                                                                                    <!-- Request Modal -->
                                                                                    <div class="modal fade" id="request" tabindex="-1" aria-labelledby="requestLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title" id="requestLabel">Request Matching</h5>
                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-12 py-4">
                                                                                                        <h5 class="text-center">
                                                                                                            Yakin coba request matching dengan ' . $users->nama . '?
                                                                                                        </h5>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn btn-primary">Ya</a>
                                                                                            </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Request Modal -->';

                                                            } elseif ($cekRequest->status == 4) {


                                                                $pill = '<span class="badge bg-info rounded-pill mb-3">Request di konfirmasi oleh admin </span> </br>' . $text . ' </br>
                                                                                        <a href="' . base_url('jadwal_user/index/' . $cekRequest->id) . '" class="btn bg-1 text-white">
                                                                                        Lihat Jadwal <i class="fa-solid fa-calendar-days"></i>
                                                                                        </a> 
                                                                                    
                                                                                    
                                                                                    ';

                                                            } elseif ($cekRequest->status == 5) {
                                                                $pill = '<span class="badge bg-success rounded-pill mb-3">Request Selesai</span> </br>
                                                                                                    <button type="button" class="btn bg-1 text-white" data-bs-toggle="modal" data-bs-target="#request">
                                                                                                    Request <i class="fa-solid fa-retweet"></i>
                                                                                                    </button>
                                                                                                    <a href="' . base_url('jadwal_user/index/' . $cekRequest->id) . '" class="btn bg-1 text-white">
                                                                                                    Lihat Jadwal <i class="fa-solid fa-calendar-days"></i>
                                                                                                </a>
                                                                                                    <!-- Request Modal -->
                                                                                                    <div class="modal fade" id="request" tabindex="-1" aria-labelledby="requestLabel" aria-hidden="true">
                                                                                                        <div class="modal-dialog">
                                                                                                            <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h5 class="modal-title" id="requestLabel">Request Matching</h5>
                                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                            </div>
                                                                                                            <div class="modal-body">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-12 py-4">
                                                                                                                        <h5 class="text-center">
                                                                                                                            Yakin coba request matching dengan ' . $users->nama . '?
                                                                                                                        </h5>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                                <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn btn-primary">Ya</a>
                                                                                                            </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <!-- Request Modal -->
                                                                                                    ';

                                                            } elseif ($cekRequest->status == 6) {
                                                                // echo "aaa";
                                                                $pill = '<span class="badge bg-danger rounded-pill mb-3">Request ditolak oleh admin</span>     
                                                                                                    <br>
                                                                                                    <button type="button" class="btn bg-1 text-white" data-bs-toggle="modal" data-bs-target="#request">
                                                                                                        Request <i class="fa-solid fa-retweet"></i>
                                                                                                    </button>                                                <!-- Request Modal -->
                                                                                                    <div class="modal fade" id="request" tabindex="-1" aria-labelledby="requestLabel" aria-hidden="true">
                                                                                                        <div class="modal-dialog">
                                                                                                            <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h5 class="modal-title" id="requestLabel">Request Matching</h5>
                                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                            </div>
                                                                                                            <div class="modal-body">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-12 py-4">
                                                                                                                        <h5 class="text-center">
                                                                                                                            Yakin coba request matching dengan ' . $users->nama . '?
                                                                                                                        </h5>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                                <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn btn-primary">Ya</a>
                                                                                                            </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <!-- Request Modal -->
                                                                                                    ';

                                                            } elseif ($cekRequest->status == 7) {
                                                                $pill = '<span class="badge bg-danger rounded-pill mb-3">Request Expired</span> </br>
                                                                                                    <!-- Request Modal -->
                                                                                                    <button type="button" class="btn bg-1 text-white" data-bs-toggle="modal" data-bs-target="#request">
                                                                                                        Request <i class="fa-solid fa-retweet"></i>
                                                                                                    </button>    
                                                                                                    <div class="modal fade" id="request" tabindex="-1" aria-labelledby="requestLabel" aria-hidden="true">
                                                                                                        <div class="modal-dialog">
                                                                                                            <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h5 class="modal-title" id="requestLabel">Request Matching</h5>
                                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                            </div>
                                                                                                            <div class="modal-body">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-12 py-4">
                                                                                                                        <h5 class="text-center">
                                                                                                                            Yakin coba request matching dengan ' . $users->nama . '?
                                                                                                                        </h5>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                                <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn btn-primary">Ya</a>
                                                                                                            </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <!-- Request Modal -->
                                                                                                    ';

                                                            } elseif ($cekRequest->status == 8) {
                                                                // echo "masuk batal";
                                                                $pill = '<span class="badge bg-danger rounded-pill mb-3">Request dibatalkan oleh ' . $users->nama . ' </span> </br>
                                                                                                    <button type="button" class="btn bg-1 text-white" data-bs-toggle="modal" data-bs-target="#request">
                                                                                                    Request <i class="fa-solid fa-retweet"></i>
                                                                                                    </button>
                                                                                                    <!-- Request Modal -->
                                                                                                    <div class="modal fade" id="request" tabindex="-1" aria-labelledby="requestLabel" aria-hidden="true">
                                                                                                        <div class="modal-dialog">
                                                                                                            <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h5 class="modal-title" id="requestLabel">Request Matching</h5>
                                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                            </div>
                                                                                                            <div class="modal-body">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-12 py-4">
                                                                                                                        <h5 class="text-center">
                                                                                                                            Yakin coba request matching dengan ' . $users->nama . '?
                                                                                                                        </h5>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                                <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn btn-primary">Ya</a>
                                                                                                            </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <!-- Request Modal -->
                                                                                                    ';

                                                            } else {
                                                                // echo "Lainya";
                                                            }
                                                        }

                                                    }

                                                    ?>




                                                </div>
                                            </div>
                                            <div class="col-12">
                                            <hr>
                                                        <?php if (!empty($pill)) {
                                                            echo $pill;
                                                        } ?>
                                            </div>
                                            <!-- <div class="col-md-12 col-lg-6 mb-3">
                                                <div class="card card-all">
                                                    <div class="card-body ">
                                                        <div class="row">
                                                        <div class="col-12">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <h5 class="text-center">Kontak</h5>
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <h6 class=""><i class="fa-brands fa-facebook fa-xl"></i>
                                                                                    <span></span>
                                                                                </h6>
                                                                                <p><?= $users->fb ?></p>
                                                                            </div>
                                                                            <div class="col-12 pt-4">
                                                                                <h6 class=""><i class="fa-brands fa-instagram fa-xl"></i>
                                                                                    <span></span>
                                                                                </h6>
                                                                                <p><?= $users->ig ?></p>
                                                                            </div>
                                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                           
                        </div>
                    </div>


                </main>
                <footer class="row bg-light py-4 mt-auto">

                    <small>&copy Matchmaking by <a href="#">Dieng Cyber</a></small>
                    <small>Made with ❤</small>
                    <div class="col"> </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#btn-cek').click(function () {
                var id = $(this).attr('val');

                // alert (id);
                $.ajax({
                    url: '<?php echo base_url(); ?>request_user/check_request/' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log("Action completed successfully:", data);
                        if (data.id_user1 == id) {
                            console.log('keluar' + data.status);
                        } else {

                            console.log('masuk' + data.status);
                        }


                    },
                    error: function (error) {
                        console.error("Error in another action:", error);
                    }
                });


            })
        });

    </script>

</div>
<!-- Mobile -->
<div class="d-lg-none">
    <style>
        .scroll-container {
            width: 100%;
            /* Lebar kontainer */
            /* height: 300px; Tinggi kontainer */
            overflow-x: auto;
            /* Aktifkan scroll horizontal */
            overflow-y: none;
            /* Aktifkan scroll horizontal */
            white-space: nowrap;
            /* Pastikan konten tidak mematahkan baris */
            /* border: 1px solid #ccc; Garis tepi untuk kontainer */
            padding: 10px;
            /* Padding untuk kontainer */
        }

        .scroll-item {
            display: inline-block;
            /* Membuat item berada dalam satu baris */
            width: 80%;
            /* Lebar setiap item */
            margin-right: 10px;
            /* Jarak antar item */
            vertical-align: top;
            /* Memastikan item berada di atas */
        }

        .card-body {
            white-space: normal;
            /* Pastikan teks dalam card mengikuti lebar card */
        }

        .horizontal-scroll {
            overflow-x: auto;
            white-space: nowrap;
            /* margin: 0px 20px ; */
        }

        .horizontal-scroll .card {
            display: inline-block;
            margin-right: 1rem;
            /* Optional: Adds space between cards */
            margin-top: 10px;
            margin-bottom: 10px;


        }



        @media (max-width: 992px) {


            .scroll {
                /* margin: 4px, 4px; */
                padding: 4px;
                width: 100%;
                max-height: 40vh;
                overflow-x: hidden;
                overflow-y: auto;
                text-align: justify;
            }

            .navbar {
                transition: background-color 0.3s, box-shadow 0.3s;
                /* Transisi untuk latar belakang dan bayangan kotak */
            }

            .navbar-transparent {
                background-color: transparent;
                box-shadow: none;
                /* Tanpa bayangan kotak */
            }

            .navbar-white {
                background-color: white !important;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                /* Bayangan kotak untuk memberikan efek mengapung */
            }

            .text-brand {
                color: #e7008b;
            }

            .card-morp {
                background: rgba(255, 255, 255, 0.25);
                box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
                backdrop-filter: blur(4.5px);
                -webkit-backdrop-filter: blur(4.5px);
                border-radius: 10px;
                border: 1px solid rgba(255, 255, 255, 0.18);
                color: white;
                border: 2px solid white;
            }


            .horizontal-scroll::-webkit-scrollbar {
                width: 0;
                height: 0;
            }

            .horizontal-scroll::-webkit-scrollbar-thumb {
                display: none;
            }

            .horizontal-scroll::-webkit-scrollbar-track {
                display: none;
            }

            .card-profil {

                width: 100%;
                height: 70vh;
                border-radius: 30px;
                border:none;
                position: relative;
                box-shadow: 2px 3px 10px -1px rgba(115,115,115,0.89);
-webkit-box-shadow: 2px 3px 10px -1px rgba(115,115,115,0.89);
-moz-box-shadow: 2px 3px 10px -1px rgba(115,115,115,0.89);
            }
            .card-profil-2 {

                width: 100%;
                height:20vh;
                border-radius: 30px;
                /* border:none; */
                position: relative;
                box-shadow: 2px 3px 10px -1px rgba(115,115,115,0.89);
-webkit-box-shadow: 2px 3px 10px -1px rgba(115,115,115,0.89);
-moz-box-shadow: 2px 3px 10px -1px rgba(115,115,115,0.89);
            }
        }

        .card-morp-2 {
            background: rgba(255, 255, 255, 0.5);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            border: 2px solid white;
        }



        .user-avatar {
            display: flex;
            align-items: center;
        }

        .user-avatar img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .user-info {
            margin-left: 10px;
        }

        .user-info h5 {
            margin-bottom: 0;
            font-size: 12px;
            font-weight: 600;
        }

        .user-info p {
            margin-bottom: 0;
            font-size: 8px;
            color: #6c757d;
        }

        /* .btn {
        width:67px;
        height:34px;
        padding: 0px 15px;
        border-radius: 20px;
        border: none;
        cursor: pointer;
        font-size: 10px;
        display: flex;
        justify-content: space-between;
        margin-top: 15px;
      
        transition: background-color 0.3s ease;
    } */

        .btn-m {
            font-size: 11px;
            border-radius: 20px;
            padding: 8px 20px;
        }

        .btn-meet {
            margin-right: 5px;
            color: white;
        }

        .btn-meet:hover {
            background-color: #ff4d4d;
        }

        .btn-view {
            background-color: #6C6C6C;
            color: white;
        }

        .btn-view:hover {
            background-color: #6C6C6C;
        }
    </style>
    <section style="">
        <div class="container-fluid fixed-top bg-white " id="navbar">
            <div class="row px-2">
                <div class="col-12 d-flex justify-content-between py-3">
                <a href="<?=base_url('dashboard_user')?>" class="text-dark" id="text-name"><i class="fas fa-chevron-left fa-xl"></i></a>
                </div>
            </div>
        </div>
        <div class="container pt-5 mb-4" style="">
            <div class="row pt-2">
                <div class="col-12 d-flex justify-content-between profile-front">

                    <div class="d-flex justify-content-between">
                        <div class="my-auto">
                            <?php
                            if ($this->session->userdata('foto') == null) { ?>

                                <img src="<?= base_url('assets/admin/img/user.png') ?>" alt="user" width="50" height="50"
                                    class="rounded-circle">

                                <?php

                            } else { ?>
                                <img src="<?= base_url('assets/user/foto/' . $this->session->userdata('foto')) ?>"
                                    alt="user" width="50" height="50" class="rounded-circle">
                                <?php

                            }

                            ?>
                        </div>
                        <div class="my-auto">
                            <div class="user-info">
                                <h5>
                                    <?= $this->session->userdata('nama') ?>
                                </h5>
                                <p class="color-3">
                                    <?= $this->session->userdata('kabupaten') ?>, <?= $this->session->userdata('provinsi') ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between my-auto">
                    </div>
                </div>
                <div class="col-12 mulish-400">
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-12 profile-front">
                    <?php if ($users->foto == null) { ?>
                        <div class="card card-profil" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.1)),
                        url('https://st.depositphotos.com/1537427/3571/v/450/depositphotos_35717211-stock-illustration-vector-user-icon.jpg');background-size:cover;background-position: center;
                        background-repeat: no-repeat;">
                            <?php
                    } else { ?>
                            <div class="card card-profil"
                                style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.5)),
                                url('<?= base_url('assets/user/foto/' . $users->foto) ?>');background-size:cover;background-position: center; background-repeat: no-repeat;">
                                <?php
                    } ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="#" class="btn btn-sm bg-white rounded-circle color-3 btn-profil-m" id=""><i class="fas fa-ellipsis-h "></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="position:absolute;bottom:20px">
                                <div class="col-12 px-4">
                                    <h2 class="text-white mulish-700">
                                        <?= $users->nama ?>
                                    </h2>
                                    <p class="color-3 mulish-400" style="margin-top:-10px">
                                    <?= $users->kabupaten ?>, <?= $users->provinsi ?>
                                    </p>
                                    <span class="badge rounded-pill bg-3 p-2">
                                    <?php
                                    if ($users->jenis_kelamin == 1) {
                                        echo 'Laki-laki';
                                    } elseif ($users->jenis_kelamin == 2) {
                                        echo 'Perempuan';
                                    } ?>
                                    </span>
                                    <span class="badge rounded-pill bg-3 p-2">
                                    <?= $users->pekerjaan ?>
                                    </span>
                                    <span class="badge rounded-pill bg-3 p-2">
                                    <?= $users->hobi ?>
                                    </span>
                                    <!-- <span class="badge rounded-pill bg-primary">Primary</span>
                                    <span class="badge rounded-pill bg-primary">Primary</span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 profile-detail d-none">
                    <div class="row">
                        <div class="col-12">
                            <?php if ($users->foto == null) { ?>
                            <div class="card card-profil-2" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.1)),
                            url('https://st.depositphotos.com/1537427/3571/v/450/depositphotos_35717211-stock-illustration-vector-user-icon.jpg');background-size:cover;background-position: center;
                            background-repeat: no-repeat;">
                                <?php
                                } else { ?>
                                <div class="card card-profil-2"
                                    style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.1)),
                                    url('<?= base_url('assets/user/foto/' . $users->foto) ?>');background-size:cover;background-position: center; background-repeat: no-repeat;">
                                    <?php
                                } ?>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="#" class="btn btn-sm bg-white rounded-circle color-3 btn-profil-m" id=""><i class="fas fa-ellipsis-h "></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="position:absolute;bottom:0px">
                                    <div class="col-12 px-4">
                                        <h2 class="text-white mulish-700">
                                            <?= $users->nama ?>
                                        </h2>
                                        <p class=" mulish-400 color-3" style="margin-top:-10px">
                                        <?= $users->kabupaten ?>, <?= $users->provinsi ?>
                                        </p>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 pt-3">
                            <h5 class="mulish-700">Ingin Tahu Lebih?</h5>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="label-m mulish-700">Nama Lengkap</label>
                            <div class="card card-users py-0 rounded-2">
                                <div class="card-body py-2">
                                    <small class="mulish-700">
                                        <?= $users->nama ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="label-m mulish-700">Hobi</label>
                            <div class="card card-users py-0 rounded-2">
                                <div class="card-body py-2">
                                    <small class="mulish-700">
                                        <?= $users->hobi ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="label-m mulish-700">Pekerjaan</label>
                            <div class="card card-users py-0 rounded-2">
                                <div class="card-body py-2">
                                    <small class="mulish-700">
                                        <?= $users->pekerjaan ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="label-m mulish-700">Tentang</label>
                            <div class="card card-users py-0 rounded-2">
                                <div class="card-body py-2">
                                    <small class="mulish-700">
                                        <?= $users->deskripsi_diri ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="label-m mulish-700">Kriteria Pasangan</label>
                            <div class="card card-users py-0 rounded-2">
                                <div class="card-body py-2">
                                    <small class="mulish-700">
                                        <?= $users->kriteria_pasangan ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
                <div class="col-12">
                <div class="col-12 pt-4">
                <div class="d-grid gap-2">
                                <?php
                                if ($cekRequest == null) {
                                    echo '
                                    
                                 
                                       <button type="button" class="btn bg-3 text-white line-morp mulish-700" data-bs-toggle="modal" data-bs-target="#request-m">
                                                           Request <i class="fa-solid fa-retweet"></i>
                                                           </button>
                                                           <!-- Request Modal -->
                                                           <div class="modal fade px-5" id="request-m" tabindex="-1" aria-labelledby="request-mLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content r-20">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                            <div class="col-12 text-center">
                                                                                <p class="text-center fs-12 mulish-600">
                                                                                Apakah Kamu yakin request matching dengan
                                                                                <span class="color-3">
                                                                                ' . $users->nama . '
                                                                                </span>
                                                                                    ?
                                                                                </p>
                                                                            </div>
                                                                                <div class="col-12 p-4 d-flex justify-content-between">
                                                                                    <div class="d-grid gap-2">
                                                                                        
                                                                                        <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10">Ya</a>
                                                                                    </div>
                                                                                    <div class="d-grid gap-2">
                                                                                        
                                                                                        <button class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10" type="button"
                                                                                            data-bs-dismiss="modal">Kembali</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                           <!-- Request Modal -->
                                                           
                                       ';

                                } else {
                                    if ($cekRequest->id_user1 == $isUser) {
                                        if ($cekRequest->status == 1) {
                                            // echo "Menuggu";
                                            $pill = '<small class="mb-4">Request terkirim, menunggu konfirmasi dari ' . $users->nama . '</small> 
                                                           </br>
                                                           </br>';
                                            echo '
                                                           
                                                           <button type="button" class="btn bg-3 text-white line-morp mulish-700" data-bs-toggle="modal" data-bs-target="#batal-m">
                                                               Batalkan Request <i class="fa-solid fa-circle-xmark"></i>
                                                           </button>
                                                           <!-- MOdal batal-m -->
                                                           <!-- Modal -->
                                                           <div class="modal fade px-5" id="batal-m" tabindex="-1" aria-labelledby="batal-mLabel" aria-hidden="true">
                                                           <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                               <div class="modal-content r-20">
                                                                   <div class="modal-body">
                                                                       <div class="row">
                                                                       <div class="col-12 text-center">
                                                                           <p class="text-center fs-12 mulish-600">
                                                                           Apakah Kamu yakin batalkan request matching dengan
                                                                           <span class="color-3">
                                                                           ' . $users->nama . '
                                                                           </span>
                                                                               ?
                                                                           </p>
                                                                       </div>
                                                                           <div class="col-12 p-4 d-flex justify-content-between">
                                                                               <div class="d-grid gap-2">
                                                                                   
                                                                                   <a href="' . base_url('request_user/cancel/' . $cekRequest->id) . '" class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10">Ya</a>
                                                                               </div>
                                                                               <div class="d-grid gap-2">
                                                                                   
                                                                                   <button class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10" type="button"
                                                                                       data-bs-dismiss="modal">Kembali</button>
                                                                               </div>
                                                                           </div>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>

                                                           
                                                           <!-- MOdal batal -->
                                                           
                                                           ';

                                        } elseif ($cekRequest->status == 2) {
                                            // echo "Menunggu room";
                                            $pill = '<small class=" mb-3">Request telah diterima oleh ' . $users->nama . ' menunggu room meet dari admin</small> 
                                                           </br>
                                                           </br>';
                                            echo '
                                                           <a href="' . base_url('request_user/keluar/allkeluar/' . $cekRequest->id) . '" class="btn bg-3 mulish-700 text-white line-morp">
                                                               Lihat Request <i class="fa-solid fa-circle-info"></i>
                                                           </a>
                                                           
                                                           
                                                           ';

                                        } elseif ($cekRequest->status == 3) {
                                            $pill = '<small class="mb-3">Request ditolak oleh ' . $users->nama . ' </small> 
                                                                       </br>
                                                                       </br>';
                                            echo '
                                                                       
                                            <button type="button" class="btn bg-3 text-white line-morp mulish-700" data-bs-toggle="modal" data-bs-target="#request-m">
                                            Request <i class="fa-solid fa-retweet"></i>
                                            </button>
                                            <!-- Request Modal -->
                                            <div class="modal fade px-5" id="request-m" tabindex="-1" aria-labelledby="request-mLabel" aria-hidden="true">
                                                 <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                     <div class="modal-content r-20">
                                                         <div class="modal-body">
                                                             <div class="row">
                                                             <div class="col-12 text-center">
                                                                 <p class="text-center fs-12 mulish-600">
                                                                 Apakah Kamu yakin request matching dengan
                                                                 <span class="color-3">
                                                                 ' . $users->nama . '
                                                                 </span>
                                                                     ?
                                                                 </p>
                                                             </div>
                                                                 <div class="col-12 p-4 d-flex justify-content-between">
                                                                     <div class="d-grid gap-2">
                                                                         
                                                                         <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10">Ya</a>
                                                                     </div>
                                                                     <div class="d-grid gap-2">
                                                                         
                                                                         <button class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10" type="button"
                                                                             data-bs-dismiss="modal">Kembali</button>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                            
                                            <!-- Request Modal -->
                                                                       
                                                                       ';

                                        } elseif ($cekRequest->status == 4) {
                                            // echo "activation";
                                
                                            $pill = '<small class="mb-3">Request di konfirmasi oleh admin </small> </br></br>' . $text . ' </br>';
                                            echo '
                                                                       <a href="' . base_url('jadwal_user/index/' . $cekRequest->id) . '" class="btn bg-3 mulish-700  text-white line-morp"> Lihat Jadwal <i class="fa-solid fa-calendar-days"></i>
                                                                       </a>';

                                            // if()
                                

                                        } elseif ($cekRequest->status == 5) {
                                            // echo "finish";
                                            $pill = '<small class="mb-3">Request Selesai</small> 
                                                                                   </br>
                                                                                   </br>';
                                            echo '
                                                                                   <button type="button" class="btn bg-3 mulish-700 line-morp  text-white" data-bs-toggle="modal" data-bs-target="#request-m">
                                                                                       Request <i class="fa-solid fa-retweet"></i>
                                                                                   </button>
                                                                                   <a href="' . base_url('jadwal_user/index/' . $cekRequest->id) . '" class="btn bg-3 mulish-700 line-morp  text-white">
                                                                                   Lihat Jadwal <i class="fa-solid fa-calendar-days"></i>
                                                                                   </a>
                                                                                   <!-- Request Modal -->
                                                                                   <!-- Request Modal -->
                                                                                   <div class="modal fade px-5" id="request-m" tabindex="-1" aria-labelledby="request-mLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                                                            <div class="modal-content r-20">
                                                                                                <div class="modal-body">
                                                                                                    <div class="row">
                                                                                                    <div class="col-12 text-center">
                                                                                                        <p class="text-center fs-12 mulish-600">
                                                                                                        Apakah Kamu yakin request matching dengan
                                                                                                        <span class="color-3">
                                                                                                        ' . $users->nama . '
                                                                                                        </span>
                                                                                                            ?
                                                                                                        </p>
                                                                                                    </div>
                                                                                                        <div class="col-12 p-4 d-flex justify-content-between">
                                                                                                            <div class="d-grid gap-2">
                                                                                                                
                                                                                                                <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10">Ya</a>
                                                                                                            </div>
                                                                                                            <div class="d-grid gap-2">
                                                                                                                
                                                                                                                <button class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10" type="button"
                                                                                                                    data-bs-dismiss="modal">Kembali</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                   
                                                                                   <!-- Request Modal -->
                                                                                   <!-- Request Modal -->
                                                                                   ';

                                        } elseif ($cekRequest->status == 6) {
                                            $pill = '<small class="mb-3">Request ditolak oleh admin</small> </br>
                                                                                   <br>';
                                            echo '
                                                                                   <button type="button" class="btn bg-3 mulidh-700 text-white line-morp" data-bs-toggle="modal" data-bs-target="#request-m">
                                                                                   Request <i class="fa-solid fa-retweet"></i>
                                                                                   </button>
                                                                                   
                                                                                   <!-- Request Modal -->
                                                                                   <div class="modal fade px-5" id="request-m" tabindex="-1" aria-labelledby="request-mLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                                                            <div class="modal-content r-20">
                                                                                                <div class="modal-body">
                                                                                                    <div class="row">
                                                                                                    <div class="col-12 text-center">
                                                                                                        <p class="text-center fs-12 mulish-600">
                                                                                                        Apakah Kamu yakin request matching dengan
                                                                                                        <span class="color-3">
                                                                                                        ' . $users->nama . '
                                                                                                        </span>
                                                                                                            ?
                                                                                                        </p>
                                                                                                    </div>
                                                                                                        <div class="col-12 p-4 d-flex justify-content-between">
                                                                                                            <div class="d-grid gap-2">
                                                                                                                
                                                                                                                <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10">Ya</a>
                                                                                                            </div>
                                                                                                            <div class="d-grid gap-2">
                                                                                                                
                                                                                                                <button class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10" type="button"
                                                                                                                    data-bs-dismiss="modal">Kembali</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                   
                                                                                   <!-- Request Modal -->
                                                                                   ';

                                        } elseif ($cekRequest->status == 7) {
                                            $pill = '<small class=" mb-3">Request Expired</small>
                                                                                   <!-- Request Modal -->
                                                                                   <br>';
                                            echo '
                                                                                   <button type="button" class="btn bg-3 mulish-700 text-white line-morp" data-bs-toggle="modal" data-bs-target="#request-m">
                                                                                       Request <i class="fa-solid fa-retweet"></i>
                                                                                   </button>    
                                                                                   <!-- Request Modal -->
                                                                                   <div class="modal fade px-5" id="request-m" tabindex="-1" aria-labelledby="request-mLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                                                            <div class="modal-content r-20">
                                                                                                <div class="modal-body">
                                                                                                    <div class="row">
                                                                                                    <div class="col-12 text-center">
                                                                                                        <p class="text-center fs-12 mulish-600">
                                                                                                        Apakah Kamu yakin request matching dengan
                                                                                                        <span class="color-3">
                                                                                                        ' . $users->nama . '
                                                                                                        </span>
                                                                                                            ?
                                                                                                        </p>
                                                                                                    </div>
                                                                                                        <div class="col-12 p-4 d-flex justify-content-between">
                                                                                                            <div class="d-grid gap-2">
                                                                                                                
                                                                                                                <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10">Ya</a>
                                                                                                            </div>
                                                                                                            <div class="d-grid gap-2">
                                                                                                                
                                                                                                                <button class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10" type="button"
                                                                                                                    data-bs-dismiss="modal">Kembali</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                   
                                                                                   <!-- Request Modal -->
                                                                                   ';

                                        } elseif ($cekRequest->status == 8) {
                                            //    echo "Keluar batal";
                                            $pill = '<small class="">Request dibatalkan oleh anda</small> 
                                                                                   </br>
                                                                                   </br>';
                                            echo '
                                                                                   <button type="button" class="btn bg-3 mulish-700 text-white line-morp" data-bs-toggle="modal" data-bs-target="#request-m">
                                                                                       Request <i class="fa-solid fa-rotate"></i>
                                                                                   </button>
                                                                                   <!-- Request Modal -->
                                                                                   <div class="modal fade px-5" id="request-m" tabindex="-1" aria-labelledby="request-mLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                                                            <div class="modal-content r-20">
                                                                                                <div class="modal-body">
                                                                                                    <div class="row">
                                                                                                    <div class="col-12 text-center">
                                                                                                        <p class="text-center fs-12 mulish-600">
                                                                                                        Apakah Kamu yakin request matching dengan
                                                                                                        <span class="color-3">
                                                                                                        ' . $users->nama . '
                                                                                                        </span>
                                                                                                            ?
                                                                                                        </p>
                                                                                                    </div>
                                                                                                        <div class="col-12 p-4 d-flex justify-content-between">
                                                                                                            <div class="d-grid gap-2">
                                                                                                                
                                                                                                                <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10">Ya</a>
                                                                                                            </div>
                                                                                                            <div class="d-grid gap-2">
                                                                                                                
                                                                                                                <button class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10" type="button"
                                                                                                                    data-bs-dismiss="modal">Kembali</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                   
                                                                                   <!-- Request Modal -->
                                                                                   ';

                                        } else {
                                            // echo "Lainya";
                                        }


                                    } else {

                                        if ($cekRequest->status == 1) {
                                            $pill = '<small class="mb-3">Request dari ' . $users->nama . ' menunggu konfirmasi dari Anda</small> 
                                               </br>
                                               </br>';
                                            echo '

                                                                    <!-- Button trigger modal -->
                                                                            <button type="button" class="btn bg-3 mulish-700 text-white" data-bs-toggle="modal" data-bs-target="#terima-m">
                                                                            Terima <i class="fa-solid fa-check"></i>
                                                                            </button>

                                                                            <!-- Modal -->
                                                                            <div class="modal fade px-5" id="terima-m" tabindex="-1" aria-labelledby="terima-mLabel" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                                                    <div class="modal-content r-20">
                                                                                        <div class="modal-body">
                                                                                            <div class="row">
                                                                                                <div class="col-12">
                                                                                                    <p class="text-center fs-12 mulish-600">
                                                                                                    Apakah Kamu yakin ingin menerima permintaan pertemuan dengan
                                                                                                    <span class="color-3">
                                                                                                    ' . $users->nama . '
                                                                                                    </span>
                                                                                                        ?
                                                                                                    </p>
                                                                                                </div>
                                                                                                <div class="col-12 p-4 d-flex justify-content-between">
                                                                                                    <div class="">
                                                                                                        <a href="' . base_url('request_user/acc/' . $cekRequest->id) . '" class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10">Iya</a>
                                                                                                    </div>
                                                                                                    <div class="">
                                                                                                        <button class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10" type="button"
                                                                                                            data-bs-dismiss="modal">Batal</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- /Modal Option -->

                                                                            <button type="button" class="btn bg-3 mulish-700 text-white" data-bs-toggle="modal" data-bs-target="#tolak-m">
                                                                            Tolak Request <i class="fa-solid fa-circle-xmark"></i>
                                                                            </button>
                                                                            <!-- MOdal tolak-m -->
                                                                            <!-- Modal -->
                                                                <div class="modal fade px-5" id="tolak-m" tabindex="-1" aria-labelledby="tolak-mLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content r-20">
                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <p class="text-center fs-12 mulish-600">
                                                                                            Apakah Kamu yakin ingin menolak permintaan pertemuan dengan
                                                                                            <span class="color-3">
                                                                                            ' . $users->nama . '
                                                                                            </span>
                                                                                                ?
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="col-12 p-4 d-flex justify-content-between">
                                                                                            <div class="">
                                                                                                <a href="' . base_url('request_user/reject/' . $cekRequest->id) . '" class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10">Iya</a>
                                                                                            </div>
                                                                                            <div class="">
                                                                                                <button class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10" type="button"
                                                                                                    data-bs-dismiss="modal">Batal</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /Modal Option -->
                                               ';
                                        } elseif ($cekRequest->status == 2) {
                                            // echo "Menunggu room";
                                            $pill = '<small class="mb-3">Request dari ' . $users->nama . ' menunggu room meet dari admin</small> 
                                                           </br>
                                                           </br>';
                                            echo '
                                                           <a href="' . base_url('request_user/masuk/all/' . $cekRequest->id) . '" class="btn bg-3 mulish-700 text-white line-morp">
                                                               Lihat Request <i class="fa-solid fa-circle-info"></i>
                                                           </a>
                                                           
                                                           
                                                           ';

                                        } elseif ($cekRequest->status == 3) {
                                            // echo "reject";
                                            $pill = '<small class="mb-3">Request ditolak oleh anda </small> 
                                                           </br></br>';
                                            echo '
                                            <button type="button" class="btn bg-3 mulish-700 text-white line-morp" data-bs-toggle="modal" data-bs-target="#request-m">
                                            Request <i class="fa-solid fa-rotate"></i>
                                        </button>
                                        <!-- Request Modal -->
                                        <div class="modal fade px-5" id="request-m" tabindex="-1" aria-labelledby="request-mLabel" aria-hidden="true">
                                             <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                 <div class="modal-content r-20">
                                                     <div class="modal-body">
                                                         <div class="row">
                                                         <div class="col-12 text-center">
                                                             <p class="text-center fs-12 mulish-600">
                                                             Apakah Kamu yakin request matching dengan
                                                             <span class="color-3">
                                                             ' . $users->nama . '
                                                             </span>
                                                                 ?
                                                             </p>
                                                         </div>
                                                             <div class="col-12 p-4 d-flex justify-content-between">
                                                                 <div class="d-grid gap-2">
                                                                     
                                                                     <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10">Ya</a>
                                                                 </div>
                                                                 <div class="d-grid gap-2">
                                                                     
                                                                     <button class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10" type="button"
                                                                         data-bs-dismiss="modal">Kembali</button>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                        
                                        <!-- Request Modal -->              
                                            ';

                                        } elseif ($cekRequest->status == 4) {


                                            $pill = '<small class="mb-3">Request di konfirmasi oleh admin </small> </br>' . $text . ' </br></br>';
                                            echo '
                                                           <a href="' . base_url('jadwal_user/index/' . $cekRequest->id) . '" class="btn bg-3 mulish-700 text-white">
                                                               Lihat Jadwal <i class="fa-solid fa-calendar-days"></i>
                                                           </a> 
                                                           
                                                       
                                                           ';

                                        } elseif ($cekRequest->status == 5) {
                                            $pill = '<small class="mb-3">Request Selesai</small> </br></br>';
                                            echo '
                                            <button type="button" class="btn bg-3 mulish-700 text-white line-morp" data-bs-toggle="modal" data-bs-target="#request-m">
                                            Request <i class="fa-solid fa-rotate"></i>
                                        </button>
                                        <!-- Request Modal -->
                                        <div class="modal fade px-5" id="request-m" tabindex="-1" aria-labelledby="request-mLabel" aria-hidden="true">
                                             <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                 <div class="modal-content r-20">
                                                     <div class="modal-body">
                                                         <div class="row">
                                                         <div class="col-12 text-center">
                                                             <p class="text-center fs-12 mulish-600">
                                                             Apakah Kamu yakin request matching dengan
                                                             <span class="color-3">
                                                             ' . $users->nama . '
                                                             </span>
                                                                 ?
                                                             </p>
                                                         </div>
                                                             <div class="col-12 p-4 d-flex justify-content-between">
                                                                 <div class="d-grid gap-2">
                                                                     
                                                                     <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10">Ya</a>
                                                                 </div>
                                                                 <div class="d-grid gap-2">
                                                                     
                                                                     <button class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10" type="button"
                                                                         data-bs-dismiss="modal">Kembali</button>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                        
                                        <!-- Request Modal -->
                                                                       ';

                                        } elseif ($cekRequest->status == 6) {
                                            // echo "aaa";
                                            $pill = '<small class="mb-3">Request ditolak oleh admin</small>     
                                                                       </br> </br>';
                                            echo '
                                            <button type="button" class="btn bg-3 mulish-700 text-white line-morp" data-bs-toggle="modal" data-bs-target="#request-m">
                                            Request <i class="fa-solid fa-rotate"></i>
                                        </button>
                                        <!-- Request Modal -->
                                        <div class="modal fade px-5" id="request-m" tabindex="-1" aria-labelledby="request-mLabel" aria-hidden="true">
                                             <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                 <div class="modal-content r-20">
                                                     <div class="modal-body">
                                                         <div class="row">
                                                         <div class="col-12 text-center">
                                                             <p class="text-center fs-12 mulish-600">
                                                             Apakah Kamu yakin request matching dengan
                                                             <span class="color-3">
                                                             ' . $users->nama . '
                                                             </span>
                                                                 ?
                                                             </p>
                                                         </div>
                                                             <div class="col-12 p-4 d-flex justify-content-between">
                                                                 <div class="d-grid gap-2">
                                                                     
                                                                     <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10">Ya</a>
                                                                 </div>
                                                                 <div class="d-grid gap-2">
                                                                     
                                                                     <button class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10" type="button"
                                                                         data-bs-dismiss="modal">Kembali</button>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                        
                                        <!-- Request Modal -->
                                                                       <!-- Request Modal -->
                                                                       ';

                                        } elseif ($cekRequest->status == 7) {
                                            $pill = '<small class="mb-3">Request Expired</small> </br> </br>';
                                            echo '
                                                                       <!-- Request Modal -->
                                                                       <button type="button" class="btn bg-3 mulish-700 text-white line-morp" data-bs-toggle="modal" data-bs-target="#request-m">
                                                                       Request <i class="fa-solid fa-rotate"></i>
                                                                   </button>
                                                                   <!-- Request Modal -->
                                                                   <div class="modal fade px-5" id="request-m" tabindex="-1" aria-labelledby="request-mLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content r-20">
                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                    <div class="col-12 text-center">
                                                                                        <p class="text-center fs-12 mulish-600">
                                                                                        Apakah Kamu yakin request matching dengan
                                                                                        <span class="color-3">
                                                                                        ' . $users->nama . '
                                                                                        </span>
                                                                                            ?
                                                                                        </p>
                                                                                    </div>
                                                                                        <div class="col-12 p-4 d-flex justify-content-between">
                                                                                            <div class="d-grid gap-2">
                                                                                                
                                                                                                <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10">Ya</a>
                                                                                            </div>
                                                                                            <div class="d-grid gap-2">
                                                                                                
                                                                                                <button class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10" type="button"
                                                                                                    data-bs-dismiss="modal">Kembali</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                   <!-- Request Modal -->
                                                                       <!-- Request Modal -->
                                                                       ';

                                        } elseif ($cekRequest->status == 8) {
                                            // echo "masuk batal";
                                            $pill = '<small class="mb-3">Request dibatalkan oleh ' . $users->nama . ' </small> </br> </br>';
                                            echo '
                                            <button type="button" class="btn bg-3 mulish-700 text-white line-morp" data-bs-toggle="modal" data-bs-target="#request-m">
                                            Request <i class="fa-solid fa-rotate"></i>
                                        </button>
                                        <!-- Request Modal -->
                                        <div class="modal fade px-5" id="request-m" tabindex="-1" aria-labelledby="request-mLabel" aria-hidden="true">
                                             <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                 <div class="modal-content r-20">
                                                     <div class="modal-body">
                                                         <div class="row">
                                                         <div class="col-12 text-center">
                                                             <p class="text-center fs-12 mulish-600">
                                                             Apakah Kamu yakin request matching dengan
                                                             <span class="color-3">
                                                             ' . $users->nama . '
                                                             </span>
                                                                 ?
                                                             </p>
                                                         </div>
                                                             <div class="col-12 p-4 d-flex justify-content-between">
                                                                 <div class="d-grid gap-2">
                                                                     
                                                                     <a href="' . base_url('request_user/request/' . $users->id_user) . '" class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10">Ya</a>
                                                                 </div>
                                                                 <div class="d-grid gap-2">
                                                                     
                                                                     <button class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10" type="button"
                                                                         data-bs-dismiss="modal">Kembali</button>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                        
                                        <!-- Request Modal -->
                                                                       ';

                                        } else {
                                            // echo "Lainya";
                                        }
                                    }

                                }

                                ?>




                            </div>
                            </div>
                </div>
                <div class="col-12">
                <?php if (!empty($pill)) {
    echo $pill;
} ?>
                </div>
            </div>
            
    </section>
    <script>
         $(".btn-profil-m").click(function () {
            $(".profile-detail").toggleClass("d-none");
            $(".profile-front").toggleClass("d-none");
        // $('.btn-batal-ubah').addClass('d-none');
        // $('.btn-ubah').removeClass('d-none');
        // $('.alamat').removeClass('d-none');
        // $('.input-alamat').addClass('d-none');
        // alert('sada');
    });
    </script>

</div >