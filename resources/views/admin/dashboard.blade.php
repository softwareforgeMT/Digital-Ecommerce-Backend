@extends('admin.layouts.master')
@section('title') Dashboard @endsection
@section('css')

    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">

@endsection
@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Dashboards @endslot
        @slot('title')  @endslot
    @endcomponent


        <div class="row m-3">
            <div class="col">

                <div class="h-100">
                    <div class="row mb-3 pb-1">
                        <div class="col-12">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    
                                    <h4 class="fs-16 mb-1">{{ Helpers::getGreeting() }}, {{ucfirst(Auth::guard('admin')->user()->name) }}!</h4>
                                    <p class="text-muted mb-0">Here's what's happening with  {{$gs->name}} 
                                        today.</p>
                                </div>
                                @if(Auth::guard('admin')->user()->id == 1 || Auth::guard('admin')->user()->sectionCheck('dashboard'))
                                <div class="mt-3 mt-lg-0">                                                                    
                                    <div class="row g-3 mb-0 align-items-center">
                                        <form class="dashboard_date_filter_form" action="{{route('admin.dashboard')}}" method="get">  
                                            <div class="col-sm-auto">
                                                <div class="input-group">
                                                    <input type="text"
                                                        name="custom_date"
                                                        class="form-control border-0 dash-filter-picker  shadow"
                                                        data-provider="flatpickr" data-range-date="true"
                                                        data-date-format="d M, Y"
                                                        data-deafult-date="{{$selectedDates}}"
                                                        value=""

                                                        onchange="submitDashboardFilterForm(this)">
                                                    <div
                                                        class="input-group-text bg-primary border-primary text-white">
                                                        <i class="ri-calendar-2-line"></i>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            @if($previousStartDate)
                                            <p class="mb-0"><small>Compared to previous period ({{$previousStartDate->format('d M, Y')}} to {{$previousEndDate->format('d M, Y')}})</small></p>
                                            @endif
                                        </form>                                            
                                        <!--end col-->
                                        {{-- <div class="col-auto">
                                            <div>
                                                <button data-value="all" class="btn btn-soft-secondary btn-sm autoFilters">All</button>
                                                <button data-value="1M" class="btn btn-soft-secondary btn-sm autoFilters">1M</button>
                                                <button data-value="6M" class="btn btn-soft-secondary btn-sm autoFilters">6M</button>
                                                <button data-value="1Y" class="btn btn-soft-primary btn-sm autoFilters">1Y</button>
                                            </div>
                                        </div> --}}
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                @endif
                            </div><!-- end card header -->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    @if(Auth::guard('admin')->user()->id == 1 || Auth::guard('admin')->user()->sectionCheck('dashboard')) 
                        <!-- Sales card -->
                        <div class="row">
                           @include('admin.analytics.sales_card')
                        </div> <!-- Sales card -->

                        <div class="row">
                            <div class="col-xl-8">
                                @include('admin.analytics.sales_chart')

                                 @include('admin.analytics.top_sellings')
                            </div><!-- end col -->

                            <div class="col-xl-4">
                                 {{-- @include('admin.analytics.sales_by_programme') --}}

                                 @include('admin.analytics.sales_by_coupon')
                            </div><!-- end col -->
                        </div>
                    @endif

                </div> <!-- end .h-100-->

            </div> <!-- end col -->

          
        </div>



