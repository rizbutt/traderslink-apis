
    var firebaseConfig = {
        apiKey: 'AIzaSyBG78N2CA0cj7-Mr293Y6DT2Qh8XH-2ysk',
        authDomain: 'innercity-3a92d.firebaseapp.com',
        databaseURL: 'https://innercity-3a92d-default-rtdb.firebaseio.com',
        projectId: 'innercity-3a92d',
        storageBucket: 'innercity-3a92d.appspot.com',
        messagingSenderId: '489819368551',
        appId: '1:489819368551:web:a03b7bba1376e6b09ff8c2',
        measurementId: 'G-XN5DNGCJF5',
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
