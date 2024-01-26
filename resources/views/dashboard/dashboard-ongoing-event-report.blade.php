@extends('partial.dashboard-main')

@section('title', 'Ongoing Event Report')
    
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ongoing Event Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Ongoing Event Report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
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
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Location</th>
                    <th>In Charge</th>
                    <th>Sponsor Cartons</th>
                    <th>Status</th>
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
                        <a href="/event-report/{{$sponsorship->id}}" class="btn btn-primary">View</a>
                      </td>
                      <td>{{$sponsorship->event_name}}</td>
                      <td>
                        {{date('M d, Y', strtotime($sponsorship->from_date))}} - {{date('M d, Y', strtotime($sponsorship->to_date))}}
                      </td>
                      <td>{{$sponsorship->eventAddress}}</td>
                      <td>
                        @if ($inCharge !== null)
                        @foreach ($inCharge as $item)
                            - {{$item}} <br>
                        @endforeach
                        @else
                        Not approved yet
                        @endif
                      </td>
                      <td>{{$sponsorCartons}}</td>
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
                    </tr>
                    @endforeach
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @php
  $eventData = [];
  foreach ($sponsor as $sponsorship) {
      $eventData[] = [
          'title' => $sponsorship->event_name,
          'start' => $sponsorship->from_date,
          'end' => $sponsorship->to_date,
          // Add other event properties as needed
      ];
  }
   @endphp


<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection