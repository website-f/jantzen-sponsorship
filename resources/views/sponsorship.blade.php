@extends('partial.main')

@section('title', 'Jantzen Sponsorship')
    
@section('content')
<div class="div-block-2">
    <div class="div-block">
      <h3 class="heading-6">Sponsorship Request Form</h3>
      <p class="paragraph-2">Call for In-Kind Sponsorship Applications: Please Note We Do Not Offer Financial Support</p>
      <h3 class="heading-7">Person In Charge Details</h3>
      <p class="paragraph-3">We will contact person in charge for further information</p>
      <div class="form-block w-form">
      <form action="/sponsorship-fill-request" id="email-form" name="email-form" data-name="Email Form" method="POST" data-wf-page-id="65168b78f6982fbca96a0e4f" data-wf-element-id="969c18e7-ad77-d567-f01c-3704c21f141b" enctype="multipart/form-data">
        @csrf
              <label for="name-4" class="field-label-2">Name</label>
              <input type="text" class="text-field w-input" maxlength="256" name="name" data-name="Name 3" placeholder="" id="name-3">
              <div id="w-node-_969c18e7-ad77-d567-f01c-3704c21f141f-c21f1410" class="w-layout-layout quick-stack-2 wf-layout-layout">
                <div id="w-node-_969c18e7-ad77-d567-f01c-3704c21f1420-c21f1410" class="w-layout-cell">
                    <label for="email-6" class="field-label">Your Contact Number</label>
                    <input type="text" class="text-field-2 w-input" maxlength="256" name="contact" data-name="Email 5" placeholder="E.g., (+60) 456-7890" id="email-5" required="">
                </div>
                <div id="w-node-_969c18e7-ad77-d567-f01c-3704c21f1424-c21f1410" class="w-layout-cell">
                    <label for="email-6" class="field-label-3">Your Email Address</label>
                    <input type="email" class="text-field-2 w-input" maxlength="256" name="email" data-name="Email 2" placeholder="E.g., johndoe@email.com" id="email-2" required="">
                </div>
              </div>
              <label for="field-2" class="field-label-4">Organization/Individual Hosting the Event</label>
              <input type="text" class="text-field-3 w-input" maxlength="256" name="organization" data-name="Field 2" placeholder="E.g., XYZ Corporation" id="field-2">
              <label for="" class="field-label-5">How did you know about Jantzen?</label>
              <label class="w-radio">
                <input type="radio" data-name="About" id="radio-5" name="about_jantzen" value="Friends/Family" class="w-form-formradioinput radio-button w-radio-input"><span class="w-form-label" for="radio-5">Friends/Family</span>
              </label>
              <label class="w-radio">
                  <input type="radio" data-name="About" id="radio-5" name="about_jantzen" value="Events" class="w-form-formradioinput w-radio-input"><span class="w-form-label" for="radio-5">Events</span>
              </label>
              <label class="w-radio">
                  <input type="radio" data-name="About" id="radio-5" name="about_jantzen" value="Social Media" class="w-form-formradioinput w-radio-input"><span class="w-form-label" for="radio-5">Social Media</span>
              </label>
              <label class="w-radio">
                  <input type="radio" data-name="About" id="radio-5" name="about_jantzen" value="I’m Jantzen User" class="w-form-formradioinput w-radio-input"><span class="w-form-label" for="radio-5">I’m Jantzen User</span>
              </label>
  
        </div>
        </div>
        <div id="w-node-_969c18e7-ad77-d567-f01c-3704c21f1443-c21f1410" class="w-layout-layout quick-stack wf-layout-layout">
          <div id="w-node-_969c18e7-ad77-d567-f01c-3704c21f1444-c21f1410" class="w-layout-cell cell-2 cell">
            <h3>Event / Project Details</h3>
            <p>Provide Essential Information to Streamline Your Event or Project Coordination</p>
            <div class="form-block-2 w-form">
              
                <label for="name-4" class="field-label-6">Name of the Event / Project</label>
                <input type="text" class="text-field-4 w-input" maxlength="256" name="event_name" data-name="Name 2" placeholder="E.g., Annual Community Fair" id="name-2">
                <label for="email-6" class="field-label-7">Describe the Nature of the Event</label>
                <input type="text" class="text-field-5 w-input" maxlength="256" name="nature_event" data-name="Email 4" placeholder="E.g., Community, Educational, Fundraising, Marathon, etc." id="email-4" required="">
                <label for="" class="field-label-8">Event Date</label>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">From</label>
                      <input type="date" name="from_date" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">To</label>
                      <input type="date" name="to_date" class="form-control">
                    </div>
                  </div>
                <label for="name-4" class="field-label-6">Event Address</label>
                <input type="text" class="text-field-4 w-input" maxlength="256" name="eventAddress" data-name="Name 2" placeholder="E.g., 123 Main St, City, State, ZIP" id="name-2">
                <label for="name-4" class="field-label-6">Number of Expected Attendees</label>
                <input type="text" class="text-field-4 w-input" maxlength="256" name="attendees" data-name="Name 2" placeholder="E.g., Approx. 500 people" id="name-2">
                <label for="" class="field-label-8">Explanation of Product Use</label>
                <label class="w-radio">
                    <input type="radio" data-name="Product" id="radio-6" name="explaination_product" value="Complimentary items for attendees (e.g., in gift bags or as souvenirs)" class="w-form-formradioinput w-radio-input"><span class="w-form-label" for="radio-6">Complimentary items for attendees (e.g., in gift bags or as souvenirs)</span>
                </label>
                <label class="w-radio">
                    <input type="radio" data-name="Product" id="radio-7" name="explaination_product" value="Items for Purchase" class="w-form-formradioinput w-radio-input"><span class="w-form-label" for="radio-7">Items for Purchase</span>
                </label>
                <label class="w-radio">
                    <input type="radio" data-name="Product" id="radio-8" name="explaination_product" value="For Use at Exhibitor Stalls" class="w-form-formradioinput w-radio-input"><span class="w-form-label" for="radio-8">For Use at Exhibitor Stalls</span>
                </label>
                <label class="w-radio">
                    <input type="radio" data-name="Product" id="radio-9" name="explaination_product" value="For Team/Crew Utilization9" class="w-form-formradioinput w-radio-input"><span class="w-form-label" for="radio-9">For Team/Crew Utilization9</span>
                </label>
                <label class="radio-button-field w-radio">
                    <input type="radio" data-name="Product" id="radio-10" name="explaination_product" value="Others" class="w-form-formradioinput w-radio-input"><span class="w-form-label" for="radio-10">Others</span>
                </label>
                <label for="" class="field-label-9">Can we place booth in your event?</label>
                <label class="w-radio">
                    <input type="radio" data-name="Radio 11" id="radio-11" name="booth" value="Yes" class="w-form-formradioinput w-radio-input"><span class="w-form-label" for="radio-11">Yes</span>
                </label>
                <label class="radio-button-field-2 w-radio">
                    <input type="radio" data-name="Radio 11" id="radio-12" name="booth" value="No" class="w-form-formradioinput w-radio-input"><span class="w-form-label" for="radio-12">No</span>
                </label>
                <label for="" class="field-label-9">Sponsorship Attachments</label>
                  <div id="file-drop-area" class="div-block-5">
                    <div style="text-align: center;">
                        <p>Drag and drop files here, or click to select files</p>
                        <label for="file-input" id="file-upload-label">
                            <img src="{{asset('assets/images/upload-icon.png')}}" loading="lazy" width="41" alt="" class="image-4">
                        </label>
                    </div>
                    <input type="file" id="file-input" multiple style="display: none;">
                  </div>
                  <ul id="file-list"></ul>
                  <button id="delete-file">Delete Selected File</button>
                  <button id="replace-file">Replace Selected File</button>
                  <input type="hidden" id="file-names-input" name="file_names">
            </div>
          </div>
          <div id="w-node-_969c18e7-ad77-d567-f01c-3704c21f1485-c21f1410" class="w-layout-cell cell-3">
            <h3 class="heading-5">Request Products</h3>
            <div class="text-block-7">RO Water - 200ml (48 bottles/carton)</div>
            <img src="{{asset('assets/images/rowater.png')}}" loading="lazy" alt="" class="image">
            <div class="form-block-3 w-form">
                <div id="w-node-ddf6d3ae-f2bd-ac9f-5a98-8bb1423a2d8f-c21f1410" class="w-layout-layout quick-stack-15 wf-layout-layout">
                  <div class="w-layout-cell">
                    <input type="text" class="text-field-11 w-input quantityInput ro200ml" maxlength="256" name="ro_200ml" data-name="Field 4" placeholder="" id="field-4" required="">
                  </div>
                  <div class="w-layout-cell"><label for="" class="field-label-10">Cartons</label></div>
                </div>
                <div class="text-block-10 ro200mlvalue"></div>
            </div>
            <div class="text-block-11">RO Water - 500ml (24 bottles/carton)</div>
            <img src="{{asset('assets/images/rowater1.png')}}" loading="lazy" alt="" class="image-3">
            <div class="form-block-3 w-form">
                <div id="w-node-_11307f2d-d07e-7500-506a-a278c48e222f-c21f1410" class="w-layout-layout quick-stack-15 wf-layout-layout">
                  <div class="w-layout-cell">
                    <input type="text" class="text-field-11 w-input quantityInput ro500ml" maxlength="256" name="ro_500ml" data-name="Field 4" placeholder="" id="field-4" required="">
                  </div>
                  <div class="w-layout-cell"><label for="" class="field-label-10">Cartons</label></div>
                </div>
                <div class="text-block-10 ro500mlvalue"></div>
            </div>
            <div class="text-block-11">RO Water - 11L (1 bottles)</div>
            <img src="{{asset('assets/images/rowater3.png')}}" loading="lazy" alt="" class="image-3">
            <div class="form-block-3 w-form">
                <div id="w-node-_6728f9e0-336d-494e-93d0-5d3357791365-c21f1410" class="w-layout-layout quick-stack-15 wf-layout-layout">
                  <div class="w-layout-cell">
                    <input type="text" class="text-field-11 w-input quantityInput ro11L" maxlength="256" name="ro_11L" data-name="Field 4" placeholder="" id="field-4" required="">
                  </div>
                  <div class="w-layout-cell"><label for="" class="field-label-10">Cartons</label></div>
                </div>
                <div class="text-block-10 ro11Lvalue"></div>
            </div>
            <div class="text-block-11">Mineral Water - 350ml (24 bottles/carton)</div>
            <img src="{{asset('assets/images/rowater1.png')}}" loading="lazy" alt="" class="image-3">
            <div class="form-block-3 w-form">
                <div id="w-node-c458fcda-7303-d430-afe7-45dfe6a8c641-c21f1410" class="w-layout-layout quick-stack-15 wf-layout-layout">
                  <div class="w-layout-cell">
                    <input type="text" class="text-field-11 w-input quantityInput ro350ml" maxlength="256" name="ro_350ml" data-name="Field 4" placeholder="" id="field-4" required="">
                  </div>
                  <div class="w-layout-cell"><label for="" class="field-label-10">Cartons</label></div>
                </div>
                <div class="text-block-10 ro350mlvalue"></div>
            </div>
            <div class="text-block-12">Estimated Sponsor Product in total</div>
            <div class="text-block-13 totalItemCupsBottles"></div>
          </div>
        </div>
        <button style="display: block; width: 100%" type="submit" class="button w-button">Apply Sponsorship</button>
      </form>
