<?php

namespace Ollieread\Discord\Components;

use Ollieread\Discord\Support\PermissionParser;
use Sprocketbox\Articulate\Components\Component;

class Permissions extends Component
{
    /**
     * @var array
     */
    protected $permissions = [];

    public function has(string $permission)
    {
        return array_key_exists(strtoupper($permission), $this->permissions);
    }

    public function add(string $permission)
    {
        if (! PermissionParser::exists($permission)) {
            throw new \InvalidArgumentException(sprintf('Invalid permission %s', $permission));
        }

        $this->permissions[$permission] = true;
        return $this;
    }

    public function remove(string $permission)
    {
        if (! PermissionParser::exists($permission)) {
            throw new \InvalidArgumentException(sprintf('Invalid permission %s', $permission));
        }

        $this->permissions[$permission] = false;
        return $this;
    }

    public function permissions(): array
    {
        return $this->permissions;
    }

    public function getPermissions(): int
    {
        return PermissionParser::toInt($this->permissions());
    }

    public function setPermissions(int $permissions)
    {
        $this->permissions = PermissionParser::toArray($permissions);
        parent::setAttribute('permissions', $permissions);
    }
}