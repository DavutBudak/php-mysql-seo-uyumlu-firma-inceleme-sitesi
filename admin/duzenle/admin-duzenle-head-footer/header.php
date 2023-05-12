<?php 
session_start();

include ('../admin_init.php'); 
if(!$_SESSION["admin_login"]){
  header("Location:../giris.php");
}
else {}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ansonika">
  <title>Site-İsmi - Admin </title>
	
  <!-- Favicons-->
  <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" type="image/x-icon" href="../img/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="../img/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="../img/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="../img/apple-touch-icon-144x144-precomposed.png">
	
  <!-- GOOGLE WEB FONT -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
  
  <script src="../ckeditor/ckeditor/ckeditor.js"></script>

  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Icon fonts-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Plugin styles -->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Main styles -->
  <link href="../css/admin.css" rel="stylesheet">
  <!-- Your custom styles -->
  <link href="../css/admin.css" rel="stylesheet">
	
</head>

<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="../index.php"><img src="../../html_menu_1/img/logo.png" data-retina="true" alt="" width="163" height="36"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="../index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Anasayfa</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add listing">
          <a class="nav-link" href="../add-listing.php">
            <i class="fa fa-fw fa-plus-circle"></i>
            <span class="nav-link-text">Firma Ekle</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
          <a class="nav-link" href="../bookings.php?page=1">
            <i class="fa fa-fw fa-calendar-check-o"></i>
            <span class="nav-link-text">Firmalar </span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reviews">
          <a class="nav-link" href="../reviews.php?page=1">
            <i class="fa fa-fw fa-star"></i>
            <span class="nav-link-text">Yorum İşlemleri</span>
          </a>
        </li>
 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reviews">
          <a class="nav-link" href="../popupform.php">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text">Popup Formları</span>
          </a>
        </li>

        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reviews">
          <a class="nav-link" href="../kampanyaekle.php">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text">Kampanya Ekle</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reviews">
          <a class="nav-link" href="../kampanyalar.php?page=1">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text">Kampanyalar</span>
          </a>
        </li>

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown"  style="margin-right:100px;">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Mesajlar
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Son Yorumlar:</h6>


          <?php  $limit = 3;
				$yorumlar = $db -> prepare("SELECT * FROM firma_yorumlari WHERE yorum_durum = 0  ORDER BY id DESC LIMIT  $limit");
                $yorumlar->execute(array());
                $yorum_sonuc=$yorumlar->fetchAll();
                foreach ($yorum_sonuc as $yorum) { 
					
					//Goruntulencek Metnin Tam Hali
					$detay = $yorum['yorum_icerik'];
					//Var olan metin içindeki karakter sayısı
					$uzunluk = strlen($detay);
					//Kaç Karakter Göstermek İstiyorsunuz
					$limit = 50;
					//Uzun olan yer “devamı…” ile değişecek.
					if ($uzunluk > $limit) {
					$detay = substr($detay,0,$limit);
					}

					if($yorum['yorum_durum'] == 0) { 

					?>

<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong><?php echo $yorum['yorum_ad'] ." ". $yorum['yorum_soyad'] ;?></strong>
              <div class="dropdown-message small"><?php echo $detay; ?></div>
            </a>

<?php  }} ?>


           


           

            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="reviews.php">Bütün Mesajları Gör</a>
          </div>
        </li>
        
     
        <li class="nav-item">
        <a href="../cikis.php" class="nav-link" >
            <i class="fa fa-fw fa-sign-out"></i>Çıkış yap</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /Navigation-->
