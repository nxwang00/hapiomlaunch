@extends('dashboard.layouts.master')
@section('title', ' Dashboard')
@section('page', ' Dashboard')
@section('page-css-link') @endsection
@section('page-css') @endsection
@section('main-content')

<!-- ... end Responsive Header-BP -->
<div class="header-spacer header-spacer-small"></div>
<div class="header-spacer header-spacer-small"></div>

<!-- Top Header-Profile -->
<div class="container">
	<div class="row">

		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-content">
					<ul class="statistics-list-count">
						<li>
							<div class="points">
								<span>
									Admin User
								</span>
							</div>
							<div class="count-stat">{{ $adminUser}}
								<!-- <span class="indicator positive"> + 4.207</span> -->

							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-content">
					<ul class="statistics-list-count">
						<li>
							<div class="points">
								<span>
									Customer User
								</span>
							</div>
							<div class="count-stat">{{ $user }}
								<!-- <span class="indicator negative"> - 12.352</span> -->
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-content">
					<ul class="statistics-list-count">
						<li>
							<div class="points">
								<span>
									Group User
								</span>
							</div>
							<div class="count-stat">{{ $user }}
								<!-- <span class="indicator positive"> + 1.056</span> -->
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-content">
					<ul class="statistics-list-count">
						<li>
							<div class="points">
								<span>
									Total User
								</span>
							</div>
							<div class="count-stat">{{ $totalUser }}
								<!-- <span class="indicator positive"> + 2.847</span> -->
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>

	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col col-lg-12 col-sm-12 col-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					<div class="h6 title">Monthly Bar Graphic</div>
					<select class="form-select form-control without-border">
						<option value="LY">LAST YEAR (2016)</option>
						<option value="CUR">CURRENT YEAR (2017)</option>
					</select>
					<a href="#" class="more">
						<svg class="olymp-three-dots-icon">
							<use xlink:href="#olymp-three-dots-icon"></use>
						</svg>
					</a>
				</div>

				<div class="ui-block-content">

					<!----------------------------------------- ONE-BAR-CHART ----------------------------------------->

					<div class="chart-js chart-js-one-bar">
						<canvas id="one-bar-chart" width="1400" height="380"></canvas>
					</div>

					<!--
						JS libraries for ONE-BAR-CHART:
						js/libs/Chart.min.js
						js/libs/chartjs-plugin-deferred.min.js
						js/libs/loader.min.js
					 -->


					<!-- JS-init for ONE-BAR-CHART: js/libs/run-chart.min.js -->

					<!-------------------------------------- ... end ONE-BAR-CHART ------------------------------------>

				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 mb-3">
			<div class="ui-block responsive-flex h-100 mb-0">
				<div class="ui-block-title">
					<div class="h6 title">Lines Graphic</div>

					<div class="points align-right">

						<span>
							<span class="statistics-point bg-yellow"></span>
							THIS YEAR
						</span>

						<span>
							<span class="statistics-point bg-primary"></span>
							LAST YEAR
						</span>

					</div>

					<select class="form-select form-control without-border">
						<option value="CUR">LAST 3 MONTH</option>
						<option value="LY">LAST YEAR (2016)</option>
					</select>

					<a href="#" class="more">
						<svg class="olymp-three-dots-icon">
							<use xlink:href="#olymp-three-dots-icon"></use>
						</svg>
					</a>

				</div>

				<div class="ui-block-content">

					<!----------------------------------------- LINE-GRAPHIC-CHART ------------------------------------>

					<div class="chart-js chart-js-line-graphic">
						<canvas id="line-graphic-chart" width="730" height="300"></canvas>
					</div>

					<!--
						JS libraries for LINE-GRAPHIC-CHART:
						js/libs/Chart.min.js
						js/libs/chartjs-plugin-deferred.min.js
						js/libs/loader.min.js
					 -->


					<!-- JS-init for LINE-GRAPHIC-CHART: js/libs/run-chart.min.js -->

					<!--------------------------------- ... end LINE-GRAPHIC-CHART ------------------------------------>

				</div>

			</div>
		</div>
		<div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-3">
			<div class="ui-block h-100 mb-0">
				<div class="ui-block-title">
					<div class="h6 title">Colors Pie Chart</div>
					<a href="#" class="more">
						<svg class="olymp-three-dots-icon">
							<use xlink:href="#olymp-three-dots-icon"></use>
						</svg>
					</a>
				</div>
				<div class="ui-block-content">
					<div class="chart-with-statistic">
						<ul class="statistics-list-count">
							<li>
								<div class="points">
									<span>
										<span class="statistics-point bg-purple"></span>
										Status Updates
									</span>
								</div>
								<div class="count-stat">8.247</div>
							</li>
							<li>
								<div class="points">
									<span>
										<span class="statistics-point bg-breez"></span>
										Multimedia
									</span>
								</div>
								<div class="count-stat">5.630</div>
							</li>
							<li>
								<div class="points">
									<span>
										<span class="statistics-point bg-primary"></span>
										Shared Posts
									</span>
								</div>
								<div class="count-stat">1.498</div>
							</li>
							<li>
								<div class="points">
									<span>
										<span class="statistics-point bg-yellow"></span>
										Blog Posts
									</span>
								</div>
								<div class="count-stat">1.136</div>
							</li>
						</ul>

						<!---------------------------------------- PIE-COLOR-CHART ------------------------------------>

						<div class="chart-js chart-js-pie-color">
							<canvas id="pie-color-chart" width="180" height="180"></canvas>
							<div class="general-statistics">16.502
								<span>Last Month Posts</span>
							</div>
						</div>

						<!--
							JS libraries for PIE-COLOR-CHART:
							js/libs/Chart.min.js
							js/libs/chartjs-plugin-deferred.min.js
							js/libs/loader.min.js
						 -->


						<!-- JS-init for PIE-COLOR-CHART: js/libs/run-chart.min.js -->

						<!--------------------------------- ... end PIE-COLOR-CHART ----------------------------------->

					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">

		<div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-3">
			<div class="ui-block h-100 mb-0">
				<div class="ui-block-title">
					<div class="h6 title">Pie Chart with Text</div>
					<a href="#" class="more">
						<svg class="olymp-three-dots-icon">
							<use xlink:href="#olymp-three-dots-icon"></use>
						</svg>
					</a>
				</div>
				<div class="ui-block-content">

					<!---------------------------------------------- PIE-CHART ---------------------------------------->

					<div class="circle-progress circle-pie-chart">
						<div class="pie-chart" data-value="0.68" data-startcolor="#38a9ff" data-endcolor="#317cb6">
							<div class="content"><span>%</span></div>
						</div>
					</div>

					<!--
						JS libraries for PIE-CHART:
						js/libs/circle-progress.min.js
					 -->


					<!-- JS-init for PIE-CHART: js/libs/run-chart.min.js -->

					<!------------------------------------ ... end PIE-CHART ------------------------------------------>

					<div class="chart-text">
						<h6>Friends Comments</h6>
						<p>68% of friends that visit your profile comment on your posts.</p>
					</div>
				</div>
			</div>
		</div>

		<div class="col col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 mb-3">
			<div class="ui-block h-100 mb-0">
				<div class="ui-block-title">
					<div class="h6 title">Worldwide Statistics</div>
					<a href="#" class="more">
						<svg class="olymp-three-dots-icon">
							<use xlink:href="#olymp-three-dots-icon"></use>
						</svg>
					</a>
				</div>

				<div class="ui-block-content">
					<div class="world-statistics">
						<div class="world-statistics-img">
							<img loading=lazy src="{{ url('assets/dashboard/img/world-map.webp') }}" alt="map" width="520" height="281">
						</div>

						<ul class="country-statistics">
							<li>
								<img loading=lazy src="{{ url('assets/dashboard/img/flag1.webp') }}" alt="flag" width="16" height="11">
								<span class="country">United States</span>
								<span class="count-stat">86.134</span>
							</li>
							<li>
								<img loading="lazy" src="{{ url('assets/dashboard/img/flag2.webp') }}" alt="flag" width="16" height="11">
								<span class="country">Mexico</span>
								<span class="count-stat">35.136</span>
							</li>
							<li>
								<img loading="lazy" src="{{ url('assets/dashboard/img/flag3.webp') }}" alt="flag" width="16" height="11">
								<span class="country">France</span>
								<span class="count-stat">12.600</span>
							</li>
							<li>
								<img loading="lazy" src="{{ url('assets/dashboard/img/flag4.webp') }}" alt="flag" width="16" height="11">
								<span class="country">Spain</span>
								<span class="count-stat">9.471</span>
							</li>
							<li>
								<img loading="lazy" src="{{ url('assets/dashboard/img/flag5.webp') }}" alt="flag" width="16" height="11">
								<span class="country">Ireland</span>
								<span class="count-stat">8.058</span>
							</li>
							<li>
								<img loading="lazy" src="{{ url('assets/dashboard/img/flag6.webp') }}" alt="flag" width="16" height="11">
								<span class="country">Argentina</span>
								<span class="count-stat">5.653</span>
							</li>
							<li>
								<img loading="lazy" src="{{ url('assets/dashboard/img/flag7.webp') }}" alt="flag" width="16" height="11">
								<span class="country">Ecuador</span>
								<span class="count-stat">2.924</span>
							</li>
						</ul>

					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-3">
			<div class="ui-block h-100 mb-0">
				<div class="ui-block-title">
					<div class="h6 title">Country Detail</div>
					<a href="#" class="more">
						<svg class="olymp-three-dots-icon">
							<use xlink:href="#olymp-three-dots-icon"></use>
						</svg>
					</a>
				</div>
				<div class="ui-block-content js-google-map">

					<!------------------------------------------- US-CHART-MAP ---------------------------------------->

					<div id="us-chart-map" style="width: 270px; height: 180px; max-width: 100%;"></div>

					<!--
						JS libraries for US-CHART-MAP:
						js/libs/Chart.min.js
						js/libs/chartjs-plugin-deferred.min.js
						js/libs/loader.min.js
					 -->


					<!-- JS-init for US-CHART-MAP: js/libs/run-chart.min.js -->

					<!------------------------------------ ... end US-CHART-MAP --------------------------------------->


					<ul class="statistics-list-count style-2">
						<li>
							<div class="points">
									<span>
										<span class="statistics-point bg-blue"></span>
										Profile Visits
									</span>
							</div>
							<div class="count-stat">4.290</div>
						</li>
						<li>
							<div class="points">
									<span>
										<span class="statistics-point bg-breez"></span>
										Post Likes
									</span>
							</div>
							<div class="count-stat">2.758</div>
						</li>
					</ul>
				</div>
			</div>
		</div>


		<div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-3">
			<div class="ui-block h-100 mb-0">
				<div class="ui-block-title">
					<div class="h6 title">Progress Bars</div>
					<a href="#" class="more">
						<svg class="olymp-three-dots-icon">
							<use xlink:href="#olymp-three-dots-icon"></use>
						</svg>
					</a>
				</div>

				<div class="ui-block-content">
					<div class="skills-item">
						<div class="skills-item-info">
							<span class="skills-item-title">Orange Gradient Progress</span>
							<span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="62" data-from="0"></span><span class="units">62%</span></span>
						</div>
						<div class="skills-item-meter">
							<span class="skills-item-meter-active bg-primary" style="width: 62%"></span>
						</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-info">
							<span class="skills-item-title">Violet Progress</span>
							<span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="46" data-from="0"></span><span class="units">46%</span></span>
						</div>
						<div class="skills-item-meter">
							<span class="skills-item-meter-active bg-purple" style="width: 46%"></span>
						</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-info">
							<span class="skills-item-title">Blue Progress</span>
							<span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="79" data-from="0"></span><span class="units">79%</span></span>
						</div>
						<div class="skills-item-meter">
							<span class="skills-item-meter-active bg-blue" style="width: 79%"></span>
						</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-info">
							<span class="skills-item-title">Aqua Progress</span>
							<span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="34" data-from="0"></span><span class="units">34%</span></span>
						</div>
						<div class="skills-item-meter">
							<span class="skills-item-meter-active bg-breez" style="width: 34%"></span>
						</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-info">
							<span class="skills-item-title">Yellow Progress</span>
							<span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="95" data-from="0"></span><span class="units">95%</span></span>
						</div>
						<div class="skills-item-meter">
							<span class="skills-item-meter-active bg-yellow" style="width: 95%"></span>
						</div>
					</div>
				</div>

			</div>
		</div>


		<div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-3">
			<div class="ui-block h-100 mb-0">
				<div class="ui-block-title">
					<div class="h6 title">Icons with Text</div>
					<a href="#" class="more">
						<svg class="olymp-three-dots-icon">
							<use xlink:href="#olymp-three-dots-icon"></use>
						</svg>
					</a>
				</div>

				<div class="ui-block-content">
					<div class="monthly-indicator-wrap">
						<div class="monthly-indicator">
							<a href="#" class="btn btn-control bg-blue">
								<svg class="olymp-happy-face-icon">
									<use xlink:href="#olymp-happy-face-icon"></use>
								</svg>
							</a>

							<div class="monthly-count">
								9.855
								<span class="period">Likes</span>
							</div>
						</div>

						<div class="monthly-indicator">
							<a href="#" class="btn btn-control bg-blue">
								<svg class="olymp-happy-face-icon">
									<use xlink:href="#olymp-happy-face-icon"></use>
								</svg>
							</a>

							<div class="monthly-count">
								6.721
								<span class="period">Shares</span>
							</div>
						</div>

						<div class="monthly-indicator">
							<a href="#" class="btn btn-control bg-blue">
								<svg class="olymp-happy-face-icon">
									<use xlink:href="#olymp-happy-face-icon"></use>
								</svg>
							</a>

							<div class="monthly-count">
								2.047
								<span class="period">Comments</span>
							</div>
						</div>

						<div class="monthly-indicator">
							<a href="#" class="btn btn-control bg-blue">
								<svg class="olymp-happy-face-icon">
									<use xlink:href="#olymp-happy-face-icon"></use>
								</svg>
							</a>

							<div class="monthly-count">
								1.536
								<span class="period">Messages</span>
							</div>
						</div>

						<div class="monthly-indicator">
							<a href="#" class="btn btn-control bg-primary">
								<svg class="olymp-comments-post-icon">
									<use xlink:href="#olymp-comments-post-icon"></use>
								</svg>
							</a>

							<div class="monthly-count">
								Paragraph
								<span class="period">Lorem ipsum dolor sit amet, consectetur icing elit, sed do eiusmod
									tempor incididunt ut ore et dolore magna aliqua. Ut enim ad minim an quis nostrud
									exercitation.
								</span>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>


	<div class="row">
		<div class="col col-lg-12 col-sm-12 col-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					<div class="h6 title">Yearly Line Graphic</div>
					<select class="form-select form-control without-border">
						<option value="LY">LAST YEAR (2016)</option>
						<option value="2">CURRENT YEAR (2017)</option>
					</select>
					<a href="#" class="more">
						<svg class="olymp-three-dots-icon">
							<use xlink:href="#olymp-three-dots-icon"></use>
						</svg>
					</a>
				</div>

				<div class="ui-block-content">

					<!------------------------------------------- LINE-CHART ------------------------------------------>

					<div class="chart-js chart-js-line-chart">
						<canvas id="line-chart" width="1400" height="380"></canvas>
					</div>

					<!--
						JS libraries for LINE-CHART:
						js/libs/Chart.min.js
						js/libs/chartjs-plugin-deferred.min.js
						js/libs/loader.min.js
					 -->

					<!-- JS-init for LINE-CHART: js/libs/run-chart.min.js -->

					<!------------------------------------ ... end LINE-CHART ----------------------------------------->

				</div>
				<hr>
				<div class="ui-block-content display-flex content-around">

					<!----------------------------------------- PIE-SMALL-CHART --------------------------------------->

					<div class="chart-js chart-js-small-pie">
						<canvas id="pie-small-chart" width="90" height="90"></canvas>
					</div>

					<!--
						JS libraries for PIE-SMALL-CHART:
						js/libs/Chart.min.js
						js/libs/chartjs-plugin-deferred.min.js
						js/libs/loader.min.js
					 -->

					<!-- JS-init for PIE-SMALL-CHART: js/libs/run-chart.min.js -->

					<!--------------------------------- ... end PIE-SMALL-CHART --------------------------------------->

					<div class="points points-block">

						<span>
							<span class="statistics-point bg-breez"></span>
							Yearly Likes
						</span>

						<span>
							<span class="statistics-point bg-yellow"></span>
							Yearly Comments
						</span>

					</div>

					<div class="text-stat">
						<div class="count-stat">2.758</div>
						<div class="title">Total Likes</div>
						<div class="sub-title">This Year</div>
					</div>

					<div class="text-stat">
						<div class="count-stat">5.420,7</div>
						<div class="title">Average Likes</div>
						<div class="sub-title">By Month</div>
					</div>

					<div class="text-stat">
						<div class="count-stat">42.973</div>
						<div class="title">Total Comments</div>
						<div class="sub-title">This Year</div>
					</div>

					<div class="text-stat">
						<div class="count-stat">3.581,1</div>
						<div class="title">Average Comments</div>
						<div class="sub-title">By Month</div>
					</div>

				</div>
			</div>
		</div>

	</div>
	<div class="row">
		<div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-3">
			<div class="ui-block h-100 mb-0">
				<div class="ui-block-title">
					<div class="h6 title">Progress Bars</div>
					<a href="#" class="more">
						<svg class="olymp-three-dots-icon">
							<use xlink:href="#olymp-three-dots-icon"></use>
						</svg>
					</a>
				</div>
				<div class="ui-block-content">

					<!----------------------------------------- TWO-BAR-CHART-2 --------------------------------------->

					<div class="chart-js chart-js-two-bar">
						<canvas id="two-bar-chart-2" width="400" height="300"></canvas>
					</div>

					<!--
						JS libraries for TWO-BAR-CHART-2:
						js/libs/Chart.min.js
						js/libs/chartjs-plugin-deferred.min.js
						js/libs/loader.min.js
					 -->

					<!-- JS-init for TWO-BAR-CHART-2: js/libs/run-chart.min.js -->

					<!--------------------------------- ... end TWO-BAR-CHART-2 --------------------------------------->

				</div>
			</div>
		</div>
		<div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-3">
			<div class="ui-block h-100 mb-0">
				<div class="ui-block-title">
					<div class="h6 title">Number with Slider</div>
					<a href="#" class="more">
						<svg class="olymp-three-dots-icon">
							<use xlink:href="#olymp-three-dots-icon"></use>
						</svg>
					</a>
				</div>

				<div class="ui-block-content">
					<div class="swiper-container" data-slide="fade">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<div class="statistics-slide">
									<div class="count-stat" data-swiper-parallax="-500">248</div>
									<div class="title" data-swiper-parallax="-100">
										<span class="c-primary">Hapiom</span> Posts Rank
									</div>
									<div class="sub-title" data-swiper-parallax="-100">The Hapiom Rank measures the quantity of comments, likes and posts.</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="statistics-slide">
									<div class="count-stat" data-swiper-parallax="-500">358</div>
									<div class="title" data-swiper-parallax="-100">
										<span class="c-primary">Hapiom</span> Posts Rank
									</div>
									<div class="sub-title" data-swiper-parallax="-100">The Hapiom Rank measures the quantity of comments, likes and posts.</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="statistics-slide">
									<div class="count-stat" data-swiper-parallax="-500">711</div>
									<div class="title" data-swiper-parallax="-100">
										<span class="c-primary">Hapiom</span> Posts Rank
									</div>
									<div class="sub-title" data-swiper-parallax="-100">The Hapiom Rank measures the quantity of comments, likes and posts.</div>
								</div>
							</div>
						</div>

						<!-- If we need pagination -->
						<div class="swiper-pagination pagination-blue"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-3">
			<div class="ui-block h-100 mb-0">
				<div class="ui-block-title">
					<div class="h6 title">Pie Chart</div>
					<a href="#" class="more">
						<svg class="olymp-three-dots-icon">
							<use xlink:href="#olymp-three-dots-icon"></use>
						</svg>
					</a>
				</div>
				<div class="ui-block-content">

					<!------------------------------------------- RADAR-CHART ----------------------------------------->

					<div class="chart-js chart-radar">
						<canvas class="radar-chart" id="radar-chart" width="400" height="300"></canvas>
					</div>

					<!--
						JS libraries for RADAR-CHART:
						js/libs/Chart.min.js
						js/libs/chartjs-plugin-deferred.min.js
						js/libs/loader.min.js
					 -->

					<!-- JS-init for RADAR-CHART: js/libs/run-chart.min.js -->

					<!------------------------------------ ... end RADAR-CHART ---------------------------------------->

				</div>
			</div>
		</div>
	</div>

</div>

@endsection
@section('page-js-link') @endsection
@section('page-js') @endsection