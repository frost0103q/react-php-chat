<?php

use React\EventLoop\Factory;
use React\Socket\ConnectionInterface;
use React\Socket\Connector;
use React\Stream\ReadableResourceStream;
use React\Stream\WritableResourceStream;

require_once __DIR__ . '/vendor/autoload.php';

$loop = Factory::create();
$connector = new Connector($loop);
$stdin = new ReadableResourceStream(STDIN, $loop);
$stdout = new WritableResourceStream(STDOUT, $loop);

$ip = $argv[1] ? gethostbyname($argv[1]) : '127.0.0.1';
$port = $argv[2] ?? '8888';
$connector
    ->connect("$ip:$port")
    ->then(function (ConnectionInterface $conn) use ($stdin, $stdout) {
        $stdin->pipe($conn)->pipe($stdout);

    }, function (Exception $exception) use ($loop) {

    });
$loop->run();

