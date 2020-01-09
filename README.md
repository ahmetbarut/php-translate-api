**Kurulum**
```
  composer require ahmetbarut/php-translate-api:dev-master
```
**Kullanım**

```
  <?php
      require_once "vendor/autoload.php";
      use ahmetbarut/translate-api;
      $translate = new translate-api;
  
      $translate->getText("hello","en","tr")["translatedText"]; \\ Merahaba
      ?>
```