@endsection
@section('script')
    <!-- apexcharts -->
    {{-- <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.js') }}"></script> --}}
    {{-- <script src="{{ URL::asset('assets/libs/jsvectormap//world-merc.js') }}"></script> --}}

    <!-- dashboard init -->
    {{-- <script src="{{ URL::asset('/assets/js/pages/dashboard-analytics.init.js') }}"></script> --}}

<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
{{-- <script src="{{ URL::asset('assets/libs/swiper/swiper.min.js')}}"></script> --}}
<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
{{-- <script src="{{ URL::asset('/assets/js/pages/dashboard-analytics.init.js') }}"></script> --}}
{{-- <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script> --}}

<script type='text/javascript' src="{{ URL::asset('assets/libs/choices.js/choices.js.min.js')}}"></script>
<script type='text/javascript' src="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script type='text/javascript' src="{{ URL::asset('assets/js/seperateplugins.min.js')}}"></script>

<script>
    // function submitDashboardFilterForm() {
    //     document.getElementById('dashboard_date_filter_form').submit();
    // }
    function submitDashboardFilterForm(element) {
        const calendarInstance = element._flatpickr;
        calendarInstance.config.onClose.push(() => {
            const selectedDates = element.value.split(" to ");
            const startDate = selectedDates[0].trim();
            const endDate = selectedDates[1].trim();

            if (startDate && endDate) {
               // Remove the input element if it exists
               $('.dashboard_date_filter_form input[name="auto_date"]').remove();
               $('.dashboard_date_filter_form').submit();
            }
        });
    }


    $(document).ready(function() {
      $('.autoFilters').click(function() {
        var value = $(this).data('value');
        var startDate, endDate;
        var currentDate = new Date();


        if (value === 'all') {
            // Create and add the input element to the form
            var input = $('<input>').attr('type', 'hidden').attr('name', 'auto_date').val('all');
            $('.dashboard_date_filter_form').append(input);
            // Empty the flatpicker
            $('.dashboard_date_filter_form input[name="custom_date"]').val('');
        } else {
            // Remove the input element if it exists
            $('.dashboard_date_filter_form input[name="auto_date"]').remove();
           switch (value) {
            case '1M':
              startDate = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1, currentDate.getDate());
              endDate = currentDate;
              break;
            case '6M':
              startDate = new Date(currentDate.getFullYear(), currentDate.getMonth() - 6, currentDate.getDate());
              endDate = currentDate;
              break;
            case '1Y':
              startDate = new Date(currentDate.getFullYear() - 1, currentDate.getMonth(), currentDate.getDate());
              endDate = currentDate;
              break;
            default:
              startDate = new Date(currentDate.getFullYear() - 100, 0, 1);
              endDate = currentDate;
          }
            console.log(startDate);
            var dateInput = $('.dashboard_date_filter_form input[name="custom_date"]');
            var flatpickrInstance = dateInput[0]._flatpickr;
            flatpickrInstance.setDate([startDate, endDate]);
        }
        
        $('.dashboard_date_filter_form').submit();

      });
    });



    // $(document).ready(function() {
    //     $('.autoFilters').click(function() {
    //         var value = $(this).data('value');
    //         $('.dashboard_date_filter_form input[name="auto_date"]').val(value);
    //         $('.dashboard_date_filter_form input[name="custom_date"]').val('');
    //         $('.dashboard_date_filter_form').submit();
    //     });
    // });
</script>


<script>
var chartElement = document.querySelector("#customer_impression_charts_1");
if (chartElement) {
  var chartData = {
    series: [
      {
        name: "Orders",
        type: "area",
         // data: [34, 65, 46, 68, 49, 61, 42, 44, 78, 52, 63, 67]
        // data: [4, 5, 3, 7, 3, 1, 2, 4, 7, 5, 3, 1]
        data: [
          @foreach ($salesGraphData as $data)
            {{ $data->ordersCount }},
          @endforeach
        ]
      },
      {
        name: "Sales",
        type: "bar",
        // data: [89.25, 98.58, 68.74, 108.87, 77.54, 84.03, 51.24, 28.57, 92.57, 42.36, 88.51, 36.57]
        data: [
          @foreach ($salesGraphData as $data)
            {{ $data->salesAmount }},
          @endforeach
        ]
      }
    ],
    chart: {
      height: 370,
      type: "line",
      toolbar: {
        show: false
      }
    },
    stroke: {
      curve: "straight",
      dashArray: [0, 0, 8],
      width: [2, 0, 2.2]
    },
    fill: {
      opacity: [0.1, 0.9, 1]
    },
    markers: {
      size: [0, 0, 0],
      strokeWidth: 2,
      hover: {
        size: 4
      }
    },
    xaxis: {
      categories: [
        @foreach ($salesGraphData as $data)
          "{{ $data->date }}",
        @endforeach
      ],
        // categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      axisTicks: {
        show: false
      },
      axisBorder: {
        show: false
      }
    },
    grid: {
      show: true,
      xaxis: {
        lines: {
          show: true
        }
      },
      yaxis: {
        lines: {
          show: false
        }
      },
      padding: {
        top: 0,
        right: -2,
        bottom: 15,
        left: 10
      }
    },
    legend: {
      show: true,
      horizontalAlign: "center",
      offsetX: 0,
      offsetY: -5,
      markers: {
        width: 9,
        height: 9,
        radius: 6
      },
      itemMargin: {
        horizontal: 10,
        vertical: 0
      }
    },
    plotOptions: {
      bar: {
        columnWidth: "30%",
        barHeight: "70%"
      }
    },
    colors: ["#28c76f", "#7367f0"],
    tooltip: {
      shared: true,
      y: [
        {
          formatter: function (val) {
            return val !== undefined ? val.toFixed(0) : val;
          }
        },
        {
          formatter: function (val) {
            return val !== undefined ? "$" + (val.toFixed(2)) : val;
          }
        }
      ]
    }
  };

  var chart = new ApexCharts(chartElement, chartData);
  chart.render();
}

