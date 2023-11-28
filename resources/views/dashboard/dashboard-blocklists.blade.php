@extends('partial.dashboard-main')

@section('title', 'Dashboard')
    
@section('content')
<div class="div-block-27">
        @if (Session::has('status'))
          <div class="alert-delete-success">{{Session::get('message')}}</div>
        @endif
    <div class="div-block-34">
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
                      <h3>Permanent delete this event ?</h3>
                      <hr>
                    </div>
                    <div class="modal-body">
                      <button class="close-btn close-modal" data-modal="myModal{{$sponsorship->id}}">
                        Close
                      </button>
                      <a href="/dashboard/permanent-delete/{{$sponsorship->id}}" class="delete-confirm-btn close-modal" data-modal="myModal{{$sponsorship->id}}">Confirm</a>
                    </div>
                  </div>
                
                </div>

                <a href="/dashboard/restore/{{$sponsorship->id}}" class="modal-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                    </svg>
                </a>
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
 <script>
  // Get all elements with class "open-modal-btn"
  const openModalButtons = document.querySelectorAll('.open-modal-btn');

  const alert = document.querySelector('.alert-delete-success');

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