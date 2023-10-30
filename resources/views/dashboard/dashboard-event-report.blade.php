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
           <button class="accordion-btn">
            Add <i class="bi bi-plus-lg"></i>
           </button>
           <button class="export-btn">
            Export to PDF
           </button>
          </div>
        </div>
      </div>
      <div class="panel-btn">
        <p>testing</p>
      </div>
    </div>
    @php
        
    @endphp
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


@endsection