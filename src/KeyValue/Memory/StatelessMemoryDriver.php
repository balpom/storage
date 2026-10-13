<?php

declare(strict_types=1);

namespace Balpom\Storage\KeyValue\Memory;

class StatelessMemoryDriver extends AbstractMemoryDriver
{
    private array $values = [];

    public function all(bool $keyValue = false): array|false
    {
        $result = [];
        foreach ($this->values as $key => $value) {
            if ($keyValue) {
                $result[$key] = $value['value'];
            } else {
                $result[] = $key;
            }
        }

        return $result;
    }

    public function value(string $key): string|false
    {
        return $this->exists($key) ? $this->values[$key]['value'] : false;
    }

    public function store(string $key, string $value): bool
    {
        $this->values[$key]['time'] = time();
        $this->values[$key]['value'] = $value;

        return true;
    }

    public function exists(string $key): bool
    {
        return isset($this->values[$key]);
    }

    public function delete(string $key): bool
    {
        if ($this->exists($key)) {
            unset($this->values[$key]);
            return true;
        }

        return false;
    }

    public function time(string $key, int|null $time = null): int|bool
    {
        if (null === $time) {
            return $this->exists($key) ? $this->values[$key]['time'] : false;
        }
        $this->values[$key]['time'] = $time;

        return true;
    }

    public function clear(): bool
    {
        $this->values = [];
        return true;
    }

}