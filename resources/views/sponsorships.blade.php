@extends('partial.mains')

@section('title', 'Jantzen Sponsorship')
    
@section('content')
<div class="content">
    
    <div class="mb-9">
      <h2 class="fs-5 mb-4 mb-xl-5">New Sponsorship</h2>
      <div class="theme-wizard" data-theme-wizard="data-theme-wizard" data-wizard-modal-disabled="data-wizard-modal-disabled">
        <div class="row gx-0 gx-xl-5">
          <div class="col-xl-4 order-xl-1">
            <div class="scrollbar mb-4">
              <ul class="nav justify-content-between flex-nowrap nav-wizard nav-wizard-vertical-xl" data-tab-map-container="data-tab-map-container">
                <li class="nav-item"><a class="nav-link active py-0 py-xl-3" href="#add-property-wizard-tab1" data-bs-toggle="tab" data-wizard-step="1">
                    <div class="text-center d-inline-block d-xl-flex align-items-center gap-3"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fa-solid fa-file nav-item-icon"></span><span class="fa-solid fa-check check-icon"></span></span></span><span class="nav-item-title fs-9 fs-xl-8">Info</span></div>
                  </a></li>
                <li class="nav-item"><a class="nav-link py-0 py-xl-3" href="#add-property-wizard-tab4" data-bs-toggle="tab" data-wizard-step="4">
                    <div class="text-center d-inline-block d-xl-flex align-items-center gap-3"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fa-solid fa-images nav-item-icon"></span><span class="fa-solid fa-check check-icon"></span></span></span><span class="nav-item-title fs-9 fs-xl-8">Project Proposal</span></div>
                  </a></li>
                <li class="nav-item"><a class="nav-link py-0 py-xl-3" href="#add-property-wizard-tab5" data-bs-toggle="tab" data-wizard-step="5">
                    <div class="text-center d-inline-block d-xl-flex align-items-center gap-3"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fa-solid fa-address-card nav-item-icon"></span><span class="fa-solid fa-check check-icon"></span></span></span><span class="nav-item-title fs-9 fs-xl-8">Contact Information</span></div>
                  </a></li>
                <li class="nav-item"><a class="nav-link py-0 py-xl-3" href="#add-property-wizard-tab6" data-bs-toggle="tab" data-wizard-step="6">
                  <div class="text-center d-inline-block d-xl-flex align-items-center gap-3"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fa-solid fas fa-cart-plus nav-item-icon"></span><span class="fa-solid fa-check check-icon"></span></span></span><span class="nav-item-title fs-9 fs-xl-8">Product Sponsor</span></div>
                </a></li>
                <li class="nav-item"><a class="nav-link py-0 py-xl-3" href="#add-property-wizard-tab7" data-bs-toggle="tab" data-wizard-step="7">
                    <div class="text-center d-inline-block d-xl-flex align-items-center gap-3"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-check"></span></span></span><span class="nav-item-title fs-9 fs-xl-8">Done</span></div>
                  </a></li>
              </ul>
            </div>
          </div>
          <div class="col-xl-8 flex-1">
            <div class="row">
              <div class="col-xxl-8">
                <div class="tab-content">
                  <div class="tab-pane active" role="tabpanel" aria-labelledby="add-property-wizard-tab1" id="add-property-wizard-tab1">
                    <form action="/sponsorship-fill-request" method="POST" enctype="multipart/form-data">
                      @csrf
                      <h3 class="mb-6">Basic information</h3>
                      <h4 class="mb-4">Project Information</h4>
                      <div class="form-floating">
                        <input class="form-control" type="text" name="organization" id="add-property-wizardwizard-name" placeholder="Property Name" />
                        <label for="add-property-wizardwizard-name">Organizer / Company / School</label>
                        
                      </div>
                      <div class="form-floating my-3">
                        <input class="form-control" type="text" name="event_name" id="add-property-wizardwizard-name" />
                        <label for="add-property-wizardwizard-name">Project Name</label>
                        
                      </div>
                      <div class="form-floating my-3">
                        <textarea class="form-control" placeholder="Description" name="summary" id="add-property-wizard-wizard-des" style="height: 162px"></textarea>
                        <label for="add-property-wizard-wizard-des">Project Overview</label>
                       
                      </div>
                      <div class="form-floating my-3">
                        <input class="form-control" type="text" name="nature_event" id="add-property-wizardwizard-name" />
                        <label for="add-property-wizard-wizard-des">Nature of The Event / Type of Event</label>
                       
                      </div>
                      <div class="form-floating my-3">
                        <input class="form-control" type="text" name="attendees" id="add-property-wizardwizard-name"  />
                        <label for="add-property-wizardwizard-name">Expected Attendees</label>
                        
                      </div>
                      <h4 class="mt-6 mb-0">Event Date</h4>
                      <div class="row g-3 align-items-center my-3">
                        <div class="col-12 col-sm-6 col-md-auto flex-md-grow-1">
                          <div class="form-floating">
                            <input class="form-control datetimepicker" name="from_date" id="journeyDate" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true,"defaultDate":"today","dateFormat":"j M, Y"}' />
                            <label class="form-label" for="journeyDate">From</label>
                          </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-auto flex-md-grow-1">
                          <div class="form-floating">
                            <input class="form-control datetimepicker" name="to_date" id="returnDate" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true,"defaultDate":"today","dateFormat":"j M, Y"}' />
                            <label class="form-label" for="returnDate">To</label>
                          </div>
                        </div>
                      </div>
                      
                      <!-- Location -->
                      <h4 class="mt-6 mb-4">Event Address</h4>
                      <div class="form-icon-container">
                        <div class="form-floating">
                          <input class="form-control form-icon-input" type="text" name="add-property-wizard-search-address" id="add-property-wizardwizard-search-address" placeholder="Search address..." />
                          <label class="text-body-tertiary form-icon-label" for="add-property-wizardwizard-search-address">Search address...</label>
                        </div><span class="fa-solid fa-location-dot text-body form-icon fs-10"></span><span class="fa-solid fa-location-crosshairs position-absolute text-primary fs-9 end-0 top-0 mt-3 me-3" data-fa-transform="down-2"></span>
                      </div>
                      <div class="mapbox-container rounded-3 border overflow-hidden mt-3 mb-6">
                        <div id="mapbox" data-mapbox='{"attributionControl":false,"center":[-74.0020158,40.7228022],"zoom":14,"scrollZoom":false}' style="height: 250px"></div>
                      </div>
                      <div class="form-floating">
                        <input class="form-control" type="text" name="street" id="add-property-wizardwizard-street" placeholder="Apartment / Street" />
                        <label for="add-property-wizardwizard-street">Apartment / Street</label>
                      </div>
                      <div class="row gx-3 my-3">
                        <div class="col-md-6">
                          <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" type="text" name="city" id="add-property-wizardwizard-city" placeholder="City" />
                            <label for="add-property-wizardwizard-city">City</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-floating">
                            <input class="form-control" type="text" name="state" id="add-property-wizardwizard-state" placeholder="State (Optional)" />
                            <label for="add-property-wizardwizard-state">State (Optional)</label>
                          </div>
                        </div>
                      </div>
                      <div class="row g-3">
                        <div class="col-md-6">
                          <div class="form-floating">
                            <input class="form-control" type="text" name="zipCode" id="add-property-wizardwizard-zip-code" placeholder="Zip Code" />
                            <label for="add-property-wizardwizard-zip-code">Zip Code</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-floating">
                            <input class="form-control" type="text" name="Country" id="add-property-wizardwizard-country" placeholder="Country / Region" />
                            <label for="add-property-wizardwizard-country">Country / Region</label>
                          </div>
                        </div>
                      </div>
                      <!-- end location -->
                  </div>
                  <div class="tab-pane" role="tabpanel" aria-labelledby="add-property-wizard-tab4" id="add-property-wizard-tab4">
                      <h3 class="mb-6">Add Project Proposal</h3>
                      <div class="dropzone dropzone-multiple p-0 mb-5" id="my-awesome-dropzone" data-dropzone="data-dropzone">
                        <div class="fallback">
                          <input name="file" type="file" multiple="multiple" />
                        </div>
                        <div class="dz-message text-body-tertiary text-opacity-85" data-dz-message="data-dz-message">Drag your photo here<span class="text-body-secondary px-1">or</span>
                          <button class="btn btn-link p-0" type="button">Browse from device</button><br /><img class="mt-3 me-2" src="../../../../assets/img/icons/image-icon.png" width="40" alt="" />
                        </div>
                        <div class="dz-preview d-flex flex-wrap mt-3">
                          <div class="rounded-2 overflow-hidden me-2 mb-2 position-relative" style="height:140px;width:200px;">
                            <img class="w-100 h-100 object-fit-cover" src="../../../../assets/img/products/23.png" alt="..." data-dz-thumbnail="data-dz-thumbnail" />
                            <button class="btn dropdown-toggle dropdown-caret-none px-3 text-body bg-body dz-remove w-auto h-auto py-0 border" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="top: 16px; right: 16px">
                              <span class="fa-solid fa-ellipsis"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end py-1">
                              <li><a class="dropdown-item" href="#!" data-dz-remove="data-dz-remove">Remove</a></li>
                            </ul>
                          </div>
                        </div>
                        <input type="hidden" name="file_names" value="[]" />
                      </div>
                      
                  </div>
                  <div class="tab-pane" role="tabpanel" aria-labelledby="add-property-wizard-tab5" id="add-property-wizard-tab5">
                      <h3 class="mb-6">Contact Information</h3>
                      <h4 class="mt-6 mb-3">Main Person In Charge</h4>
                      <div class="form-floating my-3">
                        <input class="form-control" type="text" name="name" id="add-property-wizardwizard-name" placeholder="Property Name" />
                        <label for="add-property-wizardwizard-name">Fullname</label>
                        
                      </div>
                      <div class="row g-3">
                        <div class="col-md-6">
                          <div class="form-floating">
                            <input class="form-control input-spin-none" type="email" name="email" id="add-property-wizardwizard-email" placeholder="Email Address" />
                            <label for="add-property-wizardwizard-email">Email Address</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-floating">
                            <input class="form-control input-spin-none" type="number" name="contact" id="add-property-wizardwizard-phone" placeholder="Phone number" />
                            <label for="add-property-wizardwizard-phone">Phone number</label>
                          </div>
                        </div>
                      </div>
                      <!-- sec pic -->
                      <h4 class="mt-6 mb-3">Second Person In Charge</h4>
                      <div class="form-floating my-3">
                        <input class="form-control" type="text" name="sec_PIC_name" id="add-property-wizardwizard-name" placeholder="Property Name" />
                        <label for="add-property-wizardwizard-name">Fullname</label>
                        
                      </div>
                      <div class="row g-3">
                        <div class="col-md-6">
                          <div class="form-floating">
                            <input class="form-control input-spin-none" type="email" name="sec_PIC_email" id="add-property-wizardwizard-email" placeholder="Email Address" />
                            <label for="add-property-wizardwizard-email">Email Address</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-floating">
                            <input class="form-control input-spin-none" type="number" name="sec_PIC_number" id="add-property-wizardwizard-phone" placeholder="Phone number" />
                            <label for="add-property-wizardwizard-phone">Phone number</label>
                          </div>
                        </div>
                      </div>
                      <!-- third pic -->
                      <h4 class="mt-6 mb-3">Third Person In Charge</h4>
                      <div class="form-floating my-3">
                        <input class="form-control" type="text" name="third_PIC_name" id="add-property-wizardwizard-name" placeholder="Property Name" />
                        <label for="add-property-wizardwizard-name">Fullname</label>
                        
                      </div>
                      <div class="row g-3">
                        <div class="col-md-6">
                          <div class="form-floating">
                            <input class="form-control input-spin-none" type="email" name="third_PIC_email" id="add-property-wizardwizard-email" placeholder="Email Address" />
                            <label for="add-property-wizardwizard-email">Email Address</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-floating">
                            <input class="form-control input-spin-none" type="number" name="third_PIC_number" id="add-property-wizardwizard-phone" placeholder="Phone number" />
                            <label for="add-property-wizardwizard-phone">Phone number</label>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="tab-pane" role="tabpanel" aria-labelledby="add-property-wizard-tab6" id="add-property-wizard-tab6">
                    <h3 class="mb-6">Product Sponsor</h3>
                    <h4 class="mt-6 mb-4">Hhow did you know about Jantzen</h4>
                      <div class="border p-3 rounded-2">
                        <div class="form-check form-switch mb-0">
                          <input class="form-check-input" name="about_jantzen[]" id="radio-1" type="checkbox" value="Friends/Family" />
                          <label class="form-check-label fs-8 fw-bold text-body ms-2" for="cashPayment">Friends/Family</label>
                        </div>
                      </div>
                      <div class="border p-3 rounded-2 my-3">
                        <div class="form-check form-switch mb-0">
                          <input class="form-check-input" name="about_jantzen[]" id="radio-2" type="checkbox" value="Events" />
                          <label class="form-check-label fs-8 fw-bold text-body ms-2" for="cardPayment">Events</label>
                        </div>
                      </div>
                      <div class="border p-3 rounded-2 my-3">
                        <div class="form-check form-switch mb-0">
                          <input class="form-check-input" name="about_jantzen[]" id="radio-3" type="checkbox" value="Social Media"/>
                          <label class="form-check-label fs-8 fw-bold text-body ms-2" for="onlinePayment">Social Media</label>
                        </div>
                      </div>
                      <div class="border p-3 rounded-2 my-3">
                        <div class="form-check form-switch mb-0">
                          <input class="form-check-input" name="about_jantzen[]" id="radio-4" type="checkbox" value="I’m Jantzen User"/>
                          <label class="form-check-label fs-8 fw-bold text-body ms-2" for="onlinePayment">I’m Jantzen User</label>
                        </div>
                      </div>
                      <div class="border p-3 rounded-2">
                        <div class="form-check form-switch mb-0">
                          <input class="form-check-input" name="about_jantzen[]" id="radio-5" type="checkbox" value="Others"/>
                          <label class="form-check-label fs-8 fw-bold text-body ms-2" for="onlinePayment">Others</label>
                        </div>
                      </div>
                      <!-- explaination -->
                      <h4 class="mt-6 mb-4">Explanation of Product Use</h4>
                      <div class="border p-3 rounded-2">
                        <div class="form-check form-switch mb-0">
                          <input class="form-check-input" name="explaination_product[]" id="radio-11" type="checkbox" value="Complimentary items for attendees (e.g., in gift bags or as souvenirs)" />
                          <label class="form-check-label fs-8 fw-bold text-body ms-2" for="cashPayment">Complimentary items for attendees (e.g., in gift bags or as souvenirs)</label>
                        </div>
                      </div>
                      <div class="border p-3 rounded-2 my-3">
                        <div class="form-check form-switch mb-0">
                          <input class="form-check-input" name="explaination_product[]" id="radio-12" type="checkbox" value="Items for Purchase" />
                          <label class="form-check-label fs-8 fw-bold text-body ms-2" for="cardPayment">Items for Purchase</label>
                        </div>
                      </div>
                      <div class="border p-3 rounded-2 my-3">
                        <div class="form-check form-switch mb-0">
                          <input class="form-check-input" name="explaination_product[]" id="radio-13" type="checkbox" value="For Use at Exhibitor Stalls"/>
                          <label class="form-check-label fs-8 fw-bold text-body ms-2" for="onlinePayment">For Use at Exhibitor Stalls</label>
                        </div>
                      </div>
                      <div class="border p-3 rounded-2 my-3">
                        <div class="form-check form-switch mb-0">
                          <input class="form-check-input" name="explaination_product[]" id="radio-14" type="checkbox" value="For Team/Crew Utilization"/>
                          <label class="form-check-label fs-8 fw-bold text-body ms-2" for="onlinePayment">For Team/Crew Utilization</label>
                        </div>
                      </div>
                      <div class="border p-3 rounded-2 my-3">
                        <div class="form-check form-switch mb-0">
                          <input class="form-check-input" name="explaination_product[]" id="radio-15" type="checkbox" value="Others"/>
                          <label class="form-check-label fs-8 fw-bold text-body ms-2" for="onlinePayment">Others</label>
                        </div>
                      </div>
                      <!-- table -->
                      <h4 class="mt-6 mb-4">Requests Products</h4>
                    <table class="table fs-9 mb-0">
                      <thead>
                        <tr>
                          <th class="sort text-body-tertiary align-middle white-space-nowrap" scope="col" data-sort="name" style="width:300px;">Products</th>
                          <th class="sort text-body-tertiary align-middle px-4" scope="col" style="width:200px;" data-sort="beds">Total</th>
                        </tr>
                      </thead>
                      <tbody class="list" id="room-listing-table-body">
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                          <td class="align-middle py-4 name">
                            <div class="d-flex align-items-center gap-3"><a href="#!"> <img class="rounded-1 border border-translucent" src="{{asset('assets/images/200mlRo.jpg')}}" alt="" width="200" /></a>
                              <div> <a class="fs-8 fw-bolder text-body-emphasis text-nowrap" href="#!">RO Water</a>
                                <h6 class="fw-seibold text-body text-nowrap mt-1 mb-2"><span class="fa-solid fa-border-all me-2"></span>200ml</h6>
                                <h4 class="fw-bolder mb-0">(48 bottles/carton)</h4>
                              </div>
                            </div>
                          </td>
                          <td class="align-middle px-4 beds">
                            <div class="d-flex align-items-center">
                              <div class="input-group" data-quantity="data-quantity">
                                <button type="button" class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="minus"><span class="fa-solid fa-minus"></span></button>
                                <input class="form-control input-spin-none text-center" id="balcony" name="ro_200ml" type="number" value="0" />
                                <button type="button" class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="plus"><span class="fa-solid fa-plus"></span></button>
                              </div>
                            </div>
                          </td>
                          
                        </tr>
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                          <td class="align-middle py-4 name">
                            <div class="d-flex align-items-center gap-3"><a href="#!"> <img class="rounded-1 border border-translucent" src="{{asset('assets/images/500mlRo.jpg')}}" alt="" width="200" /></a>
                              <div> <a class="fs-8 fw-bolder text-body-emphasis text-nowrap" href="#!">RO water</a>
                                <h6 class="fw-seibold text-body text-nowrap mt-1 mb-2"><span class="fa-solid fa-border-all me-2"></span>500ml</h6>
                                <h4 class="fw-bolder mb-0">(24 bottles/carton)</h4>
                              </div>
                            </div>
                          </td>
                          <td class="align-middle px-4 beds">
                            <div class="d-flex align-items-center">
                              <div class="input-group" data-quantity="data-quantity">
                                <button type="button" class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="minus"><span class="fa-solid fa-minus"></span></button>
                                <input class="form-control input-spin-none text-center" id="balcony" name="ro_500ml" type="number" value="0" />
                                <button type="button" class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="plus"><span class="fa-solid fa-plus"></span></button>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                          <td class="align-middle py-4 name">
                            <div class="d-flex align-items-center gap-3"><a href="#!"> <img class="rounded-1 border border-translucent" src="{{asset('assets/images/11L.jpg')}}" alt="" width="200" /></a>
                              <div> <a class="fs-8 fw-bolder text-body-emphasis text-nowrap" href="#!">RO Water</a>
                                <h6 class="fw-seibold text-body text-nowrap mt-1 mb-2"><span class="fa-solid fa-border-all me-2"></span>11L</h6>
                                <h4 class="fw-bolder mb-0">1 Bottle</h4>
                              </div>
                            </div>
                          </td>
                          <td class="align-middle px-4 beds">
                            <div class="d-flex align-items-center">
                              <div class="input-group" data-quantity="data-quantity">
                                <button type="button" class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="minus"><span class="fa-solid fa-minus"></span></button>
                                <input class="form-control input-spin-none text-center" id="balcony" name="ro_11L" type="number" value="0" />
                                <button type="button" class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="plus"><span class="fa-solid fa-plus"></span></button>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                          <td class="align-middle py-4 name">
                            <div class="d-flex align-items-center gap-3"><a href="#!"> <img class="rounded-1 border border-translucent" src="{{asset('assets/images/350mlMinearl.jpg')}}" alt="" width="200" /></a>
                              <div> <a class="fs-8 fw-bolder text-body-emphasis text-nowrap" href="#!">Mineral Water</a>
                                <h6 class="fw-seibold text-body text-nowrap mt-1 mb-2"><span class="fa-solid fa-border-all me-2"></span>350ml</h6>
                                <h4 class="fw-bolder mb-0">(24 bottles/carton)</h4>
                              </div>
                            </div>
                          </td>
                          <td class="align-middle px-4 beds">
                            <div class="d-flex align-items-center">
                              <div class="input-group" data-quantity="data-quantity">
                                <button type="button" class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="minus"><span class="fa-solid fa-minus"></span></button>
                                <input class="form-control input-spin-none text-center" id="balcony" name="ro_350ml" type="number" value="0" />
                                <button type="button" class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="plus"><span class="fa-solid fa-plus"></span></button>
                              </div>
                            </div>
                          </td>
                        </tr>
                       
                      </tbody>
                    </table>
                   
                  </div>
                  <div class="tab-pane" role="tabpanel" aria-labelledby="add-property-wizard-tab7" id="add-property-wizard-tab7">
                    <h3 class="mb-2">We’re building your property</h3>
                    <p class="mb-5 text-body-tertiary">We're working on getting your property set up and ready for guests. Stay tuned for updates and start accepting bookings soon!</p>
                    <div class="alert alert-subtle-success alert-dismissible fade show mb-5" role="alert">
                      <p class="mb-0 flex-1 fw-semibold fs-9 fs-sm-8">Congratulations on your successful listing! Join a community of hospitality professionals as a host. Your hard work will turn your home into a sought-after destination. We anticipate hearing about your achievements.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="accordion-button-arrow-icon accordion mt-2" id="previewAccordion">
                      <div class="accordion-item border rounded-3 bg-body-emphasis p-3 p-sm-4 mb-5">
                        <h5 class="accordion-header">
                          <button class="accordion-button py-0 text-body-highlight" type="button" data-bs-toggle="collapse" data-bs-target="#basicInfo" aria-expanded="true" aria-controls="basicInfo"><img class="me-2 d-dark-none" src="../../../../assets/img/icons/info.svg" alt="" /><img class="me-2 d-light-none" src="../../../../assets/img/icons/info_dark.svg" alt="" /><span class="fs-sm-7">Basic Information</span></button>
                        </h5>
                        <div class="accordion-collapse collapse show" id="basicInfo" data-bs-parent="#previewAccordion">
                          <div class="mt-4 scrollbar"><a class="fs-9 fw-semibold mb-2 d-inline-block" href="#!">Edit info</a>
                            <table class="w-100">
                              <tr>
                                <th style="width: 176px"></th>
                                <th style="width: 32px"></th>
                                <th style="min-width: 300px"></th>
                              </tr>
                              <tr>
                                <td class="border-top pt-3 text-nowrap  pb-3">
                                  <h5 class="fw-semibold text-body-highlight mb-0">Property name</h5>
                                </td>
                                <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                  <p class="mb-0 w-max-content">:</p>
                                </td>
                                <td class="border-top pt-3  pb-3 text-nowrap">
                                  <p class="mb-0 text-body-secondary">Phoenix Oasis</p>
                                </td>
                              </tr>
                              <tr>
                                <td class="border-top pt-3 text-nowrap  pb-3">
                                  <h5 class="fw-semibold text-body-highlight mb-0">Property Information</h5>
                                </td>
                                <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                  <p class="mb-0 w-max-content">:</p>
                                </td>
                                <td class="border-top pt-3  pb-3 ">
                                  <p class="mb-0 text-body-secondary">Welcome to Phoenix Oasis, where luxury meets tranquility. Our hotel offers lavish accommodations, exquisite dining, rejuvenating spa experiences, and stunning views. Experience opulence redefined in a haven of serenity.</p>
                                </td>
                              </tr>
                              <tr>
                                <td class="border-top pt-3 text-nowrap  pb-3">
                                  <h5 class="fw-semibold text-body-highlight mb-0">Property type</h5>
                                </td>
                                <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                  <p class="mb-0 w-max-content">:</p>
                                </td>
                                <td class="border-top pt-3  pb-3 text-nowrap">
                                  <p class="mb-0 text-body-secondary">Hotel</p>
                                </td>
                              </tr>
                              <tr>
                                <td class="border-top pt-3 text-nowrap  pb-3">
                                  <h5 class="fw-semibold text-body-highlight mb-0">Rating</h5>
                                </td>
                                <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                  <p class="mb-0 w-max-content">:</p>
                                </td>
                                <td class="border-top pt-3  pb-3 text-nowrap">
                                  <p class="mb-0 text-body-secondary">5 Star</p>
                                </td>
                              </tr>
                              <tr>
                                <td class="border-top pt-3 text-nowrap  pb-3">
                                  <h5 class="fw-semibold text-body-highlight mb-0">Email address</h5>
                                </td>
                                <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                  <p class="mb-0 w-max-content">:</p>
                                </td>
                                <td class="border-top pt-3  pb-3 text-nowrap">
                                  <p class="mb-0 text-body-secondary">phoenix.oasis@email.com</p>
                                </td>
                              </tr>
                              <tr>
                                <td class="border-top pt-3 text-nowrap  pb-3">
                                  <h5 class="fw-semibold text-body-highlight mb-0">Mobile number</h5>
                                </td>
                                <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                  <p class="mb-0 w-max-content">:</p>
                                </td>
                                <td class="border-top pt-3  pb-3 text-nowrap">
                                  <p class="mb-0 text-body-secondary">(934) 907-3716</p>
                                </td>
                              </tr>
                              <tr>
                                <td class="border-top pt-3 text-nowrap  pb-3">
                                  <h5 class="fw-semibold text-body-highlight mb-0">Property chain</h5>
                                </td>
                                <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                  <p class="mb-0 w-max-content">:</p>
                                </td>
                                <td class="border-top pt-3  pb-3 text-nowrap">
                                  <p class="mb-0 text-body-secondary">Not-available</p>
                                </td>
                              </tr>
                              <tr>
                                <td class="border-top pt-3 text-nowrap  pb-3">
                                  <h5 class="fw-semibold text-body-highlight mb-0">CMS</h5>
                                </td>
                                <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                  <p class="mb-0 w-max-content">:</p>
                                </td>
                                <td class="border-top pt-3  pb-3 text-nowrap">
                                  <p class="mb-0 text-body-secondary">Available</p>
                                </td>
                              </tr>
                              <tr>
                                <td class="border-top pt-3 text-nowrap">
                                  <h5 class="fw-semibold text-body-highlight mb-0">CMS provider name</h5>
                                </td>
                                <td class="border-top px-3 pt-3 w-max-content">
                                  <p class="mb-0 w-max-content">:</p>
                                </td>
                                <td class="border-top pt-3  text-nowrap">
                                  <p class="mb-0 text-body-secondary">Eagle Eye</p>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="mt-6">
                      <button class="btn btn-success btn-lg btn-block w-100" type="submit">Submit</button>
                    </div>
                  </form>
                  </div>
                </div>
                <div class="mt-6" data-wizard-footer="data-wizard-footer">
                  <div class="d-none" data-wizard-prev-btn="data-wizard-prev-btn"></div>
                  <button class="btn btn-primary px-6 px-sm-11" type="button" data-wizard-next-btn="data-wizard-next-btn">Next</button>
                </div>
              </div>
            </div>
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
@endsection