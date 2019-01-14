<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 13/01/2019
 * Time: 21:26
 */

namespace App\Service\Twig;


use Twig\Extension\AbstractExtension;

class AppExtension extends AbstractExtension
{

    public const NB_SUMMARY_CHAR = 70 ;

    public function getFilters()
    {
        return [
            new \Twig_Filter('summary', function($text) {

                # Supprimer les balises HTML
                $string = strip_tags($text);

                # Si mon string est supérieur à 70, je continue
                if(strlen($string) > self::NB_SUMMARY_CHAR) {

                    # Je coupe ma chaine à 70
                    $stringCut = substr($string, 0, self::NB_SUMMARY_CHAR);

                    # Je ne doit pas couper un mot en plein milieu...
                    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';

                }

                return $string;

            },['is_safe' => ['html']])
        ];
    }
}