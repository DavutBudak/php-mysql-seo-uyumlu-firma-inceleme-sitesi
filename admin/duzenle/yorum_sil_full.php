
<?php
 include("../admin_init.php");

        

                $yorum_sil = $db->prepare("DELETE FROM firma_yorumlari WHERE id");
                $yorum_sil->execute(array());
                if ($yorum_sil->rowCount()) {
                    echo '
                    <div class="alert alert-success" style="text-align:center;" role="alert">
                    Yorum silindi.
                    </div>';
                    header("Location:../reviews.php");
                } else {
                    echo '    
                    <div class="alert alert-danger" style="text-align:center;" role="alert">
                    Yorum silme başarısız. Bir sorun oluştu.
                    </div>';
                }

            

            ?>
    