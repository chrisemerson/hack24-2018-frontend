<?php

use ManyWays\Site\Actions\HomeAction;
use ManyWays\Site\Actions\RouteAction;

$app->get('/', HomeAction::class)->setName('homepage');
$app->get('/route', RouteAction::class)->setName('homepage');
