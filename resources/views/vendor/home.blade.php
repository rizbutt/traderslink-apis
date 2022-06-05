@extends('layouts.vendor')

@section('content')
<div class="container">
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card chat-app vh-100">
            <div id="plist" class="people-list">
                <div class="input-group">
                @if($notify == 'no')
                <button onclick="startFCM()" class="btn btn-danger btn-flat">Allow notification</button>
                @endif
                </div>
                <ul class="list-unstyled chat-list mt-2 mb-0" id="querylist">
                @foreach($vendor_queries as $query)
                    <li class="clearfix" id= {{ $query->id }}>
                        <div class="about">
                            <div class="name" id="qname">{{ $query->sender_name }}</div>
                            <div class="name" id = "qphone">{{ $query->sender_phone_number }}</div>
                            <div style="display: none;" id="qcon" >{{ $query->content }}</div>                                        
                        </div>
                    </li>
                @endforeach
                   
                </ul>
            </div>
            <div class="chat">
                <div class="chat-header clearfix">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                            </a>
                            <div class="chat-about">
                                <h6 class="m-b-0" id="pun"></h6>
                                <h6 class="m-b-0" id="pupho"></h6>
                                <small>Posted: 2 hours ago</small>
                            </div>
                        </div>
                        <div class="col-lg-6 hidden-sm text-right">
                            <!-- <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="chat-history">
                   <p id="dcont">Traders Links</p>
                </div>
                
            </div>
        </div>
    </div>
</div>
</div>
@if($notify == 'no')
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
<script>
    var firebaseConfig = {
        apiKey: '{{ config('services.firebase.api_key') }}',
        authDomain: '{{ config('services.firebase.auth_domain') }}',
        databaseURL: '{{ config('services.firebase.database_url') }}',
        projectId: '{{ config('services.firebase.project_id') }}',
        storageBucket: '{{ config('services.firebase.storage_bucket') }}',
        messagingSenderId: '{{ config('services.firebase.messaging_sender_id') }}',
        appId: '{{ config('services.firebase.app_id') }}',
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    function startFCM() {
        messaging
            .requestPermission()
            .then(function () {
                
                return messaging.getToken()
            })
            .then(function (response) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route("store.token") }}',
                    type: 'POST',
                    data: {
                        token: response
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        console.log(response);
                    },
                    error: function (data) {
                        alert(data+'this');
                    },
                });
            }).catch(function (error) {
                alert(error);
            });
    }
    messaging.onMessage(function (payload) {
        const title = payload.notification.title;
        const options = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(title, options);
    });


</script>
@endif
@endsection
