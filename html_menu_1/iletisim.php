
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Anasayfa",
            "item": "https://siteadresi.com"
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "İletisim",
            "item": "https://siteadresi.com/iletisim"
        }
    ]
}
</script>


<?php 





if ($_POST) {
			  
			
	  $iletisim_ad = htmlspecialchars(addslashes(strip_tags(trim($_POST["iletisim_ad"]))));
	  $iletisim_soyad =htmlspecialchars(addslashes(strip_tags(trim($_POST["iletisim_soyad"]))));
	  $iletisim_telefon =htmlspecialchars(addslashes(strip_tags(trim($_POST["iletisim_telefon"]))));
	  $iletisim_eposta =htmlspecialchars(addslashes(strip_tags(trim($_POST["iletisim_eposta"]))));
	  $iletisim_mesaj =htmlspecialchars(addslashes(strip_tags(trim($_POST["iletisim_mesaj"]))));
	  $iletisim_tarih = date('Y-m-d H.i:s');

	  



	  if (empty($iletisim_ad) ||  empty($iletisim_soyad)  ||  empty($iletisim_telefon)  ||  empty($iletisim_eposta)  ||  empty($iletisim_mesaj) ||   empty($iletisim_tarih)  ) {
		  echo '
			 <div class="alert alert-danger" style="text-align:center;" role="alert">
			 * TÜM BİLGİLERİNİZİ EKSİKSİZ BİR ŞEKİLDE DOLDURUNUZ *
				  </div>';
	  } else {
		$insert = $db->prepare("INSERT INTO firma_iletisim (iletisim_ad, iletisim_soyad, iletisim_telefon, iletisim_eposta, iletisim_mesaj, iletisim_tarih) VALUES (?,?,?,?,?,?)");
		$insert -> execute(array($iletisim_ad, $iletisim_soyad, $iletisim_telefon, $iletisim_eposta, $iletisim_mesaj, $iletisim_tarih));
			  
		$mesaj = "AD: ".$iletisim_ad."</br> SOYAD: ".$iletisim_soyad."</br> E-posta: ".$iletisim_eposta."</br> Telefon: ".$iletisim_telefon."</br> MESAJ: ".$iletisim_mesaj."</br> Tarih: ".$iletisim_tarih; 
		if ($insert){

			mailgonder($mesaj);
			echo '
			<div class="alert alert-success" role="alert">
Mesajınız Başarılı Bir Şekilde Gönderilmiştir.   </div>';
		}
		
		else{
			echo '
			<div class="alert alert-danger" role="alert">
Mesaj Gönderme Başarısız. Bütün Bilgilerinizi Eksiksiz Bir Şekilde Doldurmalısınız. </div>';
		}
		  }
	  }









function mailgonder($mesaj){
	require "html_menu_1/inc/class.phpmailer.php"; // PHPMailer dosyamızı çağırıyoruz  
	$mail = new PHPMailer();   




	$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; // Güvenli baglanti icin ssl normal baglanti icin tls
$mail->Host = "mail.siteadresi.com"; // Mail sunucusuna ismi
$mail->Port = 587; // Gucenli baglanti icin 465 Normal baglanti icin 587
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "iletisim@siteadresi.com"; // Mail adresimizin kullanicı adi
$mail->Password = "Password"; // Mail adresimizin sifresi
$mail->SetFrom("iletisim@siteadresi.com"); // Mail attigimizda gorulecek ismimiz
$mail->AddAddress("mailadres@gmail.com"); // Maili gonderecegimiz kisi yani alici
$mail->Subject = "Site-İsmi İletişim"; // Konu basligi
 $mail->Body = $mesaj; // Mailin icerigi
if(!$mail->Send()){
  //  echo "Mailer Error: ".$mail->ErrorInfo;
} else {
  //  echo "Mesaj gonderildi";
}

}
?>


	<main>
		<div id="breadcrumb">
			<div class="container">
				<ul>
				<li><a href="<?php echo $url; ?>/">Anasayfa</a></li>
                <li> <a href=""> İletisim </a></li>
					
				</ul>
			</div>
		</div>

		<div class="container margin_60_35">
			<div class="row">
				<aside class="col-lg-3 col-md-4">
					<div id="contact_info">
						<h3>İletişim Bilgileri</h3>
						<p>
							 New York, US<br> + 111 (1) 11111 1111<br>
							<a href="#">info@siteadresi.com</a>
						</p>

					
					</div>
				</aside>
				<!--/aside -->
				<div class=" col-lg-8 col-md-8 ml-auto">
					<div class="box_general">
						<h3>Bize Ulaşın</h3>
						<p>
							İletişim formunu doldurarak bize ulaşabilirsiniz.
						</p>
						<div>
							<div id="message-contact"></div>
							<form method="post" id="contactform">
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" id="name_contact" name="iletisim_ad" placeholder="Ad" required>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" id="lastname_contact" name="iletisim_soyad" placeholder="Soyad" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<input type="email" id="email_contact" name="iletisim_eposta" class="form-control" placeholder="E-posta" required>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<input type="text" id="phone_contact" name="iletisim_telefon" class="form-control" placeholder="Telefon Numarası" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea rows="5" id="message_contact" name="iletisim_mesaj" class="form-control" style="height:100px;" placeholder="Mesajınız." required></textarea>
										</div>
									</div>
								</div>
								
								<input type="submit" value="Gönder" class="btn_1 add_top_20" id="submit-contact">
							</form>
						</div>
						<!-- /col -->
					</div>
				</div>
				<!-- /col -->
			</div>
			<!-- End row -->
		</div>
		<!-- /container -->
	</main>
	<!-- /main -->
	