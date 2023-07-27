@extends('layouts.page') @section('content') 
  <div class="container-fluid" data-layout="container"> 
    <div class="mb-3 card" style="background:#111d2c">
      <div class="bg-holder bg-card" style="background-image: url(&quot;/assets/img/illustrations/corner-4.png&quot;); border-top-right-radius: 0.375rem; border-bottom-right-radius: 0.375rem;"></div>
      <div class="position-relative card-body">
        <div class="row">
          <div class="col-lg-8">
            <h3 class="mb-0" style="color:#d2dde9;">Analysis Reports</h3>
          </div>
        </div>
      </div>
    </div>
  <div>
      <script src="https://artsmart.ai/assets/js/flatpickr.js"></script>
      <script src="https://artsmart.ai/assets/js/rangePlugin.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.43/moment-timezone-with-data.min.js"></script>
      <script src="https://artsmart.ai/vendors/echarts/echarts.min.js"></script>
      <script src="https://artsmart.ai/vendors/chart/chart.min.js"></script>
      <script src="https://artsmart.ai/vendors/dayjs/dayjs.min.js"></script>
      <script type="text/javascript" src="https://artsmart.ai/assets/js/utils.js?v=21072301"></script>
      <script type="text/javascript" src="https://artsmart.ai/assets/js/graph2.js?v=21072301"></script>
  @include('pages.report.graph_model') 
  @include('pages.report.graph_feature') 
  @include('pages.report.error_graph') 
  @include('pages.report.error_log') 
  @endsection