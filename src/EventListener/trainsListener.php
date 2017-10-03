<?php

namespace trains\EventListener;

use trains\Service\Message\MessageService;

class trainsListener
{
    public function onCarCreate($event)
    {
        $messageController = new MessageService($event);
        $ack = $messageController->carCreateMessage();

    }
}
