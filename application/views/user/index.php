<div class="d-none d-md-none d-sm-none d-lg-block">
    <style>

    </style>
    <div class="container-fluid overflow-hidden" style="background-color:#e8e8e8">
        <div class="row g-0 vh-100 overflow-y-auto">
            <div class="col offset-lg-2 offset-xl-2 d-flex flex-column vh-100">
                <main class="row overflow-auto py-4 px-3">


                    <!-- Modal -->
                    <?php if(empty($jk)){?>
                    <div class="modal fade" id="lengkapi-profile" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                               
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <p>Selamat datang di Matchmaking 👋, silahkan lengkapi profil anda terlebih dahulu 😀 <span>
                                                <a href="<?=base_url('profile_user')?>">Lengkapi</a>
                                            </span></p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h5>Dashboard</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-4 pt-3">
                                        <a href="" class="text-decoration-none text-dark">
                                            <div class="card my-card">
                                                <div class="card-body">
                                                    <h4 class="text-center py-2 color-3"><i
                                                            class="fa-solid fa-handshake fa-xl"></i></h4>
                                                    <h4 class="text-center">
                                                        66
                                                    </h4>
                                                    <h6 class="text-center">Matching</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <a href="" class="text-decoration-none text-dark">
                                            <div class="card my-card">
                                                <div class="card-body">
                                                    <h4 class="text-center py-2 color-3"><i
                                                            class="fa-solid fa-repeat fa-xl"></i></h4>
                                                    <h4 class="text-center">
                                                        66
                                                    </h4>
                                                    <h6 class="text-center">Request</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <a href="" class="text-decoration-none text-dark">
                                            <div class="card my-card">
                                                <div class="card-body">
                                                    <h4 class="text-center py-2 color-3"><i
                                                            class="fa-solid fa-user-check fa-xl"></i></h4>
                                                    <h4 class="text-center">
                                                        66
                                                    </h4>
                                                    <h6 class="text-center">Meet</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 pt-3">
                                <div class="row">
                                    <div class="col-12 px-5">

                                    </div>
                                    <div class="col-12 scroll">
                                        <?php
                                        for ($i = 0; $i <= 15; $i++) {
                                            ?>
                                            <div class="card mb-3 card-notif">
                                                <div class="row">
                                                    <div class="col-md-4 d-flex justify-content-center p-2 ">
                                                        <img src="<?= base_url('assets/admin/img/user.png') ?>"
                                                            class="items-center my-auto" alt="..." width="50" height="50">
                                                    </div>
                                                    <div class="col-md-8 p-2">

                                                        <b>Jhon</b>
                                                        <br>
                                                        <small class="text-muted">Request match baru</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="row bg-light py-4 mt-auto">
                    <div class="col"> Footer content here... </div>
                </footer>
            </div>
        </div>
    </div>
</div>
<!-- Mobile -->
<div class="d-lg-none">
    mobile
</div>