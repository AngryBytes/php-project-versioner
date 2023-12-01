<?php
namespace Naneau\ProjectVersioner;

/**
 * ReaderInterface
 *
 * Interface for reading
 */
interface ReaderInterface
{
    /**
     * Can a directory be versioned using this reader?
     */
    public function canRead(string $directory): bool;

    /**
     * Read the version from a directory
     */
    public function read(string $directory): int|string|null;
}
