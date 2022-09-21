<?php

namespace App\Views;

class View
{
    protected static string $filename;
    // protected static string $template;
    private array $data;

    public static function getLiFromArray(array $data):string{
        return implode('', array_map(fn($t)=>"<li>".$t."</li>",$data));
    } 

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    // Getters & Setters

    public function getFilename(): string
    {
        return static::$filename;
    }

    public function getData(): array
    {
        return $this->data;
    }
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    // Methods

    public function getContent(): string|false
    {
        // if(empty(static::$template)) static::$template =file_get_contents($this->getFilename());
        return file_get_contents($this->getFilename());
    }

    public function getHTML(): string
    {

        return str_replace(array_map(fn ($s) => "{{" . $s . "}}", array_keys($this->getData())), array_values($this->getData()), $this->getContent());
    }
    public function display(): void
    {

        echo $this->getHTML();
    }
}