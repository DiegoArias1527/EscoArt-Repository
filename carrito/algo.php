<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AeFJrvOOWIfksIEijGFAZJqZ8vYb9GtIlzL9F6ZmLCgcb-p2V2kCw3MXcVjc8y0IfSOR5DFIpo8i0ODb&components=buttons"></script>

</head>
<body>
    
    <div id="paypal-button-container"></div>
    <script>
        paypal.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                label: 'pay',
            },
            createOrder: function(data, actions){
                return actions.order.create({
                    purchase_units: [{
                        amount:{
                            value: 99
                        }
                    }]
                });
            },
            onApprove: function(data, actions){
                actions.order.capture().then(function (detalles){
                    window.location.href="../index2.html"
                });
            },
            onCancel: function(data){
                alert("Pago cancelado");
                console.log(data);

            }
        }).render('#paypal-button-container');
    </script>

</body>
</html>