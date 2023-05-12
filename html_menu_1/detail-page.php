
<?php


$link = $_GET["link"];

$uye_getir = $db->prepare("SELECT * FROM sayfa_ici WHERE url_adi = ?");
$uye_getir->execute(array($link));
if ($uye_getir) {
    $uye = $uye_getir->fetch(PDO::FETCH_OBJ);
}

$id = $uye->id;
?>
<?php
if( $id !== NULL AND $uye->firma_durum == 0 ) {
?>
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
            "name": "Firmalar",
            "item": "https://siteadresi.com/butun-firmalar"
        },
        {
            "@type": "ListItem",
            "position": 3,
            "name": "<?php echo $uye->sirket_adi ?>",
            "item": "<?php echo $canonical ?>"
        }
    ]
}
</script>
<?php

$hit = $db->prepare("UPDATE sayfa_ici SET firma_goruntuleme= firma_goruntuleme +1 WHERE id = ?");
$hit->execute(array($id));
?>


<!-- YORUM PUANINI KAÇA BÖLMEK İÇİN TOPLAM YORUM SAYISI BAŞLANGIÇS -->
<?php
$yorum_sayisi = "SELECT count(*) FROM firma_yorumlari WHERE firma_id = $id  AND yorum_durum = 0 ORDER BY yorum_puan";
$sayi = $db->query($yorum_sayisi);
$toplam_yorum_sayisi = $sayi->fetchColumn();
?>
<!-- YORUM PUANINI KAÇA BÖLMEK İÇİN TOPLAM YORUM SAYISI BİTİŞ -->




<?php
$toplam_yorum_puani = 0;
                            $yorumların_puani = $db -> prepare("SELECT * FROM firma_yorumlari WHERE  firma_id = ? AND yorum_durum = 0 ORDER BY id DESC ");
                $yorumların_puani->execute(array($id));
                $yorumların_puani_sonucu=$yorumların_puani->fetchAll();
                foreach ($yorumların_puani_sonucu as $yorum_puanlari) {

					// YORUM PUANLARININ TOPLAMI
					$toplam_yorum_puani += $yorum_puanlari['yorum_puan'];
 }					// YORUM PUANLARININ TOPLAMI


 // YORUM PUANI ORTALAMASI SONUCU
 $yorum_puan_ortalama_sonucu = $toplam_yorum_puani / $toplam_yorum_sayisi ;
  // YORUM PUANI ORTALAMASI SONUCU


  // YORUM PUANI ORTALAMASININ SONUCUNU 3 BASAMAGA İNDİRDİM
  $yorum_puan_ortalama_sonucu = substr($yorum_puan_ortalama_sonucu, 0,3);
    // YORUM PUANI ORTALAMASININ SONUCUNU 3 BASAMAGA İNDİRDİM


 ?>

	 <?php
                   if ($_POST['yorumgonder']) {



			$sirket_adi	= $uye->sirket_adi;
              $yorum_ad = htmlspecialchars(addslashes(strip_tags(trim($_POST["yorum_ad"]))));
			  $yorum_soyad =htmlspecialchars(addslashes(strip_tags(trim($_POST["yorum_soyad"]))));
              $yorum_telefon =htmlspecialchars(addslashes(strip_tags(trim($_POST["yorum_telefon"]))));
              $yorum_eposta =htmlspecialchars(addslashes(strip_tags(trim($_POST["yorum_eposta"]))));
              $yorum_icerik =htmlspecialchars(addslashes(strip_tags(trim($_POST["yorum_icerik"]))));
               $aracikurum = htmlspecialchars(addslashes(strip_tags(trim($_POST["aracikurum"]))));
			  $yorum_tarih = date('Y-m-d H.i:s');
              $yorum_puan = trim($_POST["yorum_puan"]);





              if (empty($yorum_ad) ||  empty($yorum_soyad)  ||  empty($yorum_telefon)  ||  empty($yorum_eposta)  ||    empty($sirket_adi)  ||  empty($yorum_tarih)  ||  empty($yorum_puan) ) {
                  echo '
                     <div class="alert alert-danger" style="text-align:center;" role="alert">
                     * TÜM BİLGİLERİNİZİ EKSİKSİZ BİR ŞEKİLDE DOLDURUNUZ *
                          </div>';
              } else {
                $insert = $db->prepare("INSERT INTO firma_yorumlari (firma_id, yorum_ad, yorum_soyad, yorum_telefon, yorum_eposta, aracikurum, yorum_icerik, sirket_adi, yorum_tarih, yorum_puan) VALUES (?,?,?,?,?,?,?,?,?,?)");
                $insert -> execute(array($id, $yorum_ad, $yorum_soyad, $yorum_telefon, $yorum_eposta, $aracikurum, $yorum_icerik, $sirket_adi, $yorum_tarih, $yorum_puan));

                if ($insert){
                    echo '
                    <div class="alert alert-success" role="alert">
Yorumunuz Başarı İle Gönderilmiştir.                    </div>';
                }

				else{
                    echo '
                    <div class="alert alert-danger" role="alert">
Yorum Yapma Başarısız. Bütün Bilgilerinizi Eksiksiz Bir Şekilde Doldurmalısınız. </div>';
                }
                  }
              }

			  if ($_POST['popupincele']) {
			  
			
					$firma_adi	= $uye->sirket_adi;
				  $popupadsoyad = htmlspecialchars(addslashes(strip_tags(trim($_POST["popupadsoyad"]))));
				  $popuptel =htmlspecialchars(addslashes(strip_tags(trim($_POST["popuptel"]))));
				  $popupmail =htmlspecialchars(addslashes(strip_tags(trim($_POST["popupmail"]))));
				  $popupmesaj =htmlspecialchars(addslashes(strip_tags(trim($_POST["popupmesaj"]))));
				  $form_tarih = date('Y-m-d H.i:s');
	
				  
	
	
	
				  if (empty($popupadsoyad)   ||  empty($popuptel)  ||  empty($popupmail)   ||  empty($firma_adi)  ||  empty($form_tarih)   ) {
					  echo '
						 <div class="alert alert-danger" style="text-align:center;" role="alert">
						 * TÜM BİLGİLERİNİZİ EKSİKSİZ BİR ŞEKİLDE DOLDURUNUZ *
							  </div>';
				  } else {
					$insert = $db->prepare("INSERT INTO inceleme_popup (firma_id, popupadsoyad, popuptel, popupmail, popupmesaj, firma_adi, form_tarih) VALUES (?,?,?,?,?,?,?)");
					$insert -> execute(array($id, $popupadsoyad, $popuptel, $popupmail, $popupmesaj, $firma_adi, $form_tarih));
						  
					if ($insert){
						echo '
						<div class="alert alert-success" role="alert">
	İstek ve Görüşleriniz Başarı İle Gönderilmiştir.                    </div>';
					}
					
					else{
						echo '
						<div class="alert alert-danger" role="alert">
				Form Gönderimi Başarısız. Bütün Bilgilerinizi Eksiksiz Bir Şekilde Doldurmalısınız. </div>';
					}
					  }
				  }
          ?>

