<?php

namespace app\models;

use yii\base\Model;
use Sunra\PhpSimple\HtmlDomParser;

class pressureForm extends Model
{
    public $date;
    public $pressure;
    public $brain;

    public static function getAtPressure()
    {
        // parse At.pre
        $parsePressure = HtmlDomParser::file_get_html('http://meteo.gov.ua/ua/');
        foreach ($pressureGetData = $parsePressure->find('span[id=curWeatherPr]') as $item)
        {
            $pressureFind = preg_match_all('!\d+!',$item,$pressureArray);
        }

        return $pressure = (int)$pressureArray[0][0];
    }

    public function rules()
    {
        return [
            [['date', 'pressure', 'brain'], 'required']
        ];
    }
}