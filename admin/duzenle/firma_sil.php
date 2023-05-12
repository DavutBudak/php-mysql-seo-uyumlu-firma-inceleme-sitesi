
<?php
 include("../admin_init.php");

                $id = $_GET["id"];
            $firma_getir = $db->prepare("SELECT * FROM sayfa_ici WHERE id = ?");
            $firma_getir->execute(array($id));
            if ($firma_getir->rowCount()) {

                $firma_sil = $db->prepare("DELETE FROM sayfa_ici WHERE id = ?");
                $firma_sil->execute(array($id));
                if ($firma_sil->rowCount()) {
                    echo '
                    <div class="alert alert-success" style="text-align:center;" role="alert">
                    Firma silindi.
                    </div>';
                    header("Location:../bookings.php");
                } else {
                    echo '    
                    <div class="alert alert-danger" style="text-align:center;" role="alert">
                    Firma silme başarısız. Bir sorun oluştu.
                    </div>';
                }

            } else {
                header("Location:../bookings.php");
            }


            ?>
    