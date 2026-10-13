<?php

declare(strict_types=1);

namespace Balpom\Storage\KeyValue\Files;

use Balpom\Files\File;
use Balpom\Files\HandlerException;
use Balpom\Files\FileReadException;
use Balpom\Files\FileWriteException;
use Balpom\Files\Directory;

class LocalFilesDriver extends AbstractFilesDriver
{
    public function all(bool $keyValue = false): array|false
    {
        try {
            $directory = new Directory($this->rootDirectory);
            $files = $directory->files();
            $result = [];
            foreach ($files as $file) {
                $path = $file->path();
                $key = $this->naming->keyByPath($path);
                if ($keyValue) {
                    $result[$key] = $this->value($key);
                } else {
                    $result[] = $key;
                }
            }
        } catch (HandlerException $e) {
            return false;
        }

        return $result;
    }

    public function value(string $key): string|false
    {
        $filePath = $this->naming->pathByKey($key);
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
        $filePath = $this->naming->pathByKey($key);
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
        $filePath = $this->naming->pathByKey($key);
        $file = new File($filePath);

        return $file->exists();
    }

    public function delete(string $key): bool
    {
        $filePath = $this->naming->pathByKey($key);
        $file = new File($filePath);

        return $file->delete(true); // TRUE - delete with empty directories.
    }

    public function time(string $key, int|null $time = null): int|bool
    {
        $filePath = $this->naming->pathByKey($key);
        $file = new File($filePath);

        if (null === $time) {
            return $file->getTime();
        }

        return $file->setTime($time);
    }

    public function clear(): bool
    {
        $directory = new Directory($this->rootDirectory);
        return $directory->delete(true);
    }

}