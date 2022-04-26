@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <button onclick="startFCM()" class="btn btn-danger btn-flat">Allow notification</button>
            @foreach($vendor_queries as $query)
                <p>{{ $query->content }}</p>
            @endforeach
        </div>
    </div>
</div>
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
                        alert('Token stored.');
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
@endsection
