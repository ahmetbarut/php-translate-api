<b>Kurulum</b>
<br/>
<code style="padding:20px">
  composer require ahmetbarut/php-translate-api:dev-master
</code>
<br><br><br>
<b>Kullanım</b>
<code style="padding:20px">
  \<?php 
      require_once "vendor/autoload.php";
      use ahmetbarut/translate-api;
      $translate = new translate-api;
  
      $translate->getText("hello","en","tr")["translatedText"]; \\ Merahaba
      \?>
</code>
