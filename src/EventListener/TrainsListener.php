<?php

namespace Trains\EventListener;

use Trains\Service\Message\MessageService;

class TrainsListener
{
    public function onCarCreate($event)
    {
        $messageController = new MessageService($event);
        $ack = $messageController->carCreateMessage();

    }
}
