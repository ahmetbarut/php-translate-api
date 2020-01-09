<b>Kurulum</b>
<br/>
<code style="padding:20px">
  composer require ahmetbarut/php-translate-api:dev-master
</code>
<br><br><br>
<b>Kullanım</b>
<br>
<code style="padding:20px">
  \<?php<br>
      require_once "vendor/autoload.php";<br>
      use ahmetbarut/translate-api;<br>
      $translate = new translate-api;<br>
  <br>
      $translate->getText("hello","en","tr")["translatedText"]; \\ Merahaba
      \?>
</code>
