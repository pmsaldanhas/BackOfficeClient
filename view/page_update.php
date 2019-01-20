<?php

    include_once 'dependencies.php';
    include_once '../model/Connection.class.php';
    include_once '../model/Manager.class.php';	

    $manager = new Manager();

    if( isset($_POST['id']) ){
        $id = $_POST['id'];
    } else{
        $id = $_GET['id'];
    }
?>

<h2 class="text-center">
    Update Info <i class="fa fa-user-edit"></i>
</h2><hr>

<form method="POST" action="../controller/update_client.php">

    <div class="container">
        <div class="form-row">

<?php foreach($manager->getInfoClient("entries", $id) as $client_info): ?>

            <div class="col-md-6">
                Name: <i class="fa fa-user"></i>
                <input class="form-control" type="text" name="name" required autofocus value="<?=$client_info['name']?>"><br>
            </div>

            <div class="col-md-6">
                Email: <i class="fa fa-envelope"></i>
                <input class="form-control" type="email" name="email" required value="<?=$client_info['email']?>"><br>
            </div>

            <div class="col-md-4">
                Tax Number: <i class="fa fa-address-card"></i>
                <input class="form-control" type="text" name="taxNumber" required id="taxNumber" value="<?=$client_info['taxNumber']?>"><br>
            </div>

            <div class="col-md-4">
                Birthday: <i class="fa fa-calendar"></i>
                <input class="form-control" type="date" name="birth" required value="<?=$client_info['birth']?>"><br>
            </div>

            <div class="col-md-4">
                Phone: <i class="fab fa-whatsapp"></i>
                <input class="form-control" type="text" name="phone" required id="phone" value="<?=$client_info['phone']?>"><br>
            </div>
            
            <div class="col-md-12">
                Address: <i class="fa fa-map"></i>
                <input class="form-control" type="text" name="address" required value="<?=$client_info['address']?>"><br>
            </div>

            <div class="col-md-12 text-center">

            <input type="hidden" name="id" value="<?=$client_info['id']?>">

<?php endforeach; ?>

                <button class="btn btn-warning btn-lg">
                    Update <i class="fa fa-user-edit"></i>       
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
