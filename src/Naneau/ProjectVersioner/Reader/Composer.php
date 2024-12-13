<?php

namespace Naneau\ProjectVersioner\Reader;

use Naneau\ProjectVersioner\ReaderInterface;

/**
 * Composer
 *
 * Finds the version from composer lock file
 */
class Composer implements ReaderInterface
{
    /**
     * {@inheritdoc}
     */
    public function canRead(string $directory): bool
    {
        return is_readable($directory . '/composer.lock');
    }

    /**
     * {@inheritdoc}
     */
    public function read(string $directory): int|string|null
    {
        $contents = file_get_contents($directory . '/composer.lock');
        if (!$contents) {
            return null;
        }

        return substr(
            md5($contents),
            0,
            6
        );
    }
}
