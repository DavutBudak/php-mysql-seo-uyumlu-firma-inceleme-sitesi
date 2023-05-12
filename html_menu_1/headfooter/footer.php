


<footer class="footer">
  <div class="container">
    
  <div class="footer-left col-md-4 col-sm-6">
    <div class="col-md-9">
<h1 style="color:white;">LOGO ALANI</h1>
  </div>
    <div class="col-md-12">
    <p class="about">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Non ab, magnam, aspernatur placeat recusandae et est, sequi aliquid cumque rem unde totam earum velit reprehenderit.   Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatem nemo atque blanditiis in rerum ab dolorum? Voluptas, blanditiis rerum?
    </p>
    
   
    </div>
  </div>
  
  
  <div class="footer-center col-md-4 col-sm-6" style="margin-top:60px;">
      <div class="footer-secure" style="color: white; ">
      <div class="row"> 
      <div class="fotosecure col-md-2">
                    </div>
      <div class="fotosecure col-md-2">
                    </div>
      <div class="fotosecure col-md-2">
                        <img src="<?php echo $url; ?>/html_menu_1/img/secure.svg" alt="secure" width="50px;" height="140px;" >
                    </div>
       <div class="col-md-6" style="margin-top:25px ; text-align:center;">    Bu site 256 bit SSL sertifikası sayesinde,
                        saldırı ve virüslere karşı korunmaktadır.
                      </div>
                     
                  </div>
                  </div>
                
        
  </div>
  
  


  <div class="footer-right col-md-4 col-sm-6"  >
    <div class="row">
<div class="col-md-6">  </div>
<div class="col-md-6"> 
    <p class="menu" style="text-align:center ; " >
      <a  href="<?php echo $url; ?>/"> Anasayfa</a> 
      <br>
      <a href="<?php echo $url; ?>/top5"> Top 5 Listesi</a> 
      <br>   
      <a href="<?php echo $url; ?>/butun-firmalar">  Firmaları</a> 
      <br>
      <a href="<?php echo $url; ?>/kullanimkosullari"> Kullanım Koşulları </a> 
      <br> <a href="<?php echo $url; ?>/korumapolitikasi">Kişisel Verileri Koruma Politikası </a> 
      <br> <a href="<?php echo $url; ?>/riskbildirimi">  Risk Bildirimi</a> 
      <br>

    </p>
  </div>
  </div>
 

  </div>
</footer>

<hr  style="border: 1px solid black;"> 
<div class="altlink" class="col-md-12" style="text-align:center;">
                  <p class="menu" style="color:black;">
      ©2023 <a href="https://siteadresi.com">siteadresi.com</a> Tüm hakları saklıdır.


    </p>
                  </div>
                  <hr  style="border: 1px solid black;"> 

	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="<?php echo $url; ?>/html_menu_1/js/jquery-3.6.0.min.js"></script>
	<script src="<?php echo $url; ?>/html_menu_1/js/common_scripts.min.js"></script>
	<script src="<?php echo $url; ?>/html_menu_1/js/functions.js"></script>
<!-- SPECIFIC SCRIPTS -->
	<script src="<?php echo $url; ?>/html_menu_1/js/markerclusterer.js"></script>


	<!-- SİTE İÇİ ARAMA İÇİN KOD -->
	<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<!---jQuery ajax live search --->

  <script>
			$(function(){ //sayfa yüklendiğinde
				veriDevam("0"); //fonksiyon çalışsın
			});
			function veriDevam(baslangic){
				var loader_gif = '<img src="yukleniyor.gif" />';
				$(".resim_gif").show(); //class ismi resim_gif olan element gözükür hale gelsin
				$(".resim_gif").html(loader_gif); //ve bu elementin içerisine 'loader_gif' değişkenindeki gif türündeki resim eklensin
				$.post("https://siteadresi.com/html_menu_1/veriler.php",{baslangic: baslangic},function(result){ //veriler.php dosyasına 'baslangic' degeri post edilsin
					$(".resim_gif").hide(); //class ismi resim_gif olan element görünmez hale gelsin
					$(".dahafazla").hide(); //class ismi dahafazla olan element görünmez hale gelsin
					$("#veriler").append(result); 
					//post edilen veriler.php dosyasından geri dönen verileri, id si veriler olan elementin içerisine sonradan ekle.
					//böylelikle butona ver basıldıkça alt alta veriler sıralanarak eklenmiş olacak
					//alert($(".dahafazla:last").offset().top);
				});
			}
      //
			 // $(window).scroll(function() { //scroll hareket ettiğinde
				 //if($(window).scrollTop() + window.innerHeight == $(window).height()) { //scroll en aşağıdaysa
				 //	if (!$(".dahafazla:last").attr("durum")){ //'dahafazla' sınıf ismine sahip en son elemanın 'durum' değeri yok ise
					 //	$(".dahafazla:last").trigger( "click" ); //bu eleman için otomatik click olayını tetikliyoruz
				 //		$(".dahafazla:last").attr('durum','1'); //ve elemana tıklanıp, gerekli işlemler gerçekleştirildiğini temsilen 'durum' özelliğine 1 değerini veriyoruz
				 //	}
			 //	}
		 //	});
		</script>
<script type="text/javascript">
    $(document).ready(function(){
        // veritabanına istek atma
        loadData();
        function loadData(query){
          $.ajax({
            url : "arama_post.php",
            type: "POST",
            chache :false,
            data:{query:query},
            success:function(response){
              $(".result").html(response);
            }
          });  
        }
        // gelen sonuçları listeleme
        $("#search").keyup(function(){
          var search = $(this).val();
          if (search !="") {
            loadData(search);
          }else{
            loadData();
          }
        });
    });
</script>
	<!-- SİTE İÇİ ARAMA İÇİN KOD -->
	
	

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo $url; ?>/html_menu_1/js/jquery.mask.min.js"></script>
	<script>
  $(document).ready(function() {
      

      $('#telefon_numarasi').mask('(000) 000 00 00', {onChange: function(a,b,c){
          $(c).val(a.replace('(0', '(').replace('(90', '('));
          var vals =  $(c).val();
         if(vals.length == '15'){
              $('#phone_help').html('');
              
              $('#form-submit'). prop("disabled", false);
              
         }else{
             $('#form-submit'). prop("disabled", true);
             $('#phone_help').html('<ul class="list-unstyled"><li>Lütfen bu alanı doldurun.</li></ul>');
         }
          
          
      },});

  });
</script>
	
<script>
  $(document).ready(function() {
      

      $('#telefon_numarasipopup').mask('(000) 000 00 00', {onChange: function(a,b,c){
          $(c).val(a.replace('(0', '(').replace('(90', '('));
          var vals =  $(c).val();
         if(vals.length == '15'){
              $('#phone_help').html('');
              
              $('#form-submit'). prop("disabled", false);
              
         }else{
             $('#form-submit'). prop("disabled", true);
             $('#phone_help').html('<ul class="list-unstyled"><li>Lütfen bu alanı doldurun.</li></ul>');
         }
          
          
      },});

  });
</script>

</body>

</html>