// User by devices
// var dountchartUserDeviceColors = getChartColorsArray("user_device_pie_charts");

// var options = {
//   series: [200, 80],
//   labels: ["Internship", "Graduate"],
//   chart: {
//     type: "donut",
//     height: 219,
//   },
//   plotOptions: {
//     pie: {
//       size: 50,
//       donut: {
//         size: "85%",
//         labels: {
//           show: true,
//           total: {
//             show: true,
//             label: "Total customers",
//             fontSize: "16px",
//             fontFamily: "Arial",
//             fontWeight: 600,
//             color: "#000",
//           },
//            value: {
//                 show: true,
//                 fontSize: "20px",
//                 color: "#343a40",
//                  fontSize: "18px",
//                 fontWeight: 800,
//             },
//         },
//       },
//     },
//   },
//   legend: {
//     show: false,
//   },
//   dataLabels: {
//             enabled: false,
//         },
//   colors: ["#1abc9c", "#3498db"],
// };

// var chart = new ApexCharts(
//   document.querySelector("#user_preferences_pie_charts"),
//   options
// );
// chart.render();


// var options2 = {
//   series: [200, 80],
//   labels: ["Coupon", "Without Coupon"],
//   chart: {
//     type: "donut",
//     height: 219,
//   },
//   plotOptions: {
//     pie: {
//       size: 50,
//       donut: {
//         size: "85%",
//         labels: {
//           show: true,
//           total: {
//             show: true,
//             label: "Total Orders",
//             fontSize: "16px",
//             fontFamily: "Arial",
//             fontWeight: 600,
//             color: "#000",
//           },
//            value: {
//                 show: true,
//                 fontSize: "20px",
//                 color: "#343a40",
//                  fontSize: "18px",
//                 fontWeight: 800,
//             },
//         },
//       },
//     },
//   },
//   legend: {
//     show: false,
//   },
//   dataLabels: {
//             enabled: false,
//         },
//   colors: ["#1abc9c", "#3498db"],
// };

// var chart = new ApexCharts(
//   document.querySelector("#sales_by_coupon_pie_charts"),
//   options
// );
// chart.render();



document.querySelectorAll('.apex-charts-dashboard').forEach(function(chartContainer) {
  var series = JSON.parse(chartContainer.dataset.series);
  var labels = JSON.parse(chartContainer.dataset.labels);
  var totalLabel = chartContainer.dataset.totalLabel;

  var options = {
    series: series,
    labels: labels,
    chart: {
      type: "donut",
      height: 219,
    },
    plotOptions: {
      pie: {
        size: 50,
        donut: {
          size: "85%",
          labels: {
            show: true,
            total: {
              show: true,
              label: totalLabel,
              fontSize: "16px",
              fontFamily: "Arial",
              fontWeight: 600,
              color: "#000",
            },
            value: {
              show: true,
              fontSize: "20px",
              color: "#343a40",
              fontWeight: 800,
            },
          },
        },
      },
    },
    legend: {
      show: false,
    },
    dataLabels: {
      enabled: false,
    },
    colors: ["#1abc9c", "#3498db"],
  };

  var chart = new ApexCharts(chartContainer, options);
  chart.render();
});


</script>

@endsection
