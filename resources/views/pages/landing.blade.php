@extends('layouts.appl')

@section('title')
viho - Premium Admin Template
@endsection

@section('conten')
<br>
<div class="container-fluid dashboard-default-sec">
  <div class="row">
    <div class="col-xl-5 box-col-12 des-xl-100"> 
      <div class="row">
        <div class="col-xl-12 col-md-6 box-col-6 des-xl-50">
          <div class="card profile-greeting">
            <div class="card-header">
              <div class="header-top">
              </div>
            </div>
            <div class="card-body text-center p-t-0">
              <h3 class="font-light">Wellcome Back, John!!</h3>
              <p>Welcome to the viho Family! we are glad that you are visite this dashboard. we will be happy to help you grow your business.</p>
              <a href="{{ route('dashaboard') }}"class="btn btn-light">Dashboard</a>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
          <div class="card income-card card-primary">                                 
            <div class="card-body text-center">                                  
              <div class="round-box">
                <i class="fa-solid fa-money-bill-transfer"></i>
                <i class="fa fa-money"></i>
              </div>
              <h5 id="sum1" class="counter"></h5> {{-- sini 8,50,49 --}}
              <p>Our Annual Income</p><a class="btn-arrow arrow-primary" href="javascript:void(0)"><i class="toprightarrow-primary fa fa-arrow-up me-2"></i>95.54% </a>
              <div class="parrten">
                <i class="fa fa-money"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
          <div class="card income-card card-secondary">                                    
            <div class="card-body text-center">
              <div class="round-box">
                <i class="fa fa-money"></i>
              </div>
              <h5 id="sum2" class="counter"></h5>{{-- sini --}}
              <p>our Annual losses</p><a class="btn-arrow arrow-secondary" href="javascript:void(0)"><i class="toprightarrow-secondary fa fa-arrow-up me-2"></i>90.54% </a>
              <div class="parrten">
                <i class="fa fa-money"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
            
            <div class="col-xl-7 box-col-12 des-xl-50 dashboard-sec">
              <div class="card income-card">
                <div class="card-header pb-0">
                  <div class="header-top d-sm-flex align-items-center">
                    <h5>Sales overview</h5>
                    <div class="center-content">
                      <p class="d-sm-flex align-items-center"><span class="font-primary m-r-10 f-w-700" id="1sum"></span><i class="toprightarrow-primary fa fa-arrow-up m-r-10"></i>86% More than last year</p>
                    </div>
                    <div class="setting-list">
                      <ul class="list-unstyled setting-option">
                        <li>
                          <div class="setting-primary"><i class="icon-settings"></i></div>
                        </li>
                        <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                        <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                        <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                        <li><i class="icofont icofont-error close-card font-primary"></i></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <canvas id="myBarGraph"></canvas>
                </div>
                </div>
              </div>
            </div>
    
    <div class="col-xl-12 box-col-16 des-xl-500">
      <div class="row">
        
        <div class="col-xl-6 col-100 box-col-6 des-xl-100">
          <div class="card latest-update-sec">
            <div class="card-header">
              <div class="header-top d-sm-flex align-items-center">
                <h5>APBD 2017 s/d 2022</h5>
                <div class="center-content">
                </div>
                <div class="setting-list">
                  <ul class="list-unstyled setting-option">
                    <li>
                      <div class="setting-primary"><i class="icon-settings"></i></div>
                    </li>
                    <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                    <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                    <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                    <li><i class="icofont icofont-error close-card font-primary">                                </i></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="card-body p-0">
                    <div id="apbd-chart"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-6 col-100 box-col-6 des-xl-100">
          <div class="card latest-update-sec">
            <div class="card-header">
              <div class="header-top d-sm-flex align-items-center">
                <h5>APBD 2017 s/d 2022</h5>
                <div class="center-content">
                </div>
                <div class="setting-list">
                  <ul class="list-unstyled setting-option">
                    <li>
                      <div class="setting-primary"><i class="icon-settings"></i></div>
                    </li>
                    <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                    <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                    <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                    <li><i class="icofont icofont-error close-card font-primary">                                </i></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="card-body p-0">
                    <div id="apbd-chart2"></div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xl-6 col-100 box-col-6 des-xl-100">
          <div class="card latest-update-sec">
            <div class="card-header">
              <div class="header-top d-sm-flex align-items-center">
                <h5>Target & Realisasi Pendapatan Tahun (2022) </h5>
                <div class="center-content">
                </div>
                <div class="setting-list">
                  <ul class="list-unstyled setting-option">
                    <li>
                      <div class="setting-primary"><i class="icon-settings"></i></div>
                    </li>
                    <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                    <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                    <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                    <li><i class="icofont icofont-error close-card font-primary">                                </i></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="card-body p-0">
                    <div id="TRPT"></div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xl-6 col-100 box-col-6 des-xl-100">
          <div class="card latest-update-sec">
            <div class="card-header">
              <div class="header-top d-sm-flex align-items-center">
                <h5>Target & Realisasi Belanja Tahun (2022) </h5>
                <div class="center-content">
                </div>
                <div class="setting-list">
                  <ul class="list-unstyled setting-option">
                    <li>
                      <div class="setting-primary"><i class="icon-settings"></i></div>
                    </li>
                    <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                    <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                    <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                    <li><i class="icofont icofont-error close-card font-primary">                                </i></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="card-body p-0">
                    <div id="TRBT"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        

        
        
      </div>
    </div>

    
  </div>
