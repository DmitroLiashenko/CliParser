<?php

namespace CliParser;

interface IParser
{
    public function parseExternalLinks(string $url) : string;
}