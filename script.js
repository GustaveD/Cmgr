window.addEventListener("DOMContentLoaded", function() {
	// Grab elements, create settings, etc.
	var canvas = document.getElementById("canvas"),
		context = canvas.getContext("2d"),
		video = document.getElementById("video"),
		videoObj = { "video": true },
		errBack = function(error) {
			console.log("Video capture error: ", error.code);
document.getElementById("snap").addEventListener('click', function() {
	context.drawImage(img, 640, 480, 640, 480);
});
		};


	// Put video listeners into place
	if(navigator.getUserMedia) { // Standard
		navigator.getUserMedia(videoObj, function(stream) {
			video.src = stream;
			video.play();
		}, errBack);
	} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
		navigator.webkitGetUserMedia(videoObj, function(stream){
			video.src = window.URL.createObjectURL(stream);
			video.play();
		}, errBack);
	}
	else if(navigator.mediaDevices.getUserMedia) { // Firefox-prefixed
		navigator.mediaDevices.getUserMedia(videoObj, function(stream){
			video.src = window.URL.createObjectURL(stream);
			video.play();
		}, errBack);
	}

}, false);
var ctx;
var save = new Image();

function takepick()
{
	var cv = document.getElementById("canvas");
	ctx = cv.getContext('2d');
	v = document.getElementById("video");
	ctx.drawImage(v, 0, 0, 680, 480);
	document.getElementById("up").style.display = 'block';
};

function uploadEx()
{
	var masque = ret_img();
	masque++;
	console.log(masque);
	var canvas = document.getElementById("canvas");
	var dataURL = canvas.toDataURL("image/png");
	document.getElementById('hidden_data').value = dataURL;
	var fd = new FormData(document.forms["form1"]);
	fd.append("variable1", masque);
	console.log(masque);
	var xhr = new XMLHttpRequest();
	xhr.open('POST', './upload_data.php');
	xhr.upload.onprogress = function(e) {
 		if (e.lengthComputable) {
			var percentComplete = (e.loaded / e.total) * 100;
			console.log(percentComplete + '% uploaded');
		setTimeout(function() {
			window.location = "take_photo.php"
				},500);
		}

	};
	xhr.onload = function() {
	};
	 xhr.send(fd);
};
