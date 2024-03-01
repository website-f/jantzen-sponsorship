@extends('partial.dashboard-main')

@section('title', 'Dashboard')
    
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Main row -->
      <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Sponsored Carton ({{$selectedMonth}})</h3>
              </div>
            </div>
            <div class="card-body">
              <form action="/total-carton-report" method="GET">
                <div class="row p-2 mb-4">
                  <div class="col">
                    <label class="form-label">From</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" required>
                  </div>
                  <div class="col">
                    <label class="form-label">To</label>
                    <input type="date" id="end_date" name="end_date" class="form-control" required>
                  </div>
                  <div class="w-100">
                  <button type="submit" class="btn btn-primary mt-3 w-100">Filter</button>
                  </div>
                </div>
              </form>
              <hr>
              <div class="position-relative mb-4">
                <canvas id="sales-chart" height="200"></canvas>
              </div>

            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Sponsor Carton</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-dark">
                <tr>
                  <th>RO Water - 200ML (Carton)</th>
                  <th>RO Water - 500ML (Carton)</th>
                  <th>RO Water - 11L (Bottle)</th>
                  <th>Mineral Water - 350ML (Carton)</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$ro200ml}}</td>
                    <td>{{$ro500ml}}</td>
                    <td>{{$ro11l}}</td>
                    <td>{{$min350ml}}</td>
                  </tr>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- ./col -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>

<script>
  /* global Chart:false */
  const pageLabels = @json($cartonLabels);
  const pageData = @json($cartonData);
$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
      labels: pageLabels,
      datasets: [
        {
          backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          borderColor: '#007bff',
          data: pageData
        },
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      },
    }
  })

})

// lgtm [js/unused-local-variable]

</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "pageLength": 30,
      "buttons": ["copy", "excel", "pdf", "print"],
      "columnDefs": [
          { "type": "date", "targets": 1 } // Assuming the date column is the second column (index 1)
      ],
      "order": [[1, "desc"]]

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

@endsection