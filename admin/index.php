<?php require_once("head-footer/header.php");



 

$yorum = "SELECT count(*) FROM firma_yorumlari WHERE id ";

$y = $db->query($yorum);
$toplam_yorum = $y->fetchColumn(); 
//  TOPLAM Yorum SAYISI


$firma = "SELECT count(*) FROM sayfa_ici WHERE id ";

$f = $db->query($firma);
$toplam_firma = $f->fetchColumn(); 
//  TOPLAM FİRMA SAYISI




?>
<?php
$Fiyat=$db->prepare("SELECT SUM(firma_goruntuleme) AS toplam_goruntulenme_sayisi FROM sayfa_ici");
$Fiyat->execute();
$FiyatYaz= $Fiyat->fetch(PDO::FETCH_ASSOC);
$toplam_goruntulenme=$FiyatYaz['toplam_goruntulenme_sayisi'];


?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Anasayfa</a>
        </li>
        <li class="breadcrumb-item active">Şuanki Sayfa</li>
      </ol>

	  <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-4 col-sm-4 mb-3">
          <div class="card dashboard text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-envelope-open"></i>
              </div>
              <div class="mr-5"><h5>Toplam <?php echo $toplam_yorum; ?> Mesaj</h5></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="reviews.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-4 col-sm-4 mb-3">
          <div class="card dashboard text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-star"></i>
              </div>
				<div class="mr-5"><h5>Toplam <?php echo $toplam_firma; ?> Firma</h5></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="bookings.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-4 col-sm-4 mb-3">
          <div class="card dashboard text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-calendar-check-o"></i>
              </div>
              <div class="mr-5"><h5>Toplam <?php echo $toplam_goruntulenme; ?> Firma Görüntülemesi</h5></div>
            </div>
         
          </div>
        </div>


<?php

if (isset($_POST['clear'])) {
  file_put_contents('ipkayit.txt', '');
}


?>

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
  
  


<div class="container-fluid" >
 

<table style="width: 100%;" class="table col-md-12" id="myTable">
    
     <form method="POST">
<button name="clear" type="submit" class="btn btn-danger" style="width:100% ;"  onclick="return confirm('Gerçekten silmek mi istiyorsun ? geri alınamaz!')" > Listeyi Temizle</button>
</form>
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
        <h3 style="text-align:center;"> <b style="color:brown;">  Giriş Yapanlar Listesi </b></h3>

            <tr>
             <th>#</th>
<th>Tarih</th>
<th>İp Adresi</th>
<th>Ülke</th>
<th>Ülke Kodu</th>
<th>Şehir</th>
<th>Posta Kodu</th>
<th>Firma Adı</th>






            </tr>
        </thead>
        <tbody>
<?php
	
	$file = @file("ipkayit.txt"); 
for ($i = 0; $i < count($file); $i++) { 
    
        
        
    echo '<tr>
    <td>'.($i + 1).'</td>
    <td>'.explode('- IPAdresi: ',explode('Tarih:',$file[$i])[1])[0].'</td>
    <td>'.explode('- Ülke:',explode('IPAdresi:',$file[$i])[1])[0].'</td>
    <td>'.explode('- ÜlkeKodu:',explode('Ülke:',$file[$i])[1])[0].'</td>
    <td>'.explode('- Şehir:',explode('ÜlkeKodu:',$file[$i])[1])[0].'</td>
    <td>'.explode('- PostaKodu:',explode('Şehir:',$file[$i])[1])[0].'</td>
    <td>'.explode('- FirmaAdı:',explode('PostaKodu:',$file[$i])[1])[0].'</td>
 
    <td>'.explode('- FirmaAdı:',explode('FirmaAdı:',$file[$i])[1])[0].'</td>





  
  </tr>'; }

	
	?>
  </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

		</div>

	

    <!-- /.container-wrapper-->
    <?php require_once("head-footer/footer.php");?>
