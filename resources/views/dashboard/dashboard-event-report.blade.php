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
        </div>
        <div id="w-node-_4aa9ebf9-ce73-bc9a-c68b-98f83dd0035d-af0b537c" class="w-layout-cell cell-23">
          <div class="form-block-4 w-form">
           <button class="accordion-btn">
            Add <i class="bi bi-plus-lg"></i>
           </button>
           <button type="button" class="export-btn">
            Export to PDF
           </button>
          </div>
        </div>
        <div class="">
          <p class="event-report-title"><b>Event Name: </b>{{$sponsor->event_name}}</p>
          <p class="event-report-title"><b>Location: </b>{{$sponsor->eventAddress}}</p>
          <p class="event-report-title"><b>Date: </b>{{$sponsor->from_date}} - {{$sponsor->to_date}}</p>
          <input id="idVal" type="hidden" value="{{$sponsor->id}}">
      </div>
      </div>
      <div class="panel-btn">
        <div class="grid-col-2">
          <div class="grid-item">
            <label>Day</label>
            <input type="text" class="form-input" name="date">
          </div>
          <div class="grid-item">
            <label>Petty Cash In (RM)</label>
            <input id="cashIn" type="number" class="form-input" name="cash_in_report">
          </div>
        </div>
        <div class="custom-table">
          <h4>Cash Out report</h4>
          <table id="siblingsTable">
            <thead class="table-header">
                <tr>
                    <th>ITEMS</th>
                    <th>OUT (RM)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input class="form-input" type="text" name="item[]"></td>
                    <td><input class="form-input sumTotalCash" type="number" name="out[]"></td>
                </tr>
            </tbody>
        </table>
        <button class="addRowBtn" type="button" id="addRowBtn"><i class="bi bi-plus-lg"></i> Add Row</button>
        <input type="text" class="totalCash" id="totalCash" placeholder="Total" name="total_cash_out">
        <input type="hidden" class="totalCashHidden cashOnHandTotal" id="totalCashHide" name="total_cash_out_num">
        </div>

        <div class="custom-table">
          <h4>Sales</h4>
          <table id="siblingsTableSale">
            <thead class="table-header">
                <tr>
                    <th>ITEMS</th>
                    <th>QUANTITY SOLD</th>
                    <th>RM</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input class="form-input" type="text" name="sale[]"></td>
                    <td><input class="form-input" type="text" name="quantity_sold[]"></td>
                    <td><input class="form-input sumTotalSale" type="number" name="rm[]"></td>
                </tr>
            </tbody>
        </table>
        <button class="addRowBtn" type="button" id="addRowBtnSale"><i class="bi bi-plus-lg"></i> Add Row</button>
        <input type="text" class="totalCash" id="totalSale" placeholder="Total" name="total_sale">
        <input type="hidden" class="totalCashHidden cashOnHandTotal" id="totalSaleHide" placeholder="Total" name="total_sale_num">
        </div>
        <div class="grid-col-2">
          <div class="grid-item">
            <label>Cash On Hand</label>
            <input id="cashOnHand" type="text" class="form-input" name="cash_on_hand">
          </div>    
          <div class="grid-item">
            <label>TNG</label>
            <input id="cashIn" type="text" class="form-input" name="tng">
          </div>
          <div class="grid-item">
            <label>Others</label>
            <input id="cashIn" type="text" class="form-input" name="others">
          </div>
        </div>
        <button id="submit-report-btn" class="submit-report-btn" type="button">Submit</button>
      </div>

      <div class="pdf-panel">
        <div class="center-btn">
        <button type="button" class="export-btn-report" onclick="exportToPDF()">
          Export
        </button>
        </div>
        <div class="exportPDFCard">
          @foreach ($ongoing as $index => $item)
          <h2 style="text-decoration: underline">Day {{$item->day}}</h2>
            @php
              $cashOutRow = json_decode($item->cash_out_report);
              $stockOnHand = json_decode($item->stock_on_hand);
            @endphp
              <p><b>Petty Cash In (RM):</b> {{$item->cash_in_report}}</p>
              <h3>Cash Out Report</h3>
              <table id="tableDisplay">
                <thead class="table-header">
                    <tr>
                      @foreach($cashOutRow->headers as $header)
                        <th>{{ $header }}</th>
                      @endforeach
                    </tr>
                </thead>
                <tbody>
                   @foreach($cashOutRow->rows as $row)
                        <tr>
                            @foreach($row as $cell)
                                <td class="tableBody" style="text-align: center">{{ $cell }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
              </table>
              <p><b>Sum:</b> {{$item->total_cash_out}}</p>
              <h3>Sales Report</h3>
              <table id="tableDisplay">
                <thead class="table-header">
                    <tr>
                      @foreach($stockOnHand->headers as $header)
                        <th>{{ $header }}</th>
                      @endforeach
                    </tr>
                </thead>
                <tbody>
                   @foreach($stockOnHand->rows as $row)
                        <tr>
                            @foreach($row as $cell)
                                <td class="tableBody" style="text-align: center">{{ $cell }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
              </table>
              <p><b>Sum:</b> {{$item->total_sale}}</p><br>
              <p><b>Cash On Hand:</b> RM{{$item->cash_on_hand}}</p>
              <p><b>TNG:</b> RM{{$item->tng}}</p>
              <p><b>Others:</b> RM{{$item->others}}</p>
              <hr>
              <br>
          @endforeach
        </div>
      </div>
      
      <div class="dayLists">
        @foreach ($ongoing as $index => $item)
        <button class="accordion"><i class="bi bi-caret-down-fill"></i> <b>Day {{$item->day}}</b></button>
        
        <div class="panel">
          <button class="close-edit-report-btn hideClose">X</button>
          <button class="edit-report-btn">Edit</button>
          @php
            $cashOutRow = json_decode($item->cash_out_report);
            $stockOnHand = json_decode($item->stock_on_hand);
          @endphp
          <div class="closeTab" style="margin-top: 20px">
            <p><b>Petty Cash In (RM):</b> {{$item->cash_in_report}}</p>
            <h3>Cash Out Report</h3>
            <table id="tableDisplay">
              <thead class="table-header">
                  <tr>
                    @foreach($cashOutRow->headers as $header)
                      <th>{{ $header }}</th>
                    @endforeach
                  </tr>
              </thead>
              <tbody>
                 @foreach($cashOutRow->rows as $row)
                      <tr>
                          @foreach($row as $cell)
                              <td class="tableBody" style="text-align: center">{{ $cell }}</td>
                          @endforeach
                      </tr>
                  @endforeach
              </tbody>
            </table>
            <p><b>Sum:</b> {{$item->total_cash_out}}</p>
            <h3>Sales Report</h3>
            <table id="tableDisplay">
              <thead class="table-header">
                  <tr>
                    @foreach($stockOnHand->headers as $header)
                      <th>{{ $header }}</th>
                    @endforeach
                  </tr>
              </thead>
              <tbody>
                 @foreach($stockOnHand->rows as $row)
                      <tr>
                          @foreach($row as $cell)
                              <td class="tableBody" style="text-align: center">{{ $cell }}</td>
                          @endforeach
                      </tr>
                  @endforeach
              </tbody>
            </table>
            <p><b>Sum:</b> {{$item->total_sale}}</p><br>
            <p><b>Cash On Hand:</b> RM{{$item->cash_on_hand}}</p>
            <p><b>TNG:</b> RM{{$item->tng}}</p>
            <p><b>Others:</b> RM{{$item->others}}</p>
          </div>
          
          <div class="hideClose edit">
            <div class="grid-col-2">
              <div class="grid-item">
                <label>Day</label>
                <input type="text" class="form-input" name="date{{$index}}" value="{{$item->day}}">
                <input id="ongoingID{{$index}}" value="{{$item->id}}" type="hidden">
              </div>
              <div class="grid-item">
                <label>Petty Cash In (RM)</label>
                <input id="cashIn{{$index}}" type="number" class="form-input" name="cash_in_report{{$index}}" value="{{$item->cash_in_report}}">
              </div>
            </div>
            <div class="custom-table">
              <h4>Cash Out report</h4>
              <table class="table-edit" id="siblingsTable{{$index}}">
                <thead class="table-header">
                    <tr>
                        <th>ITEMS</th>
                        <th>OUT (RM)</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($cashOutRow->rows as $row)
                    <tr>
                      <td><input class="form-input" type="text" name="item[]" value="{{$row[0]}}"></td>
                      <td><input class="form-input sumTotalCashEdit{{$index}}" type="number" name="out[]" value="{{$row[1]}}"></td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
            <button class="addRowBtn" type="button" id="addRowBtn{{$index}}"><i class="bi bi-plus-lg"></i> Add Row</button>
            <input type="text" class="totalCash" id="totalCash{{$index}}" placeholder="Total" name="total_cash_out{{$index}}" value="{{$item->total_cash_out}}">
            <input type="text" class="totalCashHidden cashOnHandTotal" id="totalCashHide{{$index}}" name="total_cash_out_num{{$index}}" placeholder="Total" value="{{$item->total_cash_out_num}}">
            </div>
    
            <div class="custom-table">
              <h4>Sales</h4>
              <table class="table-edit" id="siblingsTableSale{{$index}}">
                <thead class="table-header">
                    <tr>
                        <th>ITEMS</th>
                        <th>QUANTITY SOLD</th>
                        <th>RM</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($stockOnHand->rows as $row)
                  <tr>
                    <td><input class="form-input" type="text" name="sale[]" value="{{$row[0]}}"></td>
                    <td><input class="form-input" type="text" name="quantity_sold[]" value="{{$row[1]}}"></td>
                    <td><input class="form-input sumTotalSaleEdit{{$index}}" type="number" name="rm[]" value="{{$row[2]}}"></td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            <button class="addRowBtn" type="button" id="addRowBtnSale{{$index}}"><i class="bi bi-plus-lg"></i> Add Row</button>
            <input type="text" class="totalCash" id="totalSale{{$index}}" placeholder="Total" name="total_sale{{$index}}" value="{{$item->total_sale}}">
            <input type="text" class="totalCashHidden cashOnHandTotal" id="totalSaleHide{{$index}}" name="total_sale_num{{$index}}" placeholder="Total" value="{{$item->total_sale_num}}">
            </div>
            <div class="grid-col-2">
              <div class="grid-item">
                <label>Cash On Hand</label>
                <input id="cashOnHand{{$index}}" type="text" class="form-input" name="cash_on_hand{{$index}}" value="{{$item->cash_on_hand}}">
              </div>    
              <div class="grid-item">
                <label>TNG</label>
                <input id="cashIn" type="text" class="form-input" name="tng{{$index}}" value="{{$item->tng}}">
              </div>
              <div class="grid-item">
                <label>Others</label>
                <input id="cashIn" type="text" class="form-input" name="others{{$index}}" value="{{$item->others}}">
              </div>
            </div>
            <button id="submit-edit-report-btn{{$index}}" class="submit-report-btn" type="button">Submit</button>
          </div>
        </div>
        <script>
          document.addEventListener("DOMContentLoaded", function () {
          let originalCashIn = parseFloat(document.getElementById("cashIn{{$index}}").value) || 0;
          let originalTotalCash = parseFloat(document.getElementById("totalCash{{$index}}").value) || 0;
          let originalTotalSale = parseFloat(document.getElementById("totalSale{{$index}}").value) || 0;
          //Cash Out
          const siblingsTable = document.getElementById("siblingsTable{{$index}}");
          const addRowBtn = document.getElementById("addRowBtn{{$index}}");
          const totalCash = document.getElementById("totalCash{{$index}}");
          const totalCashHide = document.getElementById("totalCashHide{{$index}}");
          const sumTotalCash = document.querySelectorAll(".sumTotalCashEdit{{$index}}");
          const cashIn = document.getElementById("cashIn{{$index}}");
        
          //TotalSale
          const siblingsTableSale = document.getElementById("siblingsTableSale{{$index}}");
          const addRowBtnSale = document.getElementById("addRowBtnSale{{$index}}");
          const totalSale = document.getElementById("totalSale{{$index}}");
          const totalSaleHide = document.getElementById("totalSaleHide{{$index}}");
          const sumTotalSale = document.querySelectorAll(".sumTotalSaleEdit{{$index}}");
        
          //cash on hnd
          const cashOnHand = document.getElementById("cashOnHand{{$index}}")
        
          //Cash Out function
          addRowBtn.addEventListener("click", function () {
              const newRow = siblingsTable.insertRow();
        
              const nameCell = newRow.insertCell();
              const genderCell = newRow.insertCell();
        
              nameCell.innerHTML = '<input class="form-input" type="text" name="item[]">';
              genderCell.innerHTML = '<input class="form-input sumTotalCashEdit{{$index}}" type="number" name="out[]">';
        
              const removeButtonCell = newRow.insertCell();
              const removeButton = document.createElement("button");
              removeButton.textContent = "x";
              removeButton.className = "removeBtn";
              removeButton.addEventListener("click", function () {
                  // Remove the row when the "Remove" button is clicked
                  siblingsTable.deleteRow(newRow.rowIndex);
              });
              removeButtonCell.appendChild(removeButton);
          });
        
          siblingsTable.addEventListener('input', function (event) {
             if (event.target.classList.contains('sumTotalCashEdit{{$index}}')) {
               calculateTotalCashLeftEdit();
             }
           });
        
          //total sale function
          addRowBtnSale.addEventListener("click", function () {
              const newRow = siblingsTableSale.insertRow();
        
              const nameCell = newRow.insertCell();
              const genderCell = newRow.insertCell();
              const rmCell = newRow.insertCell();
        
              nameCell.innerHTML = '<input class="form-input" type="text" name="sale[]">';
              genderCell.innerHTML = '<input class="form-input" type="text" name="quantity_sold[]">';
              rmCell.innerHTML = '<input class="form-input sumTotalSaleEdit{{$index}}" type="number" name="rm[]">';
        
              const removeButtonCell = newRow.insertCell();
              const removeButton = document.createElement("button");
              removeButton.textContent = "x";
              removeButton.className = "removeBtn";
              removeButton.addEventListener("click", function () {
                  // Remove the row when the "Remove" button is clicked
                  siblingsTableSale.deleteRow(newRow.rowIndex);
              });
              removeButtonCell.appendChild(removeButton);
          });
        
          siblingsTableSale.addEventListener('input', function (event) {
             if (event.target.classList.contains('sumTotalSaleEdit{{$index}}')) {
               calculateTotalSaleEdit();
             }
           });
        
            function calculateTotalCashLeftEdit() {
              let totalCashOutput = originalTotalCash;
              const sumTotalCash = document.querySelectorAll(".sumTotalCashEdit{{$index}}");
              sumTotalCash.forEach(input => {
                const quant = parseFloat(input.value) || 0;
                totalCashOutput += quant
              });
              let res = (originalCashIn - totalCashOutput).toFixed(2)
              totalCash.value = "Total left: RM" + res;
              totalCashHide.value = res;
              let cashHide = parseFloat(totalCashHide.value) || 0
              let salehide = parseFloat(totalSaleHide.value) || 0
              cashOnHand.value = (cashHide + salehide).toFixed(2);
            }
        
            function calculateTotalSaleEdit() {
              let totalSaleOutput = 0;
              const sumTotalSale = document.querySelectorAll(".sumTotalSaleEdit{{$index}}");
              sumTotalSale.forEach(input => {
                const quant = parseFloat(input.value) || 0;
                totalSaleOutput += quant
              });
              let res = (totalSaleOutput).toFixed(2)
              totalSale.value = "Total Sales: RM" + res;
              totalSaleHide.value = res;
              let cashHide = parseFloat(totalCashHide.value) || 0
              let salehide = parseFloat(totalSaleHide.value) || 0
              cashOnHand.value = (cashHide + salehide).toFixed(2);
            }
          });  
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const submitButton = document.getElementById("submit-edit-report-btn{{$index}}");
                const idVal = document.getElementById("ongoingID{{$index}}").value;
                const idValReport = document.getElementById("idVal").value;
            
                submitButton.addEventListener("click", function () {
                    // Capture data from the form
                    const formData = new FormData();
            
                    // Capture text inputs
                    formData.append("date", document.querySelector('input[name="date{{$index}}"]').value);
                    formData.append("cash_in_report", document.querySelector('input[name="cash_in_report{{$index}}"]').value);
                    formData.append("total_cash_out", document.querySelector('input[name="total_cash_out{{$index}}"]').value);
                    formData.append("total_cash_out_num", document.querySelector('input[name="total_cash_out_num{{$index}}"]').value);
                    formData.append("total_sale", document.querySelector('input[name="total_sale{{$index}}"]').value);
                    formData.append("total_sale_num", document.querySelector('input[name="total_sale_num{{$index}}"]').value);
                    formData.append("cash_on_hand", document.querySelector('input[name="cash_on_hand{{$index}}"]').value);
                    formData.append("tng", document.querySelector('input[name="tng{{$index}}"]').value);
                    formData.append("others", document.querySelector('input[name="others{{$index}}"]').value);
                    formData.append('_method', 'PUT');

            
                    // Capture table data for Cash Out
                    const cashOutTableData = {
                        headers: ["ITEMS", "OUT (RM)"],
                        rows: []
                    };
            
                    const cashOutTable = document.getElementById("siblingsTable{{$index}}");
                    const cashOutRows = cashOutTable.querySelectorAll("tbody tr");
                    cashOutRows.forEach((row) => {
                        const rowData = row.querySelectorAll("input[type='text'], input[type='number']");
                        cashOutTableData.rows.push(Array.from(rowData).map(input => input.value));
                    });
            
                    // Append Cash Out table data to the form data
                    formData.append("cashOutTableData", JSON.stringify(cashOutTableData));
            
                    // Capture table data for Sales
                    const salesTableData = {
                        headers: ["SALE", "QUANTITY SOLD", "RM"],
                        rows: []
                    };
            
                    const salesTable = document.getElementById("siblingsTableSale{{$index}}");
                    const salesRows = salesTable.querySelectorAll("tbody tr");
                    salesRows.forEach((row) => {
                        const rowData = row.querySelectorAll("input[type='text'], input[type='number']");
                        salesTableData.rows.push(Array.from(rowData).map(input => input.value));
                    });
            
                    // Append Sales table data to the form data
                    formData.append("salesTableData", JSON.stringify(salesTableData));
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
                    // Send the data to the Laravel backend using a fetch request
                    fetch('/dashboard/edit-report/'+idVal+"/"+idValReport, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                        },
                    })
                    .then(response => {
                        if (response.ok) {
                            // Data submitted successfully
                            location.reload();
                            console.log("Data submitted successfully");
                        } else {
                            // Handle errors here
                            console.error("Data submission failed");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });
                });
            });
        </script>
        @endforeach
      </div>

    </div>
   
  </div>
    </div>
  </div>
  <script>
    var accBtn = document.querySelector(".accordion-btn");
    
      accBtn.addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = document.querySelector(".panel-btn");
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });

  var accBtn = document.querySelector(".export-btn");
    
      accBtn.addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = document.querySelector(".pdf-panel");
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
  </script>
