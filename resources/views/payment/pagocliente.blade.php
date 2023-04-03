
  <x-app-layout>

    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
     
        <div class="flex justify-center"> 
            <div id="qr-reader" style="width: 100%">
            
            </div>
        </div>
        <script>
     

            var html5QrcodeScanner = new Html5QrcodeScanner(
              "qr-reader", { fps: 10, aspectRatio: 1.0, disableFlip: true , fileScanEnabled: false}
            );

            function onScanSuccess(qrCodeMessage) {
              console.log(qrCodeMessage);
            }

            function onScanError(errorMessage) {
              console.log(errorMessage);
            }

            document.addEventListener("DOMContentLoaded", function () {
              // Configuración de la cámara trasera
              html5QrcodeScanner.start(
                { facingMode: { exact: "environment" } },
                { facingMode: "user" },
                onScanSuccess,
                onScanError
              );
            });

            html5QrcodeScanner.render(onScanSuccess, onScanError);
                            
                            
        
      </script>
      
    </x-fast-view>

   

</x-app-layout > 

