@extends('root.layouts.app')


@section('content')

<div class="container-fluid">
    <!-- breadcrumb -->
    <div class="page-heading">
        <div class="row d-flex align-items-center">
            <div class="col-md-6">
                <div class="page-breadcrumb">
                    <h1>View Attendance</h1>
                </div>
            </div>
            <div class="col-md-6 justify-content-md-end d-md-flex">
                <div class="breadcrumb_nav">
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a class="parent-item" href="{{route('admin.dashboard')}}">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a class="parent-item" href="">Attendance</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">
                            View Atendance
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb_End -->
    <!-- Section -->
    <section class="chart_section">
        <div class="card">
            <div class="card-header">
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Address</th>
                                <th>Name</th>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendances as $attendance)
                            <tr>
                                <td>{{$attendance->date}}</td>
                                <td>{{$attendance->address}}</td>
                                <td>{{$attendance->last_name.', '.$attendance->first_name}}</td>
                                <td>{{$attendance->time}}</td>
                                <td>{{$attendance->status}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Address</th>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Section_End -->
</div>

@section('script')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

@endsection
@endsection