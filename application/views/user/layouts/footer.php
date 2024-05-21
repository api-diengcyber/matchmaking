   <!-- Bottom navbar -->
   <div class="d-lg-none">
   <section class="fixed-bottom">
            <div class="container-fluid bg-white  my-nav">
                <ul class="nav nav-justified py-3">
                    <li class="nav-item">
                        <a class="nav-link my-link  <?php if ($this->uri->segment(1) == 'welcome') echo 'my-active'; ?>" href="<?=base_url('welcome')?>">
                            <i class="fa-solid fa-home"></i>
                            <small>
                                
                            </small>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link my-link <?php if ($this->uri->segment(1) == 'users_user') echo 'my-active'; ?>" href="<?=base_url('users_user/semua')?>">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <small>
                                
                            </small>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link my-link" href="#">
                            <i class="fa-solid fa-arrow-right-arrow-left"></i>
                            <small>
                               
                            </small>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link my-link" href="#">
                            <i class="fa-solid fa-user"></i>
                            <small>
                                
                            </small>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
        <!-- /Bottom navbar -->
    </div>
    <!-- End Mobile VIew -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="<?=base_url('assets/user/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <script src="<?=base_url('assets/user/jquery/jquery.3.7.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        // $(document).ready(function () {
        //     $("p").click(function () {
        //         alert("The paragraph was clicked.");
        //     });
        // });
        let swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
            },
            });
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>