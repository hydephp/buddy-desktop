<?php

namespace App\Core\Navigation;

class NavigationItem
{
    public string $label;
    public string $route;
    public ?string $icon = null;

    public function __construct(string $label, string $route, ?string $icon = null)
    {
        $this->label = $label;
        $this->route = $route;
        $this->icon = $icon;
    }
}
