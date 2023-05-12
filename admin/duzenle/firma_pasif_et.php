
<?php
 include("../admin_init.php");

 $id = intval($_GET["id"]);
 $firmalar = $db->prepare("SELECT * FROM sayfa_ici WHERE id = ?");
 $firmalar->execute(array($id));
 if ($firmalar) {
     $firma = $firmalar->fetch(PDO::FETCH_OBJ);
 }





      $firma_duzenle = $db->prepare("UPDATE sayfa_ici SET firma_durum = ? WHERE id = ? ");
  $firma_duzenle->execute(array(1, $id));
   
  
  if ($firma_duzenle) {
        echo '
                     <div class="alert alert-success" style="text-align:center;" role="alert">
                     Değişiklikler kayıt edildi. Listeye yönlendirilecek.
                     </div>';
        header("Location:../bookings.php");
      } else {
        echo '
                     <div class="alert alert-danger" style="text-align:center;" role="alert">
                     Üye güncelleme başarısız. Bir sorun oluştu.
                     </div>';
                     header("Location:../bookings.php");

      }
    
  

            ?>