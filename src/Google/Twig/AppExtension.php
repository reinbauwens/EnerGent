<?php
// src/google/Twig/sheet.php
namespace Google\Twig;

use Twig_Extention;
use Twig_Filter_Method;

class AppExtension extends Twig_Extension
{
    public function getFunctions()
    {
        return array(
		'price' => new Twig_SimpleFunction($this,'pricefunction'),
        );
    }

    public function pricefunction()
    {
        return 'hello';
    }
}
?>
