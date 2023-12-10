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
                                      <td style="padding: 0"><input class="form-input form-control" type="text" name="item[]"></td>
                                      <td style="padding: 0"><input class="form-input sumTotalCash form-control" type="number" name="out[]"></td>
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
                                      <td style="padding: 0"><input class="form-input form-control" type="text" name="sale[]"></td>
                                      <td style="padding: 0"><input class="form-input form-control" type="text" name="quantity_sold[]"></td>
                                      <td style="padding: 0"><input class="form-input sumTotalSale form-control" type="number" name="rm[]"></td>
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
                          <h5 class="modal-title" id="exampleModalLabel">Download PDF <button type="button" class="btn btn-warning" onclick="exportToPDF()">Export</button></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="exportPDFCard">
                            @foreach ($ongoing as $index => $item)
                            <h2 style="text-decoration: underline">Day {{$item->day}}</h2>
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
                                <table class="table table-bordered" id="tableDisplay">
                                  @if ($stockOnHand !== null)
                                  <thead class="table-header thead-light">
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
                                <hr>
                                <br>
                            @endforeach
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-warning" onclick="exportToPDF()">Export</button>
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
                    <!------------- Modal For Edit --------------------------------------->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditReport{{$index}}">
                     Edit
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="EditReport{{$index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Report</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="grid-col-2">
                              <div class="grid-item">
                                <label>Day</label>
                                <input type="text" class="form-input form-control" name="date{{$index}}" value="{{$item->day}}"><br>
                                <input id="ongoingID{{$index}}" value="{{$item->id}}" type="hidden">
                              </div>
                              <div class="grid-item">
                                <label>Petty Cash In (RM)</label>
                                <input id="cashIn{{$index}}" type="number" class="form-input form-control" name="cash_in_report{{$index}}" value="{{$item->cash_in_report}}"><br>
                              </div>
                            </div>
                            <div class="custom-table">
                              <h4>Cash Out report</h4>
                              <table class="table-edit table table-bordered" id="siblingsTable{{$index}}">
                                <thead class="table-header thead-light">
                                    <tr>
                                        <th>ITEMS</th>
                                        <th>OUT (RM)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @if ($cashOutRow !== null)
                                  @foreach ($cashOutRow->rows as $row)
                                  <tr>
                                    <td style="padding: 0"><input class="form-input form-control" type="text" name="item[]" value="{{$row[0]}}"></td>
                                    <td style="padding: 0" ><input class="form-input form-control sumTotalCashEdit{{$index}}" type="number" name="out[]" value="{{$row[1]}}"></td>
                                  </tr>
                                  @endforeach
                                  @else
                                    <tr>
                                      <td style="padding: 0"><input class="form-input form-control" type="text" name="item[]"></td>
                                      <td style="padding: 0"><input class="form-input form-control sumTotalCashEdit{{$index}}" type="number" name="out[]"></td>
                                    </tr>
                                  @endif
                                </tbody>
                              </table>
                            <button class="addRowBtn btn btn-primary btn-sm" type="button" id="addRowBtn{{$index}}"><i class="bi bi-plus-lg"></i> Add Row</button>
                            <input type="text" class="totalCash" id="totalCash{{$index}}" placeholder="Total" name="total_cash_out{{$index}}" value="{{$item->total_cash_out}}">
                            <input type="hidden" class="totalCashHidden cashOnHandTotal" id="totalCashHide{{$index}}" name="total_cash_out_num{{$index}}" placeholder="Total" value="{{$item->total_cash_out_num}}">
                            </div><br>
                    
                            <div class="custom-table">
                              <h4>Sales</h4>
                              <table class="table-edit table table-bordered" id="siblingsTableSale{{$index}}">
                                <thead class="table-header thead-light">
                                    <tr>
                                        <th>ITEMS</th>
                                        <th>QUANTITY SOLD</th>
                                        <th>RM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @if ($stockOnHand !== null)
                                  @foreach ($stockOnHand->rows as $row)
                                  <tr>
                                    <td style="padding: 0"><input class="form-input form-control" type="text" name="sale[]" value="{{$row[0]}}"></td>
                                    <td style="padding: 0"><input class="form-input form-control" type="text" name="quantity_sold[]" value="{{$row[1]}}"></td>
                                    <td style="padding: 0"><input class="form-input form-control sumTotalSaleEdit{{$index}}" type="number" name="rm[]" value="{{$row[2]}}"></td>
                                  </tr>
                                  @endforeach
                                  @else
                                  <tr>
                                    <td style="padding: 0"><input class="form-input form-control" type="text" name="sale[]" ></td>
                                    <td style="padding: 0"><input class="form-input form-control" type="text" name="quantity_sold[]" ></td>
                                    <td style="padding: 0"><input class="form-input form-control sumTotalSaleEdit{{$index}}" type="number" name="rm[]"></td>
                                  </tr>
                                  @endif
                                </tbody>
                            </table>
                            <button class="addRowBtn btn btn-primary btn-sm" type="button" id="addRowBtnSale{{$index}}"><i class="bi bi-plus-lg"></i> Add Row</button>
                            <input type="text" class="totalCash" id="totalSale{{$index}}" placeholder="Total" name="total_sale{{$index}}" value="{{$item->total_sale}}">
                            <input type="hidden" class="totalCashHidden cashOnHandTotal" id="totalSaleHide{{$index}}" name="total_sale_num{{$index}}" placeholder="Total" value="{{$item->total_sale_num}}">
                            </div><br>
                            <div class="grid-col-2">
                              <div class="grid-item">
                                <label>Cash On Hand</label>
                                <input id="cashOnHand{{$index}}" type="text" class="form-input form-control" name="cash_on_hand{{$index}}" value="{{$item->cash_on_hand}}"><br>
                              </div>    
                              <div class="grid-item">
                                <label>TNG</label>
                                <input id="cashIn" type="text" class="form-input form-control" name="tng{{$index}}" value="{{$item->tng}}"><br>
                              </div>
                              <div class="grid-item">
                                <label>Others</label>
                                <input id="cashIn" type="text" class="form-input form-control" name="others{{$index}}" value="{{$item->others}}"><br>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="submit-edit-report-btn{{$index}}" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!------------- Modal For Edit --------------------------------------->
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
                    <table class="table table-bordered" id="tableDisplay">
                      @if ($stockOnHand !== null)
                      <thead class="table-header thead-light">
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

                      nameCell.style.padding = "0";
                      genderCell.style.padding = "0";
                
                      nameCell.innerHTML = '<input class="form-input form-control" type="text" name="item[]">';
                      genderCell.innerHTML = '<input class="form-input form-control sumTotalCashEdit{{$index}}" type="number" name="out[]">';
                
                      const removeButtonCell = newRow.insertCell();
                      const removeButton = document.createElement("button");
                      removeButtonCell.style.padding = "0";
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

                      nameCell.style.padding = "0";
                      genderCell.style.padding = "0";
                      rmCell.style.padding = "0";
                
                      nameCell.innerHTML = '<input class="form-input form-control" type="text" name="sale[]">';
                      genderCell.innerHTML = '<input class="form-input form-control" type="text" name="quantity_sold[]">';
                      rmCell.innerHTML = '<input class="form-input form-control sumTotalSaleEdit{{$index}}" type="number" name="rm[]">';
                
                      const removeButtonCell = newRow.insertCell();
                      const removeButton = document.createElement("button");
                      removeButtonCell.style.padding = "0";
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

        // Add padding to each cell
        nameCell.style.padding = "0";
        genderCell.style.padding = "0";
  
        nameCell.innerHTML = '<input class="form-input form-control" type="text" name="item[]">';
        genderCell.innerHTML = '<input class="form-input sumTotalCash form-control" type="number" name="out[]">';
  
        const removeButtonCell = newRow.insertCell();
        const removeButton = document.createElement("button");
        // Add padding to each cell
        removeButtonCell.style.padding = "0";
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

        // Add padding to each cell
        nameCell.style.padding = "0";
        genderCell.style.padding = "0";
        rmCell.style.padding = "0";
  
        nameCell.innerHTML = '<input class="form-input form-control" type="text" name="sale[]">';
        genderCell.innerHTML = '<input class="form-input form-control" type="text" name="quantity_sold[]">';
        rmCell.innerHTML = '<input class="form-input sumTotalSale form-control" type="number" name="rm[]">';
  
        const removeButtonCell = newRow.insertCell();
        const removeButton = document.createElement("button");
        removeButtonCell.style.padding = "0";
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