@extends('partial.dashboard-main')

@section('title', 'View Request')
    
@section('content')
<div class="div-block-25">
  @if ($sponsor->states == "Processing")
  <div class="div-block-26">
    <h3 class="heading-17">For Office Use: Event Sponsorship Evaluation and Approval</h3>
    <p class="paragraph-11">Detailed Assessment and Final Decision on Proposed Sponsorship Requests</p>
    <div class="w-form">
      <form action="/dashboard/request-submit/{{$sponsor->id}}" id="email-form-3" name="email-form-3" data-name="Email Form 3" method="POST" data-wf-page-id="651b71c3c78416c9cdafff14" data-wf-element-id="5618a528-0df1-6a8d-61a3-261f3d36d73c">
        @csrf
        @method("PUT")
        <div id="w-node-b98f2e41-65b2-848d-4014-fb62040c099d-cdafff14" class="w-layout-layout quick-stack-12 wf-layout-layout">
          <div id="w-node-_0f4ba253-0549-c968-19aa-e90290beb9b8-cdafff14" class="w-layout-cell cell-21">
            <button type="submit" class="button-21 w-button">Approve</button>
          </div>
          <div id="w-node-cbda6b4b-7b52-5dc4-4975-e5ec33c53443-cdafff14" class="w-layout-cell cell-20">
            <a href="/reject" class="button-22 w-button">Reject</a>
          </div>
          <div id="w-node-_13dc5bac-0e05-9751-0da2-f7cc29ea8657-cdafff14" class="w-layout-cell"><label for="field-3">States</label>
            <select id="field-3" name="states" data-name="Field 3" class="select-field w-select">
              <option value="">Select one...</option>
              <option value="Processing">Processing</option>
              <option value="Pending">Pending</option>
              <option value="MIA">MIA</option>
              <option value="Completed">Completed</option>
            </select>
          </div>
            <div id="w-node-_73a60d0b-7991-42d7-9bba-ecc75d81f7d2-cdafff14" class="w-layout-cell">
              <label for="field-7">Attending</label>
              <input type="text" class="text-field-12 w-input" maxlength="256" name="attending" data-name="Field 7" placeholder="" id="field-7" required="">
            </div>
        </div>
        <div id="w-node-_9cb880a3-a9ed-2a6e-4816-ced8c351eec6-cdafff14" class="w-layout-layout quick-stack-13 wf-layout-layout">
          <div id="w-node-_9cb880a3-a9ed-2a6e-4816-ced8c351eec7-cdafff14" class="w-layout-cell">
            <label for="field-8">Sposorship Handle By</label>
            <input type="text" class="text-field-13 w-input" maxlength="256" name="handle_by" data-name="Field 8" placeholder="" id="field-8" required="">
          </div>
          <div id="w-node-_9cb880a3-a9ed-2a6e-4816-ced8c351eec8-cdafff14" class="w-layout-cell">
            <label for="field-3">Booth / Space</label>
            <select id="field-3" name="booth_space" data-name="Field 3" class="select-field w-select">
              <option value="">Select one...</option>
              <option value="First">None</option>
              <option value="Booth">Booth</option>
              <option value="Space">Space</option>
            </select></div>
        </div>
        <div id="w-node-_9cb880a3-a9ed-2a6e-4816-ced8c351eec6-cdafff14" class="w-layout-layout quick-stack-13 wf-layout-layout">
          <div id="w-node-_9cb880a3-a9ed-2a6e-4816-ced8c351eec7-cdafff14" class="w-layout-cell">
            <label for="field-8">Pickup Location</label>
            <select id="field-3" name="pickup_location" data-name="Field 3" class="select-field w-select pickup-location">
              <option value="">Select one...</option>
              <option value="Puchong">Puchong</option>
              <option value="Shah Alam">Shah Alam</option>
            </select>
          </div>
          <div id="w-node-_9cb880a3-a9ed-2a6e-4816-ced8c351eec8-cdafff14" class="w-layout-cell">
            <label for="field-3">Pickup Location Address</label>
            <input type="text" class="text-field-13 w-input pickup-address" maxlength="256" name="pickup_address" data-name="Field 8" placeholder="" id="field-8" readonly>
          </div>
        </div>
        <div id="w-node-_9cb880a3-a9ed-2a6e-4816-ced8c351eec6-cdafff14" class="w-layout-layout quick-stack-13 wf-layout-layout">
          <div id="w-node-_9cb880a3-a9ed-2a6e-4816-ced8c351eec7-cdafff14" class="w-layout-cell">
            <label for="field-8">Contact Person</label>
            <input type="text" class="text-field-13 w-input contact-person" maxlength="256" name="contact_person" data-name="Field 8" placeholder="" id="field-8" readonly>
          </div>
          <div id="w-node-_9cb880a3-a9ed-2a6e-4816-ced8c351eec8-cdafff14" class="w-layout-cell">
            <label for="field-3">Phone Number</label>
            <input type="text" class="text-field-13 w-input phone-number" maxlength="256" name="pickup_phone_number" data-name="Field 8" placeholder="" id="field-8" readonly>
          </div>
        </div>
        <label for="">Sponsorhip Products</label>
        <div id="w-node-_33e61cbb-361b-84a1-20f5-bb6bab036c2b-cdafff14" class="w-layout-layout quick-stack-6 wf-layout-layout">
          <div id="w-node-_33e61cbb-361b-84a1-20f5-bb6bab036c2c-cdafff14" class="w-layout-cell cell-10">
            <input type="text" class="text-field-10 w-input" maxlength="256" name="confirmro_200ml" data-name="Field 4" placeholder="" id="field-4" required="">
            <div class="text-block-19">RO 200ml x Cartons</div>
          </div>
          <div id="w-node-_33e61cbb-361b-84a1-20f5-bb6bab036c32-cdafff14" class="w-layout-cell cell-11">
            <input type="text" class="text-field-10 w-input" maxlength="256" name="confirmro_500ml" data-name="Field 4" placeholder="" id="field-4" required="">
            <div class="text-block-19">RO 500ml x Cartons</div>
          </div>
          <div id="w-node-_33e61cbb-361b-84a1-20f5-bb6bab036c38-cdafff14" class="w-layout-cell cell-12">
            <input type="text" class="text-field-10 w-input" maxlength="256" name="confirmro_11L" data-name="Field 4" placeholder="" id="field-4" required="">
            <div class="text-block-19">RO 11L x Bottles</div>
          </div>
          <div id="w-node-_33e61cbb-361b-84a1-20f5-bb6bab036c3e-cdafff14" class="w-layout-cell cell-13">
            <input type="text" class="text-field-10 w-input" maxlength="256" name="confirmro_350ml" data-name="Field 4" placeholder="" id="field-4" required="">
            <div class="text-block-19">Mineral 350ml x Cartons</div>
          </div>
          <div id="w-node-_33e61cbb-361b-84a1-20f5-bb6bab036c44-cdafff14" class="w-layout-cell cell-14">
            <input type="text" class="text-field-10 w-input" maxlength="256" name="paper_cup" data-name="Field 4" placeholder="" id="field-4" required="">
            <div class="text-block-19">Jantzen’s Paper Cup</div>
          </div>
          <div id="w-node-_33e61cbb-361b-84a1-20f5-bb6bab036c4a-cdafff14" class="w-layout-cell cell-15">
            <input type="text" class="text-field-10 w-input" maxlength="256" name="goodies_bag" data-name="Field 4" placeholder="" id="field-4" required="">
            <div class="text-block-19">Jantzen’s Goodie Bags</div>
          </div>
        </div><label for="field-5">Others</label>
        <textarea placeholder="" maxlength="5000" id="field-5" name="others" data-name="Field 5" class="textarea-2 w-input"></textarea>
        <label for="field-6">Remarks (Office only)</label>
        <textarea placeholder="" maxlength="5000" id="field-6" name="remarks" data-name="Field 6" class="textarea-3 w-input"></textarea>
      </form>
      <div class="w-form-done">
        <div>Thank you! Your submission has been received!</div>
      </div>
      <div class="w-form-fail">
        <div>Oops! Something went wrong while submitting the form.</div>
      </div>
    </div>
  </div>
  @endif
    <div class="div-block">
      <h3 class="heading-6">Sponsorship Request Form</h3>
      <p class="paragraph-2">Call for In-Kind Sponsorship Applications: Please Note We Do Not Offer Financial Support</p>
      <h3 class="heading-7">Person In Charge Details</h3>
      <p class="paragraph-3">We will contact person in charge for further information</p>
      <div class="form-block w-form">
        <form id="email-form" name="email-form" data-name="Email Form" method="get" data-wf-page-id="651b71c3c78416c9cdafff14" data-wf-element-id="5cd54321-b9e9-5121-92a7-8d675ced8b4c">
            <label for="name-3" class="field-label-2">Name</label>
            <input type="text" class="text-field w-input" maxlength="256" name="name-3" data-name="Name 3" value="{{$sponsor->fullname}}" readonly id="name-3">
          <div id="w-node-_5cd54321-b9e9-5121-92a7-8d675ced8b50-cdafff14" class="w-layout-layout quick-stack-2 wf-layout-layout">
            <div id="w-node-_5cd54321-b9e9-5121-92a7-8d675ced8b51-cdafff14" class="w-layout-cell">
                <label for="email" class="field-label">Your Contact Number</label>
                <input type="text" class="text-field-2 w-input" maxlength="256" name="email-5" data-name="Email 5"  id="email-5" value="{{$sponsor->contact}}" readonly></div>
            <div id="w-node-_5cd54321-b9e9-5121-92a7-8d675ced8b55-cdafff14" class="w-layout-cell">
                <label for="email" class="field-label-3">Your Email Address</label>
                <input type="email" class="text-field-2 w-input" maxlength="256" name="email-2" data-name="Email 2" id="email-2" value="{{$sponsor->email}}" readonly></div>
          </div><label for="field" class="field-label-4">Organization/Individual Hosting the Event</label>
          <input type="email" class="text-field-2 w-input" maxlength="256" name="email-2" data-name="Email 2" id="email-2" value="{{$sponsor->about_jantzen}}" readonly>
        </form>
        <div class="w-form-done">
          <div>Thank you! Your submission has been received!</div>
        </div>
        <div class="w-form-fail">
          <div>Oops! Something went wrong while submitting the form.</div>
        </div>
      </div>
    </div>
    <div id="w-node-_836aa450-96fc-3d8a-1d2b-ccd606ea9f75-cdafff14" class="w-layout-layout quick-stack wf-layout-layout">
      <div id="w-node-_836aa450-96fc-3d8a-1d2b-ccd606ea9f76-cdafff14" class="w-layout-cell cell-2 cell">
        <h3>Event / Project Details</h3>
        <p>Provide Essential Information to Streamline Your Event or Project Coordination</p>
        <div class="form-block-2 w-form">
          <form id="email-form-2" name="email-form-2" data-name="Email Form 2" method="get" class="form" data-wf-page-id="651b71c3c78416c9cdafff14" data-wf-element-id="836aa450-96fc-3d8a-1d2b-ccd606ea9f7c">
            <label for="name-4" class="field-label-6">Name of the Event / Project</label>
            <input type="text" class="text-field-4 w-input" maxlength="256" name="name-2" data-name="Name 2" value="{{$sponsor->event_name}}" readonly id="name-2">
            <label for="email-6" class="field-label-7">Describe the Nature of the Event</label>
            <input type="email" class="text-field-5 w-input" maxlength="256" name="email-4" data-name="Email 4"  value="{{$sponsor->nature_event}}" readonly id="email-4">
            <label for="" class="field-label-8">Event Date</label>
            <label for="name-4" class="field-label-6">Event Address</label>
            <input type="text" class="text-field-4 w-input" maxlength="256" name="name-2" data-name="Name 2" value="{{$sponsor->eventAddress}}" readonly id="name-2">
            <label for="name-4" class="field-label-6">Number of Expected Attendees</label>
            <input type="text" class="text-field-4 w-input" maxlength="256" name="name-2" data-name="Name 2" value="{{$sponsor->attendees}}" readonly id="name-2">
            <label for="" class="field-label-8">Explanation of Product Use</label>
            <input type="text" class="text-field-4 w-input" maxlength="256" name="name-2" data-name="Name 2" value="{{$sponsor->explaination_product}}" readonly id="name-2">
            <label for="" class="field-label-9">Can we place booth in your event?</label>
            <input type="text" class="text-field-4 w-input" maxlength="256" name="name-2" data-name="Name 2" value="{{$sponsor->booth}}" readonly id="name-2">
            <label for="name-4" class="field-label-9">Sponsorship Attachments</label><input type="text" class="text-field-4 w-input" maxlength="256" name="name-2" data-name="Name 2" placeholder="3 - Files" id="name-2"></form>
          <div class="w-form-done">
            <div>Thank you! Your submission has been received!</div>
          </div>
          <div class="w-form-fail">
            <div>Oops! Something went wrong while submitting the form.</div>
          </div>
        </div>
      </div>
      <div id="w-node-_836aa450-96fc-3d8a-1d2b-ccd606ea9fb4-cdafff14" class="w-layout-cell cell-3">
        <h3 class="heading-5">Request Products</h3>
        <div class="text-block-7">RO Water - 200ml (48 Cups/carton)</div><img src="{{asset('assets/images/rowater.png')}}" loading="lazy" alt="" class="image">
        <div id="w-node-_836aa450-96fc-3d8a-1d2b-ccd606ea9fba-cdafff14" class="w-layout-layout quick-stack-3 wf-layout-layout">
          <div class="w-layout-cell cell-5">
            <div class="text-block-9 ro200ml">{{$sponsor->ro_200ml}}</div>
          </div>
          <div class="w-layout-cell cell-4">
            <div class="text-block-8">Cartons</div>
          </div>
        </div>
        <div class="text-block-10 ro200mlVal"></div>
        <div class="text-block-11">RO Water - 500ml (24 bottles/carton)</div><img src="{{asset('assets/images/rowater1.png')}}" loading="lazy" alt="" class="image-3">
        <div id="w-node-_836aa450-96fc-3d8a-1d2b-ccd606ea9fc6-cdafff14" class="w-layout-layout quick-stack-3 wf-layout-layout">
          <div class="w-layout-cell cell-5">
            <div class="text-block-9 ro500ml">{{$sponsor->ro_500ml}}</div>
          </div>
          <div class="w-layout-cell cell-4">
            <div class="text-block-8">Cartons</div>
          </div>
        </div>
        <div class="text-block-10 ro500mlVal quantTotal"></div>
        <div class="text-block-11">RO Water - 11L (1 bottles)</div><img src="{{asset('assets/images/rowater3.png')}}" loading="lazy" alt="" class="image-3">
        <div id="w-node-_836aa450-96fc-3d8a-1d2b-ccd606ea9fd2-cdafff14" class="w-layout-layout quick-stack-3 wf-layout-layout">
          <div class="w-layout-cell cell-5">
            <div class="text-block-9 ro11L">{{$sponsor->ro_11L}}</div>
          </div>
          <div class="w-layout-cell cell-4">
            <div class="text-block-8">Cartons</div>
          </div>
        </div>
        <div class="text-block-10 ro11LVal quantTotal"></div>
        <div class="text-block-11">Mineral Water - 350ml (24 bottles/carton)</div><img src="{{asset('assets/images/rowater1.png')}}" loading="lazy" alt="" class="image-3">
        <div id="w-node-_836aa450-96fc-3d8a-1d2b-ccd606ea9fde-cdafff14" class="w-layout-layout quick-stack-3 wf-layout-layout">
          <div class="w-layout-cell cell-5">
            <div class="text-block-9 ro350ml">{{$sponsor->ro_350ml}}</div>
          </div>
          <div class="w-layout-cell cell-4">
            <div class="text-block-8">Cartons</div>
          </div>
        </div>
        <div class="text-block-10 ro350mlVal quantTotal"></div>
        <div class="text-block-12">Estimated Sponsor Product in total</div>
        <div class="text-block-13 totalProductEstimated"></div>
      </div>
    </div>
  </div>
  <script>
    const ro200ml = document.querySelector(".ro200ml");
    const ro200mlVal = document.querySelector(".ro200mlVal");

    ro200mlInt = parseInt(ro200ml.textContent, 10) * 48
    ro200mlVal.textContent = ro200mlInt + " Cups"

    const ro500ml = document.querySelector(".ro500ml");
    const ro500mlVal = document.querySelector(".ro500mlVal");

    ro500mlInt = parseInt(ro500ml.textContent, 10) * 24
    ro500mlVal.textContent = ro500mlInt + " Bottles"

    const ro11L = document.querySelector(".ro11L");
    const ro11LVal = document.querySelector(".ro11LVal");

    ro11LInt = parseInt(ro11L.textContent, 10) * 12
    ro11LVal.textContent = ro11LInt + " Bottles"

    const ro350ml = document.querySelector(".ro350ml");
    const ro350mlVal = document.querySelector(".ro350mlVal");

    ro350mlInt = parseInt(ro350ml.textContent, 10) * 24
    ro350mlVal.textContent = ro350mlInt + " Bottles"

    const totalAll = document.querySelectorAll(".quantTotal")
    const totalProducts = document.querySelector(".totalProductEstimated")

    let totalCartons = 0
    totalAll.forEach(bottles => {
        const quant = parseInt(bottles.textContent, 10);
        totalCartons += quant;
    })

    totalProducts.textContent = totalCartons + " Bottles and " + ro200mlVal.textContent;
  </script>
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