<?php

namespace Ollieread\Discord\Entities;

use Sprocketbox\Articulate\Entities\Entity;

/**
 * Class Role
 *
 * @property-read \Ollieread\Discord\Support\Snowflake $id
 * @property string                                    $name
 * @property int                                       $color
 * @property boolean                                   $hoist
 * @property int                                       $position
 * @property \Ollieread\Discord\Components\Permissions $permissions
 * @property boolean                                   $managed
 * @property boolean                                   $mentionable
 *
 * @package Ollieread\Discord\Entities
 */
class Role extends Entity
{

}