<?php

include 'Command.php';

$file = new File("text.md", "content text");
$invoker1 = new Invoker(new FilePrinterCommand($file));
$invoker1->handle();
$invoker2 = new Invoker(new FileCreatorCommand($file));
$invoker2->handle();