</div>
@endsection

@push('after-script')
    <script src="{{ url('/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ url('/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ url('/assets/js/chart/apex-chart/chart-custom.js') }}"></script>

<script>

let dollarUS = Intl.NumberFormat("en-US", {
    style: "currency",
    currency: "IDR",
});

function loadSum1(){
  $.ajax({
      url :'/sum1',
      type : 'GET',
      dataType : 'json',
      success : function(data){
        // console.log(data);
        $('#sum1').append(dollarUS.format(data));
        $('#1sum').append(dollarUS.format(data));
        document.getElementById("sum1").innerHTML = (dollarUS.format(data));
        document.getElementById("1sum").innerHTML = (dollarUS.format(data));
      },
  })
}

function loadSum2(){
  $.ajax({
      url :'/sum2',
      type : 'GET',
      dataType : 'json',
      success : function(data){
        // console.log(data);
        document.getElementById("sum2").innerHTML = (dollarUS.format(data));
      },
  })
}


function loadDataChart(){
  $.ajax({
      url :'/datachart',
      type : 'GET',
      dataType : 'json',
      success : function(data){
        
      var datachart =[]
        for(let i = 0; i<data.length; i++){
          datachart.push(data[i])
        }
        Chart.defaults.global = {
          animation: true,
          // animationSteps: 60,
          animationEasing: "easeOutIn",
          showScale: true,
          scaleOverride: false,
          scaleSteps: null,
          scaleStepWidth: null,
          scaleStartValue: null,
          scaleLineColor: "#eeeeee",
          scaleLineWidth: 1,
          scaleShowLabels: true,
          scaleLabel: "<%=value%>",
          scaleIntegersOnly: true,
          scaleBeginAtZero: false,
          scaleFontSize: 12,
          scaleFontStyle: "normal",
          scaleFontColor: "#717171",
          responsive: true,
          maintainAspectRatio: true,
          showTooltips: true,
          multiTooltipTemplate: "<%= value %>",
          tooltipFillColor: "#333333",
          tooltipEvents: ["mousemove", "touchstart", "touchmove"],
          tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
          tooltipFontSize: 14,
          tooltipFontStyle: "normal",
          tooltipFontColor: "#fff",
          tooltipTitleFontSize: 16,
          TitleFontStyle : "Raleway",
          tooltipTitleFontStyle: "bold",
          tooltipTitleFontColor: "#ffffff",
          tooltipYPadding: 10,
          tooltipXPadding: 10,
          tooltipCaretSize: 8,
          tooltipCornerRadius: 6,
          tooltipXOffset: 5,
          onAnimationProgress: function() {},
          onAnimationComplete: function() {}
      };
      var barData = {
                      labels: ["January", "February", "March", "April", "May", "June", "July","Agustus","September","Oktober","November","Desember"],
                      datasets: [
                        {
                          label: "My First dataset",
                          fillColor: "rgba(36, 105, 92, 0.4)",
                          strokeColor: vihoAdminConfig.primary,
                          highlightFill: "rgba(36, 105, 92, 0.6)",
                          highlightStroke: vihoAdminConfig.primary,
                          data: datachart
                        }, 
                      ]
      };

      var barOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,0.1)",
        scaleGridLineWidth: 1,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: true,
        barShowStroke: true,
        barStrokeWidth: 2,
        barValueSpacing: 5,
        barDatasetSpacing: 1,
      };
      var barCtx = document.getElementById("myBarGraph").getContext("2d");
      var myBarChart = new Chart(barCtx).Bar(barData, barOptions);
      },
  })
}


