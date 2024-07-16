@extends('admin.layouts.index')
@section('content')
    
@endsection

    

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
    
