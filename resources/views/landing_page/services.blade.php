<section id="services" class="section-bg">
  <div class="container">

    <header class="section-header">
      <h3>Services</h3>
      <p>We offer top-notch software and web development services tailored to your needs.</p>
    </header>

    <div class="row d-flex justify-content-center">
      @php
      $services = App\Models\Services::latest()->take(6)->get();
      @endphp
      @foreach ($services as $service)
      <div class="card col-md-6 col-lg-5 wow bounceInUp m-3" data-wow-duration="1.4s">
        <div class="card-body w-100 h-100">
          <h4 class="card-title" style="font-size: 1.3rem; font-weight:600"><a href="">{{ $service->title }}</a></h4>
          <p class="card-text">{{ $service->description }}</p>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section>