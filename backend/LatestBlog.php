<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class LatestBlog extends Component
{
    protected $blogs;
    protected $recent;

    public ?string $category = null;

    public function mount()
    {
        $this->blogs = Blog::latest()->take(4)->get();
    }

    public function render()
    {
        return view('livewire.latest-blog', [
            'blogs' => $this->blogs,
            // 'recent' => $this->recent,
            // 'category' =>  $this->category,
        ]);
    }
}
