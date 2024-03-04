@extends('partial.dashboard-main')

@section('title', 'Gallery')
    
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gallery</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Gallery</li>
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
            <div class="card card-warning">
              <div class="card-header">
                <h4 class="card-title">Proof of Agreements Gallery</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  @foreach ($sponsors as $sponsor)
                      @php
                          $proofReview = json_decode($sponsor->attachements_agreement_proof_review);
                          $proofPhoto= json_decode($sponsor->attachements_agreement_proof_photo);
                          $proofVideo = json_decode($sponsor->attachements_agreement_proof_video);
                      @endphp
                      @if ($proofReview !== null)
                        @foreach ($proofReview as $item)
                          @if (pathinfo($item, PATHINFO_EXTENSION) === 'jpg' || pathinfo($item, PATHINFO_EXTENSION) === 'jpeg' || pathinfo($item, PATHINFO_EXTENSION) === 'png' || pathinfo($item, PATHINFO_EXTENSION) === 'gif')                   
                          <div class="col-sm-2">
                            <a href="{{asset($item)}}" data-toggle="lightbox" data-title="<a href='{{ route('view-request', ['id' => $sponsor->id]) }}'>View Details</a>" data-gallery="gallery">
                              <img src="{{asset($item)}}" class="img-fluid mb-2" alt="{{asset($item)}}"/>
                            </a>
                          </div>
                          @endif
                        @endforeach
                      @endif
                      @if ($proofPhoto !== null)
                        @foreach ($proofPhoto as $item)
                          @if (pathinfo($item, PATHINFO_EXTENSION) === 'jpg' || pathinfo($item, PATHINFO_EXTENSION) === 'jpeg' || pathinfo($item, PATHINFO_EXTENSION) === 'png' || pathinfo($item, PATHINFO_EXTENSION) === 'gif')                   
                          <div class="col-sm-2">
                            <a href="{{asset($item)}}" data-toggle="lightbox" data-title="<a href='{{ route('view-request', ['id' => $sponsor->id]) }}'>View Details</a>" data-gallery="gallery">
                              <img src="{{asset($item)}}" class="img-fluid mb-2" alt="{{asset($item)}}"/>
                            </a>
                          </div>
                          @endif
                        @endforeach
                      @endif
                      @if ($proofVideo !== null)
                        @foreach ($proofVideo as $item)
                          @if (pathinfo($item, PATHINFO_EXTENSION) === 'jpg' || pathinfo($item, PATHINFO_EXTENSION) === 'jpeg' || pathinfo($item, PATHINFO_EXTENSION) === 'png' || pathinfo($item, PATHINFO_EXTENSION) === 'gif')                   
                          <div class="col-sm-2">
                            <a href="{{asset($item)}}" data-toggle="lightbox" data-title="<a href='{{ route('view-request', ['id' => $sponsor->id]) }}'>View Details</a>" data-gallery="gallery">
                              <img src="{{asset($item)}}" class="img-fluid mb-2" alt="{{asset($item)}}"/>
                            </a>
                          </div>
                          @endif
                        @endforeach
                      @endif
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">After Events Gallery</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  @foreach ($sponsors as $sponsor)
                      @php
                          $afterReview = json_decode($sponsor->after_events_attachments_review);
                          $afterPhoto= json_decode($sponsor->after_events_attachments_photo);
                          $afterVideo = json_decode($sponsor->after_events_attachments_video);
                      @endphp
                      @if ($afterReview !== null)
                        @foreach ($afterReview as $item)
                          @if (pathinfo($item, PATHINFO_EXTENSION) === 'jpg' || pathinfo($item, PATHINFO_EXTENSION) === 'jpeg' || pathinfo($item, PATHINFO_EXTENSION) === 'png' || pathinfo($item, PATHINFO_EXTENSION) === 'gif')                   
                          <div class="col-sm-2">
                            <a href="{{asset($item)}}" data-toggle="lightbox" data-title="<a href='{{ route('view-request', ['id' => $sponsor->id]) }}'>View Details</a>" data-gallery="gallery">
                              <img src="{{asset($item)}}" class="img-fluid mb-2" alt="{{asset($item)}}"/>
                            </a>
                          </div>
                          @endif
                        @endforeach
                      @endif
                      @if ($afterPhoto !== null)
                        @foreach ($afterPhoto as $item)
                          @if (pathinfo($item, PATHINFO_EXTENSION) === 'jpg' || pathinfo($item, PATHINFO_EXTENSION) === 'jpeg' || pathinfo($item, PATHINFO_EXTENSION) === 'png' || pathinfo($item, PATHINFO_EXTENSION) === 'gif')                   
                          <div class="col-sm-2">
                            <a href="{{asset($item)}}" data-toggle="lightbox" data-title="<a href='{{ route('view-request', ['id' => $sponsor->id]) }}'>View Details</a>" data-gallery="gallery">
                              <img src="{{asset($item)}}" class="img-fluid mb-2" alt="{{asset($item)}}"/>
                            </a>
                          </div>
                          @endif
                        @endforeach
                      @endif
                      @if ($afterVideo !== null)
                        @foreach ($afterVideo as $item)
                          @if (pathinfo($item, PATHINFO_EXTENSION) === 'jpg' || pathinfo($item, PATHINFO_EXTENSION) === 'jpeg' || pathinfo($item, PATHINFO_EXTENSION) === 'png' || pathinfo($item, PATHINFO_EXTENSION) === 'gif')                   
                          <div class="col-sm-2">
                            <a href="{{asset($item)}}" data-toggle="lightbox" data-title="<a href='{{ route('view-request', ['id' => $sponsor->id]) }}'>View Details</a>" data-gallery="gallery">
                              <img src="{{asset($item)}}" class="img-fluid mb-2" alt="{{asset($item)}}"/>
                            </a>
                          </div>
                          @endif
                        @endforeach
                      @endif
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>


@endsection