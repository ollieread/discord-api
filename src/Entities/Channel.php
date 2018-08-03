<?php

namespace Ollieread\Discord\Entities;

use Sprocketbox\Articulate\Entities\Entity;

/**
 * Class Channel
 *
 * @property-read \Ollieread\Discord\Support\Snowflake $id
 * @property-read int                                  $type
 * @property string                                    $name
 * @property string                                    $icon
 * @property \Ollieread\Discord\Support\Snowflake      $applicationId
 *
 * @package Ollieread\Discord\Entities
 */
class Channel extends Entity
{

}