<?php

declare(strict_types=1);

namespace App\Http\Dispatcher;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Zoya\Http\Dispatcher\RequestBodyDecoderInterface;

class RequestBodyDecoder implements RequestBodyDecoderInterface
{
    /** @var \Symfony\Component\Serializer\Serializer */
    private Serializer $serializer;

    public function __construct()
    {
        $this->serializer = new Serializer(
            [new ObjectNormalizer()],
            [new JsonEncoder()]
        );
    }

    public function decode(string $content, string $type): object
    {
        return $this->serializer->deserialize($content, $type, 'json');
    }
}
