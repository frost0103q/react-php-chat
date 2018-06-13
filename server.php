<?php

use React\EventLoop\Factory;
use React\Socket\ConnectionInterface;
use React\Socket\Server;
use ReactPhpChat\ConnectionPool;

require_once __DIR__ . '/vendor/autoload.php';

$loop = Factory::create();

$host = getenv('HOSTNAME') ?: '127.0.0.1';
$socket = new Server(gethostbyname($host) . ':8080', $loop);
$pool = new ConnectionPool();

$socket->on('connection', function (ConnectionInterface $connection) use ($pool) {
    // クライアントと接続が確立されたらPoolする
    $pool->add($connection);
});

echo "Listening on {$socket->getAddress()}\n";

$loop->run();
