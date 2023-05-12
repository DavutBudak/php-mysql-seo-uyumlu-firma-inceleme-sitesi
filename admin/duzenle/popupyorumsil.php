
<?php
 include("../admin_init.php");

        

                $yorum_sil = $db->prepare("DELETE FROM inceleme_popup WHERE id");
                $yorum_sil->execute(array());
                if ($yorum_sil->rowCount()) {
                    echo '
                    <div class="alert alert-success" style="text-align:center;" role="alert">
                    Tüm bilgiler silindi.
                    </div>';
                    header("Location:../popupform.php");
                } else {
                    echo '    
                    <div class="alert alert-danger" style="text-align:center;" role="alert">
                    Bilgi silme başarısız. Bir sorun oluştu.
                    </div>';
                }

            

            ?>
    