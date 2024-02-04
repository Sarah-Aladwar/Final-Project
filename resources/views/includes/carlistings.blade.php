<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Car Listings</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
          </div>
        </div>

        <div class="row">
        @foreach($car as $c)
      
          <div class="col-md-6 col-lg-4 mb-4">

            <div class="listing d-block  align-items-stretch">
              <div class="listing-img h-100 mr-4">
                <img src="{{ asset('assets/images/'.$c->image) }}" alt="Image" class="img-fluid">
              </div>
              <div class="listing-contents h-100">
                <h3>{{ $c->title}}</h3>
                <div class="rent-price">
                  <strong>${{ $c->price}}</strong><span class="mx-1">/</span>day
                </div>
                <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                  <div class="listing-feature pr-4">
                    <span class="caption">Luggage:</span>
                    <span class="number">{{ $c->luggage}}</span>
                  </div>
                  <div class="listing-feature pr-4">
                    <span class="caption">Doors:</span>
                    <span class="number">{{ $c->doors}}</span>
                  </div>
                  <div class="listing-feature pr-4">
                    <span class="caption">Passenger:</span>
                    <span class="number">{{ $c->passengers}}</span>
                  </div>
                </div>
                <div>
                  <p>{{ \Illuminate\Support\Str::limit($c->content, 100, '...') }}</p>
                  <p><a href="single/{{ $c->id }}" class="btn btn-primary btn-sm">Rent Now</a></p>
                </div>
              </div>
            </div>
          </div>
         @endforeach
        </div>

      @if(isset($includePagination) && $includePagination)
        <div class="row">
            <div class="col-12">
                <div class="custom-pagination">
                    @if($car->currentPage() > 1)
                      <a href="{{ $car->previousPageUrl() }}">&laquo;</a>
                    @endif

                    @for($i = max(1, $car->currentPage() - 2); $i <= min($car->currentPage() + 2, $car->lastPage()); $i++)
                      <a style="{{ ($i == $car->currentPage()) ? 'background-color: #f8f9fa; color: #343a40;' : 'color: white;' }}" href="{{ $car->url($i) }}">{{ $i }}</a>
                    @endfor

                    @if($car->currentPage() < $car->lastPage())
                      <a href="{{ $car->nextPageUrl() }}">&raquo;</a>
                    @endif
                </div>

            </div>
        </div>
      @endif

      </div>
</div>