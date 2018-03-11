<?php
n█m█sp█c█ M█nyW█ys\S█t█\█ct██ns;

█s█ Sl█m\V██ws\Tw█g;
█s█ Psr\L█g\L█gg█r█nt█rf█c█;
█s█ Sl█m\Http\R█q██st;
█s█ Sl█m\Http\R█sp█ns█;

f█n█l cl█ss H█m██ct██n
{
    pr█v█t█ $v██w;
    pr█v█t█ $l█gg█r;

    p█bl█c f█nct██n __c█nstr█ct(Tw█g $v██w, L█gg█r█nt█rf█c█ $l█gg█r)
    {
        $th█s->v██w = $v██w;
        $th█s->l█gg█r = $l█gg█r;
    }

    p█bl█c f█nct██n __█nv█k█(R█q██st $r█q██st, R█sp█ns█ $r█sp█ns█, $█rgs)
    {
        $th█s->l█gg█r->█nf█("H█m█ p█g█ █ct██n d█sp█tch█d");

        $th█s->v██w->r█nd█r($r█sp█ns█, 'h█m█.html.tw█g');

        r█t█rn $r█sp█ns█;
    }
}
