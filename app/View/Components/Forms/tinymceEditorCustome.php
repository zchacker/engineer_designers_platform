<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tinymceEditorCustome extends Component
{
    public $body;
    public $name;

    /**
     * Create a new component instance.
     */
    public function __construct($body = null, $name = null)
    {
        //
        $this->body = $body;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.tinymce-editor-custome');
    }
}
