// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: 'AIzaSyBG78N2CA0cj7-Mr293Y6DT2Qh8XH-2ysk',
    authDomain: 'innercity-3a92d.firebaseapp.com',
    databaseURL: 'https://innercity-3a92d-default-rtdb.firebaseio.com',
    projectId: 'innercity-3a92d',
    storageBucket: 'innercity-3a92d.appspot.com',
    messagingSenderId: '489819368551',
    appId: '1:489819368551:web:a03b7bba1376e6b09ff8c2',
    measurementId: 'G-XN5DNGCJF5',
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message received.", payload);
    const title = "Hello world is awesome";
    const options = {
        body: "Your notificaiton message .",
        icon: "/firebase-logo.png",
    };
    return self.registration.showNotification(
        title,
        options,
    );
});