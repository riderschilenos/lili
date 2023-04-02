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
            html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
            // .. use this to start scanning.
        }
        }).catch(err => {
        // handle err
        });

        function onScanSuccess(decodedText, decodedResult) {

            console.log(`Code matched = ${decodedText}`, decodedResult);

        }

        var html5QrcodeScanner = new Html5QrcodeScanner(

            "qr-reader", { fps: 10, qrbox: 250 }
            
            
            );

        html5QrcodeScanner.render(onScanSuccess);

        
      
    </script>

</x-app-layout>