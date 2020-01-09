**Kurulum**
```
  composer require ahmetbarut/php-translate-api:dev-master
```
**Kullanım**

```
  <?php
      require_once "vendor/autoload.php";
      use ahmetbarut/GTranslate/Translate;
      $translate = new Translate;
  
      $translate->getText("hello","en","tr")["translatedText"]; \\ Merahaba
      ?>
```
