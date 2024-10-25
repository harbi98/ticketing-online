@extends('layouts')
@section('content')

@include('component.sidebar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="con container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="car card mb-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/image1.png') }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">gamay na lang</h5>
                                <p class="card-text">This is a wider card with supportingd with supporting text below as ad with supporting text below as a tural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="car card mb-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/image1.png') }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">gamay na lang</h5>
                                <p class="card-text">This is a wider card with supportingd with supporting text below as ad with supporting text below as a tural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="car card mb-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/image1.png') }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">gamay na lang</h5>
                                <p class="card-text">This is a wider card with supportingd with supporting text below as ad with supporting text below as a tural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="car card mb-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/image1.png') }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">gamay na lang</h5>
                                <p class="card-text">This is a wider card with supportingd with supporting text below as ad with supporting text below as a tural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                @php
                $displayedTicketIds = [];
                $ticketCounts = [];
                $totalPrices = [];

                // Count the number of tickets for each reference_num
                foreach ($lists as $data) {
                if (!isset($ticketCounts[$data['customer_quantity']])) {
                $ticketCounts[$data['customer_quantity']] = 0;
                $totalPrices[$data['customer_quantity']] = 0;
                }
                $ticketCounts[$data['customer_quantity']]++;
                $totalPrices[$data['customer_quantity']] += $data['price'];
                }
                @endphp

                @foreach ($lists as $key => $data)
                @if(!in_array($data['customer_quantity'], $displayedTicketIds))

                <div class="justify-content-center">
                    <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 mw-100">
                        <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400 fs-2">Total sales</p>
                            <p class="fs-4 fw-bold">₱ {{number_format($totalPrices[$data['customer_quantity']], 2)}}</p>
                        </div>
                        <div id="labels-chart" class="px-2.5"></div>
                        <!-- <hr class="solid">
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400 fs-5 text-center">Month</p> -->
                    </div>
                </div>
                @php
                $displayedTicketIds[] = $data['customer_quantity'];
                @endphp
                @endif
                @endforeach
            </div>
        </div>
    </div>
</body>

<style>
    .car {
        transition: all 0.5s ease;
        cursor: pointer;
    }

    .car:hover {
        box-shadow: 5px 6px 6px 2px #e9ecef;
        transform: scale(1.05);
    }

    .car:hover {
        background: lightgrey;
    }

    .car {
        max-width: 60vh;
        max-height: 15vh;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* .solid {
        border-top: 3px solid #bbb;
    } */
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{asset('charts/apexcharts.js')}}"></script>
<script src="{{asset('charts/flowbite.min.js')}}"></script>
<script>
    var sales = {!! $sales !!};
    var trytry = {!! $new !!};
    var trytry2 = {!! $new2 !!};



    const date = [];
    const datee = [];
    const datee2 = [];
    const vip = [];
    const genad = [];


    // $.each(trytry, function(key,val){
    //     price.push
    // });

    $.each(sales, function(key, val) {
        // Convert created_at to a Date object and format it
        const formattedDate = new Date(val.created_at);
        const options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        date.push(formattedDate.toLocaleDateString('en-US', options));
    });

    $.each(trytry, function(key, val) {
        // Convert created_at to a Date object and format it
        // const formattedDate = new Date(val.created_at);
        // const options = { year: 'numeric', month: 'long', day: 'numeric' };
        // datee.push(formattedDate.toLocaleDateString('en-US', options));
        datee.push(val.month);
        vip.push(val.price);
    });

    $.each(trytry2, function(key, val) {
        // Convert created_at to a Date object and format it
        // const formattedDate = new Date(val.created_at);
        // const options = { year: 'numeric', month: 'long', day: 'numeric' };
        // datee2.push(formattedDate.toLocaleDateString('en-US', options));
        datee2.push(val.month);
        genad.push(val.price);
    });

    // console.log(date);
    // console.log(datee);
    // console.log(datee2);
    // console.log(vip);
    // console.log(genad);

    const options = {
        // set the labels option to true to show the labels on the X and Y axis
        xaxis: {
            show: true,
            categories: datee,
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'fs-6 font-normal fill-gray-500 dark:fill-gray-400'
                }
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            show: true,
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-lg font-normal fill-gray-500 dark:fill-gray-400'
                },
                formatter: function(value) {
                    return '₱' + value;
                }
            }
        },
        series: [{
                name: "VIP",
                data: vip,
                color: "#1A56DB",
            },
            {
                name: "Gen Ad",
                data: genad,
                color: "#7E3BF2",
            },
        ],
        chart: {
            sparkline: {
                enabled: false
            },
            height: "100%",
            width: "100%",
            type: "area",
            fontFamily: "Inter, sans-serif",
            dropShadow: {
                enabled: false,
            },
            toolbar: {
                show: false,
            },
        },
        tooltip: {
            enabled: true,
            x: {
                show: false,
            },
        },
        fill: {
            type: "gradient",
            gradient: {
                opacityFrom: 0.55,
                opacityTo: 0,
                shade: "#1C64F2",
                gradientToColors: ["#1C64F2"],
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            width: 6,
        },
        legend: {
            show: false
        },
        grid: {
            show: false,
        },
    }

    if (document.getElementById("labels-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("labels-chart"), options);
        chart.render();
    }
</script>

</html>
@endsection