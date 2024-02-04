<div class="site-section {{ $bgcolor }}">
    <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Testimonials</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
          </div>
        </div>
        <div class="row">
        @foreach($testimony as $t)
          <div class="col-lg-4 mb-4">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"{{ $t->content }}"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="{{ asset('assets/images/'.$t->image) }}" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">{{ $t->name }}</span>
                  <span>{{ $t->position }}</span>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
</div>