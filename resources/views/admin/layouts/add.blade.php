<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="index.html" class="site_title"><i class="fa fa-car"></i> <span>Rent Car Admin</span></a>
					</div>

				<div class="clearfix"></div>

        @include('admin.includes.profilemenue')

				<br />

				@include('admin.includes.sidebar')

				@include('admin.includes.footerbuttons')
					
				</div>
			</div>

			@include('admin.includes.topnav')

			@yield('content')

			@include('admin.includes.footer')

		</div>
	</div>

	@include('admin.includes.footerjs')

  </body>
</html>
