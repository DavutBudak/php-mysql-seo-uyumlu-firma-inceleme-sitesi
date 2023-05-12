
<?php
 include("../admin_init.php");

                $id = $_GET["id"];
            $kampanya_getir = $db->prepare("SELECT * FROM kampanyalar WHERE id = ?");
            $kampanya_getir->execute(array($id));
            if ($kampanya_getir->rowCount()) {

                $kampanya_sil = $db->prepare("DELETE FROM kampanyalar WHERE id = ?");
                $kampanya_sil->execute(array($id));
                if ($kampanya_sil->rowCount()) {
                    echo '
                    <div class="alert alert-success" style="text-align:center;" role="alert">
                    Firma silindi.
                    </div>';
                    header("Location:../kampanyalar.php");
                } else {
                    echo '    
                    <div class="alert alert-danger" style="text-align:center;" role="alert">
                    Firma silme başarısız. Bir sorun oluştu.
                    </div>';
                }

            } else {
                header("Location:../kampanyalar.php");
            }


            ?>
    