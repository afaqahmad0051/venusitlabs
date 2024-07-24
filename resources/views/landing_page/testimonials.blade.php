<section id="testimonials" class="section-bg">
  <div class="container">

    <header class="section-header">
      <h3>Testimonials</h3>
    </header>

    <div class="row justify-content-center">
      <div class="col-lg-8">

        <div class="owl-carousel testimonials-carousel wow fadeInUp">

          @php
          $testimonial= App\Models\Testimonials::latest()->get();
          @endphp

          @foreach ( $testimonial as $testimonial)
          <div class="testimonial-item">
            <img src="{{asset('storage/'.$testimonial->image) }}" class="testimonial-img" alt="">
            <h3>{{ $testimonial->name }}</h3>
            <h4>{{ $testimonial->qualification }}</h4>
            <p>
              {{ $testimonial->client_review }}
            </p>
          </div>
          @endforeach


        </div>

      </div>
    </div>


  </div>
</section>