<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/user/bootstrap/css/bootstrap.min.css') ?>">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/user/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/user/css/mycss.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>


    <title>Matchmaking</title>
</head>
<style>
    * {
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-style: normal;

    }

    .my-nav-con {
        border-right: 2px solid #7575fa;
        border-radius: 10px;
        font-size: 14px;
    }

    .my-nav {
        width: 100%;
        padding: 5px 10px;
        text-decoration: none;
        color: #393839;
        margin-top: 12px
    }

    .my-nav:hover {
        background-color: #7575fa;
        border-radius: 10px;
        color: white
    }

    .my-nav-active {
        background-color: #7575fa;
        border-radius: 10px;
        color: white
    }

    /* .icon {
        background-color: #8c898c;
        color: white;
        width: 26px;
        height: 26px;
        padding: 5px;
        border-radius: 50px;
    } */

    /* .icon-active {
        background-color: white;
        color: #7575fa;
    } */

    .color-1 {
        color: #7575fa;
    }

    .color-2 {
        color: #d600ff;
    }

    .color-3 {
        color: #fa75e7;
    }
</style>

<body>
    <div class="d-none d-md-none d-sm-none d-lg-block">
        <div class="col-lg-2 d-none d-md-none d-sm-none d-lg-block col-xl-2 d-flex fixed-top" id="sidebar"
            style="background-color:white">
            <div
                class="my-nav-con d-flex flex-column flex-grow-1 align-items-center align-items-sm-start px-2 px-sm-3 py-2  vh-100 overflow-auto">
                <a href="<?= base_url('dashboard_user') ?>"
                    class="d-flex align-items-center text-center pb-sm-3 mb-md-0 me-md-auto  text-decoration-none py-3">
                    <span class="fs-5 text-center"><i class="fa-solid fa-mars-and-venus-burst fa-2xl"></i><span
                            class="d-none d-sm-inline">Matchmaking</span></span>
                </a>
                <div class="pt-5"></div>
                <a class=" my-nav   <?php if ($this->uri->segment(1) == 'dashboard_user')
                    echo 'my-nav-active'; ?>" aria-current="page" href="<?= base_url('dashboard_user') ?>"><i class="icon  fa-solid fa-house <?php if ($this->uri->segment(1) == 'dashboard_user')
                            echo 'icon-active '; ?>"></i>
                    <span class="ms-2">Home</span></a>



                <a class=" my-nav <?php if ($this->uri->segment(1) == 'users_user')
                    echo 'my-nav-active'; ?>" aria-current="page" href="<?= base_url('users_user/semua') ?>"><i class="icon fa-solid fa-magnifying-glass <?php if ($this->uri->segment(1) == 'users_user')
                            echo 'icon-active '; ?>"></i>
                    <span class="ms-2"> Pengguna</span></a>

                <a class=" my-nav <?php if ($this->uri->segment(2) == 'keluar')
                    echo 'my-nav-active'; ?>" aria-current="page" href="<?= base_url('request_user/keluar') ?>"><i class="icon fa fa-arrow-up <?php if ($this->uri->segment(1) == 'keluar')
                            echo 'icon-active '; ?>"></i>
                    <span class="ms-2"> Request Keluar</span></a>
                    
                <a class=" my-nav <?php if ($this->uri->segment(2) == 'masuk')
                    echo 'my-nav-active'; ?>" aria-current="page" href="<?= base_url('request_user/masuk') ?>"><i class="icon fa fa-arrow-down <?php if ($this->uri->segment(2) == 'masuk')
                            echo 'icon-active '; ?>"></i>
                    <span class="ms-2"> Request Masuk</span></a>
                <a class=" my-nav <?php if ($this->uri->segment(1) == 'jadwal_user')  
                    echo 'my-nav-active'; ?>" aria-current="page" href="<?= base_url('jadwal_user/') ?>"><i class="icon fa fa-calendar-days <?php if ($this->uri->segment(2) == 'jadwal')
                            echo 'icon-active '; ?>"></i> 
                    <span class="ms-2"> Jadwal Meet</span></a>

                <div class="pt-5"></div>
                <div class="pt-5"></div>
                <a class=" my-nav " aria-current="page" href="<?= base_url('auth/logout') ?>"><i
                        class="fa fa-sign-out"></i>
                    <span class="ms-2"> Logout</span></a>


                <div class="dropup py-sm-4 pt-3 py-2 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                        id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php if ($this->session->userdata('foto') == null) { ?>
                            <img src="<?= base_url('assets/admin/img/user.png') ?>" alt="hugenerd" width="28" height="28"
                                class="rounded-circle">
                        <?php } else { ?>
                            <img src="<?= base_url('assets/user/foto/' . $this->session->userdata('foto')) ?>" alt="hugenerd" width="28" height="28"
                            class="rounded-circle">
                           
                        <?php } ?>


                        <span class="d-none d-sm-inline mx-1"><?=$this->session->userdata('nama')?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark px-0 px-sm-2 text-center text-sm-start"
                        aria-labelledby="dropdownUser1">
                        <!-- <li><a class="dropdown-item px-1" href="#"><i class="fs-6 bi-basket"></i><span
                                    class="d-none d-sm-inline ps-1">New project</span></a></li>
                        <li><a class="dropdown-item px-1" href="#"><i class="fs-6 bi-bookmark"></i><span
                                    class="d-none d-sm-inline ps-1">Settings</span></a></li> -->
                        <li><a class="dropdown-item px-1" href="<?= base_url('profile_user') ?>"><i
                                    class="fs-6 bi-binoculars"></i><span
                                    class="d-none d-sm-inline ps-1">Profile</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile VIew -->