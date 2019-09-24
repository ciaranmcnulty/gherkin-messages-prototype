<?php
declare(strict_types=1);

namespace Cjm\Gherkin;

use Cjm\Varint\Stream\Decoder;
use Io\Cucumber\Messages\Envelope;
use Io\Cucumber\Messages\Pickle;

final class ProtobufPickleSource
{
    /**
     * @var Decoder
     */
    private $decoder;

    public function __construct(Decoder $decoder)
    {
        $this->decoder = $decoder;
    }

    /**
     * @return Pickle[]
     */
    public function pickles() : iterable
    {
        foreach ($this->decoder->strings() as $string) {
            $envelope = new Envelope();
            $envelope->mergeFromString($string);

            if ($pickle = $envelope->getPickle()) {
                yield $pickle;
            }
        }
    }
}
