
<div class="container">
    <div class="row justify-content-center"></div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <button id="pay-button" type="button" class="btn btn-primary center block">pay!</button>
            </div>
        </div>
    </div>
</div>






<form  method="GET" action="Payment" id="payment-form">
    <input type="hidden" name="result_data" id="result_data" value="">
</form>



<body>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-server-oUMdpOByTGi9IlYOsMewj7TE"></script>
    
    <script type="text/javascript">
    document.getElementById('pay-button').onclick=function(){
        var resultType =document.getElementById('result-type');
        var resultData =document.getElementById('result-data');
        function changeResult(type,data){
            $("#result-type").val(type);
            $("#result-data").val(JSON.stringfy(data)); 
        } ;
        snap.pay('<?=$snapToken?>', {
            //option
            onSuccess:function(result){
                changeResult('success',result);
                console.log(result.status_message);
                console.log(result);
                $("#payment-form").submit();
            },
            onPending: function(result){
                changeResult('pending',result);
                console.log(result.status_message);
                $("#payment-form").submit();
            },
            onError: function(result){
                changeResult('error',result);
                console.log(result.status_message);
                $("#payment-form").submit();
            }
        });
    };
    </script>
</body>