    
<div><h2 style="text-align: center;">Estamos procesando su pago<br>
por favor espere un momento</h2></div>


<script>

    var url = window.location

    
    var paymentId= getParameterByName("paymentId")
    var PayerID= getParameterByName("PayerID")


    console.log(paymentId);
    console.log(PayerID);

    //TODO: Coloca un load

    $.ajax({
        url: "views/ajax/payAjax.php",
        type: "POST",
        dataType: "JSON",
        data: {
            exec: true,
            paymentId: paymentId,
            PayerID: PayerID
        }
    })
    .done((res)=>{
        console.log(res);
        res = res["\u0000PayPal\\Common\\PayPalModel\u0000_propMap"]
        if (res.state == "approved") {
            alert("Compra exitosa")
            
            window.location.href = "shop"
        }else{
            //errores
        }
    })
    .fail((fail)=>{
        console.log(fail);
    })


    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
</script>