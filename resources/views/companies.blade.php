@extends('layouts.master')

@section('title')

Companies

@endsection

@section('css')

@endsection

@section('content')

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Companies info table -->
        <div class="dataTable-container table-responsive text-nowrap">
          <table class="table datatable dataTable-table table-hover table-striped">
            <thead>
              <tr>
                <th scope="col" data-sortable="">
                  <a href="#" class="dataTable-sorter">#</a>
                </th>
                <th scope="col" data-sortable="">
                  <a href="#" class="dataTable-sorter">Name</a>
                </th>
                <th scope="col" data-sortable="">
                  <a href="#" class="dataTable-sorter">User Name</a>
                </th>
                <th scope="col" data-sortable="">
                  <a href="#" class="dataTable-sorter">Email</a>
                </th>
                <th scope="col" data-sortable="">
                  <a href="#" class="dataTable-sorter">Package Details</a>
                </th>
                <th scope="col" data-sortable="">
                  <a href="#" class="dataTable-sorter">Start Date</a>
                </th>
                <th scope="col" data-sortable="">
                  <a href="#" class="dataTable-sorter">Delivery Staff</a>
                </th>
                <th scope="col" data-sortable="">
                  <a href="#" class="dataTable-sorter">Adress</a>
                </th>
                <th scope="col" data-sortable="">
                  <a href="#" class="dataTable-sorter">Orders</a>
                </th>
                <th scope="col" data-sortable="">
                  <a href="#" class="dataTable-sorter">Waiting</a>
                </th>
                <th scope="col" data-sortable="">
                  <a href="#" class="dataTable-sorter">Done</a>
                </th>
                <th scope="col" data-sortable="">
                  <a href="#" class="dataTable-sorter">On Delivering</a>
                </th>
               
              </tr>
            </thead>
            <tbody>
              @foreach ($companies as $comp)
              <tr>
                <th scope="row">{{ $comp['id'] }}</th>
                <td>{{ $comp['name'] }}</td>
                <td>{{ $comp['userName'] }}</td>
                <td>{{ $comp['email'] }}</td>
                <td>details</td>
                <td>{{ $comp['created_at'] }}</td>
                <td>20</td>
                <td>{{ $comp['city'] }} {{ $comp['street'] }}</td>
                <td>213</td>
                <td>3</td>
                <td>200</td>
                <td>10</td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!-- End companies info table -->

        <!-- Reports -->
        <div class="col-12">
          <div class="card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Companies <span>/Today</span></h5>

              <!-- Line Chart -->
              <div id="reportsChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#reportsChart"), {
                    series: [{
                      name: 'Package1',
                      data: [31, 40, 28, 51, 42, 82, 56],
                    }, {
                      name: 'Package1',
                      data: [11, 32, 45, 32, 34, 52, 41]
                    }, {
                      name: 'Package1',
                      data: [15, 11, 32, 18, 9, 24, 11]
                    }],
                    chart: {
                      height: 350,
                      type: 'area',
                      toolbar: {
                        show: false
                      },
                    },
                    markers: {
                      size: 4
                    },
                    colors: ['#4154f1', '#2eca6a', '#ff771d'],
                    fill: {
                      type: "gradient",
                      gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.4,
                        stops: [0, 90, 100]
                      }
                    },
                    dataLabels: {
                      enabled: false
                    },
                    stroke: {
                      curve: 'smooth',
                      width: 2
                    },
                    xaxis: {
                      type: 'datetime',
                      categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                    },
                    tooltip: {
                      x: {
                        format: 'dd/MM/yy HH:mm'
                      },
                    }
                  }).render();
                });
              </script>
              <!-- End Line Chart -->

            </div>

          </div>

          <!-- Budget Report -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Budget Report <span>| This Month</span></h5>

              <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                    legend: {
                      data: ['Allocated Budget', 'Actual Spending']
                    },
                    radar: {
                      // shape: 'circle',
                      indicator: [{
                          name: 'Sales',
                          max: 6500
                        },
                        {
                          name: 'Administration',
                          max: 16000
                        },
                        {
                          name: 'Information Technology',
                          max: 30000
                        },
                        {
                          name: 'Customer Support',
                          max: 38000
                        },
                        {
                          name: 'Development',
                          max: 52000
                        },
                        {
                          name: 'Marketing',
                          max: 25000
                        }
                      ]
                    },
                    series: [{
                      name: 'Budget vs spending',
                      type: 'radar',
                      data: [{
                          value: [4200, 3000, 20000, 35000, 50000, 18000],
                          name: 'Allocated Budget'
                        },
                        {
                          value: [5000, 14000, 28000, 26000, 42000, 21000],
                          name: 'Actual Spending'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Budget Report -->
        </div><!-- End Reports -->

      </div>
    </div><!-- End Left side columns -->

  </div>
</section>

@endsection

@section('script')

@endsection
