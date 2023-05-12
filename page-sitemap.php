<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; 
header('Content-type: Application/xml; charset="utf8"', true); ?>
<urlset
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xmlns:xhtml="http://www.w3.org/1999/xhtml"
        xsi:schemaLocation="
            http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
   

            <?php

$site = $_SERVER['HTTP_HOST'];
?>
        <url>
            <loc>https://<?php echo $site; ?>/</loc>
            <lastmod>2023-03-23</lastmod>
        </url>

        <url>
            <loc>https://<?php echo $site; ?>/top5</loc>
            <lastmod>2023-03-23</lastmod>
        </url>


        <url>
            <loc>https://<?php echo $site; ?>/kampanyalar</loc>
            <lastmod>2023-03-23</lastmod>
        </url>

        <url>
            <loc>https://<?php echo $site; ?>/iletisim</loc>
            <lastmod>2023-03-23</lastmod>
        </url>

        <url>
            <loc>https://<?php echo $site; ?>/butun-firmalar</loc>
            <lastmod>2023-03-23</lastmod>
        </url>
</urlset>
