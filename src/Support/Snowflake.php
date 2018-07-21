<?php

namespace Ollieread\Discord\Support;

class Snowflake
{
    protected $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function timestamp(): int
    {
        return ($this->id >> 22) + 1420070400000;
    }

    public function workerId(): int
    {
        return ($this->id & 0x3E0000) >> 17;
    }

    public function processId(): int
    {
        return ($this->id & 0x1F000) >> 12;
    }

    public function increment(): int
    {
        return $this->id & 0xFFF;
    }

    public function __toString()
    {
        return $this->id;
    }
}