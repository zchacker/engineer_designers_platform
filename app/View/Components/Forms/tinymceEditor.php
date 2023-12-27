<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tinymceEditor extends Component
{

    public $body;

    /**
     * Create a new component instance.
     */
    public function __construct($body)
    {
        $this->body = $body;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.tinymce-editor');
    }
}
