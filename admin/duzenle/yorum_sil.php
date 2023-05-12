
<?php
 include("../admin_init.php");

                $id = $_GET["id"];
            $yorum_getir = $db->prepare("SELECT * FROM firma_yorumlari WHERE id = ?");
            $yorum_getir->execute(array($id));
            if ($yorum_getir->rowCount()) {

                $yorum_sil = $db->prepare("DELETE FROM firma_yorumlari WHERE id = ?");
                $yorum_sil->execute(array($id));
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

            } else {
                header("Location:../reviews.php");
            }


            ?>
    