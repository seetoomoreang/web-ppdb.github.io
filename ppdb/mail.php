<?php
 
date_default_timezone_set("Asia/Jakarta");
$nil=$_GET['m'];
$us=$_GET['us'];
$ps=$_GET['ps'];

include "classes/class.phpmailer.php";
$email="$nil";
$mail = new PHPMailer; 
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl'; 
$mail->Host = "srv49.niagahoster.com"; 
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "admin_ppdb@rdigitalpro.com"; //user email
$mail->Password = "sakura@89"; //password email 
$mail->SetFrom("admin_ppdb@rdigitalpro.com","Admin SMP Muhammadiyah 4 Yogyakarta"); //set email pengirim
$mail->Subject = "Informasi Registrasi"; //subyek email
$mail->AddAddress("$email","nama email tujuan");  //tujuan email
$mail->MsgHTML("Terima kasih anda telah melakukan pendaftaran di SMP Muhammadiyah 4 Yogyakarta. Berikut adalah data untuk masuk ke panel dashboard anda.<br /><br />

    <h3>Username: $us</h3>
    <h3>Password: $ps</h3>

    Salam Hormat Kami,<br />
    SMP MUHAMMADIYAH 4 YOGYAKARTA<br />
    Jl. Ki Mangunsarkoro No.43, Gunungketur, Pakualaman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55111<br />
    (0274) 554623");
$mail->Send();
?>
<script type="text/javascript">
    window.location="mendaftar?st=ok#fc"
</script>