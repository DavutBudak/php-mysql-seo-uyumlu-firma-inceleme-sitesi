<?php header('Content-type: Application/xml; charset="utf8"', true); 
echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xmlns:xhtml="http://www.w3.org/1999/xhtml"
        xsi:schemaLocation="
            http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <?php
    include 'init.php';

    $site = $_SERVER['HTTP_HOST'];
    ?>

    <?php
    $yazilarisor = $db->prepare("select * from sayfa_ici");
    $yazilarisor ->execute();

      while ($yazilaricek = $yazilarisor ->fetch(PDO::FETCH_ASSOC)) { 
        $tarihbaş = substr($yazilaricek["firma_eklenme_tarihi"], 0,10);    

      if($yazilaricek['firma_durum'] == 0) {   ?>
        <url>
            <loc>https://<?php echo $site; ?>/<?php echo $yazilaricek["url_adi"]?></loc>
            <lastmod><?php echo $tarihbaş; ?></lastmod>
        </url>
    <?php }} ?>


</urlset>