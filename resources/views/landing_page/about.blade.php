<section id="about">
  <div class="container">

    <header class="section-header">
      @php
      $about = App\Models\AboutUs::first();
      @endphp
      <h3>About Us</h3>
    </header>
    <div class="row about-extra">
      <div class="col-lg-6 wow fadeInUp order-1 order-lg-2">
        <img src="{{asset('frontend/assets/img/about-extra-2.svg')}}" class="img-fluid" alt="">
      </div>

      <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1">
        <h4>{{ isset($about)?$about->title:'' }}</h4>
        <p>
          {{ isset($about)?$about->description: '' }}
        </p>
      </div>

    </div>

  </div>
</section>