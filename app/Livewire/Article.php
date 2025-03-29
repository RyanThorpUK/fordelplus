<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Article extends Component
{
    public $article;

    public function mount($article)
    {
        // $this->article = $article;
        $this->article = (object) [
            'title' => '20% tilbud på alt vinter tøj i vores butikker i odder',
            'image' => 'https://placehold.co/600x400',
            'logo' => 'https://placehold.co/140x60',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'link' => 'https://www.google.com',
            'end_date' => now()->addDays(10),
        ];
    }

    #[Layout('components.layouts.guest')] 
    public function render()
    {
        return view('livewire.article');
    }
}
