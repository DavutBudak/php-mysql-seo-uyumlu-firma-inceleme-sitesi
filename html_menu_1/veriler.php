<?php


	 

 
	error_reporting(0);
	$host 	= 'localhost'; //host bilgisi
	$user 	= 'kullanıı'; //kullanıcı adı
	$pass 	= 'Password'; //sifre
	$db		= 'firmalar'; //veritabanı ismi
	
	$baglan = mysqli_connect($host, $user, $pass, $db) or die (mysqli_Error());
	mysqli_query($baglan,"SET CHARACTER SET 'utf8'");
	mysqli_query($baglan,"SET NAMES 'utf8'");

	
	 
   

  
	$limit = 3; //sayfalamada her sayfada gösterilecek veri sayısı
	if($_POST['baslangic']){
		$baslangic = $_POST['baslangic'];
	}else{
		$baslangic = '0';
	}
	$icerik_sorgu = mysqli_query($baglan,'SELECT SQL_CALC_FOUND_ROWS * FROM sayfa_ici ORDER BY id DESC LIMIT '.$baslangic.','.$limit); //başlangıç değerinden itibaren kaç tane veri getirilecek ise veritabanından LIMIT komutu ile verileri çekiyoruz
	$sayi = mysqli_fetch_row(mysqli_query($baglan,'SELECT FOUND_ROWS()'))[0]; //çekilen veri sayısı
	if($sayi){//veri var ise
		while($icerik = mysqli_fetch_assoc($icerik_sorgu)){ //çekilen veriler içerisinde dönüyoruz, teker teker veriyi $icerik değişkenine aktarıyoruz 
	//Goruntulencek Metnin Tam Hali
	$detay = $icerik['icerik'];
	//Var olan metin içindeki karakter sayısı
	$uzunluk = strlen($detay);
	//Kaç Karakter Göstermek İstiyorsunuz
	$limiticerik = 170;
	//Uzun olan yer “devamı…” ile değişecek.
	if ($uzunluk > $limiticerik) {
	$detay = mb_substr($detay,0,$limiticerik);
	}
	if($icerik['firma_durum'] == 0) { 

	 ?>
	
	<div class="strip_list wow fadeIn">
		<figure>
			<a href="<?= $icerik['url_adi'] ?>"><img src="html_menu_1/img/<?php echo $icerik['sirket_logo']?>"   alt="<?php echo $icerik['sirket_adi'] ?>"></a>
		</figure>
		<small> İncelemeleri</small>
			<h3> <a style="color:black;" href="<?= $icerik['url_adi'] ?>"> <?php echo $icerik['sirket_adi'];?>  </a> </h3>
						

	 <p> <?php echo $detay . "....";?></p>	
		 <ul>
		<li class="rating"> Firma Puanı : <?php echo $icerik['firma_puan'] ?>
		<?php
switch ($icerik['firma_puan']) {
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

			<li><a href="<?= $icerik['url_adi'] ?>"> <?php echo $icerik['sirket_adi']; ?> Hakkında</a></li>
		</ul>
	</div>
	<?php }  		}
	
		$loadCount=$baslangic+$limit; //bir dahaki sefer butona tıklanıldığında kaçıncı veriden itibaren verilerin listelenmesi gerektiği sayı
		if($sayi-$baslangic-$limit > 0){ ?>
				<div class="dahafazla col-md-12" style="margin-top:15px; margin-bottom:25px;"  onclick=veriDevam(<?php echo $loadCount ?>)>
				<span class="btn btn-primary" style="width: 100%;"> <span style="margin-right:15px;  ">[<?php echo $loadCount ?>&nbsp;/&nbsp;<?php echo $sayi ?>]  </span> Daha Fazla Göster</span>
			</div>
		<?php
		}
	}else{?>
		veri yok
	<?php
	}
?>