<script>
  var acc = document.getElementsByClassName("accordion");
  var i;
  
  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.display === "block") {
        panel.style.display = "none";
      } else {
        panel.style.display = "block";
      }
    });
  }
</script>
<!-- Table cash out report -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
  //Cash Out
  const siblingsTable = document.getElementById("siblingsTable");
  const addRowBtn = document.getElementById("addRowBtn");
  const totalCash = document.getElementById("totalCash");
  const totalCashHide = document.getElementById("totalCashHide");
  const sumTotalCash = document.querySelectorAll(".sumTotalCash");
  const cashIn = document.getElementById("cashIn");

  //TotalSale
  const siblingsTableSale = document.getElementById("siblingsTableSale");
  const addRowBtnSale = document.getElementById("addRowBtnSale");
  const totalSale = document.getElementById("totalSale");
  const totalSaleHide = document.getElementById("totalSaleHide");
  const sumTotalSale = document.querySelectorAll(".sumTotalSale");

  //cash on hnd
  const cashOnHand = document.getElementById("cashOnHand")

  //Cash Out function
  addRowBtn.addEventListener("click", function () {
      const newRow = siblingsTable.insertRow();

      const nameCell = newRow.insertCell();
      const genderCell = newRow.insertCell();

      nameCell.innerHTML = '<input class="form-input" type="text" name="item[]">';
      genderCell.innerHTML = '<input class="form-input sumTotalCash" type="number" name="out[]">';

      const removeButtonCell = newRow.insertCell();
      const removeButton = document.createElement("button");
      removeButton.textContent = "x";
      removeButton.className = "removeBtn";
      removeButton.addEventListener("click", function () {
          // Remove the row when the "Remove" button is clicked
          siblingsTable.deleteRow(newRow.rowIndex);
      });
      removeButtonCell.appendChild(removeButton);
  });

  siblingsTable.addEventListener('input', function (event) {
     if (event.target.classList.contains('sumTotalCash')) {
       calculateTotalCashLeft();
     }
   });

  //total sale function
  addRowBtnSale.addEventListener("click", function () {
      const newRow = siblingsTableSale.insertRow();

      const nameCell = newRow.insertCell();
      const genderCell = newRow.insertCell();
      const rmCell = newRow.insertCell();

      nameCell.innerHTML = '<input class="form-input" type="text" name="sale[]">';
      genderCell.innerHTML = '<input class="form-input" type="text" name="quantity_sold[]">';
      rmCell.innerHTML = '<input class="form-input sumTotalSale" type="number" name="rm[]">';

      const removeButtonCell = newRow.insertCell();
      const removeButton = document.createElement("button");
      removeButton.textContent = "x";
      removeButton.className = "removeBtn";
      removeButton.addEventListener("click", function () {
          // Remove the row when the "Remove" button is clicked
          siblingsTableSale.deleteRow(newRow.rowIndex);
      });
      removeButtonCell.appendChild(removeButton);
  });

  siblingsTableSale.addEventListener('input', function (event) {
     if (event.target.classList.contains('sumTotalSale')) {
       calculateTotalSale();
     }
   });

    function calculateTotalCashLeft() {
      let totalCashOutput = 0;
      const sumTotalCash = document.querySelectorAll(".sumTotalCash");
      sumTotalCash.forEach(input => {
        const quant = parseFloat(input.value) || 0;
        totalCashOutput += quant
      });
      let cashInVal = parseFloat(cashIn.value) || 0;
      let res = (cashInVal - totalCashOutput).toFixed(2)
      totalCash.value = "Total left: RM" + res;
      totalCashHide.value = res;
    }

    function calculateTotalSale() {
      let totalSaleOutput = 0;
      const sumTotalSale = document.querySelectorAll(".sumTotalSale");
      sumTotalSale.forEach(input => {
        const quant = parseFloat(input.value) || 0;
        totalSaleOutput += quant
      });
      let res = (totalSaleOutput).toFixed(2)
      totalSale.value = "Total Sales: RM" + res;
      totalSaleHide.value = res;
      let cashHide = parseFloat(totalCashHide.value) || 0
      let salehide = parseFloat(totalSaleHide.value) || 0
      cashOnHand.value = (cashHide + salehide).toFixed(2);
    }
  });  
