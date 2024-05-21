<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/user/bootstrap/css/bootstrap.min.css') ?>">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="<?= base_url('assets/user/css/mycss.css') ?>"> -->
    <link rel="stylesheet" href="<?= base_url('assets/user/fontawesome/css/all.min.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>Matchmaking</title>
</head>
<style>
    /* your CSS goes here*/
    * {
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    /* body {
        background: #eee
    } */

    /* #regForm {
        background-color: #ffffff;
        margin: 0px auto;
        
        padding: 40px;
        border-radius: 10px
    } */

    h1 {
        text-align: center
    }

    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;

        border: 1px solid #aaaaaa
    }

    input.invalid {
        background-color: #ffdddd
    }

    .tab {
        display: none
    }

    /* button {
        background-color: #4CAF50;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;

        cursor: pointer
    }

    button:hover {
        opacity: 0.8
    } */

    #prevBtn {
        background-color: #bbbbbb
    }

    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5
    }

    .step.active {
        opacity: 1
    }

    .step.finish {
        background-color: #4CAF50
    }

    .all-steps {
        text-align: center;
        margin-top: 30px;
        margin-bottom: 30px
    }

    .thanks-message {
        display: none
    }

    .container {
        display: block;
        /* position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none; */
    }


    /* Hide the browser's default radio button */

    .container input[type="radio"] {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }


    /* Create a custom radio button */

    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        border-radius: 50%;
    }


    /* On mouse-over, add a grey background color */

    .container:hover input~.checkmark {
        background-color: #ccc;
    }


    /* When the radio button is checked, add a blue background */

    .container input:checked~.checkmark {
        background-color: #2196F3;
    }


    /* Create the indicator (the dot/circle - hidden when not checked) */

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }


    /* Show the indicator (dot/circle) when checked */

    .container input:checked~.checkmark:after {
        display: block;
    }


    /* Style the indicator (dot/circle) */

    /* .container .checkmark:after {
        top: 9px;
        left: 9px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    } */
    label {
        color: black;
        font-size: large;
    }
</style>

