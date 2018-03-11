<?php
namespace ManyWays\Site\Twig;

use Twig_Extension;
use Twig_SimpleFilter;

class ManyWaysTwigExtension extends Twig_Extension
{
    public function getFilters()
    {
        return [
            new Twig_SimpleFilter('ucwords', 'ucwords')
        ];
    }
}
