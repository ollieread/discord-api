<?php

namespace Ollieread\Discord\Attributes;

use Ollieread\Discord\Support\Snowflake;
use Sprocketbox\Articulate\Attributes\BaseAttribute;

class SnowflakeAttribute extends BaseAttribute
{
    public function cast($value)
    {
        return $value ? new Snowflake($value) : null;
    }

    public function parse($value)
    {
        return (string) $value;
    }
}