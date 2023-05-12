 
<?php
 include("../admin_init.php");

 $id = intval($_GET["id"]);
 $yorumlar = $db->prepare("SELECT * FROM firma_yorumlari WHERE id = ?");
 $yorumlar->execute(array($id));
 if ($yorumlar) {
     $yorum = $yorumlar->fetch(PDO::FETCH_OBJ);
 }

 



      $yorum_duzenle = $db->prepare("UPDATE firma_yorumlari SET yorum_durum = ? WHERE id = ? ");
  $yorum_duzenle->execute(array(0, $id));
   
  
  if ($yorum_duzenle) {
        echo '
                     <div class="alert alert-success" style="text-align:center;" role="alert">
                     Değişiklikler kayıt edildi. Listeye yönlendirilecek.
                     </div>';
        header("Location:../reviews.php");
      } else {
        echo '
                     <div class="alert alert-danger" style="text-align:center;" role="alert">
                     Değişiklik başarısız. Bir sorun oluştu.
                     </div>';
                     header("Location:../reviews.php");

      }
    
  

            ?>

