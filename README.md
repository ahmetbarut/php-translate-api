**Kurulum**
```
  composer require ahmetbarut/php-translate-api:dev-master
```
**Kullanım**

```
  <?php
      require_once "vendor/autoload.php";
      use ahmetbarut/GTranslate-api;
      $translate = new GTranslate-api;
  
      $translate->getText("hello","en","tr")["translatedText"]; \\ Merahaba
      ?>
```
