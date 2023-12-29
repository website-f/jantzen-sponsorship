@extends('partial.dashboard-main')

@section('title', 'Trash')
    
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Trash</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Trash</li>
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
                  <thead>
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
                        <a href="/dashboard/restore/{{$sponsorship->id}}" class="btn btn-primary">Restore</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal{{$sponsorship->id}}">
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
                                Are you sure want to permanently remove {{$sponsorship->event_name}} ?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="/dashboard/permanent-delete/{{$sponsorship->id}}" class="btn btn-danger">Confirm</a>
                              </div>
                            </div>
                          </div>
                        </div>
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
                      <td>{{$sponsorship->states}}</td>
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