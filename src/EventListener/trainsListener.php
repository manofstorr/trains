<?php

namespace trains\EventListener;

use trains\Controller\Message\MessageController;

class trainsListener
{
    public function onCarCreate($event)
    {
        $messageController = new MessageController($event);
        $ack = $messageController->carCreateMessageAction();

    }
}
