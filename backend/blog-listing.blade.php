<section class="section section-blog-listing">
    <div class="container">
        <div class="blog-container">
            <div class="blog-main">
                <div class="mx-auto row g-4 w-100">
                    @forelse ($blogs as $blog)
                    <div @class([
                        'col-sm-12 blog-latest' => $loop->first,
                        'col-sm-12 col-md-6 col-xl-4' => !$loop->first
                    ])>
                        <x-frontend.blog.bcard :blog="$blog" />
                    </div>
                    @empty
                    <div class="col-12">
                        <h3 class="text-center">
                            No articles found.
                        </h3>
                    </div>
                    @endforelse
                </div>

                @if ($blogs->hasPages())
                <div @class([
                    'mt-5',
                    'pagination-wrapper center',
                ])>
                    <nav>
                        {{ $blogs->withQueryString()->links('pagination::weblozy') }}
                    </nav>
                </div>
                @endif
            </div>

            {{-- <aside class="blog-sidebar">

                @isset($recent)
                <div class="blog__widget">
                    <div class="widget-title">Recent Posts</div>

                    <div class="content">
                        @forelse ($recent as $item)
                        <a class="fbcard" href="{{ route('blog.single', $item->slug) }}">
                            <div class="fbcard__img">
                                @isset($item->media[0])
                                <x-attachment :media="$item->media[0]" width="80" height="80" />
                                @else
                                <img src="{{ asset('frontend/assets/images/blog-fallback-img-sm.webp') }}" alt="" width="80" height="80">
                                @endisset
                            </div>
                            <div class="fbcard__content">
                                <div class="title">{{ $item->title }}</div>
                                <div class="details">{{ $item->created_at->format('M d, Y') }}</div>
                            </div>
                        </a>
                        @empty
                        No recent posts found.
                        @endforelse
                    </div>
                </div>
                @endisset

            </aside> --}}
        </div>
    </div>
</section>
