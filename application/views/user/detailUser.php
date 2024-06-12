<div class="d-none d-md-none d-sm-none d-lg-block">
    <style>
.bg-1 {
	background-color: #7575fa
  }
    </style>
    <div class="container-fluid overflow-hidden" style="background-color:#e8e8e8">
    <div class="success" id="success" success="<?php echo $this->session->userdata('success') <> '' ? $this->session->userdata('success') : ''; ?>"></div>
        <div class="row g-0 vh-100 overflow-y-auto">
            <div class="col offset-lg-2 offset-xl-2 d-flex flex-column vh-100">
                <main class="row overflow-auto py-4 px-3">
                    <div class="col-12 ">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-all">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                            <?php if ($users->foto == null) { ?>
                                                            <img src="<?= base_url('assets/admin/img/user.png') ?>" alt=""
                                                                class="rounded-3" width="140" height="140">
                                                        <?php } else { ?>
                                                            <img src="<?= base_url('assets/user/foto/' . $users->foto) ?>" alt=""
                                                                class="rounded-3" width="140" height="140">
                                                        <?php } ?>
                                            </div>
                                            <div class="col-12 pt-3 d-flex justify-content-center">
                                                <h4 class="text-center p-2 rounded-3 bg-success text-white"><?=$users->nama?></h4>
                                            </div>
                                            <div class="col-12 d-flex justify-content-center">
                                                <p class="text-center badge bg-primary text-white"><?php 
                                                if($users->jenis_kelamin==1){ echo 'Laki-laki';}elseif($users->jenis_kelamin==2){ echo 'Perempuan';}?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="text-center">Tentang</h5>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="">Tentang <?=$users->nama?></h6>
                                                        <p><?=$users->deskripsi_diri?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">                                                        
                                                        <h6 class="">Tanggal Lahir </h6>
                                                        <p><?=$users->tgl_lahir?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="">Pekerjaan</h6>
                                                        <p><?=$users->pekerjaan?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="">Hobi</h6>
                                                        <p><?=$users->hobi?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">                                                        
                                                        <h6 class="">Kriteria </h6>
                                                        <p><?=$users->kriteria_pasangan?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="text-center">Kontak</h5>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class=""><i class="fa-brands fa-facebook fa-xl"></i> <span></span></h6>
                                                        <p><?=$users->fb?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">                                                        
                                                        <h6 class=""><i class="fa-brands fa-instagram fa-xl"></i> <span></span></h6>
                                                        <p><?=$users->ig?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class=""><i class="fa-solid fa-location-dot fa-xl"></i> </h6>
                                                        <p><?=$users->alamat?></p>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 py-5">
                                                            <?php 
                                                            if($cekRequest==null){
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
                                                                                                          Yakin coba request matching dengan '.$users->nama.'?
                                                                                                      </h5>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                          <div class="modal-footer">
                                                                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                              <a href="'.base_url('request_user/request/'.$users->id_user).'" class="btn btn-primary">Ya</a>
                                                                                          </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                  <!-- Request Modal -->
                                                                                  
                                                                ';

                                                            }else{
                                                                if($cekRequest->id_user1==$isUser){
                                                                    if($cekRequest->status== 1){
                                                                                    // echo "Menuggu";
                                                                                    $pill = '<span class="badge bg-info rounded-pill mb-3">Request terkirim, menunggu konfirmasi dari '.$users->nama.'</span> </br>
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
                                                                                                    Yakin Batalkan Request Dengan '.$users->nama.' ?
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                    <a href="'.base_url('request_user/cancel/'.$cekRequest->id).'" class="btn btn-primary">Ya</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- MOdal batal -->
                                                                                    
                                                                                    ';
                                                                                    
                                                                                }elseif($cekRequest->status== 2){
                                                                                    // echo "Menunggu room";
                                                                                    $pill = '<span class="badge bg-primary rounded-pill mb-3">Request telah diterima oleh '.$users->nama.' menunggu room meet dari admin</span> </br>
                                                                                    <a href="'.base_url('request_user/keluar/'.$cekRequest->id).'" class="btn bg-1 text-white">
                                                                                      Lihat Request <i class="fa-solid fa-circle-info"></i>
                                                                                    </a>
                                                                                    
                                                                                    
                                                                                    ';
                                                                                    
                                                                                }elseif($cekRequest->status==3){
                                                                                                $pill = '<span class="badge bg-danger rounded-pill mb-3">Request ditolak oleh '.$users->nama.' </span> </br>
                                                                                               
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
                                                                                                          Yakin coba request matching dengan '.$users->nama.'?
                                                                                                      </h5>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                          <div class="modal-footer">
                                                                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                              <a href="'.base_url('request_user/request/'.$users->id_user).'" class="btn btn-primary">Ya</a>
                                                                                          </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                  <!-- Request Modal -->
                                                                                                
                                                                                                ';
                                                                                                
                                                                                            }elseif($cekRequest->status==4){
                                                                                                // echo "activation";
                                                                                                
                                                                                                $pill = '<span class="badge bg-info rounded-pill mb-3">Request di konfirmasi oleh admin </span> </br></br>'.$text.' </br>
                                                                                                <a href="'.base_url('jadwal_user/index/'.$cekRequest->id).'" class="btn bg-1 text-white"> Lihat Jadwal <i class="fa-solid fa-calendar-days"></i>
                                                                                                </a>';
                                        
                                                                                                // if()
                                        
                                                                                                
                                                                                            }elseif($cekRequest->status==5){
                                                                                                            // echo "finish";
                                                                                                            $pill='<span class="badge bg-success rounded-pill mb-3">Request Selesai</span> </br>
                                                                                                            <button type="button" class="btn bg-1 text-white" data-bs-toggle="modal" data-bs-target="#request">
                                                                                                              Request <i class="fa-solid fa-retweet"></i>
                                                                                                            </button>
                                                                                                            <a href="'.base_url('jadwal_user/index/'.$cekRequest->id).'" class="btn bg-1 text-white">
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
                                                                                                                                    Yakin coba request matching dengan '.$users->nama.'?
                                                                                                                                </h5>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="modal-footer">
                                                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                                        <a href="'.base_url('request_user/request/'.$users->id_user).'" class="btn btn-primary">Ya</a>
                                                                                                                    </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <!-- Request Modal -->
                                                                                                            ';
                                                                                                            
                                                                                                        }elseif($cekRequest->status==6){
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
                                                                                                                                    Yakin coba request matching dengan '.$users->nama.'?
                                                                                                                                </h5>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="modal-footer">
                                                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                                        <a href="'.base_url('request_user/request/'.$users->id_user).'" class="btn btn-primary">Ya</a>
                                                                                                                    </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <!-- Request Modal -->
                                                                                                            ';
                                                                                                            
                                                                                                        }elseif($cekRequest->status==7){
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
                                                                                                                                    Yakin coba request matching dengan '.$users->nama.'?
                                                                                                                                </h5>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="modal-footer">
                                                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                                        <a href="'.base_url('request_user/request/'.$users->id_user).'" class="btn btn-primary">Ya</a>
                                                                                                                    </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <!-- Request Modal -->
                                                                                                            ';
                                                                                                            
                                                                                                        }elseif($cekRequest->status==8){
                                                                                                            echo "Keluar batal";
                                                                                                            $pill='<span class="badge bg-danger rounded-pill mb-3">Request dibatalkan oleh anda</span> </br>
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
                                                                                                                                    Yakin coba request matching dengan '.$users->nama.'?
                                                                                                                                </h5>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="modal-footer">
                                                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                                        <a href="'.base_url('request_user/request/'.$users->id_user).'" class="btn btn-primary">Ya</a>
                                                                                                                    </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <!-- Request Modal -->
                                                                                                            ';
                                                                                                            
                                                                                                        }    else {
                                                                                                            // echo "Lainya";
                                                                                                        }        


                                                                }else{
                                                                   
                                                                    if($cekRequest->status==1){
                                                                        $pill = '<span class="badge bg-info rounded-pill mb-3">Request dari '.$users->nama.' menunggu konfirmasi dari Anda</span> </br>
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
                                                                                        Yakin Terima Request Dari '.$users->nama.' ?
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <a href="'.base_url('request_user/acc/'.$cekRequest->id).'" class="btn btn-primary">Ya</a>
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
                                                                                        Yakin Tolak Request Dari '.$users->nama.' ?
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <a href="'.base_url('request_user/reject/'.$cekRequest->id).'" class="btn btn-primary">Ya</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- MOdal tolak -->
                                                                        
                                                                        ';
                                                                    }elseif($cekRequest->status== 2){
                                                                                    // echo "Menunggu room";
                                                                                    $pill = '<span class="badge bg-primary rounded-pill mb-3">Request dari '.$users->nama.' menunggu room meet dari admin</span> </br>
                                                                                    <a href="'.base_url('request_user/masuk/'.$cekRequest->id).'" class="btn bg-1 text-white">
                                                                                      Lihat Request <i class="fa-solid fa-circle-info"></i>
                                                                                    </a>
                                                                                    
                                                                                    
                                                                                    ';
                                                                                    
                                                                                }elseif($cekRequest->status==3){
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
                                                                                                          Yakin coba request matching dengan '.$users->nama.'?
                                                                                                      </h5>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                          <div class="modal-footer">
                                                                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                              <a href="'.base_url('request_user/request/'.$users->id_user).'" class="btn btn-primary">Ya</a>
                                                                                          </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                  <!-- Request Modal -->';
                                                                                    
                                                                                }elseif($cekRequest->status==4){
                                                                                    
                                                                                    
                                                                                    $pill = '<span class="badge bg-info rounded-pill mb-3">Request di konfirmasi oleh admin </span> </br>'.$text.' </br>
                                                                                    <a href="'.base_url('jadwal_user/index/'.$cekRequest->id).'" class="btn bg-1 text-white">
                                                                                      Lihat Jadwal <i class="fa-solid fa-calendar-days"></i>
                                                                                    </a> 
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
                                                                                                          Yakin coba request matching dengan '.$users->nama.'?
                                                                                                      </h5>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                          <div class="modal-footer">
                                                                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                              <a href="'.base_url('request_user/request/'.$users->id_user).'" class="btn btn-primary">Ya</a>
                                                                                          </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                  <!-- Request Modal -->
                                                                                  ';
                                                                                    
                                                                                }elseif($cekRequest->status==5){
                                                                                                $pill='<span class="badge bg-success rounded-pill mb-3">Request Selesai</span> </br>
                                                                                                <button type="button" class="btn bg-1 text-white" data-bs-toggle="modal" data-bs-target="#request">
                                                                                                  Request <i class="fa-solid fa-retweet"></i>
                                                                                                </button>
                                                                                                <a href="'.base_url('jadwal_user/index/'.$cekRequest->id).'" class="btn bg-1 text-white">
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
                                                                                                                        Yakin coba request matching dengan '.$users->nama.'?
                                                                                                                    </h5>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                            <a href="'.base_url('request_user/request/'.$users->id_user).'" class="btn btn-primary">Ya</a>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Request Modal -->
                                                                                                ';
                                                                                                
                                                                                            }elseif($cekRequest->status==6){
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
                                                                                                                        Yakin coba request matching dengan '.$users->nama.'?
                                                                                                                    </h5>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                            <a href="'.base_url('request_user/request/'.$users->id_user).'" class="btn btn-primary">Ya</a>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Request Modal -->
                                                                                                ';
                                                                                                
                                                                                            }elseif($cekRequest->status==7){
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
                                                                                                                        Yakin coba request matching dengan '.$users->nama.'?
                                                                                                                    </h5>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                            <a href="'.base_url('request_user/request/'.$users->id_user).'" class="btn btn-primary">Ya</a>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Request Modal -->
                                                                                                ';
                                                                                                
                                                                                            }elseif($cekRequest->status==8){
                                                                                                // echo "masuk batal";
                                                                                                $pill='<span class="badge bg-danger rounded-pill mb-3">Request dibatalkan oleh '.$users->nama.' </span> </br>
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
                                                                                                                        Yakin coba request matching dengan '.$users->nama.'?
                                                                                                                    </h5>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                                            <a href="'.base_url('request_user/request/'.$users->id_user).'" class="btn btn-primary">Ya</a>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Request Modal -->
                                                                                                ';
                                                                                                
                                                                                            }   else {
                                                                                                // echo "Lainya";
                                                                                            }
                                                                }

                                                            }
                                                            
                                                            ?>


                                               
                                               
                                            </div>


                                   
                                        </div>

                                                


                                        <div class="row">
                                            <div class="col-12">
                                                <hr>
                                                <?php if(!empty($pill)){
                                                    echo $pill;
                                                }?>
                                            </div>
                                           
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
         $(document).ready(function(){
            $('#btn-cek').click(function(){
                var id = $(this).attr('val');

                // alert (id);
                $.ajax({
                    url: '<?php echo base_url(); ?>request_user/check_request/' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log("Action completed successfully:", data);
                        if(data.id_user1==id){
                            console.log('keluar'+data.status);
                        }else{

                            console.log('masuk'+data.status);
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
    <div class="container">
        <section class="fixed-top ">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between py-3 bg-white content-items-center">
                        <a href="<?= base_url('users_user/semua') ?>" class="text-decoration-none pt-2">
                            <i class="fa-solid fa-chevron-left"></i>

                        </a>
                        <div class="pt-2">
                            <i class="fa-solid fa-mars-and-venus-burst fa-xl color-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Top Nav -->

        <!-- Content -->

        <section id="content" style="margin-bottom: 80px;margin-top: 80px;">
            <div class="container pt-2">
                <div class="row">
                    <div class="col-12">
                    <div class="row mb-4">
                            <div class="col-12">
                                <div class="">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                            <?php if ($users->foto == null) { ?>
                                                            <img src="<?= base_url('assets/admin/img/user.png') ?>" alt=""
                                                                class="rounded-3" width="140" height="140">
                                                        <?php } else { ?>
                                                            <img src="<?= base_url('assets/user/foto/' . $users->foto) ?>" alt=""
                                                                class="rounded-3" width="140" height="140">
                                                        <?php } ?>
                                            </div>
                                            <div class="col-12 pt-3 d-flex justify-content-center">
                                                <h4 class="text-center p-2 rounded-3 bg-success text-white"><?=$users->nama?></h4>
                                            </div>
                                            <div class="col-12 d-flex justify-content-center">
                                                <p class="text-center badge bg-primary text-white"><?php 
                                                if($users->jenis_kelamin==1){ echo 'Laki-laki';}else{ echo 'Perempuan';}?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="text-center">Tentang</h6>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="">Tentang <?=$users->nama?></h6>
                                                        <p style="font-size:12px"><?=$users->deskripsi_diri?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">                                                        
                                                        <h6 class="">Tanggal Lahir </h6>
                                                        <p style="font-size:12px"><?=$users->tgl_lahir?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="">Pekerjaan</h6>
                                                        <p style="font-size:12px"><?=$users->pekerjaan?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="">Hobi</h6>
                                                        <p style="font-size:12px"><?=$users->hobi?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">                                                        
                                                        <h6 class="">Kriteria </h6>
                                                        <p style="font-size:12px"><?=$users->kriteria_pasangan?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="text-center">Kontak</h5>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class=""><i class="fa-brands fa-facebook fa-xl"></i> <span></span></h6>
                                                        <p style="font-size:12px"><?=$users->fb?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">                                                        
                                                        <h6 class=""><i class="fa-brands fa-instagram fa-xl"></i> <span></span></h6>
                                                        <p style="font-size:12px"><?=$users->ig?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class=""><i class="fa-solid fa-location-dot fa-xl"></i> </h6>
                                                        <p style="font-size:12px"><?=$users->alamat?></p>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <hr>
                                            </div>
                                            <div class="col-12">
                                                <!-- Button trigger modal -->
                                                <div class="d-grid gap-2">
                                                    <button type="button" class="btn bg-1 text-white" data-bs-toggle="modal" data-bs-target="#mm">
                                                    Request Matching
                                                    </button>
                                                </div>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="mm" tabindex="-1" aria-labelledby="mmLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="mmLabel">Request Matching</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-12 py-4">
                                                                    <h5 class="text-center">
                                                                        Yakin coba matching dengan <?=$users->nama?>?
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <a href="" class="btn btn-primary">Ya</a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>

        </section>
    </div>
</div>