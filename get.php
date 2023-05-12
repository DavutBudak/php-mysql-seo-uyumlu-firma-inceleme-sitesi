<?php
    if(!$_GET){
        include 'html_menu_1/index.php';
    }else{
        switch($_GET["sayfa"]){
            // case alanında url yolu tanımlanır, include sayfa yeri gösterilir.
            case 'anasayfa': include 'html_menu_1/index.php';break;
            case 'firmalar': include 'html_menu_1/list.php';break;
            case 'firmadetay': include 'html_menu_1/detail-page.php';break;
            case 'sayfabulunamadi': include 'html_menu_1/404.php';break;
            case 'koruma-politikasi': include 'html_menu_1/koruma-politikasi.php';break;
            case 'kullanim-kosullari': include 'html_menu_1/kullanim-kosullari.php';break;
            case 'risk-bildirimi': include 'html_menu_1/risk-bildirimi.php';break;
            case 'top5': include 'html_menu_1/top5.php';break;
            case 'iletisim': include 'html_menu_1/iletisim.php';break;
          //  case 'kampanyalar': include 'html_menu_1/kampanyalar.php';break;





        
        default:include 'html_menu_1/index.php';break;
        }
    }
?>