</div>
<script>
    const quantityInputs = document.querySelectorAll('.quantityInput');
    const totalCartonsInput = document.querySelector('.totalItemCupsBottles');

    quantityInputs.forEach(input => {
        input.addEventListener('input', calculateTotalCartons);
    });

    function calculateTotalCartons() {
        let totalCartons = 0;
        quantityInputs.forEach(input => {
            const quantity = parseInt(input.value) || 0;
            totalCartons += quantity;
        });
        totalCartonsInput.textContent = totalCartons;
    }
</script>
<script>
  let ro200ml = document.querySelector('.ro200ml')
  let ro200mlvalue = document.querySelector('.ro200mlvalue')
  let ro500ml = document.querySelector('.ro500ml')
  let ro500mlvalue = document.querySelector('.ro500mlvalue')
  let ro11L = document.querySelector('.ro11L')
  let ro11Lvalue = document.querySelector('.ro11Lvalue')
  let ro350ml = document.querySelector('.ro350ml')
  let ro350mlvalue = document.querySelector('.ro350mlvalue')

  ro200ml.addEventListener('input', calculaterowater);

  function calculaterowater() {
    let totalcups = 48;
    const quantity = parseInt(ro200ml.value) || 0
    totalcups *= quantity;

    ro200mlvalue.textContent = totalcups + " Cups"
  }

  ro500ml.addEventListener('input', calculaterowaterbottle);

  function calculaterowaterbottle() {
    let totalbottles = 24;
    const quantityBottle = parseInt(ro500ml.value) || 0
    totalbottles *= quantityBottle;

    ro500mlvalue.textContent = totalbottles + " Bottles"
  }

  ro11L.addEventListener('input', calculaterowaterbottleL);

  function calculaterowaterbottleL() {
    let totalbottlesL = 12;
    const quantityBottleL = parseInt(ro11L.value) || 0
    totalbottlesL *= quantityBottleL;

    ro11Lvalue.textContent = totalbottlesL + " Bottles"
  }

  ro350ml.addEventListener('input', calculaterowaterbottleM);

  function calculaterowaterbottleM() {
    let totalbottlesL = 24;
    const quantityBottleL = parseInt(ro350ml.value) || 0
    totalbottlesL *= quantityBottleL;

    ro350mlvalue.textContent = totalbottlesL + " Bottles"
  }
</script>
@endsection