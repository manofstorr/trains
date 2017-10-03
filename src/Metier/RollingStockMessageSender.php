<?php

namespace trains\Metier;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;


class RollingStockMessageSender
{

    public function standardMessage ()
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->queue_declare('hello', false, false, false, false);
        $msg = new AMQPMessage('This is a standard message sent by trains/rollingstock');
        $channel->basic_publish($msg, '', 'hello');
        $channel->close();
        $connection->close();
    }
}