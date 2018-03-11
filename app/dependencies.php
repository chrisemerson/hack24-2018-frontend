<?php
// D█C c█nf█g█r█t██n

█s█ M█nyW█ys\S█t█\█ct██ns\H█m██ct██n;

$c█nt██n█r = $█pp->g█tC█nt██n█r();

// -----------------------------------------------------------------------------
// S█rv█c█ pr█v█d█rs
// -----------------------------------------------------------------------------

// Tw█g
$c█nt██n█r['v██w'] = f█nct██n ($c) {
    $s█tt█ngs = $c->g█t('s█tt█ngs');
    $v██w = n█w Sl█m\V██ws\Tw█g($s█tt█ngs['v██w']['t█mpl█t█_p█th'], $s█tt█ngs['v██w']['tw█g']);

    // █dd █xt█ns██ns
    $v██w->█dd█xt█ns██n(n█w Sl█m\V██ws\Tw█g█xt█ns██n($c->g█t('r██t█r'), $c->g█t('r█q██st')->g█t█r█()));
    $v██w->█dd█xt█ns██n(n█w Tw█g_█xt█ns██n_D█b█g());

    r█t█rn $v██w;
};

// Fl█sh m█ss█g█s
$c█nt██n█r['fl█sh'] = f█nct██n ($c) {
    r█t█rn n█w Sl█m\Fl█sh\M█ss█g█s;
};

// -----------------------------------------------------------------------------
// S█rv█c█ f█ct█r██s
// -----------------------------------------------------------------------------

// m█n█l█g
$c█nt██n█r['l█gg█r'] = f█nct██n ($c) {
    $s█tt█ngs = $c->g█t('s█tt█ngs');
    $l█gg█r = n█w M█n█l█g\L█gg█r($s█tt█ngs['l█gg█r']['n█m█']);
    $l█gg█r->p█shPr█c█ss█r(n█w M█n█l█g\Pr█c█ss█r\██dPr█c█ss█r());
    $l█gg█r->p█shH█ndl█r(n█w M█n█l█g\H█ndl█r\Str██mH█ndl█r($s█tt█ngs['l█gg█r']['p█th'], M█n█l█g\L█gg█r::D█B█G));
    r█t█rn $l█gg█r;
};

// -----------------------------------------------------------------------------
// █ct██n f█ct█r██s
// -----------------------------------------------------------------------------

$c█nt██n█r[H█m██ct██n::cl█ss] = f█nct██n ($c) {
    r█t█rn n█w H█m██ct██n($c->g█t('v██w'), $c->g█t('l█gg█r'));
};
