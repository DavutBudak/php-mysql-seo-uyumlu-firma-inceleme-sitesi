<?php require_once("head-footer/header.php");
include("admin_init.php");

$yorumid = intval($_GET["id"]);


$limit = 15;
$query = "SELECT count(*) FROM inceleme_popup WHERE id ";

$s = $db->query($query);
$total_results = $s->fetchColumn(); 
//  TOPLAM FİRMA SAYISI
?> <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

<style>.alt-menu {
    width:10%;
    position:relative;
    float:left;
}

#acilirmenu{
	  display: ; /* Chech boxumuzu buradan görünmez kılıyoruz. */
	}
#menum { display: none; position:absolute; width:100%;	}
#acilirmenu:checked + #menum { display:block;	}

/* */
#acilirmenu2{
	  display: none; /* Chech boxumuzu buradan görünmez kılıyoruz. */
	}
#menum2 { display:none;	}
#acilirmenu2:checked + #menum2 { display:block;	}

</style>

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
            <h2 class="d-inline-block">Firma Popup Formu</h2>

            </div>
            
        </div>
                              <div class="col-md-12" style="text-align: center; "><a onclick="return confirm('Veri silinecek Onaylıyormusunuz')" href="duzenle/popupyorumsil.php" class="btn gray approve" style="border:2px solid red; "> <i class="fa fa-fw fa-check-circle-o"></i> Listeyi Temizle</a></div>

<div class="col-md-12" style="background-color:#fff">
    <div class="row">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300" rel="stylesheet">
<table id="personel">
<tr>
<th>Firma Adı</th>
<th>Ad Soyad</th>
<th>Eposta</th>
<th>Telefon Numarası</th>
<th>Mesaj</th>
</tr>
<?php
$sayi=0;
$total_pages = ceil($total_results/$limit);

if (!isset($_GET['page'])) {
    $page = 1;
} else{
    $page = $_GET['page'];
}
$starting_limit = ($page-1)*$limit;


        $popupyorum=$db->prepare("SELECT *FROM inceleme_popup  ORDER BY id DESC LIMIT $starting_limit,$limit" );
        $popupyorum->execute();
        $popupyorumgelen=$popupyorum-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.        
                foreach($popupyorumgelen as $yorumlar) {   $sayi++;                  ?>
                

                  
<tr>
<td><?php echo $yorumlar->firma_adi; ?></td>
<td><?php echo $yorumlar->popupadsoyad; ?></td>
<td><?php echo $yorumlar->popupmail; ?></td>
<td><?php echo $yorumlar->popuptel; ?></td>
<td style="max-width:400px; width:400px;"> 
<?php if($yorumlar->popupmesaj !== ""){ ?>
<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample<?php echo $sayi; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
Mesajı Gör  </a></p>
  <?php } else { ?> <p style="color:red;"> Mesaj YOK </p> <?php } ?>
  <div class="collapse " id="collapseExample<?php echo $sayi; ?>">
  <div class="card card-body" style="background-color:white; color:black">
  <?php echo $yorumlar->popupmesaj; ?>
  </div>
</div>
</td>
</tr>




               <?php }

   ?>





</table>

    </div>
</div>

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

		  <li class="page-item "><a class="page-link" href="<?php echo "popupform.php?page=$gerigit";?>"> Previous </a></li>

        <?php } ?>


<?php
            for ($page=1; $page <= $total_pages ; $page++):?>        

<li class="page-item"><a class="page-link" href="<?php echo "popupform.php?page=$page"; ?>"> <?php  echo $page; ?>  </a></li>

              <?php endfor;  ?>

              <?php 
                       if($total_pages == 0){}

                       else {         ?>

<li class="page-item"><a class="page-link" href="<?php echo "popupform.php?page=$ilerigit"; ?>">Next</a></li>
                      <?php } ?>
					  </ul>

					  </nav>




<?php require_once("head-footer/footer.php");?>
