
var $mobileFieldCount = 4;
var $whatsappFieldCount = 4;
var $emailFieldCount = 4;
$("#contact-field").on("click", function(){
    $html = `<div class="form-group col-md-12" id="contact-div-${$mobileFieldCount}">
    <label for="inputAddress">Mobile Number  | primary</label>
    <input type="radio" name="Primary" id="primary_number" name="is_primary">
    <button type="button" class="btn btn-sm btn-danger delete-contact" data-target=${$mobileFieldCount}>Delete</button>
    <input type="number" class="form-control" placeholder="Mobile Number" name="contact_number_${$mobileFieldCount}">
    </div>`;
    $("#total-contacts").val($mobileFieldCount);
    $("#phone-number").append($html);
    $mobileFieldCount++;
});

$("#whatsapp-number-field").on("click", function(){
    $html = `<div class="form-group col-md-12" id="whatsapp-field-${$whatsappFieldCount}">
    <label for="inputAddress">WhatsApp Number  | primary</label>
    <input type="radio" name="whatsapp_primary" id="primary_number">
    <button class="btn btn-sm btn-danger" data-target=${$whatsappFieldCount}>Delete</button>
    <input type="number" class="form-control" placeholder="Mobile Number" name="whatsapp_number_${$whatsappFieldCount}" value="897498334">
    </div>`;
    $("#total-whatsapp-numbers").val($whatsappFieldCount);
    $("#whatsapp-number").append($html);
    $whatsappFieldCount++;
});

$("#email-field").on("click", function(){
    $html = `<div class="form-group col-md-12" id="email-field-${$emailFieldCount}">
    <label for="inputAddress">Email  | primary</label>
    <input type="radio" id="email" name="email_primary">
    <button class="btn btn-sm btn-danger" data-target="${$emailFieldCount}">Delete</button>
    <input type="email" class="form-control" placeholder="Email" name="email_${$emailFieldCount}" value="spam@gmail.com">
    </div>`;
    $("#total-emails").val($emailFieldCount);
    $("#whatsapp-number").append($html);
    $emailFieldCount++;
});