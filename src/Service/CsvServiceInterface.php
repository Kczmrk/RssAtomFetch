<?php

namespace KacperKaczmarek\Service;

interface CsvServiceInterface
{
    public function __construct(string $path, string $fopenMode);
    public function addHeaders(...$headers) :bool;
    public function addFeed(string $url);
    public function closeFile() :bool;
}