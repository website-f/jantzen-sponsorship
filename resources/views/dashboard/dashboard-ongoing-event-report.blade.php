@extends('partial.dashboard-main')

@section('title', 'Ongoing Event Report')
    
@section('content')
<div class="div-block-27">
        @if (Session::has('status'))
          <div class="alert-delete-success">{{Session::get('message')}}</div>
        @endif
    <div class="div-block-34">
      <div id="w-node-daee3445-1c0c-b96d-f427-2e09cfa0ab21-af0b537c" class="w-layout-layout quick-stack-19 wf-layout-layout">
        <div id="w-node-bed7cd22-49d6-d440-89aa-b96ff1159735-af0b537c" class="w-layout-cell">
          <h3 class="heading-22">Ongoing Event Report</h3>
          <p class="paragraph-14">An In-depth Overview of Latest Sponsored Events and Updates</p>
        </div>
        <div id="w-node-_4aa9ebf9-ce73-bc9a-c68b-98f83dd0035d-af0b537c" class="w-layout-cell cell-23">
          <div class="form-block-4 w-form">
            <form id="email-form" name="email-form" data-name="Email Form" method="get" class="form-4" data-wf-page-id="651bc3682699bcc1af0b537c" data-wf-element-id="9ed34261-eece-d5c7-13c4-b94a594fbde4">
                <input class="projectNameFilter" type="text" id="projectName" placeholder="  Event Name" onkeyup="searchFunction()">
                <select id="field" name="field" data-name="Field" class="select-field-2 w-select">
                <option value="">Status</option>
                <option value="Processing">Processing</option>
                <option value="Pending">Pending</option>
                <option value="MIA">MIA</option>
                <option value="Completed">Completed</option>
                <option value="Rejected">Rejected</option>
              </select>
              <select id="field-2" name="field-2" data-name="Field 2" class="select-field-2 w-select">
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
              <td class="clickable-row event-name" data-href="/dashboard/event-report/{{$sponsorship->id}}">{{$sponsorship->event_name}}</td>
              <td class="clickable-row monthFilter" data-href="/dashboard/event-report/{{$sponsorship->id}}">{{date('M d, Y', strtotime($sponsorship->from_date))}} - {{date('M d, Y', strtotime($sponsorship->to_date))}}</td>
              <td class="clickable-row" data-href="/dashboard/event-report/{{$sponsorship->id}}">{{$sponsorship->eventAddress}}</td>
              <td class="clickable-row" data-href="/dashboard/event-report/{{$sponsorship->id}}">
                @if ($inCharge !== null)
                    @foreach ($inCharge as $item)
                        - {{$item}} <br>
                    @endforeach
                @else
                Not approved yet
                @endif
              </td>
              <td class="clickable-row" data-href="/dashboard/event-report/{{$sponsorship->id}}">{{$sponsorCartons}}</td>
              <td class="rightThead clickable-row statusFilter" data-href="/dashboard/event-report/{{$sponsorship->id}}">{{$sponsorship->states}}</td>
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
    function searchFunction() {
      // Declare variables
      var input, filter, txt, txtValue, a;
      input = document.getElementById('projectName');
      filter = input.value.toUpperCase();
      txt = document.querySelectorAll('.divLists');
    
      // Loop through all list items, and hide those who don't match the search query
      txt.forEach(function (element) {
          a = element.querySelector(".event-name")
          txtValue = a.textContent || a.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            element.classList.remove("filter-hidden");

          } else {
            element.classList.add("filter-hidden");
          }
      });
    }
    </script>


@endsection