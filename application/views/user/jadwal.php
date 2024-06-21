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
                                                        <form action="<?= base_url('jadwal_user/') ?>" method="get" class="row gx-3 gy-2 align-items-center">
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
                                                                            $statusText = '<span class="badge bg-warning rounded-pill">Hari ini</span>';
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
                                                                }elseif($j->status_req== 7){
                                                                    $statusText = '<span class="badge bg-danger rounded-pill">Expired</span>';
                                                                    $statusMeet = 5;
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
<style>

.scroll-container {
    width: 100%; /* Lebar kontainer */
    /* height: 300px; Tinggi kontainer */
    overflow-x: auto; /* Aktifkan scroll horizontal */
    overflow-y: none; /* Aktifkan scroll horizontal */
    white-space: nowrap; /* Pastikan konten tidak mematahkan baris */
    /* border: 1px solid #ccc; Garis tepi untuk kontainer */
    padding: 10px; /* Padding untuk kontainer */
}

.scroll-item {
    display: inline-block; /* Membuat item berada dalam satu baris */
    width: 80%; /* Lebar setiap item */
    margin-right: 10px; /* Jarak antar item */
    vertical-align: top; /* Memastikan item berada di atas */
}

.card-body {
    white-space: normal; /* Pastikan teks dalam card mengikuti lebar card */
}

.horizontal-scroll {
        overflow-x: auto;
        white-space: nowrap;
        /* margin: 0px 20px ; */
    }
    .horizontal-scroll .card {
        display: inline-block;
        margin-right: 1rem; /* Optional: Adds space between cards */
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
    transition: background-color 0.3s, box-shadow 0.3s; /* Transisi untuk latar belakang dan bayangan kotak */
}

.navbar-transparent {
    background-color: transparent;
    box-shadow: none; /* Tanpa bayangan kotak */
}

.navbar-white {
    background-color: white !important;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Bayangan kotak untuk memberikan efek mengapung */
}
.text-brand{
    color:#e7008b ;
}
.card-morp{
    background: rgba( 255, 255, 255, 0.25 );
    box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
    backdrop-filter: blur( 4.5px );
    -webkit-backdrop-filter: blur( 4.5px );
    border-radius: 10px;
    border: 1px solid rgba( 255, 255, 255, 0.18 );
    color:white;
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

}
.card-morp-2{
    background: rgba( 255, 255, 255, 0.5 );
    box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
    backdrop-filter: blur( 20px );
    -webkit-backdrop-filter: blur( 20px );
    border-radius: 10px;
    border: 1px solid rgba( 255, 255, 255, 0.18 );
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

    .btn-m{
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

<?php $this->load->view('user/component/headOne');?>


    <div class="container-fluid pt-5 mb-4" style="">
        <div class="pt-5"></div>
        <div class="pt-5"></div>
        <div class="pt-3"></div>
            <div class="row">
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

                                        $statusText = '<span class="fs-8 text-warning">'.$selisih_hari.' Hari lagi</span>';
                                        $statusMeet = 1;
                                        }elseif($tgl_sekarang == $tgl_meet){
                                            if($waktu_sekarang <= $j->jmm){
                                                $statusText = '<span class="fs-8 text-warning">Hari ini</span>';
                                                $statusMeet = 2;
                                            }elseif($waktu_sekarang >= $j->jmm && $waktu_sekarang <= $j->jms){
                                                $statusText = '<span class="fs-8 text-primary">Meet Sekarang</span>';
                                                $statusMeet = 3;
                                            }elseif($waktu_sekarang >= $j->jms){
                                                $statusText = '<span class="fs-8 text-danger">Expired</span>';
                                                $statusMeet = 4;
                                            }

                                        }elseif($tgl_sekarang >= $tgl_meet){
                                            $statusText = '<span class="fs-8 text-danger">Expired</span>';
                                            $statusMeet = 4;
                                        }else{
                                            // echo "asdasd";
                                        }
                                    }elseif($j->status_req== 5){
                                        $statusText = '<span class="fs-8 text-success">Selesai</span>';
                                        $statusMeet = 5;
                                    }elseif($j->status_req== 6){
                                        $statusText = '<span class="fs-8 text-danger">Room Ditolak</span>';
                                        $statusMeet = 6;
                                    }elseif($j->status_req== 7){
                                        $statusText = '<span class="fs-8 text-danger">Expired</span>';
                                        $statusMeet = 5;
                                    }
                                    
                    ?>

<div class="col-md-6 mb-4">
            <div class="card card-users">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between">
                         
                                <div class="d-flex justify-content-between">
                                    <div class="my-auto">
                                        <?php 
                                            if($this->session->userdata('id')==$j->id_user1){
                                                ?>
                                                <?php if ($j->foto_user2 == null) { ?>
                                                    <img src="<?= base_url('assets/admin/img/user.png') ?>" alt="" width="50" height="50" class="rounded-circle">
                                                    
                                                <?php } else { ?>
                                                    <img src="<?= base_url('assets/user/foto/' . $j->foto_user2) ?>" alt="" width="50" height="50" class="rounded-circle">
                                                <?php } ?>
                                               
                                            <?php
                                            }else{ ?>
                                                <?php if ($j->foto_user1 == null) { ?>
                                                    <img src="<?= base_url('assets/admin/img/user.png') ?>" alt="" width="50" height="50" class="rounded-circle">
                                                    
                                                <?php } else { ?>
                                                    <img src="<?= base_url('assets/user/foto/' . $j->foto_user1) ?>" alt="" width="50" height="50" class="rounded-circle">
                                                <?php } ?>
                                              
                                            <?php }
                                            ?>
                                    </div>
                                    <div class="my-auto">
                                        <div class="user-info">
                                          
                                            <?php 
                                                if($this->session->userdata('id')==$j->id_user1){
                                                    ?>
                                                    <h5 ><?=$j->nama_user2?></h5>
                                                <?php
                                                }else{ ?>
                                                    <h5 ><?=$j->nama_user1?></h5>
                                                <?php }
                                                ?>
    
                                            
                                            <p> <?= date('d-m-Y', strtotime($tgl_meet))
                                                    ?></p>
                                        </div>
                                    </div>
                                </div>
                            <div class="d-flex justify-content-between my-auto">
                            <!-- <p class="my-auto"><?=$statusText?></p> -->
                            <a href="#" class="text-decoration-none color-3 my-auto colaps-jadwal" data-bs-toggle="collapse" data-bs-target="#collapse<?=$j->id?>" aria-expanded="false" aria-controls="collapse<?=$j->id?>">
                            <?=$statusText?> <i class="fas fa-chevron-circle-down"></i>
                            </a>


                         
                            </div>
                        </div>    
                        <div class="col-12">
                            <div class="collapse" id="collapse<?=$j->id?>">
                               <div class="row p-2">
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="fs-8 color-3">
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
                                
                                        <button val="<?=$j->id_request?>" type="button" class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10 my-auto open" >Meet</button>

                                    
                                        
                                        <?php }?>


                                </div>
                                </div>
                               </div>
                            </div>
                        </div>                              
                    </div>                                
                </div>
            </div>
        </div>

                  
                    
                    <?php
                    }?>

                



                </div>
              
            </div>
        </div>
    </section>

</div>