<style>
ul{list-style:default !important;}
.mbldebuyu{width:70%; height:175px;}

@media screen and (max-width:600px) {



.mbldebuyu{width:100% !important; height:175px;}



}
</style>



	<main>
		<div id="breadcrumb">
			<div class="container">
				<ul>
					<li><a href="<?php echo $url; ?>/">Anasayfa</a></li>
					<li><a href="<?php echo $url; ?>/butun-firmalar">Firmalar</a></li>
									<li><a href=""><?php echo $uye->sirket_adi ?></a></li>
				</ul>
			</div>
		</div>
		<!-- /breadcrumb -->
		

		<div class="container ">
		    	

			<div class="row">
				<div class="col-xl-8 col-lg-8">
					<nav id="secondary_nav">
						<div class="container">
							<ul class="clearfix">
						<li><a href="#genel_bilgi" class="active">Genel Bilgi</a></li>
								<li><a href="#yorumlar">Yorumlar</a></li>
							</ul>
						</div>
					</nav>
					<div id="genel_bilgi">
						<div class="box_general_3">
							<div class="profile">
								<div class="row">
									<div class="col-lg-5 col-md-4">
										<figure style="margin-top: 55px;">
										<img src="<?php echo $url; ?>/html_menu_1/img/<?php echo $uye->sirket_logo; ?>" alt="<?php echo $uye->sirket_adi; ?>"  class="img-logo">
										</figure>
									</div>
									<div class="col-lg-7 col-md-8">
										<small> İncelemeleri</small>
										<h1><?php echo $uye->sirket_adi; ?></h1>

										<ul class="statistic">
											<li> <?php echo $uye->firma_goruntuleme;?> Görüntüleme</li>
										</ul>
										<ul class="contacts">
											<li>
												<h6>Adres</h6>
												<?php echo $uye->sirket_konum; ?>
											</li>
											<li>
												<h6>Telefon Numarası</h6> <?php echo $uye->sirket_telefon; ?></li>
										</ul>
									</div>
								</div>
							</div>

							<hr>

							<!-- /profile -->
							<div class="indent_title_in">
								<i class="pe-7s-user"></i>
								<h3><?php echo $uye->sirket_adi; ?> Hakkında</h3>
								<p><?php echo $uye->sirket_adi; ?> Hakkında İçerik Yazısı </p>
							</div>
							<div class="wrapper_indent">
							<?php echo $uye->icerik; ?>
								<!-- /row-->
							</div>
							<!-- /wrapper indent -->

							<hr>









							<div class="indent_title_in">
								<i class="pe-7s-cash"></i>
								<h3>Detaylı Bilgi</h3>
								<p><?php echo $uye->sirket_adi; ?> Hakkında Detaylı Bilgi </p>
							</div>
							<div class="wrapper_indent">
							<p><?php echo $uye->sirket_adi; ?> Hakkında Bilinmesi Gereken Detaylara Aşağıda Gördüğünüz Tablodan Ulaşabilir Ve İnceleyebilirsiniz. </p>
								<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th style="text-align: center;" colspan="2">ŞİRKET BİLGİLERİ</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Şirket Adı</td>
											<td><?php echo $uye->sirket_adi;?></td>
										</tr>
										<tr>
											<td>Web Sitesi</td>
											<td> <?php echo $uye->sirket_web_sitesi;?>  </td>
										</tr>
										<tr>
											<td>Şirket Merkezi</td>
											<td><?php echo $uye->sirket_merkezi; ?> </td>
										</tr>
										<tr>
											<td>Regülatör</td>
											<td><?php echo $uye->sirket_regulator; ?> </td>
										</tr>
										<tr>
											<td>Telefon</td>
											<td><?php echo $uye->sirket_telefon;?></td>
										</tr>
										<tr>
											<td>E-Posta Adresi</td>
											<td><?php echo $uye->sirket_eposta; ?> </td>
										</tr>

										<tr>
											<td>Türkçe Destek</td>
											<td><?php echo $uye->sirket_turkce_destek; ?> </td>
										</tr>

									

									</tbody>
								</table>
								</div>
							</div>
							<!--  /wrapper_indent -->
						</div>
						<!-- /section_1 -->
					</div>
					<!-- /box_general -->




						<!-- YORUM YAPMA KISMI BAŞLANGIÇ -->

					<div class=" col-lg-12 ml-auto">
					<div class="box_general">
						<h3>Yorum Yap</h3>
						<p>
