<?php

namespace CliParser;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use CliParser\IParser;


class ParserCommand extends Command
{
    protected $parser;

    public function __construct(IParser $parser)
    {
        parent::__construct();
        $this->parser = $parser;
    }

    protected function configure()
    {
        $this->setName('url:parse')
            ->setDescription('Парсинг тегов на сайте')
            ->setHelp('Парсинг тегов на сайте')
            ->addArgument('url', InputArgument::REQUIRED, 'usl сайта для парсинга');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = $input->getArgument('url');
        $output->writeln('<info>Найден сайт с url: ' . $url . '</info>');
        dump($this->parser->parseExternalLinks($url));
    }
}