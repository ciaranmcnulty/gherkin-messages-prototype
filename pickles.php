<?php

use Cjm\Gherkin\ProtobufPickleSource;
use Cjm\Varint\Stream\Decoder;

const GHERKIN_CMD = __DIR__ . '/gherkin --no-ast --no-source ';

require_once __DIR__ . '/vendor/autoload.php';

if (count($argv)!=2 || !file_exists($argv[1])) {
    echo <<<USAGE
Usage: 
   php pickles.php <filename.feature>

USAGE;
    exit;
}

$pickleSource = new ProtobufPickleSource(Decoder::fromStream(popen(GHERKIN_CMD . $argv[1], 'r')));

foreach ($pickleSource->pickles() as $pickle) {
    foreach($pickle->getSteps() as $step) {
        echo $step->getText() . "\n";
    }
}
