@extends('partial.dashboard-main')

@section('title', 'Dashboard')
    
@section('content')
<div class="div-block-27">
    <div class="div-block-34">
      <div id="w-node-_76cf77d8-8b71-bb16-3135-886b28d0e1dc-af0b537c" class="w-layout-layout quick-stack-16 wf-layout-layout">
        <div id="w-node-_76cf77d8-8b71-bb16-3135-886b28d0e1dd-af0b537c" class="w-layout-cell" style="border: 1px solid #EEEEEE; padding: 50px; border-radius: 8px">
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
              <td class="clickable-row" data-href="/dashboard/view-request/{{$sponsorship->id}}">{{$sponsorship->event_name}}</td>
              <td class="clickable-row" data-href="/dashboard/view-request/{{$sponsorship->id}}">{{date('M d, Y', strtotime($sponsorship->from_date))}} - {{date('M d, Y', strtotime($sponsorship->to_date))}}</td>
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
              <td class="rightThead clickable-row" data-href="/dashboard/view-request/{{$sponsorship->id}}">{{$sponsorship->states}}</td>
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
                name: 'Page Views',
                data: pageData,
            }],
            xaxis: {
                categories: pageLabels,
            },
        };
        
        var chart = new ApexCharts(document.querySelector("#page-views-chart"), options);
        chart.render();
        </script>
@endsection