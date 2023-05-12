
<?php function seo($s) {
 $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
 $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
 $s = str_replace($tr,$eng,$s);
 $s = strtolower($s);
 $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
 $s = preg_replace('/\s+/', '-', $s);
 $s = preg_replace('|-+|', '-', $s);
 $s = preg_replace('/#/', '', $s);
 $s = str_replace('.', '', $s);
 $s = trim($s, '-');
 return $s;
}?>
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
            "name": "Top5",
            "item": "https://siteadresi.com/top5"
        }
    ]
}
</script>

	<main>
		<div id="breadcrumb">
			<div class="container">
				<ul>
				<li><a href="<?php echo $url; ?>/">Anasayfa</a></li>
                <li> <a href=""> Top5 </a></li>
					
				</ul>
			</div>
		</div>
		<!-- /breadcrumb -->
		
	

<div class="container margin_60_35">
<div class="main_title">
				<h1>
					En İyi 5  Şirket
				</h1>
				<p>En iyi 5  şirketi sizin için incelediğimiz sayfamız işinizi kolaylaştırmak için hazırlanmıştır. Kullanıcı yorumları ve puanlamaları doğrultusunda tamamen şeffaf ve güvenilir olan platformumuz üzerinden  şirketlerinin artıları ve eksilerini görebilirsiniz. Değerlendirmelerinize destek olabilmek adına şirketlerin lisans bilgilerini bulabilirsiniz ve daha önce bu şirketlerde  hesabı açmış kişilerin yorumlarını detaylıca inceleyebilirsiniz.</p>
			</div>
	<div class="row">
		<div class="col-lg-8">
			
			


<div class="row">
<?php 



$limit = 5;
$sirketsayisi= 0; 
				$uyeler = $db -> prepare("SELECT * FROM sayfa_ici  WHERE  firma_durum = 0  ORDER BY firma_puan DESC LIMIT $limit");
                $uyeler->execute(array());
                $uye_sonuc=$uyeler->fetchAll();
                foreach ($uye_sonuc as $uye) { 
					
					//Goruntulencek Metnin Tam Hali
					$detay = $uye['icerik'];
					//Var olan metin içindeki karakter sayısı
					$uzunluk = strlen($detay);
					//Kaç Karakter Göstermek İstiyorsunuz
					$limit = 100;
					//Uzun olan yer “devamı…” ile değişecek.
					if ($uzunluk > $limit) {
					$detay = mb_substr($detay,0,$limit);
					}
                    $sirketsayisi++;
					?>


					
                <div class="col-lg-12 col-md-12" style="text-align:center ;" >
                    <div class="box_list home">

                    <div class="col-md-12" style="border: thick double #32a1ce; line-height:40px; "> <b> <?php echo $sirketsayisi; ?>.  Şirketi</b>  </div>

                        <figure>



                                <div  class="col-md-12"><a
                                        href="<?= $uye['url_adi']  ?>"><img
                                            src="html_menu_1/img/<?php echo $uye['sirket_logo']?>" class="img-logo"
                                            alt=""></a></div>
                        </figure>

                        <div class="wrapper">
                            <small> Analiz</small>
                            <h2> <a style="color:black;" href="<?= $uye['url_adi']  ?>"> <?php echo $uye['sirket_adi'];?>  </a> </h2>
                            <p> <?php echo $detay;?> ....</p>
                            <li class="rating"> Firma Puanı : <?php echo $uye['firma_puan'] ?> 
							<?php
switch ($uye['firma_puan']) {
    case 5:
    ?>
                                <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                    class="icon_star voted"></i><i class="icon_star voted"></i><i
                                    class="icon_star voted"></i>
                                <?php
    break;
        case 4:
            case 4.1:
                case 4.2:
                    case 4.3:
                        case 4.4:
                            case 4.5:
                                case 4.6:
                                    case 4.7:
                                        case 4.8:
                                            case 4.9:


            ?>
                                <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                    class="icon_star voted"></i><i class="icon_star voted"></i><i
                                    class="icon_star "></i>
                                <?php   break; 
        
        case 3:
            case 3.1:
                case 3.2:
                    case 3.3:
                        case 3.4:
                            case 3.5:
                                case 3.6:
                                    case 3.7:
                                        case 3.8:
                                            case 3.9:


            ?>
                                <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                    class="icon_star voted"></i><i class="icon_star "></i><i class="icon_star "></i>
                                <?php   break; 
        
        case 2:
            case 2.1:
                case 2.2:
                    case 2.3:
                        case 2.4:
                            case 2.5:
                                case 2.6:
                                    case 2.7:
                                        case 2.8:
                                            case 2.9:


            ?>
                                <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                    class="icon_star "></i><i class="icon_star "></i><i class="icon_star "></i>
                                <?php   break; 
        
        case 1:
            case 1.1:
                case 1.2:
                    case 1.3:
                        case 1.4:
                            case 1.5:
                                case 1.6:
                                    case 1.7:
                                        case 1.8:
                                            case 1.9:


            ?>
                                <i class="icon_star voted"></i><i class="icon_star "></i><i class="icon_star "></i><i
                                    class="icon_star"></i><i class="icon_star "></i>
                                <?php   break; 
        
    
    
    }
?>

						</li>
							</div>

                        <ul style="text-align:left ;" >
                            <li ><i class="icon-eye-7"></i> <?php echo $uye['firma_goruntuleme'];?> Görüntüleme</li>
                            <li><a href="<?= $uye['url_adi']  ?>"> <?php echo $uye['sirket_adi']; ?> Hakkında</a></li>
                        </ul>
                    </div>
					</div>



                <?php } ?>

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




	

	
