<?php 
include("../../init.php");
?>
<main>
    <div class="hero_map">
        <br> <br>
    <h2 class="hometitle">  Şirketleri  Keşfedin!</h2>
<br>
<h3 class="hometitle">Sizler için   firmalarını detaylıca inceliyoruz. </h3>


        <div class="search_wp1" style="margin-top:30px;">
            <div id="custom-search-input">
                <div class="input-group">


                    <input id="search" type="text" autocomplete="off" name="aramasorgusu" class="search-query"
                        placeholder="Hangi Kurumu Arıyorsunuz?" ; style="height:50px ;">

                    <!--  ARAMADAN GELEN SONUCUN GÖSTERİLDİĞİ YER-->
                    <div class="result col-md-12"
                        style="background-color: white; margin-bottom:10px; margin-top:10px; -webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px; width:100%; overflow:auto; max-height:95px; ">

                    </div>

                </div>
                <!-- ARAMADAN GELEN SONUCUN GÖSTERİLDİĞİ YER-->



            </div>
        </div>
    </div>

<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  { "symbols": [
    {
      "proName": "_IDC:XAUTRYG",
      "title": "ALTIN"
    },
    {
      "proName": "BIST:XU100",
      "title": "BIST 100"
    },
    {
      "proName": "BITFINEX:BTCTRY",
      "title": "BTC"
    },
    {
      "proName": "BINANCE:ETHTRY",
      "title": "ETHEREUM"
    } ,
    {
      "proName": "BIST:USDTR",
      "title": "USD"
    } ,
    {
      "proName": "BINANCE:USDTTRY",
      "title": "TETHER"
    }
    
  ]
  "colorTheme": "light",
  "isTransparent": false,
  "displayMode": "adaptive",
  "locale": "tr"
}
  </script>

    <!-- /hero_map -->

    <div class="bg_color_1">
        <div class="container margin_120_95" style="padding-bottom:15px !important;">
            <div class="main_title">
                <h1 style="margin-bottom:20px;" > Şirket İncelemeleri</h1>
                <p>Gerçek kullanıcı yorumları ve şirket puanları çerçevesinde sıralanmış, Uluslararası  yapmak isteyen    <strong> firmalarını</strong> listeleyen bir inceleme sitesidir. En büyük artısı da tarafsız ve şeffaf olmasıdır.
                </p>
            </div>

            <div class="row">
                <?php 




