<?php  include"header.php"  ?>

<?php
use \PhpPot\Service\StripePayment;
require_once 'StripePayment.php';
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

if (!empty($_POST["token"])) {
    $stripePayment = new StripePayment();
    
    $stripeResponse = $stripePayment->chargeAmountFromCard($_POST);

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    // $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'arslan.dixeam50@gmail.com';                     //SMTP username
        $mail->Password   = 'Nopassword5.';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('store@store.com', 'MKT Resturant');
        $mail->addAddress($_POST['email']);     //Add a recipient
        $mail->addAddress('admin@admin.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    unset($_SESSION["cart_item"]);
    
    if ($stripeResponse['amount_refunded'] == 0 && empty($stripeResponse['failure_code']) && $stripeResponse['paid'] == 1 && $stripeResponse['captured'] == 1 && $stripeResponse['status'] == 'succeeded') {
     $successMessage = "Stripe payment is completed successfully. The TXN ID is " . $stripeResponse["balance_transaction"];
       // echo "<script>  </script>";
 }
}

?>

<div id="error-message"></div>

<section class="hero">
    <h2>Payment</h2>
</section>

<div class="container my-5">

    <div class="row">
    
        <div class="col-md-3"></div>
        <div class="col-md-6 col-12">

        <form id="frmStripePayment" action="" method="post">
    <div class="field-row">
        <label>Card Holder Name</label> <span id="card-holder-name-info"
        class="info"></span><br> <input type="text" id="name"
        name="name" class="demoInputBox">
    </div>
    <div class="field-row">
        <label>Email</label> <span id="email-info" class="info"></span><br>
        <input type="text" id="email" name="email" class="demoInputBox">
    </div>
    <div class="field-row">
        <label>Card Number</label> <span id="card-number-info"
        class="info"></span><br> <input type="text" id="card-number"
        name="card-number" class="demoInputBox">
    </div>
    <div class="field-row">
        <div class="contact-row column-right">
            <label>Expiry Month / Year</label> <span id="userEmail-info"
            class="info"></span><br> <select name="month" id="month"
            class="demoSelectBox">
            <option value="08">08</option>
            <option value="09">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select> <select name="year" id="year"
        class="demoSelectBox">
        <option value="18">2018</option>
        <option value="19">2019</option>
        <option value="20">2020</option>
        <option value="21">2021</option>
        <option value="22">2022</option>
        <option value="23">2023</option>
        <option value="24">2024</option>
        <option value="25">2025</option>
        <option value="26">2026</option>
        <option value="27">2027</option>
        <option value="28">2028</option>
        <option value="29">2029</option>
        <option value="30">2030</option>
    </select>
</div>
<div class="contact-row cvv-box">
    <label>CVC</label> <span id="cvv-info" class="info"></span><br>
    <input type="text" name="cvc" id="cvc"
    class="demoInputBox cvv-input">
</div>
</div>
<div>
    <input type="submit" name="pay_now" value="Submit"
    id="submit-btn" class="btnAction"
    onClick="stripePay(event);">

    <div id="loader" style="display: none;">
        <img alt="loader" src="img/200.gif">
    </div>
</div>
<input type='hidden' name='amount' value='0.5'> <input type='hidden'
name='currency_code' value='USD'> <input type='hidden'
name='item_name' value='Test Product'> <input type='hidden'
name='item_number' value='PHPPOTEG#1'>
</form>
        

        
        </div>
        <div class="col-md-3"></div>

    </div>

</div>



<?php  include"footer.php"  ?>
<script src="vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    function cardValidation () {
        var valid = true;
        var name = $('#name').val();
        var email = $('#email').val();
        var cardNumber = $('#card-number').val();
        var month = $('#month').val();
        var year = $('#year').val();
        var cvc = $('#cvc').val();

        $("#error-message").html("").hide();

        if (name.trim() == "") {
            valid = false;
        }
        if (email.trim() == "") {
         valid = false;
     }
     if (cardNumber.trim() == "") {
         valid = false;
     }

     if (month.trim() == "") {
        valid = false;
    }
    if (year.trim() == "") {
        valid = false;
    }
    if (cvc.trim() == "") {
        valid = false;
    }

    if(valid == false) {
        $("#error-message").html("All Fields are required").show();
    }

    return valid;
}
//set your publishable key
Stripe.setPublishableKey("pk_test_51H8QurB3K7M2p1jz46hQtnSA15NflSHwwa6Uo29yW6dA1q6j6c9Fncewmo36EDNaLrOkjmUp7vDbst44HEabd1x900akpfw28D");

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $("#submit-btn").show();
        $( "#loader" ).css("display", "none");
        //display the errors on the form
        $("#error-message").html(response.error.message).show();
    } else {
        //get token id
        var token = response['id'];
        //insert the token into the form
        $("#frmStripePayment").append("<input type='hidden' name='token' value='" + token + "' />");
        //submit form to the server
        $("#frmStripePayment").submit();
    }
}
function stripePay(e) {
    e.preventDefault();
    var valid = cardValidation();

    if(valid == true) {
        $("#submit-btn").hide();
        $( "#loader" ).css("display", "inline-block");
        Stripe.createToken({
            number: $('#card-number').val(),
            cvc: $('#cvc').val(),
            exp_month: $('#month').val(),
            exp_year: $('#year').val()
        }, stripeResponseHandler);

        //submit from callback
        return false;
    }
}
</script>

<?php if(!empty($successMessage)) { ?>
    <script type="text/javascript">
        $(document).ready(function(){
            toastr.success('Thankyou! Payment is completed successfully')
        })
    </script>
    <!-- <div id="success-message"><?php echo $successMessage; ?></div> -->
<?php  } ?>


