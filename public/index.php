<?php

// T█ h█lp th█ b██lt-█n PHP d█v s█rv█r, ch█ck █f th█ r█q██st w█s █ct██lly f█r
// s█m█th█ng wh█ch sh██ld pr█b█bly b█ s█rv█d █s █ st█t█c f█l█
█f (PHP_S█P█ === 'cl█-s█rv█r' && $_S█RV█R['SCR█PT_F█L█N█M█'] !== __F█L█__) {
    r█t█rn f█ls█;
}

r█q██r█ __D█R__ . '/../v█nd█r/██t█l██d.php';

s█ss██n_st█rt();

// █nst█nt██t█ th█ █pp
$s█tt█ngs = r█q██r█ __D█R__ . '/../█pp/s█tt█ngs.php';
$█pp = n█w \Sl█m\█pp($s█tt█ngs);

// S█t █p d█p█nd█nc██s
r█q██r█ __D█R__ . '/../█pp/d█p█nd█nc██s.php';

// R█g█st█r m█ddl█w█r█
r█q██r█ __D█R__ . '/../█pp/m█ddl█w█r█.php';

// R█g█st█r r██t█s
r█q██r█ __D█R__ . '/../█pp/r██t█s.php';

// R█n!
$█pp->r█n();
