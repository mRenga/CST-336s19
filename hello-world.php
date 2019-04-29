<?php

require __DIR__ . '/vendor/autoload.php';

$log = new Monolog\Logger('testing-monolog');
$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));
$log->addWarning('Foo');

echo 'Hello world from Cloud9!';

?>
