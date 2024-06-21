<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Matchmaking | Login</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/user/bootstrap/css/bootstrap.min.css') ?>">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <script src="
      https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js
      "></script>
  <link href="
      https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css
      " rel="stylesheet">


  <link rel="stylesheet" href="<?= base_url('assets/user/css/mycss.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/user/css/mobile.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/user/fontawesome/css/all.min.css') ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
    rel="stylesheet">
  <style>
    
    * {
      font-family: "Poppins", sans-serif;
      font-weight: 400;
      font-style: normal;

    }

    body{
      overflow-x: none;
    }

    .container-fluid-1 {
     height: 100vh;
      background: rgb(214, 0, 255);
      background: linear-gradient(153deg, rgba(214, 0, 255, 1) 13%, rgba(117, 117, 250, 1) 100%);
    }

    .color-1 {
      color: #7575fa;
    }

    .color-2 {
      color: #d600ff;
    }

    .bn45 {
      width: 170px;
      height: 50px;
    }

    .bn46 {
      width: 150px;
      height: 50px;
    }

    .form-label {
      font-size: 14px;
    }

    .form-control {
      font-size: 14px;

    }

    .form-check-label {
      font-size: 12px;

    }

    small {
      font-size: 12px;
    }

    .pad-t {
      padding-top: 40%;
    }

    .pad-t-2 {
      padding-top: 7%;
      margin-bottom: 20px;
    }

    .card-login {
      border: 2px solid blue;
      border-radius: 10px;
    }

    /* label {
      color: #7575fa;
    } */

    small {

      color: #7575fa;

    }

    .form-control:focus {
      border-color: #7575fa;
      box-shadow: none;
      -webkit-box-shadow: none;
    }

    .has-error .form-control:focus {
      box-shadow: none;
      -webkit-box-shadow: none;
    }

    .bg-1 {
      background-color: #7575fa
    }

    @media (max-width:991.98px) {
      .bn45 {
        width: 80px;
        height: 20px;
      }

      .bn46 {
        width: 90px;
        height: 20px;
      }

      .pad-t {
        padding-top: 10%;
      }

      .pad-t-2 {
        margin-bottom: 20px;
      }
    }
  </style>
</head>

<body>
  <div class="d-none d-md-none d-sm-none d-lg-block">
    <div class="container-fluid-1">
      <div class="row mb-5">
        <div class="col-lg-6 ">
          <div class="row">
            <div class="col-lg-12 pad-t" style="">
              <h1 class="text-white text-center"><i class="fa-solid fa-mars-and-venus-burst fa-2xl"></i></h1>
              <p class="text-white text-center pt-2">Selamat datang di matchmaking aplikasi buat
                cari teman..</p>
            </div>
            <div class="col-12 text-center">
              <!-- <a href="#" target="_blank" tabIndex="0"><img class="bn45" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Google_Play_Store_badge_EN.svg/2560px-Google_Play_Store_badge_EN.svg.png" alt="bn45"/></a>
                              <a href="#" target="_blank" tabIndex="0"><img class="bn46" src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg"alt="bn45"/></a> -->
            </div>
          </div>
        </div>
        <div class="col-lg-6 pad-t-2 px-2">
          <div class="card card-login">
            <div class="card-body ">
              <h5 class="">Login</h5>
              <form class="px-4 pt-2" action="<?= base_url('auth/login') ?>" method="post">
                <div id="infoMessage"><?php echo $message; ?></div>

                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input type="email" name="identity" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Email">
                  <div id="emailHelp" class="form-text">
                    <small class="text-danger">
                      <?php echo form_error('identity') ?>
                    </small>

                  </div>
                </div>


                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Password">
                  <small class="text-danger">
                    <?php echo form_error('password') ?>
                  </small>
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" name="remember" for="exampleCheck1">Ingat Saya
                  </label>
                  <small class="text-danger">
                    <?php echo form_error('syarat') ?>
                  </small>
                </div>
                <div class="d-grid gap-2">
                  <button type="submit" class="btn bg-1 text-white">Login</button>
                </div>
                <div class="mb-3">
                  <small>
                    Lupa <a href="<?= base_url('auth/forgot_password') ?>">Password?</a>
                  </small>
                </div>
                <div class="mb-3">
                  <small>
                    Belum punya akun? <a href="<?= base_url('auth/sign_up') ?>">Daftar</a>
                  </small>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div style="margin-top: 8px" id="message" message="<?php echo $this->session->userdata('message') ?>">
      <!-- <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?> -->
    </div>

  </div>

  <div class="d-lg-none">
    <section id="login-page">
      <img src="<?= base_url('assets/temuser/heartline.svg') ?>" alt="" class="heart-line">
      <img src="<?= base_url('assets/temuser/back.svg') ?>" alt="" class="bg-back">
      <img src="<?= base_url('assets/temuser/front.svg') ?>" alt="" class="bg-front">
      <img src="<?= base_url('assets/temuser/Bubble.svg') ?>" alt="" class="bg-front">
      <img src="<?= base_url('assets/temuser/Bubble2.svg') ?>" alt="" class="bg-bub-2">
      
      <div class="container">
        <div class="row mb-5">
          <div class="col-6">
            <img src="<?= base_url('assets/temuser/heart.svg') ?>" alt="" class="heart">

            <h5 class="sub-title poppins-n-7">
              Get your
              <br>
              life partner with
            </h5>

            <h3 class="title color-3 poppins-n-7">
              N3MU
            </h3>
          </div>
          <div class="col-6">
            <img src="<?= base_url('assets/temuser/match.svg') ?>" alt="" class="img-match">
          </div>
        </div>
        <div class="row pt-5 position-relative">
          <div class="col-12">
            <form action="<?= base_url('auth/login') ?>" method="POST">
              <div class="mb-3">
                <label for="email" class="label-m mulish-700">Email</label>
                <input type="text" name="identity" class="form-control input-text mulish-400"  placeholder="Masukkan email">
              </div>
              <div class="mb-3">
                <label for="email" class="label-m mulish-700">Password</label>
                <input type="password" name="password" class="form-control input-text mulish-400"  placeholder="Masukkan password">
              </div>
              <div class="mb-3">
                <div class="d-grid gap-2 ">
                  <button class="btn bg-3 text-white" type="submit">Login</button>
                </div>
              </div>
            
                  <input type="checkbox" name="remember" class="form-check-input d-none" id="exampleCheck1" checked>
                 
            </form>
            <small>
              <a href="<?= base_url('auth/forgot_password') ?>" class="text-dark text-decoration-none">Lupa Password</a>
            </small>
            <br>
            <small class="text-dark">
              Belum punya akun? <a href="<?= base_url('auth/sign_up') ?>" class="text-decoration-none color-3">Daftar</a>
            </small>
          </div>
        </div>
      </div>

    </section>
  </div>



  <script src="<?= base_url('assets/user/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <script src="<?= base_url('assets/user/jquery/jquery.3.7.js') ?>"></script>
  <script>
    const flash = $('#message').attr('message');
    // console.log('ini' + flash);
    if (flash == 'success') {
      Swal.fire({
        icon: "success",
        title: "Yeay!!",
        text: "Pendaftaran berhasil, silahkan login",
        // footer: '<a href="#">Why do I have this issue?</a>'
      });
    }
    if (flash == 'salah') {
      Swal.fire({
        icon: "error",
        title: "Gagal",
        text: "Email atau password salah!",
        // footer: '<a href="#">Why do I have this issue?</a>'
      });
    }
  </script>
</body>

</html>