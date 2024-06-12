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
                    <div class="col-12 ">
                        <div class="row">
                            <div class="col-12" id="test">
                                <h5>Jadwal Meet</h5>
                            </div>
                        </div>
                        <div class="bg-warning p-3 rounded-2 d-none" id="timer" style="position:absolute;right:10px;top:50%;z-index:8"></div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-all">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 mb-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form action="<?= base_url('jadwal_user/') ?>" method="post" class="row gx-3 gy-2 align-items-center">
                                                            <div class="col-sm-3">
                                                                <input type="text" name="cari" class="form-control"
                                                                    placeholder="Cari nama.." onchange="this.form.submit();"
                                                                    value="<?= $cari ?>">
                                                                   
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <select name="sort" id="" class="form-select" onchange="this.form.submit();">
                                                                    <option value="asc" <?php if ($sort == 'asc') {
                                                                        echo "selected";
                                                                    } ?>>A-Z</option>
                                                                    <option value="desc" <?php if ($sort == 'desc') {
                                                                        echo "selected";
                                                                    } ?>>Z-A</option>
                                                                </select>                                                        
                                                            </div>
                                                           
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 pt-3">
                                            <?php

                                                foreach ($jadwal as $j) { 
                                                    $tgl_sekarang = date('d-m-Y');
                                                    $tgl_meet = date('d-m-Y', strtotime($j->tgl_meeting));   
                                                    $tgl_meet = date('d-m-Y', strtotime($j->tgl_meeting)); // 
                                                        

                                                            $waktu_sekarang = date('H:i:s');

                                                            $waktu_sekarang_timestamp = strtotime($tgl_sekarang . ' ' . $waktu_sekarang);
                                                            $jam_mulai = strtotime($j->jmm);
                                                            $jam_selesai = strtotime($j->jms);
                                                            $statusMeet = '';
                                                            $statusText = '';
                                                                // echo $waktu_sekarang.$j->jmm;
                                                                if($j->status_req==4){
                                                                    if($tgl_sekarang < $tgl_meet){
                                                                        $selisih_hari = floor((strtotime($tgl_meet) - strtotime($tgl_sekarang)) / (60 * 60 * 24)); 

                                                                    $statusText = '<span class="badge bg-warning rounded-pill">'.$selisih_hari.' Hari lagi</span>';
                                                                    $statusMeet = 1;
                                                                    }elseif($tgl_sekarang == $tgl_meet){
                                                                        if($waktu_sekarang <= $j->jmm){
                                                                            $statusText = '<span class="badge bg-warning rounded-pill">Meet Sekarang</span>';
                                                                            $statusMeet = 2;
                                                                        }elseif($waktu_sekarang >= $j->jmm && $waktu_sekarang <= $j->jms){
                                                                            $statusText = '<span class="badge bg-primary rounded-pill">Meet Sekarang</span>';
                                                                            $statusMeet = 3;
                                                                        }elseif($waktu_sekarang >= $j->jms){
                                                                            $statusText = '<span class="badge bg-danger rounded-pill">Expired</span>';
                                                                            $statusMeet = 4;
                                                                        }

                                                                    }elseif($tgl_sekarang >= $tgl_meet){
                                                                        $statusText = '<span class="badge bg-danger rounded-pill">Expired</span>';
                                                                        $statusMeet = 4;
                                                                    }else{
                                                                        // echo "asdasd";
                                                                    }
                                                                }elseif($j->status_req== 5){
                                                                    $statusText = '<span class="badge bg-success rounded-pill">Selesai</span>';
                                                                    $statusMeet = 5;
                                                                }elseif($j->status_req== 6){
                                                                    $statusText = '<span class="badge bg-danger rounded-pill">Room Ditolak</span>';
                                                                    $statusMeet = 6;
                                                                }
                                                                
                                                ?>
                                                <div class="card rounded-0 mb-3">
                                                    <div class="card-body">
                                                        <div class="col-12 d-flex justify-content-between content-items-center">
                                                            <div class="">
                                                            
                                                                    <?=$statusText;?>
                                                                <br>
                                                                <br>
                                                                <?php
                                                                
                                                                if($this->session->userdata('id')==$j->id_user1){
                                                                    ?>
                                                                     <a href="<?=base_url('users_user/detail/'.$j->id_user2)?>" class="fw-bold text-decoration-none">
                                                                    <?= $j->nama_user2 ?>
                                                                    </a>
                                                                <?php
                                                                }else{ ?>
                                                                     <a href="<?=base_url('users_user/detail/'.$j->id_user1)?>" class="fw-bold text-decoration-none">
                                                                    <?= $j->nama_user1 ?>
                                                                    </a>
                                                                <?php }
                                                                ?>

                                                               
                                                                <br>
                                                                <table>
                                                                    <tr>
                                                                        <td>Tgl</td>
                                                                        <td>:</td>
                                                                        <td>
                                                                        <?= $tgl_meet ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Jam</td>
                                                                        <td>:</td>
                                                                        <td><?= $j->jmm ?> - <?= $j->jms ?> (<?= $j->waktu ?> menit)</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Waktu</td>
                                                                        <td>:</td>
                                                                        <td> <?= $j->waktu ?> menit</td>
                                                                    </tr>
                                                                </table>
                                                               
                                                            </div>
                                                            <div class="my-auto">
                                                          
                                                                <?php
                                                                
                                                                if ($j->status_req==4 && $statusMeet==3){
                                                                    
                                                                   ?>
                                                               
                                                                    <button val="<?=$j->id_request?>" type="button" class="btn btn-primary my-auto open" >Meet</button>

                                                                  
                                                                    
                                                                    <?php }?>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <?php
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
         $(document).ready(function(){
    // Definisikan fungsi parseDate sebelum digunakan
    function parseDate(dateString) {
        if (!dateString) {
            console.error("Invalid date string:", dateString);
            return null;
        }

        // Jika hanya waktu yang diberikan, tambahkan tanggal saat ini
        var currentDate = new Date();
        var dateParts = [
            currentDate.getFullYear(),
            currentDate.getMonth() + 1, // Bulan adalah 0-indexed di JavaScript
            currentDate.getDate()
        ];

        // Asumsikan format dateString adalah "HH:MM:SS"
        var timeParts = dateString.split(':');

        if (timeParts.length !== 3) {
            console.error("Invalid time format:", dateString);
            return null;
        }

        return new Date(
            dateParts[0],     // Tahun
            dateParts[1] - 1, // Bulan (0-indexed)
            dateParts[2],     // Hari
            timeParts[0],     // Jam
            timeParts[1],     // Menit
            timeParts[2]      // Detik
        );
    }

    $('.open').click(function(){
        var currentTime = new Date();
        var id = $(this).attr('val');
        
        
        $.ajax({
            url: '<?php echo base_url(); ?>request_user/get_req/' + id,
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var url = data.link_zoom;
                var jamSelesaiStr = data.jam_selesai; // Misalnya: "12:00:00"

                // Parsel string waktu manual jika format tidak sesuai
                var jamSelesai = parseDate(jamSelesaiStr);
                
                if (url && jamSelesai) {
                    
                    var waktuTunggu = jamSelesai.getTime() - currentTime.getTime() + 30000; // Menambahkan 1 menit (60.000 ms)
                    if (waktuTunggu > 0) { // Pastikan waktu tunggu adalah positif

                        var leftPosition = 0; // Tentukan posisi horizontal (sisi kiri)
                        var topPosition = 0; // Tentukan posisi vertikal (paling atas)
                        var windowFeatures = 'width=800,height=600,left=' + leftPosition + ',top=' + topPosition;
                        var newTab = window.open(url, '_blank',windowFeatures);
                       
                        
                    // Tampilkan timer
                    // Tampilkan timer
                    var timerElement = document.getElementById('timer');
                    timerElement.classList.remove('d-none');
                    // $('.open').prop('disabled', true);

                    
                    var countdownInterval = setInterval(function() {
                        var hoursLeft = Math.floor((waktuTunggu % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutesLeft = Math.floor((waktuTunggu % (1000 * 60 * 60)) / (1000 * 60));
                        var secondsLeft = Math.floor((waktuTunggu % (1000 * 60)) / 1000);

                        // Format waktu ke dalam format jam:menit:detik
                        var formattedTime = hoursLeft.toString().padStart(2, '0') + ':' +
                                            minutesLeft.toString().padStart(2, '0') + ':' +
                                            secondsLeft.toString().padStart(2, '0');
                        
                        timerElement.innerHTML = 'Sisa waktu meet anda: ' + formattedTime;
                        waktuTunggu -= 1000;
                        
                        if (waktuTunggu < 0) {
                            clearInterval(countdownInterval);
                            timerElement.innerHTML = '';
                        }
                    }, 1000);

                        setTimeout(function () {
                            newTab.close();
                           

                            // update status
                            // Tambahkan panggilan AJAX lainnya di sini
                            $.ajax({
                                url: '<?php echo base_url(); ?>request_user/update_finish/' + id,
                                type: 'POST',
                                dataType: 'json',
                                success: function (data) {
                                    console.log("Action completed successfully:", data);
                                },
                                error: function (error) {
                                    console.error("Error in another action:", error);
                                }
                            });

                            location.reload(); 

                        }, waktuTunggu);
                    } else {
                       
                        newTab.close();
                        
                    }
                        console.log( waktuTunggu);

                        // update status
                         // Tambahkan panggilan AJAX lainnya di sini
                        //  $.ajax({
                        //     url: '<?php echo base_url(); ?>request_user/update_finish/' + id,
                        //     type: 'POST',
                        //     dataType: 'json',
                        //     success: function (data) {
                        //         console.log("Action completed successfully:", data);
                        //     },
                        //     error: function (error) {
                        //         console.error("Error in another action:", error);
                        //     }
                        // });


                } else {
                    console.error("Invalid URL or jamSelesai:", url, jamSelesai);
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
        
    });
});


        </script>
    <script>
        // $('.open').click(function(){
        //     $.('.open').attr('val');
        //     alert('op');
            // $.ajax({
            //     url: '<?php echo base_url(); ?>request_admin/get_req/'+idRequest,
            //     type: 'POST',
            //     dataType: 'json',
            //     success: function (data) {
            //     console.log(data);
            //     },
            //     error: function (data) {
            //     console.log('error');
            //     }
            //   });


        // });
    </script>
    </div>
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
                                                <h4 class="text-center p-2 rounded-3 bg-success text-white">
                                                    <?= $users->nama ?>
                                                </h4>
                                            </div>
                                            <div class="col-12 d-flex justify-content-center">
                                                <p class="text-center badge bg-primary text-white">
                                                    <?php
                                                    if ($users->jenis_kelamin == 1) {
                                                        echo 'Laki-laki';
                                                    } else {
                                                        echo 'Perempuan';
                                                    } ?>
                                                </p>
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
                                                        <h6 class="">Tentang <?= $users->nama ?></h6>
                                                        <p style="font-size:12px"><?= $users->deskripsi_diri ?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">
                                                        <h6 class="">Tanggal Lahir </h6>
                                                        <p style="font-size:12px"><?= $users->tgl_lahir ?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="">Pekerjaan</h6>
                                                        <p style="font-size:12px"><?= $users->pekerjaan ?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="">Hobi</h6>
                                                        <p style="font-size:12px"><?= $users->hobi ?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">
                                                        <h6 class="">Kriteria </h6>
                                                        <p style="font-size:12px"><?= $users->kriteria_pasangan ?></p>
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
                                                        <h6 class=""><i class="fa-brands fa-facebook fa-xl"></i>
                                                            <span></span>
                                                        </h6>
                                                        <p style="font-size:12px"><?= $users->fb ?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">
                                                        <h6 class=""><i class="fa-brands fa-instagram fa-xl"></i>
                                                            <span></span>
                                                        </h6>
                                                        <p style="font-size:12px"><?= $users->ig ?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class=""><i class="fa-solid fa-location-dot fa-xl"></i>
                                                        </h6>
                                                        <p style="font-size:12px"><?= $users->alamat ?></p>
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
                                                    <button type="button" class="btn bg-1 text-white"
                                                        data-bs-toggle="modal" data-bs-target="#mm">
                                                        Request Matching
                                                    </button>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="mm" tabindex="-1" aria-labelledby="mmLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="mmLabel">Request Matching
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12 py-4">
                                                                        <h5 class="text-center">
                                                                            Yakin coba matching dengan
                                                                            <?= $users->nama ?>?
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
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