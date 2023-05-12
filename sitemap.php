<?php header('Content-type: Application/xml; charset="utf8"', true);
echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php $site = $_SERVER['HTTP_HOST']; ?>
<sitemap>
<loc>https://<?php echo $site; ?>/post-sitemap.xml</loc>
</sitemap>
<sitemap>
<loc>https://<?php echo $site; ?>/page-sitemap.xml</loc>
</sitemap>
</sitemapindex>


