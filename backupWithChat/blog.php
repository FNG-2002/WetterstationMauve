<?php

$ausgabe = '<font face="Arial, Helvetica, sans-serif"></font>';

$handler = fOpen('123', 'a+');
fWrite($handler, $ausgabe);
fClose($handler);


?>
