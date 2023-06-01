@extends('layouts.master')

@section('title', 'Dashboard')

@push('css')
  <style>
    .va-mid{
      vertical-align: middle!important;
    }
  </style>
@endpush

@section('content')
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-primary card-outline">
            <div class="card-body pt-2">
              <div class="row">
                <div class="col-lg-12">
                  <p class="mt-1 mb-3">Sistem info: {{$now}}</p>
                </div>
                
                <div class="col-lg-4">
                  <div class="info-box" data-toggle="tooltip">
                    <span class="info-box-icon bg-blue"><i class="fa fa-arrow-circle-down"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Pemasukan Hari Ini</span>
                      <span class="info-box-number"><small>Rp</small> {{ format_uang($bkm) }}</span>
                      <span class="info-box-text"><small>Bulan Ini</small></span>
                      <span class="info-box-number"><small>Rp</small> {{ format_uang($bkm_month) }}</span>
                      <input type="hidden" id="pemasukan_bln_ini" value="252000">
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-arrow-circle-up"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Pengeluaran hari ini</span>
                      <span class="info-box-number"><span data-toggle="tooltip"><small>Rp</small>{{ format_uang($bkk) }}</span> 
                      <span class="info-box-text"><small>Bulan Ini</small></span>
                      <span class="info-box-number">
                        <span data-toggle="tooltip" title="" data-original-title="Total Pengeluaran dalam satu bulan."><small>Rp</small>{{ format_uang($bkk_month) }}</span>
                      </span>
                      <input type="hidden" id="pengeluaran_bln_ini" value="0">
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="info-box" data-toggle="tooltip">
                    <span class="info-box-icon bg-green"><i class="fas fa-thumbs-up"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Income Hari Ini</span>
                      <span class="info-box-number"><small>Rp</small> {{ format_uang($income )}}</span>
                      <span class="info-box-text"><small>Income Bulan Ini</small></span>
                      <span class="info-box-number"><small>Rp</small> {{ format_uang($income_month )}}</span>
                      <input type="hidden" id="keuntungan" value="252000">
                    </div>
                  </div>
                </div>

                
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
              </div>
              <div class="row">
                <div class="col-3">
                  <h3 class="card-title">Sales Report</h3>
                </div>
                <div class="col-md-4 text-right text-bold mt-1">Pilih Periode : </div>
                <div class="col-5">
                  <div class="input-group">
                    <input type="text" name="from-to" class="form-control text-right" id="sales_report" value="{{date('1/d/Y')}} - {{date('m/d/Y')}}">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="position-relative mb-4">
                <canvas id="sales-chart" height="200"></canvas>
              </div>

              <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                  <i class="fas fa-square text-primary"></i> Penjualan
                </span>
                <span class="mr-2">
                  <i class="fas fa-square text-red"></i> Pembelian
                </span>
                <span>
                  <i class="fas fa-square text-green"></i> Income
                </span>
              </div>
            </div>
          </div>
          <!-- /.card -->

        </div>

        <div class="col-lg-4">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Laporan Hutang Piutang</h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="chart-responsive">
                    <canvas id="pieChart" height="140"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-12">
                  <div class="d-flex flex-row mt-2" style="justify-content: center">
                    <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> Hutang
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Piutang
                    </span>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
        </div>
    
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('js')
  <script src="{{asset('AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>
  <script>
    'use strict'
    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }
    var mode = 'index'
    var intersect = true

    var $salesChart = $('#sales-chart')
    let salesChart;

    //Date Range Picker
    $(function () {
      $('#sales_report').daterangepicker({},
      function() {
        salesChart.destroy(); 
        fetch_sales(); //Load ulang Data dari database
      });
      fetch_sales(); //Load Data dari database
    });

    //Load Data dari database
    function fetch_sales() {
      $.ajax({
        url: "{{route('load_sales')}}",
        method: 'get',
        datatype: 'json',
        data: {
          date :  $('.drp-selected').text()
        }
      })
      .done((response) => {
        salesChart = new Chart($salesChart, {
          type: 'bar',
          data: {
            labels: ['Sales Report'],
            datasets: [
              {
                backgroundColor: '#007bff',
                data: [response[0]]
              },
              {
                backgroundColor: '#dc3545',
                data: [response[1]]
              },
              {
                backgroundColor: '#28a745',
                data: [response[2]]
              }
            ]
          },
          options: {
            maintainAspectRatio: false,
            tooltips: {
              mode: mode,
              intersect: intersect
            },
            hover: {
              mode: mode,
              intersect: intersect
            },
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                // display: false,
                gridLines: {
                  display: true,
                  lineWidth: '4px',
                  color: 'rgba(0, 0, 0, .2)',
                  zeroLineColor: 'transparent'
                },
                ticks: $.extend({
                  beginAtZero: true,

                  // Include a dollar sign in the ticks
                  callback: function (value) {
                    if (value >= 1000000) {
                      value /= 1000000
                      value += 'jt'
                    }
                    else if (value >= 1000) {
                      value /= 1000
                      value += 'k'
                    }else {
                      value
                    }

                    return 'Rp. ' + value
                  }
                }, ticksStyle)
              }],
              xAxes: [{
                display: true,
                gridLines: {
                  display: false
                },
                ticks: ticksStyle
              }]
            }
          }
        })
      })
      .fail((response) => {
        Swal.fire({
          icon: 'error',
          title: response.responseJSON.message,
          showConfirmButton: false,
        })
        return;
      })
    }

    // Hutang Piutang Chart
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData = {
      labels: [
        'Hutang',
        'Piutang',
      ],
      datasets: [
        {
          data: [@json($countPiutang), @json($countHutang)],
          backgroundColor: ['#f56954', '#00a65a']
        }
      ]
    }
    var pieOptions = {
      legend: {
        display: false
      }
    }
    var pieChart = new Chart(pieChartCanvas, {
      type: 'doughnut',
      data: pieData,
      options: pieOptions
    })

  </script>
@endsection