<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Cars</h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Trashed Cars</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Title</th>
                  {{--    <th>Date Posted</th>
                          <th>Content</th>
                          <th>Luggage</th>
                          <th>Doors</th>
                          <th>Passengers</th>  --}}
                          <th>Price</th>
                          <th>Category</th>
                          <th>Active</th>            
                          <th>Restore</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($car as $c)
                        <tr>
                          <td>{{ $c->title }}</td>
                  {{--    <td>{{ \Carbon\Carbon::parse($c->date_posted)->format('M d, Y') }}</td>
                          <td>{{ \Illuminate\Support\Str::limit($c->content, 50, '...') }}</td>
                          <td>{{ $c->luggage }}</td>
                          <td>{{ $c->doors }}</td>
                          <td>{{ $c->passengers }}</td>  --}}
                          <td>{{ $c->price }}</td>
                          <td>{{ $c->category->category_name }}</td>
                          <td>{{$c->published ? 'Yes' : 'No'}}</td>
                          <td><a href="restorecar/{{ $c->id }}"><img src="{{ asset('admin/images/restore.png') }}" alt="Restore" width="50" height="50"></a></td>
                          <td><a href="fdcar/{{ $c->id }}" onclick="return confirm('Are you sure you want to delete?')"><img src="{{ asset('admin/images/delete.png') }}" alt="Delete"></a></td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- /page content -->