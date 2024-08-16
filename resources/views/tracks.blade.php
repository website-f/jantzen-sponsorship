@extends('partial.mains')

@section('title', 'Jantzen Sponsorship')
    
@section('content')
<!-- <section> begin ============================-->
    <section class="pt-6 pb-9">

        <div class="container-small">
          
          <h2 class="mb-5 mt-8">Sponsorship Tracking ({{Auth::user()->email}})</h2>
          <a href="/logout" class="btn btn-primary mb-5">Logout</a>
          @if ($spon->states == "New")
          <div class="row g-3 align-items-sm-center justify-content-between mb-5">
            <div class="col-sm">
              <div class="theme-wizard flight-booking-wizard" style="width: 18.125rem">
                <ul class="nav justify-content-between nav-wizard nav-wizard-success">
                  <li class="nav-item"><a class="done complete nav-link fw-semibold" href="#" data-wizard-step="1">
                      <div class="d-inline-block text-center"><span class="nav-item-circle-parent"><span class="d-block nav-item-circle"><span class="fas fa-check"></span></span></span>
                        <spand-md-block class="mt-1 fs-9">Submitted</spand-md-block>
                      </div>
                    </a></li>
                  <li class="nav-item"><a class="active nav-link fw-semibold" href="#" data-wizard-step="2">
                      <div class="d-inline-block text-center"><span class="nav-item-circle-parent"><span class="d-block nav-item-circle"><span class="fas fa-user"></span></span></span>
                        <spand-md-block class="mt-1 fs-9">Waiting Approval</spand-md-block>
                      </div>
                    </a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm text-sm-end">
              <p class="mb-2 text-info">Waiting For Approval</p>
              <h3 class="mb-0 text-info fw-bold d-flex gap-2 align-items-center justify-content-sm-end"></h3>
            </div>
          </div>
          <div class="card bg-body-highlight mb-6">
            <div class="card-body p-4 p-lg-6">
              <div class="row g-0 justify-content-between">
                <div class="col-lg-8 mb-5 mb-lg-0">
                  <div class="row gy-4">
                    <div class="col-12">
                      <div class="row align-items-center">
                        <div class="col-md-12 mb-2 mb-md-0">
                          <h3>Await Approval / Contact (3-7 Working Days)</h3>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                        <div class="row align-items-center">
                          <div class="col-md-12 mb-2 mb-md-0">
                            
                            <p class="mb-0 fw-bold">After submission, the user waits for 3-7 working days for the admin to review the request. The user will receive a notification regarding the approval status.</p>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ps-lg-6 pt-5 pt-lg-0 border-top border-top-lg-0 border-start-lg border-translucent">
                    <div class="row g-lg-3 g-md-0 g-3 flex-between-center">
                      <div class="col-md-auto col-lg-12">
                        <div class="text-nowrap"> <img class="rounded-2" src="{{asset('assets/images/Ellipse-1-1.png')}}" alt="" width="32" />
                          <h5 class="text-nowrap fw-normal d-inline-block ms-2 mb-0">Jantzen Sponsorship</h5>
                        </div>
                      </div>
                      <div class="col-auto col-lg-12">
                        <h5 class="text-nowrap">Submission Date</h5>
                        <p class="mb-0">{{$spon->created_at->format('d F, Y')}}</p>
                      </div>
                      <div class="col-auto col-lg-12">
                        <h5 class="text-nowrap">Requestor Name</h5>
                        <p class="mb-0">{{$spon->fullname}}</p>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-6">
            <h3 class="mb-4">Sponsorship Details</h3>
            <div class="row g-0 justify-content-between mb-4">
              <div class="col-lg-12 mb-5 mb-lg-0">
                <h5 class="mb-4">{{$spon->event_name}}</h5>
                <table class="table table-borderless mb-0">
                  <tr>
                    <th class="p-0"></th>
                    <th class="p-0"></th>
                    <th class="p-0"></th>
                  </tr>
                  <tr>
                    <td class="text-nowrap py-1">
                      <p class="mb-0 text-body-tertiary text-nowrap"><span class="fa-solid far fa-building text-body-emphasis me-2"></span>Organizer / School / Company </p>
                    </td>
                    <td class="w-max-content py-1 pe-1">
                      <p class="mb-0 text-body-tertiary">:</p>
                    </td>
                    <td class="py-1 align-middle">
                      <h5 class="mb-0">{{$spon->organization}}</h5>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-nowrap py-1">
                      <p class="mb-0 text-body-tertiary text-nowrap"><span class="fa-solid far fa-flag text-body-emphasis me-2"></span>Address </p>
                    </td>
                    <td class="w-max-content py-1 pe-1">
                      <p class="mb-0 text-body-tertiary">:</p>
                    </td>
                    <td class="py-1 align-middle">
                      <h5 class="mb-0">{{{$spon->eventAddress}}}</h5>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-nowrap py-1">
                      <p class="mb-0 text-body-tertiary text-nowrap"><span class="fa-solid far fa-flag text-body-emphasis me-2"></span>Type of Event </p>
                    </td>
                    <td class="w-max-content py-1 pe-1">
                      <p class="mb-0 text-body-tertiary">:</p>
                    </td>
                    <td class="py-1 align-middle">
                      <h5 class="mb-0">{{{$spon->nature_event}}}</h5>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-nowrap py-1">
                      <p class="mb-0 text-body-tertiary text-nowrap"><span class="fa-solid far fa-calendar-check text-body-emphasis me-2"></span>Start Date </p>
                    </td>
                    <td class="w-max-content py-1 pe-1">
                      <p class="mb-0 text-body-tertiary">:</p>
                    </td>
                    <td class="py-1 align-middle">
                      <h5 class="mb-0">{{{date('M d, Y', strtotime($spon->from_date))}}}</h5>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-nowrap py-1">
                      <p class="mb-0 text-body-tertiary text-nowrap"><span class="fa-solid far fa-calendar-check text-body-emphasis me-2"></span>End Date </p>
                    </td>
                    <td class="w-max-content py-1 pe-1">
                      <p class="mb-0 text-body-tertiary">:</p>
                    </td>
                    <td class="py-1 align-middle">
                      <h5 class="mb-0">{{{date('M d, Y', strtotime($spon->to_date))}}}</h5>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-nowrap py-1">
                      <p class="mb-0 text-body-tertiary text-nowrap"><span class="fa-solid far fa-user text-body-emphasis me-2"></span>Expected Attendees </p>
                    </td>
                    <td class="w-max-content py-1 pe-1">
                      <p class="mb-0 text-body-tertiary">:</p>
                    </td>
                    <td class="py-1 align-middle">
                      <h5 class="mb-0">{{{$spon->attendees}}}</h5>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-nowrap py-1">
                      <p class="mb-0 text-body-tertiary text-nowrap"><span class="fa-solid far far fa-clipboard text-body-emphasis me-2"></span>Product Explanation</p>
                    </td>
                    <td class="w-max-content py-1 pe-1">
                      <p class="mb-0 text-body-tertiary">:</p>
                    </td>
                    <td class="py-1 align-middle">
                      <h5 class="mb-0">{{{$spon->explaination_product}}}</h5>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-nowrap py-1">
                      <p class="mb-0 text-body-tertiary text-nowrap"><span class="fa-solid far far fa-clipboard text-body-emphasis me-2"></span>Where You Heard About Jantzen</p>
                    </td>
                    <td class="w-max-content py-1 pe-1">
                      <p class="mb-0 text-body-tertiary">:</p>
                    </td>
                    <td class="py-1 align-middle">
                      <h5 class="mb-0">{{{$spon->about_jantzen}}}</h5>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-nowrap py-1">
                      <p class="mb-0 text-body-tertiary text-nowrap"><span class="fa-solid far fa-chart-bar text-body-emphasis me-2"></span>Event Overview </p>
                    </td>
                    <td class="w-max-content py-1 pe-1">
                      <p class="mb-0 text-body-tertiary">:</p>
                    </td>
                    <td class="py-1 align-middle">
                      <h5 class="mb-0">{{{$spon->summary}}}</h5>
                    </td>
                  </tr>
                </table>
              </div>
              
            </div>
            <div class="col-12">
                <h3>Requested Products</h3>
                
                <div class="row g-0">
                  <div class="col-6 col-xl-3">
                    <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end border-translucent">
                      <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-primary" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">200ml (cartons)</span></div>
                      <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$spon->ro_200ml}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-xl-3">
                    <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end-md-0 border-end-xl border-translucent">
                      <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-info" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">500ml (cartons)</span></div>
                      <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$spon->ro_500ml}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-xl-3">
                    <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end-md-0 border-end-xl border-translucent">
                      <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-success" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">350ml (cartons)</span></div>
                      <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$spon->ro_350ml}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-xl-3">
                    <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end-md-0 border-translucent">
                      <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-info-light" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">11L (cartons)</span></div>
                      <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$spon->ro_11L}}</h3>
                    </div>
                  </div>
                </div>
              </div>
            <p class="mb-0 text-info">*The airline’s fee is indicative and per person. Convenience fee is nom-refundable</p>
          </div>
          <form class="row justify-content-between">
            <div class="col-lg-12">
              <div class="mb-4">
                <h3>Contact Details</h3>
              </div>
            </div>
            <div class="col-lg-6">
              <div>
                <div class="card bg-body mb-4">
                  <div class="card-header bg-body-highlight">
                    <div class="d-flex flex-between-center">
                      <h5 class="mb-0 text-nowrap"><span class="fa-solid fa-user fs-9 me-2 text-primary"></span>Person 1</h5>
                    </div>
                  </div>
                  <div class="card-body">
                    <h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">Personal info</h6>
                    <hr class="my-2" />
                    <div class="row g-3 mb-6">
                      <div class="col-md-12">
                        <label class="fw-bold text-body-highlight mb-2" for="firstName-1">Name</label>
                        <p>{{$spon->fullname}}</p>
                      </div>
                    </div>
                    <h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">Contact info</h6>
                    <hr class="my-2" />
                    <div class="row g-3 mb-0">
                      <div class="col-md-6">
                        <label class="fw-bold text-body-highlight mb-2" for="email-1">Email</label>
                        <p>{{$spon->email}}</p>
                      </div>
                      <div class="col-md-6">
                        <label class="fw-bold text-body-highlight mb-2" for="phone-1">Phone</label>
                        <p>{{$spon->contact}}</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card bg-body mb-4">
                    <div class="card-header bg-body-highlight">
                      <div class="d-flex flex-between-center">
                        <h5 class="mb-0 text-nowrap"><span class="fa-solid fa-user fs-9 me-2 text-primary"></span>Person 2</h5>
                      </div>
                    </div>
                    <div class="card-body">
                      <h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">Personal info</h6>
                      <hr class="my-2" />
                      <div class="row g-3 mb-6">
                        <div class="col-md-12">
                          <label class="fw-bold text-body-highlight mb-2" for="firstName-1">Name</label>
                          <p>{{$spon->sec_PIC_name}}</p>
                        </div>
                      </div>
                      <h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">Contact info</h6>
                      <hr class="my-2" />
                      <div class="row g-3 mb-0">
                        <div class="col-md-6">
                          <label class="fw-bold text-body-highlight mb-2" for="email-1">Email</label>
                          <p>{{$spon->sec_PIC_email}}</p>
                        </div>
                        <div class="col-md-6">
                          <label class="fw-bold text-body-highlight mb-2" for="phone-1">Phone</label>
                          <p>{{$spon->sec_PIC_number}}</p>
                        </div>
                      </div>
                    </div>
                </div>
                  
                
              </div>
              
            </div>
            <div class="col-lg-6">
              <div class="card bg-body mb-4">
                <div class="card-header bg-body-highlight">
                  <div class="d-flex flex-between-center">
                    <h5 class="mb-0 text-nowrap"><span class="fa-solid fa-user fs-9 me-2 text-primary"></span>Person 3</h5>
                  </div>
                </div>
                <div class="card-body">
                  <h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">Personal info</h6>
                  <hr class="my-2" />
                  <div class="row g-3 mb-6">
                    <div class="col-md-12">
                      <label class="fw-bold text-body-highlight mb-2" for="firstName-1">Name</label>
                      <p>{{$spon->third_PIC_name}}</p>
                    </div>
                  </div>
                  <h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">Contact info</h6>
                  <hr class="my-2" />
                  <div class="row g-3 mb-0">
                    <div class="col-md-6">
                      <label class="fw-bold text-body-highlight mb-2" for="email-1">Email</label>
                      <p>{{$spon->third_PIC_email}}</p>
                    </div>
                    <div class="col-md-6">
                      <label class="fw-bold text-body-highlight mb-2" for="phone-1">Phone</label>
                      <p>{{$spon->third_PIC_number}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!-- APPROVEDD -->
          @elseif ($spon->states == "Approved")
          <div class="row g-3 align-items-sm-center justify-content-between mb-5">
            <div class="col-sm">
              <div class="theme-wizard flight-booking-wizard" style="width: 18.125rem">
                <ul class="nav justify-content-between nav-wizard nav-wizard-success">
                  <li class="nav-item"><a class="done complete nav-link fw-semibold" href="#" data-wizard-step="1">
                      <div class="d-inline-block text-center"><span class="nav-item-circle-parent"><span class="d-block nav-item-circle"><span class="fas fa-check"></span></span></span>
                        <spand-md-block class="mt-1 fs-9">Submitted</spand-md-block>
                      </div>
                    </a></li>
                  <li class="nav-item"><a class="done complete nav-link fw-semibold" href="#" data-wizard-step="2">
                      <div class="d-inline-block text-center"><span class="nav-item-circle-parent"><span class="d-block nav-item-circle"><span class="fas fa-user"></span></span></span>
                        <spand-md-block class="mt-1 fs-9">Approved</spand-md-block>
                      </div>
                    </a></li>
                  <li class="nav-item"><a class="active nav-link fw-semibold" href="#" data-wizard-step="2">
                      <div class="d-inline-block text-center"><span class="nav-item-circle-parent"><span class="d-block nav-item-circle"><span class="fas fa-thumbs-up"></span></span></span>
                        <spand-md-block class="mt-1 fs-9">Agreement</spand-md-block>
                      </div>
                    </a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm text-sm-end">
              <p class="mb-2 text-info">Waiting For Your Agreement</p>
              <h3 class="mb-0 text-info fw-bold d-flex gap-2 align-items-center justify-content-sm-end"></h3>
            </div>
          </div>
          <div class="card bg-body-highlight mb-6">
            <div class="card-body p-4 p-lg-6">
              <div class="row g-0 justify-content-between">
                <div class="col-lg-8 mb-5 mb-lg-0">
                  <div class="row gy-4">
                    <div class="col-12">
                      <div class="row align-items-center">
                        <div class="col-md-12 mb-2 mb-md-0">
                          <h3>Agreement to Terms</h3>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                        <div class="row align-items-center">
                          <div class="col-md-12 mb-2 mb-md-0">
                            
                            <p class="mb-0 fw-bold">If approved, the user must read and agree to the sponsorship terms and conditions to proceed. If no response within 3 days, the request will be considered as not interested and canceled.</p>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ps-lg-6 pt-5 pt-lg-0 border-top border-top-lg-0 border-start-lg border-translucent">
                    <div class="row g-lg-3 g-md-0 g-3 flex-between-center">
                      <div class="col-md-auto col-lg-12">
                        <div class="text-nowrap"> <img class="rounded-2" src="{{asset('assets/images/Ellipse-1-1.png')}}" alt="" width="32" />
                          <h5 class="text-nowrap fw-normal d-inline-block ms-2 mb-0">Jantzen Sponsorship</h5>
                        </div>
                      </div>
                      <div class="col-auto col-lg-12">
                        <h5 class="text-nowrap">Submission Date</h5>
                        <p class="mb-0">{{$spon->created_at->format('d F, Y')}}</p>
                      </div>
                      <div class="col-auto col-lg-12">
                        <h5 class="text-nowrap">Requestor Name</h5>
                        <p class="mb-0">{{$spon->fullname}}</p>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-6">
            
            <div class="col-12">
                <h3>Sponsored Products</h3>
                
                <div class="row g-0">
                  <div class="col-6 col-xl-3">
                    <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end border-translucent">
                      <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-primary" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">200ml (cartons)</span></div>
                      <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$spon->confirmro_200ml}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-xl-3">
                    <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end-md-0 border-end-xl border-translucent">
                      <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-info" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">500ml (cartons)</span></div>
                      <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$spon->confirmro_500ml}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-xl-3">
                    <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end-md-0 border-end-xl border-translucent">
                      <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-success" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">350ml (cartons)</span></div>
                      <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$spon->confirmro_350ml}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-xl-3">
                    <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end-md-0 border-translucent">
                      <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-info-light" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">11L (cartons)</span></div>
                      <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$spon->confirmro_11L}}</h3>
                    </div>
                  </div>
                </div>
            </div>

            <div class="col-12 mt-5">
              <h3>Others</h3>
              <p>{{$spon->others}}</p>
            </div>
              
            
          </div>
          <form class="row justify-content-between">
            <div class="col-lg-12">
              <div class="mb-4">
                <h3>Agreement</h3>
              </div>
            </div>
            <div class="col-lg-12">
              <div>
                <div class="card bg-body mb-4">
                  <div class="card-header bg-body-highlight">
                    <div class="d-flex flex-between-center">
                      <h5 class="mb-0 text-nowrap"><span class="fa-solid fa-user fs-9 me-2 text-primary"></span></h5>
                    </div>
                  </div>
                  <div class="card-body">
                    <h4 class="mb-0 fw-semibold">Waiting for the confirmation agreement and tasks</h4>
                    <hr class="my-2" />
                    
                  </div>
                </div>
                
                  
                
              </div>
              
            </div>
          </form>
          <!-- AGREED -->
          @elseif ($spon->states == "Agreed")
          <div class="row g-3 align-items-sm-center justify-content-between mb-5">
            <div class="col-sm">
              <div class="theme-wizard flight-booking-wizard" style="width: 18.125rem">
                <ul class="nav justify-content-between nav-wizard nav-wizard-success">
                  <li class="nav-item"><a class="done complete nav-link fw-semibold" href="#" data-wizard-step="1">
                      <div class="d-inline-block text-center"><span class="nav-item-circle-parent"><span class="d-block nav-item-circle"><span class="fas fa-check"></span></span></span>
                        <spand-md-block class="mt-1 fs-9">Submitted</spand-md-block>
                      </div>
                    </a></li>
                  <li class="nav-item"><a class="done complete nav-link fw-semibold" href="#" data-wizard-step="2">
                      <div class="d-inline-block text-center"><span class="nav-item-circle-parent"><span class="d-block nav-item-circle"><span class="fas fa-user"></span></span></span>
                        <spand-md-block class="mt-1 fs-9">Approved</spand-md-block>
                      </div>
                    </a></li>
                  <li class="nav-item"><a class="active nav-link fw-semibold" href="#" data-wizard-step="2">
                      <div class="d-inline-block text-center"><span class="nav-item-circle-parent"><span class="d-block nav-item-circle"><span class="fas fa-thumbs-up"></span></span></span>
                        <spand-md-block class="mt-1 fs-9">Agreement</spand-md-block>
                      </div>
                    </a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm text-sm-end">
              <p class="mb-2 text-info">Waiting for your agreement</p>
              <h3 class="mb-0 text-info fw-bold d-flex gap-2 align-items-center justify-content-sm-end"></h3>
            </div>
          </div>
          <div class="card bg-body-highlight mb-6">
            <div class="card-body p-4 p-lg-6">
              <div class="row g-0 justify-content-between">
                <div class="col-lg-8 mb-5 mb-lg-0">
                  <div class="row gy-4">
                    <div class="col-12">
                      <div class="row align-items-center">
                        <div class="col-md-12 mb-2 mb-md-0">
                          <h3>Pre-Task Completion</h3>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                        <div class="row align-items-center">
                          <div class="col-md-12 mb-2 mb-md-0">
                            
                            <p class="mb-0 fw-bold">Before collecting the sponsorship goods, the user must complete any required pre-tasks. These tasks will be displayed, and the user must upload the necessary files as proof of completion.</p>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ps-lg-6 pt-5 pt-lg-0 border-top border-top-lg-0 border-start-lg border-translucent">
                    <div class="row g-lg-3 g-md-0 g-3 flex-between-center">
                      <div class="col-md-auto col-lg-12">
                        <div class="text-nowrap"> <img class="rounded-2" src="{{asset('assets/images/Ellipse-1-1.png')}}" alt="" width="32" />
                          <h5 class="text-nowrap fw-normal d-inline-block ms-2 mb-0">Jantzen Sponsorship</h5>
                        </div>
                      </div>
                      <div class="col-auto col-lg-12">
                        <h5 class="text-nowrap">Submission Date</h5>
                        <p class="mb-0">{{$spon->created_at->format('d F, Y')}}</p>
                      </div>
                      <div class="col-auto col-lg-12">
                        <h5 class="text-nowrap">Requestor Name</h5>
                        <p class="mb-0">{{$spon->fullname}}</p>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-6">
            
            <div class="col-12">
                <h3>Sponsored Products</h3>
                
                <div class="row g-0">
                  <div class="col-6 col-xl-3">
                    <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end border-translucent">
                      <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-primary" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">200ml (cartons)</span></div>
                      <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$spon->confirmro_200ml}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-xl-3">
                    <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end-md-0 border-end-xl border-translucent">
                      <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-info" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">500ml (cartons)</span></div>
                      <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$spon->confirmro_500ml}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-xl-3">
                    <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end-md-0 border-end-xl border-translucent">
                      <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-success" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">350ml (cartons)</span></div>
                      <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$spon->confirmro_350ml}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-xl-3">
                    <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end-md-0 border-translucent">
                      <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-info-light" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">11L (cartons)</span></div>
                      <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$spon->confirmro_11L}}</h3>
                    </div>
                  </div>
                </div>
            </div>


            <div class="col-12 mt-5">
              <h3>Others</h3>
              <p>{{$spon->others}}</p>
            </div>
              
            
          </div>
          <form class="row justify-content-between">
            <div class="col-lg-12">
              <div class="mb-4">
                <h3>Agreement</h3>
              </div>
            </div>
            <div class="col-lg-12">
              <div>
                <div class="card bg-body mb-4">
                  <div class="card-header bg-body-highlight">
                    <div class="d-flex flex-between-center">
                      <h5 class="mb-0 text-nowrap"><span class="fa-solid fa-user fs-9 me-2 text-primary"></span></h5>
                    </div>
                  </div>
                  <div class="card-body">
                    <h4 class="mb-0 fw-semibold">Do you agree to provide proof of agreements ?</h4>
                    <hr class="my-2" />
                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#Agreed">Agree</button>
                    <div class="modal fade" id="Agreed" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="verticallyCenteredModalLabel">Agreed</h5>
                            <button class="btn btn-close p-1" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p class="text-body-tertiary lh-lg mb-0">Confirm ? </p>
                          </div>
                          <div class="modal-footer">
                            <a href="/agreed/{{$spon->id}}" class="btn btn-primary">Confirm</a>
                            <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#NotAgreed">Not Agree</button>
                    <div class="modal fade" id="NotAgreed" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="verticallyCenteredModalLabel">Not Agree</h5>
                            <button class="btn btn-close p-1" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p class="text-body-tertiary lh-lg mb-0">Confirm ? </p>
                          </div>
                          <div class="modal-footer">
                            <a href="/notagreed/{{$spon->id}}" class="btn btn-danger">Confirm</a>
                            <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                  
                
              </div>
              
            </div>
          </form>
          <!-- PRE TASK -->
          @elseif ($spon->states == "Pre Task")
          <div class="row g-3 align-items-sm-center justify-content-between mb-5">
            <div class="col-sm">
              <div class="theme-wizard flight-booking-wizard" style="width: 18.125rem">
                <ul class="nav justify-content-between nav-wizard nav-wizard-success">
                  <li class="nav-item"><a class="done complete nav-link fw-semibold" href="#" data-wizard-step="1">
                      <div class="d-inline-block text-center"><span class="nav-item-circle-parent"><span class="d-block nav-item-circle"><span class="fas fa-check"></span></span></span>
                        <spand-md-block class="mt-1 fs-9">Submitted</spand-md-block>
                      </div>
                    </a></li>
                  <li class="nav-item"><a class="done complete nav-link fw-semibold" href="#" data-wizard-step="2">
                      <div class="d-inline-block text-center"><span class="nav-item-circle-parent"><span class="d-block nav-item-circle"><span class="fas fa-user"></span></span></span>
                        <spand-md-block class="mt-1 fs-9">Approved</spand-md-block>
                      </div>
                    </a></li>
                  <li class="nav-item"><a class="done complete nav-link fw-semibold" href="#" data-wizard-step="2">
                      <div class="d-inline-block text-center"><span class="nav-item-circle-parent"><span class="d-block nav-item-circle"><span class="fas fa-thumbs-up"></span></span></span>
                        <spand-md-block class="mt-1 fs-9">Agreement</spand-md-block>
                      </div>
                    </a></li>
                  <li class="nav-item"><a class="active nav-link fw-semibold" href="#" data-wizard-step="2">
                      <div class="d-inline-block text-center"><span class="nav-item-circle-parent"><span class="d-block nav-item-circle"><span class="fas fa-window-restore"></span></span></span>
                        <spand-md-block class="mt-1 fs-9">Task</spand-md-block>
                      </div>
                    </a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm text-sm-end">
              <p class="mb-2 text-info">Waiting for your task given</p>
              <h3 class="mb-0 text-info fw-bold d-flex gap-2 align-items-center justify-content-sm-end"></h3>
            </div>
          </div>
          <div class="card bg-body-highlight mb-6">
            <div class="card-body p-4 p-lg-6">
              <div class="row g-0 justify-content-between">
                <div class="col-lg-8 mb-5 mb-lg-0">
                  <div class="row gy-4">
                    <div class="col-12">
                      <div class="row align-items-center">
                        <div class="col-md-12 mb-2 mb-md-0">
                          <h3>Pre-Task Completion</h3>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                        <div class="row align-items-center">
                          <div class="col-md-12 mb-2 mb-md-0">
                            
                            <p class="mb-0 fw-bold">Before collecting the sponsorship goods, the user must complete any required pre-tasks. These tasks will be displayed, and the user must upload the necessary files as proof of completion.</p>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ps-lg-6 pt-5 pt-lg-0 border-top border-top-lg-0 border-start-lg border-translucent">
                    <div class="row g-lg-3 g-md-0 g-3 flex-between-center">
                      <div class="col-md-auto col-lg-12">
                        <div class="text-nowrap"> <img class="rounded-2" src="{{asset('assets/images/Ellipse-1-1.png')}}" alt="" width="32" />
                          <h5 class="text-nowrap fw-normal d-inline-block ms-2 mb-0">Jantzen Sponsorship</h5>
                        </div>
                      </div>
                      <div class="col-auto col-lg-12">
                        <h5 class="text-nowrap">Submission Date</h5>
                        <p class="mb-0">{{$spon->created_at->format('d F, Y')}}</p>
                      </div>
                      <div class="col-auto col-lg-12">
                        <h5 class="text-nowrap">Requestor Name</h5>
                        <p class="mb-0">{{$spon->fullname}}</p>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-6">
            
            <div class="col-12">
                <h3>Sponsored Products</h3>
                
                <div class="row g-0">
                  <div class="col-6 col-xl-3">
                    <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end border-translucent">
                      <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-primary" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">200ml (cartons)</span></div>
                      <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$spon->confirmro_200ml}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-xl-3">
                    <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end-md-0 border-end-xl border-translucent">
                      <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-info" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">500ml (cartons)</span></div>
                      <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$spon->confirmro_500ml}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-xl-3">
                    <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end-md-0 border-end-xl border-translucent">
                      <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-success" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">350ml (cartons)</span></div>
                      <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$spon->confirmro_350ml}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-xl-3">
                    <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end-md-0 border-translucent">
                      <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-info-light" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">11L (cartons)</span></div>
                      <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$spon->confirmro_11L}}</h3>
                    </div>
                  </div>
                </div>
            </div>


            <div class="col-12 mt-5">
              <h3>Others</h3>
              <p>{{$spon->others}}</p>
            </div>
              
            
          </div>
          <form class="row justify-content-between">
            <div class="col-lg-12">
              <div class="mb-4">
                <h3>Tasks</h3>
              </div>
            </div>
            <div class="col-lg-12">
              <div>
                <div class="card bg-body mb-4">
                  <div class="card-header bg-body-highlight">
                    <div class="d-flex flex-between-center">
                      <h5 class="mb-0 text-nowrap"><span class="fa-solid fa-user fs-9 me-2 text-primary"></span></h5>
                    </div>
                  </div>
                  <div class="card-body">
                    <h4 class="mb-0 fw-semibold"></h4>
                    <hr class="my-2" />
                    
                  </div>
                </div>
                
                  
                
              </div>
              
            </div>
          </form>
          @endif
        </div>
        <!-- end of .container-->
        <div class="support-chat-container support-chat-bottom-lg">
          <div class="container-fluid support-chat">
            {{-- <div class="card">
              <div class="card-header d-flex flex-between-center px-4 py-3 border-bottom border-translucent">
                <h4>Contact</h4>
              </div>
              <div class="card-body chat p-0">
                
              </div>
              
            </div> --}}
          </div>
          <a href="#" target="_blank" class="btn btn-support-chat p-0 border border-translucent"><span class="fs-8 btn-text text-primary text-nowrap">Contact Us</span><span class="ping-icon-wrapper mt-n4 ms-n6 mt-sm-0 ms-sm-2 position-absolute position-sm-relative"><span class="ping-icon-bg"></span><span class="fa-solid fa-circle ping-icon"></span></span><span class="fa-solid fa-headset text-primary fs-8 d-sm-none"></span><span class="fa-solid fa-chevron-down text-primary fs-7"></span></a>
        </div>
      </section>
      <!-- <section> close ============================-->
@endsection