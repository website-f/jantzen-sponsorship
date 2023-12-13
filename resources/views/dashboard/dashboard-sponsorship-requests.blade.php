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
      
      <div class="row">

        <div class="col-lg-12">
          {{-- <div class="callout callout-info">
            <h5>There's Sponsorship Request waiting for your approval</h5>

            <p>
              @if ($sponsor->status == "proof")
              <a href="#proofAttachments" class="btn btn-info">View Proof Of Agreements</a>
              @else

              @endif
            </p>
          </div> --}}
          @if ($sponsor->states == "Processing")

          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Hi!</h4>
            <p>This Sponsorship Request waiting for your approval</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
              <a style="text-decoration: none" href="#approvalWaiting" class="btn btn-info">Show Me</a>
          </div>
  
          @elseif($sponsor->status == "approval")

          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Hi!</h4>
            <p>This Sponsorship Request waiting for proof of agreement from the user</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <hr>
          </div>
          
          @elseif($sponsor->status == "proof")

          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Hi!</h4>
            <p>This Sponsorship Request waiting for you to give location pickup</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <hr>
              <a style="text-decoration: none" href="#proofAttachments" class="btn btn-info">View Proof Of Agreements</a>
          </div>
          
          @elseif($sponsor->status == "collect")

          <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Hi!</h4>
            <p>This Sponsorship Request waiting for collection from the user</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <hr>
              <a style="text-decoration: none" href="#proofAttachments" class="btn btn-info">View Proof Of Agreements</a>
          </div>
          
          @elseif($sponsor->status == "complete")

          <div class="alert alert-secondary alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Hi!</h4>
            <p>This Sponsorship Request is complete and waiting for the user to give the after event attachments</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <hr>
              <a style="text-decoration: none" href="#proofAttachments" class="btn btn-info">View Proof Of Agreements</a>
          </div>
          
          @endif

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

        <div class="col-lg-7">
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

                @php
                    $proof = json_decode($sponsor->attachements_agreement_proof);
  
                    if ($proof !== null) {
                      $proofCounts = count($proof);
                    } else {
                      $proofCounts = 0;
                    }
                  @endphp
                @if ($proof !== null)
                <div class="col-lg-12 mb-3" id="proofAttachments">
                  <label class="form-label">Proof of Agreements</label><br>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenterProof">
                    View all attachments ({{$proofCounts}})
                  </button><br>
                  
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenterProof" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            @if ($proof !== null)
                                @foreach ($proof as $item)
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
                @endif

              </div>
            </div>
          </div>
        </div>

        @if ($sponsor->states == "Processing")
        <div class="col-lg-5" id="approvalWaiting">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <b>Approval</b>
              </h3>
            </div>
            <div class="card-body">
              <form action="/dashboard/request-submit/{{$sponsor->id}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-check"></i> Approve</button>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger w-100" data-toggle="modal" data-target="#rejectRequest">
                      <i class="fas fa-times-circle"></i> Reject
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="rejectRequest" tabindex="-1" role="dialog" aria-labelledby="rejectRequest" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Reject</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Are you sure want to reject {{$sponsor->event_name}} sponsorship ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="/reject" class="btn btn-danger"><i class="fas fa-times-circle"></i> Reject</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 mb-3">
                    <button type="button" class="btn btn-secondary w-100" data-toggle="modal" data-target="#blockRequest">
                      <i class="fas fa-minus-circle"></i> Add to Blocklist
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="blockRequest" tabindex="-1" role="dialog" aria-labelledby="blockRequest" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Block</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Are you sure want to add {{$sponsor->event_name}} sponsorship to blocklists ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="/block" class="btn btn-secondary"><i class="fas fa-minus-circle"></i> Add to Blocklist</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              
                <div class="row">
                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Attending</label>
                    <select class="select2" multiple="multiple" data-placeholder="Select attendees for this event (if need to open booth)" style="width: 100%;">
                      @foreach ($user as $item)
                        <option value="{{$item->name}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                    <input type="hidden" id="selectedValues" name="attending">
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Handle By</label>
                    <input type="text" class="form-control" name="handle_by" value="{{Auth::user()->name}}" required>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label class="form-label">Booth / Space</label>
                      <select name="booth_space" class="form-control" required>
                        <option value="">Select one...</option>
                        <option value="None">None</option>
                        <option value="Booth">Booth</option>
                        <option value="Space">Space</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <h4>Sponsorship Products</h4>
                    <hr>
                  </div> 

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 200ml x Cartons</label>
                    <input type="number" name="confirmro_200ml" class="form-control" value="0">
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 500ml x Cartons</label>
                    <input type="number" name="confirmro_500ml" class="form-control" value="0">
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 11L x Bottles</label>
                    <input type="number" name="confirmro_11L" class="form-control" value="0">
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Mineral 350ml x Cartons</label>
                    <input type="number" name="confirmro_350ml" class="form-control" value="0">
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Jantzen’s Paper Cup</label>
                    <input type="number" name="paper_cup" class="form-control" value="0">
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Jantzen’s Goodie Bags</label>
                    <input type="number" name="goodies_bag" class="form-control" value="0">
                  </div>

                  <div class="col-lg-12">
                    <hr>
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Others</label>
                    <textarea name="others" class="form-control" rows="3" placeholder="Others ..."></textarea>
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control" rows="3" placeholder="Remarks ..."></textarea>
                  </div>

                </div>
              </form>
            </div>
          </div>
        </div>

        @elseif($sponsor->status == "approval")
        <div class="col-lg-5">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <b>Send Mail</b>
              </h3>
            </div>
            <div class="card-body">
              
            </div>
          </div>
        </div>

        @elseif($sponsor->status == "proof")
        <div class="col-lg-5">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <b>Pickup Location</b>
              </h3>
            </div>
            <div class="card-body">
              <form action="/dashboard/request-submit/{{$sponsor->id}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label class="form-label">Pickup Location</label>
                      <select name="pickup_location" class="form-control pickup-location" required>
                        <option value="">Select one...</option>
                        <option value="Puchong">Puchong</option>
                        <option value="Shah Alam">Shah Alam</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Pickup Location Address</label>
                    <input type="text" class="form-control pickup-address" readonly>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Contact Person</label>
                    <input type="text" class="form-control contact-person" readonly>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control phone-number" readonly>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-check"></i> Update</button>
                  </div>
                </div>
              
              </form>
            </div>
          </div>
        </div>

        @endif

      </div>


    </div>
  </section>
</div>
<script>
  const pickup_location = document.querySelector(".pickup-location");
  const pickup_address = document.querySelector(".pickup-address");
  const contact_person = document.querySelector(".contact-person");
  const phone_number = document.querySelector(".phone-number");

  pickup_location.addEventListener("change", function() {
    if(pickup_location.value == "Puchong") {
      pickup_address.value = "12, Jalan Tpk 2/4, Taman Perindustrian Kinrara, 47180 Puchong, Selangor"
      contact_person.value = "Lily"
      phone_number.value = "011-10607533"
    } else if(pickup_location.value == "Shah Alam") {
      pickup_address.value = "75A, Jalan Snuker 13/28, Seksyen 13, 40100 Shah Alam, Selangor"
      contact_person.value = "Husniza | Yee Yong"
      phone_number.value = "011-10691533 | 012-7627066"
    }
  })

</script>
@endsection