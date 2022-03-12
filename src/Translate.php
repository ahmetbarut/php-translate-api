<?php

namespace AhmetBarut\GoogleTranslate;

use Exception;
use function Termwind\{render};

class Translate
{
    private $url = "https://translate.googleapis.com/translate_a/single?client=gtx";

    protected array $arguments;

    protected string $style;

    public function __construct($argument)
    {
        array_shift($argument);
        $this->arguments = $argument;
        $this->setStyle("px-3 text-black bg-green-600");
    }

    /**
     * @param string $text
     * @param string $sourceLang
     * @param string $targetLang
     * @return array
     */
    public function translate(string $text, ?string $sourceLang = 'en', ?string $targetLang = 'tr'): array
    {
        $translatedData = json_decode(
            file_get_contents(
                sprintf(
                    "%s&sl=%s&tl=%s&dt=t&q=%s",
                    $this->url,
                    $sourceLang,
                    $targetLang,
                    $this->createQueryString($text)
                )
            ),
            true
        );
        return [
            'translatedText' => $translatedData[0][0][0],
            'sourceText' => $translatedData[0][0][1],
            'sourceLang' => $sourceLang,
            'targetLang' => $targetLang,
        ];
    }

    public function terminalTranslate()
    {

        if (count($this->arguments) == 0) {
            $sl = readline("\033[32m Metin Dili => ");
            $tl = readline("\033[32m Çevirmek İstediğiniz Dil => ");
            $text = readline("\033[32m Çevrilecek :\n ==> ");
        }

        if (count($this->arguments) >= 2) {
            $sl = $this->arguments[2] ?? 'en';
            $tl = $this->arguments[0];
            $text = $this->arguments[1];
        }

        if (isset($text) && isset($tl)) {
            return render('
            <div>
                <div class="' . $this->style . '">' . $this->translate($text, $sl, $tl)['translatedText'] . '</div>
            </div>
        ');
        }
        throw new Exception('Arguments not found');
    }

    protected function createQueryString($text, $slug = '+')
    {
        return str_replace(" ", $slug, $text);
    }

    public function setStyle(string $style)
    {
        $this->style = $style;
    }
}
