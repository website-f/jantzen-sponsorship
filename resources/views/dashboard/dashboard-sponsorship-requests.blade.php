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

          <div class="alert alert-light alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Hi!</h4>
            <p>This Sponsorship Request waiting for the user to fill in collector information</p>
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
              {{-- <a style="text-decoration: none" href="#proofAttachments" class="btn btn-info">View Proof Of Agreements</a> --}}
          </div>
          
          @elseif($sponsor->status == "collected")

          <div class="alert alert-secondary alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Hi!</h4>
            <p>This Sponsorship Request is complete and waiting for the user to give the after event attachments</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <hr>
              {{-- <a style="text-decoration: none" href="#proofAttachments" class="btn btn-info">View Proof Of Agreements</a> --}}
          </div>

          @elseif($sponsor->status == "reject")

          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Hi!</h4>
            <p>This Sponsorship Request is rejected</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <hr>
              
          </div>

          @elseif($sponsor->status == "blacklist")

          <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Hi!</h4>
            <p>This Sponsorship Request is in the blacklists</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <hr>
              
          </div>

          @elseif($sponsor->status == "complete")

          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Hi!</h4>
            <p>This Sponsorship Request is complete</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <hr>
              <a style="text-decoration: none" href="#afterEvent" class="btn btn-info">View After Event Attachments</a>
          </div>
          
          @endif

        </div>

        

        <div class="col-lg-7">
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
                          <h5 class="modal-title" id="exampleModalLongTitle"><a href="/downloadAll/events/{{$sponsor->id}}" class="btn btn-info">Download All</a></h5>
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
                                        <img class="img-fluid" src="{{asset($item)}}" alt="Image" width="200px" height="200px">
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



        @if ($sponsor->states == "Processing")
        <div class="col-lg-5" id="approvalWaiting">
          <div class="card card-primary collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-check-circle"></i> <b>Approval</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <p>Current Status: 
                      @if ($sponsor->states == "Processing")
                      <button class="btn btn-warning btn-sm">{{$sponsor->states}}</button>            
                      @elseif ($sponsor->states == "Approved")  
                      <button class="btn btn-success btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "Pending")  
                      <button class="btn btn-info btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "Collected")  
                      <button class="btn btn-primary btn-sm">{{$sponsor->states}}</button>   
                      @elseif ($sponsor->states == "Blacklist")  
                      <button class="btn btn-dark btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "MIA")  
                      <button class="btn btn-secondary btn-sm">{{$sponsor->states}}</button>    
                      @elseif ($sponsor->states == "Rejected")  
                      <button class="btn btn-danger btn-sm">{{$sponsor->states}}</button>
                      @elseif ($sponsor->states == "Completed")  
                      <button class="btn btn-danger btn-sm">{{$sponsor->states}}</button>
                      @else
                      {{$sponsor->states}}
                      @endif
                  </p>
                </div>
              </div>
              <form action="/dashboard/request-submit/{{$sponsor->id}}" method="POST">
                @csrf
                @method('PUT')

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
                    <select name="handle_by" class="form-control" required>
                      <option value="">Select one...</option>
                      @foreach ($alluser as $item)
                        <option value="{{$item->name}}">{{$item->name}}</option>
                      @endforeach
                    </select>
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
                            <a href="/dashboard/reject/{{$sponsor->id}}" class="btn btn-danger"><i class="fas fa-times-circle"></i> Reject</a>
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
                            <a href="/dashboard/block/{{$sponsor->id}}" class="btn btn-secondary"><i class="fas fa-minus-circle"></i> Add to Blocklist</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <h4>Confirm Sponsorship Products</h4>
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
                    <textarea name="others" class="form-control" rows="3" placeholder="Others ..." required></textarea>
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control" rows="3" placeholder="Remarks ..."></textarea>
                  </div>

                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

        @elseif($sponsor->status == "approval")
        <div class="col-lg-5">
          <div class="card card-primary collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-check-circle"></i> <b>Approved</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <p>Current Status: 
                      @if ($sponsor->states == "Processing")
                      <button class="btn btn-warning btn-sm">{{$sponsor->states}}</button>            
                      @elseif ($sponsor->states == "Approved")  
                      <button class="btn btn-success btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "Pending")  
                      <button class="btn btn-info btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "Collected")  
                      <button class="btn btn-primary btn-sm">{{$sponsor->states}}</button>   
                      @elseif ($sponsor->states == "Blacklist")  
                      <button class="btn btn-dark btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "MIA")  
                      <button class="btn btn-secondary btn-sm">{{$sponsor->states}}</button>    
                      @elseif ($sponsor->states == "Rejected")  
                      <button class="btn btn-danger btn-sm">{{$sponsor->states}}</button>
                      @elseif ($sponsor->states == "Completed")  
                      <button class="btn btn-danger btn-sm">{{$sponsor->states}}</button>
                      @else
                      {{$sponsor->states}}
                      @endif
                  </p>
                </div>
              </div>
              <button type="button" class="btn btn-info w-100 mb-3" data-toggle="modal" data-target="#editRequest">
                Edit <i class="fas fa-edit"></i>
              </button><br>
              
              <!-- Modal -->
              <div class="modal fade" id="editRequest" tabindex="-1" role="dialog" aria-labelledby="editRequest" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="/dashboard/request-update/{{$sponsor->id}}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Attending</label>
                            <select class="select2" multiple="multiple" data-placeholder="Select attendees for this event (if need to open booth)" style="width: 100%;">
                              @php
                                  $attendees = json_decode($sponsor->attending);
                                  $attender = isset($attendees) ? $attendees : [];
                                  $selectedValues = isset($attendees) ? implode(',', $attendees) : '';
                              @endphp
                              
                              @foreach ($user as $item)
                                <option value="{{$item->name}}" {{ in_array($item->name, $attender) ? 'selected' : '' }}>{{$item->name}}</option>
                              @endforeach
                            </select>
                            <input type="hidden" id="selectedValues" name="attending" value="{{$selectedValues}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Handle By</label>
                            <select name="handle_by" class="form-control" required>
                              <option value="">Select one...</option>
                              @foreach ($alluser as $item)
                                  <option value="{{ $item->name }}" {{ $sponsor->handle_by == $item->name ? 'selected' : '' }}>
                                      {{ $item->name }}
                                  </option>
                              @endforeach
                            </select>
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <div class="form-group">
                              <label class="form-label">Booth / Space</label>
                              <select name="booth_space" class="form-control" required>
                                <option value="">Select one...</option>
                                <option value="None" {{$sponsor->booth_space == 'None' ? 'selected' : ''}}>None</option>
                                <option value="Booth" {{$sponsor->booth_space == 'Booth' ? 'selected' : ''}}>Booth</option>
                                <option value="Space" {{$sponsor->booth_space == 'Space' ? 'selected' : ''}}>Space</option>
                              </select>
                            </div>
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger w-100" data-toggle="modal" data-target="#rejectRequestEdit">
                              <i class="fas fa-times-circle"></i> Reject
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="rejectRequestEdit" tabindex="-1" role="dialog" aria-labelledby="rejectRequestEdit" aria-hidden="true">
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
                                    <a href="/dashboard/reject/{{$sponsor->id}}" class="btn btn-danger"><i class="fas fa-times-circle"></i> Reject</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 mb-3">
                            <button type="button" class="btn btn-secondary w-100" data-toggle="modal" data-target="#blockRequestEdit">
                              <i class="fas fa-minus-circle"></i> Add to Blocklist
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="blockRequestEdit" tabindex="-1" role="dialog" aria-labelledby="blockRequestEdit" aria-hidden="true">
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
                                    <a href="/dashboard/block/{{$sponsor->id}}" class="btn btn-secondary"><i class="fas fa-minus-circle"></i> Add to Blocklist</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
        
                          <div class="col-lg-12">
                            <h4>Confirm Sponsorship Products</h4>
                            <hr>
                          </div> 
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 200ml x Cartons</label>
                            <input type="number" name="confirmro_200ml" class="form-control" value="{{$sponsor->confirmro_200ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 500ml x Cartons</label>
                            <input type="number" name="confirmro_500ml" class="form-control" value="{{$sponsor->confirmro_500ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 11L x Bottles</label>
                            <input type="number" name="confirmro_11L" class="form-control" value="{{$sponsor->confirmro_11L}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Mineral 350ml x Cartons</label>
                            <input type="number" name="confirmro_350ml" class="form-control" value="{{$sponsor->confirmro_350ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Jantzen’s Paper Cup</label>
                            <input type="number" name="paper_cup" class="form-control" value="{{$sponsor->paper_cup}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Jantzen’s Goodie Bags</label>
                            <input type="number" name="goodies_bag" class="form-control" value="{{$sponsor->goodies_bag}}">
                          </div>
        
                          <div class="col-lg-12">
                            <hr>
                          </div>
        
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Others</label>
                            <textarea name="others" class="form-control" rows="3" placeholder="Others ..." required>{{$sponsor->others}}</textarea>
                          </div>
        
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Remarks</label>
                            @if ($sponsor->remarks !== null)
                            <textarea name="remarks" class="form-control" rows="3" placeholder="Remarks ...">{{$sponsor->remarks}}</textarea>
                            @else
                            <textarea name="remarks" class="form-control" rows="3" placeholder="Remarks ..."></textarea>
                            @endif
                          </div>
        
                          <div class="col-lg-12">
                            <h4>Change Status</h4>
                            <hr>
                          </div> 

                          <div class="col-lg-12 mb-3">
                            <div class="form-group">
                              <label class="form-label">Status</label>
                              <select name="states" class="form-control" required>
                                <option value="">Select one...</option>
                                <option value="Approved" {{$sponsor->states == 'Approved' ? 'selected' : ''}}>Approved</option>
                                <option value="Pending" {{$sponsor->states == 'Pending' ? 'selected' : ''}}>Pending</option>
                                <option value="Collected" {{$sponsor->states == 'Collected' ? 'selected' : ''}}>Collected</option>
                                <option value="MIA" {{$sponsor->states == 'MIA' ? 'selected' : ''}}>MIA</option>
                                <option value="Closed" {{$sponsor->states == 'Closed' ? 'selected' : ''}}>Closed</option>
                                <option value="Delay" {{$sponsor->states == 'Delay' ? 'selected' : ''}}>Delay</option>
                                <option value="Rejected" {{$sponsor->states == 'Rejected' ? 'selected' : ''}}>Rejected</option>
                                <option value="Blacklist" {{$sponsor->states == 'Blacklist' ? 'selected' : ''}}>Blacklist</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              
                <div class="row">
                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Attending</label>
                    @php
                        $attending = json_decode($sponsor->attending);
                        $attendees = "";
                        if ($attending !== null) {
                          foreach ($attending as $attend) {
                            $attendees .= $attend . ",";
                          }
                        }
                    @endphp
                    @if ($attending !== null)
                        <input type="text" class="form-control" value="{{$attendees}}" readonly>
                    @endif
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Handle By</label>
                    <input type="text" class="form-control" value="{{$sponsor->handle_by}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label class="form-label">Booth / Space</label>
                      <input type="text" class="form-control" value="{{$sponsor->booth_space}}" readonly>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <h4>Confirm Sponsorship Products</h4>
                    <hr>
                  </div> 

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 200ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_200ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 500ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_500ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 11L x Bottles</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_11L}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Mineral 350ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_350ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Jantzen’s Paper Cup</label>
                    <input type="text" class="form-control" value="{{$sponsor->paper_cup}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Jantzen’s Goodie Bags</label>
                    <input type="text" class="form-control" value="{{$sponsor->goodies_bag}}" readonly>
                  </div>

                  <div class="col-lg-12">
                    <hr>
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Others</label>
                    <textarea class="form-control" rows="3" placeholder="Others ..." readonly>{{$sponsor->others}}</textarea>
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea class="form-control" rows="3" placeholder="Remarks ..." readonly>{{$sponsor->remarks}}</textarea>
                  </div>

                </div>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="card card-success collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-envelope"></i> <b>Send Mail</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="/sendMailTemplate/{{$sponsor->email}}/{{$sponsor->id}}" method="POST">
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
                    <input type="text" name="pickup_address" class="form-control pickup-address" readonly>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Contact Person</label>
                    <input type="text" name="contact_person" class="form-control contact-person" readonly>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="pickup_phone_number" class="form-control phone-number" readonly>
                  </div>
                </div>

                <div class="row">
                  @foreach($templates as $template)
                    <div class="col-lg-6 mb-3">
                      <div class="card">
                          <div class="card-body">
                              <h5 class="card-title mb-2">{{ basename($template, '.blade.php') }}</h5>
                              <p class="card-text">
    
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#view{{ basename($template, '.blade.php') }}">
                                  View Template
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="view{{ basename($template, '.blade.php') }}" tabindex="-1" role="dialog" aria-labelledby="view{{ basename($template, '.blade.php') }}" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{ basename($template, '.blade.php') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <input type="hidden" id="template-id-{{ basename($template, '.blade.php') }}" value="{{$sponsor->id}}">
                                        <button type="button" class="btn btn-primary editTemplate" data-target="{{ basename($template, '.blade.php') }}">Edit Template</button>
                                        <button type="button" class="btn btn-success saveChanges" data-target="{{ basename($template, '.blade.php') }}" style="display:none;">Save Changes</button>
                                        <div id="template-content-{{ basename($template, '.blade.php') }}">{!! file_get_contents($template) !!}</div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                  
                                
                              </p>
                              <input style="font-style: 30px;" type="radio" class="btn-check" name="template" id="{{ basename($template, '.blade.php') }}" autocomplete="off" value="{{ basename($template, '.blade.php') }}">
                              <label class="btn btn-outline-primary btn-sm" for="{{ basename($template, '.blade.php') }}">Select Template</label>
                          </div>
                      </div>
                    </div>
                  @endforeach
                </div>
                <button type="submit" class="btn btn-primary w-100">
                  
                  Send Email
                </button>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

        @elseif($sponsor->status == "reject")
        <div class="col-lg-5">
          <div class="card card-danger collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-check-circle"></i> <b>Request rejected</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <p>Current Status: 
                      @if ($sponsor->states == "Processing")
                      <button class="btn btn-warning btn-sm">{{$sponsor->states}}</button>            
                      @elseif ($sponsor->states == "Approved")  
                      <button class="btn btn-success btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "Pending")  
                      <button class="btn btn-info btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "Collected")  
                      <button class="btn btn-primary btn-sm">{{$sponsor->states}}</button>   
                      @elseif ($sponsor->states == "Blacklist")  
                      <button class="btn btn-dark btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "MIA")  
                      <button class="btn btn-secondary btn-sm">{{$sponsor->states}}</button>    
                      @elseif ($sponsor->states == "Rejected")  
                      <button class="btn btn-danger btn-sm">{{$sponsor->states}}</button>
                      @elseif ($sponsor->states == "Completed")  
                      <button class="btn btn-danger btn-sm">{{$sponsor->states}}</button>
                      @else
                      {{$sponsor->states}}
                      @endif
                  </p>
                </div>
              </div>
              <button type="button" class="btn btn-info w-100 mb-3" data-toggle="modal" data-target="#editRequest">
                Edit <i class="fas fa-edit"></i>
              </button><br>
              
              <!-- Modal -->
              <div class="modal fade" id="editRequest" tabindex="-1" role="dialog" aria-labelledby="editRequest" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="/dashboard/request-update/{{$sponsor->id}}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Attending</label>
                            <select class="select2" multiple="multiple" data-placeholder="Select attendees for this event (if need to open booth)" style="width: 100%;">
                              @php
                                  $attendees = json_decode($sponsor->attending);
                                  $attender = isset($attendees) ? $attendees : [];
                                  $selectedValues = isset($attendees) ? implode(',', $attendees) : '';
                              @endphp
                              
                              @foreach ($user as $item)
                                <option value="{{$item->name}}" {{ in_array($item->name, $attender) ? 'selected' : '' }}>{{$item->name}}</option>
                              @endforeach
                            </select>
                            <input type="hidden" id="selectedValues" name="attending" value="{{$selectedValues}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Handle By</label>
                            <select name="handle_by" class="form-control" required>
                              <option value="">Select one...</option>
                              @foreach ($alluser as $item)
                                  <option value="{{ $item->name }}" {{ $sponsor->handle_by == $item->name ? 'selected' : '' }}>
                                      {{ $item->name }}
                                  </option>
                              @endforeach
                            </select>
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <div class="form-group">
                              <label class="form-label">Booth / Space</label>
                              <select name="booth_space" class="form-control" required>
                                <option value="">Select one...</option>
                                <option value="None" {{$sponsor->booth_space == 'None' ? 'selected' : ''}}>None</option>
                                <option value="Booth" {{$sponsor->booth_space == 'Booth' ? 'selected' : ''}}>Booth</option>
                                <option value="Space" {{$sponsor->booth_space == 'Space' ? 'selected' : ''}}>Space</option>
                              </select>
                            </div>
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger w-100" data-toggle="modal" data-target="#rejectRequestEdit">
                              <i class="fas fa-times-circle"></i> Reject
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="rejectRequestEdit" tabindex="-1" role="dialog" aria-labelledby="rejectRequestEdit" aria-hidden="true">
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
                                    <a href="/dashboard/reject/{{$sponsor->id}}" class="btn btn-danger"><i class="fas fa-times-circle"></i> Reject</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 mb-3">
                            <button type="button" class="btn btn-secondary w-100" data-toggle="modal" data-target="#blockRequestEdit">
                              <i class="fas fa-minus-circle"></i> Add to Blocklist
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="blockRequestEdit" tabindex="-1" role="dialog" aria-labelledby="blockRequestEdit" aria-hidden="true">
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
                                    <a href="/dashboard/block/{{$sponsor->id}}" class="btn btn-secondary"><i class="fas fa-minus-circle"></i> Add to Blocklist</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
        
                          <div class="col-lg-12">
                            <h4>Confirm Sponsorship Products</h4>
                            <hr>
                          </div> 
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 200ml x Cartons</label>
                            <input type="number" name="confirmro_200ml" class="form-control" value="{{$sponsor->confirmro_200ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 500ml x Cartons</label>
                            <input type="number" name="confirmro_500ml" class="form-control" value="{{$sponsor->confirmro_500ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 11L x Bottles</label>
                            <input type="number" name="confirmro_11L" class="form-control" value="{{$sponsor->confirmro_11L}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Mineral 350ml x Cartons</label>
                            <input type="number" name="confirmro_350ml" class="form-control" value="{{$sponsor->confirmro_350ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Jantzen’s Paper Cup</label>
                            <input type="number" name="paper_cup" class="form-control" value="{{$sponsor->paper_cup}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Jantzen’s Goodie Bags</label>
                            <input type="number" name="goodies_bag" class="form-control" value="{{$sponsor->goodies_bag}}">
                          </div>
        
                          <div class="col-lg-12">
                            <hr>
                          </div>
        
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Others</label>
                            <textarea name="others" class="form-control" rows="3" placeholder="Others ..." required>{{$sponsor->others}}</textarea>
                          </div>
        
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Remarks</label>
                            @if ($sponsor->remarks !== null)
                            <textarea name="remarks" class="form-control" rows="3" placeholder="Remarks ...">{{$sponsor->remarks}}</textarea>
                            @else
                            <textarea name="remarks" class="form-control" rows="3" placeholder="Remarks ..."></textarea>
                            @endif
                          </div>
        
                          <div class="col-lg-12">
                            <h4>Change Status</h4>
                            <hr>
                          </div> 

                          <div class="col-lg-12 mb-3">
                            <div class="form-group">
                              <label class="form-label">Status</label>
                              <select name="states" class="form-control" required>
                                <option value="">Select one...</option>
                                <option value="Approved" {{$sponsor->states == 'Approved' ? 'selected' : ''}}>Approved</option>
                                <option value="Pending" {{$sponsor->states == 'Pending' ? 'selected' : ''}}>Pending</option>
                                <option value="Collected" {{$sponsor->states == 'Collected' ? 'selected' : ''}}>Collected</option>
                                <option value="MIA" {{$sponsor->states == 'MIA' ? 'selected' : ''}}>MIA</option>
                                <option value="Closed" {{$sponsor->states == 'Closed' ? 'selected' : ''}}>Closed</option>
                                <option value="Delay" {{$sponsor->states == 'Delay' ? 'selected' : ''}}>Delay</option>
                                <option value="Rejected" {{$sponsor->states == 'Rejected' ? 'selected' : ''}}>Rejected</option>
                                <option value="Blacklist" {{$sponsor->states == 'Blacklist' ? 'selected' : ''}}>Blacklist</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              
                <div class="row">
                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Attending</label>
                    @php
                        $attending = json_decode($sponsor->attending);
                        $attendees = "";
                        if ($attending !== null) {
                          foreach ($attending as $attend) {
                            $attendees .= $attend . ",";
                          }
                        }
                    @endphp
                    @if ($attending !== null)
                        <input type="text" class="form-control" value="{{$attendees}}" readonly>
                    @endif
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Handle By</label>
                    <input type="text" class="form-control" value="{{$sponsor->handle_by}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label class="form-label">Booth / Space</label>
                      <input type="text" class="form-control" value="{{$sponsor->booth_space}}" readonly>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <h4>Confirm Sponsorship Products</h4>
                    <hr>
                  </div> 

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 200ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_200ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 500ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_500ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 11L x Bottles</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_11L}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Mineral 350ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_350ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Jantzen’s Paper Cup</label>
                    <input type="text" class="form-control" value="{{$sponsor->paper_cup}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Jantzen’s Goodie Bags</label>
                    <input type="text" class="form-control" value="{{$sponsor->goodies_bag}}" readonly>
                  </div>

                  <div class="col-lg-12">
                    <hr>
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Others</label>
                    <textarea class="form-control" rows="3" placeholder="Others ..." readonly>{{$sponsor->others}}</textarea>
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea class="form-control" rows="3" placeholder="Remarks ..." readonly>{{$sponsor->remarks}}</textarea>
                  </div>

                </div>
            </div>
            <!-- /.card-body -->
          </div>   
        </div>

        @elseif($sponsor->status == "proof")
        <div class="col-lg-5">
          <div class="card card-primary collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-check-circle"></i> <b>Approved</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <p>Current Status: 
                      @if ($sponsor->states == "Processing")
                      <button class="btn btn-warning btn-sm">{{$sponsor->states}}</button>            
                      @elseif ($sponsor->states == "Approved")  
                      <button class="btn btn-success btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "Pending")  
                      <button class="btn btn-info btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "Collected")  
                      <button class="btn btn-primary btn-sm">{{$sponsor->states}}</button>   
                      @elseif ($sponsor->states == "Blacklist")  
                      <button class="btn btn-dark btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "MIA")  
                      <button class="btn btn-secondary btn-sm">{{$sponsor->states}}</button>    
                      @elseif ($sponsor->states == "Rejected")  
                      <button class="btn btn-danger btn-sm">{{$sponsor->states}}</button>
                      @elseif ($sponsor->states == "Completed")  
                      <button class="btn btn-danger btn-sm">{{$sponsor->states}}</button>
                      @else
                      {{$sponsor->states}}
                      @endif
                  </p>
                </div>
              </div>
              <button type="button" class="btn btn-info w-100 mb-3" data-toggle="modal" data-target="#editRequest">
                Edit <i class="fas fa-edit"></i>
              </button><br>
              
              <!-- Modal -->
              <div class="modal fade" id="editRequest" tabindex="-1" role="dialog" aria-labelledby="editRequest" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="/dashboard/request-update/{{$sponsor->id}}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Attending</label>
                            <select class="select2" multiple="multiple" data-placeholder="Select attendees for this event (if need to open booth)" style="width: 100%;">
                              @php
                                  $attendees = json_decode($sponsor->attending);
                                  $attender = isset($attendees) ? $attendees : [];
                                  $selectedValues = isset($attendees) ? implode(',', $attendees) : '';
                              @endphp
                              
                              @foreach ($user as $item)
                                <option value="{{$item->name}}" {{ in_array($item->name, $attender) ? 'selected' : '' }}>{{$item->name}}</option>
                              @endforeach
                            </select>
                            <input type="hidden" id="selectedValues" name="attending" value="{{$selectedValues}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Handle By</label>
                            <select name="handle_by" class="form-control" required>
                              <option value="">Select one...</option>
                              @foreach ($alluser as $item)
                                  <option value="{{ $item->name }}" {{ $sponsor->handle_by == $item->name ? 'selected' : '' }}>
                                      {{ $item->name }}
                                  </option>
                              @endforeach
                            </select>
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <div class="form-group">
                              <label class="form-label">Booth / Space</label>
                              <select name="booth_space" class="form-control" required>
                                <option value="">Select one...</option>
                                <option value="None" {{$sponsor->booth_space == 'None' ? 'selected' : ''}}>None</option>
                                <option value="Booth" {{$sponsor->booth_space == 'Booth' ? 'selected' : ''}}>Booth</option>
                                <option value="Space" {{$sponsor->booth_space == 'Space' ? 'selected' : ''}}>Space</option>
                              </select>
                            </div>
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger w-100" data-toggle="modal" data-target="#rejectRequestEdit">
                              <i class="fas fa-times-circle"></i> Reject
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="rejectRequestEdit" tabindex="-1" role="dialog" aria-labelledby="rejectRequestEdit" aria-hidden="true">
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
                                    <a href="/dashboard/reject/{{$sponsor->id}}" class="btn btn-danger"><i class="fas fa-times-circle"></i> Reject</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 mb-3">
                            <button type="button" class="btn btn-secondary w-100" data-toggle="modal" data-target="#blockRequestEdit">
                              <i class="fas fa-minus-circle"></i> Add to Blocklist
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="blockRequestEdit" tabindex="-1" role="dialog" aria-labelledby="blockRequestEdit" aria-hidden="true">
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
                                    <a href="/dashboard/block/{{$sponsor->id}}" class="btn btn-secondary"><i class="fas fa-minus-circle"></i> Add to Blocklist</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
        
                          <div class="col-lg-12">
                            <h4>Confirm Sponsorship Products</h4>
                            <hr>
                          </div> 
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 200ml x Cartons</label>
                            <input type="number" name="confirmro_200ml" class="form-control" value="{{$sponsor->confirmro_200ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 500ml x Cartons</label>
                            <input type="number" name="confirmro_500ml" class="form-control" value="{{$sponsor->confirmro_500ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 11L x Bottles</label>
                            <input type="number" name="confirmro_11L" class="form-control" value="{{$sponsor->confirmro_11L}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Mineral 350ml x Cartons</label>
                            <input type="number" name="confirmro_350ml" class="form-control" value="{{$sponsor->confirmro_350ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Jantzen’s Paper Cup</label>
                            <input type="number" name="paper_cup" class="form-control" value="{{$sponsor->paper_cup}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Jantzen’s Goodie Bags</label>
                            <input type="number" name="goodies_bag" class="form-control" value="{{$sponsor->goodies_bag}}">
                          </div>
        
                          <div class="col-lg-12">
                            <hr>
                          </div>
        
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Others</label>
                            <textarea name="others" class="form-control" rows="3" placeholder="Others ..." required>{{$sponsor->others}}</textarea>
                          </div>
        
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Remarks</label>
                            @if ($sponsor->remarks !== null)
                            <textarea name="remarks" class="form-control" rows="3" placeholder="Remarks ...">{{$sponsor->remarks}}</textarea>
                            @else
                            <textarea name="remarks" class="form-control" rows="3" placeholder="Remarks ..."></textarea>
                            @endif
                          </div>
        
                          <div class="col-lg-12">
                            <h4>Change Status</h4>
                            <hr>
                          </div> 

                          <div class="col-lg-12 mb-3">
                            <div class="form-group">
                              <label class="form-label">Status</label>
                              <select name="states" class="form-control" required>
                                <option value="">Select one...</option>
                                <option value="Approved" {{$sponsor->states == 'Approved' ? 'selected' : ''}}>Approved</option>
                                <option value="Pending" {{$sponsor->states == 'Pending' ? 'selected' : ''}}>Pending</option>
                                <option value="Collected" {{$sponsor->states == 'Collected' ? 'selected' : ''}}>Collected</option>
                                <option value="MIA" {{$sponsor->states == 'MIA' ? 'selected' : ''}}>MIA</option>
                                <option value="Closed" {{$sponsor->states == 'Closed' ? 'selected' : ''}}>Closed</option>
                                <option value="Delay" {{$sponsor->states == 'Delay' ? 'selected' : ''}}>Delay</option>
                                <option value="Rejected" {{$sponsor->states == 'Rejected' ? 'selected' : ''}}>Rejected</option>
                                <option value="Blacklist" {{$sponsor->states == 'Blacklist' ? 'selected' : ''}}>Blacklist</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              
                <div class="row">
                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Attending</label>
                    @php
                        $attending = json_decode($sponsor->attending);
                        $attendees = "";
                        if ($attending !== null) {
                          foreach ($attending as $attend) {
                            $attendees .= $attend . ",";
                          }
                        }
                    @endphp
                    @if ($attending !== null)
                        <input type="text" class="form-control" value="{{$attendees}}" readonly>
                    @endif
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Handle By</label>
                    <input type="text" class="form-control" value="{{$sponsor->handle_by}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label class="form-label">Booth / Space</label>
                      <input type="text" class="form-control" value="{{$sponsor->booth_space}}" readonly>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <h4>Confirm Sponsorship Products</h4>
                    <hr>
                  </div> 

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 200ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_200ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 500ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_500ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 11L x Bottles</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_11L}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Mineral 350ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_350ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Jantzen’s Paper Cup</label>
                    <input type="text" class="form-control" value="{{$sponsor->paper_cup}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Jantzen’s Goodie Bags</label>
                    <input type="text" class="form-control" value="{{$sponsor->goodies_bag}}" readonly>
                  </div>

                  <div class="col-lg-12">
                    <hr>
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Others</label>
                    <textarea class="form-control" rows="3" placeholder="Others ..." readonly>{{$sponsor->others}}</textarea>
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea class="form-control" rows="3" placeholder="Remarks ..." readonly>{{$sponsor->remarks}}</textarea>
                  </div>

                </div>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="card card-success collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-envelope"></i> <b>Send Mail</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="/sendMailTemplate/{{$sponsor->email}}/{{$sponsor->id}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label class="form-label">Pickup Location</label>
                      <select name="pickup_location" class="form-control pickup-location" required>
                        <option value="">Select one...</option>
                        <option value="Puchong" {{$sponsor->pickup_location == "Puchong" ? 'selected' : ''}}>Puchong</option>
                        <option value="Shah Alam" {{$sponsor->pickup_location == "Shah Alam" ? 'selected' : ''}}>Shah Alam</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Pickup Location Address</label>
                    @if ($sponsor->pickup_address !== null)
                    <input type="text" name="pickup_address" class="form-control pickup-address" readonly value="{{$sponsor->pickup_address}}">
                    @else
                    <input type="text" name="pickup_address" class="form-control pickup-address" readonly>
                    @endif
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Contact Person</label>
                    @if ($sponsor->contact_person !== null)
                    <input type="text" name="contact_person" class="form-control contact-person" readonly value="{{$sponsor->contact_person}}">
                    @else
                    <input type="text" name="contact_person" class="form-control contact-person" readonly>
                    @endif
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Phone Number</label>
                    @if ($sponsor->pickup_phone_number !== null)
                    <input type="text" name="pickup_phone_number" class="form-control phone-number" readonly value="{{$sponsor->pickup_phone_number}}">
                    @else
                    <input type="text" name="pickup_phone_number" class="form-control phone-number" readonly>
                    @endif
                  </div>
                </div>

                <div class="row">
                  @foreach($templates as $template)
                    <div class="col-lg-6 mb-3">
                      <div class="card">
                          <div class="card-body">
                              <h5 class="card-title mb-2">{{ basename($template, '.blade.php') }}</h5>
                              <p class="card-text">
    
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#view{{ basename($template, '.blade.php') }}">
                                  View Template
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="view{{ basename($template, '.blade.php') }}" tabindex="-1" role="dialog" aria-labelledby="view{{ basename($template, '.blade.php') }}" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{ basename($template, '.blade.php') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <input type="hidden" id="template-id-{{ basename($template, '.blade.php') }}" value="{{$sponsor->id}}">
                                        <button type="button" class="btn btn-primary editTemplate" data-target="{{ basename($template, '.blade.php') }}">Edit Template</button>
                                        <button type="button" class="btn btn-success saveChanges" data-target="{{ basename($template, '.blade.php') }}" style="display:none;">Save Changes</button>
                                        <div id="template-content-{{ basename($template, '.blade.php') }}">{!! file_get_contents($template) !!}</div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                  
                                
                              </p>
                              <input style="font-style: 30px;" type="radio" class="btn-check" name="template" id="{{ basename($template, '.blade.php') }}" autocomplete="off" value="{{ basename($template, '.blade.php') }}">
                              <label class="btn btn-outline-primary btn-sm" for="{{ basename($template, '.blade.php') }}">Select Template</label>
                          </div>
                      </div>
                    </div>
                  @endforeach
                </div>
                <button type="submit" class="btn btn-primary w-100">
                  
                  Send Email
                </button>
              </form>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="card card-warning collapsed-card" id="proofAttachments">
            <div class="card-header">
              @php
                    $proof = json_decode($sponsor->attachements_agreement_proof);
  
                    if ($proof !== null) {
                      $proofCounts = count($proof);
                    } else {
                      $proofCounts = 0;
                    }
              @endphp
              <h3 class="card-title"><i class="fas fa-file-archive"></i> <b>Proof of Agreements ({{$proofCounts}})</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="/downloadAll/proof/{{$sponsor->id}}" class="btn btn-primary w-100 mb-3">
                Download All
              </a>
                <div class="row">
                  @if ($proof !== null)
                      @foreach ($proof as $item)
                         @if (pathinfo($item, PATHINFO_EXTENSION) === 'jpg' || pathinfo($item, PATHINFO_EXTENSION) === 'jpeg' || pathinfo($item, PATHINFO_EXTENSION) === 'png' || pathinfo($item, PATHINFO_EXTENSION) === 'gif')     
                         {{-- <a data-glightbox data-gallery="gallery" href="{{ asset($item) }}">
                              <img class="img-fluid" src="{{ asset($item) }}" alt="Image" width="200px" height="200px"> 
                          </a>                         --}}
                          <div class="col-lg-3 mb-2">
                            <a href="{{asset($item)}}">
                              <img class="img-fluid" src="{{asset($item)}}" alt="Image" width="150px" height="150px">
                            </a>
                          </div>
                         @else
                         <div class="col-lg-3 mb-2">
                            <a class="btn btn-primary" href="{{ asset($item) }}" target="_blank">View File ({{pathinfo($item, PATHINFO_EXTENSION)}})</a>
                         </div>
                         @endif
                      @endforeach
                  @endif
                </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

        @elseif($sponsor->status == "collect")
        <div class="col-lg-5">
          <div class="card card-primary collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-check-circle"></i> <b>Approved</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <p>Current Status: 
                      @if ($sponsor->states == "Processing")
                      <button class="btn btn-warning btn-sm">{{$sponsor->states}}</button>            
                      @elseif ($sponsor->states == "Approved")  
                      <button class="btn btn-success btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "Pending")  
                      <button class="btn btn-info btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "Collected")  
                      <button class="btn btn-primary btn-sm">{{$sponsor->states}}</button>   
                      @elseif ($sponsor->states == "Blacklist")  
                      <button class="btn btn-dark btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "MIA")  
                      <button class="btn btn-secondary btn-sm">{{$sponsor->states}}</button>    
                      @elseif ($sponsor->states == "Rejected")  
                      <button class="btn btn-danger btn-sm">{{$sponsor->states}}</button>
                      @elseif ($sponsor->states == "Completed")  
                      <button class="btn btn-danger btn-sm">{{$sponsor->states}}</button>
                      @else
                      {{$sponsor->states}}
                      @endif
                  </p>
                </div>
              </div>
              <button type="button" class="btn btn-info w-100 mb-3" data-toggle="modal" data-target="#editRequest">
                Edit <i class="fas fa-edit"></i>
              </button><br>
              
              <!-- Modal -->
              <div class="modal fade" id="editRequest" tabindex="-1" role="dialog" aria-labelledby="editRequest" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="/dashboard/request-update/{{$sponsor->id}}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Attending</label>
                            <select class="select2" multiple="multiple" data-placeholder="Select attendees for this event (if need to open booth)" style="width: 100%;">
                              @php
                                  $attendees = json_decode($sponsor->attending);
                                  $attender = isset($attendees) ? $attendees : [];
                                  $selectedValues = isset($attendees) ? implode(',', $attendees) : '';
                              @endphp
                              
                              @foreach ($user as $item)
                                <option value="{{$item->name}}" {{ in_array($item->name, $attender) ? 'selected' : '' }}>{{$item->name}}</option>
                              @endforeach
                            </select>
                            <input type="hidden" id="selectedValues" name="attending" value="{{$selectedValues}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Handle By</label>
                            <select name="handle_by" class="form-control" required>
                              <option value="">Select one...</option>
                              @foreach ($alluser as $item)
                                  <option value="{{ $item->name }}" {{ $sponsor->handle_by == $item->name ? 'selected' : '' }}>
                                      {{ $item->name }}
                                  </option>
                              @endforeach
                            </select>
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <div class="form-group">
                              <label class="form-label">Booth / Space</label>
                              <select name="booth_space" class="form-control" required>
                                <option value="">Select one...</option>
                                <option value="None" {{$sponsor->booth_space == 'None' ? 'selected' : ''}}>None</option>
                                <option value="Booth" {{$sponsor->booth_space == 'Booth' ? 'selected' : ''}}>Booth</option>
                                <option value="Space" {{$sponsor->booth_space == 'Space' ? 'selected' : ''}}>Space</option>
                              </select>
                            </div>
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger w-100" data-toggle="modal" data-target="#rejectRequestEdit">
                              <i class="fas fa-times-circle"></i> Reject
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="rejectRequestEdit" tabindex="-1" role="dialog" aria-labelledby="rejectRequestEdit" aria-hidden="true">
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
                                    <a href="/dashboard/reject/{{$sponsor->id}}" class="btn btn-danger"><i class="fas fa-times-circle"></i> Reject</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 mb-3">
                            <button type="button" class="btn btn-secondary w-100" data-toggle="modal" data-target="#blockRequestEdit">
                              <i class="fas fa-minus-circle"></i> Add to Blocklist
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="blockRequestEdit" tabindex="-1" role="dialog" aria-labelledby="blockRequestEdit" aria-hidden="true">
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
                                    <a href="/dashboard/block/{{$sponsor->id}}" class="btn btn-secondary"><i class="fas fa-minus-circle"></i> Add to Blocklist</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
        
                          <div class="col-lg-12">
                            <h4>Confirm Sponsorship Products</h4>
                            <hr>
                          </div> 
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 200ml x Cartons</label>
                            <input type="number" name="confirmro_200ml" class="form-control" value="{{$sponsor->confirmro_200ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 500ml x Cartons</label>
                            <input type="number" name="confirmro_500ml" class="form-control" value="{{$sponsor->confirmro_500ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 11L x Bottles</label>
                            <input type="number" name="confirmro_11L" class="form-control" value="{{$sponsor->confirmro_11L}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Mineral 350ml x Cartons</label>
                            <input type="number" name="confirmro_350ml" class="form-control" value="{{$sponsor->confirmro_350ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Jantzen’s Paper Cup</label>
                            <input type="number" name="paper_cup" class="form-control" value="{{$sponsor->paper_cup}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Jantzen’s Goodie Bags</label>
                            <input type="number" name="goodies_bag" class="form-control" value="{{$sponsor->goodies_bag}}">
                          </div>
        
                          <div class="col-lg-12">
                            <hr>
                          </div>
        
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Others</label>
                            <textarea name="others" class="form-control" rows="3" placeholder="Others ..." required>{{$sponsor->others}}</textarea>
                          </div>
        
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Remarks</label>
                            @if ($sponsor->remarks !== null)
                            <textarea name="remarks" class="form-control" rows="3" placeholder="Remarks ...">{{$sponsor->remarks}}</textarea>
                            @else
                            <textarea name="remarks" class="form-control" rows="3" placeholder="Remarks ..."></textarea>
                            @endif
                          </div>
        
                          <div class="col-lg-12">
                            <h4>Change Status</h4>
                            <hr>
                          </div> 

                          <div class="col-lg-12 mb-3">
                            <div class="form-group">
                              <label class="form-label">Status</label>
                              <select name="states" class="form-control" required>
                                <option value="">Select one...</option>
                                <option value="Approved" {{$sponsor->states == 'Approved' ? 'selected' : ''}}>Approved</option>
                                <option value="Pending" {{$sponsor->states == 'Pending' ? 'selected' : ''}}>Pending</option>
                                <option value="Collected" {{$sponsor->states == 'Collected' ? 'selected' : ''}}>Collected</option>
                                <option value="MIA" {{$sponsor->states == 'MIA' ? 'selected' : ''}}>MIA</option>
                                <option value="Closed" {{$sponsor->states == 'Closed' ? 'selected' : ''}}>Closed</option>
                                <option value="Delay" {{$sponsor->states == 'Delay' ? 'selected' : ''}}>Delay</option>
                                <option value="Rejected" {{$sponsor->states == 'Rejected' ? 'selected' : ''}}>Rejected</option>
                                <option value="Blacklist" {{$sponsor->states == 'Blacklist' ? 'selected' : ''}}>Blacklist</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              
                <div class="row">
                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Attending</label>
                    @php
                        $attending = json_decode($sponsor->attending);
                        $attendees = "";
                        if ($attending !== null) {
                          foreach ($attending as $attend) {
                            $attendees .= $attend . ",";
                          }
                        }
                    @endphp
                    @if ($attending !== null)
                        <input type="text" class="form-control" value="{{$attendees}}" readonly>
                    @endif
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Handle By</label>
                    <input type="text" class="form-control" value="{{$sponsor->handle_by}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label class="form-label">Booth / Space</label>
                      <input type="text" class="form-control" value="{{$sponsor->booth_space}}" readonly>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <h4>Confirm Sponsorship Products</h4>
                    <hr>
                  </div> 

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 200ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_200ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 500ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_500ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 11L x Bottles</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_11L}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Mineral 350ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_350ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Jantzen’s Paper Cup</label>
                    <input type="text" class="form-control" value="{{$sponsor->paper_cup}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Jantzen’s Goodie Bags</label>
                    <input type="text" class="form-control" value="{{$sponsor->goodies_bag}}" readonly>
                  </div>

                  <div class="col-lg-12">
                    <hr>
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Others</label>
                    <textarea class="form-control" rows="3" placeholder="Others ..." readonly>{{$sponsor->others}}</textarea>
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea class="form-control" rows="3" placeholder="Remarks ..." readonly>{{$sponsor->remarks}}</textarea>
                  </div>

                </div>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="card card-success collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-envelope"></i> <b>Send Mail</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="/sendMailTemplate/{{$sponsor->email}}/{{$sponsor->id}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label class="form-label">Pickup Location</label>
                      <select name="pickup_location" class="form-control pickup-location" required>
                        <option value="">Select one...</option>
                        <option value="Puchong" {{$sponsor->pickup_location == "Puchong" ? 'selected' : ''}}>Puchong</option>
                        <option value="Shah Alam" {{$sponsor->pickup_location == "Shah Alam" ? 'selected' : ''}}>Shah Alam</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Pickup Location Address</label>
                    @if ($sponsor->pickup_address !== null)
                    <input type="text" name="pickup_address" class="form-control pickup-address" readonly value="{{$sponsor->pickup_address}}">
                    @else
                    <input type="text" name="pickup_address" class="form-control pickup-address" readonly>
                    @endif
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Contact Person</label>
                    @if ($sponsor->contact_person !== null)
                    <input type="text" name="contact_person" class="form-control contact-person" readonly value="{{$sponsor->contact_person}}">
                    @else
                    <input type="text" name="contact_person" class="form-control contact-person" readonly>
                    @endif
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Phone Number</label>
                    @if ($sponsor->pickup_phone_number !== null)
                    <input type="text" name="pickup_phone_number" class="form-control phone-number" readonly value="{{$sponsor->pickup_phone_number}}">
                    @else
                    <input type="text" name="pickup_phone_number" class="form-control phone-number" readonly>
                    @endif
                  </div>
                </div>

                <div class="row">
                  @foreach($templates as $template)
                    <div class="col-lg-6 mb-3">
                      <div class="card">
                          <div class="card-body">
                              <h5 class="card-title mb-2">{{ basename($template, '.blade.php') }}</h5>
                              <p class="card-text">
    
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#view{{ basename($template, '.blade.php') }}">
                                  View Template
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="view{{ basename($template, '.blade.php') }}" tabindex="-1" role="dialog" aria-labelledby="view{{ basename($template, '.blade.php') }}" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{ basename($template, '.blade.php') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <input type="hidden" id="template-id-{{ basename($template, '.blade.php') }}" value="{{$sponsor->id}}">
                                        <button type="button" class="btn btn-primary editTemplate" data-target="{{ basename($template, '.blade.php') }}">Edit Template</button>
                                        <button type="button" class="btn btn-success saveChanges" data-target="{{ basename($template, '.blade.php') }}" style="display:none;">Save Changes</button>
                                        <div id="template-content-{{ basename($template, '.blade.php') }}">{!! file_get_contents($template) !!}</div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                  
                                
                              </p>
                              <input style="font-style: 30px;" type="radio" class="btn-check" name="template" id="{{ basename($template, '.blade.php') }}" autocomplete="off" value="{{ basename($template, '.blade.php') }}">
                              <label class="btn btn-outline-primary btn-sm" for="{{ basename($template, '.blade.php') }}">Select Template</label>
                          </div>
                      </div>
                    </div>
                  @endforeach
                </div>
                <button type="submit" class="btn btn-primary w-100">
                  
                  Send Email
                </button>
              </form>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="card card-warning collapsed-card" id="proofAttachments">
            <div class="card-header">
              @php
                    $proof = json_decode($sponsor->attachements_agreement_proof);
  
                    if ($proof !== null) {
                      $proofCounts = count($proof);
                    } else {
                      $proofCounts = 0;
                    }
              @endphp
              <h3 class="card-title"><i class="fas fa-file-archive"></i> <b>Proof of Agreements ({{$proofCounts}})</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="/downloadAll/proof/{{$sponsor->id}}" class="btn btn-primary w-100 mb-3">
                Download All
              </a>
                <div class="row">
                  @if ($proof !== null)
                      @foreach ($proof as $item)
                         @if (pathinfo($item, PATHINFO_EXTENSION) === 'jpg' || pathinfo($item, PATHINFO_EXTENSION) === 'jpeg' || pathinfo($item, PATHINFO_EXTENSION) === 'png' || pathinfo($item, PATHINFO_EXTENSION) === 'gif')     
                         {{-- <a data-glightbox data-gallery="gallery" href="{{ asset($item) }}">
                              <img class="img-fluid" src="{{ asset($item) }}" alt="Image" width="200px" height="200px"> 
                          </a>                         --}}
                          <div class="col-lg-3 mb-2">
                            <a href="{{asset($item)}}">
                              <img class="img-fluid" src="{{asset($item)}}" alt="Image" width="150px" height="150px">
                            </a>
                          </div>
                         @else
                         <div class="col-lg-3 mb-2">
                            <a class="btn btn-primary" href="{{ asset($item) }}" target="_blank">View File ({{pathinfo($item, PATHINFO_EXTENSION)}})</a>
                         </div>
                         @endif
                      @endforeach
                  @endif
                </div>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="card card-secondary collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-people-carry"></i> <b>Collector Details</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label class="form-label">Collection Date</label>
                      <input type="text" class="form-control" readonly value="{{$sponsor->collection_date}}">
                    </div>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Collection Time Slot</label>
                    <input type="text" class="form-control" readonly value="{{$sponsor->collection_time_slot}}">
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Collector Name</label>
                    <input type="text" class="form-control" readonly value="{{$sponsor->collector_name}}">
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Collector IC</label>
                    <input type="text" class="form-control" readonly value="{{$sponsor->collector_IC}}">
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Collector Contact</label>
                    <input type="text" class="form-control" readonly value="{{$sponsor->collector_contact}}">
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Collector Plate Number</label>
                    <input type="text" class="form-control" readonly value="{{$sponsor->collector_plate_number}}">
                  </div>

                   <!-- Button trigger modal -->
                   <button type="button" class="btn btn-primary mb-3 w-100" data-toggle="modal" data-target="#view-collected">
                    Collected
                  </button>
                  
                  <!-- Modal -->
                  <div class="modal fade" id="view-collected" tabindex="-1" role="dialog" aria-labelledby="view-collected" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Collected</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Are you sure ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <a href="/collected/{{$sponsor->id}}" class="btn btn-primary">Sure</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

        @elseif($sponsor->status == "collected")
        <div class="col-lg-5">
          <div class="card card-primary collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-check-circle"></i> <b>Approved</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <p>Current Status: 
                      @if ($sponsor->states == "Processing")
                      <button class="btn btn-warning btn-sm">{{$sponsor->states}}</button>            
                      @elseif ($sponsor->states == "Approved")  
                      <button class="btn btn-success btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "Pending")  
                      <button class="btn btn-info btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "Collected")  
                      <button class="btn btn-primary btn-sm">{{$sponsor->states}}</button>   
                      @elseif ($sponsor->states == "Blacklist")  
                      <button class="btn btn-dark btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "MIA")  
                      <button class="btn btn-secondary btn-sm">{{$sponsor->states}}</button>    
                      @elseif ($sponsor->states == "Rejected")  
                      <button class="btn btn-danger btn-sm">{{$sponsor->states}}</button>
                      @elseif ($sponsor->states == "Completed")  
                      <button class="btn btn-danger btn-sm">{{$sponsor->states}}</button>
                      @else
                      {{$sponsor->states}}
                      @endif
                  </p>
                </div>
              </div>
              <button type="button" class="btn btn-info w-100 mb-3" data-toggle="modal" data-target="#editRequest">
                Edit <i class="fas fa-edit"></i>
              </button><br>
              
              <!-- Modal -->
              <div class="modal fade" id="editRequest" tabindex="-1" role="dialog" aria-labelledby="editRequest" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="/dashboard/request-update/{{$sponsor->id}}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Attending</label>
                            <select class="select2" multiple="multiple" data-placeholder="Select attendees for this event (if need to open booth)" style="width: 100%;">
                              @php
                                  $attendees = json_decode($sponsor->attending);
                                  $attender = isset($attendees) ? $attendees : [];
                                  $selectedValues = isset($attendees) ? implode(',', $attendees) : '';
                              @endphp
                              
                              @foreach ($user as $item)
                                <option value="{{$item->name}}" {{ in_array($item->name, $attender) ? 'selected' : '' }}>{{$item->name}}</option>
                              @endforeach
                            </select>
                            <input type="hidden" id="selectedValues" name="attending" value="{{$selectedValues}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Handle By</label>
                            <select name="handle_by" class="form-control" required>
                              <option value="">Select one...</option>
                              @foreach ($alluser as $item)
                                  <option value="{{ $item->name }}" {{ $sponsor->handle_by == $item->name ? 'selected' : '' }}>
                                      {{ $item->name }}
                                  </option>
                              @endforeach
                            </select>
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <div class="form-group">
                              <label class="form-label">Booth / Space</label>
                              <select name="booth_space" class="form-control" required>
                                <option value="">Select one...</option>
                                <option value="None" {{$sponsor->booth_space == 'None' ? 'selected' : ''}}>None</option>
                                <option value="Booth" {{$sponsor->booth_space == 'Booth' ? 'selected' : ''}}>Booth</option>
                                <option value="Space" {{$sponsor->booth_space == 'Space' ? 'selected' : ''}}>Space</option>
                              </select>
                            </div>
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger w-100" data-toggle="modal" data-target="#rejectRequestEdit">
                              <i class="fas fa-times-circle"></i> Reject
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="rejectRequestEdit" tabindex="-1" role="dialog" aria-labelledby="rejectRequestEdit" aria-hidden="true">
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
                                    <a href="/dashboard/reject/{{$sponsor->id}}" class="btn btn-danger"><i class="fas fa-times-circle"></i> Reject</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 mb-3">
                            <button type="button" class="btn btn-secondary w-100" data-toggle="modal" data-target="#blockRequestEdit">
                              <i class="fas fa-minus-circle"></i> Add to Blocklist
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="blockRequestEdit" tabindex="-1" role="dialog" aria-labelledby="blockRequestEdit" aria-hidden="true">
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
                                    <a href="/dashboard/block/{{$sponsor->id}}" class="btn btn-secondary"><i class="fas fa-minus-circle"></i> Add to Blocklist</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
        
                          <div class="col-lg-12">
                            <h4>Confirm Sponsorship Products</h4>
                            <hr>
                          </div> 
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 200ml x Cartons</label>
                            <input type="number" name="confirmro_200ml" class="form-control" value="{{$sponsor->confirmro_200ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 500ml x Cartons</label>
                            <input type="number" name="confirmro_500ml" class="form-control" value="{{$sponsor->confirmro_500ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 11L x Bottles</label>
                            <input type="number" name="confirmro_11L" class="form-control" value="{{$sponsor->confirmro_11L}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Mineral 350ml x Cartons</label>
                            <input type="number" name="confirmro_350ml" class="form-control" value="{{$sponsor->confirmro_350ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Jantzen’s Paper Cup</label>
                            <input type="number" name="paper_cup" class="form-control" value="{{$sponsor->paper_cup}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Jantzen’s Goodie Bags</label>
                            <input type="number" name="goodies_bag" class="form-control" value="{{$sponsor->goodies_bag}}">
                          </div>
        
                          <div class="col-lg-12">
                            <hr>
                          </div>
        
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Others</label>
                            <textarea name="others" class="form-control" rows="3" placeholder="Others ..." required>{{$sponsor->others}}</textarea>
                          </div>
        
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Remarks</label>
                            @if ($sponsor->remarks !== null)
                            <textarea name="remarks" class="form-control" rows="3" placeholder="Remarks ...">{{$sponsor->remarks}}</textarea>
                            @else
                            <textarea name="remarks" class="form-control" rows="3" placeholder="Remarks ..."></textarea>
                            @endif
                          </div>
        
                          <div class="col-lg-12">
                            <h4>Change Status</h4>
                            <hr>
                          </div> 

                          <div class="col-lg-12 mb-3">
                            <div class="form-group">
                              <label class="form-label">Status</label>
                              <select name="states" class="form-control" required>
                                <option value="">Select one...</option>
                                <option value="Approved" {{$sponsor->states == 'Approved' ? 'selected' : ''}}>Approved</option>
                                <option value="Pending" {{$sponsor->states == 'Pending' ? 'selected' : ''}}>Pending</option>
                                <option value="Collected" {{$sponsor->states == 'Collected' ? 'selected' : ''}}>Collected</option>
                                <option value="MIA" {{$sponsor->states == 'MIA' ? 'selected' : ''}}>MIA</option>
                                <option value="Closed" {{$sponsor->states == 'Closed' ? 'selected' : ''}}>Closed</option>
                                <option value="Delay" {{$sponsor->states == 'Delay' ? 'selected' : ''}}>Delay</option>
                                <option value="Rejected" {{$sponsor->states == 'Rejected' ? 'selected' : ''}}>Rejected</option>
                                <option value="Blacklist" {{$sponsor->states == 'Blacklist' ? 'selected' : ''}}>Blacklist</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              
                <div class="row">
                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Attending</label>
                    @php
                        $attending = json_decode($sponsor->attending);
                        $attendees = "";
                        if ($attending !== null) {
                          foreach ($attending as $attend) {
                            $attendees .= $attend . ",";
                          }
                        }
                    @endphp
                    @if ($attending !== null)
                        <input type="text" class="form-control" value="{{$attendees}}" readonly>
                    @endif
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Handle By</label>
                    <input type="text" class="form-control" value="{{$sponsor->handle_by}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label class="form-label">Booth / Space</label>
                      <input type="text" class="form-control" value="{{$sponsor->booth_space}}" readonly>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <h4>Confirm Sponsorship Products</h4>
                    <hr>
                  </div> 

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 200ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_200ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 500ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_500ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 11L x Bottles</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_11L}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Mineral 350ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_350ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Jantzen’s Paper Cup</label>
                    <input type="text" class="form-control" value="{{$sponsor->paper_cup}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Jantzen’s Goodie Bags</label>
                    <input type="text" class="form-control" value="{{$sponsor->goodies_bag}}" readonly>
                  </div>

                  <div class="col-lg-12">
                    <hr>
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Others</label>
                    <textarea class="form-control" rows="3" placeholder="Others ..." readonly>{{$sponsor->others}}</textarea>
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea class="form-control" rows="3" placeholder="Remarks ..." readonly>{{$sponsor->remarks}}</textarea>
                  </div>

                </div>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="card card-success collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-envelope"></i> <b>Send Mail</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="/sendMailTemplate/{{$sponsor->email}}/{{$sponsor->id}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label class="form-label">Pickup Location</label>
                      <select name="pickup_location" class="form-control pickup-location" required>
                        <option value="">Select one...</option>
                        <option value="Puchong" {{$sponsor->pickup_location == "Puchong" ? 'selected' : ''}}>Puchong</option>
                        <option value="Shah Alam" {{$sponsor->pickup_location == "Shah Alam" ? 'selected' : ''}}>Shah Alam</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Pickup Location Address</label>
                    @if ($sponsor->pickup_address !== null)
                    <input type="text" name="pickup_address" class="form-control pickup-address" readonly value="{{$sponsor->pickup_address}}">
                    @else
                    <input type="text" name="pickup_address" class="form-control pickup-address" readonly>
                    @endif
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Contact Person</label>
                    @if ($sponsor->contact_person !== null)
                    <input type="text" name="contact_person" class="form-control contact-person" readonly value="{{$sponsor->contact_person}}">
                    @else
                    <input type="text" name="contact_person" class="form-control contact-person" readonly>
                    @endif
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Phone Number</label>
                    @if ($sponsor->pickup_phone_number !== null)
                    <input type="text" name="pickup_phone_number" class="form-control phone-number" readonly value="{{$sponsor->pickup_phone_number}}">
                    @else
                    <input type="text" name="pickup_phone_number" class="form-control phone-number" readonly>
                    @endif
                  </div>
                </div>

                <div class="row">
                  @foreach($templates as $template)
                    <div class="col-lg-6 mb-3">
                      <div class="card">
                          <div class="card-body">
                              <h5 class="card-title mb-2">{{ basename($template, '.blade.php') }}</h5>
                              <p class="card-text">
    
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#view{{ basename($template, '.blade.php') }}">
                                  View Template
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="view{{ basename($template, '.blade.php') }}" tabindex="-1" role="dialog" aria-labelledby="view{{ basename($template, '.blade.php') }}" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{ basename($template, '.blade.php') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <input type="hidden" id="template-id-{{ basename($template, '.blade.php') }}" value="{{$sponsor->id}}">
                                        <button type="button" class="btn btn-primary editTemplate" data-target="{{ basename($template, '.blade.php') }}">Edit Template</button>
                                        <button type="button" class="btn btn-success saveChanges" data-target="{{ basename($template, '.blade.php') }}" style="display:none;">Save Changes</button>
                                        <div id="template-content-{{ basename($template, '.blade.php') }}">{!! file_get_contents($template) !!}</div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                  
                                
                              </p>
                              <input style="font-style: 30px;" type="radio" class="btn-check" name="template" id="{{ basename($template, '.blade.php') }}" autocomplete="off" value="{{ basename($template, '.blade.php') }}">
                              <label class="btn btn-outline-primary btn-sm" for="{{ basename($template, '.blade.php') }}">Select Template</label>
                          </div>
                      </div>
                    </div>
                  @endforeach
                </div>
                <button type="submit" class="btn btn-primary w-100">
                  
                  Send Email
                </button>
              </form>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="card card-warning collapsed-card" id="proofAttachments">
            <div class="card-header">
              @php
                    $proof = json_decode($sponsor->attachements_agreement_proof);
  
                    if ($proof !== null) {
                      $proofCounts = count($proof);
                    } else {
                      $proofCounts = 0;
                    }
              @endphp
              <h3 class="card-title"><i class="fas fa-file-archive"></i> <b>Proof of Agreements ({{$proofCounts}})</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="/downloadAll/proof/{{$sponsor->id}}" class="btn btn-primary w-100 mb-3">
                Download All
              </a>
                <div class="row">
                  @if ($proof !== null)
                      @foreach ($proof as $item)
                         @if (pathinfo($item, PATHINFO_EXTENSION) === 'jpg' || pathinfo($item, PATHINFO_EXTENSION) === 'jpeg' || pathinfo($item, PATHINFO_EXTENSION) === 'png' || pathinfo($item, PATHINFO_EXTENSION) === 'gif')     
                         {{-- <a data-glightbox data-gallery="gallery" href="{{ asset($item) }}">
                              <img class="img-fluid" src="{{ asset($item) }}" alt="Image" width="200px" height="200px"> 
                          </a>                         --}}
                          <div class="col-lg-3 mb-2">
                            <a href="{{asset($item)}}">
                              <img class="img-fluid" src="{{asset($item)}}" alt="Image" width="150px" height="150px">
                            </a>
                          </div>
                         @else
                         <div class="col-lg-3 mb-2">
                            <a class="btn btn-primary" href="{{ asset($item) }}" target="_blank">View File ({{pathinfo($item, PATHINFO_EXTENSION)}})</a>
                         </div>
                         @endif
                      @endforeach
                  @endif
                </div>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="card card-secondary collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-people-carry"></i> <b>Collector Details</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label class="form-label">Collection Date</label>
                      <input type="text" class="form-control" readonly value="{{$sponsor->collection_date}}">
                    </div>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Collection Time Slot</label>
                    <input type="text" class="form-control" readonly value="{{$sponsor->collection_time_slot}}">
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Collector Name</label>
                    <input type="text" class="form-control" readonly value="{{$sponsor->collector_name}}">
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Collector IC</label>
                    <input type="text" class="form-control" readonly value="{{$sponsor->collector_IC}}">
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Collector Contact</label>
                    <input type="text" class="form-control" readonly value="{{$sponsor->collector_contact}}">
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Collector Plate Number</label>
                    <input type="text" class="form-control" readonly value="{{$sponsor->collector_plate_number}}">
                  </div>

                </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

        @elseif($sponsor->status == "blacklist")
        <div class="col-lg-5">
          <div class="card card-dark collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-times-circle"></i> <b>Blacklisted</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <p>Current Status: 
                      @if ($sponsor->states == "Processing")
                      <button class="btn btn-warning btn-sm">{{$sponsor->states}}</button>            
                      @elseif ($sponsor->states == "Approved")  
                      <button class="btn btn-success btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "Pending")  
                      <button class="btn btn-info btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "Collected")  
                      <button class="btn btn-primary btn-sm">{{$sponsor->states}}</button>   
                      @elseif ($sponsor->states == "Blacklist")  
                      <button class="btn btn-dark btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "MIA")  
                      <button class="btn btn-secondary btn-sm">{{$sponsor->states}}</button>    
                      @elseif ($sponsor->states == "Rejected")  
                      <button class="btn btn-danger btn-sm">{{$sponsor->states}}</button>
                      @elseif ($sponsor->states == "Completed")  
                      <button class="btn btn-danger btn-sm">{{$sponsor->states}}</button>
                      @else
                      {{$sponsor->states}}
                      @endif
                  </p>
                </div>
              </div>
              <button type="button" class="btn btn-info w-100 mb-3" data-toggle="modal" data-target="#editRequest">
                Edit <i class="fas fa-edit"></i>
              </button><br>
              
              <!-- Modal -->
              <div class="modal fade" id="editRequest" tabindex="-1" role="dialog" aria-labelledby="editRequest" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="/dashboard/request-update/{{$sponsor->id}}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Attending</label>
                            <select class="select2" multiple="multiple" data-placeholder="Select attendees for this event (if need to open booth)" style="width: 100%;">
                              @php
                                  $attendees = json_decode($sponsor->attending);
                                  $attender = isset($attendees) ? $attendees : [];
                                  $selectedValues = isset($attendees) ? implode(',', $attendees) : '';
                              @endphp
                              
                              @foreach ($user as $item)
                                <option value="{{$item->name}}" {{ in_array($item->name, $attender) ? 'selected' : '' }}>{{$item->name}}</option>
                              @endforeach
                            </select>
                            <input type="hidden" id="selectedValues" name="attending" value="{{$selectedValues}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Handle By</label>
                            <select name="handle_by" class="form-control" required>
                              <option value="">Select one...</option>
                              @foreach ($alluser as $item)
                                  <option value="{{ $item->name }}" {{ $sponsor->handle_by == $item->name ? 'selected' : '' }}>
                                      {{ $item->name }}
                                  </option>
                              @endforeach
                            </select>
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <div class="form-group">
                              <label class="form-label">Booth / Space</label>
                              <select name="booth_space" class="form-control" required>
                                <option value="">Select one...</option>
                                <option value="None" {{$sponsor->booth_space == 'None' ? 'selected' : ''}}>None</option>
                                <option value="Booth" {{$sponsor->booth_space == 'Booth' ? 'selected' : ''}}>Booth</option>
                                <option value="Space" {{$sponsor->booth_space == 'Space' ? 'selected' : ''}}>Space</option>
                              </select>
                            </div>
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger w-100" data-toggle="modal" data-target="#rejectRequestEdit">
                              <i class="fas fa-times-circle"></i> Reject
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="rejectRequestEdit" tabindex="-1" role="dialog" aria-labelledby="rejectRequestEdit" aria-hidden="true">
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
                          <div class="col-lg-6 mb-3">
                            <button type="button" class="btn btn-secondary w-100" data-toggle="modal" data-target="#blockRequestEdit">
                              <i class="fas fa-minus-circle"></i> Add to Blocklist
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="blockRequestEdit" tabindex="-1" role="dialog" aria-labelledby="blockRequestEdit" aria-hidden="true">
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
        
                          <div class="col-lg-12">
                            <h4>Confirm Sponsorship Products</h4>
                            <hr>
                          </div> 
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 200ml x Cartons</label>
                            <input type="number" name="confirmro_200ml" class="form-control" value="{{$sponsor->confirmro_200ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 500ml x Cartons</label>
                            <input type="number" name="confirmro_500ml" class="form-control" value="{{$sponsor->confirmro_500ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 11L x Bottles</label>
                            <input type="number" name="confirmro_11L" class="form-control" value="{{$sponsor->confirmro_11L}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Mineral 350ml x Cartons</label>
                            <input type="number" name="confirmro_350ml" class="form-control" value="{{$sponsor->confirmro_350ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Jantzen’s Paper Cup</label>
                            <input type="number" name="paper_cup" class="form-control" value="{{$sponsor->paper_cup}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Jantzen’s Goodie Bags</label>
                            <input type="number" name="goodies_bag" class="form-control" value="{{$sponsor->goodies_bag}}">
                          </div>
        
                          <div class="col-lg-12">
                            <hr>
                          </div>
        
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Others</label>
                            <textarea name="others" class="form-control" rows="3" placeholder="Others ..." required>{{$sponsor->others}}</textarea>
                          </div>
        
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Remarks</label>
                            @if ($sponsor->remarks !== null)
                            <textarea name="remarks" class="form-control" rows="3" placeholder="Remarks ...">{{$sponsor->remarks}}</textarea>
                            @else
                            <textarea name="remarks" class="form-control" rows="3" placeholder="Remarks ..."></textarea>
                            @endif
                          </div>
        
                          <div class="col-lg-12">
                            <h4>Change Status</h4>
                            <hr>
                          </div> 

                          <div class="col-lg-12 mb-3">
                            <div class="form-group">
                              <label class="form-label">Status</label>
                              <select name="states" class="form-control" required>
                                <option value="">Select one...</option>
                                <option value="Approved" {{$sponsor->states == 'Approved' ? 'selected' : ''}}>Approved</option>
                                <option value="Pending" {{$sponsor->states == 'Pending' ? 'selected' : ''}}>Pending</option>
                                <option value="Collected" {{$sponsor->states == 'Collected' ? 'selected' : ''}}>Collected</option>
                                <option value="MIA" {{$sponsor->states == 'MIA' ? 'selected' : ''}}>MIA</option>
                                <option value="Closed" {{$sponsor->states == 'Closed' ? 'selected' : ''}}>Closed</option>
                                <option value="Delay" {{$sponsor->states == 'Delay' ? 'selected' : ''}}>Delay</option>
                                <option value="Rejected" {{$sponsor->states == 'Rejected' ? 'selected' : ''}}>Rejected</option>
                                <option value="Blacklist" {{$sponsor->states == 'Blacklist' ? 'selected' : ''}}>Blacklist</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              
                <div class="row">
                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Attending</label>
                    @php
                        $attending = json_decode($sponsor->attending);
                        $attendees = "";
                        if ($attending !== null) {
                          foreach ($attending as $attend) {
                            $attendees .= $attend . ",";
                          }
                        }
                    @endphp
                    @if ($attending !== null)
                        <input type="text" class="form-control" value="{{$attendees}}" readonly>
                    @endif
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Handle By</label>
                    <input type="text" class="form-control" value="{{$sponsor->handle_by}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label class="form-label">Booth / Space</label>
                      <input type="text" class="form-control" value="{{$sponsor->booth_space}}" readonly>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <h4>Confirm Sponsorship Products</h4>
                    <hr>
                  </div> 

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 200ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_200ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 500ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_500ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 11L x Bottles</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_11L}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Mineral 350ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_350ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Jantzen’s Paper Cup</label>
                    <input type="text" class="form-control" value="{{$sponsor->paper_cup}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Jantzen’s Goodie Bags</label>
                    <input type="text" class="form-control" value="{{$sponsor->goodies_bag}}" readonly>
                  </div>

                  <div class="col-lg-12">
                    <hr>
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Others</label>
                    <textarea class="form-control" rows="3" placeholder="Others ..." readonly>{{$sponsor->others}}</textarea>
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea class="form-control" rows="3" placeholder="Remarks ..." readonly>{{$sponsor->remarks}}</textarea>
                  </div>

                </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

        @elseif($sponsor->status == "complete")
        <div class="col-lg-5">
          <div class="card card-primary collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-check-circle"></i> <b>Approved</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <p>Current Status: 
                      @if ($sponsor->states == "Processing")
                      <button class="btn btn-warning btn-sm">{{$sponsor->states}}</button>            
                      @elseif ($sponsor->states == "Approved")  
                      <button class="btn btn-success btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "Pending")  
                      <button class="btn btn-info btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "Collected")  
                      <button class="btn btn-primary btn-sm">{{$sponsor->states}}</button>   
                      @elseif ($sponsor->states == "Blacklist")  
                      <button class="btn btn-dark btn-sm">{{$sponsor->states}}</button> 
                      @elseif ($sponsor->states == "MIA")  
                      <button class="btn btn-secondary btn-sm">{{$sponsor->states}}</button>    
                      @elseif ($sponsor->states == "Rejected")  
                      <button class="btn btn-danger btn-sm">{{$sponsor->states}}</button>
                      @elseif ($sponsor->states == "Completed")  
                      <button class="btn btn-success btn-sm">{{$sponsor->states}}</button>
                      @else
                      {{$sponsor->states}}
                      @endif
                  </p>
                </div>
              </div>
              <button type="button" class="btn btn-info w-100 mb-3" data-toggle="modal" data-target="#editRequest">
                Edit <i class="fas fa-edit"></i>
              </button><br>
              
              <!-- Modal -->
              <div class="modal fade" id="editRequest" tabindex="-1" role="dialog" aria-labelledby="editRequest" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="/dashboard/request-update/{{$sponsor->id}}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Attending</label>
                            <select class="select2" multiple="multiple" data-placeholder="Select attendees for this event (if need to open booth)" style="width: 100%;">
                              @php
                                  $attendees = json_decode($sponsor->attending);
                                  $attender = isset($attendees) ? $attendees : [];
                                  $selectedValues = isset($attendees) ? implode(',', $attendees) : '';
                              @endphp
                              
                              @foreach ($user as $item)
                                <option value="{{$item->name}}" {{ in_array($item->name, $attender) ? 'selected' : '' }}>{{$item->name}}</option>
                              @endforeach
                            </select>
                            <input type="hidden" id="selectedValues" name="attending" value="{{$selectedValues}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Handle By</label>
                            <select name="handle_by" class="form-control" required>
                              <option value="">Select one...</option>
                              @foreach ($alluser as $item)
                                  <option value="{{ $item->name }}" {{ $sponsor->handle_by == $item->name ? 'selected' : '' }}>
                                      {{ $item->name }}
                                  </option>
                              @endforeach
                            </select>
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <div class="form-group">
                              <label class="form-label">Booth / Space</label>
                              <select name="booth_space" class="form-control" required>
                                <option value="">Select one...</option>
                                <option value="None" {{$sponsor->booth_space == 'None' ? 'selected' : ''}}>None</option>
                                <option value="Booth" {{$sponsor->booth_space == 'Booth' ? 'selected' : ''}}>Booth</option>
                                <option value="Space" {{$sponsor->booth_space == 'Space' ? 'selected' : ''}}>Space</option>
                              </select>
                            </div>
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger w-100" data-toggle="modal" data-target="#rejectRequestEdit">
                              <i class="fas fa-times-circle"></i> Reject
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="rejectRequestEdit" tabindex="-1" role="dialog" aria-labelledby="rejectRequestEdit" aria-hidden="true">
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
                                    <a href="/dashboard/reject/{{$sponsor->id}}" class="btn btn-danger"><i class="fas fa-times-circle"></i> Reject</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 mb-3">
                            <button type="button" class="btn btn-secondary w-100" data-toggle="modal" data-target="#blockRequestEdit">
                              <i class="fas fa-minus-circle"></i> Add to Blocklist
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="blockRequestEdit" tabindex="-1" role="dialog" aria-labelledby="blockRequestEdit" aria-hidden="true">
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
                                    <a href="/dashboard/block/{{$sponsor->id}}" class="btn btn-secondary"><i class="fas fa-minus-circle"></i> Add to Blocklist</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
        
                          <div class="col-lg-12">
                            <h4>Confirm Sponsorship Products</h4>
                            <hr>
                          </div> 
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 200ml x Cartons</label>
                            <input type="number" name="confirmro_200ml" class="form-control" value="{{$sponsor->confirmro_200ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 500ml x Cartons</label>
                            <input type="number" name="confirmro_500ml" class="form-control" value="{{$sponsor->confirmro_500ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">RO 11L x Bottles</label>
                            <input type="number" name="confirmro_11L" class="form-control" value="{{$sponsor->confirmro_11L}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Mineral 350ml x Cartons</label>
                            <input type="number" name="confirmro_350ml" class="form-control" value="{{$sponsor->confirmro_350ml}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Jantzen’s Paper Cup</label>
                            <input type="number" name="paper_cup" class="form-control" value="{{$sponsor->paper_cup}}">
                          </div>
        
                          <div class="col-lg-6 mb-3">
                            <label class="form-label">Jantzen’s Goodie Bags</label>
                            <input type="number" name="goodies_bag" class="form-control" value="{{$sponsor->goodies_bag}}">
                          </div>
        
                          <div class="col-lg-12">
                            <hr>
                          </div>
        
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Others</label>
                            <textarea name="others" class="form-control" rows="3" placeholder="Others ..." required>{{$sponsor->others}}</textarea>
                          </div>
        
                          <div class="col-lg-12 mb-3">
                            <label class="form-label">Remarks</label>
                            @if ($sponsor->remarks !== null)
                            <textarea name="remarks" class="form-control" rows="3" placeholder="Remarks ...">{{$sponsor->remarks}}</textarea>
                            @else
                            <textarea name="remarks" class="form-control" rows="3" placeholder="Remarks ..."></textarea>
                            @endif
                          </div>
        
                          <div class="col-lg-12">
                            <h4>Change Status</h4>
                            <hr>
                          </div> 

                          <div class="col-lg-12 mb-3">
                            <div class="form-group">
                              <label class="form-label">Status</label>
                              <select name="states" class="form-control" required>
                                <option value="">Select one...</option>
                                <option value="Approved" {{$sponsor->states == 'Approved' ? 'selected' : ''}}>Approved</option>
                                <option value="Pending" {{$sponsor->states == 'Pending' ? 'selected' : ''}}>Pending</option>
                                <option value="Collected" {{$sponsor->states == 'Collected' ? 'selected' : ''}}>Collected</option>
                                <option value="MIA" {{$sponsor->states == 'MIA' ? 'selected' : ''}}>MIA</option>
                                <option value="Closed" {{$sponsor->states == 'Closed' ? 'selected' : ''}}>Closed</option>
                                <option value="Delay" {{$sponsor->states == 'Delay' ? 'selected' : ''}}>Delay</option>
                                <option value="Rejected" {{$sponsor->states == 'Rejected' ? 'selected' : ''}}>Rejected</option>
                                <option value="Blacklist" {{$sponsor->states == 'Blacklist' ? 'selected' : ''}}>Blacklist</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              
                <div class="row">
                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Attending</label>
                    @php
                        $attending = json_decode($sponsor->attending);
                        $attendees = "";
                        if ($attending !== null) {
                          foreach ($attending as $attend) {
                            $attendees .= $attend . ",";
                          }
                        }
                    @endphp
                    @if ($attending !== null)
                        <input type="text" class="form-control" value="{{$attendees}}" readonly>
                    @endif
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Handle By</label>
                    <input type="text" class="form-control" value="{{$sponsor->handle_by}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label class="form-label">Booth / Space</label>
                      <input type="text" class="form-control" value="{{$sponsor->booth_space}}" readonly>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <h4>Confirm Sponsorship Products</h4>
                    <hr>
                  </div> 

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 200ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_200ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 500ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_500ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">RO 11L x Bottles</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_11L}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Mineral 350ml x Cartons</label>
                    <input type="text" class="form-control" value="{{$sponsor->confirmro_350ml}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Jantzen’s Paper Cup</label>
                    <input type="text" class="form-control" value="{{$sponsor->paper_cup}}" readonly>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Jantzen’s Goodie Bags</label>
                    <input type="text" class="form-control" value="{{$sponsor->goodies_bag}}" readonly>
                  </div>

                  <div class="col-lg-12">
                    <hr>
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Others</label>
                    <textarea class="form-control" rows="3" placeholder="Others ..." readonly>{{$sponsor->others}}</textarea>
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea class="form-control" rows="3" placeholder="Remarks ..." readonly>{{$sponsor->remarks}}</textarea>
                  </div>

                </div>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="card card-success collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-envelope"></i> <b>Send Mail</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="/sendMailTemplate/{{$sponsor->email}}/{{$sponsor->id}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label class="form-label">Pickup Location</label>
                      <select name="pickup_location" class="form-control pickup-location" required>
                        <option value="">Select one...</option>
                        <option value="Puchong" {{$sponsor->pickup_location == "Puchong" ? 'selected' : ''}}>Puchong</option>
                        <option value="Shah Alam" {{$sponsor->pickup_location == "Shah Alam" ? 'selected' : ''}}>Shah Alam</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Pickup Location Address</label>
                    @if ($sponsor->pickup_address !== null)
                    <input type="text" name="pickup_address" class="form-control pickup-address" readonly value="{{$sponsor->pickup_address}}">
                    @else
                    <input type="text" name="pickup_address" class="form-control pickup-address" readonly>
                    @endif
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Contact Person</label>
                    @if ($sponsor->contact_person !== null)
                    <input type="text" name="contact_person" class="form-control contact-person" readonly value="{{$sponsor->contact_person}}">
                    @else
                    <input type="text" name="contact_person" class="form-control contact-person" readonly>
                    @endif
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Phone Number</label>
                    @if ($sponsor->pickup_phone_number !== null)
                    <input type="text" name="pickup_phone_number" class="form-control phone-number" readonly value="{{$sponsor->pickup_phone_number}}">
                    @else
                    <input type="text" name="pickup_phone_number" class="form-control phone-number" readonly>
                    @endif
                  </div>
                </div>

                <div class="row">
                  @foreach($templates as $template)
                    <div class="col-lg-6 mb-3">
                      <div class="card">
                          <div class="card-body">
                              <h5 class="card-title mb-2">{{ basename($template, '.blade.php') }}</h5>
                              <p class="card-text">
    
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#view{{ basename($template, '.blade.php') }}">
                                  View Template
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="view{{ basename($template, '.blade.php') }}" tabindex="-1" role="dialog" aria-labelledby="view{{ basename($template, '.blade.php') }}" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{ basename($template, '.blade.php') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <input type="hidden" id="template-id-{{ basename($template, '.blade.php') }}" value="{{$sponsor->id}}">
                                        <button type="button" class="btn btn-primary editTemplate" data-target="{{ basename($template, '.blade.php') }}">Edit Template</button>
                                        <button type="button" class="btn btn-success saveChanges" data-target="{{ basename($template, '.blade.php') }}" style="display:none;">Save Changes</button>
                                        <div id="template-content-{{ basename($template, '.blade.php') }}">{!! file_get_contents($template) !!}</div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                  
                                
                              </p>
                              <input style="font-style: 30px;" type="radio" class="btn-check" name="template" id="{{ basename($template, '.blade.php') }}" autocomplete="off" value="{{ basename($template, '.blade.php') }}">
                              <label class="btn btn-outline-primary btn-sm" for="{{ basename($template, '.blade.php') }}">Select Template</label>
                          </div>
                      </div>
                    </div>
                  @endforeach
                </div>
                <button type="submit" class="btn btn-primary w-100">
                  
                  Send Email
                </button>
              </form>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="card card-warning collapsed-card" id="proofAttachments">
            <div class="card-header">
              @php
                    $proof = json_decode($sponsor->attachements_agreement_proof);
  
                    if ($proof !== null) {
                      $proofCounts = count($proof);
                    } else {
                      $proofCounts = 0;
                    }
              @endphp
              <h3 class="card-title"><i class="fas fa-file-archive"></i> <b>Proof of Agreements ({{$proofCounts}})</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="/downloadAll/proof/{{$sponsor->id}}" class="btn btn-primary w-100 mb-3">
                Download All
              </a>
                <div class="row">
                  @if ($proof !== null)
                      @foreach ($proof as $item)
                         @if (pathinfo($item, PATHINFO_EXTENSION) === 'jpg' || pathinfo($item, PATHINFO_EXTENSION) === 'jpeg' || pathinfo($item, PATHINFO_EXTENSION) === 'png' || pathinfo($item, PATHINFO_EXTENSION) === 'gif')     
                         {{-- <a data-glightbox data-gallery="gallery" href="{{ asset($item) }}">
                              <img class="img-fluid" src="{{ asset($item) }}" alt="Image" width="200px" height="200px"> 
                          </a>                         --}}
                          <div class="col-lg-3 mb-2">
                            <a href="{{asset($item)}}">
                              <img class="img-fluid" src="{{asset($item)}}" alt="Image" width="150px" height="150px">
                            </a>
                          </div>
                         @else
                         <div class="col-lg-3 mb-2">
                            <a class="btn btn-primary" href="{{ asset($item) }}" target="_blank">View File ({{pathinfo($item, PATHINFO_EXTENSION)}})</a>
                         </div>
                         @endif
                      @endforeach
                  @endif
                </div>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="card card-secondary collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-people-carry"></i> <b>Collector Details</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label class="form-label">Collection Date</label>
                      <input type="text" class="form-control" readonly value="{{$sponsor->collection_date}}">
                    </div>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Collection Time Slot</label>
                    <input type="text" class="form-control" readonly value="{{$sponsor->collection_time_slot}}">
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Collector Name</label>
                    <input type="text" class="form-control" readonly value="{{$sponsor->collector_name}}">
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Collector IC</label>
                    <input type="text" class="form-control" readonly value="{{$sponsor->collector_IC}}">
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Collector Contact</label>
                    <input type="text" class="form-control" readonly value="{{$sponsor->collector_contact}}">
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Collector Plate Number</label>
                    <input type="text" class="form-control" readonly value="{{$sponsor->collector_plate_number}}">
                  </div>

                </div>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="card card-info collapsed-card" id="afterEvent">
            <div class="card-header">
              @php
                    $after = json_decode($sponsor->after_events_attachments);
  
                    if ($after !== null) {
                      $afterCounts = count($after);
                    } else {
                      $afterCounts = 0;
                    }
              @endphp
              <h3 class="card-title"><i class="fas fa-file-archive"></i> <b>After event attachments ({{$afterCounts}})</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="/downloadAll/after/{{$sponsor->id}}" class="btn btn-primary w-100 mb-3">
                Download All
              </a>
                <div class="row">
                  @if ($after !== null)
                      @foreach ($after as $item)
                         @if (pathinfo($item, PATHINFO_EXTENSION) === 'jpg' || pathinfo($item, PATHINFO_EXTENSION) === 'jpeg' || pathinfo($item, PATHINFO_EXTENSION) === 'png' || pathinfo($item, PATHINFO_EXTENSION) === 'gif')     
                         {{-- <a data-glightbox data-gallery="gallery" href="{{ asset($item) }}">
                              <img class="img-fluid" src="{{ asset($item) }}" alt="Image" width="200px" height="200px"> 
                          </a>                         --}}
                          <div class="col-lg-3 mb-2">
                            <a href="{{asset($item)}}">
                              <img class="img-fluid" src="{{asset($item)}}" alt="Image" width="150px" height="150px">
                            </a>
                          </div>
                         @else
                         <div class="col-lg-3 mb-2">
                            <a class="btn btn-primary" href="{{ asset($item) }}" target="_blank">View File ({{pathinfo($item, PATHINFO_EXTENSION)}})</a>
                         </div>
                         @endif
                      @endforeach
                  @endif
                </div>
            </div>
            <!-- /.card-body -->
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


<script>
  document.addEventListener('DOMContentLoaded', function() {
      const editButtons = document.querySelectorAll('.editTemplate');
      const saveButtons = document.querySelectorAll('.saveChanges');

      editButtons.forEach(editButton => {
          editButton.addEventListener('click', function() {
              const targetId = this.getAttribute('data-target');
              const templateContent = document.getElementById('template-content-' + targetId);
              const saveButton = document.querySelector('.saveChanges[data-target="' + targetId + '"]');

              // Enable contenteditable for editing
              templateContent.contentEditable = true;
              templateContent.focus();

              // Show the Save Changes button
              editButton.style.display = 'none';
              saveButton.style.display = 'inline-block';
          });
      });

      saveButtons.forEach(saveButton => {
          saveButton.addEventListener('click', function() {
              const targetId = this.getAttribute('data-target');
              const templateContent = document.getElementById('template-content-' + targetId);
              const editButton = document.querySelector('.editTemplate[data-target="' + targetId + '"]');
              const sponsorID = document.getElementById('template-id-' + targetId).value;

              // Disable contenteditable after editing
              templateContent.contentEditable = false;

              // Hide the Save Changes button
              saveButton.style.display = 'none';
              editButton.style.display = 'inline-block';

              // Get the edited content
              const editedContent = templateContent.innerHTML;
              console.log(editedContent)

              // Make an AJAX request to save the changes on the server
              const templateName = targetId;
              const url = '/save-template/' + templateName + "/" + sponsorID;

              // (The rest of the AJAX code remains the same as in the previous example)
              fetch(url, {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': '{{ csrf_token() }}',
                  },
                  body: JSON.stringify({ content: editedContent }),
              })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      // Optionally, show a success message or perform other actions
                      console.log('Changes saved successfully');
                  } else {
                      console.error('Failed to save changes');
                  }
              })
              .catch(error => console.error('Error:', error));

          });
      });
  });
</script>


@endsection