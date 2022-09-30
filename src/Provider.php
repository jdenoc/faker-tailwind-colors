<?php

namespace Jdenoc\Faker\TailwindColors;

use Faker\Provider\Base as FakerProviderBase;
use Jdenoc\TailwindColors\TailwindColors;

class Provider extends FakerProviderBase {

    private static $colorStrengths = [50, 100, 200, 300, 400, 500, 600, 700, 800, 900];
    private static $colorsWithoutStrength = ['black', 'white'];

    public static function tailwindColorName(){
        $tailwind = new TailwindColors();
        return self::randomElement($tailwind->getColorNames());
    }

    public static function tailwindColorHex(){
        $tailwind = new TailwindColors();
        $colorName = self::randomElement($tailwind->getColorNames());

        if(in_array($colorName, self::$colorsWithoutStrength)){
            $colorStrength = 0;
        } else {
            $colorStrength = self::randomElement(self::$colorStrengths);
        }

        return $tailwind->getColor($colorName, $colorStrength);
    }

}