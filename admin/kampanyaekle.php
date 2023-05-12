<?php require_once("head-footer/header.php");?>


<?php
include("admin_init.php");



      if ($_POST) {
        $kampanyafirmaadi = htmlspecialchars(addslashes(strip_tags(trim($_POST["kampanyafirmaadi"]))));
        $kampanyaicerik = ($_POST["kampanyaicerik"]);
        $kampanyatarih = date('Y-m-d H:i:s');
         $gecici_ad=$_FILES["kampanyalogo"]["tmp_name"];
	   $rand =substr(md5(uniqid(rand())),0,10);
	   $kalici_yol_ad="../html_menu_1/img/".$randomubunaal=$rand.($_FILES["kampanyalogo"]["name"]);
	   if ($_FILES["kampanyalogo"]["size"]  > 4000000) {
	
		  echo "<font color='green' >Dosya Boyutu Sınırı Aşıyor (Max Boyut 4 'MB' dir).","</font>";
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
		
			 } // eğer dosya kaydedilirse
			 
				
			 else
				 echo "";
		  }
	   }
	}





    if (empty($kampanyafirmaadi) || empty($kampanyaicerik) || empty($kampanyatarih) || empty($kampanyalogo)    ) {
        echo '
                       <div class="alert alert-danger" style="text-align:center;" role="alert">
                       Yıldızlı alanlar boş bırakılamaz.
                      </div>';
        }else {
            $kampanya_ekle = $db->prepare("INSERT INTO kampanyalar ( kampanyafirmaadi , kampanyaicerik , kampanyatarih,kampanyalogo) VALUES (?,?,?,?) ");
		$kampanya_ekle->execute(array($kampanyafirmaadi,$kampanyaicerik,$kampanyatarih, $kampanyalogo));
         
		
		
		if ($kampanya_ekle) {
              echo '
                           <div class="alert alert-success" style="text-align:center;" role="alert">
                           Değişiklikler kayıt edildi. Listeye yönlendirilecek.
                           </div>';
              header("Location:index.php?sayfa=profilbilgileri");
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
          <a href="#">Kampanya Ekle</a>
        </li>
        <li class="breadcrumb-item active">Şuanki Sayfa</li>
      </ol>
	  <form method="post" enctype="multipart/form-data">
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Kampanya Bilgileri</h2>
			</div>
			<div class="row"> 
				<div class="col-md-6">
					<div class="form-group">
						<label>Kampanya Firması</label>
						<input type="text" class="form-control" placeholder="Kampanya Firması" name="kampanyafirmaadi">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Kampanya Logosu</label>
						<input type="file" class="form-control" placeholder="Kampanya Logo" name="kampanyalogo"> 
						<small style="color:red;">Logo Boyutu : 500*350</small>
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

				<textarea class="ckeditor form-control" name="kampanyaicerik" id="ckeditor1" ></textarea>
			</div>
			</div>
			<!-- /row-->
		</div>
		<!-- /box_general-->

		
								
		
		
	
		<!-- /box_general-->
		<button class="btn-lg btn-primary " style="border-radius:10%;"> Kaydet</button>

	  </form>
	  </div>
	  <!-- /.container-fluid-->
   	</div>
    <!-- /.container-wrapper-->
	<?php require_once("head-footer/footer.php");?>
