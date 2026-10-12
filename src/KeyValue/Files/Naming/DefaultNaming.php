<?php

declare(strict_types=1);

namespace Balpom\Storage\KeyValue\Files\Naming;

class DefaultNaming extends AbstractNaming
{
    public function path(string $key): string
    {
        return $this->rootDirectory . $key;
    }

    protected function sanitizeDirectory(string $dir): string
    {
        $dir = str_replace('\\', '/', $dir);
        if ('/' <> substr($dir, -1)) {
            $dir .= '/';
        }

        return $dir;
    }

}