<body>
    <div class="d-none d-md-none d-sm-none d-lg-block">
        <div class="test"></div>
        Header dekstop
    </div>
    <!-- Mobile VIew -->
    <div class="d-lg-none">
        <section>

        </section>
        <div class="container mt-5">

            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <form id="regForm">
                        <h3 id="register">Daftar Gratis</h3>
                        <h6></h6>
                        <div class="tab">
                            <div class="row pt-5">
                                <div class="col-12">
                                    <div class="form-group mb-4">
                                        <input type="email" class="form-control" placeholder="Masukkan email aktif">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Masukkan password">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab">
                            <div class="row pt-5">
                                <div class="col-12 mb-3">
                                    <h6>Data Diri</h6>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-4">
                                        <label for="">
                                            <small>Nama Lengkap</small>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Nama lengkap">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">
                                            <small>Tanggal Lahir</small>
                                        </label>
                                        <input type="date" class="form-control" placeholder="Tanggal lahir">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Alamat</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <!-- <label> Provinsi </label> -->
                                        <select class="form-select" id="select2-provinsi"></select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <!-- <label> Kabupaten </label> -->
                                        <select class="form-select" id="select2-kabupaten"></select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <!-- <label> Kecamatan </label> -->
                                        <select class="form-select" id="select2-kecamatan"></select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <!-- <label> Kelurahan </label> -->
                                        <select class="form-select" id="select2-kelurahan"></select>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>

                        </div>
                        <div class="tab">
                            3
                        </div>

                        <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
                            <h3>Thanks for your Donation!</h3> <span>Your donation has been entered! We will contact you shortly!</span>
                        </div>
                        <div style="overflow:auto;position: absolute;
    bottom: 5px;right:5px" id="nextprevious">
                            <div style="float:right;"> <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> <button type="button" class="btn" id="nextBtn" onclick="nextPrev(1)">Next <i class="fa-solid fa-angle-right"></i></button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mobile VIew -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="<?= base_url('assets/user/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <script src="<?= base_url('assets/user/jquery/jquery.3.7.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        //your javascript goes here
        //your javascript goes here
        var currentTab = 0;
        document.addEventListener("DOMContentLoaded", function(event) {


            showTab(currentTab);

        });

        function showTab(n) {
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            var x = document.getElementsByClassName("tab");
            if (n == 1 && !validateForm()) return false;
            x[currentTab].style.display = "none";
            currentTab = currentTab + n;
            if (currentTab >= x.length) {
                // document.getElementById("regForm").submit();
                // return false;
                //alert("sdf");
                document.getElementById("nextprevious").style.display = "none";
                // document.getElementById("all-steps").style.display = "none";
                document.getElementById("register").style.display = "none";
                document.getElementById("text-message").style.display = "block";




            }
            showTab(currentTab);
        }

        function validateForm() {
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            for (i = 0; i < y.length; i++) {
                if (y[i].value == "") {
                    y[i].className += " invalid";
                    valid = false;
                }
            }
            if (valid) {
                // document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid;
        }

        // function fixStepIndicator(n) {
        //     var i, x = document.getElementsByClassName("step");
        //     for (i = 0; i < x.length; i++) {
        //         x[i].className = x[i].className.replace(" active", "");
        //     }
        //     x[n].className += " active";
        // }


        var urlProvinsi = "https://ibnux.github.io/data-indonesia/provinsi.json";
        var urlKabupaten = "https://ibnux.github.io/data-indonesia/kabupaten/";
        var urlKecamatan = "https://ibnux.github.io/data-indonesia/kecamatan/";
        var urlKelurahan = "https://ibnux.github.io/data-indonesia/kelurahan/";

        function clearOptions(id) {
            console.log("on clearOptions :" + id);

            //$('#' + id).val(null);
            $('#' + id).empty().trigger('change');
        }

        console.log('Load Provinsi...');
        $.getJSON(urlProvinsi, function(res) {

            res = $.map(res, function(obj) {
                obj.text = obj.nama
                return obj;
            });

            data = [{
                id: "",
                nama: "- Pilih Provinsi -",
                text: "- Pilih Provinsi -"
            }].concat(res);

            //implemen data ke select provinsi
            $("#select2-provinsi").select2({
                dropdownAutoWidth: true,
                width: '100%',
                data: data
            })
        });

        var selectProv = $('#select2-provinsi');
        $(selectProv).change(function() {
            var value = $(selectProv).val();
            clearOptions('select2-kabupaten');

            if (value) {
                console.log("on change selectProv");

                var text = $('#select2-provinsi :selected').text();
                console.log("value = " + value + " / " + "text = " + text);

                console.log('Load Kabupaten di ' + text + '...')
                $.getJSON(urlKabupaten + value + ".json", function(res) {

                    res = $.map(res, function(obj) {
                        obj.text = obj.nama
                        return obj;
                    });

                    data = [{
                        id: "",
                        nama: "- Pilih Kabupaten -",
                        text: "- Pilih Kabupaten -"
                    }].concat(res);

                    //implemen data ke select provinsi
                    $("#select2-kabupaten").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data
                    })
                })
            }
        });

        var selectKab = $('#select2-kabupaten');
        $(selectKab).change(function() {
            var value = $(selectKab).val();
            clearOptions('select2-kecamatan');

            if (value) {
                console.log("on change selectKab");

                var text = $('#select2-kabupaten :selected').text();
                console.log("value = " + value + " / " + "text = " + text);

                console.log('Load Kecamatan di ' + text + '...')
                $.getJSON(urlKecamatan + value + ".json", function(res) {

                    res = $.map(res, function(obj) {
                        obj.text = obj.nama
                        return obj;
                    });

                    data = [{
                        id: "",
                        nama: "- Pilih Kecamatan -",
                        text: "- Pilih Kecamatan -"
                    }].concat(res);

                    //implemen data ke select provinsi
                    $("#select2-kecamatan").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data
                    })
                })
            }
        });

        var selectKec = $('#select2-kecamatan');
        $(selectKec).change(function() {
            var value = $(selectKec).val();
            clearOptions('select2-kelurahan');

            if (value) {
                console.log("on change selectKec");

                var text = $('#select2-kecamatan :selected').text();
                console.log("value = " + value + " / " + "text = " + text);

                console.log('Load Kelurahan di ' + text + '...')
                $.getJSON(urlKelurahan + value + ".json", function(res) {

                    res = $.map(res, function(obj) {
                        obj.text = obj.nama
                        return obj;
                    });

                    data = [{
                        id: "",
                        nama: "- Pilih Kelurahan -",
                        text: "- Pilih Kelurahan -"
                    }].concat(res);

                    //implemen data ke select provinsi
                    $("#select2-kelurahan").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data
                    })
                })
            }
        });

        var selectKel = $('#select2-kelurahan');
        $(selectKel).change(function() {
            var value = $(selectKel).val();

            if (value) {
                console.log("on change selectKel");

                var text = $('#select2-kelurahan :selected').text();
                console.log("value = " + value + " / " + "text = " + text);
            }
        });
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>