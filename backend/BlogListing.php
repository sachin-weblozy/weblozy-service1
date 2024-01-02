<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class BlogListing extends Component
{
    protected $blogs;
    protected $recent;

    public ?string $category = null;

    public function mount()
    {
        $this->blogs = Blog::query()
            ->latest()
            ->with(
                [
                    'media',
                    'category',
                ]
            )
            ->when(
                isset($this->category) && strlen($this->category) > 0,
                function (Builder $query) {
                    $query->whereHas(
                        'category',
                        function (Builder $q) {
                            $q->where('slug', $this->category);
                        }
                    );
                }
            )
            ->where('published', true)
            ->where('created_at', '<=', Carbon::now())
            ->paginate(10);

        // $this->recent = Blog::query()
        //     ->latest()
        //     ->with('media')
        //     ->where('published', true)
        //     ->where('created_at', '<=', Carbon::now())
        //     ->take(5)
        //     ->get();
    }

    public function render()
    {
        return view('livewire.blog-listing', [
            'blogs' => $this->blogs,
            // 'recent' => $this->recent,
            'category' =>  $this->category,
        ]);
    }
}
