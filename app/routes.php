<?php

/**
 * Application's routes.
 */

$app->post('/newentry', 'Bufunfa\Controller\BotController::newEntryAction');
$app->get('/webhook', 'Bufunfa\Controller\BotController::setWebhookAction');