Firma İle İlgili Yorum Ve Düşünceleriniz						</p>
						<div>
							<div id="message-contact"></div>
							<form method="post" id="contactform">
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" id="name_contact" name="yorum_ad" placeholder="Adınız" maxlength="30" required>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" id="lastname_contact" name="yorum_soyad" placeholder="Soy Adınız" maxlength="30" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<input type="email" id="email_contact" name="yorum_eposta" class="form-control" placeholder="E-Posta" required>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<input type="text" id="telefon_numarasi" name="yorum_telefon" class="form-control" placeholder="Telefon Numarası" required>
										</div>
									</div>
										<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control" id="name_contact" name="aracikurum" placeholder="Hangi Kurumu Arıyorsunuz?" maxlength="30" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea rows="5" id="message_contact" name="yorum_icerik" class="form-control" style="height:100px;" placeholder="Yorum Ve Fikirleriniz"></textarea>
										</div>
									</div>
								</div>
								<div class="col-md-12">
								<div class="form-group">
									<label> Puan: </label>
						<select style="text-align: center;" name="yorum_puan" class="form-control">
							<option selected value="5">5</option>
							<option value="4">4</option>
							<option value="3">3</option>
							<option value="2">2</option>
							<option value="1">1</option>
						</select>
								</div>

								</div>

								<input type="submit" value="Gönder" name="yorumgonder" class="btn_1 add_top_20" id="submit-contact">
							</form>
						</div>
						<!-- /col -->
					</div>
				</div>
						<!-- YORUM YAPMA KISMI BİTİŞ -->








					<div id="yorumlar">
						<div class="box_general_3">
							<div class="reviews-container">
								<div class="row">
									<div class="col-lg-3">
										<div id="review_summary">
											<strong> <?php if($yorum_puan_ortalama_sonucu != 0) { echo $yorum_puan_ortalama_sonucu;} else {echo "0";}  ?></strong>

											<small> <?php echo $toplam_yorum_sayisi; ?> İncelemeye Göre</small>
										</div>
									</div>

								
								</div>
								<!-- /row -->








							<?php
							$yorumlar = $db -> prepare("SELECT * FROM firma_yorumlari WHERE  firma_id = ? AND yorum_durum = 0  ORDER BY id DESC ");
                $yorumlar->execute(array($id));
                $yorum_sonuc=$yorumlar->fetchAll();
                foreach ($yorum_sonuc as $yorum) {
						?>




								<!-- Yorum Kısmı Başlangıç -->
								<hr>

								<div class="review-box clearfix">
									<figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg" alt="placeholder">

									</figure>


									<div class="rev-content">
										<div class="rating">
										<div id="yorumadsoyad" style="padding-bottom:20px;"> <h6> <?php echo $yorum['yorum_ad']; ?> <?php echo $yorum['yorum_soyad']; ?> </h6>  </div>


										<!-- VERDİĞE PUANA GÖRE KAÇ YILDIZ YANMASINI SAĞLIYOR-->

										<?php if($yorum['yorum_puan'] == 5) { ?> <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i> <?php	} elseif($yorum['yorum_puan'] == 4) {?>  <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star "></i> <?php }  elseif($yorum['yorum_puan'] == 3) { ?> <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star "></i><i class="icon_star "></i>  <?php } elseif($yorum['yorum_puan'] == 2) { ?> <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star "></i><i class="icon_star "></i><i class="icon_star "></i>  <?php } else { ?> <i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star "></i><i class="icon_star "></i><i class="icon_star "></i> <?php }	?>

										<!-- VERDİĞE PUANA GÖRE KAÇ YILDIZ YANMASINI SAĞLIYOR-->

										</div>
										<div class="rev-info">
											<?php echo $yorum['yorum_tarih']; ?>
																			</div>
										<div class="rev-text">
											<p>
											<?php echo $yorum['yorum_icerik']; ?>
											</p>
										</div>
									</div>
								</div> 	<!-- Yorum Kısmı Bitiş -->





                <?php } ?>












							</div>			<!-- End review-container -->

						</div>
					</div>
					<!-- /section_2 -->
				</div>
				<!-- /col -->
				<aside class="col-xl-4 col-lg-4" id="sidebar">
					<div class="box_general_3 booking" style="text-align:center;">

        	<div class="row">


