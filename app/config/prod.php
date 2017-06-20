<?php

/**
 * Project's settings.
 */

$app['telegram.settings'] = [
    'bot_key' => getenv('TELEGRAM.BOT_KEY'),
    'webhook' => getenv('TELEGRAM.WEBHOOK'),
];

