<?php $url ="//".$_SERVER['HTTP_HOST'] ; ?>


<?php
$sunucu = "localhost";
$kullanici = "kullanıcıadı";
$sifre = "Pass";
try {
  $conn = new PDO("mysql:host=$sunucu;dbname=firmalar;charset=utf8", $kullanici, $sifre);
  // Hata Yakalama
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch(PDOException $e) {
  echo "Bağlantı Hatası: " . $e->getMessage();
} 
if($_POST){ 
    try { 
        $ad_soyad = $_POST['query'];  
        $query = $conn->prepare('SELECT * FROM sayfa_ici WHERE sirket_adi  LIKE ?');
        $query->execute(array('%'.$ad_soyad.'%'));
        while ($results = $query->fetch())
        {

			if($results['firma_durum'] == 0) { 

?>
<div>


<ul  style="list-style-type:none;" ><li style="font-size:15px;"> <a  href="<?= $results['url_adi'] ?>"> <?php echo $results['sirket_adi']?> </a> </li>
</ul>

</div>




<?php 



}  } 
    } catch (PDOException $e) { 
        die($e->getMessage());
    }
}
?>


