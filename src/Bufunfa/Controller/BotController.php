<?php

namespace Bufunfa\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use unreal4u\TelegramAPI\Telegram\Methods\SendMessage;
use unreal4u\TelegramAPI\Telegram\Types\Update;

/**
 * @author Davi Marcondes Moreira (@devdrops) <davi.marcondes.moreira@gmail.com>
 */
class BotController
{
    public function webhookAction(Request $request, Application $app)
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
}
