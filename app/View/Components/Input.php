<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $label,
        public ?string $value = null,
        public ?string $id = null,
        public string $type = 'text',
        public string $help = '',
        public ?string $class = null,
        public ?string $placeholder = null
    ) {
        $this->id ??= $this->name;
       // $this->id = $this->id ??  $this->name;
    }

    /** check if the file is an image or not
     * Summary of isImage
     * @return bool
     */
    public function isImage(): bool
    {
        return str_starts_with(Storage::mimeType($this->value), 'image/');

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
