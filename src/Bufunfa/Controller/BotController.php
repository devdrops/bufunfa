<?php

namespace Bufunfa\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use unreal4u\TelegramAPI\Telegram\Methods\SendMessage;
use unreal4u\TelegramAPI\Telegram\Types\Update;
use unreal4u\TelegramAPI\Telegram\Methods\SetWebhook;

/**
 * @author Davi Marcondes Moreira (@devdrops) <davi.marcondes.moreira@gmail.com>
 */
class BotController
{
    public function newEntryAction(Request $request, Application $app)
    {
        try {
            $update = new Update(json_decode($request->getContent(), true));

            $message = new SendMessage();
            $message->chat_id = $update->message->chat->id;
            $message->text = 'Time is '.microtime();

            $app['telegram']->performApiRequest($message);

            return new JsonResponse(['status' => 'Ok!']);
        } catch (\Exception $exception) {
            
        }
    }

    public function setWebhookAction(Request $request, Application $app)
    {
        try {
            $webHook = new SetWebhook();
            $webHook->url = $app['telegram.settings']['webhook'];

            $app['telegram']->performApiRequest($webHook);

            return new JsonResponse([
                'status' => 'WebHook URL is now defined! :D'
            ]);
        } catch (\Exception $exception) {

        }
    }
}

