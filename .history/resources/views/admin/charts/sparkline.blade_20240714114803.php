@extends('admin.layouts.index')
@section('content')
    
@endsection

    <div class="container">
        <div class="page-inner">
        <h3 class="fw-bold mb-3">jQuery Sparkline</h3>
        <div class="page-category pe-md-5">
            This jQuery plugin generates sparklines (small inline charts)
            directly in the browser using data supplied either inline in the
            HTML, or via javascript. Please checkout their
            <a
            href="https://omnipotent.net/jquery.sparkline/#s-docs"
            target="_blank"
            >full documentation</a
            >.
        </div>
        <div class="row">
            <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                <div class="card-title">Line Chart</div>
                </div>
                <div class="card-body">
                <div class="d-flex justify-content-center p-3">
                    <div id="lineChart"></div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                <div class="card-title">Bar Chart</div>
                </div>
                <div class="card-body">
                <div class="d-flex justify-content-center p-3">
                    <div id="barChart"></div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                <div class="card-title">Tristate Chart</div>
                </div>
                <div class="card-body">
                <div class="d-flex justify-content-center p-3">
                    <div id="sparktristateChart"></div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                <div class="card-title">Discrete Chart</div>
                </div>
                <div class="card-body">
                <div class="d-flex justify-content-center p-3">
                    <div id="discreteChart"></div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                <div class="card-title">Pie Chart</div>
                </div>
                <div class="card-body">
                <div class="d-flex justify-content-center p-3">
                    <div id="pieChart"></div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

@section('script')
    <script>
      $("#lineChart").sparkline(
        [
          102, 109, 120, 99, 110, 80, 87, 74, 102, 109, 120, 99, 110, 80, 87,
          74,
        ],
        {
          type: "line",
          height: "100",
          width: "250",
          lineWidth: "2",
          lineColor: "#177dff",
          fillColor: "rgba(23, 125, 255, 0.2)",
        }
      );

      $("#barChart").sparkline(
        [
          102, 109, 120, 99, 110, 80, 87, 74, 102, 109, 120, 99, 110, 80, 87,
          74,
        ],
        {
          type: "bar",
          height: "100",
          barWidth: 9,
          barSpacing: 10,
          barColor: "#177dff",
        }
      );

      $("#sparktristateChart").sparkline(
        [1, 1, 0, 1, -1, -1, 1, -1, 0, 0, 1, 1],
        {
          type: "tristate",
          posBarColor: "#35cd3a",
          negBarColor: "#f3545d",
          height: "100",
          barWidth: 9,
          barSpacing: 10,
        }
      );

      $("#discreteChart").sparkline(
        [4, 6, 7, 7, 4, 3, 2, 1, 4, 4, 5, 6, 7, 6, 6, 2, 4, 5],
        {
          type: "discrete",
          lineColor: "#177dff",
          thresholdColor: "#f3545d",
          thresholdValue: 4,
          height: "100",
          width: "150",
        }
      );

      $("#pieChart").sparkline([20, 50, 30], {
        type: "pie",
        height: "100",
      });
    </script>
@endsection
    