<div class="wrap">
	<div class="search">
		<input id="search" autocomplete="off" name="aramasorgusu" type="text" class="searchTerm" placeholder="Arama Yap ....">
		<button type="submit" class="searchButton">
			<i class="fa fa-search"></i>
		</button>
	</div>
</div>
<div class="input-group" id="custom-search-input">


	<!--  ARAMADAN GELEN SONUCUN GÖSTERİLDİĞİ YER-->
	<div class="result col-md-12" style="background-color: white; margin-bottom:20px;  -webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px; width:100%; overflow:auto;     max-height: 195px;">


	</div>

</div>
<!-- ARAMADAN GELEN SONUCUN GÖSTERİLDİĞİ YER-->



</div>
        	<div class="row">

               
									<!--

						<form>
							<div class="title">
							<h3>Book a Visit</h3>
							<small>Monday to Friday 09.00am-06.00pm</small>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<input class="form-control" type="text" id="booking_date" data-lang="en" data-min-year="2020" data-max-year="2024" data-disabled-days="10/17/2017,11/18/2017">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<input class="form-control" type="text" id="booking_time" value="9:00 am">
									</div>
								</div>
							</div>
							<ul class="treatments clearfix">
								<li>
									<div class="checkbox">
										<input type="checkbox" class="css-checkbox" id="visit1" name="visit1">
										<label for="visit1" class="css-label">Back Pain visit <strong>$55</strong></label>
									</div>
								</li>
								<li>
									<div class="checkbox">
										<input type="checkbox" class="css-checkbox" id="visit2" name="visit2">
										<label for="visit2" class="css-label">Cardiovascular screen <strong>$55</strong></label>
									</div>
								</li>
								<li>
									<div class="checkbox">
										<input type="checkbox" class="css-checkbox" id="visit3" name="visit3">
										<label for="visit3" class="css-label">Diabetes consultation <strong>$55</strong></label>
									</div>
								</li>
								<li>
									<div class="checkbox">
										<input type="checkbox" class="css-checkbox" id="visit4" name="visit4">
										<label for="visit4" class="css-label">General visit <strong>$55</strong></label>
									</div>
								</li>
							</ul>
							<hr>
							<a href="booking-page.html" class="btn_1 full-width">Book Now</a>
						</form>

					-->
					</div>
					<!-- /row -->

					</div>
					<!-- /box_general -->
				</aside>
				<!-- /asdide -->
			</div>
			<!-- /row -->
            <style>
                .basliksonyazi{background-color: white; height: 100%; border-radius: 0px 0px 0px 0px;}
                .basliksonyazi h3{line-height: 200%; text-align: center;}
                .resimsonyazi img{width: 60% ; height: 60%; text-align: center; margin: 15px}
                .resimsonyazi {width: 100% ; height: 100%; text-align: center; background-color: white;border-radius: 10px 10px 0px 0px;}
                .iceriksonyazi{background-color: white; width: 100% ;  height: 100%; border-radius: 0px 0px 10px 10px; text-align: center;}
                .btndevam{background-color: #e74e84; color: white; width: 100% ;  height: 100%; border-radius: 10px; text-align: center;}


            </style>
              <div id="yorumlar">
                    <div class="reviews-container">


                        <div class="row">
                            <div class="col-lg-12" style="padding: 25px ; border-radius: 15px; background-color: white; width: 100%">
                                <h3 style="text-align: center"  > Şirket İncelemeleri</h3>
                            </div>

                            <?php




            $limit2 = 3;
            $uyeler2 = $db -> prepare("SELECT * FROM sayfa_ici WHERE firma_durum = 0  ORDER BY id DESC LIMIT  $limit2");
            $uyeler2->execute(array());
            $uye_sonuc2=$uyeler2->fetchAll();
            foreach ($uye_sonuc2 as $uye2) {

            //Goruntulencek Metnin Tam Hali
            $detay2 = $uye2['icerik'];
            //Var olan metin içindeki karakter sayısı
            $uzunluk2 = strlen($detay2);
            //Kaç Karakter Göstermek İstiyorsunuz
            $limit2 = 150;
            //Uzun olan yer “devamı…” ile değişecek.
            if ($uzunluk2 > $limit2) {
                $detay2 = substr($detay2,0,$limit2);
            }

            if($uye2['firma_durum'] == 0) {

            ?>




                             <div class="col-lg-4" style="padding: 25px">
                                <div class="row">
                                    <div class="resimsonyazi"><img src="html_menu_1/img/<?php echo $uye2['sirket_logo']?>" alt=""></div>

                                    <div class="basliksonyazi"><h3><?php echo $uye2['sirket_adi'];?></h3></div>
                                    <div class="iceriksonyazi"><p> <?php echo $detay2; ?></p></div>

                                    <div class="devamınıokusonyazi"><a href="<?= $uye2['url_adi'] ?>" class="btn btn-sm btndevam">Devamını Oku</a></div>


                                </div>
                            </div>

<?php  }} ?>



                        </div>
                    </div>
                  <!-- /container -->
    </main>
    <!-- /main -->


<?php if($_POST['popupincele'] == NULL && $_POST['yorumgonder']  == NULL) { ?>
    <p>
      <label style="display:none !important;" for="contract-popup" class="popupac" data-modal="modalOne" ></label>
    </p>
  
    <div id="modalOne" class="modal">
      <div class="modal-content">
        <div class="contact-form">
          <a class="close">&times;</a>
          <form method="post" class="inceleform">
            <h2>İnceleme Hakkındaki Düşüncelerinizi ve Merak Ettiklerinizi Bizimle Paylaşın!</h2>
            <div>
              <input required class="fname" type="text" name="popupadsoyad" placeholder="Ad Soyad" />
              <input required type="email" name="popupmail" placeholder="E-Posta" />
              <input required type="text" name="popuptel" placeholder="Telefon Numarası" id="telefon_numarasipopup" />
			  
            </div>
            <span>Mesajınız</span>
            <div>
              <textarea  name="popupmesaj" rows="4"></textarea>
            </div>
			<input type="submit" value="Gönder" name="popupincele"  class="btn_1 add_top_20" id="submit-contact">
          </form>
        </div>
      </div>
    </div>
   
    <script>
		  setTimeout(function(){
     $('label[for=contract-popup]').first().trigger("click");
},4000);
      let modalBtns = [...document.querySelectorAll(".popupac")];
      modalBtns.forEach(function (btn) {
        btn.onclick = function () {
          let modal = btn.getAttribute("data-modal");
          document.getElementById(modal).style.display = "block";
        };
      });
 let closeBtns = [...document.querySelectorAll(".close")];
      closeBtns.forEach(function (btn) {
        btn.onclick = function () {
          let modal = btn.closest(".modal");
          modal.style.display = "none";
        };
      });
      window.onclick = function (event) {
        if (event.target.className === "modal") {
          event.target.style.display = "none";
        }
      };
    </script>
<?php }  ?>



	<?php } else {include 'html_menu_1/404.php';}
?>