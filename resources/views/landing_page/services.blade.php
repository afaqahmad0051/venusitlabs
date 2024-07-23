<section id="services" class="section-bg">
  <div class="container">

    <header class="section-header">
      <h3>Services</h3>
      <p>We offer top-notch software and web development services tailored to your needs.</p>
    </header>

    <div class="row">
      @php
      $services = App\Models\Services::latest()->take(6)->get();
      @endphp
      @foreach ($services as $service)
      <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp mt-2 mb-2" data-wow-duration="1.4s">
        <div class="box h-100">
          <h4 class="title"><a href="">{{ $service->title }}</a></h4>
          <p class="description">{{ $service->description }}</p>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section>