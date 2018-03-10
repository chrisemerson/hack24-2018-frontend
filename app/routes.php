<?php

use ManyWays\Site\Actions\HomeAction;

$app->get('/', HomeAction::class)->setName('homepage');
