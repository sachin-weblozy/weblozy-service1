@component('layouts.frontend', [
    'title' => $blog->meta_title ?? $blog->title ?? '',
    'bodyClass' => 'blog-page single-blog-page service-details-page',
    'meta_desc' => $blog->meta_desc ?? '',
    'page' => [
        'head_scripts' => $blog->head_scripts
    ],
    'breadcrumbSchema' => Breadcrumbs::view('breadcrumbs::json-ld', 'blog.single', $blog)
])
<section class="section section-hero">
    {{-- @isset($blog->featured_img)
    <img src="{{ Storage::disk('uploads')->url($blog->featured_img) }}" alt="">
    @endisset --}}

    <div class="content">
        <div class="container text-center">
            {{-- <h1 class="fw-bold hero-title">{{ $blog->title }}</h1> --}}

            {{ Breadcrumbs::render('blog.single', $blog) }}

            {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ Helper::get_permalink(20) }}">Blogs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ Helper::get_permalink(20) }}">Blogs</a>
                        {{ $blog->title }}
                    </li>
                </ol>
            </nav> --}}
        </div>
    </div>
</section>

<div class="section section-blog-single">
    <div class="container">
        <div class="blog-container">
            @isset($blog->toc[0])
            <aside class="blog-sidebar toc-sidebar">
                <x-frontend.blog.toc :blog="$blog" />
            </aside>
            @endisset

            <div class="blog-main">
                {{-- <div class="blog-details">

                </div> --}}

                @if (auth()->check() && auth()->user()->email == 'admin@weblozy.com' && now() < $blog->created_at)
                    <div class="badge bg-primary">Scheduled for {{ $blog->created_at->format('M d, Y h:i a') }}</div>
                @endif

                <div class="mt-3 blog-content">
                    @isset($blog->category->name)
                    <div class="text-center bcard__cat">
                        {{ $blog->category->name }}
                    </div>
                    @endisset

                    <div class="bcard__meta--wrap">
                        <div class="bcard__meta">
                            <div class="bcard__meta--icon">
                                <x-icon.calendar-time />
                            </div>
                            <div class="bcard__meta--text">{{ $blog->created_at->format('M d, Y') }}</div>
                        </div>
                        <div class="bcard__meta">
                            <div class="bcard__meta--icon">
                                <x-icon.clock />
                            </div>
                            <div class="bcard__meta--text">{{ $blog->readDuration }}</div>
                        </div>
                    </div>

                    <h1 class="text-center title fw-bold">{{ $blog->title }}</h1>

                    <div class="bcard__meta--wrap">
                        <a class="bcard__meta text-decoration-underline" data-bs-toggle="modal" data-bs-target="#shareModal" href="#">
                            <div class="bcard__meta--icon">
                                <x-icon.share />
                            </div>
                            <div class="bcard__meta--text">Share</div>
                        </a>
                    </div>

                    <div class="text-center blog-thumb">
                        @isset($blog->media[0])
                        <x-attachment :media="$blog->media[0]" />
                        @else
                        <img src="{{ asset('frontend/assets/images/blog-fallback-img.webp') }}" alt="" class="mx-auto">
                        @endisset
                    </div>

                    @isset($blog->toc[0])
                    <div class="blog-content-toc">
                        <x-frontend.blog.toc :blog="$blog" />
                    </div>
                    @endisset

                    <div class="blog-content-wrapper">
                        {!! $blog->content !!}
                    </div>
                </div>
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
</div>

<section class="footer-cf-section">
    <div class="footer-cf">
        <div class="details w-100">
            {{-- <x-attachment id="90" width="880" height="450" class="img" /> --}}

            <div class="cf-anim"></div>

            {{-- <img src="{{ Helper::frontasset('assets/images/footer-cf-bg.jpg') }}" alt="" width="350" height="450" class="img"> --}}

            <div class="details-wrap">
                <div class="title">
                    Book Free Consultation
                </div>
                <div class="sub">
                    Fill up the form and we will get back to you in 24 hours.
                </div>

                <div class="page-form">
                    <form action="" class="form apiform">
                        <input type="hidden" name="requirement" value="Other">
                        <div class="form-row">
                            <div class="form-col">
                                <label for="name" class="required">Name</label>
                                <input type="text" id="name" name="name" class="form-field" required>
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="form-col">
                                <label for="phone" class="required">Phone</label>
                                <input type="text" id="phone" name="phone" class="form-field" required>
                                <i class="fa-solid fa-phone"></i>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col">
                                <label for="email" class="required">Email</label>
                                <input type="email" id="email" name="email" class="form-field" required>
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col">
                                <label for="msg">Message</label>
                                <textarea id="msg" name="msg" class="form-field"></textarea>
                                <i class="fa-solid fa-message"></i>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <div class="mt-3 text-center">
                                    <button class="btn btn-light">Submit</button>
                                </div>

                                <div class="mt-3 status"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@push('modals')
<!-- Share Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="share-header">
                    <div class="title">
                        Share this article
                    </div>

                    <button type="button" class="close-btn" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>

                <div class="share-content">
                    <ul class="sharer">
                        <li>
                            <a href="https://wa.me?text=Hey check this article by {{ config('app.name') }}. Visit {{ url()->current() }} now." data-action="share/whatsapp/share" target="_blank" rel="noopener noreferrer">
                                <div class="icon">
                                    <x-icon.whatsapp />
                                </div>

                                <div class="text">WhatsApp</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" rel="noopener noreferrer">
                                <div class="icon">
                                    <x-icon.facebook />
                                </div>

                                <div class="text">Facebook</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/share?url={{ url()->current() }}" target="_blank" rel="noopener noreferrer">
                                <div class="icon">
                                    <x-icon.twitter />
                                </div>

                                <div class="text">Twitter</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}" target="_blank" rel="noopener noreferrer">
                                <div class="icon">
                                    <x-icon.linkedin />
                                </div>

                                <div class="text">LinkedIn</div>
                            </a>
                        </li>
                    </ul>

                    <div class="copy-box">
                        <div class="ipt-wrap copythis" data-clipboard-text="{{ url()->current() }}">
                            <input type="text" class="form-control form-control-lg" value="{{ url()->current() }}">

                            <div class="icon">
                                <x-icon.copy />
                            </div>
                        </div>

                        <div class="text-center ipt-msg small"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.1.9/p5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.topology.min.js"></script>
    <script>
        VANTA.TOPOLOGY({
            el: ".cf-anim",
            mouseControls: true,
            touchControls: true,
            gyroControls: true,
            minHeight: 200.00,
            minWidth: 200.00,
            scale: 1.00,
            scaleMobile: 1.00,
            color: 0xe3c2a0,
            backgroundColor: 0x262e45
        });
    </script>
@endpush
@endcomponent
