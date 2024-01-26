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
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              @php
              $sponsorApproval = $sponsor->where('states', 'Processing')->count();
              @endphp
              <h3>{{$sponsorApproval}}</h3>

              <p>Sponsorship Approval</p>
            </div>
            <div class="icon">
              <i class="ion ion-thumbsup"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              @php
                $sponsorInProgress = $sponsor->where('states', 'Pending')->count();
              @endphp
              <h3>{{$sponsorInProgress}}</h3>

              <p>In Progress</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              @php
                $totalCartons = 0;
                foreach ($sponsor as $spon) {
                  $int_ro200ml = (int)$spon->confirmro_200ml;
                  $int_ro500ml = (int)$spon->confirmro_500ml;
                  $int_ro11L = (int)$spon->confirmro_11L;
                  $int_ro350ml = (int)$spon->confirmro_350ml;
                  $tots = $int_ro200ml + $int_ro500ml + $int_ro11L + $int_ro350ml;
                  $totalCartons += $tots;
                }
               @endphp
              <h3>{{$totalCartons}}</h3>

              <p>Total Sponsor Cartons</p>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              @php
                $sponsored = $sponsor->where('states', 'Completed')->count();
              @endphp
              <h3>{{$sponsored}}</h3>

              <p>Total Events Sponsored</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
           <!-- PIE CHART -->
           <div class="card ">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-chart-pie mr-1"></i> Status</h3>

              {{-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div> --}}
            </div>
            <div class="card-body">
              <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-6 connectedSortable">

          <div class="card card-info card-tabs">
            <div class="card-header text-center p-0 pt-1">
              <ul class="nav nav-tabs justify-content-center" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">BOOTH</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">SPACE</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">NONE</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Event </th>
                      <th>Address</th>
                      <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($booth as $booths)
                      <tr>
                        <td>{{$booths->event_name}}</td>
                        <td>{{$booths->eventAddress}}</td>
                        <td>
                          {{date('M d, Y', strtotime($booths->from_date))}} - {{date('M d, Y', strtotime($booths->to_date))}}
                        </td>
                        
                      </tr>
                    @endforeach
                    
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  <table id="example3" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Event </th>
                      <th>Address</th>
                      <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($space as $spaces)
                      <tr>
                        <td>{{$spaces->event_name}}</td>
                        <td>{{$spaces->eventAddress}}</td>
                        <td>
                          {{date('M d, Y', strtotime($spaces->from_date))}} - {{date('M d, Y', strtotime($spaces->to_date))}}
                        </td>
                        
                      </tr>
                    @endforeach
                    
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                  <table id="example4" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Event </th>
                      <th>Address</th>
                      <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($none as $nones)
                      <tr>
                        <td>{{$nones->event_name}}</td>
                        <td>{{$nones->eventAddress}}</td>
                        <td>
                          {{date('M d, Y', strtotime($nones->from_date))}} - {{date('M d, Y', strtotime($nones->to_date))}}
                        </td>
                        
                      </tr>
                    @endforeach
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          
        </section>
        <!-- right col -->
      </div>

      {{-- <div class="row">
        <div class="col-12">
        
          <div class="card bg-gradient-info">
            <div class="card-header border-0">
              <h3 class="card-title">
                <i class="fas fa-th mr-1"></i>
                Sales Graph
              </h3>

              
            </div>
            <div class="card-body">
              <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
          
            <div class="card-footer bg-transparent">
              <div class="row">
                <div class="col-4 text-center">
                  <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">

                  <div class="text-white">Mail-Orders</div>
                </div>
              
                <div class="col-4 text-center">
                  <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">

                  <div class="text-white">Online</div>
                </div>
              
                <div class="col-4 text-center">
                  <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">

                  <div class="text-white">In-Store</div>
                </div>
              
              </div>
             
            </div>
           
          </div>

        </div>

      </div> --}}

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Sponsor Events</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-dark">
                <tr>
                  <th>#</th>
                  <th>Submission Date</th>
                  <th>Name</th>
                  <th>Event Name</th>
                  <th>Event Date</th>
                  <th>Location</th>
                  <th>Handle By</th>
                  {{-- <th>Sponsor Cartons</th> --}}
                  <th>Status</th>
                  <th>Tags</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($sponsor as $sponsorship)
                  @php
                    $inCharge = json_decode($sponsorship->attending);
                    $int_ro200ml = (int)$sponsorship->ro_200ml;
                    $int_ro500ml = (int)$sponsorship->ro_500ml;
                    $int_ro11L = (int)$sponsorship->ro_11L;
                    $int_ro350ml = (int)$sponsorship->ro_350ml;
                    $sponsorCartons = $int_ro200ml + $int_ro500ml + $int_ro11L +$int_ro350ml
                  @endphp
                  <tr>
                    <td>
                      <a href="/view-request/{{$sponsorship->id}}" class="btn btn-primary btn-sm mb-1"><i class="ion ion-eye"></i></a>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal{{$sponsorship->id}}">
                        <i class="ion ion-ios-trash"></i>
                      </button>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="modal{{$sponsorship->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Are you sure want to remove {{$sponsorship->event_name}} ?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <a href="/delete/{{$sponsorship->id}}" class="btn btn-danger">Confirm</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>{{$sponsorship->created_at->format('d-m-Y')}}</td>
                    <td>{{$sponsorship->fullname}}</td>
                    <td>{{$sponsorship->event_name}}</td>
                    <td>
                      {{date('M d, Y', strtotime($sponsorship->from_date))}} - {{date('M d, Y', strtotime($sponsorship->to_date))}}
                    </td>
                    <td>{{$sponsorship->eventAddress}}</td>
                    <td>
                      {{-- @if ($inCharge !== null)
                      @foreach ($inCharge as $item)
                          - {{$item}} <br>
                      @endforeach
                      @else
                      None
                      @endif --}}
                      @if ($sponsorship->handle_by !== null)
                      {{$sponsorship->handle_by}}
                      @else
                      None
                      @endif
                    </td>
                    {{-- <td>{{$sponsorCartons}}</td> --}}
                    <td>
                      @if ($sponsorship->states == "Processing")
                      <button class="btn btn-warning">{{$sponsorship->states}}</button>            
                      @elseif ($sponsorship->states == "Approved")  
                      <button class="btn btn-success">{{$sponsorship->states}}</button> 
                      @elseif ($sponsorship->states == "Pending")  
                      <button class="btn btn-info">{{$sponsorship->states}}</button> 
                      @elseif ($sponsorship->states == "Collected")  
                      <button class="btn btn-primary">{{$sponsorship->states}}</button>   
                      @elseif ($sponsorship->states == "Blacklist")  
                      <button class="btn btn-dark">{{$sponsorship->states}}</button> 
                      @elseif ($sponsorship->states == "MIA")  
                      <button class="btn btn-secondary">{{$sponsorship->states}}</button>    
                      @elseif ($sponsorship->states == "Rejected")  
                      <button class="btn btn-danger">{{$sponsorship->states}}</button>
                      @elseif ($sponsorship->states == "Completed")  
                      <button class="btn btn-success">{{$sponsorship->states}}</button>
                      @else
                      {{$sponsorship->states}}
                      @endif
                    </td>
                    <td>
                      @if ($sponsorship->tagging && $sponsorship->tagging->count() > 0)
                          @foreach ($sponsorship->tagging as $item)
                          <span class="badge badge-warning">{{$item->name}}</span><br>
                          @endforeach
                      @endif
                    </td>
                  </tr>
                  @endforeach
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
<script>
  const pageLabels = @json($statusCounts->keys());
  const pageData = @json($statusCounts->values());
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutData        = {
      labels: pageLabels,
      datasets: [
        {
          data: pageData,
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    // Sales graph chart
  var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d')
  // $('#revenue-chart').get(0).getContext('2d');

  var salesGraphChartData = {
    labels: ['2011 Q1', '2011 Q2', '2011 Q3', '2011 Q4', '2012 Q1', '2012 Q2', '2012 Q3', '2012 Q4', '2013 Q1', '2013 Q2'],
    datasets: [
      {
        label: 'Digital Goods',
        fill: false,
        borderWidth: 2,
        lineTension: 0,
        spanGaps: true,
        borderColor: '#efefef',
        pointRadius: 3,
        pointHoverRadius: 7,
        pointColor: '#efefef',
        pointBackgroundColor: '#efefef',
        data: [2666, 2778, 4912, 3767, 6810, 5670, 4820, 15073, 10687, 8432]
      }
    ]
  }

  var salesGraphChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        ticks: {
          fontColor: '#efefef'
        },
        gridLines: {
          display: false,
          color: '#efefef',
          drawBorder: false
        }
      }],
      yAxes: [{
        ticks: {
          stepSize: 5000,
          fontColor: '#efefef'
        },
        gridLines: {
          display: true,
          color: '#efefef',
          drawBorder: false
        }
      }]
    }
  }

  // eslint-disable-next-line no-unused-vars
  var salesGraphChart = new Chart(salesGraphChartCanvas, { // lgtm[js/unused-local-variable]
    type: 'line',
    data: salesGraphChartData,
    options: salesGraphChartOptions
  })

   
  })
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "pageLength": 30,
      "buttons": ["copy", "excel", "pdf", "print"],
      "order": [[1, "desc"]],

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "order": [[0, "desc"]]
    });
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "order": [[0, "desc"]]
    });
    $('#example4').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "order": [[0, "desc"]]
    });
  });
</script>

@endsection