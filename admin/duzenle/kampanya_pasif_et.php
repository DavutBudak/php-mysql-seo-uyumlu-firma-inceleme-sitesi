
<?php
 include("../admin_init.php");

 $id = intval($_GET["id"]);
 $kampanyalar = $db->prepare("SELECT * FROM kampanyalar WHERE id = ?");
 $kampanyalar->execute(array($id));
 if ($kampanyalar) {
     $kampanya = $kampanyalar->fetch(PDO::FETCH_OBJ);
 }





      $kampanyad_duzenle = $db->prepare("UPDATE kampanyalar SET kampanyadurum = ? WHERE id = ? ");
  $kampanyad_duzenle->execute(array(1, $id));
   
  
  if ($kampanyad_duzenle) {
        echo '
                     <div class="alert alert-success" style="text-align:center;" role="alert">
                     Değişiklikler kayıt edildi. Listeye yönlendirilecek.
                     </div>';
        header("Location:../kampanyalar.php");
      } else {
        echo '
                     <div class="alert alert-danger" style="text-align:center;" role="alert">
                     Üye güncelleme başarısız. Bir sorun oluştu.
                     </div>';
                     header("Location:../kampanyalar.php");

      }
    
  

            ?>