<?php require_once("head-footer/header.php");
include("admin_init.php");
?>
<?php $limit = 5;
$query = "SELECT count(*) FROM firma_yorumlari WHERE id ";

$s = $db->query($query);
$total_results = $s->fetchColumn(); 
//  TOPLAM FİRMA SAYISI
?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Yorumlar</a>
        </li>
        <li class="breadcrumb-item active">Şuanki Sayfa</li>
      </ol>
		<div class="box_general">
			<div class="header_box">
				<h2 class="d-inline-block">Bütün Yorumlar</h2>

                <div class="row" style="list-style: none;" > 
                <div class="col-md-3" style="text-align: center;"> <li  style="border:1px solid black;"><a href="" class="btn gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Bütün Yorumlar</a></li></div>
                <div class="col-md-3" style="text-align: center;"> <li  style="border:1px solid black;"><a href="reviews_active.php?page=1" class="btn gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Aktif Yorumlar</a></li></div>
                <div class="col-md-3" style="text-align: center;"> <li  style="border:1px solid black;"><a href="reviews_passive.php?page=1" class="btn gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Pasif Yorumlar</a></li></div>
                <div class="col-md-3" style="text-align: center; "> <li style="border:1px solid black;"><a onclick="return confirm('Veri silinecek Onaylıyormusunuz')" href="duzenle/yorum_sil_full.php" class="btn gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Hepsini Sil</a></li></div>

                </div>
				
			</div>
<?php 
$total_pages = ceil($total_results/$limit);

if (!isset($_GET['page'])) {
    $page = 1;
} else{
    $page = $_GET['page'];
}
$starting_limit = ($page-1)*$limit;

			$yorumlar = $db -> prepare("SELECT * FROM firma_yorumlari WHERE  id  ORDER BY id DESC LIMIT $starting_limit,$limit");
                $yorumlar->execute(array());
                $yorum_sonuc=$yorumlar->fetchAll();
                foreach ($yorum_sonuc as $yorum) {
					
					
					$tarihbaş = substr($yorum['yorum_tarih'], 0,10);    
					$tarihson = substr($yorum['yorum_tarih'], 10,9);    

 
					?>
								<div class="list_general reviews" style="margin-top: 30px;">

							
							<ul>
					<li>
						<span><?php echo $tarihbaş;?></span>

						<span class="rating"> 
                            <?php
switch ($yorum['yorum_puan']) {
    case 5:
    ?>
                              <i class="fa fa-fw fa-star yellow"> </i> <i class="fa fa-fw fa-star yellow"> </i><i class="fa fa-fw fa-star yellow"> </i><i class="fa fa-fw fa-star yellow"></i> <i class="fa fa-fw fa-star yellow"></i>
                                <?php
    break;
        case 4:
            case 4.1:
                case 4.2:
                    case 4.3:
                        case 4.4:
                            case 4.5:
                                case 4.6:
                                    case 4.7:
                                        case 4.8:
                                            case 4.9:


            ?>
                             <i class="fa fa-fw fa-star yellow"> </i> <i class="fa fa-fw fa-star yellow"> </i> <i class="fa fa-fw fa-star yellow"> </i> <i class="fa fa-fw fa-star yellow"></i> <i class="fa fa-fw fa-star "> </i>
                                <?php   break; 
        
        case 3:
            case 3.1:
                case 3.2:
                    case 3.3:
                        case 3.4:
                            case 3.5:
                                case 3.6:
                                    case 3.7:
                                        case 3.8:
                                            case 3.9:


            ?>
            <i class="fa fa-fw fa-star yellow"> </i> <i class="fa fa-fw fa-star yellow"> </i> <i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star "> </i><i class="fa fa-fw fa-star "> </i>
                                <?php   break; 
        
        case 2:
            case 2.1:
                case 2.2:
                    case 2.3:
                        case 2.4:
                            case 2.5:
                                case 2.6:
                                    case 2.7:
                                        case 2.8:
                                            case 2.9:


            ?>
                                <i class="fa fa-fw fa-star yellow"></i> <i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star "> </i><i class="fa fa-fw fa-star "> </i><i class="fa fa-fw fa-star "> </i>
                                <?php   break; 
        
        case 1:
            case 1.1:
                case 1.2:
                    case 1.3:
                        case 1.4:
                            case 1.5:
                                case 1.6:
                                    case 1.7:
                                        case 1.8:
                                            case 1.9:


            ?><i class="fa fa-fw fa-star yellow"></i> <i class="fa fa-fw fa-star "></i> <i class="fa fa-fw fa-star "></i> <i class="fa fa-fw fa-star "></i> <i class="fa fa-fw fa-star "></i>
                                <?php   break; 
        
    
    
    }
?></span>

						<figure><h5 style="margin-left:17px; margin-top:5px;">  <?php echo $yorum['firma_id'];?></h5> </figure>
						<h4><?php echo $yorum['yorum_ad'] . " " . $yorum['yorum_soyad'] ; ?></h4>
						<p><?php echo $yorum['yorum_icerik']; ?></p>
						<br>
							<div class="row">
							<div class="col-md-3"><strong>Telefon Numarası : </strong> <?php echo $yorum['yorum_telefon']; ?> </div>
								<div class="col-md-3"><strong>E-posta : </strong>  <?php echo $yorum['yorum_eposta']; ?> </div>
									<div class="col-md-3"><strong>Araci Kurum : </strong>  <?php echo $yorum['aracikurum']; ?> </div>
								<div class="col-md-3"><strong>Yorum Durumu : </strong>  <?php if( $yorum['yorum_durum'] == '0') { ?> <b style="color:green;">Aktif</b> <?php } else { ?> <b style="color:red ;">Pasif</b> <?php } ?> </div>



							</div>
							<ul style="list-style: none; margin-top:20px;">
								<div class="row">
									<div class="col-md-3"> <li><a href="duzenle/yorum_duzenle.php?id=<?php echo $yorum['id']?>" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Düzenle</a></li></div>
									<div class="col-md-3"><li><a onclick="return confirm('Yorum silinecek Onaylıyormusunuz')" href="duzenle/yorum_sil.php?id=<?php echo $yorum['id']?>" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Sil</a></li></div>
									<div class="col-md-3"> <li><a onclick="return confirm('Veri Aktif Edilecek Onaylıyormusunuz')" href="duzenle/yorum_aktif_et.php?id=<?php echo $yorum['id']?>" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Aktif Et</a></li></div>
									<div class="col-md-3"> <li><a onclick="return confirm('Veri Pasif Edilecek Onaylıyormusunuz')" href="duzenle/yorum_pasif_et.php?id=<?php echo $yorum['id']?>" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Pasif Et</a></li></div>

								</div>
						</ul>
									</li>
				
				</ul>

				</div>

				<?php }?>


			
<br><br>
                <?php

$ileri = $_GET['page'];
$ilerigit = $ileri+1;

if ($ileri < $total_pages )
{}
else {
  $ilerigit = $ileri +0;
}

$geri = $_GET['page'];
$gerigit = $geri - 1 ;
if ($geri > 1 )
{}
else {
  $gerigit = $geri -0;

}
?>
		<nav aria-label="...">
		<ul class="pagination pagination-sm add_bottom_30">

         <?php 
         if($total_pages == 0){}
         else {         ?>

		  <li class="page-item "><a class="page-link" href="<?php echo "reviews.php?page=$gerigit";?>"> Previous </a></li>

        <?php } ?>


<?php
            for ($page=1; $page <= $total_pages ; $page++):?>        

<li class="page-item"><a class="page-link" href="<?php echo "reviews.php?page=$page"; ?>"> <?php  echo $page; ?>  </a></li>

              <?php endfor;  ?>

              <?php 
                       if($total_pages == 0){}

                       else {         ?>

<li class="page-item"><a class="page-link" href="<?php echo "reviews.php?page=$ilerigit"; ?>">Next</a></li>
                      <?php } ?>
					  </ul>

					  </nav>

		<!-- /pagination-->
	  </div>
	  <!-- /container-fluid-->
   	</div>
    <!-- /container-wrapper-->
	<?php require_once("head-footer/footer.php");?>