$limit = 6;
				$uyeler = $db -> prepare("SELECT * FROM sayfa_ici WHERE firma_durum = 0  ORDER BY id DESC LIMIT  $limit");
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

					if($uye['firma_durum'] == 0) { 

					?>



                <div class="col-lg-4 col-md-6">
                    <div class="box_list home">
                   
                        <figure>
                            <div class="row" style="margin-top: 30px;">
                                <div class="col-md-2"></div>
                                <div class="col-md-10"><a
                                        href="<?= $uye['url_adi'] ?>"><img
                                            src="html_menu_1/img/<?php echo $uye['sirket_logo']?>" class="img-logo"
                                            alt="<?php echo $uye['sirket_adi'] ?>"></a></div>
                            </div>
                        </figure>

                        <div class="wrapper">
                            <small> İncelemeleri</small>
                            <h3> <a style="color:black;" href="<?= $uye['url_adi'] ?>"> <?php echo $uye['sirket_adi'];?>  </a> </h3>
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

                       <ul>
                            <li ><i class="icon-eye-7"></i> <?php echo $uye['firma_goruntuleme'];?> </li>
                            <li style="font-size:12px;" ><a href="<?= $uye['url_adi']  ?>"> <?php echo $uye['sirket_adi']; ?> Hakkında</a></li>
                            
                        </ul>
                    </div>
					</div>


                <?php  }} ?>

					</div>
                    <p style="margin-top:40px;" class="text-center add_top_30"><a href="butun-firmalar" class="btn_1 medium">
                    Firmalarını Görüntüle</a></p>
					
            </div>
            <!-- /row -->
            
        </div>
        <!-- /container -->
    </div>
    <!-- /white_bg -->

    <div class="container" style="padding-top:50px !important;">
        <div class="main_title">
            <h2>Sizin İçin En Uygun Firma Hangisidir?</h2>
            <br><br>
            <p>2023 yılında en güvenilir <strong> şirketlerinin</strong> hangileri olduğu yatırımcılar tarafından sıklıkla araştırılıyor ve merak ediliyor. Özellikle son zamanlarda ilgi gören <strong>  firmaları</strong>  ile ilgili çok fazla soru sorulduğunu görüyorum. Bu nedenle sizler için hazırladığım rehberde birçok detayı bulabilirsiniz. En çok merak edilen güvenilir <strong> şirketi</strong> seçerken nelere dikkat edilmeli sorusunu da yanıt alabilirsiniz.</p>

            <p> piyasasına adım atmak isteyen yatırımcılar en iyi <strong> şirketlerini </strong> bulmak ve onlarla çalışmak istiyorlar. İşlem koşulları açısından en avantajlı olan  Şirketlarını seçmeye özen gösteriyorlar.
            </p>
            <p>Bu kısımda en güvenilir <strong> şirketini</strong>  seçerken dikkat edilmesi gereken farklı kriterler de var. Rekabetin çok olduğu bu piyasada, muhtemelen size ulaşan ve telefon ile görüştüğünüz  Şirketları her zaman kendilerini en güvenilir ve sağlam  şirketi olarak tanıtıyorlardır.
            </p>
            <p>Peki, sizce de öyleler mi?
            </p>
            <p>Kolayca ulaşabileceğiniz bu kılavuzda 2023’nin en iyi ve en güvenilir <strong> şirketleri </strong> hangiler onların detaylı incelemesine ulaşabileceksiniz. Bu kılavuz yardımıyla  nelere dikkat edeceğinizi ve nasıl  yapacağınızı detaylıca öğrenmiş olacaksınız.
            </p>
            <p>Şu an  yer alan 2023’nin en iyi  şirketlerini içeren listeyi bu bölümün altında görebilirsiniz. Aynı zamanda bu listedeki şirketlerin neden iyi ve güvenilir oldukları hakkında açıklamaları da inceleyebilirsiniz.
            </p>

            <p> Listenin altında bu kurumları tespit ederken nelere dikkat edildiği ile ilgili detaylı bir bölüm bulunmaktadır. Bu açıklamaları incelemeniz en iyi ve güvenilir <strong> şirketleri</strong>  ile ilgili sorularınızın çoğuna cevap bulabilirsiniz.
            </p>


            <p>Buraya kadar geldiniz ve her detayı incelemenize rağmen aklınızda kalan bazı sorulara cevap alamadıysanız, sayfanın altında yer alan yorum kısmından sorularınızı bana iletebilirsiniz. 1 gün içinde benden cevap alabilirsiniz. 
            </p>
            <p>Hadi, birlikte ne güvenilir <strong> şirketlerini</strong>  incelemeye başlayalım.
            </p>
            
            
            
            
<!-- POPUP KAPALI

<div class="popup-container"  >
	<label style="display:none !important;" class="button" for="contract-popup">PopUp</label>
	<input style="display:none !important;"  type="checkbox" id="contract-popup">
	<div class="popup" style="z-index:9583829591 !important;">
		<label for="contract-popup"></label>
		<div class="inner">
        <div class="title" style="background:linear-gradient(95deg, rgb(255, 126, 0) 20%, rgb(201, 38, 74) 80%)"> 
				<h3 style="color:white; margin-bottom:10px !important; margin-top:10px !important;">Popup</h3>
				<label for="contract-popup">
					<i style="font-size:30px !important; color:white !important;" class="fa fa-times"></i>
				</label>
			</div>
			
			<div class="content">
				
            <div class='rounded text-center' style="background-color:#e04512;">
                   <div class="col-12" style="width: 100%; height: 100%; ">
                                <p style=" width: 100%; height: 93%; text-align: center;"> <a href="#"> <img src="#" alt="" style="width:100%; height:100%;"> </a></p>
                            </div>
                    </div>


			</div>
		</div>
	</div>
</div>
-->

            
            
            <script>



        setTimeout(function(){
     $('label[for=contract-popup]').first().trigger("click");
},4000);

</script>
            
            
            
            
            



        </div>

        <!-- /row -->
    </div>
    <!-- /container -->


    <!-- /cta_subscribe -->
</main>
<!-- /main content -->