var columnChart = {
    chart: {
        height:350,
        type: 'bar',
        toolbar:{
          show: false
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            endingShape: 'rounded',
            columnWidth: '55%',
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    series: [{
        name: 'Net Profit',
        data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }, {
        name: 'Revenue',
        data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
    }, {
        name: 'Free Cash Flow',
        data: [35, 41, 36, 26, 45, 48, 52, 53, 120]
    }],
    xaxis: {
        categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
    },
    yaxis: {
        title: {
            text: 'Rp. '
        }
    },
    fill: {
        opacity: 1

    },
    tooltip: {
        y: {
            formatter: function (val) {
                return "Rp. " + val + ""
            }
        }
    },
    colors:[vihoAdminConfig.primary, vihoAdminConfig.secondary, '#222222']
}

var apbd = new ApexCharts(
    document.querySelector("#apbd-chart"),
    columnChart
);

apbd.render();

var columnChart2 = {
    chart: {
        height:350,
        type: 'bar',
        toolbar:{
          show: false
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            endingShape: 'rounded',
            columnWidth: '55%',
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    series: [{
        name: 'Net Profit',
        data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }, {
        name: 'Revenue',
        data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
    }, {
        name: 'Free Cash Flow',
        data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
    }],
    xaxis: {
        categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
    },
    yaxis: {
        title: {
            text: 'Rp. '
        }
    },
    fill: {
        opacity: 1

    },
    tooltip: {
        y: {
            formatter: function (val) {
                return "Rp. " + val + ""
            }
        }
    },
    colors:[vihoAdminConfig.primary, vihoAdminConfig.secondary, '#222222']
}

var apbd2 = new ApexCharts(
    document.querySelector("#apbd-chart2"),
    columnChart2
);

apbd2.render();

var columnChart3 = {
    chart: {
        height:350,
        type: 'bar',
        toolbar:{
          show: false
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            endingShape: 'rounded',
            columnWidth: '55%',
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    series: [{
        name: 'Net Profit',
        data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }, {
        name: 'Revenue',
        data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
    }, {
        name: 'Free Cash Flow',
        data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
    }],
    xaxis: {
        categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
    },
    yaxis: {
        title: {
            text: 'Rp. '
        }
    },
    fill: {
        opacity: 1

    },
    tooltip: {
        y: {
            formatter: function (val) {
                return "Rp. " + val + ""
            }
        }
    },
    colors:[vihoAdminConfig.primary, vihoAdminConfig.secondary, '#222222']
}

var trp = new ApexCharts(
    document.querySelector("#TRPT"),
    columnChart3
);

trp.render();

var columnChart4 = {
    chart: {
        height:350,
        type: 'bar',
        toolbar:{
          show: false
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            endingShape: 'rounded',
            columnWidth: '55%',
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    series: [{
        name: 'Net Profit',
        data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }, {
        name: 'Revenue',
        data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
    }, {
        name: 'Free Cash Flow',
        data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
    }],
    xaxis: {
        categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
    },
    yaxis: {
        title: {
            text: 'Rp. '
        }
    },
    fill: {
        opacity: 1

    },
    tooltip: {
        y: {
            formatter: function (val) {
                return "Rp. " + val + ""
            }
        }
    },
    colors:[vihoAdminConfig.primary, vihoAdminConfig.secondary, '#222222']
}

var trb = new ApexCharts(
    document.querySelector("#TRBT"),
    columnChart4
);

trb.render();

loadSum1();
loadSum2();
loadDataChart();
setInterval(() => {
  loadSum1();
  loadSum2();
  loadDataChart();
}, 5000);
 
// var tes = document.getElementById("sum1")
// tes.append("10")
// $('#sum1').append(10)
</script>
@endpush