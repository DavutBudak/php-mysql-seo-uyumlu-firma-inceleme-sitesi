<?php

require_once("admin-duzenle-head-footer/header.php");

$id = intval($_GET["id"]);
    $firmalar = $db->prepare("SELECT * FROM sayfa_ici WHERE id = ?");
    $firmalar->execute(array($id));
    if ($firmalar) {
        $firma = $firmalar->fetch(PDO::FETCH_OBJ);
    }

?>
<?php 
if ($_POST['logo_degistir']) {

	   $gecici_ad=$_FILES["sirket_logo"]["tmp_name"];
	   $rand =substr(md5(uniqid(rand())),0,10);
	   $kalici_yol_ad="../../html_menu_1/img/".$randomubunaal=$rand.($_FILES["sirket_logo"]["name"]);
	   if ($_FILES["sirket_logo"]["size"]  > 4000000) {
	
		  echo "<font color='green'>Dosya Boyutu Sınırı Aşıyor (Max Boyut 4 'MB' dir).","</font>";
	   } else { 
	  
	   if ($_FILES["sirket_logo"]["error"]) // hata oluştu ise
		  echo "<font color='green'>Hata Oluştu Ve Dosya Yüklenemedi (Dosya Seçtiğinizden Emin Olun).","</font>";
	   else{
		  if (file_exists($kalici_yol_ad)) // yüklenen dosya upload dizininde varsa
			 echo "<font color='red'>Yazdığınız ad ile bir dosya zaten kayıtlıdır.</font>";
		  else{
			 if ( move_uploaded_file($gecici_ad,$kalici_yol_ad)) {
	
			  $resim_tarih = date("Y-m-d H:i:s");
			  $sirket_logo = $randomubunaal=$rand.($_FILES["sirket_logo"]["name"]);
			  
		$firma_logo_duzenle = $db->prepare("UPDATE sayfa_ici SET sirket_logo = ? WHERE id = ? ");
		$firma_logo_duzenle->execute(array($sirket_logo, $id));
	
		if ($firma_logo_duzenle) {
			echo '
						 <div class="alert alert-success" style="text-align:center;" role="alert">
						 Değişiklikler kayıt edildi. Listeye yönlendirilecek.
						 </div>';
			header("Location:");  }
			 } // eğer dosya kaydedilirse
			 
				
			 else
				 echo "";
		  }
	   }
	}
}

	?>
<?php
	if($_POST['form_gonder']){

        $icerik = ($_POST["icerik"]);
        $sirket_adi = htmlspecialchars(addslashes(strip_tags(trim($_POST["sirket_adi"]))));
        $sirket_web_sitesi = htmlspecialchars(addslashes(strip_tags(trim($_POST["sirket_web_sitesi"]))));
        $sirket_merkezi = htmlspecialchars(addslashes(strip_tags(trim($_POST["sirket_merkezi"]))));
        $sirket_regulator = htmlspecialchars(addslashes(strip_tags(trim($_POST["sirket_regulator"]))));
        $sirket_telefon = htmlspecialchars(addslashes(strip_tags(trim($_POST["sirket_telefon"]))));
        $sirket_eposta = htmlspecialchars(addslashes(strip_tags(trim($_POST["sirket_eposta"]))));
        $sirket_turkce_destek = htmlspecialchars(addslashes(strip_tags(trim($_POST["sirket_turkce_destek"]))));
        $sirket_bonus = htmlspecialchars(addslashes(strip_tags(trim($_POST["sirket_bonus"]))));
		$sirket_konum = htmlspecialchars(addslashes(strip_tags(trim($_POST["sirket_konum"]))));
		$firma_eklenme_tarihi = date('Y-m-d H:i:s');
		$url_adi = htmlspecialchars(addslashes(strip_tags(trim($_POST["url_adi"]))));
		$firma_title = htmlspecialchars(addslashes(strip_tags(trim($_POST["firma_title"]))));
		$firma_description = htmlspecialchars(addslashes(strip_tags(trim($_POST["firma_description"]))));
		$firma_puan = htmlspecialchars(addslashes(strip_tags(trim($_POST["firma_puan"]))));
		$firma_goruntuleme = htmlspecialchars(addslashes(strip_tags(trim($_POST["firma_goruntuleme"]))));







        if (empty($icerik) ||  empty($sirket_adi)  ||  empty($sirket_web_sitesi)  ||  empty($sirket_merkezi)  ||  empty($sirket_regulator) ||   empty($sirket_telefon)  ||  empty($sirket_eposta)  ||  empty($sirket_turkce_destek) ||  empty($sirket_bonus)||  empty($sirket_konum) ||   empty($firma_title)||   empty($firma_description)||   empty($firma_puan)||   empty($firma_goruntuleme) ||   empty($url_adi)   ) {
          echo '
                       <div class="alert alert-danger" style="text-align:center;" role="alert">
                       Yıldızlı alanlar boş bırakılamaz.
                      </div>';
        }else {
            $firma_duzenle = $db->prepare("UPDATE sayfa_ici SET icerik =?, sirket_adi =?, sirket_web_sitesi =?, sirket_merkezi =?, sirket_regulator =?, sirket_telefon =?, sirket_eposta =?, sirket_turkce_destek =?, sirket_bonus =?, sirket_konum =?, firma_eklenme_tarihi =? , firma_title =? , firma_description =? , firma_puan =? , firma_goruntuleme =? , url_adi =?  WHERE id = ? ");
		$firma_duzenle->execute(array($icerik, $sirket_adi, $sirket_web_sitesi, $sirket_merkezi, $sirket_regulator, $sirket_telefon, $sirket_eposta, $sirket_turkce_destek, $sirket_bonus, $sirket_konum,  $firma_eklenme_tarihi, $firma_title, $firma_description, $firma_puan, $firma_goruntuleme, $url_adi, $id));
         
		
		if ($firma_duzenle) {
              echo '
                           <div class="alert alert-success"  style="text-align:center;"  role="alert">
                           Değişiklikler kayıt edildi. Listeye yönlendirilecek.
                           </div>';
              header("Location:../bookings.php");
            } else {
              echo '
                           <div class="alert alert-danger" style="text-align:center;" role="alert">
                           Üye güncelleme başarısız. Bir sorun oluştu.
                           </div>';
            }
          }
        }
 

     
      ?>








<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Firma Düzenle</a>
        </li>
        <li class="breadcrumb-item active">Şuanki Sayfa</li>
      </ol>

	  <button class="buton btn btn-success" style="width: 100%;">Firma Logosunu Değiştir</button>

	  <div  class="logodegis box_general padding_bottom" style="display:none ;">
			<div class="header_box version_2">
			<form method="post" enctype="multipart/form-data">

				<h2><i class="fa fa-file"></i>Logo Değiştir</h2>
			</div>
			<div class="row">

			<div class="col-md-6">
					<div class="form-group">
						<label>Firma Logo</label>
						<input type="file" class="form-control" placeholder="Firma Logo" name="sirket_logo" > 
						<small style="color:red;">Logo Boyutu : 240*100</small>
				</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-10"><img
                                            src="../../html_menu_1/img/<?php echo $firma->sirket_logo;?>" class="img-logo"
                                            alt=""></div>

				</div>
				</div>


			</div>
			<div class="row">

<input type="submit" class="btn-lg btn-primary " name="logo_degistir" style="float:right ;" >


