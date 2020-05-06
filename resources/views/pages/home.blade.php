@extends('layout')

@section('content')
<?php
/*
Dentro del php.ini tenemos las siguientes directivas junto con sus valores iniciales:

display_errors = On
register_globals = Off
post_max_size = 8M
*/

echo 'display_errors = ' . ini_get('display_errors') . "<br>";
echo 'register_globals = ' . ini_get('register_globals') . "<br>";
echo 'post_max_size = ' . ini_get('post_max_size') . "<br>";
echo 'post_max_size+1 = ' . ((int)ini_get('post_max_size')+1) . "<br>";
echo 'post_max_size in bytes = ' . return_bytes(ini_get('post_max_size')). "<br>";
echo 'upload_max_filesize = ' . ini_get('upload_max_filesize');

function return_bytes($val) {
    $val = (int)trim($val);
    $last = strtolower($val[strlen($val)-1]);
    switch($last) {
        // El modificador 'G' está disponble desde PHP 5.1.0
        case 'g':
            $val *= 1024;
        case 'm':
            $val *= 1024;
        case 'k':
            $val *= 1024;
    }

    return $val;
}

?>
	<div class="wrapper">
	
		<canvas id="signature-pad" class="signature-pad"  style="border: 2px dashed #ccc" width=400 height=200></canvas>
		<button id="save-png">Save as PNG</button>
		
<button id="clear">Clear</button>
    </div>
    
@stop


@push('scripts')
	<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script>
		var canvas = document.querySelector("canvas");

var signaturePad = new SignaturePad(canvas);
      
window.resizeCanvas = function () {
            var ratio =  window.devicePixelRatio || 1;
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
        }

		document.getElementById('save-png').addEventListener('click', function () {
			if (signaturePad.isEmpty()) {
				alert("Please provide a signature first.");
			} else {
				var dataURL = signaturePad.toDataURL();
				download(dataURL, "signature.png");
			}
		});

		function download(dataURL, filename) {
			if (navigator.userAgent.indexOf("Safari") > -1 && navigator.userAgent.indexOf("Chrome") === -1) {
				window.open(dataURL);
			} else {
				var blob = dataURLToBlob(dataURL);
				var url = window.URL.createObjectURL(blob);

				var a = document.createElement("a");
				a.style = "display: none";
				a.href = url;
				a.download = filename;

				document.body.appendChild(a);
				a.click();

				window.URL.revokeObjectURL(url);
			}
		}

		function dataURLToBlob(dataURL) {
			// Code taken from https://github.com/ebidel/filer.js
			var parts = dataURL.split(';base64,');
			var contentType = parts[0].split(":")[1];
			var raw = window.atob(parts[1]);
			var rawLength = raw.length;
			var uInt8Array = new Uint8Array(rawLength);

			for (var i = 0; i < rawLength; ++i) {
				uInt8Array[i] = raw.charCodeAt(i);
			}

			return new Blob([uInt8Array], { type: contentType });
		}

document.getElementById('clear').addEventListener('click', function () {
  signaturePad.clear();
});

        resizeCanvas();
    </script>

@endpush