</script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const submitButton = document.getElementById("submit-report-btn");
        const idVal = document.getElementById("idVal").value;
    
        submitButton.addEventListener("click", function () {
            // Capture data from the form
            const formData = new FormData();
    
            // Capture text inputs
            formData.append("date", document.querySelector('input[name="date"]').value);
            formData.append("cash_in_report", document.querySelector('input[name="cash_in_report"]').value);
            formData.append("total_cash_out", document.querySelector('input[name="total_cash_out"]').value);
            formData.append("total_cash_out_num", document.querySelector('input[name="total_cash_out_num"]').value);
            formData.append("total_sale", document.querySelector('input[name="total_sale"]').value);
            formData.append("total_sale_num", document.querySelector('input[name="total_sale_num"]').value);
            formData.append("cash_on_hand", document.querySelector('input[name="cash_on_hand"]').value);
            formData.append("tng", document.querySelector('input[name="tng"]').value);
            formData.append("others", document.querySelector('input[name="others"]').value);
    
            // Capture table data for Cash Out
            const cashOutTableData = {
                headers: ["ITEMS", "OUT (RM)"],
                rows: []
            };
    
            const cashOutTable = document.getElementById("siblingsTable");
            const cashOutRows = cashOutTable.querySelectorAll("tbody tr");
            cashOutRows.forEach((row) => {
                const rowData = row.querySelectorAll("input[type='text'], input[type='number']");
                cashOutTableData.rows.push(Array.from(rowData).map(input => input.value));
            });
    
            // Append Cash Out table data to the form data
            formData.append("cashOutTableData", JSON.stringify(cashOutTableData));
    
            // Capture table data for Sales
            const salesTableData = {
                headers: ["SALE", "QUANTITY SOLD", "RM"],
                rows: []
            };
    
            const salesTable = document.getElementById("siblingsTableSale");
            const salesRows = salesTable.querySelectorAll("tbody tr");
            salesRows.forEach((row) => {
                const rowData = row.querySelectorAll("input[type='text'], input[type='number']");
                salesTableData.rows.push(Array.from(rowData).map(input => input.value));
            });
    
            // Append Sales table data to the form data
            formData.append("salesTableData", JSON.stringify(salesTableData));
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
            // Send the data to the Laravel backend using a fetch request
            fetch('/dashboard/submit-report/'+idVal, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
            })
            .then(response => {
                if (response.ok) {
                    // Data submitted successfully
                    location.reload();
                    console.log("Data submitted successfully");
                } else {
                    // Handle errors here
                    console.error("Data submission failed");
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
        });
    });
  </script>
    <script>
      const closeBtns = document.querySelectorAll(".close-edit-report-btn");
      const editBtns = document.querySelectorAll(".edit-report-btn");
      const closeTabs = document.querySelectorAll(".closeTab");
      const editTabs = document.querySelectorAll(".edit");
      
      editBtns.forEach((editBtn, index) => {
          editBtn.addEventListener("click", function () {
              closeBtns[index].classList.remove("hideClose");
              editTabs[index].classList.remove("hideClose");
              closeTabs[index].classList.add("hideClose");
              editBtns[index].classList.add("hideClose");
          });
      });
      
      closeBtns.forEach((closeBtn, index) => {
          closeBtn.addEventListener("click", function () {
              closeBtn.classList.add("hideClose");
              editTabs[index].classList.add("hideClose");
              closeTabs[index].classList.remove("hideClose");
              editBtns[index].classList.remove("hideClose");
          });
      });

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
      function exportToPDF() {
        const contentDiv = document.querySelector('.exportPDFCard');
        contentDiv.s
        
        if (!contentDiv) {
          alert('No content to export.');
          return;
        }
    
        // Convert the content to PDF using html2pdf
       const options = {
         margin: 10,
         filename: 'event_report.pdf',
         image: { type: 'jpeg', quality: 0.98 },
         html2canvas: { scale: 2 },
         jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
         background: 'white', // Set the background color to white
       };
    
        // Convert the content to PDF using html2pdf
        html2pdf().from(contentDiv).set(options).save();
      }
    </script>
    
@endsection