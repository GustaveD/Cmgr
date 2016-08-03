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
	alert("test");
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
			video.src = window.webkitURL.createObjectURL(stream);
			video.play();
		}, errBack);
	}
	else if(navigator.mozGetUserMedia) { // Firefox-prefixed
		navigator.mozGetUserMedia(videoObj, function(stream){
			video.src = window.URL.createObjectURL(stream);
			video.play();
		}, errBack);
	}

}, false);

function takepick()
{
	var cv = document.getElementById("canvas"),
		ctx = cv.getContext('2d');
	var v = document.getElementById("video");
	ctx.drawImage(video, 0, 0, 680, 480);
};
function uploadEx(masque)
{
	var canvas = document.getElementById("canvas");
	var dataURL = canvas.toDataURL("image/png");
	document.getElementById('hidden_data').value = dataURL;
	var fd = new FormData(document.forms["form1"]);
	fd.append("variable1", masque);
	var xhr = new XMLHttpRequest();
	xhr.open('POST', './upload_data.php', false);
	xhr.upload.onprogress = function(e) {
 		if (e.lengthComputable) {
			var percentComplete = (e.loaded / e.total) * 100;
			console.log(percentComplete + '% uploaded');
			alert('Succesfully uploaded');
		}

	};
	xhr.onload = function() {
	};
	 xhr.send(fd);
};
