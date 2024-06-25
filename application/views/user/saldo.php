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
                                <h5>Saldo</h5>
                            </div>
                        </div>
                        
                        <div class="row">
                           
                            <div class="col-12">
                                <div class="card card-all">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#saldo">
                                                    Beli Saldo
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="saldo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="saldoLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="saldoLabel">Pembelian SDaldo</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               <div class="row">
                                                                    <div class="col-6 border-end" style="">
                                                                        <form method="POST" action="<?=base_url('saldo_user/beli')?>" enctype="multipart/form-data" >
                                                                        <div class="mb-2">
                                                                            <label for="">Total Saldo</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="number" name="menit" class="form-control" placeholder="Jumlah Saldo" aria-label="Jumlah Saldo" aria-describedby="saldo" id="menit" required>
                                                                                <span class="input-group-text" id="saldo">Request</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2">
                                                                            <label for="">Total Bayar</label>
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text" id="bayarLabel">Rp</span>
                                                                                <input type="text" name="bayar" class="form-control" placeholder="Jumlah Saldo" aria-label="Jumlah Saldo" aria-describedby="bayarlabel" id="bayar" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2">
                                                                            <label for="">Bukti Bayar</label>
                                                                                <div class="mb-2">
                                                                                    <img src="" alt="" id="blah" class="" style="width:100%">
                                                                                </div>
                                                                                <div class="mb-2">
                                                                                    <div class="d-grid gap-2">
                                                                                        <label for="imgInp" id="" style="" class="btn btn-primary text-white mt-3">
                                                                                        Pilih
                                                                                        </label>
                                                                                    </div>

                                                                                    <input type="file" name="file" id="imgInp" class="d-none" accept="image/*" required>
                                                                                </div>
                                                                                <div class="mb-2">
                                                                                    <div class="d-grid gap-2">
                                                                                        <button class="btn bg-3 text-white" type="submit">Beli</button>
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <h6>
                                                                            Keterangan
                                                                        </h6>
                                                                        <ul>
                                                                            <li>Request gratis 3x</li>
                                                                            <li>Setelah request gratis habis, pengguna di ajurkan untuk mengisi saldo request</li>
                                                                            <li>Harga 1 kali request adalah Rp. 1.000,-</li>
                                                                        </ul>
                                                                        <h6>
                                                                            Pembelian
                                                                        </h6>
                                                                        <ul>
                                                                            <li>Masukkan jumlah total pembayaran</li>             
                                                                            <li>Harga 1 kali request adalah Rp. 1.000,-</li>
                                                                            <li>Upload bukti bayar</li>
                                                                            <li>Tunggu validasi dari admin</li>
                                                                            <li>Pemebelian saldo selesai, saldo siap digunakan</li>
                                                                        </ul>
                                                                    </div>
                                                               </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                        <table class="table table-bordered bg-white w-100" id="myTable">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Saldo</th>
                                                                    <th>Harga</th>
                                                                    <th>Jenis</th>
                                                                    <th>Keterangan</th>
                                                                    <th>Status</th>
                                                                    <th>Tgl Update</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $no=1;
                                                                foreach ($saldo as $s) {
                                                                    ?>
                                                                    <tr>
                                                                        <td ><?php echo $no++ ?></td>
                                                                      
                                                                        <td><?php echo number_format($s->saldo) ?></td>
                                                                        <td>Rp. <?php echo number_format($s->nominal)?></td>
                                                                        <td><?php echo $s->jenis ?></td>
                                                                        <td><?php echo $s->keterangan ?></td>
                                                                       
                                                                        <td>
                                                                        <?php if($s->status=='belum-validasi'){?>
                                                                            <small class="rounded-pill bg-danger text-white badge">
                                                                                Belum Validasi
                                                                            </small>
            
                                                                            <?php }else{?>
                                                                                <small class="rounded-pill bg-success text-white badge">
                                                                                Validasi
                                                                            </small>
            
                                                                                <?php }?>
                                                                        </td>
                                                                        <td><?php echo $s->tgl_update ?></td>
                                                                        
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                ?>
            
                                                            </tbody>
                                                        </table>
                                                </div>
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
    <!-- Modal Saldo beli -->
    <div class="modal fade p-3" id="saldo-m" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="saldo-mLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="saldo-mLabel">Pembelian Saldo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
                    <div class="col-lg-6 border-end" style="">
                        <form method="POST" action="<?=base_url('saldo_user/beli')?>" enctype="multipart/form-data" >
                        <div class="mb-2">
                            <label for="">Total Saldo</label>
                            <div class="input-group mb-3">
                                <input type="number" name="menit" class="form-control form-control-sm" placeholder="Masukkan Jumlah Saldo" aria-label="Masukkan Jumlah Saldo" aria-describedby="saldo" id="menit-m" required>
                                <span class="input-group-text" id="saldo">Request</span>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="">Total Bayar</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="bayarLabel">Rp</span>
                                <input type="text" name="bayar" class="form-control form-control-sm" placeholder="Jumlah Saldo" aria-label="Jumlah Saldo" aria-describedby="bayarlabel" id="bayar-m" readonly>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="">Bukti Bayar</label>
                                <div class="mb-2">
                                    <img src="" alt="" id="blahM" class="" style="width:100%">
                                </div>
                                <div class="mb-2">
                                    <div class="d-grid gap-2">
                                        <label for="imgInpM" id="" style="" class="btn btn-primary text-white mt-3">
                                        Pilih Gambar
                                        </label>
                                    </div>

                                    <input type="file" name="file" id="imgInpM" class="d-none" accept="image/*" required>
                                </div>
                                <div class="mb-2">
                                    <div class="d-grid gap-2">
                                        <button class="btn bg-3 text-white" type="submit">Beli</button>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <hr>
                        <h6>
                            Keterangan
                        </h6>
                        <ul>
                            <li>Request gratis 3x</li>
                            <li>Setelah request gratis habis, pengguna di ajurkan untuk mengisi saldo request</li>
                            <li>Harga 1 kali request adalah Rp. 1.000,-</li>
                        </ul>
                        <h6>
                            Pembelian
                        </h6>
                        <ul>
                            <li>Masukkan jumlah total pembayaran</li>             
                            <li>Harga 1 kali request adalah Rp. 1.000,-</li>
                            <li>Upload bukti bayar</li>
                            <li>Tunggu validasi dari admin</li>
                            <li>Pemebelian saldo selesai, saldo siap digunakan</li>
                        </ul>
                    </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
            </div>
            </div>
        </div>
    </div>
    <!-- /Modal Saldo beli -->
        <div class="container-fluid fixed-top bg-white " id="navbar">
            <div class="row px-2">
                <div class="col-12 d-flex justify-content-between py-3">
                    <div class="text" id="text-name" onclick="window.history.back()"><i
                            class="fa-solid fa-arrow-left fa-xl"></i>
                    </div>
                    <div class="">
                        <p class="mulish-700">Saldo</p>
                    </div>
                    <div class=""></div>
                </div>
            </div>
        </div>
        <div class="container pt-5 mb-4">
            <div class="row pt-3">
                <div class="col-12 p-2">
                    <div class="d-grid gap-2">
                        <button class="btn bg-3 text-white" type="button" data-bs-toggle="modal" data-bs-target="#saldo-m">Beli Saldo</button>
                       

                    </div>
                </div>
                <div class="col-12">
                    <?php
                        $no=1;
                        foreach ($saldo as $s) {
                            ?>
                    <div class="card mb-2 card-all">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 fs-12">
                                    <table >
                                        <tr>
                                            <td>Saldo</td>
                                            <td><?php echo number_format($s->saldo) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nominal</td>
                                            <td>Rp. <?php echo number_format($s->nominal)?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Jenis
                                            </td>
                                            <td><?php echo $s->jenis ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Keterangan
                                            </td>
                                            <td><?php echo $s->keterangan ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>
                                            <?php if($s->status=='belum-validasi'){?>
                                                <small class="rounded-pill bg-danger text-white badge">
                                                    Belum Validasi
                                                </small>
    
                                                <?php }else{?>
                                                    <small class="rounded-pill bg-success text-white badge">
                                                    Validasi
                                                </small>
    
                                                    <?php }?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td><?php echo $s->tgl_update ?></td>
                                        </tr>
                                                                       
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    
           
            </div>

        </div>
    </section>

</div>