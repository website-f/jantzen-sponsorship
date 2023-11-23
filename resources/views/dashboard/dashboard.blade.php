@extends('partial.dashboard-main')

@section('title', 'Dashboard')
    
@section('content')
<div class="div-block-27">
        @if (Session::has('status'))
          <div class="alert-delete-success">{{Session::get('message')}}</div>
        @endif
    <div class="div-block-34">
      <div id="w-node-_76cf77d8-8b71-bb16-3135-886b28d0e1dc-af0b537c" class="w-layout-layout quick-stack-16 wf-layout-layout">
        <div id="w-node-_76cf77d8-8b71-bb16-3135-886b28d0e1dd-af0b537c" class="w-layout-cell" style="border: 1px solid #EEEEEE; border-radius: 8px">
          <h4 class="heading-19">Status</h4>
          <div style="width: 100%" id="page-views-chart"></div>
        </div>
        <div id="w-node-_76cf77d8-8b71-bb16-3135-886b28d0e1de-af0b537c" class="w-layout-cell cell-22" style="padding: 10px">
          <h4 class="heading-19">Upcoming Events</h4>
          <div data-current="Tab 1" data-easing="ease" data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
            <div class="tabs-menu-2 w-tab-menu">
              <a data-w-tab="Tab 1" class="tab-link-tab-1-2 w-inline-block w-tab-link w--current">
                <div class="text-block-36">Booth</div>
              </a>
              <a data-w-tab="Tab 2" class="tab-link-tab-2-2 w-inline-block w-tab-link">
                <div class="text-block-37">Space</div>
              </a>
              <a data-w-tab="None" class="tab-link-tab-3-2 w-inline-block w-tab-link w--current">
                <div class="text-block-51">None</div>
              </a>
            </div>
            <div class="tabs-content w-tab-content">
              <div data-w-tab="Tab 1" class="tab-pane-tab-1 w-tab-pane w--tab-active">
                @foreach ($booth as $booths)
                <div class="div-block-35">
                  <div class="div-block-36">
                    <div><strong>{{$booths->event_name}}</strong></div>
                    <div class="text-block-38">{{$booths->eventAddress}}</div>
                  </div>
                  <div class="div-block-37">
                    <div class="text-block-39">{{date('M d, Y', strtotime($booths->from_date))}} - {{date('M d, Y', strtotime($booths->to_date))}}</div>
                  </div>
                </div>
                @endforeach
              </div>
              <div data-w-tab="Tab 2" class="tab-pane-tab-2 w-tab-pane">
                @foreach ($space as $spaces)
                <div class="div-block-35">
                  <div class="div-block-36">
                    <div><strong>{{$spaces->event_name}}</strong></div>
                    <div class="text-block-38">{{$spaces->eventAddress}}</div>
                  </div>
                  <div class="div-block-37">
                    <div class="text-block-48">{{date('M d, Y', strtotime($spaces->from_date))}} - {{date('M d, Y', strtotime($spaces->to_date))}}</div>
                  </div>
                </div>
                @endforeach
              </div>
              <div data-w-tab="None" class="tab-pane-none w-tab-pane w--tab-active">
                @foreach ($none as $nones)
                <div class="div-block-35">
                  <div class="div-block-36">
                    <div><strong>{{$nones->event_name}}</strong></div>
                    <div class="text-block-38">{{$nones->eventAddress}}</div>
                  </div>
                  <div class="div-block-37">
                    <div class="text-block-48">{{date('M d, Y', strtotime($nones->from_date))}} - {{date('M d, Y', strtotime($spaces->to_date))}}</div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      <h3 class="heading-20">Recently Sponsor Events</h3>
      <p class="paragraph-12">An In-depth Overview of Latest Sponsored Events and Updates</p>
      <div id="w-node-ded6f5bb-745a-da0e-b9cb-3c808e36fb55-af0b537c" class="w-layout-layout quick-stack-17 wf-layout-layout">
        <div id="w-node-ded6f5bb-745a-da0e-b9cb-3c808e36fb56-af0b537c" class="w-layout-cell">
          <div class="div-block-38">
            <div class="div-block-39"><img src="{{asset('assets/images/u_shopping-bag.png')}}" loading="lazy" width="35" height="35" alt="" class="image-20">
              <div>
                @php
                    $sponsorApproval = $sponsor->where('states', 'Processing')->count();
                @endphp
                <div class="text-block-42">Sponsorship Approval</div>
                <div class="text-block-43">{{$sponsorApproval}}</div>
              </div>
            </div>
            <a href="#" class="button-25 w-button">Approve Now</a>
          </div>
        </div>
        <div id="w-node-ded6f5bb-745a-da0e-b9cb-3c808e36fb57-af0b537c" class="w-layout-cell">
          <div class="div-block-40"><img src="{{asset('assets/images/u_shop.png')}}" loading="lazy" alt="">
            @php
                $sponsorInProgress = $sponsor->where('states', 'Pending')->count();
            @endphp
            <div class="text-block-46">In Progressing</div>
            <div class="text-block-47">{{$sponsorInProgress}}</div>
          </div>
        </div>
        <div id="w-node-_7bdbdbaf-1343-07b7-65b4-848aa78fde46-af0b537c" class="w-layout-cell">
          <div class="div-block-40"><img src="{{asset('assets/images/u_shop.png')}}" loading="lazy" alt="">
            @php
                $totalCartons = 0;
                foreach ($sponsor as $spon) {
                  $int_ro200ml = (int)$spon->ro_200ml;
                  $int_ro500ml = (int)$spon->ro_500ml;
                  $int_ro11L = (int)$spon->ro_11L;
                  $int_ro350ml = (int)$spon->ro_350ml;
                  $tots = $int_ro200ml + $int_ro500ml + $int_ro11L + $int_ro350ml;
                  $totalCartons += $tots;
                }
            @endphp
            <div class="text-block-46">Total Sponsor Cartons</div>
            <div class="text-block-45">{{$totalCartons}}</div>
          </div>
        </div>
        <div id="w-node-_42f58ed2-15ab-09c2-05ee-ef0769c00685-af0b537c" class="w-layout-cell">
          <div class="div-block-40"><img src="{{asset('assets/images/u_shop.png')}}" loading="lazy" alt="">
            @php
                $sponsored = $sponsor->where('states', 'Completed')->count();
            @endphp
            <div class="text-block-46">Total event sponsored</div>
            <div class="text-block-45">{{$sponsored}}</div>
          </div>
        </div>
      </div>
      <div id="w-node-daee3445-1c0c-b96d-f427-2e09cfa0ab21-af0b537c" class="w-layout-layout quick-stack-19 wf-layout-layout">
        <div id="w-node-bed7cd22-49d6-d440-89aa-b96ff1159735-af0b537c" class="w-layout-cell">
          <h3 class="heading-22">Sponsor Events</h3>
          <p class="paragraph-14">An In-depth Overview of Latest Sponsored Events and Updates</p>
        </div>
        <div id="w-node-_4aa9ebf9-ce73-bc9a-c68b-98f83dd0035d-af0b537c" class="w-layout-cell cell-23">
          <div class="form-block-4 w-form">
            <form id="email-form" name="email-form" data-name="Email Form" method="get" class="form-4" data-wf-page-id="651bc3682699bcc1af0b537c" data-wf-element-id="9ed34261-eece-d5c7-13c4-b94a594fbde4">
              <select id="field" name="field" data-name="Field" class="select-field-2 w-select">
                <option value="">Status</option>
                <option value="Processing">Processing</option>
                <option value="Pending">Pending</option>
                <option value="MIA">MIA</option>
                <option value="Completed">Completed</option>
                <option value="Rejected">Rejected</option>
              </select><select id="field-2" name="field-2" data-name="Field 2" class="select-field-2 w-select">
                <option value="">Select Month</option>
                @foreach ($month as $months)
                <option value="{{$months}}">{{$months}}</option>
                @endforeach
              </select>
              <button id="exportButton" class="button-26 w-button">Export</button>
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
              <th class="leftThead"><input id="selectAllCheckbox" type="checkbox"></th>
              <th>#</th>
              <th>PROJECT NAME</th>
              <th>PROJECT DATES</th>
              <th>LOCATION</th>
              <th>IN CHARGE</th>
              <th>SPONSOR CARTONS</th>
              <th class="rightThead">STATUS</th>
            </tr>
            @foreach ($sponsor as $sponsorship)
            @php
                $inCharge = json_decode($sponsorship->attending);
                $int_ro200ml = (int)$sponsorship->ro_200ml;
                $int_ro500ml = (int)$sponsorship->ro_500ml;
                $int_ro11L = (int)$sponsorship->ro_11L;
                $int_ro350ml = (int)$sponsorship->ro_350ml;
                $sponsorCartons = $int_ro200ml + $int_ro500ml + $int_ro11L +$int_ro350ml
            @endphp
            <tr class="divLists">
              <td class="leftThead"><input class="select-checkbox" type="checkbox"></td>
              <td>
                <button class="open-modal-btn modal-btn" data-modal="myModal{{$sponsorship->id}}">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                     <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                   </svg>
                </button>
                 <!-- The Modal -->
                 <div id="myModal{{$sponsorship->id}}" class="modal">
                  
                  <!-- Modal content -->
                  <div class="modal-content">
                    <div class="modal-header">
                      <span class="close close-modal" data-modal="myModal{{$sponsorship->id}}">&times;</span>
                      <h3>Confirm delete this event ?</h3>
                      <hr>
                    </div>
                    <div class="modal-body">
                      <button class="close-btn close-modal" data-modal="myModal{{$sponsorship->id}}">
                        Close
                      </button>
                      <a href="/dashboard/delete/{{$sponsorship->id}}" class="delete-confirm-btn close-modal" data-modal="myModal{{$sponsorship->id}}">Confirm</a>
                    </div>
                  </div>
                
                </div>
              </td>
              <td class="clickable-row" data-href="/dashboard/view-request/{{$sponsorship->id}}">{{$sponsorship->event_name}}</td>
              <td class="clickable-row monthFilter" data-href="/dashboard/view-request/{{$sponsorship->id}}">{{date('M d, Y', strtotime($sponsorship->from_date))}} - {{date('M d, Y', strtotime($sponsorship->to_date))}}</td>
              <td class="clickable-row" data-href="/dashboard/view-request/{{$sponsorship->id}}">{{$sponsorship->eventAddress}}</td>
              <td class="clickable-row" data-href="/dashboard/view-request/{{$sponsorship->id}}">
                @if ($inCharge !== null)
                    @foreach ($inCharge as $item)
                        - {{$item}} <br>
                    @endforeach
                @else
                Not approved yet
                @endif
              </td>
              <td class="clickable-row" data-href="/dashboard/view-request/{{$sponsorship->id}}">{{$sponsorCartons}}</td>
              <td class="rightThead clickable-row statusFilter" data-href="/dashboard/view-request/{{$sponsorship->id}}">{{$sponsorship->states}}</td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
    @php
        
    @endphp
  </div>
    </div>
  </div>
  <script>
    // Add a click event listener to all elements with the "clickable-row" class
    const clickableRows = document.querySelectorAll('.clickable-row');
    clickableRows.forEach(row => {
      row.addEventListener('click', () => {
        const href = row.getAttribute('data-href');
        if (href) {
          window.location.href = href; // Redirect to the specified URL
        }
      });
    });
    
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
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
    </script>
    <script src="{{asset('assets/vendor/apexcharts/js/apexcharts.min.js')}}"></script>
    <script>
        const pageLabels = @json($statusCounts->keys());
        const pageData = @json($statusCounts->values());
        
        var options = {
            chart: {
                type: 'bar',
            },
            series: [{
                name: 'Total',
                data: pageData,
            }],
            xaxis: {
                categories: pageLabels,
            },
        };
        
        var chart = new ApexCharts(document.querySelector("#page-views-chart"), options);
        chart.render();
        </script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
          const statusSelect = document.getElementById("field");
          const monthSelect = document.getElementById("field-2");
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
  // Get all elements with class "open-modal-btn"
  const openModalButtons = document.querySelectorAll('.open-modal-btn');

  const alert = document.querySelector('.alert-delete-success')

  // Get all elements with class "modal"
  const modals = document.querySelectorAll('.modal');

  // Get all elements with class "close-modal"
  const closeButtons = document.querySelectorAll('.close-modal');

  // Add click event listeners to open modal buttons
  openModalButtons.forEach(button => {
      button.addEventListener('click', function () {
          const modalId = this.getAttribute('data-modal');
          const modal = document.getElementById(modalId);
          if (modal) {
              modal.style.display = 'block';
          }
      });
  });

  // Add click event listeners to close buttons
  closeButtons.forEach(button => {
      button.addEventListener('click', function () {
          const modalId = this.getAttribute('data-modal');
          const modal = document.getElementById(modalId);
          if (modal) {
              modal.style.display = 'none';
          }
      });
  });

  // Close modals when clicking outside the modal content
  modals.forEach(modal => {
      modal.addEventListener('click', function (event) {
          if (event.target === this) {
              modal.style.display = 'none';
          }
      });
  });

  // Prevent clicks inside modals from closing the modal
  modals.forEach(modal => {
      modal.addEventListener('click', function (event) {
          event.stopPropagation();
      });
  });

  // Add click event listener to the document body
document.body.addEventListener('click', function (event) {
    // Check if the event target is not the alert element or any of its children
    if (!alert.contains(event.target)) {
        alert.style.display = 'none';
    }
});
</script>

@endsection