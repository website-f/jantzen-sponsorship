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

        <div class="col-lg-12">
          <div class="callout callout-info">
            <h5>There's Sponsorship Request waiting for your approval</h5>

            <p>
              @if ($sponsor->status == "proof")
              <a href="#proofAttachments" class="btn btn-info">View Proof Of Agreements</button>
              @else

              @endif
            </p>
          </div>
        </div>

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

        <div class="col-7">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <b>Event / Project Details</b>
              </h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <label class="form-label">Name of the event / Project</label>
                  <input type="text" class="form-control" readonly value="{{$sponsor->event_name}}"><br>
                </div>
                <div class="col-lg-6">
                  <label class="form-label">Nature of the Event</label>
                  <input type="text" class="form-control" readonly value="{{$sponsor->nature_event}}"><br>
                </div>
                <div class="col-lg-6">
                  <label class="form-label">From</label>
                  <input type="text" class="form-control" readonly value="{{$sponsor->from_date}}"><br>
                </div>
                <div class="col-lg-6">
                  <label class="form-label">To</label>
                  <input type="text" class="form-control" readonly value="{{$sponsor->to_date}}"><br>
                </div>
                <div class="col-lg-12">
                  <label class="form-label">Event Address</label>
                  <input type="text" class="form-control" readonly value="{{$sponsor->eventAddress}}"><br>
                </div>
                <div class="col-lg-12">
                  <label class="form-label">Explanation of Product Use</label>
                  <input type="text" class="form-control" readonly value="{{$sponsor->explaination_product}}"><br>
                </div>
                <div class="col-lg-6">
                  <label class="form-label">Number of Expected Attendees</label>
                  <input type="text" class="form-control" readonly value="{{$sponsor->attendees}}"><br>
                </div>
                <div class="col-lg-6">
                  <label class="form-label">Can we place booth in your event?</label>
                  <input type="text" class="form-control" readonly value="{{$sponsor->booth}}"><br>
                </div>
                <div class="col-lg-12 mb-3">
                  <label class="form-label">Sponsorhip Attachments</label><br>
                  @php
                    $attach = json_decode($sponsor->sposorship_attachments);
  
                    if ($attach !== null) {
                      $attachCounts = count($attach);
                    } else {
                      $attachCounts = 0;
                    }
                  @endphp
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    View all attachments ({{$attachCounts}})
                  </button><br>
                  
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle"><a href="#" class="btn btn-info">Download All</a></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            @if ($attach !== null)
                                @foreach ($attach as $item)
                                   @if (pathinfo($item, PATHINFO_EXTENSION) === 'jpg' || pathinfo($item, PATHINFO_EXTENSION) === 'jpeg' || pathinfo($item, PATHINFO_EXTENSION) === 'png' || pathinfo($item, PATHINFO_EXTENSION) === 'gif')     
                                   {{-- <a data-glightbox data-gallery="gallery" href="{{ asset($item) }}">
                                        <img class="img-fluid" src="{{ asset($item) }}" alt="Image" width="200px" height="200px"> 
                                    </a>                         --}}
                                    <div class="col-lg-4">
                                      <a href="{{asset($item)}}">
                                        <img class="img-fluid" src="{{asset($item)}}" alt="Image" width="150px" height="150px">
                                      </a>
                                    </div>
                                   @else
                                   <div class="col-lg-4">
                                      <a class="btn btn-primary" href="{{ asset($item) }}" target="_blank">View File ({{pathinfo($item, PATHINFO_EXTENSION)}})</a>
                                   </div>
                                   @endif
                                @endforeach
                            @endif
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 

                <div class="col-lg-6">
                  <label class="form-label">Water - 200ml (48 Cups/carton)</label>
                  <input type="text" class="form-control" readonly value="{{$sponsor->ro_200ml}} Cartons"><br>
                </div>

                <div class="col-lg-6">
                  <label class="form-label">RO Water - 500ml (24 bottles/carton)</label>
                  <input type="text" class="form-control" readonly value="{{$sponsor->ro_500ml}} Cartons"><br>
                </div>

                <div class="col-lg-6">
                  <label class="form-label">RO Water - 11L (1 bottles)</label>
                  <input type="text" class="form-control" readonly value="{{$sponsor->ro_11L}} Cartons"><br>
                </div>

                <div class="col-lg-6">
                  <label class="form-label">Mineral Water - 350ml (24 bottles/carton)</label>
                  <input type="text" class="form-control" readonly value="{{$sponsor->ro_350ml}} Cartons"><br>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="col-5">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <b>Approval</b>
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