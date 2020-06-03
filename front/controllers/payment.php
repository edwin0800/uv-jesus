<?php 

// Autoload SDK package for composer based installations

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\ExecutePayment;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class Pay_{

    public static function payment($item){

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AUVByQpsZp259nBJptOsUD3fqt8R525_T4jRvTYo98Wn4qsD70p6qkkfCpHswTD9Wiy3zsZqknuX6yLL',
                'EOUl2K2vYKqRsHxsthB17WBWXcAIp-sDlk4bjcTrRAsP6M7Ki4XKHF082k0cUcXGNDwpgUHdnSLXF-lx'
            )
        );           

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $pay_items = [];
        $total = 0;
        
        
        $item_p = new Item();
        $item_p->setName($item["titulo"])
        ->setCurrency('USD')
        ->setQuantity(1)
        ->setSku($item["id"])
        ->setPrice($item["precio"]);
        
        $total += $item["precio"];
        array_push($pay_items, $item_p);

            
        $itemList = new ItemList();
        $itemList->setItems($pay_items);

        $details = new Details();
        // $details->setShipping(1.2)
        //     ->setTax(1.3)
        //     ->setSubtotal(17.50);

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($total)
            ->setDetails($details);


        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());


        $baseUrl = "http://localhost/uv-jesus/front";
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("$baseUrl/ExecutePayment?success=true")
            ->setCancelUrl("$baseUrl/ExecutePayment?success=false");


        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        $request = clone $payment;


        try {
            $payment->create($apiContext);
        } catch (Exception $ex) {

                echo $ex->getData();

            // ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
            // exit(1);
        }


        $approvalUrl = $payment->getApprovalLink();


        echo "<script> window.location.href = '$approvalUrl'</script>";
        // ResultPrinter::printResult("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", "<a href='$approvalUrl' >$approvalUrl</a>", $request, $payment);

        return $payment;
          
    }

    public static function exec(){

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
              'AUVByQpsZp259nBJptOsUD3fqt8R525_T4jRvTYo98Wn4qsD70p6qkkfCpHswTD9Wiy3zsZqknuX6yLL',
              'EOUl2K2vYKqRsHxsthB17WBWXcAIp-sDlk4bjcTrRAsP6M7Ki4XKHF082k0cUcXGNDwpgUHdnSLXF-lx'
            )
        );   

        $paymentId = $_POST['paymentId'];
        $payment = Payment::get($paymentId, $apiContext);
        $payerId = $_POST['PayerID'];

        // Execute payment with payer ID
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
        // Execute payment
            $result = $payment->execute($execution, $apiContext);
            return (array) $result;
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }


    }
}