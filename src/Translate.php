<?php 

/**
 * Class 		Translate Api
 * @category	PHP Translate Bot
 * @author		Ahmet Barut
 * @mail 		ahmetbarut588@gmail.com
 * @date 		24.12.2019
 **/

namespace AhmetBarut\Translate;


class Translate {
    private $url = "https://translate.googleapis.com/translate_a/single?client=gtx&";

    /**
     * @Param String
     * @return ArrayData
     */
    public function getText($text,$sourceLang = 'en',$targetLang = 'tr')
    {
        $returnData = json_decode(file_get_contents($this->url . 'sl=' . $sourceLang . '&tl=' . $targetLang . '&dt=t&q=' . $this->slug($text)),true);
        
        return [
                'translatedText' => $returnData[0][0][0],
                'sourceText' => $returnData[0][0][1],
                'sourceLang'=> $sourceLang,
                'targetLang'=> $targetLang,
                ];
    }

    /* 
        * Terminal Colors       
    */

    public function terminalTranslate($argv)
    {
        array_shift($argv);
        if(count($argv) >0){
            @$sl = $argv[0];
            @$tl = $argv[1];
            unset($argv[0]);
            unset($argv[1]);
            $text = implode(' ', $argv);
        }else{
            $sl = readline("\033[32m Metin Dili => ");
            $tl = readline("\033[32m Çevirmek İstediğiniz Dil => ");
            $text = readline("\033[32m Çevrilecek :\n ==> ");
        }
        $returnText = $this->getText($text,$sl,$tl);

        return $returnText['translatedText'];
            
        
    }

    public function slug($text,$slug='+')
    {
        for ($i = 0; $i<strlen($text); $i++){
            if ( $text[$i] == ' '){
                $text[$i] = $slug;
            }
        }
        return $text;
    }
}
