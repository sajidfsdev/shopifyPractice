

<?php
 include(dirname(__DIR__).'/controller/animation.php');
 include(dirname(__DIR__).'/controller/addAnimation.php');

 $delay=$_POST["delay"];
 $repeat=$_POST["repeat"];
 $animation=$_POST["animations"];


 if($delay=="" || $delay==null)
 {
     $delay=1;
 }

 if($_POST["animations"]=="none")
 {
     return header("location:https://animationbtn.herokuapp.com");
 }

 $price=Animation::$pricing[array_search($_POST["animations"],Animation::$animations)];

 if($price<=0)
 {

    if(insertAnimation($delay,$repeat,$animation,$price))
    {
        return header("location:https://animationbtn.herokuapp.com/view/main.php");
    }
    else
    {
        echo "Database connection error";
    }
//      //Performing saving actions on DB..........
//      $servername = "localhost";
//      $username = "root";
//      $password = "";
//      $dbname = "animation";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// $sql = "DELETE FROM animation";

// if ($conn->query($sql) === TRUE) {
//   //Inserting new record selected ............
//   $sql = "INSERT INTO animation (delayanimation, repeatanimation, classanimation,price)
// VALUES ('$delay', '$repeat', '$animation','$price')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }
//   //Inserting new records ends................
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
     //and returns to main page..................
// return header("location:/App/view/main.php");
 }
 
 else
 {

    //starts...............


// // Set variables for our request
// $shop = "animationproject";
// $token = "c989c2e6c3fe8b05df59a7b8af541d12";
// $query = array(
//   "Content-type" => "application/json" // Tell Shopify that we're expecting a response in JSON format
// );

// // Webhook content, including the URL to POST to
// $capture_data = array(
//   'transaction' =>
//  array(
//    'kind' => 'capture'
//  )
// );

// // Run API call (POST) to capture the payment on the order
// $capture_response = shopify_call($token, $shop, "/admin/orders/" . $webhook_content['id'] . "/transactions.json", $capture_data, 'POST');
// echo $capture_response;


    //ends..................
     ?>
        <!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        include(dirname(__DIR__).'/view/includes/headContent.php');

    ?>


</head>

<body>
    
<?php
    include(dirname(__DIR__).'/view/includes/nav.php');

?>

            <div id="parentContainercheckout">
                <div id="formcheckout">
                    <div id="heading_checkout">
                        Checkout Bill ( 10 USD )
                    </div>
                    <div class="labels__checkout">
                        Name on card
                    </div>
                    <div class="fields__checkout">
                        <input type="text" class="input__checkout" />
                    </div>
                    <div class="labels__checkout">
                        Card Number
                    </div>
                    <div class="fields__checkout">
                        <input type="text" class="input__checkout" />
                    </div>
                    <div class="labels__checkout">
                        Expiry
                    </div>
                    <div class="fields__checkout">
                        <input type="text" class="input__checkout" />
                    </div>
                    <div class="labels__checkout">
                        Security Code
                    </div>
                    <div class="fields__checkout">
                        <input type="text" class="input__checkout" />
                    </div>
                    <div id="btnRow__checkout">
                        <button onclick="executepayment()"  class="btn btn-md btn-success btn__checkout">
                            Complete the  Payment
                        </button>
                    </div>
                </div>
            </div>
</body>

</html>
<?php 
        include(dirname(__DIR__).'/view/includes/bootstrapJs.php');

?>
     <?php
 }

 
?>


<script>
    function executepayment()
    {
        
        fetch("https://animationproject.myshopify.com/admin/api/2020-07/shopify_payments/balance.json",{
            method:'GET',
            headers:{
                'Content-Type':'application/json',
                'Authorization':'c989c2e6c3fe8b05df59a7b8af541d12',
                "client_id" => 'c989c2e6c3fe8b05df59a7b8af541d12', // Your API key
		        "client_secret" => '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', // Your app credentials (secret key)
            }
        })
        .then(res=>{
            window.alert("res has came");
            console.log(res);
        })
        .catch(err=>{
            window.alert("error cathec");
            console.log(err);
        })
    }
</script>