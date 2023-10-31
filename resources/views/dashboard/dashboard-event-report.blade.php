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
           <button class="export-btn">
            Export to PDF
           </button>
          </div>
        </div>
        <div class="">
          <p class="event-report-title"><b>Event Name: </b>{{$sponsor->event_name}}</p>
          <p class="event-report-title"><b>Location: </b>{{$sponsor->eventAddress}}</p>
          <p class="event-report-title"><b>Date: </b>{{$sponsor->from_date}} - {{$sponsor->to_date}}</p>
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
        <input type="hidden" class="totalCashHidden cashOnHandTotal" id="totalCashHide" placeholder="Total">
        <script>
        document.addEventListener("DOMContentLoaded", function () {
        const siblingsTable = document.getElementById("siblingsTable");
        const addRowBtn = document.getElementById("addRowBtn");
        const totalCash = document.getElementById("totalCash");
        const totalCashHide = document.getElementById("totalCashHide");
        const sumTotalCash = document.querySelectorAll(".sumTotalCash");
        const cashIn = document.getElementById("cashIn");
    
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
        });  
        </script>
        </div>

        <div class="custom-table">
          <h4>Sales</h4>
          <table id="siblingsTableSale">
            <thead class="table-header">
                <tr>
                    <th>SALE</th>
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
        <input type="hidden" class="totalCashHidden cashOnHandTotal
        " id="totalSaleHide" placeholder="Total">
        <script>
        document.addEventListener("DOMContentLoaded", function () {
        const siblingsTableSale = document.getElementById("siblingsTableSale");
        const addRowBtnSale = document.getElementById("addRowBtnSale");
        const totalSale = document.getElementById("totalSale");
        const totalSaleHide = document.getElementById("totalSaleHide");
        const sumTotalSale = document.querySelectorAll(".sumTotalSale");
        const cashIn = document.getElementById("cashIn");
    
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
          }
        });  
        </script>
        </div>
        <div class="grid-col-2">
          <div class="grid-item">
            <label>Cash On Hand</label>
            <input id="cashOnHand" type="text" class="form-input" name="cash_on_hand">
          </div>
          <script>
              const cashOnHand = document.getElementById("cashOnHand");
                
          </script>
          <div class="grid-item">
            <label>TNG</label>
            <input id="cashIn" type="text" class="form-input" name="tng">
          </div>
          <div class="grid-item">
            <label>Others</label>
            <input id="cashIn" type="text" class="form-input" name="others">
          </div>
        </div>
      </div>
      <div class="dayLists">
        @foreach ($ongoing as $item)
        <button class="accordion">{{$item->day}}</button>
        <div class="panel">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
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

@endsection