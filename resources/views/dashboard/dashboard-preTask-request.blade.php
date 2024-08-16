@extends('partial.dashboard')

@section('tiltle', 'New Request')
    
@section('content')
<div class="content">
  <nav class="mb-3" aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="#!">Page 1</a></li>
      <li class="breadcrumb-item"><a href="#!">Page 2</a></li>
      <li class="breadcrumb-item active">Default</li>
    </ol>
  </nav>
  <div class="mb-9">
    <div id="projectSummary" data-list='{"valueNames":["projectName","assignees","start","deadline","task","projectprogress","status","action"],"page":6,"pagination":true}'>
      <div class="row mb-4 gx-6 gy-3 align-items-center">
        <div class="col-auto">
          <h2 class="mb-0">Pre Task Requests<span class="fw-normal text-body-tertiary ms-3">({{$preTaskCount}})</span></h2>
        </div>
        {{-- <div class="col-auto"><a class="btn btn-primary px-5" href="../../apps/project-management/create-new.html"><i class="fa-solid fa-plus me-2"></i>Add new project</a></div> --}}
      </div>
      <div class="row g-3 justify-content-between align-items-end mb-4">
        {{-- <div class="col-12 col-sm-auto">
          <ul class="nav nav-links mx-n2">
            <li class="nav-item"><a class="nav-link px-2 py-1 active" aria-current="page" href="#"><span>All</span><span class="text-body-tertiary fw-semibold">(32)</span></a></li>
            <li class="nav-item"><a class="nav-link px-2 py-1" href="#"><span>Ongoing</span><span class="text-body-tertiary fw-semibold">(14)</span></a></li>
            <li class="nav-item"><a class="nav-link px-2 py-1" href="#"><span>Cancelled</span><span class="text-body-tertiary fw-semibold">(2)</span></a></li>
            <li class="nav-item"><a class="nav-link px-2 py-1" href="#"><span>Finished</span><span class="text-body-tertiary fw-semibold">(14)</span></a></li>
            <li class="nav-item"><a class="nav-link px-2 py-1" href="#"><span>Postponed</span><span class="text-body-tertiary fw-semibold">(2)</span></a></li>
          </ul>
        </div> --}}
        <div class="col-12 col-sm-auto">
          <div class="d-flex align-items-center">
            <div class="search-box me-3">
              <form class="position-relative">
                <input class="form-control search-input search" type="search" placeholder="Search projects" aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>

              </form>
            </div><a class="btn btn-phoenix-primary px-3 me-1 border-0 text-body" href="../../apps/project-management/project-list-view.html" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="List view"><span class="fa-solid fa-list fs-10"></span></a><a class="btn btn-phoenix-primary px-3 me-1" href="../../apps/project-management/project-board-view.html" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Board view">
              <svg width="9" height="9" viewbox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0.5C0 0.223857 0.223858 0 0.5 0H1.83333C2.10948 0 2.33333 0.223858 2.33333 0.5V1.83333C2.33333 2.10948 2.10948 2.33333 1.83333 2.33333H0.5C0.223857 2.33333 0 2.10948 0 1.83333V0.5Z" fill="currentColor"></path>
                <path d="M3.33333 0.5C3.33333 0.223857 3.55719 0 3.83333 0H5.16667C5.44281 0 5.66667 0.223858 5.66667 0.5V1.83333C5.66667 2.10948 5.44281 2.33333 5.16667 2.33333H3.83333C3.55719 2.33333 3.33333 2.10948 3.33333 1.83333V0.5Z" fill="currentColor"></path>
                <path d="M6.66667 0.5C6.66667 0.223857 6.89052 0 7.16667 0H8.5C8.77614 0 9 0.223858 9 0.5V1.83333C9 2.10948 8.77614 2.33333 8.5 2.33333H7.16667C6.89052 2.33333 6.66667 2.10948 6.66667 1.83333V0.5Z" fill="currentColor"></path>
                <path d="M0 3.83333C0 3.55719 0.223858 3.33333 0.5 3.33333H1.83333C2.10948 3.33333 2.33333 3.55719 2.33333 3.83333V5.16667C2.33333 5.44281 2.10948 5.66667 1.83333 5.66667H0.5C0.223857 5.66667 0 5.44281 0 5.16667V3.83333Z" fill="currentColor"></path>
                <path d="M3.33333 3.83333C3.33333 3.55719 3.55719 3.33333 3.83333 3.33333H5.16667C5.44281 3.33333 5.66667 3.55719 5.66667 3.83333V5.16667C5.66667 5.44281 5.44281 5.66667 5.16667 5.66667H3.83333C3.55719 5.66667 3.33333 5.44281 3.33333 5.16667V3.83333Z" fill="currentColor"></path>
                <path d="M6.66667 3.83333C6.66667 3.55719 6.89052 3.33333 7.16667 3.33333H8.5C8.77614 3.33333 9 3.55719 9 3.83333V5.16667C9 5.44281 8.77614 5.66667 8.5 5.66667H7.16667C6.89052 5.66667 6.66667 5.44281 6.66667 5.16667V3.83333Z" fill="currentColor"></path>
                <path d="M0 7.16667C0 6.89052 0.223858 6.66667 0.5 6.66667H1.83333C2.10948 6.66667 2.33333 6.89052 2.33333 7.16667V8.5C2.33333 8.77614 2.10948 9 1.83333 9H0.5C0.223857 9 0 8.77614 0 8.5V7.16667Z" fill="currentColor"></path>
                <path d="M3.33333 7.16667C3.33333 6.89052 3.55719 6.66667 3.83333 6.66667H5.16667C5.44281 6.66667 5.66667 6.89052 5.66667 7.16667V8.5C5.66667 8.77614 5.44281 9 5.16667 9H3.83333C3.55719 9 3.33333 8.77614 3.33333 8.5V7.16667Z" fill="currentColor"></path>
                <path d="M6.66667 7.16667C6.66667 6.89052 6.89052 6.66667 7.16667 6.66667H8.5C8.77614 6.66667 9 6.89052 9 7.16667V8.5C9 8.77614 8.77614 9 8.5 9H7.16667C6.89052 9 6.66667 8.77614 6.66667 8.5V7.16667Z" fill="currentColor"></path>
              </svg></a><a class="btn btn-phoenix-primary px-3" href="../../apps/project-management/project-card-view.html" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Card view">
              <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0.5C0 0.223858 0.223858 0 0.5 0H3.5C3.77614 0 4 0.223858 4 0.5V3.5C4 3.77614 3.77614 4 3.5 4H0.5C0.223858 4 0 3.77614 0 3.5V0.5Z" fill="currentColor"></path>
                <path d="M0 5.5C0 5.22386 0.223858 5 0.5 5H3.5C3.77614 5 4 5.22386 4 5.5V8.5C4 8.77614 3.77614 9 3.5 9H0.5C0.223858 9 0 8.77614 0 8.5V5.5Z" fill="currentColor"></path>
                <path d="M5 0.5C5 0.223858 5.22386 0 5.5 0H8.5C8.77614 0 9 0.223858 9 0.5V3.5C9 3.77614 8.77614 4 8.5 4H5.5C5.22386 4 5 3.77614 5 3.5V0.5Z" fill="currentColor"></path>
                <path d="M5 5.5C5 5.22386 5.22386 5 5.5 5H8.5C8.77614 5 9 5.22386 9 5.5V8.5C9 8.77614 8.77614 9 8.5 9H5.5C5.22386 9 5 8.77614 5 8.5V5.5Z" fill="currentColor"></path>
              </svg></a>
          </div>
        </div>
      </div>
      <div class="table-responsive scrollbar">
        <table class="table fs-9 mb-0 border-top border-translucent">
          <thead>
            <tr>
              <th class="sort white-space-nowrap align-middle ps-0" scope="col" data-sort="projectName" style="width:30%;">Event Date</th>
              <th class="sort align-middle ps-3" scope="col" data-sort="assignees" style="width:10%;">Event Name</th>
              <th class="sort align-middle ps-3" scope="col" data-sort="start" style="width:10%;">Name</th>
              <th class="sort align-middle ps-3" scope="col" data-sort="deadline" style="width:15%;">Email</th>
              <th class="sort align-middle ps-3" scope="col" data-sort="task" style="width:12%;">Phone</th>
              <th class="sort align-middle ps-3" scope="col" data-sort="projectprogress" style="width:5%;">Location</th>
              <th class="sort align-middle text-end" scope="col" data-sort="statuses" style="width:10%;">Status</th>
              <th class="sort align-middle text-end" scope="col" data-sort="statuses" style="width:10%;">Assignees</th>
             
            </tr>
          </thead>
          <tbody class="list" id="project-list-table-body">
            @foreach ($preTask as $item)
            <tr class="position-static">
              <td class="align-middle white-space-nowrap start ps-3 py-4">{{date('M d, Y', strtotime($item->from_date))}} - {{date('M d, Y', strtotime($item->to_date))}}</td>
              <td class="align-middle time white-space-nowrap ps-0 projectName py-4"><a class="fw-bold fs-8" href="#" data-bs-toggle="modal" data-bs-target="#{{$item->id}}">{{$item->event_name}}</a></td>
              <!-- modal -->
              <div class="modal fade" id="{{$item->id}}" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                  <div class="modal-content">
                    
                    <div class="modal-body p-4">
                      <div class="row">
                        <div class="col-12 col-xxl-8">
                          <div class="mb-5">
                            <div class="d-flex justify-content-between">
                              <h2 class="text-body-emphasis fw-bolder mb-2">{{$item->event_name}}</h2>
                              
                            </div><span class="badge badge-phoenix badge-phoenix-primary">{{$item->states}}<span class="ms-1 uil uil-stopwatch"></span></span>
                          </div>

                          <div class="row">
                            <div class="col-6">
                              <div class="lh-sm mb-4 mb-sm-0 mb-xl-4">
                                <div class="py-1">
                                  <div class="d-flex">
                                    <span class="fa-solid fa-earth-americas me-2 text-body-tertiary fs-9"></span>
                                    <h5 class="text-body">{{$item->organization}}</h5>
                                  </div>
                                </div>
                                <div class="align-top py-1 d-flex">
                                  <span class="fa-solid fa-flag me-2 text-body-tertiary fs-9"></span>
                                  <h5 class="text-body mb-0">{{$item->nature_event}} </h5>
                                  
                                </div>
                                <div class="align-top py-1 d-flex">
                                  <span class="fa-regular fa-calendar-check me-2 text-body-tertiary fs-9"></span>
                                  <h5 class="text-body mb-0 text-nowrap">Submission date : </h5>
                                  <div class="text-body-tertiary text-opacity-85 fw-semibold ps-1"> {{$item->created_at->format('d/m/Y')}}</div>
                                </div>
                              </div>
                              <div class="lh-sm mb-4 mb-sm-0 mb-xl-4">
                                <div class="align-top py-1 d-flex">
                                  <span class="fa-regular fa-calendar-check me-2 text-body-tertiary fs-9"></span>
                                  <h5 class="text-body mb-0 text-nowrap">Start date : </h5>
                                  <div class="text-body-tertiary text-opacity-85 fw-semibold ps-1"> {{$item->from_date}}</div>
                                </div>
                                <div class="align-top py-1 d-flex">
                                  <span class="fa-regular fa-calendar-check me-2 text-body-tertiary fs-9"></span>
                                  <h5 class="text-body mb-0 text-nowrap">End date : </h5>
                                  <div class="text-body-tertiary text-opacity-85 fw-semibold ps-1"> {{$item->to_date}}</div>
                                </div>
                              </div>
                              <div class="lh-sm mb-4 mb-sm-0 mb-xl-4">
                                <div class="align-top py-1 d-flex">
                                  <span class="fa-solid fa-earth-americas me-2 text-body-tertiary fs-9"></span>
                                  <h5 class="text-body mb-0 text-nowrap">Event Address : </h5>
                                </div>
                                <div class="align-top py-1 d-flex">
                                  <div class="text-body-tertiary text-opacity-85 fw-semibold ps-1"> {{$item->eventAddress}}</div>
                                </div>
                              </div>
                              <div class="lh-sm mb-4 mb-sm-0 mb-xl-4">
                                <div class="align-top py-1 d-flex">
                                  <span class="fa-regular fa-user me-2 text-body-tertiary fs-9"></span>
                                  <h5 class="text-body mb-0 text-nowrap">Expected Attendees : </h5>
                                  <div class="text-body-tertiary text-opacity-85 fw-semibold ps-1"> {{$item->attendees}}</div>
                                </div>
                              </div>
                              <div class="lh-sm mb-4 mb-sm-0 mb-xl-4">
                                <div class="align-top py-1 d-flex">
                                  <span class="fa-regular fa-user me-2 text-body-tertiary fs-9"></span>
                                  <h5 class="text-body mb-0 text-nowrap">Where they heard about Jantzen : </h5>
                                </div>
                                <div class="align-top py-1 d-flex">
                                  <div class="text-body-tertiary text-opacity-85 fw-semibold ps-1"> {{$item->about_jantzen}}</div>
                                </div>
                              </div>
                              <div class="lh-sm mb-4 mb-sm-0 mb-xl-4">
                                <div class="align-top py-1 d-flex">
                                  <span class="fa-regular fa-file-alt me-2 text-body-tertiary fs-9"></span>
                                  <h5 class="text-body mb-0 text-nowrap">Product Explanation : </h5><br>
                                </div>
                                <div class="align-top py-1 d-flex">
                                  <div class="text-body-tertiary text-opacity-85 fw-semibold ps-1"> {{$item->explaination_product}}</div>
                                </div>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="lh-sm mb-4 mb-sm-0 mb-xl-4">
                                <div class="py-1">
                                  <div class="d-flex">
                                    <span class="fa-solid fa-user me-2 text-body-tertiary fs-9"></span>
                                    <h5 class="text-body">Person In Charge</h5>
                                  </div>
                                </div>
                                <div class="align-top py-1 d-flex">
                                  <h5 class="text-body mb-0 text-nowrap">Name : </h5>
                                  <div class="text-body-tertiary text-opacity-85 fw-semibold ps-1"> {{$item->fullname}}</div>
                                </div>
                                <div class="align-top py-1 d-flex">
                                  <h5 class="text-body mb-0 text-nowrap">Contact Number : </h5>
                                  <div class="text-body-tertiary text-opacity-85 fw-semibold ps-1"> {{$item->contact}}</div>
                                </div>
                                <div class="align-top py-1 d-flex">
                                  <h5 class="text-body mb-0 text-nowrap">Email Address : </h5>
                                  <div class="text-body-tertiary text-opacity-85 fw-semibold ps-1"> {{$item->email}}</div>
                                </div>
                              </div>
                              <div class="lh-sm mb-4 mb-sm-0 mb-xl-4">
                                <div class="py-1">
                                  <div class="d-flex">
                                    <span class="fa-solid fa-user me-2 text-body-tertiary fs-9"></span>
                                    <h5 class="text-body">2nd Person In Charge</h5>
                                  </div>
                                </div>
                                <div class="align-top py-1 d-flex">
                                  <h5 class="text-body mb-0 text-nowrap">Name : </h5>
                                  <div class="text-body-tertiary text-opacity-85 fw-semibold ps-1"> {{$item->sec_PIC_name}}</div>
                                </div>
                                <div class="align-top py-1 d-flex">
                                  <h5 class="text-body mb-0 text-nowrap">Contact Number : </h5>
                                  <div class="text-body-tertiary text-opacity-85 fw-semibold ps-1"> {{$item->sec_PIC_number}}</div>
                                </div>
                                <div class="align-top py-1 d-flex">
                                  <h5 class="text-body mb-0 text-nowrap">Email Address : </h5>
                                  <div class="text-body-tertiary text-opacity-85 fw-semibold ps-1"> {{$item->sec_PIC_email}}</div>
                                </div>
                              </div>
                              <div class="lh-sm mb-4 mb-sm-0 mb-xl-4">
                                <div class="py-1">
                                  <div class="d-flex">
                                    <span class="fa-solid fa-user me-2 text-body-tertiary fs-9"></span>
                                    <h5 class="text-body">3rd Person In Charge</h5>
                                  </div>
                                </div>
                                <div class="align-top py-1 d-flex">
                                  <h5 class="text-body mb-0 text-nowrap">Name : </h5>
                                  <div class="text-body-tertiary text-opacity-85 fw-semibold ps-1"> {{$item->third_PIC_name}}</div>
                                </div>
                                <div class="align-top py-1 d-flex">
                                  <h5 class="text-body mb-0 text-nowrap">Contact Number : </h5>
                                  <div class="text-body-tertiary text-opacity-85 fw-semibold ps-1"> {{$item->third_PIC_number}}</div>
                                </div>
                                <div class="align-top py-1 d-flex">
                                  <h5 class="text-body mb-0 text-nowrap">Email Address : </h5>
                                  <div class="text-body-tertiary text-opacity-85 fw-semibold ps-1"> {{$item->third_PIC_email}}</div>
                                </div>
                              </div>
                              
                            </div>
                          </div>

                          <div class="row mb-5">
                            <div class="col-12">
                              <h3>Sponsor Products</h3>
                              
                              <div class="row g-0">
                                <div class="col-6 col-xl-3">
                                  <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end border-translucent">
                                    <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-primary" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">200ml (cartons)</span></div>
                                    <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$item->confirmro_200ml}}</h3>
                                  </div>
                                </div>
                                <div class="col-6 col-xl-3">
                                  <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end-md-0 border-end-xl border-translucent">
                                    <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-info" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">500ml (cartons)</span></div>
                                    <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$item->confirmro_500ml}}</h3>
                                  </div>
                                </div>
                                <div class="col-6 col-xl-3">
                                  <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end-md-0 border-end-xl border-translucent">
                                    <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-success" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">350ml (cartons)</span></div>
                                    <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$item->confirmro_350ml}}</h3>
                                  </div>
                                </div>
                                <div class="col-6 col-xl-3">
                                  <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end-md-0 border-end-xl border-translucent">
                                    <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-11 me-2 text-info-light" data-fa-transform="up-2"></span><span class="mb-0 fs-9 text-body">11L (cartons)</span></div>
                                    <h3 class="fw-semibold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">{{$item->confirmro_11L}}</h3>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <h3 class="text-body-emphasis mb-4">Project overview</h3>
                          <p class="text-body-secondary mb-4">{{$item->summary}}</p>
                        </div>
                        <div class="col-12 col-xxl-4">
                          <div class="bg-light dark__bg-gray-1100 h-100">
                            <div class="p-4 p-lg-6">
                              <h3 class="text-body-highlight mb-4 fw-bold">Recent activity</h3>
                              <div class="timeline-vertical timeline-with-details">
                                <div class="timeline-item position-relative">
                                  <div class="row g-md-3">
                                    <div class="col-12 col-md-auto d-flex">
                                      <div class="timeline-item-date order-1 order-md-0 me-md-4">
                                        <p class="fs-10 fw-semibold text-body-tertiary text-opacity-85 text-end">01 DEC, 2023<br class="d-none d-md-block" /> 10:30 AM</p>
                                      </div>
                                      <div class="timeline-item-bar position-md-relative me-3 me-md-0">
                                        <div class="icon-item icon-item-sm rounded-7 shadow-none bg-primary-subtle"><span class="fa-solid fa-chess text-primary-dark fs-10"></span></div><span class="timeline-bar border-end border-dashed"></span>
                                      </div>
                                    </div>
                                    <div class="col">
                                      <div class="timeline-item-content ps-6 ps-md-3">
                                        <h5 class="fs-9 lh-sm">Phoenix Template: Unleashing Creative Possibilities</h5>
                                        <p class="fs-9">by <a class="fw-semibold" href="#!">Shantinon Mekalan</a></p>
                                        <p class="fs-9 text-body-secondary mb-5">Discover limitless creativity with the Phoenix template! Our latest update offers an array of innovative features and design options.</p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                               
                              </div>
                            </div>
                            <div class="px-4 px-lg-6">
                              <h4 class="mb-3">Sponsorship Proposal</h4>
                            </div>
                            <div class="border-top px-4 px-lg-6 py-4">
                              @php
                                  $attachments = json_decode($item->sponsorship_attachments, true);
                              @endphp
                               @if ($attachments)
                                  @foreach ($attachments as $attach)
                                      @php
                                          $filePath = $attach;
                                          $fileName = pathinfo($filePath, PATHINFO_BASENAME);
                                          $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                                          $isImage = in_array($fileExtension, ['jpeg', 'jpg', 'png', 'gif']);
                                      @endphp
                                      <div class="me-n3 my-3">
                                        <div class="d-flex flex-between-center">
                                          <div class="d-flex mb-1"><span class="fa-solid fa-image me-2 text-body-tertiary fs-9"></span>
                                            <p class="text-body-highlight mb-0 lh-1">{{$fileName}}</p>
                                          </div>
                                          <div class="btn-reveal-trigger">
                                            <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h"></span></button>
                                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="{{asset($attach)}}" target="_blank">View</a><a class="dropdown-item" href="{{asset($attach)}}" download="{{asset($attach)}}">Download</a></div>
                                          </div>
                                        </div>
                                        <div class="d-flex fs-9 text-body-tertiary mb-2 flex-wrap"><a href="#!">{{$item->fullname}} </a><span class="text-body-quaternary mx-1">| </span><span class="text-nowrap">{{$item->created_at->format('jS M, h:i A')}}</span></div>
                                        <img class="rounded-2 img-fluid" src="{{asset($attach)}}" alt="" style="width:320px" />
                                      </div>
                                      <hr>
                                  @endforeach
                               @else
                               <p>No attachments</p>
                               @endif
                            </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary" type="button">Okay</button>
                      <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end modal --->
              <td class="align-middle white-space-nowrap start ps-3 py-4">
                <p class="mb-0 fs-9 text-body">{{$item->fullname}}</p>
              </td>
              <td class="align-middle white-space-nowrap deadline ps-3 py-4">
                <p class="mb-0 fs-9 text-body">{{$item->email}}</p>
              </td>
              <td class="align-middle white-space-nowrap task ps-3 py-4">
                <p class="fw-bo text-body fs-9 mb-0">{{$item->contact}}</p>
              </td>
              <td class="align-middle white-space-nowrap task ps-3 py-4">
                <p class="fw-bo text-body fs-9 mb-0">{{ strlen($item->eventAddress) > 10 ? substr($item->eventAddress, 0, 10) . '...' : $item->eventAddress }}</p>
              </td>
              <td class="align-middle white-space-nowrap task ps-3 py-4">
                <button class="btn btn-danger">{{$item->states}}</button>
              </td>
              <td class="align-middle white-space-nowrap task ps-3 py-4">
                @if ($item->handle_by !== null)
                      {{$item->handle_by}}
                      @else
                      None
                      @endif
              </td>
              
            </tr>
            @endforeach  
          </tbody>
        </table>
      </div>
      <div class="d-flex flex-wrap align-items-center justify-content-between py-3 pe-0 fs-9 border-bottom border-translucent">
        <div class="d-flex">
          <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info"></p><a class="fw-semibold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semibold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
        </div>
        <div class="d-flex">
          <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
          <ul class="mb-0 pagination"></ul>
          <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer position-absolute">
    <div class="row g-0 justify-content-between align-items-center h-100">
      <div class="col-12 col-sm-auto text-center">
        <p class="mb-0 mt-2 mt-sm-0 text-body">Thank you for creating with Phoenix<span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2024 &copy;<a class="mx-1" href="https://themewagon.com">Themewagon</a></p>
      </div>
      <div class="col-12 col-sm-auto text-center">
        <p class="mb-0 text-body-tertiary text-opacity-85">v1.18.0</p>
      </div>
    </div>
  </footer>
</div>
<script>
  var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
  var navbarTop = document.querySelector('.navbar-top');
  if (navbarTopStyle === 'darker') {
    navbarTop.setAttribute('data-navbar-appearance', 'darker');
  }

  var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
  var navbarVertical = document.querySelector('.navbar-vertical');
  if (navbarVertical && navbarVerticalStyle === 'darker') {
    navbarVertical.setAttribute('data-navbar-appearance', 'darker');
  }
</script>
@endsection