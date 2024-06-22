<div class="d-none d-md-none d-sm-none d-lg-block">


    <style>

    </style>
  
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
      
        .nav-link {
            display: inline-block;
            margin-right: 10px;
            color: rgba(89, 89, 89, 1);
            }

        .nav-tabs {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            white-space: nowrap;
            }

        .nav-tabs::-webkit-scrollbar {
            width: 0;
            height: 0;
            }

        .nav-tabs::-webkit-scrollbar-thumb {
            display: none;
            }

        .nav-tabs::-webkit-scrollbar-track {
            display: none;
            }
        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            border-top: #FFFFFF;
            border-right: #FFFFFF;
            border-left: #FFFFFF;
            border-bottom: 3px solid rgba(248, 83, 113, 1);
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
            margin-bottom: 5px;
            font-size: 12px;
            font-weight: 600;
        }

        .user-info p {
            margin-bottom: 0;
            font-size: 8px;
           
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

<section>
    <?php $this->load->view('user/component/headTwo');?>

<div class="container-fluid mb-4">
    <div class="pt-3"></div>
    <div class="row pt-5">
        <div class="col-12 py-3 d-flex justify-content-between">
            <h6 class="mulish-700">Terbaru</h6>
            <form action="<?= base_url('users_user/cari') ?>" method="get">
                <input type="hidden" name="cari" value="<?=$cari?>">
                <input type="checkbox" name="semua" checked class="d-none">
                <button type="button" onclick="this.form.submit();" class="border-0 bg-transparent color-4">
                    <small>
                        Lihat semua
                    </small>
                </button>
            </form>
        </div>
    </div>
    <div class="row">
    <?php 
        foreach ($users as $nu) { 
    ?> 
            <div class="row mb-3">
                <a href="<?=base_url('users_user/detail/'.$nu->id_user)?>" class="text-decoration-none text-dark">
                    <div class="col-12 d-flex justify-content-between">
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <?php if ($nu->foto == null) { ?>
                                    <img src="<?= base_url('assets/admin/img/user.png') ?>" alt="" width="50" height="50" class="rounded-circle">
                                    
                                <?php } else { ?>
                                    <img src="<?= base_url('assets/user/foto/' . $nu->foto) ?>" alt="" width="50" height="50" class="rounded-circle">
                                <?php } ?>
                            </div>
                            <div class="my-auto">
                                <div class="user-info">
                                    <h5><?=$nu->nama?></h5>
                                    <p class="color-4">
                                        <?=$nu->kabupaten?>, <?=$nu->provinsi?>
                                    </p>
                                </div>
                            </div>
                        </div>                        
                </a>
                  
                </div>                                  
            </div>                                
      
    <?php } ?>
    </div>
       
</div>
    <script>

    $(document).ready(function () {
        $("#test").click(function(){
            alert('aa');
        });
    });

        window.addEventListener('scroll', function() {
            var navbar = document.getElementById('navbar');
            var text = document.getElementById('text-name');
            var brand = document.getElementById('brand');
            if (window.scrollY > 0) {
                navbar.classList.remove('navbar-transparent');
                navbar.classList.add('navbar-white');
                text.classList.remove('text-white');
                text.classList.add('text-dark');
                brand.classList.remove('text-white');
                brand.classList.add('text-brand');
            } else {
                navbar.classList.remove('navbar-white');
                navbar.classList.add('navbar-transparent');
                text.classList.remove('text-dark');
                text.classList.add('text-white');
                brand.classList.remove('text-brand');
                brand.classList.add('text-white');
            }
        });
    </script>
</section>
</div>