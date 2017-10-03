<?php

namespace trains\Controller\Message;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class MessageController
{
    private $event;

    public function __construct($event)
    {
        $this->event = $event;
    }

    public function carCreateMessageAction() :bool
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->queue_declare('carcreate', false, false, false, false);
        $msgBodyHeader = 'This is a carcreate message sent by trains/rollingstock . ';
        $msgBodyData = serialize($this->event);
        $msgBody = json_encode(['header' => $msgBodyHeader, 'data' => $msgBodyData]);
        $msg = new AMQPMessage($msgBody);
        $channel->basic_publish($msg, '', 'carcreate');
        $channel->close();
        $connection->close();

        return true;
    }
}