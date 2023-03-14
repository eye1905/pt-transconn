<script src="https://www.gstatic.com/firebasejs/8.4.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js"></script>
<script>
	MsgElem = "";
	TokenElem = "";
	NotisElem = "";
	ErrElem = "";
	
	// TODO: Replace firebaseConfig you get from Firebase Console
	var firebaseConfig = {
		apiKey: "AIzaSyB0N8VXBl7_SxZNWrTq5KXC2reL9NnBQH0",
		authDomain: "tester-db564.firebaseapp.com",
		projectId: "tester-db564",
		storageBucket: "tester-db564.appspot.com",
		messagingSenderId: "782834624350",
		appId: "1:782834624350:web:2b64cae2ba6b33c70091cf",
		measurementId: "G-M11FDTMYX5"
	};
	firebase.initializeApp(firebaseConfig);
	
	const messaging = firebase.messaging.isSupported() ? firebase.messaging() : alert("FCM Tidak support di website")
	console.log(messaging);
	navigator.serviceWorker.register('<?php echo base_url('assets/js/service-worker.js');?>')
	.then((registration) => {
		messaging.useServiceWorker(registration);
		
		messaging
		.requestPermission()
		.then(function () {
			MsgElem = 'Notification permission granted.';
			// console.log('Notification permission granted.');
			
			// get the token in the form of promise
			return messaging.getToken();
		})
		.then(function (token) {
			TokenElem = 'Device token is : <br>' + token;
			simpan_token(token);
		})
		.catch(function (err) {
			ErrElem = ErrElem.innerHTML + '; ' + err;
			console.log('Unable to get permission to notify.', err);
		});
	});          
	
	function simpan_token(token) {
		var id = $('#id_master_tipe_unit').val();
		var nm_tipe_unit    = $('#nama_ins').val();
		var keterangan      = $('#keterangan').val();
		$.ajax({
			type: "POST",
			url: "<?=base_url('Notifikasi/save_token')?>",
			data: {token: token}, 
			dataType: "JSON",
			success: function(data){
				console.log(data);
			},
			error: function(q, w, e) {
				alert(e)
				console.log(q.responseText)
			}
		});
	}
	
	let enableForegroundNotification = true;
	messaging.onMessage(function (payload) {
		console.log('Message received. ', payload);
		NotisElem.innerHTML =
		NotisElem.innerHTML + JSON.stringify(payload);
		
		if (enableForegroundNotification) {
			let notification = payload.notification;
			navigator.serviceWorker
			.getRegistrations()
			.then((registration) => {
				const notificationTitle = notification.title;
				const notificationOptions = {
					body: notification.body,
					icon: "/itwonders-web-logo.png",
				};
				registration[0].showNotification(notificationTitle,notificationOptions,);
			});
		}
	});
</script>
<?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/js-notifikasi.blade.php ENDPATH**/ ?>