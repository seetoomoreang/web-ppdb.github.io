<?php
    include("con_db/connection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KONTAK SMP MUHAMMADIYAH 4 YOGYAKARTA</title>
    <!--[if IE 8]>
    <link href="style_ie8.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="fonts/awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href='css/owl.carousel.css' rel='stylesheet' type='text/css'>
    <link href='css/owl.theme.css' rel='stylesheet' type='text/css'>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
   
    <header class="tz-header tz-header-2">
        <div class="tz-sign-in">
        <div class="container">
            <p>SELAMAT DATANG DI APLIKASI PPDB ONLINE SMP MUHAMMADIYAH 4 YOGYAKARTA</p>
        </div>
    </div>
        <div class="tz-customer-container">
            <div class="container">
                <div class="tz-header-content">
                    <h3 class="tz-logo pull-left">
                        
                        <a href="#"><img alt="Images Logo" src="demos/logo-header-2.png"></a>
                    </h3>
                    <button type="button" class="tz-button-toggle btn-navbar pull-right" data-target=".nav-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                     <?php 
                        include("top_menu.php");
                    ?>
                </div>
            </div><!-- End Content Main Header -->
        </div>
    </header>
    <!-- End class tz-header-2 -->

   

    <!-- Begin section tz-introduce-univesity -->
    <section class="tz-introduce-univesity">
        <!-- Start class tzWrap -->
        <div class="tzWrap">
            <div class="tz-map" id="googleMap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.912044020533!2d110.37776741477818!3d-7.799136594379665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a577f363bab45%3A0xf195004086f9399f!2sSMP%20Muhammadiyah%204%20Yogyakarta!5e0!3m2!1sen!2sid!4v1596810546599!5m2!1sen!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
            <div class="container">
                <div class="row">
                    <div class="tz-map-information">
                        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4">
                            <div class="tz-map-address">
                                <a href="#" class="tz-background-color-6">
                                    <i class="fa fa-mobile"></i>
                                </a>
                               <p> (0274) 554623</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4">
                            <div class="tz-map-address">
                                <a href="#" class="tz-background-color-6">
                                    <i class="fa fa-map-marker"></i>
                                </a>
                                <p>Jl. Ki Mangunsarkoro No.43, Gunungketur, Pakualaman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55166</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4">
                            <div class="tz-map-address">
                                <a href="#" class="tz-background-color-6">
                                    <i class="fa fa-globe"></i>
                                </a>
                                <p>smpmuh4yogya.sch.id</p>
                            </div>
                        </div>
                        <p></p>
                    </div>
                    <div class="tz-map-us" id="fc">
                        <h3><a href="#">TINGGALKAN PESAN</a></h3>
                        Halo. Silahkan tinggalkan pesan anda. Dengan cara mengisikan data yang ada pada form di bawah ini. Terima Kasih<hr />


                        <?php
                        if(isset($_POST['tbpesan']))
                        {
                            $naleng=str_replace("'", "`", $_POST['naleng']);
                            $email=str_replace("'", "`", $_POST['email']);
                            $judul=str_replace("'", "`", $_POST['judul']);
                            $pesan=str_replace("'", "`", nl2br($_POST['pesan']));
                            if(empty($naleng) || empty($judul) ||empty($pesan))
                            {
                                ?>
                                <div class="tz-portfolio-project">
                                    <a href="#">ERROR !! Maaf Data Yang Anda Inputkan Kosong. Wajib Isi Yang Ada Pesan "Requirded"</a>
                                </div>
                                <?php
                            }
                            else
                            {
                                $dt_entry=date("Y-m-d H:i:s");

                                mysqli_query($conn,"Insert into tb_pesan set nama_lengkap='$naleng', email='$email', judul='$judul', pesan='$pesan', tgl_kirim='$dt_entry', status='Baru'");
                                if(!empty($email))
                                {
                                    //isiemail..
                                }
                                ?>
                                <div class="tz-portfolio-project" style="background: green">
                                    <a href="#">SUKSES !! Selamat Anda Berhasil Telah Mengirimkan Pesan Kepada SMP Muhammadiyah 4 Yogyakarta</a>
                                </div>
                                <meta http-equiv="refresh" content="5;url=kontak#fc">
                                <?php
                            }
                        }
                        ?>

                        <form class="tz-map-form" method="post" action="kontak#fc">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>NAMA LENGKAP<span>(Requirded)</span></label>
                                <input type="text" name="naleng" class="tz-username form-control" placeholder="Harap Inputkan Nama Lengkap Anda">
                                <label>EMAIL AKTIF<span>(Optional)</span></label>
                                <input type="text" name="email" class="tz-email form-control" placeholder="Harap Inputkan Email Aktif Anda">
                                <label>JUDUL PESAN<span>(Requirded)</span></label>
                                <input type="text" name="judul" class="tz-subject form-control" placeholder="Harap Inputkan Judul Pesan Anda">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>PESAN YANG AKAN DISAMPAIKAN<span>(Requirded)</span></label>
                                <textarea class="txt-area-contact form-control" name="pesan" id="subject-form" rows="8" placeholder="Harap Inputkan Pesan Anda"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="submit" name="tbpesan" value="KIRIM PESAN" class="btn btn-default" style="background-color: red;color:white">
                            </div>
                        </form><br /><br />
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End section tz-introduce-univesity -->

    <!-- Begin section tz-portfolio-wrapper -->    
    
    <!-- End section tz-lastest-event -->

    <!-- Begin section tz-contact-us -->
    
    <!-- End section tz-contact-us -->

    <!-- Begin Footer -->
    <section class="tz-introduce-univesity" style="width: 100%;background: #334878">
        <div class="tz-cource-services tz-cource-services-style-2">
            <ul>
                <li>
                    <div class="tz-background-color-4" style="text-align: center">
                       <h3 style="color: white">PPDB ONLINE</h3><hr />
                       <font color="white">Sistem Informasi Penerimaan Siswa Baru SMP MUHAMMADIYAH 4 YOGYAKARTA Merupakan sistem informasi berbasis web yang dibangun menggunakan Bahasa Pemrograman PHP database MySQL. Sedangkan Front End dari Sistem Informasi ini menggunakan Framework Materializecss dan Bootstrap agar tampilan terlihat Menarik</font>
                    </div>
                </li>
                <li>
                    <div class="tz-background-color-4" style="text-align: center">
                        <h3 style="color: white">MANFAAT</h3><hr style="border-color: #334878" />
                        <font color="white">Dengan adanya Sistem Informasi PPDB Online di SMP MUHAMMADIYAH 4 YOGYAKARTA diharapkan dapat membantu Calon siswa untuk melakukan Pendaftaran Tanpa harus datang ke sekolah untuk melakukan pendaftaran, menghemat biaya dan Waktu.</font>
                    </div>
                </li>
                <li>
                   <div class="tz-background-color-4" style="text-align: center">
                        <h3 style="color: white">MUPAT JUNIOR</h3><hr />
                        <font color="white">Merupakan salah satu Sekolah Muhammadiyah tingkat SMP yang terletak di Gunung Ketur, Pakualaman, Yogyakarta. tentu saja sekolah ini tidak akan kalah dengan sekolah-sekolah lainnya yang mempunyai akreditasi lebih baik.</font>
                    </div>
                </li>
                <li>
                    <div class="tz-background-color-4" style="text-align: center">
                        <h3 style="color: white">LOKASI </h3><hr style="border-color: #334878" />
                        <font color="white">Jl. Ki Mangunsarkoro No.43<br/> Gunungketur, Pakualaman<br /> Kota Yogyakarta, Daerah Istimewa Yogyakarta 55166</font>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <footer class="tz-footer">
       
       <div class="tz-footer-address-site">
            <address> Hak Cipta SMP Muhammadiyah 4 Yogyakarta @<?php  date_default_timezone_set("Asia/Jakarta");$thn=date("Y");echo"$thn";?> | Program Pengembangan PPDB Oleh Tim IT MUPAT JUNIOR</address>
        </div>
    </footer>
    <!-- End Footer -->

    <script>
        var Desktop       =   5,
            tabletportrait    =   2,
            mobilelandscape   =   1,
            mobileportrait    =   1,
            resizeTimer       =   null;
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/resize.js"></script>
    <script src="js/custom-portfolio.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>