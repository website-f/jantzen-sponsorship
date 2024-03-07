@extends('partial.main')

@section('content')


    @if ($spon->states == "Processing")
    <div class="div-block-6">
        <div class="div-block-7">
            <h3 class="heading-9">Your Guide to the Sponsorship Application Process</h3>
            <p>Easily Track and Monitor Your Sponsorship Application Progress</p>
            <div id="w-node-ddb84191-6d31-6b06-3c85-162a17129585-8a579776" class="w-layout-layout quick-stack-4 wf-layout-layout">
              <div id="w-node-_118e9980-b034-d1d1-bce0-068304e7aaf0-8a579776" class="w-layout-cell cell-6"><img src="{{asset('assets/images/tickComplete.png')}}" loading="lazy" alt="" class="image-5">
                <div class="text-block-15">STEP 1</div>
                <div class="text-block-16">Submit Sponsorship<br>Request Form</div>
                <p class="paragraph-5">Begin your journey by filling out and submitting the sponsorship request form, ensuring all details are accurate and complete.</p>
                <a href="#" class="button-13 w-button">Completed</a>
              </div>
              <div id="w-node-_5fff5df3-2ac3-0b83-b4a7-4d0cfd07e951-8a579776" class="w-layout-cell cell-7"><img src="{{asset('assets/images/tickProgress.png')}}" loading="lazy" alt="" class="image-6">
                <div class="text-block-17">STEP 2</div>
                <div class="text-block-18">Await Approval / Contact(3-7 Working Days)</div>
                <p class="paragraph-6">Be patient as our team reviews your application. Expect a response or further contact within 3 to 7 working days.</p>
                <a href="#" class="button-4 w-button">In Progress</a>
              </div>
              <div id="w-node-e0d0c477-0ad2-18f5-9f60-45baee8aa569-8a579776" class="w-layout-cell cell-8"><img src="{{asset('assets/images/tickPending.png')}}" loading="lazy" alt="" class="image-7">
                <div class="text-block-17">STEP 3</div>
                <div class="text-block-18">Provide Proof of Agreement</div>
                <p class="paragraph-6">Confirm your commitment by providing necessary proof of agreement, solidifying the partnership and support.</p>
                <a href="#" class="button-5 w-button">Pending</a>
              </div>
              <div id="w-node-c2be184f-fb97-2896-80b5-58661fd1cc31-8a579776" class="w-layout-cell cell-9"><img src="{{asset('assets/images/tickPending.png')}}" loading="lazy" alt="" class="image-7">
                <div class="text-block-17">STEP 4</div>
                <div class="text-block-18">Collect Sponsored Goods at Pickup Location</div>
                <p class="paragraph-6">Upon approval, proceed to the designated pickup location to collect the goods or items sponsored for your event.</p>
                <a href="#" class="button-12 w-button">Pending</a>
              </div>
            </div>
            <div style="background-color: #FFF500; border-radius: 9px; padding: 20px; margin-top: 20px">
              <h3 class="heading-11" style="margin-top: 10px">Waiting For Approval</h3>
              <p class="paragraph-7">Be patient as our team reviews your application. Expect a response or further contact within <b>3 to 7 working days.</b></p>
            </div>
        </div>
        <div class="div-block">
            <h3 class="heading-6">Sponsorship Request Form</h3>
            <p class="paragraph-2">Call for In-Kind Sponsorship Applications: Please Note We Do Not Offer Financial Support</p>
            <h3 class="heading-7">Person In Charge Details</h3>
            <p class="paragraph-3">We will contact person in charge for further information</p>
            <div class="form-block w-form">
                  <label for="name-4" class="field-label-2">Name</label>
                  <input type="text" class="text-field w-input" maxlength="256" name="name-3" data-name="Name 3"  id="name-3" value="{{$spon->fullname}}" readonly>
                <div id="w-node-a7e0691a-1eb7-72c1-cd83-41da11d4fccc-8a579776" class="w-layout-layout quick-stack-2 wf-layout-layout">
                  <div id="w-node-a7e0691a-1eb7-72c1-cd83-41da11d4fccd-8a579776" class="w-layout-cell">
                      <label for="email-6" class="field-label">Your Contact Number</label>
                      <input type="text" class="text-field-2 w-input" maxlength="256" name="email-5" data-name="Email 5" value="{{$spon->contact}}" readonly></div>
                  <div id="w-node-a7e0691a-1eb7-72c1-cd83-41da11d4fcd1-8a579776" class="w-layout-cell">
                      <label for="email-6" class="field-label-3">Your Email Address</label>
                      <input type="email" class="text-field-2 w-input" maxlength="256" name="email-2" data-name="Email 2" value="{{$spon->email}}" readonly></div>
                </div><label for="field-3" class="field-label-4">Organization/Individual Hosting the Event</label>
                <input type="text" class="text-field-3 w-input" maxlength="256" name="field-2" data-name="Field 2" value="{{$spon->organization}}" readonly>
                <label for="" class="field-label-5">How did you know about Jantzen?</label>
                <input type="text" class="text-field-3 w-input" maxlength="256" name="field-2" data-name="Field 2" value="{{$spon->about_jantzen}}" readonly>
            </div>
            <br>
            <hr>
            <h3 class="heading-7">Another Person In Charge Details</h3>
            <p class="paragraph-3">We will contact person in charge if we fail to reach the main</p>
            <div class="form-block w-form">
                  <label for="name-4" class="field-label-2">Second PIC Name</label>
                  <input type="text" class="text-field w-input" maxlength="256" name="name-3" data-name="Name 3"  id="name-3" value="{{$spon->sec_PIC_name}}" readonly>
                <div id="w-node-a7e0691a-1eb7-72c1-cd83-41da11d4fccc-8a579776" class="w-layout-layout quick-stack-2 wf-layout-layout">
                  <div id="w-node-a7e0691a-1eb7-72c1-cd83-41da11d4fccd-8a579776" class="w-layout-cell">
                      <label for="email-6" class="field-label">Second PIC Contact Number</label>
                      <input type="text" class="text-field-2 w-input" maxlength="256" name="email-5" data-name="Email 5" value="{{$spon->sec_PIC_number}}" readonly></div>
                  <div id="w-node-a7e0691a-1eb7-72c1-cd83-41da11d4fcd1-8a579776" class="w-layout-cell">
                      <label for="email-6" class="field-label-3">Second PIC Email Address</label>
                      <input type="email" class="text-field-2 w-input" maxlength="256" name="email-2" data-name="Email 2" value="{{$spon->sec_PIC_email}}" readonly></div>
                </div>
            </div>
            <div class="form-block w-form">
              <label for="name-4" class="field-label-2">Third PIC Name</label>
              <input type="text" class="text-field w-input" maxlength="256" name="name-3" data-name="Name 3"  id="name-3" value="{{$spon->third_PIC_name}}" readonly>
            <div id="w-node-a7e0691a-1eb7-72c1-cd83-41da11d4fccc-8a579776" class="w-layout-layout quick-stack-2 wf-layout-layout">
              <div id="w-node-a7e0691a-1eb7-72c1-cd83-41da11d4fccd-8a579776" class="w-layout-cell">
                  <label for="email-6" class="field-label">Third PIC Contact Number</label>
                  <input type="text" class="text-field-2 w-input" maxlength="256" name="email-5" data-name="Email 5" value="{{$spon->third_PIC_number}}" readonly></div>
              <div id="w-node-a7e0691a-1eb7-72c1-cd83-41da11d4fcd1-8a579776" class="w-layout-cell">
                  <label for="email-6" class="field-label-3">Third PIC Email Address</label>
                  <input type="email" class="text-field-2 w-input" maxlength="256" name="email-2" data-name="Email 2" value="{{$spon->third_PIC_email}}" readonly></div>
            </div>
        </div>
          </div>
          <div id="w-node-_7e20e95b-e0b5-2b7b-2ac4-17e99fd4ae5a-8a579776" class="w-layout-layout quick-stack wf-layout-layout">
            <div id="w-node-_7e20e95b-e0b5-2b7b-2ac4-17e99fd4ae5b-8a579776" class="w-layout-cell cell-2 cell">
              <h3>Event / Project Details</h3>
              <p>Provide Essential Information to Streamline Your Event or Project Coordination</p>
              <div class="form-block-2 w-form">
                <form id="email-form-2" name="email-form-2" data-name="Email Form 2" method="get" class="form" data-wf-page-id="651a6c3ca44b12668a579776" data-wf-element-id="7e20e95b-e0b5-2b7b-2ac4-17e99fd4ae61">
                  <label for="name-4" class="field-label-6">Name of the Event / Project</label>
                  <input type="text" class="text-field-4 w-input" maxlength="256" name="name-2" data-name="Name 2" value="{{$spon->event_name}}" readonly id="name-2">
                  <label for="email-6" class="field-label-7">Describe the Nature of the Event</label>
                  <input type="email" class="text-field-5 w-input" maxlength="256" name="email-4" data-name="Email 4" value="{{$spon->nature_event}}" readonly id="email-4" required="">
                  <label for="" class="field-label-8">Event Date</label>
                  <div id="w-node-a7e0691a-1eb7-72c1-cd83-41da11d4fccc-8a579776" class="w-layout-layout quick-stack-2 wf-layout-layout">
                      <div id="w-node-a7e0691a-1eb7-72c1-cd83-41da11d4fccd-8a579776" class="w-layout-cell">
                          <label for="email-6" class="field-label">From</label>
                          <input type="text" class="text-field-2 w-input" maxlength="256" name="email-5" data-name="Email 5" value="{{$spon->from_date}}" readonly></div>
                      <div id="w-node-a7e0691a-1eb7-72c1-cd83-41da11d4fcd1-8a579776" class="w-layout-cell">
                          <label for="email-6" class="field-label-3">To</label>
                          <input type="text" class="text-field-2 w-input" maxlength="256" name="email-2" data-name="Email 2" value="{{$spon->to_date}}" readonly></div>
                    </div>
                  <label for="name-4" class="field-label-6">Event Address</label>
                  <input type="text" class="text-field-4 w-input" maxlength="256" name="name-2" data-name="Name 2" value="{{$spon->eventAddress}}" readonly id="name-2">
                  <label for="name-4" class="field-label-6">Number of Expected Attendees</label>
                  <input type="text" class="text-field-4 w-input" maxlength="256" name="name-2" data-name="Name 2" value="{{$spon->attendees}}" readonly id="name-2">
                  <label for="" class="field-label-8">Explanation of Product Use</label>
                  <input type="text" class="text-field-4 w-input" maxlength="256" name="name-2" data-name="Name 2" value="{{$spon->explaination_product}}" readonly id="name-2">
                  <label for="" class="field-label-8">Tell us about your Event/project</label>
                  <textarea placeholder="Example Text" maxlength="5000" id="field" name="field" data-name="Field" class="textarea w-input" readonly rows="10">{{$spon->summary}}</textarea>
                  <label for="name-2" class="field-label-9">Sponsorship Attachments</label><input type="text" class="text-field-4 w-input" maxlength="256" name="name-2" data-name="Name 2" placeholder="3 - Files" id="name-2"></form>
                <div class="w-form-done">
                  <div>Thank you! Your submission has been received!</div>
                </div>
                <div class="w-form-fail">
                  <div>Oops! Something went wrong while submitting the form.</div>
                </div>
              </div>
            </div>
            <div id="w-node-_7e20e95b-e0b5-2b7b-2ac4-17e99fd4ae9c-8a579776" class="w-layout-cell cell-3">
              <h3 class="heading-5">Request Products</h3>
              <div class="text-block-7"><b>RO Water - 200ml (48 Cups/carton)</b></div><img src="{{asset('assets/images/200mlRo.jpg')}}" loading="lazy" alt="" class="image">
              <div id="w-node-_7e20e95b-e0b5-2b7b-2ac4-17e99fd4aea2-8a579776" class="w-layout-layout quick-stack-3 wf-layout-layout">
                <div class="w-layout-cell cell-5">
                  <div class="text-block-9 ro200ml">{{$spon->ro_200ml}}</div>
                </div>
                <div class="w-layout-cell cell-4">
                  <div class="text-block-8">Cartons</div>
                </div>
              </div>
              <div class="text-block-10 ro200mlVal"></div>
              <div class="text-block-7" style="margin-top: 10px"><b>RO Water - 500ml (24 bottles/carton)</b></div><img src="{{asset('assets/images/500mlRo.jpg')}}" loading="lazy" alt="" class="image-3">
              <div id="w-node-_7e20e95b-e0b5-2b7b-2ac4-17e99fd4aeae-8a579776" class="w-layout-layout quick-stack-3 wf-layout-layout">
                <div class="w-layout-cell cell-5">
                  <div class="text-block-9 ro500ml">{{$spon->ro_500ml}}</div>
                </div>
                <div class="w-layout-cell cell-4">
                  <div class="text-block-8">Cartons</div>
                </div>
              </div>
              <div class="text-block-10 ro500mlVal quantTotal"></div>
              <div class="text-block-7" style="margin-top: 10px"><b>RO Water - 11L (1 bottle)</b></div><img src="{{asset('assets/images/11L.jpg')}}" loading="lazy" alt="" class="image-3">
              <div id="w-node-_7e20e95b-e0b5-2b7b-2ac4-17e99fd4aeba-8a579776" class="w-layout-layout quick-stack-3 wf-layout-layout">
                <div class="w-layout-cell cell-5">
                  <div class="text-block-9 ro11L">{{$spon->ro_11L}}</div>
                </div>
                <div class="w-layout-cell cell-4">
                  <div class="text-block-8">Bottles</div>
                </div>
              </div>
              <div class="text-block-10 ro11LVal quantTotal"></div>
              <div class="text-block-7" style="margin-top: 10px"><b>Mineral Water - 350ml (24 bottles/carton)</b></div><img src="{{asset('assets/images/350mlMinearl.jpg')}}" loading="lazy" alt="" class="image-3">
              <div id="w-node-_7e20e95b-e0b5-2b7b-2ac4-17e99fd4aec6-8a579776" class="w-layout-layout quick-stack-3 wf-layout-layout">
                <div class="w-layout-cell cell-5">
                  <div class="text-block-9 ro350ml">{{$spon->ro_350ml}}</div>
                </div>
                <div class="w-layout-cell cell-4">
                  <div class="text-block-8">Cartons</div>
                </div>
              </div>
              <div class="text-block-10 ro350mlVal quantTotal"></div>
              <div class="text-block-12">Estimated Sponsor Product in total:</div><br>
              <div class="text-block-13 totalProductEstimated">
                <p><b>RO Water - 200ml x {{$spon->ro_200ml}} cartons</b></p>
                <p><b>RO Water - 500ml x {{$spon->ro_500ml}} cartons</b></p>
                <p><b>RO Water - 11L x {{$spon->ro_11L}} cartons</b></p>
                <p><b>Mineral Water - 350ml x {{$spon->ro_350ml}} cartons</b></p>
              </div>
            </div>
        </div>
    </div>

    @elseif($spon->states == "Approved")
    <div class="div-block-8">
        <div class="div-block-7">
          <h3 class="heading-9">Your Guide to the Sponsorship Application Process</h3>
          <p>Easily Track and Monitor Your Sponsorship Application Progress</p>
          <div id="w-node-d44ad59a-153c-27a7-a4e7-e5cfd98ee360-8a602bcd" class="w-layout-layout quick-stack-7 wf-layout-layout">
            <div id="w-node-d44ad59a-153c-27a7-a4e7-e5cfd98ee361-8a602bcd" class="w-layout-cell cell-6"><img src="{{asset('assets/images/tickComplete.png')}}" loading="lazy" alt="" class="image-5">
              <div class="text-block-15">STEP 1</div>
              <div class="text-block-16">Submit Sponsorship<br>Request Form</div>
              <p class="paragraph-5">Begin your journey by filling out and submitting the sponsorship request form, ensuring all details are accurate and complete.</p>
              <a href="#" class="button-3 w-button">Completed</a>
            </div>
            <div id="w-node-d44ad59a-153c-27a7-a4e7-e5cfd98ee36d-8a602bcd" class="w-layout-cell cell-6"><img src="{{asset('assets/images/tickComplete.png')}}" loading="lazy" alt="" class="image-5">
              <div class="text-block-15">STEP 2</div>
              <div class="text-block-16">Await Approval / Contact (3-7 Working Days)</div>
              <p class="paragraph-5">Be patient as our team reviews your application. Expect a response or further contact within 3 to 7 working days.</p>
              <a href="#" class="button-11 w-button">Completed</a>
            </div>
            <div id="w-node-d44ad59a-153c-27a7-a4e7-e5cfd98ee377-8a602bcd" class="w-layout-cell cell-9"><img src="{{asset('assets/images/tickProgress.png')}}" loading="lazy" alt="" class="image-7">
              <div class="text-block-17">STEP 3</div>
              <div class="text-block-18">Provide Proof of Agreement</div>
              <p class="paragraph-6">Confirm your commitment by providing necessary proof of agreement, solidifying the partnership and support.</p>
              <a href="#" class="button-7 w-button">In Progress</a>
            </div>
            <div id="w-node-d44ad59a-153c-27a7-a4e7-e5cfd98ee381-8a602bcd" class="w-layout-cell cell-9"><img src="{{asset('assets/images/tickPending.png')}}" loading="lazy" alt="" class="image-7">
              <div class="text-block-17">STEP 4</div>
              <div class="text-block-18">Collect Sponsored Goods at Pickup Location</div>
              <p class="paragraph-6">Upon approval, proceed to the designated pickup location to collect the goods or items sponsored for your event.</p>
              <a href="#" class="button-6 w-button">Pending</a>
            </div>
          </div>
          <h3 class="heading-11">Provide Proof of Agreement</h3>
          <p class="paragraph-7">Submit the necessary documentation to verify the agreement, ensuring both parties are aligned and clear on the terms and expectations for sponsorship.</p>
          <div class="w-form">
            <div id="email-form" name="email-form" data-name="Email Form" method="get" class="form-2" data-wf-page-id="651a75b9a44b12668a602bcd" data-wf-element-id="791222a0-c66d-9c9a-0042-32e67d071088">
              <div id="w-node-_97e9f80b-0284-b5c0-9bb5-7b2338246096-8a602bcd" class="w-layout-layout quick-stack-5 wf-layout-layout">
                <div id="w-node-_84109cec-69d3-af54-a833-2ce5548b1b24-8a602bcd" class="w-layout-cell">
                  <label for="name-2">Name of the Event / Project</label>
                  <input type="text" class="text-field-6 w-input" maxlength="256" name="name-2" data-name="Name 2" placeholder="" id="name-2" value="{{$spon->event_name}}" readonly></div>
                <div id="w-node-_18bce5b6-8dde-39ac-1125-a617aa6831e9-8a602bcd" class="w-layout-cell">
                  <label for="email-2">Event Date</label>
                  <input type="email" class="text-field-7 w-input" maxlength="256" name="email-2" data-name="Email 2" placeholder="" id="email-2" required="" value="{{date('M d, Y', strtotime($spon->from_date))}} - {{date('M d, Y', strtotime($spon->to_date))}}" readonly></div>
              </div><label for="name-3">Sponsors Products</label>
              <div id="w-node-_8932e1af-3436-9e3d-1d86-46937411dace-8a602bcd" class="w-layout-layout quick-stack-6 wf-layout-layout">
                <div id="w-node-eac3d2a3-addf-e1fc-a317-0ea1a17d583d-8a602bcd" class="w-layout-cell cell-10">
                  <div class="div-block-9">
                    <div>
                      @if ($spon->confirmro_200ml !== null)
                          {{$spon->confirmro_200ml}}
                      @endif
                    </div>
                  </div>
                  <div class="text-block-19">RO 200ml x Cartons</div>
                </div>
                <div id="w-node-_538d45a1-23f0-5699-7d84-b0eca4bf210b-8a602bcd" class="w-layout-cell cell-11">
                  <div class="div-block-9">
                    <div>
                      @if ($spon->confirmro_500ml !== null)
                          {{$spon->confirmro_500ml}}
                      @endif
                    </div>
                  </div>
                  <div class="text-block-19">RO 500ml x Cartons</div>
                </div>
                <div id="w-node-_86c5c743-ca18-2c5a-951c-9c481083b402-8a602bcd" class="w-layout-cell cell-12">
                  <div class="div-block-9">
                    <div>
                      @if ($spon->confirmro_11L !== null)
                          {{$spon->confirmro_11L}}
                      @endif
                    </div>
                  </div>
                  <div class="text-block-19">RO 11L x Bottles</div>
                </div>
                <div id="w-node-_52001511-2c65-53dc-012d-10054b9bb9ad-8a602bcd" class="w-layout-cell cell-13">
                  <div class="div-block-9">
                    <div>
                      @if ($spon->confirmro_350ml !== null)
                          {{$spon->confirmro_350ml}}
                      @endif
                    </div>
                  </div>
                  <div class="text-block-19">Mineral 350ml x Cartons</div>
                </div>
                <div id="w-node-_7c9fde84-49e1-f616-fba7-10af24d82441-8a602bcd" class="w-layout-cell cell-14">
                  <div class="div-block-9">
                    <div>
                      @if ($spon->paper_cup !== null)
                          {{$spon->paper_cup}}
                      @endif
                    </div>
                  </div>
                  <div class="text-block-19">Jantzen’s Paper Cup</div>
                </div>
                <div id="w-node-_79105295-813d-e5b9-298e-8e77444ebea3-8a602bcd" class="w-layout-cell cell-15">
                  <div class="div-block-9">
                    <div>
                      @if ($spon->goodies_bag !== null)
                          {{$spon->goodies_bag}}
                      @endif
                    </div>
                  </div>
                  <div class="text-block-19">Jantzen’s Goodie Bags</div>
                </div>
              </div><label for="field">Others</label>
              <textarea placeholder="Example Text" maxlength="5000" id="field" name="field" data-name="Field" class="textarea w-input" readonly rows="10">
