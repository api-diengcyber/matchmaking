<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Matchmaking | Sign Up</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?= base_url('assets/user/bootstrap/css/bootstrap.min.css') ?>">


      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

      <link rel="stylesheet" href="<?= base_url('assets/user/css/mycss.css') ?>">
      <link rel="stylesheet" href="<?= base_url('assets/user/fontawesome/css/all.min.css') ?>">
      <style>
            * {
                  font-family: "Poppins", sans-serif;
                  font-weight: 400;
                  font-style: normal;
            }

            .container-fluid {
                  min-height: 100vh;
                  background: rgb(2, 0, 36);
                  background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(0, 142, 255, 1) 92%);
            }
            .bn45 {
  width: 170px;
  height: 50px;
}
            .bn46 {
  width: 150px;
  height: 50px;
}
.form-label{
      font-size: 14px;
}
.form-control{
      font-size: 14px;
      
}
.form-check-label{
      font-size: 12px;

}
small{
      font-size: 12px;
}
.pad-t{
      padding-top: 30%;
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
.pad-t{
      padding-top: 10%;
}
 }
      </style>
</head>

<body>
      <div class="container-fluid bg-dark">
            <div class="row">
                  <div class="col-lg-6 ">
                        <div class="test2"></div>
                        <div class="row">
                              <div class="col-lg-12 pad-t" style="">
                                    <h4 class="text-white text-center"><i class="fa-solid fa-mars-and-venus-burst fa-2xl"></i></h4>
                                    <p class="text-white text-center pt-2">Selamat datang di matchmaking aplikasi buat cari teman..</p>
                              </div>
                              <div class="col-12 text-center">
                              <a href="#" target="_blank" tabIndex="0"><img class="bn45" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Google_Play_Store_badge_EN.svg/2560px-Google_Play_Store_badge_EN.svg.png" alt="bn45"/></a>
                              <a href="#" target="_blank" tabIndex="0"><img class="bn46" src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg"alt="bn45"/></a>
                              </div>
                        </div>
                  </div>
                  <div class="col-lg-6 pt-5 d-flex align-items-center justify-content-center">
                        <div class="card">
                              <div class="card-body border-0 ronded-3">
                                    <h5 class="">Daftar Akun</h5>
                                    <form class="px-4 pt-2">

                                          <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama" aria-describedby="nama" placeholder="Nama Lengkap">
                                          </div>

                                          <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan alamat email">
                                                <div id="emailHelp" class="form-text">
                                                      <small>Kami tidak akan pernah membagikan email Anda kepada orang lain.</small>
                                                </div>
                                          </div>


                                          <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Minimal 8 karakter">
                                          </div>
                                          <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Saya telah membaca
                                                      <a href="#">Syarat dan Ketentuan</a>
                                                </label>
                                          </div>
                                          <div class="mb-3">
                                                <small>
                                                      Sudah punya akun? <a href="">Login</a>
                                                </small>
                                          </div>
                                          <button type="submit" class="btn btn-primary">Daftar</button>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <script src="<?= base_url('assets/user/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

      <script src="<?= base_url('assets/user/jquery/jquery.3.7.js') ?>"></script>
</body>

</html>