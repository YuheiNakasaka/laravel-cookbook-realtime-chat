<?php

namespace Formativ\Chat;

use Evenement\EventEmitterInterface;
use Ratchet\ConnectionInterface;
use Retchet\MessageComponentInterface;

interface ChatInterface extends MessageComponentInterface
{
    public function getUserBySocket(ConnectionIntetrface $socket);
    public function getEmitter();
    public function setEmitter(EventEmitterInterface $emitter);
    public function getUsers();
}