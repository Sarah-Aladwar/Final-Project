<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="{{ asset('admin/images/'.auth()->user()->image) }}" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2>{{ auth()->user()->fullname }}</h2>
						</div>
					</div>
<!-- /menu profile quick info -->