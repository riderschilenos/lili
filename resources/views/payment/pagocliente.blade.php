<x-app-layout>

 <style>
    #preview{
       width:100%;
       height: 100%;
       margin:0px auto;
    }
    </style>
 <div class="mb-2 p-0">
    <video id="preview" class="form-control p-0"></video>
</div>




    <script type="text/javascript">
        var scanner = new Instascan.Scanner({
            video: document.getElementById('preview'),
            scanPeriod: 5,
            mirror: false
        });

        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[1]);
            } else {
                console.error('No cameras found.');
                alert('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
            alert(e);
        });
    </script>

</x-app-layout>