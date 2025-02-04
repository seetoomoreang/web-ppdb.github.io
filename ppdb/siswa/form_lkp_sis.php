<?php
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        $status=$_SESSION['fi_st'];
        $fi_id=$_SESSION['fi_id'];
        // additional begin
        $tp_dt_sis=mysqli_fetch_row(mysqli_query($conn,"Select no_pendaftaran, nama_siswa, nisn, tempat_lahir, tgl_lahir, jenis_kelamin, agama, anak_ke, dari, status_dalam_keluarga, alamat_siswa, telepon, sekolah_asal, nama_sekolah, alamat, sttb_tahun, sttb_nomor, nama_ayah, nama_ibu, alamat_ortu, telepon_ortu, kerja_ayah, kerja_ibu, nama_wali, alamat_wali, telepon_wali, pekerjaan_wali, foto, foto_skhu, jumlah_nilai, email_aktif, kelas, mtk, ipa, bind, asal_ortu, asal_lain, domisili_siswa, domisili_ortu, golongan_darah from tb_siswa where id_siswa='$fi_id'"));
        // additional end
        if($status=="Siswa")
            {
                ?>
                <div id="content">
                    <div class="row">
                        <form class="form-horizontal" role="form" method="post" action="lkp_form" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">DATA PENDAFTAR</span>
                                    </div>
                                    <div class="panel-body">
                                       <div class="form-group">
                                            <label class="col-lg-3 control-label">No. Pendaftaran</label>
                                            <div class="col-lg-8">
                                                <p class="form-control-static text-muted"><?php echo"$tp_dt_sis[0]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea2">Pilihan Kelas *</label>
                                            <div class="col-lg-8">
                                                <select name="pil_kelas" class="form-control">
                                                    <option value="-">-PILIH KELAS-</option>
                                                    <?php
                                                    $ar_kls=array("ICT","Regular");
                                                    for($ia=0;$ia<=1;$ia++)
                                                    {
                                                        if($ar_kls[$ia]==$tp_dt_sis[31])
                                                        {
                                                            ?>
                                                            <option value="<?php echo"$ar_kls[$ia]";?>" selected="selected"><?php echo"$ar_kls[$ia]";?></option>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                             ?>
                                                            <option value="<?php echo"$ar_kls[$ia]";?>"><?php echo"$ar_kls[$ia]";?></option>
                                                            <?php
                                                        }
                                                       
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">DATA SISWA</span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-3 control-label">Nama Siswa *</label>
                                            <div class="col-lg-8">
                                                <input type="text" id="inputStandard" class="form-control" name="namasiswa" value="<?php echo"$tp_dt_sis[1]";?>" placeholder="Nama Lengkap Siswa">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-3 control-label">Email Aktif</label>
                                            <div class="col-lg-8">
                                                <input type="text" id="inputStandard" class="form-control" name="email" value="<?php echo"$tp_dt_sis[30]";?>" placeholder="Email Aktif Siswa/Orang Tua (Tidak Wajib)">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-lg-3 control-label">NISN </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="inputPassword" name="nisn" value="<?php echo"$tp_dt_sis[2]";?>" placeholder="Nomor NISN">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-3 control-label">Tempat Lahir *</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="disabledInput" type="text" name="tempatlahir" value="<?php echo"$tp_dt_sis[3]";?>" placeholder="Tempat Lahir Siswa">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea1">Tanggal Lahir *</label>
                                            <div class="col-lg-8">
                                                <input type="text" id="datepicker1" name="tgllahir" class="form-control" value="<?php if(!empty($tp_dt_sis[4])){$tgfor=date("m/d/Y",strtotime($tp_dt_sis[4])); echo"$tgfor";}?>" placeholder="Tanggal Lahir Siswa">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea2">Jenis Kelamin *</label>
                                            <div class="col-lg-8">
                                                <?php
                                                    if($tp_dt_sis[5]==1)
                                                        {
                                                             ?>
                                                               <input type="radio" name="jk" id="inlineRadio1" value="1" checked="checked"> Pria  
                                                                <input type="radio" name="jk" id="inlineRadio2" value="2"> Wanita
                                                             <?php
                                                        }
                                                    
                                                    else if($tp_dt_sis[5]==2)
                                                        {
                                                            ?>
                                                                <input type="radio" name="jk" id="inlineRadio1" value="1"> Pria  
                                                                <input type="radio" name="jk" id="inlineRadio2" value="2"  checked="checked"> Wanita
                                                            <?php
                                                        }
                                                    else
                                                        {
                                                             ?>
                                                                <input type="radio" name="jk" id="inlineRadio1" value="1"> Pria  
                                                                <input type="radio" name="jk" id="inlineRadio2" value="2"> Wanita
                                                            <?php
                                                        }
                                                  ?>
                                                    
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea2">Agama *</label>
                                            <div class="col-lg-8">
                                                <select name="agama" class="form-control">
                                                    <option value="-">-PILIH AGAMA-</option>
                                                    <?php
                                                        // Definisikan array agama yang valid
                                                        $ar_agama = array(
                                                            "Islam",
                                                            "Kristen Protestan",
                                                            "Katolik",
                                                            "Hindu",
                                                            "Buddha",
                                                            "Khonghucu"
                                                        );

                                                        // Loop melalui array untuk membuat opsi dropdown
                                                        for ($i = 0; $i < count($ar_agama); $i++) {
                                                            if ($ar_agama[$i] == $tp_dt_sis[6]) {
                                                                // Jika agama saat ini sesuai dengan nilai di database, tambahkan atribut "selected"
                                                                ?>
                                                                <option value="<?php echo $ar_agama[$i]; ?>" selected="selected"><?php echo $ar_agama[$i]; ?></option>
                                                                <?php
                                                            } else {
                                                                // Tambahkan opsi tanpa atribut "selected"
                                                                ?>
                                                                <option value="<?php echo $ar_agama[$i]; ?>"><?php echo $ar_agama[$i]; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea2">Golongan Darah </label>
                                            <div class="col-lg-8">
                                                <select name="goldar" class="form-control">
                                                    <option value="-" disabled selected>-PILIH Golongan Darah-</option>
                                                    <?php
                                                    $ar_goldar=array("A", "B", "O", "AB");
                                                    for($i=0;$i<count($ar_goldar);$i++)
                                                    {
                                                        if($ar_goldar[$i]==$tp_dt_sis[39])
                                                        {
                                                            ?>
                                                            <option value="<?php echo"$ar_goldar[$i]";?>" selected="selected"><?php echo"$ar_goldar[$i]";?></option>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                             ?>
                                                            <option value="<?php echo"$ar_goldar[$i]";?>"><?php echo"$ar_goldar[$i]";?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea3">Anak ke *</label>
                                            <div class="col-lg-3">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-level-up"></i>
                                                    </span>
                                                    <input id="spinner1" class="form-control ui-spinner-input" name="anakke" value="<?php echo"$tp_dt_sis[7]";?>" placeholder="PILIH" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea3">Dari *</label>
                                            <div class="col-lg-3">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-level-up"></i>
                                                    </span>
                                                    <input id="spinner1a" class="form-control ui-spinner-input" name="dari"  value="<?php echo"$tp_dt_sis[8]";?>" placeholder="PILIH" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea2">Status Keluarga *</label>
                                            <div class="col-lg-8">
                                                <select name="statusdalamkeluarga" class="form-control">
                                                    <option value="-">-PILIH STATUS DALAM KELUARGA-</option>
                                                    <?php
                                                    $ar_status=array("Anak Angkat","Anak Kandung","Anak Tiri");
                                                    for($a=0;$a<=2;$a++)
                                                    {
                                                        if($ar_status[$a]==$tp_dt_sis[9])
                                                        {
                                                             ?>
                                                            <option value="<?php echo"$ar_status[$a]";?>" selected="selected"><?php echo"$ar_status[$a]";?></option>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                             ?>
                                                            <option value="<?php echo"$ar_status[$a]";?>"><?php echo"$ar_status[$a]";?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea3">Alamat Siswa (Sesuai C1/KK) *</label>
                                            <div class="col-lg-8">
                                                <textarea class="form-control" name="alamatsiswa" id="textArea3" rows="3" placeholder="Alamat Lengkap Siswa"><?php $enc_alt1=filter_var($tp_dt_sis[10],FILTER_SANITIZE_STRING); echo"$enc_alt1";?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea3">Alamat Domisili Siswa *</label>
                                            <div class="col-lg-8">
                                                <textarea class="form-control" name="domisili_siswa" id="textArea3" rows="3" placeholder="Alamat Orang Tua Siswa"><?php $enc_alt3=filter_var($tp_dt_sis[37],FILTER_SANITIZE_STRING); echo"$enc_alt3";?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-3 control-label">Telepon</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="disabledInput" type="text" name="telepon" value="<?php echo"$tp_dt_sis[11]";?>" placeholder="Nomor Telepon Siswa">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-3 control-label">Upload Pas Foto </label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="disabledInput" type="file" name="pasfoto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">DATA ASAL SEKOLAH</span>
                                    </div>
                                    <div class="panel-body">
                                       <div class="form-group">
                                            <label for="inputStandard" class="col-lg-3 control-label">Asal SD *</label>
                                            <div class="col-lg-8">
                                                <input type="text" id="inputStandard" class="form-control" name="sekolahasal" value="<?php echo"$tp_dt_sis[12]";?>" placeholder="Asal SD Siswa">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="inputPassword" class="col-lg-3 control-label">Nama Sekolah *</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="inputPassword" name="namasekolah" value="<?php echo"$tp_dt_sis[13]";?>">
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea3">Alamat Sekolah *</label>
                                            <div class="col-lg-8">
                                                <textarea class="form-control" name="alamatsekolah" id="textArea3" rows="3" placeholder="Alamat Sekolah SD Siswa"><?php $enc_alt2=filter_var($tp_dt_sis[14],FILTER_SANITIZE_STRING); echo"$enc_alt2";?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">DATA SURAT TANDA TAMAT BELAJAR</span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-3 control-label">Nomor IJAZAH </label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="disabledInput" type="text" name="nosttb" value="<?php echo"$tp_dt_sis[16]";?>" placeholder="Nomor IJAZAH">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-3 control-label">Tahun IJAZAH </label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="disabledInput" type="text" name="thnsttb" value="<?php echo"$tp_dt_sis[15]";?>" placeholder="Tahun IJAZAH">
                                            </div>
                                        </div>
                                        <!-- additional begin -->
                                        <div class="panel-heading">
                                            <span class="panel-title">RINCIAN NILAI AKHIR UJIAN SEKOLAH DAERAH (USD)</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-3 control-label">Bahasa Indonesia </label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="disabledInput" type="text" name="nilai_bind" value="<?php echo"$tp_dt_sis[34]";?>" placeholder="Nilai Bahasa Indonesia">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-3 control-label">Matematika </label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="disabledInput" type="text" name="nilai_matematika" value="<?php echo"$tp_dt_sis[32]";?>" placeholder="Nilai Matematika">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-3 control-label">IPA </label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="disabledInput" type="text" name="nilai_ipa" value="<?php echo"$tp_dt_sis[33]";?>" placeholder="Nilai IPA">
                                            </div>
                                        </div>
                                        <!-- additional end -->
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-3 control-label">Jumlah Nilai </label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="disabledInput" type="text" name="jumlahnilai" value="<?php echo"$tp_dt_sis[29]";?>" placeholder="Jumlah NIlai Akhir USD">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-3 control-label">Upload USD (fotocopy/scan)</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="disabledInput" type="file" name="fotoskhu">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">DATA ORANG TUA DAN WALI</span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-3 control-label">Nama Ayah *</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="disabledInput" type="text" name="namaayah" value="<?php echo"$tp_dt_sis[17]";?>"  placeholder="Nama Ayah Kandung">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-3 control-label">Nama Ibu *</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="disabledInput" type="text" name="namaibu" value="<?php echo"$tp_dt_sis[18]";?>" placeholder="Nama Ibu Kandung">
                                            </div>
                                        </div>
                                        <!-- additonal beginn -->
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea2">Asal Orang Tua *</label>
                                            <div class="col-lg-8">
                                                <select name="asal_ortu" id="asl_ortu" class="form-control">
                                                    <option value="-" disabled selected>-ASAL ORANG TUA SISWA-</option>
                                                    <?php
                                                    $ar_asl=array("Yogyakarta","Bantul", "Sleman", "Kulonprogo", "Gunungkidul", "Lainnya");
                                                    for($ia=0;$ia<count($ar_asl);$ia++)
                                                    {
                                                        if($ar_asl[$ia]==$tp_dt_sis[36])
                                                        {
                                                            ?>
                                                            <option value="<?php echo"$ar_asl[$ia]";?>" selected="selected"><?php echo"$ar_asl[$ia]";?></option>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                             ?>
                                                            <option value="<?php echo"$ar_asl[$ia]";?>"><?php echo"$ar_asl[$ia]";?></option>
                                                            <?php
                                                        }
                                                       
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" id="asal_lbl" class="col-lg-3 control-label">Sebutkan *</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="asal_lain" type="text" name="asal_lain" value="<?php echo"$tp_dt_sis[36]";?>" placeholder="Asal Orang Tua Orang Tua Siswa">
                                            </div>
                                        </div>
                                        <!-- additional end -->
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea3">Alamat Orang Tua (Sesuai C1/KK) *</label>
                                            <div class="col-lg-8">
                                                <textarea class="form-control" name="alamatorangtua" id="textArea3" rows="3" placeholder="Alamat Orang Tua Siswa"><?php $enc_alt3=filter_var($tp_dt_sis[19],FILTER_SANITIZE_STRING); echo"$enc_alt3";?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea3">Alamat Domisili Orang Tua *</label>
                                            <div class="col-lg-8">
                                                <textarea class="form-control" name="domisili_ortu" id="textArea3" rows="3" placeholder="Alamat Orang Tua Siswa"><?php $enc_alt3=filter_var($tp_dt_sis[38],FILTER_SANITIZE_STRING); echo"$enc_alt3";?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-3 control-label">Telepon Orang Tua *</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="disabledInput" type="text" name="teleponortu" value="<?php echo"$tp_dt_sis[20]";?>" placeholder="Nomor Telepon Orang Tua Siswa">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea2">Pekerjaan Ayah *</label>
                                            <div class="col-lg-8">
                                                <select name="kerjaayah" class="form-control">
                                                    <option value="-">-PILIH PEKERJAAN AYAH-</option>
                                                    <?php
                                                    $ar_k_a=array("BUMN","PNS","Wiraswasta","TNI/POLRI","Guru","Peg. Swasta","Buruh Harian/Lepas");
                                                    for($ay=0;$ay<=6;$ay++)
                                                    {
                                                        if($ar_k_a[$ay]==$tp_dt_sis[21])
                                                        {
                                                             ?>
                                                            <option value="<?php echo"$ar_k_a[$ay]";?>" selected="selected"><?php echo"$ar_k_a[$ay]";?></option>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                             ?>
                                                            <option value="<?php echo"$ar_k_a[$ay]";?>"><?php echo"$ar_k_a[$ay]";?></option>
                                                            <?php
                                                        }
                                                       
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea2">Pekerjaan Ibu *</label>
                                            <div class="col-lg-8">
                                                <select name="kerjaibu" class="form-control">
                                                    <option value="-">-PILIH PEKERJAAN IBU-</option>
                                                    <?php
                                                    $ar_k_i=array("BUMN","PNS","Wiraswasta","TNI/POLRI","Guru","Peg. Swasta","Ibu Rumah Tangga","Buruh Harian/Lepas");
                                                    for($ai=0;$ai<=7;$ai++)
                                                    {
                                                        if($tp_dt_sis[22]==$ar_k_i[$ai])
                                                        {
                                                            ?>
                                                            <option value="<?php echo"$ar_k_i[$ai]";?>" selected="selected"><?php echo"$ar_k_i[$ai]";?></option>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <option value="<?php echo"$ar_k_i[$ai]";?>"><?php echo"$ar_k_i[$ai]";?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-3 control-label">Nama Wali</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="disabledInput" type="text" name="namawali" value="<?php echo"$tp_dt_sis[23]";?>" placeholder="Nama Wali Siswa">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea3">Alamat Wali</label>
                                            <div class="col-lg-8">
                                                <textarea class="form-control" name="alamatwali" id="textArea3" rows="3" placeholder="Alamat Wali Siswa"><?php $enc_alt4=filter_var($tp_dt_sis[24],FILTER_SANITIZE_STRING); echo"$enc_alt4";?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-3 control-label">Telepon Wali</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="disabledInput" type="text" name="telepowali" value="<?php echo"$tp_dt_sis[25]";?>" placeholder="Nomor Telepon Wali Siswa">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea2">Pekerjaan Wali</label>
                                            <div class="col-lg-8">
                                                <select name="kerjawali" class="form-control">
                                                    <option value="-">-PILIH PEKERJAAN WALI-</option>
                                                    <?php
                                                    $ar_k_w=array("BUMN","PNS","Wiraswasta","TNI/POLRI","Guru","Peg. Swasta","Ibu Rumah Tangga", "Buruh Harian/Lepas", "Mahasiswa/Pelajar");
                                                    for($aw=0;$aw<=8;$aw++)
                                                    {
                                                        if($ar_k_w[$aw]==$tp_dt_sis[26])
                                                        {
                                                            ?>
                                                            <option value="<?php echo"$ar_k_w[$aw]";?>" selected="selected"><?php echo"$ar_k_w[$aw]";?></option>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <option value="<?php echo"$ar_k_w[$aw]";?>"><?php echo"$ar_k_w[$aw]";?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">Keterangan</span></div>
                                    <div class="panel-body">
                                        
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <ul>
                                                    <li>Upload USD dan Pas Foto, Ukuran Foto Tidak Melebihi 1.5 MB</li>
                                                    <li>Upload USD dan Pas Berupa Tipe Gambar (jpeg, jpg, png)</li>
                                                    <li>Sangat Disarankan Mengisikan Email Yang Aktif dan Nomor Telepon Yang Aktif</li>
                                                    <li>Isikan Seluruh Data Anda Yang Valid</li>
                                                    <li>Jika Ada Simbol * Maka Anda Wajib Mengisikannya. Tetapi Sangat disarankan Mengisikan Form Keseluruhan.</li>
                                                    <li>Bila Anda Sudah Menggunakan Sistem Aplikasi PPDB Online Ini Jangan Lupa Untuk Logout</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12" style="text-align: right;">
                                 <input type="submit" name="tb_update" value="Simpan Data Siswa" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        <?php
            }
        else
            {
                ?>
                <script type="text/javascript">
                    window.location="../index";
                </script>
                <?php
            }
    }
else
    {
        ?>
        <script type="text/javascript">
            window.location="../index";
        </script>
        <?php
    }
?>

