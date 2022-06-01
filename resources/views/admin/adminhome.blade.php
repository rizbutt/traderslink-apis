@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Dealin Categories</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-warning">{{ $categoriesCount }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Vendors</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-warning">{{ $vendorsusersCount }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Users</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-warning">{{ $usersCount }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Queries</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash4"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-warning">{{ $queriesCount }}</span></li>
                            </ul>
                        </div>
                    </div>

                 </div>
            </div>
    <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
    <div class="white-box">
        <div class="d-md-flex mb-3">
            <h3 class="box-title mb-0">Recent Queries</h3>
            <div class="col-md-3 col-sm-4 col-xs-6 ms-auto"></div>
        </div>
            <div class="table-responsive">
                <table class="table no-wrap">
                    <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">Name</th>
                            <th class="border-top-0">Phone</th>
                            <th class="border-top-0">Query</th>
                            <th class="border-top-0">Date Time</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach($queries as $query)
                    <tr>
                        <td>{{ $query->id }}</td>
                        <td class="txt-oflo">{{ $query->sender_name }}</td>
                        <td>{{ $query->sender_phone_number }}</td>
                        <td class="txt-oflo">{{ $query->content }}</td>
                        <td><span class="text-warning">{{ $query->created_at }}</span></td>
                    </tr>
                    @endforeach
                    
                </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection


