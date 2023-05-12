<?php

require_once("admin-duzenle-head-footer/header.php");

$id = intval($_GET["id"]);
    $firmalar = $db->prepare("SELECT * FROM kampanyalar WHERE id = ?");
    $firmalar->execute(array($id));
    if ($firmalar) {
        $firma = $firmalar->fetch(PDO::FETCH_OBJ);
    }

?>
<?php 
if ($_POST['logo_degistir']) {

	   $gecici_ad=$_FILES["kampanyalogo"]["tmp_name"];
	   $rand =substr(md5(uniqid(rand())),0,10);
	   $kalici_yol_ad="../../html_menu_1/img/".$randomubunaal=$rand.($_FILES["kampanyalogo"]["name"]);
	   if ($_FILES["kampanyalogo"]["size"]  > 4000000) {
	
		  echo "<font color='green'>Dosya Boyutu Sınırı Aşıyor (Max Boyut 4 'MB' dir).","</font>";
	   } else { 
	  
	   if ($_FILES["kampanyalogo"]["error"]) // hata oluştu ise
		  echo "<font color='green'>Hata Oluştu Ve Dosya Yüklenemedi (Dosya Seçtiğinizden Emin Olun).","</font>";
	   else{
		  if (file_exists($kalici_yol_ad)) // yüklenen dosya upload dizininde varsa
			 echo "<font color='red'>Yazdığınız ad ile bir dosya zaten kayıtlıdır.</font>";
		  else{
			 if ( move_uploaded_file($gecici_ad,$kalici_yol_ad)) {
	
			  $resim_tarih = date("Y-m-d H:i:s");
			  $kampanyalogo = $randomubunaal=$rand.($_FILES["kampanyalogo"]["name"]);
			  
		$firma_logo_duzenle = $db->prepare("UPDATE kampanyalar SET kampanyalogo = ? WHERE id = ? ");
		$firma_logo_duzenle->execute(array($kampanyalogo, $id));
	
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

		$kampanyafirmaadi = htmlspecialchars(addslashes(strip_tags(trim($_POST["kampanyafirmaadi"]))));
        $kampanyaicerik = ($_POST["kampanyaicerik"]);
		$kampanyatarih = date('Y-m-d H:i:s');




        if (empty($kampanyafirmaadi) || empty($kampanyaicerik) || empty($kampanyatarih)    ) {
          echo '
                       <div class="alert alert-danger" style="text-align:center;" role="alert">
                       Yıldızlı alanlar boş bırakılamaz.
                      </div>';
        }else {
            $firma_duzenle = $db->prepare("UPDATE kampanyalar SET kampanyafirmaadi =?, kampanyaicerik =? , kampanyatarih=? WHERE id = ? ");
		$firma_duzenle->execute(array($kampanyafirmaadi, $kampanyaicerik, $kampanyatarih, $id));
         
		
		if ($firma_duzenle) {
              echo '
                           <div class="alert alert-success"  style="text-align:center;"  role="alert">
                           Değişiklikler kayıt edildi. Listeye yönlendirilecek.
                           </div>';
              header("Location:../kampanyalar.php");
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
          <a href="#">Kampanya Düzenle</a>
        </li>
        <li class="breadcrumb-item active">Şuanki Sayfa</li>
      </ol>

	  <button class="buton btn btn-success" style="width: 100%;">Kampanya Logosunu Değiştir</button>

	  <div  class="logodegis box_general padding_bottom" style="display:none ;">
			<div class="header_box version_2">
			<form method="post" enctype="multipart/form-data">

				<h2><i class="fa fa-file"></i>Logo Değiştir</h2>
			</div>
			<div class="row">

			<div class="col-md-6">
					<div class="form-group">
						<label>Kampanya Logo</label>
						<input type="file" class="form-control" placeholder="Firma Logo" name="kampanyalogo" > 
						<small style="color:red;">Logo Boyutu : 500*350</small>
				</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-10"><img
                                            src="../../html_menu_1/img/<?php echo $firma->kampanyalogo;?>" class="img-logo"
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
				<h2><i class="fa fa-file"></i>Kampanya Bilgi</h2>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Kampanya İsmi</label>
						<input type="text" class="form-control" placeholder="Firma İsmi" name="kampanyafirmaadi" value="<?php echo $firma->kampanyafirmaadi;?>">
					</div>
				</div>
	
			</div>
			<!-- /row-->

	
			<!-- /row-->
		
		</div>
		<!-- /box_general-->







		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2>Kampanya Hakkında İçerik</h2>
			</div>
		
			<div class="row">
			<div class="col-md-12">

				<textarea class="ckeditor form-control" name="kampanyaicerik" id="ckeditor1" ><?php echo $firma->kampanyaicerik;?></textarea>
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
  