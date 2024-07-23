<section id="why-us" class="wow fadeIn">
  <div class="container">
    <header class="section-header">
      <h3>Why choose us?</h3>
      <p>Discover unparalleled expertise and innovative solutions tailored to drive your business success. Partner with
        us for a
        client-centric approach that transforms challenges into opportunities.</p>
    </header>

    <div class="row row-eq-height justify-content-center">

      @php
      $whyUs= App\Models\WhyUs::latest()->get();
      @endphp
      @foreach ($whyUs as $card)
      <div class="col-lg-4 mb-4">
        <div class="card wow bounceInUp">
          <i class="fa fa-check-circle"></i>
          <div class="card-body">
            <h5 class="card-title">{{ $card->title }}</h5>
            <p class="card-text">{{ $card->description }}</p>
          </div>
        </div>
      </div>
      @endforeach


    </div>

    <div class="row counters">

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">274</span>
        <p>Clients</p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">421</span>
        <p>Projects</p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">1,364</span>
        <p>Hours Of Support</p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">18</span>
        <p>Hard Workers</p>
      </div>

    </div>

  </div>
</section>