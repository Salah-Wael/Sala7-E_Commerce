@extends('admin.layouts.index')

@section()
    
@endsection
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-transparent">
                <div class="card-header">
                  <h4 class="card-title text-center">Vector Maps</h4>
                  <p class="card-category text-center">
                    We use the
                    <a
                      href="https://github.com/themustafaomar/jsvectormap"
                      target="_blank"
                      >Jsvectormap</a
                    >
                    plugin to create vector maps.
                  </p>
                </div>
                <div class="card-body">
                  <div class="col-md-10 ms-auto me-auto">
                    <div class="mapcontainer">
                      <div
                        id="world-map"
                        class="w-100"
                        style="height: 450px"
                      ></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


    <script>
      var world_map = new jsVectorMap({
        selector: "#world-map",
        map: "world",
        zoomOnScroll: false,
        regionStyle: {
          hover: {
            fill: "#435ebe",
          },
        },
        markers: [
          {
            name: "Indonesia",
            coords: [-6.229728, 106.6894311],
            style: {
              fill: "#435ebe",
            },
          },
          {
            name: "United States",
            coords: [38.8936708, -77.1546604],
            style: {
              fill: "#28ab55",
            },
          },
          {
            name: "Russia",
            coords: [55.5807481, 36.825129],
            style: {
              fill: "#f3616d",
            },
          },
          {
            name: "China",
            coords: [39.9385466, 116.1172735],
          },
          {
            name: "United Kingdom",
            coords: [51.5285582, -0.2416812],
          },
          {
            name: "India",
            coords: [26.8851417, 75.6504721],
          },
          {
            name: "Australia",
            coords: [-35.2813046, 149.124822],
          },
          {
            name: "Brazil",
            coords: [-22.9140693, -43.5860681],
          },
          {
            name: "Egypt",
            coords: [26.834955, 26.3823725],
          },
        ],
        onRegionTooltipShow(event, tooltip) {
          tooltip.css({ backgroundColor: "#435ebe" });
        },
      });
    </script>
