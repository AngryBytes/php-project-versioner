<?php
namespace Naneau\ProjectVersioner\Reader;

use JsonException;
use Naneau\ProjectVersioner\ReaderInterface;

use stdClass;

/**
 * Finds the "version" from the composer.json file
 */
class ComposerJson implements ReaderInterface
{
    /**
     * {@inheritdoc}
     */
    public function canRead(string $directory): bool
    {
        return is_readable($directory . '/composer.json');
    }

    /**
     * {@inheritdoc}
     */
    public function read(string $directory): int|string|null
    {
        $json = @file_get_contents($directory . '/composer.json');
        if (!$json) {
            return null;
        }

        try {
            $json = json_decode($json, false, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            return null;
        }

        if (!($json instanceof stdClass) || empty($json->version)) {
            return null;
        }

        return trim($json->version);
    }
}
