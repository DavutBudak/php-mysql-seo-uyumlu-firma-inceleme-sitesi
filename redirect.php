<?php

$redirect = [
    '/bilgi/kullanim-kosullari' => 'kullanimkosullari',
    '/bilgi/koruma-politikasi'=> 'korumapolitikasi',
    '/bilgi/risk-bildirimi' =>'riskbildirimi',
    '/bilgi/top5' =>'top5',

    ];
    
    
    if(isset($_SERVER['SCRIPT_URL']) && isset($redirect[$_SERVER['SCRIPT_URL']])){
        
        
        header('Location: https://siteadresi.com/'.$redirect[$_SERVER['SCRIPT_URL']]);
        
        exit;
    }