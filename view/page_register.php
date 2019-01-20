<?php 
    include_once 'dependencies.php'; 
?>

<h2 class="text-center">
    Registe New Client <i class="fa fa-user-plus"></i>
</h2><hr>

<form method="POST" id ="registerForm" action="../controller/insert_client.php">

    <div class="container">
        <div class="form-row">

            <div class="col-md-6">
                Name: <i class="fa fa-user"></i>
                <input class="form-control" type="text" name="name" required autofocus><br>
            </div>

            <div class="col-md-6">
                Email: <i class="fa fa-envelope"></i>
                <input class="form-control" type="email" name="email" required><br>
            </div>

            <div class="col-md-4">
                Tax Number: <i class="fa fa-address-card"></i>
                <input class="form-control" type="text" name="taxNumber" required id="taxNumber"><br>
            </div>

            <div class="col-md-4">
                Birthday: <i class="fa fa-calendar"></i>
                <input class="form-control" type="date" name="birth" required><br>
            </div>

            <div class="col-md-4">
                Phone: <i class="fab fa-whatsapp"></i>
                <input class="form-control" type="text" name="phone" required id="phone"><br>
            </div>
            
            <div class="col-md-12">
                Address: <i class="fa fa-map"></i>
                <input class="form-control" type="text" name="address" required><br>
            </div>

            <div class="col-md-12 text-center">
                <button class="btn btn-primary btn-lg" id="submitBt">
                    Insert <i class="fa fa-user-plus"></i>       
                </button><br><br>
                <a href="../index.php">
                    Back
                </a><br><br>
            </div>

            <div class="col-md-12 text-center">
                <span class="alert-danger help-block" name="message" id="message"></span>
            </div>

        </div>
    </div>
    
</form>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script> 

<script type="text/javascript">

    $(document).ready(function(){
        $("#taxNumber").mask("000000000");
        $("#phone").mask("+000 000000000");

        $.urlParam = function(name){  
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);  
            return results[1] || 0;  
        }
        var message = $.urlParam('message');
        var messageFix = message.replace(/%20/g, " ");
        $("#message").text(messageFix);
    });
    
</script>
