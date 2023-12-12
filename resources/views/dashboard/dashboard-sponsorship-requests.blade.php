@extends('partial.dashboard-main')

@section('title', 'View Request')
    
@section('content')
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Sponsorship Request</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Sponsorship Request</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="container-fluid">
      @if ($sponsor->states == "Processing")
  
      @elseif($sponsor->status == "approval")
      
      @elseif($sponsor->status == "proof")
      
      @elseif($sponsor->status == "collect")
      
      @elseif($sponsor->status == "complete")
      
      @endif
      
      <div class="row">

        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <b>Person In Charge Details</b>
              </h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" readonly value="{{$sponsor->fullname}}"><br>
                </div>
                <div class="col-lg-6">
                  <label class="form-label">Contact Number</label>
                  <input type="text" class="form-control" readonly value="{{$sponsor->contact}}"><br>
                </div>
                <div class="col-lg-6">
                  <label class="form-label">Email Address</label>
                  <input type="text" class="form-control" readonly value="{{$sponsor->email}}"><br>
                </div>
                <div class="col-lg-6">
                  <label class="form-label">Organization/Individual Hosting the Event</label>
                  <input type="text" class="form-control" readonly value="{{$sponsor->organization}}"><br>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <b>Event / Project Details</b>
              </h3>
            </div>
            <div class="card-body">
              
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <b>Event / Project Details</b>
              </h3>
            </div>
            <div class="card-body">
              
            </div>
          </div>
        </div>

      </div>


    </div>
  </section>
</div>
@endsection