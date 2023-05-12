<?php require_once("head-footer/header.php");
include("admin_init.php");
?>
<?php $limit = 5;
$query = "SELECT count(*) FROM sayfa_ici WHERE id ";

$s = $db->query($query);
$total_results = $s->fetchColumn(); 
//  TOPLAM FİRMA SAYISI
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Firmalar</a>
        </li>
        <li class="breadcrumb-item active">Şuanki Sayfa</li>
      </ol>
		<div class="box_general">
		


<?php

$total_pages = ceil($total_results/$limit);

if (!isset($_GET['page'])) {
    $page = 1;
} else{
    $page = $_GET['page'];
}
$starting_limit = ($page-1)*$limit;


				$firmalar = $db -> prepare("SELECT * FROM sayfa_ici WHERE  id  ORDER BY id DESC LIMIT $starting_limit,$limit");
                $firmalar->execute(array());
                $firma_sonuc=$firmalar->fetchAll();
                foreach ($firma_sonuc as $firma) {
					
					
					$tarihbaş = substr($firma['firma_eklenme_tarihi'], 0,10);    
					$tarihson = substr($firma['firma_eklenme_tarihi'], 10,9);    


					?>
								<div class="list_general">

									<ul>

					<li>
						<figure><img src="../html_menu_1/img/<?php echo $firma['sirket_logo'];?>" alt="" ></figure>
						<h4> <?php echo $firma['sirket_adi']; ?> </h4>
						<ul class="booking_details">
							<li><strong>Eklenme Tarihi</strong> <?php echo $tarihbaş;?> </li>
							<li><strong>Eklenme Saati</strong> <?php echo $tarihson;?></li>
							<li><strong>Telefon</strong><?php echo $firma['sirket_telefon']; ?> </li>
							<li><strong>Email</strong> <?php echo $firma['sirket_eposta']; ?></li>
							<li><strong>Görüntüleme</strong>  <?php echo $firma['firma_goruntuleme']; ?></li>
							<li><strong>Gösterim Durumu</strong>  <?php if( $firma['firma_durum'] == '0') { ?> <b style="color:green;">Aktif</b> <?php } else { ?> <b style="color:red ;">Pasif</b> <?php } ?></li>
						</ul>
						<ul class="buttons">
							<li><a href="duzenle/firma_duzenle.php?id=<?php echo $firma['id']?>" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Düzenle</a></li>
							<li><a onclick="return confirm('Veri silinecek Onaylıyormusunuz')" href="duzenle/firma_sil.php?id=<?php echo $firma['id']?>" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Sil</a></li>
						</ul>
						<ul class="buttons2">
							<li><a onclick="return confirm('Veri Aktif Edilecek Onaylıyormusunuz')" href="duzenle/firma_aktif_et.php?id=<?php echo $firma['id']?>" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Aktif Et</a></li>
							<li><a onclick="return confirm('Veri Pasif Edilecek Onaylıyormusunuz')" href="duzenle/firma_pasif_et.php?id=<?php echo $firma['id']?>" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Pasif Et</a></li>
						</ul>

					</li>	 
					</ul>
					</div>

				
				<?php }?>


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

		  <li class="page-item "><a class="page-link" href="<?php echo "bookings.php?page=$gerigit";?>"> Previous </a></li>

        <?php } ?>


<?php
            for ($page=1; $page <= $total_pages ; $page++):?>        

<li class="page-item"><a class="page-link" href="<?php echo "bookings.php?page=$page"; ?>"> <?php  echo $page; ?>  </a></li>

              <?php endfor;  ?>

              <?php 
                       if($total_pages == 0){}

                       else {         ?>

<li class="page-item"><a class="page-link" href="<?php echo "bookings.php?page=$ilerigit"; ?>">Next</a></li>
                      <?php } ?>
					  </ul>

					  </nav>

		
	
		<!-- /pagination-->
	  </div>
	  <!-- /container-fluid-->
   	</div>
    <!-- /container-wrapper-->
	<?php require_once("head-footer/footer.php");?>
