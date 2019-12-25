<?php 

/**
 * Class 		Translate Api
 * @category	PHP Translate Bot
 * @author		Ahmet Barut
 * @license 	https://www.gnu.org/licenses/gpl.txt  GPL License 3
 * @mail 		ahmetbarut588@gmail.com
 * @date 		24.12.2019
 */

namespace AhmetBarut\Translate;

class Translate {
    private $url = "https://translate.googleapis.com/translate_a/single?client=gtx&";

    /**
     * @Param String
     * @return ArrayData
     */
    public function getText($text,$sourceLang = 'en',$targetLang = 'tr')
    {
        $returnData = json_decode(file_get_contents($this->url . 'sl=' . $sourceLang . '&tl=' . $targetLang . '&dt=t&q=' . $this->addSlug($text)),true);
        
        return [
                'translatedText' => $returnData[0][0][0],
                'sourceText' => $returnData[0][0][1],
                'sourceLang'=> $sourceLang,
                'targetLang'=> $targetLang,
                'statu' => $returnData[0][0][4],
                ];
    }

    public function colors($color)
    {
        $foregroundColors = [
            /* Foreground */
            'light_blue' => '0;30',
            'dark_gray' => '1;30',
            'blue' => '0;34',
			'light_blue' => '1;34',
			'green' => '0;32',
			'light_green' => '1;32',
			'cyan' => '0;36',
			'light_cyan' => '1;36',
			'red' => '0;31',
			'light_red' => '1;31',
			'purple' => '0;35',
			'light_purple' => '1;35',
			'brown' => '0;33',
			'yellow' => '1;33',
			'light_gray' => '0;37',
			'white' => '1;37',
        ];

			$backgroundColors = [
                'black' => '40',
			    'red' => '41',
			    'green' => '42',
			    'yellow' => '43',
			    'blue' => '44',
			    'magenta' => '45',
			    'cyan' => '46',
                'light_gray' => '47',
            ];

        return $foregroundColors[$color];
    }

    public function addSlug($text,$slug='+')
    {
        for ($i = 0; $i<strlen($text); $i++){
            if ( $text[$i] == ' '){
                $text[$i] = $slug;
            }
        }
        return $text;
    }
}