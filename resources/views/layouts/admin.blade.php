<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MDS | Admin</title>
    <link rel="icon" type="image/png" href="{{url('images/icon/logo-icon.png')}}"/>

	<!-- Bootstrap core CSS -->

	{{Html::style('admin/css/bootstrap.min.css')}}
	


	{{Html::style('admin/css/normalize.css')}}
	{{Html::style('admin/css/selectize.css')}}
	{{Html::style('admin/css/stylesheet.css')}}
	




	
	{{Html::style('admin/fonts/css/font-awesome.min.css')}}
	{{Html::style('admin/css/animate.min.css')}}

	<!-- Custom styling plus plugins -->
	{{Html::style('admin/css/custom.css')}}
	{{Html::style('admin/css/maps/jquery-jvectormap-2.0.3.css')}}
	{{Html::style('admin/css/icheck/flat/green.css')}}
	{{Html::style('admin/css/floatexamples.css')}}

	{{Html::script('admin/js/jquery.min.js')}}
	{{Html::script('admin/js/nprogress.js')}}

	<!--[if lt IE 9]>
	<script src="../assets/js/ie8-responsive-file-warning.js"></script>
	<![endif]-->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>


<body class="nav-md">

	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">

					<div class="navbar nav_title" style="border: 0;">
						<a href="{{url('/')}}" class="site_title"><i class="fa fa-gears"></i> <span>MDS</span></a>
					</div>
					<div class="clearfix"></div>

					<!-- menu prile quick info -->
					<div class="profile">
						<div class="profile_pic">
							{{Html::image('admin/images/img.jpg',null,['class'=>'img-circle profile_img'])}}
							
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2>{{Auth::user()->name}}</h2>
						</div>
					</div>
					<!-- /menu prile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

						<div class="menu_section">
							<h3>{{Auth::user()->job_title}}</h3>
							<ul class="nav side-menu">
								<li><a  href="{{url('admin/dashboard')}}"><i class="fa fa-home"></i> Dash Board</a>
								</li>

								<li><a href="{{url('admin/doctors')}}"><i class="fa fa-heart"></i> Doctors</a>
								</li>

								<li><a href="{{url('admin/courses')}}"><i class="fa fa-book"></i> Topics</a>
								</li>

								<li><a href="{{url('admin/events')}}"><i class="fa fa-comments-o"></i> Cources</a>
								</li>

								<li><a href="{{url('admin/freeVideos')}}"><i class="fa fa-video-camera"></i> Free Videos</a>
								</li>

								<li><a href="{{url('admin/admins')}}"><i class="fa fa-user"></i> Admins</a>
								</li>

								<li><a href="{{url('admin/all/users')}}"><i class="fa fa-users"></i> Users</a>
								</li>


								<li><a href="{{url('admin/contacts')}}"><i class="fa fa-envelope"></i> Contacts</a>
								</li>
								
								<li><a href="{{url('admin/testimonials')}}"><i class="fa fa-comments"></i> Testimonials</a>
								</li>
								
								<li><a href="{{url('admin/abouts')}}"><i class="fa fa-graduation-cap"></i> About Us</a>
								</li>

								<li><a href="{{url('admin/team')}}"><i class="fa fa-users"></i> Team</a>
								</li>
								
								<li><a href="{{url('admin/sponsors')}}"><i class="fa fa-suitcase"></i> Sponsors</a>
								</li>

								<li><a href="{{url('admin/subscribes')}}"><i class="fa fa-bell"></i> Subscribes</a>
								</li>

								<li><a href="{{url('admin/fq')}}"><i class="fa fa-question-circle"></i>FQs</a>
								</li>

								<li><a href="{{url('admin/configs')}}"><i class="fa fa-gear"></i> configurations</a>
								</li>
								
							</ul>
						</div>
					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a>
						<a href= "{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="top" title="Logout">
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">

				<div class="nav_menu">
					<nav class="" role="navigation">
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>
					</nav>
				</div>

			</div>
			<!-- /top navigation -->


			<!-- page content -->
			<div class="right_col" role="main">
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>
                  	@yield('header')
                </h3>
            </div>

            <div class="title_right">
              @yield('search')
            </div>
          </div>
          <div class="clearfix"></div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="dashboard_graph">

							<div class="col-md-12 col-sm-12 col-xs-12">
								@yield('content')
							</div>

							<div class="clearfix"></div>
						</div>
					</div>

				</div>
				<br />

				<!-- footer content -->
				<!-- /footer content -->
			</div>
			<!-- /page content -->

		</div>

	</div>

	<div id="custom_notifications" class="custom-notifications dsp_none">
		<ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
		</ul>
		<div class="clearfix"></div>
		<div id="notif-group" class="tabbed_notifications"></div>
	</div>

	{{Html::script('admin/js/bootstrap.min.js')}}
	{{Html::script('admin/js/bootstrap-confirmation.min.js')}}

	{{Html::script('admin/js/tags/index.js')}}
	{{Html::script('admin/js/tags/jquery.js')}}
	{{Html::script('admin/js/tags/jquery.tagsinput.min.js')}}
	{{Html::script('admin/js/tags/selectize.js')}}




	<!-- gauge js -->
	{{Html::script('admin/js/gauge/gauge.min.js')}}
	{{Html::script('admin/js/gauge/gauge_demo.js')}}
	<!-- chart js -->
	{{Html::script('admin/js/chartjs/chart.min.js')}}
	<!-- bootstrap progress js -->
	{{Html::script('admin/js/progressbar/bootstrap-progressbar.min.js')}}
	{{Html::script('admin/js/nicescroll/jquery.nicescroll.min.js')}}
	<!-- icheck -->
	{{Html::script('admin/js/icheck/icheck.min.js')}}
	<!-- daterangepicker -->
	{{Html::script('admin/js/moment/moment.min.js')}}
    {{Html::script('admin/js/datepicker/daterangepicker.js')}}
    {{Html::script('admin/js/custom.js')}}

	<!-- flot js -->
	<!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
	{{Html::script('admin/js/flot/jquery.flot.js')}}
	{{Html::script('admin/js/flot/jquery.flot.pie.js')}}
	{{Html::script('admin/js/flot/jquery.flot.orderBars.js')}}
	{{Html::script('admin/js/flot/jquery.flot.time.min.js')}}
	{{Html::script('admin/js/flot/date.js')}}
	{{Html::script('admin/js/flot/jquery.flot.stack.js')}}
	{{Html::script('admin/js/flot/curvedLines.js')}}
	{{Html::script('admin/js/flot/jquery.flot.resize.js')}}
	<script>
		$(document).ready(function() {
			// [17, 74, 6, 39, 20, 85, 7]
			//[82, 23, 66, 9, 99, 6, 2]
			var data1 = [
				[gd(2012, 1, 1), 17],
				[gd(2012, 1, 2), 74],
				[gd(2012, 1, 3), 6],
				[gd(2012, 1, 4), 39],
				[gd(2012, 1, 5), 20],
				[gd(2012, 1, 6), 85],
				[gd(2012, 1, 7), 7]
			];

			var data2 = [
				[gd(2012, 1, 1), 82],
				[gd(2012, 1, 2), 23],
				[gd(2012, 1, 3), 66],
				[gd(2012, 1, 4), 9],
				[gd(2012, 1, 5), 119],
				[gd(2012, 1, 6), 6],
				[gd(2012, 1, 7), 9]
			];
			$("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
				data1, data2
			], {
				series: {
					lines: {
						show: false,
						fill: true
					},
					splines: {
						show: true,
						tension: 0.4,
						lineWidth: 1,
						fill: 0.4
					},
					points: {
						radius: 0,
						show: true
					},
					shadowSize: 2
				},
				grid: {
					verticalLines: true,
					hoverable: true,
					clickable: true,
					tickColor: "#d5d5d5",
					borderWidth: 1,
					color: '#fff'
				},
				colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
				xaxis: {
					tickColor: "rgba(51, 51, 51, 0.06)",
					mode: "time",
					tickSize: [1, "day"],
					//tickLength: 10,
					axisLabel: "Date",
					axisLabelUseCanvas: true,
					axisLabelFontSizePixels: 12,
					axisLabelFontFamily: 'Verdana, Arial',
					axisLabelPadding: 10
						//mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
				},
				yaxis: {
					ticks: 8,
					tickColor: "rgba(51, 51, 51, 0.06)",
				},
				tooltip: false
			});

			function gd(year, month, day) {
				return new Date(year, month - 1, day).getTime();
			}
		});
	</script>

	<!-- worldmap -->
	{{Html::script('admin/js/maps/jquery-jvectormap-2.0.3.min.js')}}
	{{Html::script('admin/js/maps/gdp-data.js')}}
	{{Html::script('admin/js/maps/jquery-jvectormap-world-mill-en.js')}}
	{{Html::script('admin/js/maps/jquery-jvectormap-us-aea-en.js')}}
	<!-- pace -->
	{{Html::script('admin/js/pace/pace.min.js')}}
	<script>
		$(function() {
			$('#world-map-gdp').vectorMap({
				map: 'world_mill_en',
				backgroundColor: 'transparent',
				zoomOnScroll: false,
				series: {
					regions: [{
						values: gdpData,
						scale: ['#E6F2F0', '#149B7E'],
						normalizeFunction: 'polynomial'
					}]
				},
				onRegionTipShow: function(e, el, code) {
					el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
				}
			});
		});
	</script>
	<!-- skycons -->
	{{Html::script('admin/js/skycons/skycons.min.js')}}
	<script>
		var icons = new Skycons({
				"color": "#73879C"
			}),
			list = [
				"clear-day", "clear-night", "partly-cloudy-day",
				"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
				"fog"
			],
			i;

		for (i = list.length; i--;)
			icons.set(list[i], list[i]);

		icons.play();
	</script>

	<!-- dashbord linegraph -->
	<script>
		var doughnutData = [{
			value: 30,
			color: "#455C73"
		}, {
			value: 30,
			color: "#9B59B6"
		}, {
			value: 60,
			color: "#BDC3C7"
		}, {
			value: 100,
			color: "#26B99A"
		}, {
			value: 120,
			color: "#3498DB"
		}];
		var myDoughnut = new Chart(document.getElementById("canvas1").getContext("2d")).Doughnut(doughnutData);
	</script>
	<!-- /dashbord linegraph -->
	<!-- datepicker -->
	<script type="text/javascript">
		$(document).ready(function() {

			var cb = function(start, end, label) {
				console.log(start.toISOString(), end.toISOString(), label);
				$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
				//alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
			}

			var optionSet1 = {
				startDate: moment().subtract(29, 'days'),
				endDate: moment(),
				minDate: '01/01/2012',
				maxDate: '12/31/2015',
				dateLimit: {
					days: 60
				},
				showDropdowns: true,
				showWeekNumbers: true,
				timePicker: false,
				timePickerIncrement: 1,
				timePicker12Hour: true,
				ranges: {
					'Today': [moment(), moment()],
					'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'Last 7 Days': [moment().subtract(6, 'days'), moment()],
					'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					'This Month': [moment().startOf('month'), moment().endOf('month')],
					'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				},
				opens: 'left',
				buttonClasses: ['btn btn-default'],
				applyClass: 'btn-small btn-primary',
				cancelClass: 'btn-small',
				format: 'MM/DD/YYYY',
				separator: ' to ',
				locale: {
					applyLabel: 'Submit',
					cancelLabel: 'Clear',
					fromLabel: 'From',
					toLabel: 'To',
					customRangeLabel: 'Custom',
					daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
					monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
					firstDay: 1
				}
			};
			$('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
			$('#reportrange').daterangepicker(optionSet1, cb);
			$('#reportrange').on('show.daterangepicker', function() {
				console.log("show event fired");
			});
			$('#reportrange').on('hide.daterangepicker', function() {
				console.log("hide event fired");
			});
			$('#reportrange').on('apply.daterangepicker', function(ev, picker) {
				console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
			});
			$('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
				console.log("cancel event fired");
			});
			$('#options1').click(function() {
				$('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
			});
			$('#options2').click(function() {
				$('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
			});
			$('#destroy').click(function() {
				$('#reportrange').data('daterangepicker').remove();
			});
		});
	</script>
	<script>
		NProgress.done();

		
$('[data-toggle=confirmation]').confirmation({
  rootSelector: '[data-toggle=confirmation]',
  // other options
});
	</script>

  <script type="text/javascript">
    $(document).ready (function(){
  $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-success").slideUp(500);
});
   });
</script>
	<!-- /datepicker -->
	<!-- /footer content -->
	@yield('script')
</body>

</html>
