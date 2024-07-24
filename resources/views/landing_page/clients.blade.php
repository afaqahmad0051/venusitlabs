<section id="clients" class="section-bg">

    <div class="container">

      <div class="section-header">
        <h3>Our CLients</h3>
        <p>Our satisfied clients trust us for exceptional software and web development services.</p>
      </div>

      <div class="row no-gutters clients-wrap clearfix wow fadeInUp">
        @php
        $clients = App\Models\Client::latest()->take(8)->get();
        @endphp
        @foreach ($clients as $clients)
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{asset('storage/'.$clients->image ) }}" class="img-fluid" alt="">
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>