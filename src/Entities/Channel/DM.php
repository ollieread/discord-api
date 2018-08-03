<?php

namespace Ollieread\Discord\Entities\Channel;

use Ollieread\Discord\Entities\Channel;


/**
 * Class DM
 *
 * @property \Ollieread\Discord\Support\Snowflake $lastMessageId
 * @property array                                $recipients
 * @property \Ollieread\Discord\Support\Snowflake $ownerId
 * @property bool                                 $isGroup
 *
 * @package Ollieread\Discord\Entities\Channel
 */
class DM extends Channel
{
    public function isGroup(): bool
    {
        return ! empty($this->recipients);
    }
}