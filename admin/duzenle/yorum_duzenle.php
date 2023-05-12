<?php
    require_once("admin-duzenle-head-footer/header.php");

$id = intval($_GET["id"]);
    $yorumlar = $db->prepare("SELECT * FROM firma_yorumlari WHERE id = ?");
    $yorumlar->execute(array($id));
    if ($yorumlar) {
        $yorum = $yorumlar->fetch(PDO::FETCH_OBJ);
    }

?>

<?php
	if($_POST['form_gonder']){

        $yorum_ad = htmlspecialchars(addslashes(strip_tags(trim($_POST["yorum_ad"]))));
        $yorum_soyad = htmlspecialchars(addslashes(strip_tags(trim($_POST["yorum_soyad"]))));
        $yorum_telefon = htmlspecialchars(addslashes(strip_tags(trim($_POST["yorum_telefon"]))));
        $yorum_eposta = htmlspecialchars(addslashes(strip_tags(trim($_POST["yorum_eposta"]))));
        $yorum_icerik = ($_POST["yorum_icerik"]);
        $yorum_tarih = date('Y-m-d H:i:s');
		$yorum_puan = htmlspecialchars(addslashes(strip_tags(trim($_POST["yorum_puan"]))));








        if (empty($yorum_ad) ||  empty($yorum_soyad)  ||  empty($yorum_telefon)  ||  empty($yorum_eposta)  ||  empty($yorum_icerik) ||   empty($yorum_tarih) ||   empty($yorum_puan)) {
          echo '
                       <div class="alert alert-danger" style="text-align:center;" role="alert">
                       Yıldızlı alanlar boş bırakılamaz.
                      </div>';
        }else {
            $yorum_duzenle = $db->prepare("UPDATE firma_yorumlari SET yorum_ad =?, yorum_soyad =?, yorum_telefon =?, yorum_eposta =?, yorum_icerik =?, yorum_tarih =? , yorum_puan =? WHERE id = ? ");
		$yorum_duzenle->execute(array($yorum_ad, $yorum_soyad, $yorum_telefon, $yorum_eposta, $yorum_icerik, $yorum_tarih, $yorum_puan, $id));
         
		
		if ($yorum_duzenle) {
              echo '
                           <div class="alert alert-success" style="text-align:center;" role="alert">
                           Değişiklikler kayıt edildi. Listeye yönlendirilecek.
                           </div>';
              header("Refresh:0; url=../reviews.php");
            } else {
              echo '
                           <div class="alert alert-danger" style="text-align:center;" role="alert">
                           Üye güncelleme başarısız. Bir sorun oluştu.
                           </div>';
                           header("Location:../reviews.php");

            }
          }
        }
 

     
      ?>






<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Yorum Düzenle</a>
        </li>
        <li class="breadcrumb-item active">Şuanki Sayfa</li>
      </ol>







	  <form method="post" enctype="multipart/form-data">
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Yorum Düzenle</h2>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label> Ad</label>
						<input type="text" class="form-control" placeholder="Yorum Ad" name="yorum_ad" value="<?php echo $yorum->yorum_ad;?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Soyad</label>
						<input type="text" class="form-control" placeholder="Yorum Soyad" name="yorum_soyad" value="<?php echo $yorum->yorum_soyad;?>">
					</div>
				</div>
		
		
			</div>
			<!-- /row-->
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Telefon Numarası</label>
						<input type="text" class="form-control" placeholder="Yorum Telefon Numarası" name="yorum_telefon" value="<?php echo $yorum->yorum_telefon;?>">
					</div>
				</div>
                <div class="col-md-6">
					<div class="form-group">
						<label>E-posta</label>
						<input type="email" class="form-control" placeholder="Yorum E-posta" name="yorum_eposta" value="<?php echo $yorum->yorum_eposta;?>">
					</div>
				</div>

			
			</div>


			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Yorum Puan</label>
						<input type="text" class="form-control" placeholder="Yorum Telefon Numarası" name="yorum_puan" value="<?php echo $yorum->yorum_puan;?>">
					</div>
				</div>
               

			
			</div>
	
			<!-- /row-->
		
		</div>
		<!-- /box_general-->
		
		


		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2>Yorum İçerik</h2>
			</div>
		
			<div class="row">
			<div class="col-md-12">

				<textarea class="ckeditor form-control" name="yorum_icerik" id="ckeditor1" ><?php echo $yorum->yorum_icerik;?></textarea>
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
