<?php

namespace Sdk\ViaCep\Serializer;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class EnumNormalizer extends ObjectNormalizer
{
    public function normalize($object, ?string $format = null, array $context = [])
    {
        if (str_ends_with(get_class($object), "Enum")) {
            return $object->getValue();
        }

        return parent::normalize($object, $format, $context);
    }

    public function denormalize($data, string $type, ?string $format = null, array $context = [])
    {
        return new $type($data);
    }

    public function supportsDenormalization($data, $type, $format = null)
    {
        return str_ends_with($type, "Enum");
    }
}
