<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserNameBadge extends Component
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('components.user-name-badge');
    }
}
