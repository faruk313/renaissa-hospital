<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('dashboard','active'); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
	<ul class="breadcrumb breadcrumb-style">
		<li class="breadcrumb-item">
		  	<h5 class="page-title">Dashboard</h5>
		</li>
		<li class="breadcrumb-item">
		  	<a href="<?php echo e(route('dashboard')); ?>">
				<i class="fas fa-home"></i>
			</a>
		</li>
		<li class="breadcrumb-item active">Dashboard</li>
	</ul>
	<div class="row">
		<div class="col-xl-3 col-lg-6">
		  <div class="card bg-cyan raised-1">
			<div class="card-statistic-3">
			  <div class="card-content">
				<h5 class="card-title">Prescription Income</h5>
				<span class="font-weight-bold" style="font-size: 32px">&#2547;</span>
				<span style="font-size: 22px"><?php echo e($prescription_income); ?></span>
			  </div>
			</div>
		  </div>
		</div>
		<div class="col-xl-3 col-lg-6">
		  <div class="card bg-indigo raised-1">
			<div class="card-statistic-3">
			  <div class="card-content">
				<h5 class="card-title">Test Income</h5>
				<span class="font-weight-bold" style="font-size: 32px">&#2547;</span>
				<span style="font-size: 22px"><?php echo e($test_income); ?></span>
			  </div>
			</div>
		  </div>
		</div>
		<div class="col-xl-3 col-lg-6">
		  <div class="card bg-green raised-1">
			<div class="card-statistic-3">
			  <div class="card-content">
				<h5 class="card-title">Total Income</h5>
				<span class="font-weight-bold" style="font-size: 32px">&#2547;</span>
				<span style="font-size: 22px"><?php echo e($total_income); ?></span>
			  </div>
			</div>
		  </div>
		</div>
		<div class="col-xl-3 col-lg-6">
		  <div class="card bg-purple raised-1">
			<div class="card-statistic-3">
			  <div class="card-content">
				<h5 class="card-title">Total Costs</h5>
				<span class="font-weight-bold" style="font-size: 32px">&#2547;</span>
				<span style="font-size: 22px"><?php echo e($test_income); ?></span>
			  </div>
			</div>
		  </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-6">
			<div class="card raised-1">
				<div class="card-statistic-4">
					<div class="info-box7-block">
					<h6 class="m-b-20 text-right">Pathology Tests</h6>
					<h4 class="text-right"><i class="fas fa-vials pull-left bg-indigo c-icon"></i><span><?php echo e($total_tests); ?></span>
					</h4>
					<p class="mb-0 mt-3 text-muted"><a href="<?php echo e(route('pathologyTests')); ?>"><i class="fas fa-arrow-circle-right col-indigo m-r-5"></i>details...</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card raised-1">
			<div class="card-statistic-4">
				<div class="info-box7-block">
				<h6 class="m-b-20 text-right">Total Brokers</h6>
				<h4 class="text-right"><i class="fas fa-users-cog pull-left bg-cyan c-icon"></i><span><?php echo e($total_brokers); ?></span>
				</h4>
				<p class="mb-0 mt-3 text-muted"><a href="<?php echo e(route('brokers')); ?>"><i class="fas fa-arrow-circle-right col-cyan m-r-5"></i>details...</a></p>
				</div>
			</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card raised-1">
				<div class="card-statistic-4">
					<div class="info-box7-block">
					<h6 class="m-b-20 text-right">Total Patients</h6>
					<h4 class="text-right"><i
						class="fas fa-user-friends pull-left bg-deep-orange c-icon"></i><span><?php echo e($total_patients); ?></span>
					</h4>
					<p class="mb-0 mt-3 text-muted"><a href="<?php echo e(route('patients.lists')); ?>"><i class="fas fa-arrow-circle-right col-deep-orange m-r-5"></i>details...</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card raised-1">
				<div class="card-statistic-4">
					<div class="info-box7-block">
					<h6 class="m-b-20 text-right">Total Doctors</h6>
					<h4 class="text-right">
						<i class="fas fa-user-md pull-left bg-green c-icon"></i><span><?php echo e($total_doctors); ?></span>
					</h4>
					<p class="mb-0 mt-3 text-muted"><a href="<?php echo e(route('doctors.lists')); ?>"><i class="fas fa-arrow-circle-right col-green m-r-5"></i>details...</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-12">
		  <div class="card">
			<div class="card-header">
			  <h4>Revenue Chart</h4>
			</div>
			<div class="card-body">
				<div id="chart">

				</div>
			  <div class="recent-report__chart">
				<div id="chart1"></div>
			  </div>
			</div>
		  </div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_libraries'); ?>
<!-- JS Libraies -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>

<!-- Page Specific JS File -->
<script src="<?php echo e(asset('assets/bundles/apexcharts/apexcharts.min.js')); ?>"></script>
<script>
	'use strict';
	var income_array='';
	var income_date='';
	var options='';
	income_array = <?php print_r(json_encode($income_amount_array)) ?>;
	income_date = <?php print_r(json_encode($income_date_array)) ?>;	
	
	$(function () {
		bar_chart();
	})

	function bar_chart() {
		options = {
			chart: {
				height: 350,
				type: 'bar',
			},
			plotOptions: {
				bar: {
					horizontal: false,
					endingShape: 'rounded',
					columnWidth: '55%',
				},
			},
			dataLabels: {
				enabled: false
			},
			stroke: {
				show: true,
				width: 2,
				colors: ['transparent']
			},
			series: [
			
			{
			    name: 'Expense',
			    data: [22,44, 55, 57, 56, 61, 58, 63, 60, 66,94,120,40,11,22,33,94,120,10,11,22,33,44,99,88,99,12,34.99,22,54,67,11]
			},
			{
				name: 'Income',
				data: income_array
			}],
			xaxis: {
				title: {
					text: '(Month of October, 2020)'
				},
				categories: income_date,
				labels: {
					style: {
						colors: '#9aa0ac',
					}
				},
				
			},
			yaxis: {
				title: {
					text: '(thousands)'
				},
				labels: {
					style: {
						color: '#9aa0ac',
					}
				}
			},
			fill: {
				opacity: 1

			},
			tooltip: {
				y: {
					formatter: function (val) {
						return "" + val + " thousands"
					}
				}
			}
		}

		var chart = new ApexCharts(
			document.querySelector("#chart1"),
			options
		);

		chart.render();


	}
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\renaissa-hospital3\resources\views/dashboard.blade.php ENDPATH**/ ?>