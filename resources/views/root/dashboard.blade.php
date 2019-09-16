@extends('root.layouts.app')


@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- breadcrumb -->
        <div class="col md-12">
            <div class="page-heading">
                <div class="row d-flex align-items-center">
                    <div class="col-md-6">
                        <div class="page-breadcrumb">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                    <div class="col-md-6 justify-content-md-end d-md-flex">
                        <div class="breadcrumb_nav">
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-home"></i>
                                    <a class="parent-item" href="index.html">Home</a>
                                    <i class="fa fa-angle-right"></i>
                                </li>

                                <li class="active">
                                    Dashboard
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb_End -->
            <!-- Section -->
            <section class="chart_section">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="info_items bg_green d-flex align-items-center">
                            <span class="info_items_icon">
                                <i class="ion-android-people"></i>
                            </span>
                            <div class="info_item_content">
                                <span class="info_items_text">Total Employee</span>
                                <span class="info_items_number">{{$user_count}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="info_items bg_blue d-flex align-items-center">
                            <span class="info_items_icon">
                                <i class="ion-calendar"></i>
                            </span>
                            <div class="info_item_content">
                                <span class="info_items_text">Attendance Today</span>
                                <span class="info_items_number">{{$attendance_count}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h1><b>Attendance Today</b> </h1>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($att as $att)

                                    <tr>
                                        <td>{{$att->last_name}}, {{$att->first_name}}</td>
                                        <td>{{$att->address}}</td>
                                        <td>{{$att->time}}</td>
                                        <td>{{$att->status}}</td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </section>
            <!-- Section_End -->
        </div>
    </div>
</div>

<br />

@endsection

@section('script')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });

    list();

    function list() {
        $.get("api/todaylist", function (response) {
            var value = "";
            $.each(response, function (key, value) {

                value += "<tr>";
                value += "<td>" + value.first_name + "</td>";
                value += "<td>" + value.coordinates + "</td>";
                value += "<td>" + value.address + "</td>";
                value += "<td>" + value.time_in + "</td>";
                value += "<td>" + value.time_out + "</td>";
                value += "</tr>";
                $("#datatable-buttons").append(value.coordinates);

            });
        });

    }
</script>
@endsection