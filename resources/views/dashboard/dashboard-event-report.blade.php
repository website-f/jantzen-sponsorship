@extends('partial.dashboard-main')

@section('title', 'Event Report')
    
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Event Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Event Report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Sponsor Events</h2>
                <div class="card-tools">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddReport">
                    Add +
                  </button>
                  
                  <!-- Modal -->
                  <div class="modal fade" id="AddReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Report</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="grid-col-2">
                            <div class="grid-item">
                              <label>Day</label>
                              <input type="text" class="form-input form-control" name="date"><br>
                            </div>
                            <div class="grid-item">
                              <label>Petty Cash In (RM)</label>
                              <input id="cashIn" type="number" class="form-input form-control" name="cash_in_report"><br>
                            </div>
                          </div>
                          <div style="overflow: auto" class="custom-table">
                            <h4>Cash Out report</h4>
                            <table class="table table-bordered" id="siblingsTable">
                              <thead class="table-header thead-light">
                                  <tr>
                                      <th>ITEMS</th>
                                      <th>OUT (RM)</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td><input class="form-input form-control" type="text" name="item[]"></td>
                                      <td><input class="form-input sumTotalCash form-control" type="number" name="out[]"></td>
                                  </tr>
                              </tbody>
                          </table>
                          <button class="addRowBtn btn btn-primary btn-sm" type="button" id="addRowBtn">+ Add Row</button>
                          <input type="text" class="totalCash" id="totalCash" placeholder="Total" name="total_cash_out">
                          <input type="hidden" class="totalCashHidden cashOnHandTotal" id="totalCashHide" name="total_cash_out_num">
                          </div><br>
                  
                          <div style="overflow: auto" class="custom-table">
                            <h4>Sales</h4>
                            <table class="table table-bordered" id="siblingsTableSale">
                              <thead class="table-header thead-light">
                                  <tr>
                                      <th>ITEMS</th>
                                      <th>QUANTITY SOLD</th>
                                      <th>RM</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td><input class="form-input form-control" type="text" name="sale[]"></td>
                                      <td><input class="form-input form-control" type="text" name="quantity_sold[]"></td>
                                      <td><input class="form-input sumTotalSale form-control" type="number" name="rm[]"></td>
                                  </tr>
                              </tbody>
                          </table>
                          <button class="addRowBtn btn btn-primary btn-sm" type="button" id="addRowBtnSale"><i class="bi bi-plus-lg"></i> Add Row</button>
                          <input type="text" class="totalCash" id="totalSale" placeholder="Total" name="total_sale">
                          <input type="hidden" class="totalCashHidden cashOnHandTotal" id="totalSaleHide" placeholder="Total" name="total_sale_num">
                          </div><br>
                          <div class="grid-col-2">
                            <div class="grid-item">
                              <label>Cash On Hand</label>
                              <input id="cashOnHand" type="text" class="form-input form-control" name="cash_on_hand"><br>
                            </div>    
                            <div class="grid-item">
                              <label>TNG</label>
                              <input id="cashIn" type="text" class="form-input form-control" name="tng"><br>
                            </div>
                            <div class="grid-item">
                              <label>Others</label>
                              <input id="cashIn" type="text" class="form-input form-control" name="others"><br>
                            </div>
                          </div>
                          {{-- <button id="submit-report-btn" class="submit-report-btn" type="button">Submit</button> --}}
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" id="submit-report-btn" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                 
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#PDFDownload">
                    PDF
                  </button>
                  
                  <!-- Modal -->
                  <div class="modal fade" id="PDFDownload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Download PDF</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          ...
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p><b>Event Name: </b>{{$sponsor->event_name}}</p>
                <p><b>Location: </b>{{$sponsor->eventAddress}}</p>
                <p><b>Date: </b>{{$sponsor->from_date}} - {{$sponsor->to_date}}</p>
                <input id="idVal" type="hidden" value="{{$sponsor->id}}">

                @foreach ($ongoing as $index => $item)
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Day {{$item->day}}</h3>
    
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="card-refresh" data-source="/dashboard/event-report/{{$sponsor->id}}" data-source-selector="#card-refresh-content" data-load-on-init="false">
                        <i class="fas fa-sync-alt"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="maximize">
                        <i class="fas fa-expand"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    @php
                      $cashOutRow = json_decode($item->cash_out_report);
                      $stockOnHand = json_decode($item->stock_on_hand);
                    @endphp
                    <p><b>Petty Cash In (RM):</b> {{$item->cash_in_report}}</p>
                    <h3>Cash Out Report</h3>
                    <table class="table table-bordered" id="tableDisplay">
                      @if ($cashOutRow !== null)
                      <thead class="table-header thead-light">
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
                      @endif
                    </table>
                    <p><b>Sum:</b> {{$item->total_cash_out}}</p>
                    <h3>Sales Report</h3>
                    <table id="tableDisplay">
                      @if ($stockOnHand !== null)
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
                      @endif
                    </table>
                    <p><b>Sum:</b> {{$item->total_sale}}</p><br>
                    <p><b>Cash On Hand:</b> RM{{$item->cash_on_hand}}</p>
                    <p><b>TNG:</b> RM{{$item->tng}}</p>
                    <p><b>Others:</b> RM{{$item->others}}</p>
                  </div>
                  <!-- /.card-body -->
                </div>
                @endforeach
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
  
        nameCell.innerHTML = '<input class="form-input form-control" type="text" name="item[]">';
        genderCell.innerHTML = '<input class="form-input sumTotalCash form-control" type="number" name="out[]">';
  
        const removeButtonCell = newRow.insertCell();
        const removeButton = document.createElement("button");
        removeButton.textContent = "x";
        removeButton.className = "removeBtn";
        removeButton.className = "btn";
        removeButton.className = "btn-danger";
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
  
        nameCell.innerHTML = '<input class="form-input form-control" type="text" name="sale[]">';
        genderCell.innerHTML = '<input class="form-input form-control" type="text" name="quantity_sold[]">';
        rmCell.innerHTML = '<input class="form-input sumTotalSale form-control" type="number" name="rm[]">';
  
        const removeButtonCell = newRow.insertCell();
        const removeButton = document.createElement("button");
        removeButton.textContent = "x";
        removeButton.className = "removeBtn";
        removeButton.className = "btn";
        removeButton.className = "btn-danger";
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
@endsection