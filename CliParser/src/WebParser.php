<?php

namespace CliParser;

use Symfony\Component\DomCrawler\Crawler;
use CliParser\IParser;

class WebParser implements IParser
{
    public function parseExternalLinks(string $url) : string
    {
        $html = file_get_contents($url);
        $crawler = new Crawler($html);
        $array = [];
        $crawler->filter('a, img, script, link')->each(function($node) use(&$array) {
            if(! empty($node->attr('href'))) {
                $array[$node->nodeName()][] = $node->attr('href');
            } elseif($node->attr('src')) {
                $array[$node->nodeName()][] = $node->attr('src');
            }
        });

        return json_encode($array);
    }
}