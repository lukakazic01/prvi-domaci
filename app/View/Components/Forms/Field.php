<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Field extends Component
{
    public function __construct(
        public string $name,
        public string $errorKey = '',
        public bool $required = false
    ){}

    public function render(): View|Closure|string
    {
        return view('components.forms.field');
    }
}
