<x-app-layout>
    <div class="flex justify-center"> 
        <div id="qr-reader" style="width: 100%">
        
        </div>
    </div>
    <script>
        // This method will trigger user permissions
        Html5Qrcode.getCameras().then(devices => {
        /**
         * devices would be an array of objects of type:
         * { id: "id", label: "label" }
         */
        if (devices && devices.length) {
            var cameraId = devices[0].id;
            let html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader",
        { fps: 10, qrbox: {width: 250, height: 250} },
        verbose= false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
            html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
            // .. use this to start scanning.
        }
        }).catch(err => {
        // handle err
        });

        function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        console.log(`Code matched = ${decodedText}`, decodedResult);
        }

        function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader",
        { fps: 10, qrbox: {width: 250, height: 250} },
        verbose= false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);

        html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
                
                
      
    </script>

</x-app-layout>