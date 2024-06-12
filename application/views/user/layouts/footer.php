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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // $(document).ready(function () {
        //     $("p").click(function () {
        //         alert("The paragraph was clicked.");
        //     });
        // });
        $(document).ready(function(){
            $("#lengkapi-profile").modal('show');
        });
        $(document).ready(function() {
            $('#provinsi').select2();
        });

        $(document).ready(function() {
            $('#provinsi-m').select2();
        });

        $(document).ready(function() {
            $('#kabupaten').select2();
        });
        $(document).ready(function() {
            $('#kabupaten-m').select2();
        });
        $(document).ready(function() {
            $('#kecamatan').select2();
        });
        $(document).ready(function() {
            $('#kecamatan-m').select2();
        });
        $(document).ready(function() {
            $('#desa').select2();
        });
        $(document).ready(function() {
            $('#desa-m').select2();
        });
       



        let swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
            },
            });

            $('#test').click(function(){
                alert('ok');
            });

        	$(document).ready(function(){
	            $("#provinsi").change(function (){
	                var url = "<?php echo site_url('wilayah/add_ajax_kab');?>/"+$(this).val();
	                $('#kabupaten').load(url);
                    var idp = $('#provinsi :selected').text();
                    $('#prov').val(idp);
                   
	                return false;
	            })

	            $("#provinsi-m").change(function (){
	                var url = "<?php echo site_url('wilayah/add_ajax_kab');?>/"+$(this).val();
	                $('#kabupaten-m').load(url);
                    var idprov = $('#provinsi-m :selected').text();
                    $('#prov-m').val(idprov);
	                return false;
	            })

	//    ---------------

	   			$("#kabupaten").change(function (){
	                var url = "<?php echo site_url('wilayah/add_ajax_kec');?>/"+$(this).val();
	                $('#kecamatan').load(url);
                    var idkab = $('#kabupaten :selected').text();
                    $('#kab').val(idkab);
	                return false;
	            })
	   			$("#kabupaten-m").change(function (){
	                var url = "<?php echo site_url('wilayah/add_ajax_kec');?>/"+$(this).val();
	                $('#kecamatan-m').load(url);
                    var idkab = $('#kabupaten-m :selected').text();
                    $('#kab-m').val(idkab);
	                return false;
	            })

                // ---------------------
	   
	   			$("#kecamatan").change(function (){
	                var url = "<?php echo site_url('wilayah/add_ajax_des');?>/"+$(this).val();
	                $('#desa').load(url);
                    var idkec = $('#kecamatan :selected').text();
                    $('#kec').val(idkec);
	                return false;
	            })
	   			$("#kecamatan-m").change(function (){
	                var url = "<?php echo site_url('wilayah/add_ajax_des');?>/"+$(this).val();
	                $('#desa-m').load(url);
                    var idkec = $('#kecamatan-m :selected').text();
                    $('#kec-m').val(idkec);
	                return false;
	            })

                $("#desa").change(function (){
	               
                    var iddes = $('#desa :selected').text();
                    $('#des').val(iddes);
	                return false;
	            })
                $("#desa-m").change(function (){
	               
                    var iddes = $('#desa-m :selected').text();
                    $('#des-m').val(iddes);
	                return false;
	            })
	        });


            // foto prev dekstop
            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    blah.src = URL.createObjectURL(file)
                }
            }
            // foto prev mobile
            imgInpM.onchange = evt => {
                const [file] = imgInpM.files
                if (file) {
                    blahM.src = URL.createObjectURL(file)
                }
            }
    	
            const flashError = $('#fail').attr('fail');
            
            if (flashError) {
            Swal.fire({
                icon: "error",
                title: "Gagal",
                html: flashError,
                // footer: '<a href="#">Why do I have this issue?</a>'
            });
            }

            const success = $('#success').attr('success');
            
            if (success) {
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                html: success,
                // footer: '<a href="#">Why do I have this issue?</a>'
            });
            }

            $(".btn-ubah").click(function (){
	               $('.btn-batal-ubah').removeClass('d-none');
	               $('.btn-ubah').addClass('d-none');
	               $('.alamat').addClass('d-none');
	               $('.input-alamat').removeClass('d-none');
                   
                });
                $(".btn-batal-ubah").click(function (){
                    $('.btn-batal-ubah').addClass('d-none');
                    $('.btn-ubah').removeClass('d-none');
                    $('.alamat').removeClass('d-none');
                    $('.input-alamat').addClass('d-none');
	        });

    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>