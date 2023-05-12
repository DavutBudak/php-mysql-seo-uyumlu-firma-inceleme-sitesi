

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Anasayfa",
            "item": "https://siteadresi.com"
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "Kampanyalar",
            "item": "https://siteadresi.com/kampanyalar"
        }
    ]
}
</script>



	<main>

	<div id="breadcrumb">
			<div class="container">
				<ul>
					<li><a href="<?php echo $url; ?>/">Anasayfa</a></li>
					<li><a href="">Kampanyalar</a></li>
				</ul>
			</div>
		</div>
		<!-- /breadcrumb -->


<div class="container margin_60_35">
<div class="main_title">
				<h1>Lorem ipsum dolor sit amet consectetur.</h1>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio sit repellendus dolor quis quibusdam veniam molestiae sed tenetur delectus temporibus!</p>
			</div>
	<div class="row">
		<div class="col-lg-8">
			
			


<div class="row">
	
<?php 




$kampanyalar = $db -> prepare("SELECT * FROM kampanyalar WHERE kampanyadurum = 0  ORDER BY id DESC");
$kampanyalar->execute(array());
$kampanyasonuc=$kampanyalar->fetchAll();
foreach ($kampanyasonuc as $kampanya) { 
	
	//Goruntulencek Metnin Tam Hali
	$detay = $kampanya['kampanyaicerik'];
	//Var olan metin içindeki karakter sayısı
	$uzunluk = strlen($detay);
	//Kaç Karakter Göstermek İstiyorsunuz
	$limit = 200;
	//Uzun olan yer “devamı…” ile değişecek.
	if ($uzunluk > $limit) {
	$detay = substr($detay,0,$limit);
	}

	if($kampanya['kampanyadurum'] == 0) { 

	?>

<div class="col-lg-6">
	<div class="box_badges">
		<div id="badge_level_1" style="margin-bottom: 30px;"><img src="<?php echo $url; ?>/html_menu_1/img/<?php  echo $kampanya['kampanyalogo']; ?>" alt="" style="width:100%; height:250px; max-height:250px; "></div>
		<h3 sty><?php echo $kampanya['kampanyafirmaadi']; ?></h3>
		<div style="min-height:85px;"><?php echo $detay; ?></div>
	
	</div>
</div>
<?php  }} ?>
</div>

		</div>
		
		<!-- /col -->




		<aside class="col-xl-4 col-lg-4" id="sidebar">
					<div class="box_general_3 booking">


					<div class="row">


<div class="wrap">
	<div class="search">
		<input id="search" autocomplete="off" name="aramasorgusu" type="text" class="searchTerm" placeholder="Arama Yap ....">
		<button type="submit" class="searchButton">
			<i class="fa fa-search"></i>
		</button>
	</div>
</div>
<div class="input-group" id="custom-search-input">


	<!--  ARAMADAN GELEN SONUCUN GÖSTERİLDİĞİ YER-->
	<div class="result col-md-12" style="background-color: white; margin-bottom:20px;  -webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px; width:100%; overflow:auto;     max-height: 195px;">


	</div>

</div>
<!-- ARAMADAN GELEN SONUCUN GÖSTERİLDİĞİ YER-->



</div>

<div class="row">
<div class="normal_list">
<div style="text-align: center ;">
	
<a  rel=”nofollow” target="_blank" href="https://piyasalar.com/kayit/"> 
<img   src="https://piyasalar.com/wp-content/uploads/2023/03/banner.png" style="width:80%; "></a>						    
	</div>
</div>
</div>

					</div>
					<!-- /box_general -->
				</aside>
				<!-- /asdide -->








		
	</div>
	<!-- /row -->
</div>
<!-- /container -->
</main>
<!-- /main -->









