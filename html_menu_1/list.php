

<?php if($_GET['page'] <= $total_pages && !$_GET['page'] <= 0) { ?>

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
            "name": "Firmalar",
            "item": "https://siteadresi.com/butun-firmalar"
        }
    ]
}
</script>
<main>

		<div id="results">
			<div class="container">
				<div class="col-md-12">
				<div class="row">
				<div class="col-md-12">
						<h1 style="color:white;"> Tüm  Firmaları </h1>
						<p style="color:white; font-size:17px;"><strong>Toplam </strong><?php echo "$total_results" ?> <strong>Adet Sonuç</strong></p>
					</div>
				

			</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /results -->

		<div id="breadcrumb">
			<div class="container">
				<ul>
					<li><a href="../">Anasayfa</a></li>
					<li><a href="butun-firmalar">Firmalar</a></li>
				</ul>
			</div>
		</div>
		<!-- /breadcrumb -->

		

		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-8">
					
				<div id="veriler"></div>

				</div>
				
				<!-- /col -->
				
			<aside class="col-lg-4" id="sidebar" >
	<div class="box_general_3 booking">
                    <div class="row">


                        <div class="wrap">
                            <div class="search">
                                <input id="search" autocomplete="off" name="aramasorgusu" type="text" class="searchTerm" placeholder="Hangi Kurumu Arıyorsunuz?">
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
                    </div>	</div>
					<!-- /box_general -->
				</aside>
				<!-- /aside -->
				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!-- /main -->

	<?php } else {include 'html_menu_1/404.php';}
	?> 

	

