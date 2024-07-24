<section id="team">
  <div class="container">
    <div class="section-header">
      <h3>Team</h3>
      <p>Our expert team delivers exceptional software and web development services.</p>
    </div>

    <div class="row">
      @php
      $team= App\Models\Team::latest()->get();
      @endphp

      @foreach ($team as $member)
      <div class="col-lg-3 col-md-6 wow fadeInUp">
        <div class="member w-75 h-100">
          <img src="{{asset('storage/'.$member->image ) }}" class="img-fluid" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <h4>{{ $member->name }}</h4>
              <span>{{ $member->designation }}</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="member">
          <img src="{{asset('frontend/assets/img/team-1.jpg')}}" class="img-fluid" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <h4>Walter White</h4>
              <span>Chief Executive Officer</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
      @endforeach



    </div>

  </div>
</section>