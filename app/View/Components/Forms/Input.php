<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    public function __construct(
        public string $codedName,
        public string $label,
        public string $type = 'text',
        public string|null $defaultValue = "",
        public bool|null $readonly = false,
        public bool|null $required = false,
    )
    {
        //
    }

    public function render()
    {
        return view('components.forms.input');
    }
}