@if ($spon->others !== null)
{{$spon->others}}
@endif
              </textarea>
            </div>

            @if ($spon->status == "agree")
            <hr>
            <p>Awesome, thanks for agreeing! We're super excited to team up with you. We'll get the 'Proof of Agreement' task details over to you. Look out for a WhatsApp message from our team member soon!
            </p>
            <hr>
            <br>
            <form action="/proof-of-agreement/{{$spon->id}}" method="POST" enctype="multipart/form-data">  
              @csrf
              @method("PUT")
              <label>Reviews</label>
              <div id="file-drop-area" class="div-block-5">
                <div style="text-align: center;">
                    <p>Drag and drop review files here, or click to select review files</p>
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

              <label style="margin-top: 30px">Photos</label>
              <div id="file-drop-area-photos" class="div-block-5">
                <div style="text-align: center;">
                    <p>Drag and drop photo files here, or click to select photo files</p>
                    <label for="file-input-photos" id="file-upload-label-photos">
                        <img src="{{asset('assets/images/upload-icon.png')}}" loading="lazy" width="41" alt="" class="image-4">
                    </label>
                </div>
                <input type="file" id="file-input-photos" multiple style="display: none;">
              </div>
              <ul id="file-list-photos"></ul>
              <button id="delete-file-photos">Delete Selected File</button>
              <button id="replace-file-photos">Replace Selected File</button>
              <input type="hidden" id="file-names-input-photos" name="file_names_photos">

              <label style="margin-top: 30px">Videos</label>
              <div id="file-drop-area-videos" class="div-block-5">
                <div style="text-align: center;">
                    <p>Drag and drop video files here, or click to select video files</p>
                    <label for="file-input-videos" id="file-upload-label-videos">
                        <img src="{{asset('assets/images/upload-icon.png')}}" loading="lazy" width="41" alt="" class="image-4">
                    </label>
                </div>
                <input type="file" id="file-input-videos" multiple style="display: none;">
              </div>
              <ul id="file-list-videos"></ul>
              <button id="delete-file-videos">Delete Selected File</button>
              <button id="replace-file-videos">Replace Selected File</button>
              <input type="hidden" id="file-names-input-videos" name="file_names_videos">
              <button style="width: 100%; margin-top: 30px" type="submit" class="button-2 w-button">Submit Attachments</button>
            </form><br>
            <span>Made mistake ? Click on undo button below</span><br>
            <a href="/undo/{{$spon->id}}" class="buttonAgree button2Agree">Undo</a>
            @elseif ($spon->status == "notAgree") 
            <div>
              <hr>
              <p>Thank you for your thoughts, please look forward to a WhatsApp message from us soon!</p><br>
              <hr>
              <span>Made mistake ? Click on undo button below</span><br>
              <a href="/undo/{{$spon->id}}" class="buttonAgree button2Agree">Undo</a>
            </div>
            @else
            <div class="agreementDiv">
              <label for="field">Do you agree to provide proof of agreements ?</label>
              <a href="/agreeProof/{{$spon->id}}" class="buttonAgree button2Agree">Yes</a>
              <button type="button" id="NotAgreeBtn" class="buttonAgree button3Agree">No</button>
            </div>
            <div class="notAgreeDiv" style="display: none;">
              <hr>
              <p>We're sorry to learn that our terms and conditions for sponsorship don't align with your views. Your opinion matters greatly to us. Could you please share your reasons for disagreement? We are eager to understand and address any concerns you may have. 😊 Once you've shared your thoughts, please look forward to a WhatsApp message from us soon!</p><br>
              <form action="/notagreeProof/{{$spon->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                 <label for="field">Reason:</label>
                 <textarea placeholder="Example Text" maxlength="5000" id="field" name="reason" data-name="Field" class="textarea w-input" rows="4"></textarea>
                 <button style="width: 100%;" type="submit" class="button-2 w-button">Submit</button>
              </form>
              <hr>
              <span>Made mistake ? Click on undo button below</span><br>
              <button type="button" id="undoAgree" class="buttonAgree button2Agree">Undo</button>
            </div>
            @endif
          </div>
        </div>
    </div>

    @elseif($spon->states == "Pending")
    <div class="div-block-10">
      <div class="div-block-7">
        <h3 class="heading-9">Your Guide to the Sponsorship Application Process</h3>
        <p>Easily Track and Monitor Your Sponsorship Application Progress</p>
        <div id="w-node-d36984f1-ac39-1c3b-9da1-809852102ff1-135ef160" class="w-layout-layout quick-stack-7 wf-layout-layout">
          <div id="w-node-d36984f1-ac39-1c3b-9da1-809852102ff2-135ef160" class="w-layout-cell cell-6"><img src="{{asset('assets/images/tickComplete.png')}}" loading="lazy" alt="" class="image-5">
            <div class="text-block-15">STEP 1</div>
            <div class="text-block-16">Submit Sponsorship<br>Request Form</div>
            <p class="paragraph-5">Begin your journey by filling out and submitting the sponsorship request form, ensuring all details are accurate and complete.</p>
            <a href="#" class="button-14 w-button">Completed</a>
          </div>
          <div id="w-node-d36984f1-ac39-1c3b-9da1-809852102ffe-135ef160" class="w-layout-cell cell-6"><img src="{{asset('assets/images/tickComplete.png')}}" loading="lazy" alt="" class="image-5">
            <div class="text-block-15">STEP 2</div>
            <div class="text-block-16">Await Approval / Contact(3-7 Working Days)</div>
            <p class="paragraph-5">Be patient as our team reviews your application. Expect a response or further contact within 3 to 7 working days.</p>
            <a href="#" class="button-10 w-button">Completed</a>
          </div>
          <div id="w-node-d36984f1-ac39-1c3b-9da1-809852103008-135ef160" class="w-layout-cell cell-6"><img src="{{asset('assets/images/tickComplete.png')}}" loading="lazy" alt="" class="image-5">
            <div class="text-block-15">STEP 3</div>
            <div class="text-block-16">Provide Proof of Agreement</div>
            <p class="paragraph-5">Confirm your commitment by providing necessary proof of agreement, solidifying the partnership and support.</p>
            <a href="#" class="button-9 w-button">Completed</a>
          </div>
          <div id="w-node-d36984f1-ac39-1c3b-9da1-809852103012-135ef160" class="w-layout-cell cell-9"><img src="{{asset('assets/images/tickProgress.png')}}" loading="lazy" alt="" class="image-7">
            <div class="text-block-17">STEP 4</div>
            <div class="text-block-18">Collect Sponsored Goods at Pickup Location</div>
            <p class="paragraph-6">Upon approval, proceed to the designated pickup location to collect the goods or items sponsored for your event.</p>
            <a href="#" class="button-17 w-button">In Progress</a>
          </div>
        </div>
        @if ($spon->stat == "proofApproved")
        <div>
          <h3 class="heading-11">NOTICES</h3>
          <p class="paragraph-7">Please submit collector Information us a week in advance when the goods need to be collected, as we require time to prepare. We regret to inform you that if your team does not notify us a week prior to collection, we cannot guarantee that the goods will be ready on time.</p>
          <p class="paragraph-10">Factory Operating Days: <strong>Monday - Friday</strong><br>Working Hours: <strong>Weekdays 10am - 5pm</strong><br>Lunchtime: <strong>12pm - 2pm</strong><br>Public Holidays: <strong>Closed</strong></p>
          <p><b>Collection time slot</b></p>
  
          <p>10am - 11am</p>
          <p>11am - 12pm</p>
          <p>2pm - 3pm</p>
          <p>3pm - 4pm</p>
          <p>4pm - 5pm</p>
          <h3 class="heading-12">Collector Information</h3>
          <p class="paragraph-8">Please complete the collector information section to inform us about who will be collecting the sponsored goods. This ensures a smooth and secure pickup process, helping us to verify the identity of the individual authorized to receive the products.</p>
          <div class="w-form">
            <form action="/collector-details/{{$spon->id}}" id="email-form" name="email-form" data-name="Email Form" method="POST" data-wf-page-id="651a7bf5042f4d69135ef160" data-wf-element-id="755869db-c9d2-baa0-bac4-55e8e267b9be">
                  @csrf
                  @method("PUT")
              <div id="w-node-ecaacf26-9d06-d63f-b401-b0a26d279abe-135ef160" class="w-layout-layout quick-stack-8 wf-layout-layout">
                    <div id="w-node-_67e156f1-9e69-65ef-580d-1e3d6ae653ef-135ef160" class="w-layout-cell">
                      <label for="field">Collection Date</label>
                      <input type="date" class="text-field-8 w-input" maxlength="256" name="collection_date" data-name="Field" placeholder="Example Text" id="field" required>
                    </div>
                    <div id="w-node-_383f54d8-e8d2-d05f-4d86-0e15f88a2fe2-135ef160" class="w-layout-cell">
                      <label for="field-2">Collection Time Slot</label>
                      <input type="text" class="text-field-8 w-input" maxlength="256" name="collection_time_slot" data-name="Field 2" placeholder="Example Text" id="field-2" required>
                    </div>
                    <div id="w-node-eda0622b-81d2-5d7d-86f4-b2971351bacd-135ef160" class="w-layout-cell">
                      <label for="field">Collector’s name</label>
                      <input type="text" class="text-field-8 w-input" maxlength="256" name="collector_name" data-name="Field" placeholder="Example Text" id="field" required>
                    </div>
                    <div id="w-node-_89f5612b-df97-c386-923a-92d96f2df5f7-135ef160" class="w-layout-cell">
                      <label for="field">Collector’s IC No</label>
                      <input type="text" class="text-field-8 w-input" maxlength="256" name="collector_IC" data-name="Field" placeholder="Example Text" id="field" required>
                    </div>
                    <div id="w-node-_1db2a402-1b0d-02bb-b11e-df60e459c356-135ef160" class="w-layout-cell">
                      <label for="field">Collector’s contact number</label>
                      <input type="text" class="text-field-8 w-input" maxlength="256" name="collector_contact" data-name="Field" placeholder="Example Text" id="field" required>
                    </div>
                    <div id="w-node-b61df816-5f01-6d5a-a6c9-683c35616739-135ef160" class="w-layout-cell">
                      <label for="field">Collector’s Car Plate number</label>
                      <input type="text" class="text-field-8 w-input" maxlength="256" name="collector_plate_number" data-name="Field" placeholder="Example Text" id="field" required>
                    </div>
                    <div id="w-node-_16f0378e-9cf8-8025-8b09-785ab1516dc6-135ef160" class="w-layout-cell">
                      <label for="field">Name of the Event / Project</label>
                      <input type="text" class="text-field-8 w-input" maxlength="256" name="field" data-name="Field" placeholder="Example Text" id="field" value="{{$spon->event_name}}" readonly>
                    </div>
                    <div id="w-node-b2c8b863-f67e-4662-bc1e-001136c56a1c-135ef160" class="w-layout-cell">
                      <label for="field">Event Date</label>
                      <input type="text" class="text-field-8 w-input" maxlength="256" name="field" data-name="Field" placeholder="Example Text" id="field" value="{{$spon->from_date}} to {{$spon->to_date}}" readonly>
                    </div>
                  </div>
                
              </div>
              <button type="submit" style="width: 100%" class="button-2 w-button">Submit Information</button>
            </form>
          <h3 class="heading-14">Pickup Location</h3>
          <p class="paragraph-9">Upon approval, proceed to the designated pickup location to collect the goods or items sponsored for your event..</p>
          <div class="w-form">
            <form id="email-form-2" name="email-form-2" data-name="Email Form 2" method="get" data-wf-page-id="651a7bf5042f4d69135ef160" data-wf-element-id="57d63657-b5f2-aa05-a6b9-5be7504cb6d9">
              <div id="w-node-_88014fb9-7e3d-34ea-4ff9-a964ddca77f4-135ef160" class="w-layout-layout quick-stack-9 wf-layout-layout">
                <div id="w-node-_44cfb97f-aae7-a688-05ca-cc2087a8fedb-135ef160" class="w-layout-cell">
                  <label for="field">Pick Up Location</label>
                  @if ($spon->pickup_location !== null)
                  <input type="text" class="text-field-8 w-input" maxlength="256" name="field" data-name="Field" placeholder="Example Text" id="field" value="{{$spon->pickup_location}}" readonly>
                  @else
                  <input type="text" class="text-field-8 w-input" maxlength="256" name="field" data-name="Field" placeholder="Example Text" id="field" readonly>
                  @endif
                </div>
                <div id="w-node-e83f2ba4-62c7-3d06-510a-f3b331108f1e-135ef160" class="w-layout-cell">
                  <label for="field">Pick Up Location Address</label>
                  @if ($spon->pickup_address !== null)
                  <input type="text" class="text-field-8 w-input" maxlength="256" name="field" data-name="Field" placeholder="Example Text" id="field" value="{{$spon->pickup_address}}" readonly>
                  @else
                  <input type="text" class="text-field-8 w-input" maxlength="256" name="field" data-name="Field" placeholder="Example Text" id="field" readonly>
                  @endif
                </div>
                <div id="w-node-_42dc478c-4726-af14-725c-4d5767d2c183-135ef160" class="w-layout-cell">
                  <label for="field">Contact Person</label>
                  @if ($spon->contact_person !== null)
                  <input type="text" class="text-field-8 w-input" maxlength="256" name="field" data-name="Field" placeholder="Example Text" id="field" value="{{$spon->contact_person}}" readonly>
                  @else
                  <input type="text" class="text-field-8 w-input" maxlength="256" name="field" data-name="Field" placeholder="Example Text" id="field" readonly>
                  @endif
                </div>
                <div id="w-node-_2d621f14-8f40-866a-71d6-d3836b5051cd-135ef160" class="w-layout-cell">
                  <label for="field">Phone Number</label>
                  @if ($spon->pickup_phone_number !== null)
                  <input type="text" class="text-field-8 w-input" maxlength="256" name="field" data-name="Field" placeholder="Example Text" id="field" value="{{$spon->pickup_phone_number}}" readonly>
                  @else
                  <input type="text" class="text-field-8 w-input" maxlength="256" name="field" data-name="Field" placeholder="Example Text" id="field" readonly>
                  @endif
                </div>
              </div>
            </form>
            <div class="w-form-done">
              <div>Thank you! Your submission has been received!</div>
            </div>
            <div class="w-form-fail">
              <div>Oops! Something went wrong while submitting the form.</div>
            </div>
          </div>
        </div>
        @elseif ($spon->stat == 'proofRejected')
        <hr>
            <p>We regret to inform you that you need to resubmit the proof of agreement
            </p>
            <hr>
            <br>
            <form action="/proof-of-agreement-resubmit/{{$spon->id}}" method="POST" enctype="multipart/form-data">  
              @csrf
              @method("PUT")
              <label>Reviews</label>
              <div id="file-drop-area" class="div-block-5">
                <div style="text-align: center;">
                    <p>Drag and drop review files here, or click to select review files</p>
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

              <label style="margin-top: 30px">Photos</label>
              <div id="file-drop-area-photos" class="div-block-5">
                <div style="text-align: center;">
                    <p>Drag and drop photo files here, or click to select photo files</p>
                    <label for="file-input-photos" id="file-upload-label-photos">
                        <img src="{{asset('assets/images/upload-icon.png')}}" loading="lazy" width="41" alt="" class="image-4">
                    </label>
                </div>
                <input type="file" id="file-input-photos" multiple style="display: none;">
              </div>
              <ul id="file-list-photos"></ul>
              <button id="delete-file-photos">Delete Selected File</button>
              <button id="replace-file-photos">Replace Selected File</button>
              <input type="hidden" id="file-names-input-photos" name="file_names_photos">

              <label style="margin-top: 30px">Videos</label>
              <div id="file-drop-area-videos" class="div-block-5">
                <div style="text-align: center;">
                    <p>Drag and drop video files here, or click to select video files</p>
                    <label for="file-input-videos" id="file-upload-label-videos">
                        <img src="{{asset('assets/images/upload-icon.png')}}" loading="lazy" width="41" alt="" class="image-4">
                    </label>
                </div>
                <input type="file" id="file-input-videos" multiple style="display: none;">
              </div>
              <ul id="file-list-videos"></ul>
              <button id="delete-file-videos">Delete Selected File</button>
              <button id="replace-file-videos">Replace Selected File</button>
              <input type="hidden" id="file-names-input-videos" name="file_names_videos">
              <button style="width: 100%; margin-top: 30px" type="submit" class="button-2 w-button">Submit Attachments</button>
            </form><br>
        @else
        <hr>
        <p>Before you can fill in the collector's information, we need to review your attachments on 'Proof of Agreement' first. Once done, we will notify you either need to resubmit or proceed with filling the collector's information.</p>
        <p>We will get back to you soon !</p>
        <hr>
        @endif
      </div>
    </div>

    @elseif($spon->states == "Pending Collection")
    <div class="div-block-11">
      <div class="div-block-7">
        <h3 class="heading-9">Your Guide to the Sponsorship Application Process</h3>
        <p>Easily Track and Monitor Your Sponsorship Application Progress</p>
        <div id="w-node-_408562b4-2931-746a-83ee-acb55f2d61d3-b607610e" class="w-layout-layout quick-stack-7 wf-layout-layout">
          <div id="w-node-_408562b4-2931-746a-83ee-acb55f2d61d4-b607610e" class="w-layout-cell cell-6"><img src="{{asset('assets/images/tickComplete.png')}}" loading="lazy" alt="" class="image-5">
            <div class="text-block-15">STEP 1</div>
            <div class="text-block-16">Submit Sponsorship<br>Request Form</div>
            <p class="paragraph-5">Begin your journey by filling out and submitting the sponsorship request form, ensuring all details are accurate and complete.</p>
            <a href="#" class="button-3 w-button">Completed</a>
          </div>
          <div id="w-node-_408562b4-2931-746a-83ee-acb55f2d61e0-b607610e" class="w-layout-cell cell-6"><img src="{{asset('assets/images/tickComplete.png')}}" loading="lazy" alt="" class="image-5">
            <div class="text-block-15">STEP 2</div>
            <div class="text-block-16">Await Approval / Contact(3-7 Working Days)</div>
            <p class="paragraph-5">Be patient as our team reviews your application. Expect a response or further contact within 3 to 7 working days.</p>
            <a href="#" class="button-11 w-button">Completed</a>
          </div>
          <div id="w-node-_408562b4-2931-746a-83ee-acb55f2d61ea-b607610e" class="w-layout-cell cell-6"><img src="{{asset('assets/images/tickComplete.png')}}" loading="lazy" alt="" class="image-5">
            <div class="text-block-15">STEP 3</div>
            <div class="text-block-16">Provide Proof of Agreement</div>
            <p class="paragraph-5">Confirm your commitment by providing necessary proof of agreement, solidifying the partnership and support.</p>
            <a href="#" class="button-18 w-button">Completed</a>
          </div>
          <div id="w-node-_408562b4-2931-746a-83ee-acb55f2d61f4-b607610e" class="w-layout-cell cell-6"><img src="{{asset('assets/images/tickComplete.png')}}" loading="lazy" alt="" class="image-5">
            <div class="text-block-15">STEP 4</div>
            <div class="text-block-16">Collect Sponsored Goods at Pickup Location</div>
            <p class="paragraph-5">Upon approval, proceed to the designated pickup location to collect the goods or items sponsored for your event.</p>
            <a href="#" class="button-19 w-button">Completed</a>
          </div>
        </div>
        <h3 class="heading-11">After Event</h3>
        <p class="paragraph-7">Ensure the successful conclusion of your event by submitting proof of event execution, completing the sponsorship cycle.</p>
        <div class="w-form">
          <div id="email-form" name="email-form" data-name="Email Form" method="get" class="form-2" data-wf-page-id="651a843389ca3acbb607610e" data-wf-element-id="04650474-5d3e-c95a-cc2d-cfd28aa025b9">
            <div id="w-node-_506c54cc-76a3-857d-5f89-f933e7181fde-b607610e" class="w-layout-layout quick-stack-10 wf-layout-layout">
              <div id="w-node-_64292ce4-8d9d-772f-fba0-5bef1fd33c1c-b607610e" class="w-layout-cell">
                <label for="field">Name of the Event / Project</label>
                @if ($spon->event_name !== null)
                <input type="text" class="text-field-9 w-input" maxlength="256" name="field" data-name="Field" placeholder="Example Text" id="field" value="{{$spon->event_name}}" readonly>
                @endif
              </div>
              <div id="w-node-_64d4745f-c093-e430-75ed-a347aa40991b-b607610e" class="w-layout-cell">
                <label for="field">Event Date</label>
                @if ($spon->from_date !== null && $spon->to_date !== null)
                <input type="text" class="text-field-9 w-input" maxlength="256" name="field" data-name="Field" placeholder="Example Text" id="field" value="{{$spon->from_date}} to {{$spon->to_date}}" readonly>
                @endif
              </div>
            </div>
            <form action="/after-event/{{$spon->id}}" method="POST" enctype="multipart/form-data">  
              @csrf
              @method("PUT")
              <label>Reviews</label>
              <div id="file-drop-area" class="div-block-5">
                <div style="text-align: center;">
                    <p>Drag and drop review files here, or click to select review files</p>
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

              <label style="margin-top: 30px">Photos</label>
              <div id="file-drop-area-photos" class="div-block-5">
                <div style="text-align: center;">
                    <p>Drag and drop photo files here, or click to select photo files</p>
                    <label for="file-input-photos" id="file-upload-label-photos">
                        <img src="{{asset('assets/images/upload-icon.png')}}" loading="lazy" width="41" alt="" class="image-4">
                    </label>
                </div>
                <input type="file" id="file-input-photos" multiple style="display: none;">
              </div>
              <ul id="file-list-photos"></ul>
              <button id="delete-file-photos">Delete Selected File</button>
              <button id="replace-file-photos">Replace Selected File</button>
              <input type="hidden" id="file-names-input-photos" name="file_names_photos">

              <label style="margin-top: 30px">Videos</label>
              <div id="file-drop-area-videos" class="div-block-5">
                <div style="text-align: center;">
                    <p>Drag and drop video files here, or click to select video files</p>
                    <label for="file-input-videos" id="file-upload-label-videos">
                        <img src="{{asset('assets/images/upload-icon.png')}}" loading="lazy" width="41" alt="" class="image-4">
                    </label>
                </div>
                <input type="file" id="file-input-videos" multiple style="display: none;">
              </div>
              <ul id="file-list-videos"></ul>
              <button id="delete-file-videos">Delete Selected File</button>
              <button id="replace-file-videos">Replace Selected File</button>
              <input type="hidden" id="file-names-input-videos" name="file_names_videos">
          </div>
        </div>
        <button style="width: 100%" type="submit" class="button-2 w-button">Submit Attachments</button>
          </form>
      </div>
    </div>

    @elseif($spon->states == "Collected")
    <div class="div-block-11">
      <div class="div-block-7">
        <h3 class="heading-9">Your Guide to the Sponsorship Application Process</h3>
        <p>Easily Track and Monitor Your Sponsorship Application Progress</p>
        <div id="w-node-_408562b4-2931-746a-83ee-acb55f2d61d3-b607610e" class="w-layout-layout quick-stack-7 wf-layout-layout">
          <div id="w-node-_408562b4-2931-746a-83ee-acb55f2d61d4-b607610e" class="w-layout-cell cell-6"><img src="{{asset('assets/images/tickComplete.png')}}" loading="lazy" alt="" class="image-5">
            <div class="text-block-15">STEP 1</div>
            <div class="text-block-16">Submit Sponsorship<br>Request Form</div>
            <p class="paragraph-5">Begin your journey by filling out and submitting the sponsorship request form, ensuring all details are accurate and complete.</p>
            <a href="#" class="button-3 w-button">Completed</a>
          </div>
          <div id="w-node-_408562b4-2931-746a-83ee-acb55f2d61e0-b607610e" class="w-layout-cell cell-6"><img src="{{asset('assets/images/tickComplete.png')}}" loading="lazy" alt="" class="image-5">
            <div class="text-block-15">STEP 2</div>
            <div class="text-block-16">Await Approval / Contact(3-7 Working Days)</div>
            <p class="paragraph-5">Be patient as our team reviews your application. Expect a response or further contact within 3 to 7 working days.</p>
            <a href="#" class="button-11 w-button">Completed</a>
          </div>
          <div id="w-node-_408562b4-2931-746a-83ee-acb55f2d61ea-b607610e" class="w-layout-cell cell-6"><img src="{{asset('assets/images/tickComplete.png')}}" loading="lazy" alt="" class="image-5">
            <div class="text-block-15">STEP 3</div>
            <div class="text-block-16">Provide Proof of Agreement</div>
            <p class="paragraph-5">Confirm your commitment by providing necessary proof of agreement, solidifying the partnership and support.</p>
            <a href="#" class="button-18 w-button">Completed</a>
          </div>
          <div id="w-node-_408562b4-2931-746a-83ee-acb55f2d61f4-b607610e" class="w-layout-cell cell-6"><img src="{{asset('assets/images/tickComplete.png')}}" loading="lazy" alt="" class="image-5">
            <div class="text-block-15">STEP 4</div>
            <div class="text-block-16">Collect Sponsored Goods at Pickup Location</div>
            <p class="paragraph-5">Upon approval, proceed to the designated pickup location to collect the goods or items sponsored for your event.</p>
            <a href="#" class="button-19 w-button">Completed</a>
          </div>
        </div>
        <h3 class="heading-11">After Event</h3>
        <p class="paragraph-7">Ensure the successful conclusion of your event by submitting proof of event execution, completing the sponsorship cycle.</p>
        <div class="w-form">
          <div id="email-form" name="email-form" data-name="Email Form" method="get" class="form-2" data-wf-page-id="651a843389ca3acbb607610e" data-wf-element-id="04650474-5d3e-c95a-cc2d-cfd28aa025b9">
            <div id="w-node-_506c54cc-76a3-857d-5f89-f933e7181fde-b607610e" class="w-layout-layout quick-stack-10 wf-layout-layout">
              <div id="w-node-_64292ce4-8d9d-772f-fba0-5bef1fd33c1c-b607610e" class="w-layout-cell">
                <label for="field">Name of the Event / Project</label>
                @if ($spon->event_name !== null)
                <input type="text" class="text-field-9 w-input" maxlength="256" name="field" data-name="Field" placeholder="Example Text" id="field" value="{{$spon->event_name}}" readonly>
                @endif
              </div>
              <div id="w-node-_64d4745f-c093-e430-75ed-a347aa40991b-b607610e" class="w-layout-cell">
                <label for="field">Event Date</label>
                @if ($spon->from_date !== null && $spon->to_date !== null)
                <input type="text" class="text-field-9 w-input" maxlength="256" name="field" data-name="Field" placeholder="Example Text" id="field" value="{{$spon->from_date}} to {{$spon->to_date}}" readonly>
                @endif
              </div>
            </div>
            <form action="/after-event/{{$spon->id}}" method="POST" enctype="multipart/form-data">  
              @csrf
              @method("PUT")
              <label>Reviews</label>
              <div id="file-drop-area" class="div-block-5">
                <div style="text-align: center;">
                    <p>Drag and drop review files here, or click to select review files</p>
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

              <label style="margin-top: 30px">Photos</label>
              <div id="file-drop-area-photos" class="div-block-5">
                <div style="text-align: center;">
                    <p>Drag and drop photo files here, or click to select photo files</p>
                    <label for="file-input-photos" id="file-upload-label-photos">
                        <img src="{{asset('assets/images/upload-icon.png')}}" loading="lazy" width="41" alt="" class="image-4">
                    </label>
                </div>
                <input type="file" id="file-input-photos" multiple style="display: none;">
              </div>
              <ul id="file-list-photos"></ul>
              <button id="delete-file-photos">Delete Selected File</button>
              <button id="replace-file-photos">Replace Selected File</button>
              <input type="hidden" id="file-names-input-photos" name="file_names_photos">

              <label style="margin-top: 30px">Videos</label>
              <div id="file-drop-area-videos" class="div-block-5">
                <div style="text-align: center;">
                    <p>Drag and drop video files here, or click to select video files</p>
                    <label for="file-input-videos" id="file-upload-label-videos">
                        <img src="{{asset('assets/images/upload-icon.png')}}" loading="lazy" width="41" alt="" class="image-4">
                    </label>
                </div>
                <input type="file" id="file-input-videos" multiple style="display: none;">
              </div>
              <ul id="file-list-videos"></ul>
              <button id="delete-file-videos">Delete Selected File</button>
              <button id="replace-file-videos">Replace Selected File</button>
              <input type="hidden" id="file-names-input-videos" name="file_names_videos">
          </div>
        </div>
        <button style="width: 100%" type="submit" class="button-2 w-button">Submit Attachments</button>
          </form>
      </div>
    </div>

    @elseif($spon->states == "Completed")
    <div class="div-block-11">
      <div class="div-block-7">
        <h3 class="heading-9">Your Guide to the Sponsorship Application Process</h3>
        <p>Easily Track and Monitor Your Sponsorship Application Progress</p>
        <div id="w-node-_408562b4-2931-746a-83ee-acb55f2d61d3-b607610e" class="w-layout-layout quick-stack-7 wf-layout-layout">
          <div id="w-node-_408562b4-2931-746a-83ee-acb55f2d61d4-b607610e" class="w-layout-cell cell-6"><img src="{{asset('assets/images/tickComplete.png')}}" loading="lazy" alt="" class="image-5">
            <div class="text-block-15">STEP 1</div>
            <div class="text-block-16">Submit Sponsorship<br>Request Form</div>
            <p class="paragraph-5">Begin your journey by filling out and submitting the sponsorship request form, ensuring all details are accurate and complete.</p>
            <a href="#" class="button-3 w-button">Completed</a>
          </div>
          <div id="w-node-_408562b4-2931-746a-83ee-acb55f2d61e0-b607610e" class="w-layout-cell cell-6"><img src="{{asset('assets/images/tickComplete.png')}}" loading="lazy" alt="" class="image-5">
            <div class="text-block-15">STEP 2</div>
            <div class="text-block-16">Await Approval / Contact(3-7 Working Days)</div>
            <p class="paragraph-5">Be patient as our team reviews your application. Expect a response or further contact within 3 to 7 working days.</p>
            <a href="#" class="button-11 w-button">Completed</a>
          </div>
          <div id="w-node-_408562b4-2931-746a-83ee-acb55f2d61ea-b607610e" class="w-layout-cell cell-6"><img src="{{asset('assets/images/tickComplete.png')}}" loading="lazy" alt="" class="image-5">
            <div class="text-block-15">STEP 3</div>
            <div class="text-block-16">Provide Proof of Agreement</div>
            <p class="paragraph-5">Confirm your commitment by providing necessary proof of agreement, solidifying the partnership and support.</p>
            <a href="#" class="button-18 w-button">Completed</a>
          </div>
          <div id="w-node-_408562b4-2931-746a-83ee-acb55f2d61f4-b607610e" class="w-layout-cell cell-6"><img src="{{asset('assets/images/tickComplete.png')}}" loading="lazy" alt="" class="image-5">
            <div class="text-block-15">STEP 4</div>
            <div class="text-block-16">Collect Sponsored Goods at Pickup Location</div>
            <p class="paragraph-5">Upon approval, proceed to the designated pickup location to collect the goods or items sponsored for your event.</p>
            <a href="#" class="button-19 w-button">Completed</a>
          </div>
        </div>
        <h3 class="heading-11">After Event</h3>
        <p class="paragraph-7">Thanks For Choosing Us !</p>
      </div>
    </div>

    @elseif($spon->states == "Blacklist")
    <div class="div-block-11">
      <div class="div-block-7">
        <h3 class="heading-9">Your Are in the Blacklist</h3>
        <p>You can't apply any sponsorship again</p>
      </div>
    </div>

    @endif

    <div class="div-block-11">
      <div class="div-block-7">
        <div id="w-node-daee3445-1c0c-b96d-f427-2e09cfa0ab21-af0b537c" class="w-layout-layout quick-stack-19 wf-layout-layout">
          <div id="w-node-bed7cd22-49d6-d440-89aa-b96ff1159735-af0b537c" class="w-layout-cell">
            <h3 class="heading-22">Request History</h3>
            
          </div>
          <div id="w-node-_4aa9ebf9-ce73-bc9a-c68b-98f83dd0035d-af0b537c" class="w-layout-cell cell-23">
            <div class="form-block-4 w-form">
              <form id="email-form" name="email-form" data-name="Email Form" method="get" class="form-4" data-wf-page-id="651bc3682699bcc1af0b537c" data-wf-element-id="9ed34261-eece-d5c7-13c4-b94a594fbde4">
                <select id="statusFilt" name="field" data-name="Field" class="select-field-2 w-select">
                  <option value="">Status</option>
                  <option value="Processing">Processing</option>
                  <option value="Approved">Approved</option>
                  <option value="Pending">Pending</option>
                  <option value="Delay">Delay</option>
                  <option value="MIA">MIA</option>
                  <option value="Completed">Completed</option>
                  <option value="Rejected">Rejected</option>
                </select><select id="monthFilt" name="field-2" data-name="Field 2" class="select-field-2 w-select">
                  <option value="">Select Month</option>
                  @foreach ($month as $months)
                  <option value="{{$months}}">{{$months}}</option>
                  @endforeach
                </select>
                {{-- <button id="exportButton" class="button-26 w-button">Export</button> --}}
              </form>
            </div>
          </div>
        </div>
        <div class="w-embed">
          <style>
           table {
             border-collapse: collapse;
             width: 100%;
             border-radius: 70px;
           }
           th, td {
             text-align: center;
             padding: 12px;
           }
           .table-head {
           background-color: #f2f4f5;
           border-radius: 70px;
           font-family: 'Poppins', Arial, sans-serif;
           font-size: 14px;
           }
           .leftThead {
           border-radius: 10px 0px 0px 10px;
           }
           .rightThead {
           border-radius: 0px 10px 10px 0px;
           }
           .divLists:hover {
           background-color: #ebf0fd;
           cursor: pointer;
           }
           .tableDiv {
            margin: 10px 10px 40px 10px;
           }
           </style>
          <div class="tableDiv" style="overflow-x: auto;">
            <table class="table">
              <tr class="table-head">
                {{-- <th class="leftThead"><input id="selectAllCheckbox" type="checkbox"></th> --}}
                <th>EVENT NAME</th>
                <th>EVENT DATES</th>
                <th>LOCATION</th>
                <th>SPONSOR CARTONS</th>
                <th class="rightThead">STATUS</th>
              </tr>
              @foreach ($sponsor as $sponsorship)
              @php
                  $int_ro200ml = (int)$sponsorship->ro_200ml;
                  $int_ro500ml = (int)$sponsorship->ro_500ml;
                  $int_ro11L = (int)$sponsorship->ro_11L;
                  $int_ro350ml = (int)$sponsorship->ro_350ml;
                  $sponsorCartons = $int_ro200ml + $int_ro500ml + $int_ro11L +$int_ro350ml
              @endphp
              <tr class="divLists">
                {{-- <td class="leftThead"><input class="select-checkbox" type="checkbox"></td> --}}
                <td class="clickable-row" data-href="/dashboard/view-request/{{$sponsorship->id}}">{{$sponsorship->event_name}}</td>
                <td class="clickable-row monthFilter" data-href="/dashboard/view-request/{{$sponsorship->id}}">{{date('M d, Y', strtotime($sponsorship->from_date))}} - {{date('M d, Y', strtotime($sponsorship->to_date))}}</td>
                <td class="clickable-row" data-href="/dashboard/view-request/{{$sponsorship->id}}">{{$sponsorship->eventAddress}}</td>
                <td class="clickable-row" data-href="/dashboard/view-request/{{$sponsorship->id}}">{{$sponsorCartons}}</td>
                <td class="rightThead clickable-row statusFilter" data-href="/dashboard/view-request/{{$sponsorship->id}}">{{$sponsorship->states}}</td>
              </tr>
              @endforeach
            </table>
          </div>
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

    
  </script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
  <script>
    document.getElementById('selectAllCheckbox').addEventListener('change', function () {
      const checkboxes = document.querySelectorAll('.select-checkbox');
      checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
      });
    });
    // Function to export selected rows to Excel
    function exportSelectedToExcel() {
      const table = document.querySelector('.table'); // Select your table by class or ID
      const checkboxes = table.querySelectorAll('.select-checkbox:checked'); // Select checked checkboxes
  
      if (checkboxes.length === 0) {
        alert('Please select at least one row to export.');
        return;
      }
  
      const selectedRows = [];
      checkboxes.forEach((checkbox) => {
        const row = checkbox.closest('tr'); // Get the closest row for each checked checkbox
        selectedRows.push(row);
      });
  
      // Create a new table that includes the header row and selected rows
      const selectedTable = document.createElement('table');
      const headerRow = table.querySelector('.table-head'); // Get the header row
      selectedTable.appendChild(headerRow.cloneNode(true)); // Clone the header row
      selectedRows.forEach((row) => {
        selectedTable.appendChild(row.cloneNode(true)); // Clone the selected rows
      });
  
      const ws = XLSX.utils.table_to_sheet(selectedTable);
  
      const wb = XLSX.utils.book_new();
      XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
  
      // Save the Excel file
      XLSX.writeFile(wb, 'selected_data_with_header.xlsx');
    }
  
    // Add an event listener to trigger the export on button click
    document.getElementById('exportButton').addEventListener('click', exportSelectedToExcel);
  </script> --}}
 <script>
  document.addEventListener("DOMContentLoaded", function () {
      const statusSelect = document.getElementById("statusFilt");
      const monthSelect = document.getElementById("monthFilt");
      const reqElements = document.querySelectorAll(".divLists");

      // Map full month names to abbreviated forms
      const monthMap = {
          "Jan": "January",
          "Feb": "February",
          "Mar": "March",
          "Apr": "April",
          "May": "May",
          "Jun": "June",
          "Jul": "July",
          "Aug": "August",
          "September": "September",
          "Oct": "October",
          "Nov": "November",
          "Dec": "December"
      };

     
      function filterPosts() {
          const selectedStatus = statusSelect.value;
          const selectedMonth = monthSelect.value;
         
          reqElements.forEach(function (reqElement) {
              const ReqStatus = reqElement.querySelector(".statusFilter").textContent;
              const postDate = reqElement.querySelector(".monthFilter").textContent;
              const allFromMonth = postDate.split("-")[0]
              const allToMonth = postDate.split("-")[1]
              const fromMonth = allFromMonth.split(" ")[0]
              const toMonth = allToMonth.split(" ")[1]
              const fromDate = monthMap[fromMonth];
              const todate = monthMap[toMonth];
              if (
                  (selectedStatus === "" || selectedStatus === ReqStatus) &&
                  (selectedMonth === "" || selectedMonth === fromDate || selectedMonth === todate) 
              ) {
                  reqElement.classList.remove("filter-hidden")
              } else {
                  reqElement.classList.add("filter-hidden");
              }
          });
      }

      statusSelect.addEventListener("change", filterPosts);
      monthSelect.addEventListener("change", filterPosts);

      // Initial filtering when the page loads
      filterPosts();
  });
</script>
<script>
  const agreementDiv = document.querySelector(".agreementDiv");
  const notAgreeDiv = document.querySelector(".notAgreeDiv");
  const undoAgree = document.getElementById("undoAgree");
  const NotAgreeBtn = document.getElementById("NotAgreeBtn");

  NotAgreeBtn.addEventListener('click', function() {
    agreementDiv.style.display = "none";
    notAgreeDiv.style.display = "block";
  });

  undoAgree.addEventListener('click', function() {
    agreementDiv.style.display = "block";
    notAgreeDiv.style.display = "none";
  })
</script>
@endsection