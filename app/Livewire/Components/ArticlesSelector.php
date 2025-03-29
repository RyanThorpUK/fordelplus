<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ArticlesSelector extends Component
{
    public $title;
    public $articles;

    public function mount($title = null, $articles = [])
    {
        $this->title = $title;
        $this->articles = [
            (object) [
                'title' => '20% tilbud på alt vinter tøj i vores butikker i odder',
                'image' => 'https://placehold.co/600x400',
                'logo' => 'https://placehold.co/140x60',
                'tag' => 'Footfolk',
                'link' => 'https://www.google.com',
                'link_text' => 'Se tilbud',
            ],
            (object) [
                'title' => '20% tilbud på alt vinter tøj i vores butikker i odder',
                'image' => 'https://placehold.co/600x400',
                'logo' => 'https://placehold.co/140x60',
                'tag' => 'Footfolk',
                'link' => 'https://www.google.com',
                'link_text' => 'Se tilbud',
            ],
            (object) [
                'title' => '20% tilbud på alt vinter tøj i vores butikker i odder',
                'image' => 'https://placehold.co/600x400',
                'logo' => 'https://placehold.co/140x60',
                'tag' => 'Footfolk',
                'link' => 'https://www.google.com',
                'link_text' => 'Se tilbud',
            ],
            (object) [
                'title' => '20% tilbud på alt vinter tøj i vores butikker i odder',
                'image' => 'https://placehold.co/600x400',
                'logo' => 'https://placehold.co/140x60',
                'tag' => 'Footfolk',
                'link' => 'https://www.google.com',
                'link_text' => 'Se tilbud',
            ],
            (object) [
                'title' => '20% tilbud på alt vinter tøj i vores butikker i odder',
                'image' => 'https://placehold.co/600x400',
                'logo' => 'https://placehold.co/140x60',
                'tag' => 'Footfolk',
                'link' => 'https://www.google.com',
                'link_text' => 'Se tilbud',
            ],
            (object) [
                'title' => '20% tilbud på alt vinter tøj i vores butikker i odder',
                'image' => 'https://placehold.co/600x400',
                'logo' => 'https://placehold.co/140x60',
                'tag' => 'Footfolk',
                'link' => 'https://www.google.com',
                'link_text' => 'Se tilbud',
            ],
            (object) [
                'title' => '20% tilbud på alt vinter tøj i vores butikker i odder',
                'image' => 'https://placehold.co/600x400',
                'logo' => 'https://placehold.co/140x60',
                'tag' => 'Footfolk',
                'link' => 'https://www.google.com',
                'link_text' => 'Se tilbud',
            ],
            (object) [
                'title' => '20% tilbud på alt vinter tøj i vores butikker i odder',
                'image' => 'https://placehold.co/600x400',
                'logo' => 'https://placehold.co/140x60',
                'tag' => 'Footfolk',
                'link' => 'https://www.google.com',
                'link_text' => 'Se tilbud',
            ], 
        ];
    }

    
    public function render()
    {
        return view('livewire.components.articles-selector');
    }
}
