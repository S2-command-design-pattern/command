<?php

interface Command
{
    public function execute(): void;
}

class FileCreatorCommand implements Command
{

    private $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function execute(): void
    {
        $this->file->creator();
    }
}

class FilePrinterCommand implements Command
{

    private $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function execute(): void
    {
        $this->file->printer();
    }
}

class File
{
    private $filename;

    private $content;

    public function __construct($filename, $content){
        $this->filename = $filename;
        $this->content = $content;
    }

    public function printer(){
        echo $this->filename;
        echo "</br>";
        echo $this->content;
    }

    public function creator(){
        file_put_contents($this->filename, $this->content);
    }
}

class Invoker
{
    private $command;

    public function __construct(Command $command)
    {
        $this->command = $command;
    }

    public function handle()
    {
        return $this->command->execute();
    }
}