<?php

namespace KacperKaczmarek\Service;

class CsvService implements CsvServiceInterface
{
    private $file;

    public function __construct(string $path, string $fopenMode)
    {
        return $this->file = fopen($path, $fopenMode);
    }

    public function addHeaders(...$headers) :bool
    {
        return fputcsv($this->file, $headers);
    }

    public function addFeed(string $url)
    {
        $feed = $this->fetchFeed($url);
        foreach ($feed->channel->item as $item) {
            $title = $item->title ?: 'Unknown';
            $description = $item->description ?: 'Unknown';
            $link = $item->link ?: 'Unknown';
            $pubDate = $this->dateFormat($item->pubDate) ?: 'Unknown';
            $creator = $item->children('http://purl.org/dc/elements/1.1/') ?: 'Unknown';

            fputcsv($this->file, array($title, $description, $link, $pubDate, $creator));
        }
    }

    public function closeFile() :bool
    {
        return fclose($this->file);
    }

    private function dateFormat(object $date) :string
    {
        return date('Y-m-d H:i:s', strtotime($date));
    }

    private function fetchFeed(string $url) :\SimpleXMLElement
    {
        $feed = @simplexml_load_file($url); // @ as a temporary workaround warnings handling
        if ($feed === false) {
            die("Wrong structure or URL given! \n");
        } else {
            return $feed;
        }
    }
}