</div>
			</form>

	  </div>







	  <form method="post" enctype="multipart/form-data">
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Temel Bilgi</h2>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Firma İsmi</label>
						<input type="text" class="form-control" placeholder="Firma İsmi" name="sirket_adi" value="<?php echo $firma->sirket_adi;?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>E-posta</label>
						<input type="email" class="form-control" placeholder="Firma posta" name="sirket_eposta" value="<?php echo $firma->sirket_eposta;?>">
					</div>
				</div>
		
		
			</div>
			<!-- /row-->
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Telefon Numarası</label>
						<input type="text" class="form-control" placeholder="Firma Telefon Numarası" name="sirket_telefon" value="<?php echo $firma->sirket_telefon;?>">
					</div>
				</div>

			
			</div>
	
			<!-- /row-->
		
		</div>
		<!-- /box_general-->
		
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-map-marker"></i>Adres Bilgileri</h2>
			</div>
		
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Firma Merkezi</label>
						<input type="text" class="form-control" placeholder="Firma Merkezi" name="sirket_merkezi" value="<?php echo $firma->sirket_merkezi;?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Firma Açık Adres</label>
						<input type="text" class="form-control" placeholder="Firma Açık Adres" name="sirket_konum" value="<?php echo $firma->sirket_konum;?>">
					</div>
				</div>
			</div>
			<!-- /row-->
		</div>
		<!-- /box_general-->




		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-map-marker"></i>Ek Bilgiler</h2>
			</div>
		
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Türkçe Destek</label>
						<select name="sirket_turkce_destek" class="form-control">
						<option value="<?php echo $firma->sirket_turkce_destek;?>"><?php echo $firma->sirket_turkce_destek;?></option>

									<option value="var">var</option>
									<option value="yok">yok</option>
								</select>
					</div>
				</div>

	

				<div class="col-md-6">
					<div class="form-group">
						<label>Web Sitesi</label>
						<input type="text" class="form-control" placeholder="Firma Web Sitesi" name="sirket_web_sitesi" value="<?php echo $firma->sirket_web_sitesi;?>">
					</div>
				</div>


			</div>
			<!-- /row-->
		</div>
		<!-- /box_general-->



		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Ek Bilgiler (2)</h2>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Firma Title</label>
						<input type="text" class="form-control" placeholder="Firma Title" name="firma_title" value="<?php echo $firma->firma_title;?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Firma Description</label>
						<input type="text" class="form-control" placeholder="Firma Description" name="firma_description" value="<?php echo $firma->firma_description;?>">
					</div>
				</div>
		
		
			</div>
			<!-- /row-->
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Firma Puan</label>
						<input type="text" class="form-control" placeholder="Firma Puan" name="firma_puan" value="<?php echo $firma->firma_puan;?>">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>Firma Görüntüleme</label>
						<input type="text" class="form-control" placeholder="Firma Görüntüleme" name="firma_goruntuleme" value="<?php echo $firma->firma_goruntuleme;?>">
					</div>
				</div>
					<div class="col-md-12">
					<div class="form-group">
						<label>Firma Url Adı</label>
						<input type="text" class="form-control" placeholder="Firma Url Adı" name="url_adi" value="<?php echo $firma->url_adi;?>">
					</div>
				</div>
			</div>
	
			<!-- /row-->
		
		</div>


		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2>Firma Hakkında İçerik</h2>
			</div>
		
			<div class="row">
			<div class="col-md-12">

				<textarea class="ckeditor form-control" name="icerik" id="ckeditor1" ><?php echo $firma->icerik;?></textarea>
			</div>
			</div>
			<!-- /row-->
		</div>
		<!-- /box_general-->

		
								
		
		
	
		<!-- /box_general-->
		<input type="submit" class="btn-lg btn-primary " name="form_gonder"  >

	  </form>
	  </div>
	  <!-- /.container-fluid-->
   	</div>
    <!-- /.container-wrapper-->
	
	<?php require_once("admin-duzenle-head-footer/footer.php");?>
	<script>
$(document).ready(function(){
	
	$(".buton").click(function(){
  /*container class'lı div tıklandığında açıksa kapanacak kapalıysa açılacak.*/
		$("div.logodegis").toggle(); 
  
		
	  });
	});
	</script>
  