<?php $canonical = "https://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI']."";
?>
<?php $url ="//".$_SERVER['HTTP_HOST'] ; ?>

<?php
$link = $_GET["link"];

$title_getir = $db->prepare("SELECT * FROM sayfa_ici WHERE url_adi = ?");
$title_getir->execute(array($link));
if ($title_getir) {
    $title = $title_getir->fetch(PDO::FETCH_OBJ);
}
?>
<?php $limit = 4;
$query = "SELECT count(*) FROM sayfa_ici WHERE firma_durum = 0";

$s = $db->query($query);
$total_results = $s->fetchColumn(); 
$total_pages = ceil($total_results/$limit);
//  TOPLAM FİRMA SAYISI
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<!-- Favicons-->
	
<link rel="apple-touch-icon" sizes="57x57" href="https://siteadresi.com/html_menu_1/img/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="https://siteadresi.com/html_menu_1/img/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="https://siteadresi.com/html_menu_1/img/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="https://siteadresi.com/html_menu_1/img/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="https://siteadresi.com/html_menu_1/img/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="https://siteadresi.com/html_menu_1/img/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="https://siteadresi.com/html_menu_1/img/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="https://siteadresi.com/html_menu_1/img/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="https://siteadresi.com/html_menu_1/img/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="https://siteadresi.com/html_menu_1/img/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="https://siteadresi.com/html_menu_1/img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="https://siteadresi.com/html_menu_1/img/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="https://siteadresi.com/html_menu_1/img/favicon-16x16.png">
<link rel="manifest" href="https://siteadresi.com/html_menu_1/img/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="https://siteadresi.com/html_menu_1/img/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



	<?php
	
				
	if($canonical == "https://siteadresi.com/butun-firmalar?page=1") {header('Location: https://siteadresi.com/butun-firmalar');}
	
$description = ' Şirketler içerisinde size en uygununu bulabileceğiniz  incelemelerini sizler için hazırladık. ';
$titlemeta = 'siteadresi.com - Detaylı  Şirket İncelemeleri';

$descriptionList = [
	'butun-firmalar' => [
		1 => 'Tüm firmalarından size en uygununu seçebilir ve işlemleriniz sorunsuz ve güvenilir gerçekleştirebilirsiniz. ',
		2 => 'Firmalar sizin için değerlendirip, özellikleri ve eksileriyle sunduk. firmalar arasında tercih yapmak artık çok kolay',
		3 => 'firmalar arasından size en uygun olan Firmayı seçip, devam edebilirsiniz.',
	]
	];
switch ($_REQUEST['sayfa']) {
	case 'firmadetay':
		$description =  $title->firma_description;
		$titlemeta = $title->firma_title;
	break;
	case 'firmalar':
	/*	$canonical = "https://siteadresi.com/butun-firmalar"; */
		$page = $_GET['page'] ?? 1;
		$pagenext=$page;
	if($pagenext == $total_pages){$pagenext=$page;} 	elseif($pagenext >=! $total_pages ){$pagenext++;} 
            $pagedusur = $pagenext;
                        if($page == $total_pages){  $pagedusur--;} else {  $pagedusur--; $pagedusur--;}
            $pageprev = $pagedusur;
            if($pageprev == 0 || $pageprev == 1 ){$linkprev='<link rel="prev" href="https://siteadresi.com/butun-firmalar" />';}else{$linkprev='<link rel="prev" href="https://siteadresi.com/butun-firmalar?page='.$pageprev.'" />';}
		$linknext='<link rel="next" href="https://siteadresi.com/butun-firmalar?page='.$pagenext.'" />';
                

		$description =  $descriptionList['butun-firmalar'][$page] ?? $descriptionList['butun-firmalar'][1];
		$titlemeta = 'TÜM FİRMALAR'.($page == 1 ? '' : $page).' |  Güvenilir Mi?';
	
	break;
	
	}

	switch ($canonical) {

	case "https://siteadresi.com/kullanimkosullari":
		$titlemeta = "KULLANIM KOŞULLARI | Site-İsmi Güvenilir Mi?";
		$description = 'sitelerin nasıl kullanıldığını, kullanıcılara neler verdiği ve kullanıcılarına ne gibi avantajlar sağladığını bu sayfada bulabilirsiniz.';
	break;
	case "https://siteadresi.com/korumapolitikasi":
		$titlemeta = "KORUMA POLİTİKASI | Site-İsmi Güvenilir Mi?";
		$description = 'Özel verileri koruma politakamız sayfamızdır. Tüm haklarınızı ve koruma politikalarımıza ulaşabilirsiniz.';
	break;
	
	case "https://siteadresi.com/riskbildirimi":
		$titlemeta = "RİSK BİLDİRİMİ | Site-İsmi Güvenilir Mi?";
		$description = 'sitelerin risk bildirimlerini ve ne yaşayabileceğinizi siz değerli kullanıcılarımız için derledik ve sizlere aktardık.';
	break;
	case "https://siteadresi.com/top5":
		$titlemeta = "TOP 5 FİRMA LİSTESİ | Site-İsmi Güvenilir Mi?";
		$description = 'Tüm şirketler arasından size uygun, avantajlar açısından en makul TOP 5  şirketi sizler için derledik ve öne çıkan unsurlarını ele aldık.';
	break;
}
?>
<link rel="canonical" href="<?=$canonical;?>" />

<meta name="description" content="<?=$description;?>">
<title><?=$titlemeta;?></title>
<link rel="alternate" hreflang="tr" href="<?php echo $canonical ?>" />
<?php echo $linkprev; ?>
<br>
<?php  echo $linknext;
?>


	
    
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    
	
	<!-- BASE CSS -->
	<link href="<?php echo $url; ?>/html_menu_1/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $url; ?>/html_menu_1/css/style.css" rel="stylesheet">
	<link href="<?php echo $url; ?>/html_menu_1/css/menu.css" rel="stylesheet">
	<link href="<?php echo $url; ?>/html_menu_1/css/vendors.css" rel="stylesheet">
	<link href="<?php echo $url; ?>/html_menu_1/css/icon_fonts/css/all_icons_min.css" rel="stylesheet">
	
	<!-- YOUR CUSTOM CSS -->
	<link href="<?php echo $url; ?>/html_menu_1/css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style id="theia-sticky-sidebar-stylesheet-TSS">.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style>



</head>


<body>



	<div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
    
	<header class="header_sticky">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-6">
				<div id="logo_home" style=" margin: 0;padding: 0;line-height: 1;">
					<a style="display: block;"  href="<?php echo $url; ?>" title="Site-İsmi"><img class="sitelogo" src="<?php echo $url; ?>/html_menu_1/img/logo.png" alt="Site-İsmi"></a>
					</div>
				</div>
				<nav class="col-lg-9 col-6">
					<a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
					
					<div class="main-menu">
						<ul>
                            <li class="submenu"><a href="<?php echo $url; ?>/butun-firmalar" class="show-submenu">  Firmaları</a><li>
							<li class="submenu"><a href="<?php echo $url; ?>/top5" class="show-submenu"> Top 5 Listesi </a><li>
							<li class="submenu"><a href="<?php echo $url; ?>/iletisim" class="show-submenu"> İletişim </a><li>


						</ul>
					</div>
					
					<!-- /main-menu -->
				</nav>
			</div>
		</div>
		<!-- /container -->
	</header>
	<!-- /header -->


