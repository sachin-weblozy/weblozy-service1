<section class="d-none d-sm-block">
    <div class="row">
        @forelse($blogs as $blog)
        <div class="col-md-3 p-0 overflow-hidden">
            <a href="#">
               <div class="fsec">
                  <div class="fsec_img">
                     <img src="{{ Storage::disk('uploads')->url($blog->featured_img) }}" alt="">
                  </div>
                  <div class="fsec_heading1">
                     <span class="badge bg-success">Blog</span>
                     <h3 class="">{{ $blog->title ?? '' }}</h3>
                  </div>
                  <div class="fsec_content">
                     <span class="badge bg-success">Blog</span>
                     <h3 class="">{{ $blog->title ?? '' }}</h3>
                     <p>{{ $blog->excerpt ?? '' }}</p>
                  </div>
               </div>
            </a>
        </div>
        @empty 
        <div class="col-md-12">
         <p>No blog found!</p>
        </div>
        @endforelse
    </div>
 </section>
 <section class="d-block d-sm-none articleslider">
    <div id="carouselExampleCaptions" class="carousel slide">
       <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
       </div>
       <div class="carousel-inner">
         @php $i=1; @endphp
         @forelse($blogs as $blog)
         <a href="#">
          <div class="carousel-item @if($i==1) active @endif">
             <img src="{{ Storage::disk('uploads')->url($blog->featured_img) }}" class="d-block w-100" alt="...">
             <div class="carousel-caption">
                <span class="badge bg-success">Blog</span>
                <h3 class="">{{ $blog->title ?? '' }}</h3>
                <p>{{ $blog->excerpt ?? '' }}</p>
             </div>
          </div>
         </a>
         @php $i++; @endphp
         @empty 
            <div class="col-md-12">
               <p>No blog found!</p>
            </div>
         @endforelse
       </div>
       <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="visually-hidden">Previous</span>
       </button>
       <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="visually-hidden">Next</span>
       </button>
    </div>
 </section>