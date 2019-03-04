<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$time = date('r');
echo "data: La hora del servidor 1 es: {$time}\n\n";
flush();

?>
