<?php

namespace Ollieread\Discord\Attributes;

use Ollieread\Discord\Support\Snowflake;
use Sprocketbox\Articulate\Attributes\BaseAttribute;

class SnowflakeAttribute extends BaseAttribute
{
    public function cast($value, array $data = [])
    {
        return $value ? new Snowflake($value) : null;
    }

    public function parse($value, array $data = [])
    {
        return (string) $value;
    }
}