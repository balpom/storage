<?php

declare(strict_types=1);

namespace Balpom\Storage\KeyValue\Files;

use Balpom\Files\File;
use Balpom\Files\FileReadException;
use Balpom\Files\FileWriteException;

class LocalFilesDriver extends AbstractFilesDriver
{
    public function value(string $key): string|false
    {
        $filePath = $this->naming->path($key);
        $file = new File($filePath);
        try {
            $content = $file->read();
        } catch (FileReadException $e) {
            return false;
        }

        return $content;
    }

    public function store(string $key, string $value): bool
    {
        $filePath = $this->naming->path($key);
        $file = new File($filePath);
        try {
            $result = $file->write($value);
        } catch (FileWriteException $e) {
            return false;
        }

        return $result;
    }

    public function exists(string $key): bool
    {
        $filePath = $this->naming->path($key);
        $file = new File($filePath);

        return $file->exists();
    }

    public function delete(string $key): bool
    {
        $filePath = $this->naming->path($key);
        $file = new File($filePath);

        return $file->delete(true); // TRUE - delete with empty directories.
    }

    public function time(string $key, int|null $time = null): int|bool
    {
        $filePath = $this->naming->path($key);
        $file = new File($filePath);

        if (null === $time) {
            return $file->getTime();
        }

        return $file->setTime($time);
    }

}