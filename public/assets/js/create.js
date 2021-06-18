$("#contact-field").on("click", function(){
    $html = `<div class="form-group col-md-12">
    <label for="inputAddress">Mobile Number  | primary</label>
    <input type="radio" id="primary_number" name="contact_primary">
    <button type="button" class="btn btn-sm btn-danger delete">Delete</button>
    <input type="number" class="form-control" placeholder="Mobile Number" name="contact_number">
    </div>`;
    $("#phone-number").append($html);
});

$("#whatsapp-number-field").on("click", function(){
    $html = `<div class="form-group col-md-12">
    <label for="inputAddress">WhatsApp Number  | primary</label>
    <input type="radio" name="whatsapp_primary" id="primary_number">
    <button class="btn btn-sm btn-danger delete">Delete</button>
    <input type="number" class="form-control" placeholder="Mobile Number" name="whatsapp_number" value="897498334">
    </div>`;
    $("#whatsapp-number").append($html);
});

$("#add-email-field").on("click", function(){
    $html = `<div class="form-group col-md-12">
    <label for="inputAddress">Email  | primary</label>
    <input type="radio" id="email" name="email_primary">
    <button class="btn btn-sm btn-danger delete">Delete</button>
    <input type="email" class="form-control" placeholder="Email" name="email" value="spam@gmail.com">
    </div>`;
    $("#email-field").append($html);
});

$("#contacts").on("click", ".delete", function(event){
    console.log($($(this).parent()).remove());
});

$("#submit").on("click", function(event){
    $primary_contact = $($("input[name=contact_primary]:checked").parent()).find("input[name=contact_number]").val();
    $primary_whatsapp_number = $($("input[name=whatsapp_primary]:checked").parent()).find("input[name=whatsapp_number]").val();
    $primary_email = $($("input[name=email_primary]:checked").parent()).find("input[name=email]").val();
    const data = new FormData(document.getElementById("form"));
    const value = Object.fromEntries(data.entries());
    console.log();
    $json = {
        "name" : data.get("name"),
        "address" : {
            "address_1" : data.get("address_1"),
            "address_2" : data.get("address_2"),
            "location" : data.get("location"),
            "postal_code" : data.get("postal_code"),
            "postal_area" : data.get("postal_area"),
            "taluka" : data.get("taluka"),
            "suburb" : data.get("suburb"),
            "cardinal_directions" : data.get("cardinal_directions"),
            "city" : data.get("city"),
            "district" : data.get("district"),
            "state" : data.get("state"),
            "country" : data.get("country")
        },
        "contacts" :  {
            "list" : data.getAll("contact_number"),
            "primary" : $primary_contact == undefined ? "none" : $primary_contact
        }, 
        "whatsapp" : {
            "list" : data.getAll("whatsapp_number"),
            "primary" : $primary_whatsapp_number == undefined ? "none" : $primary_whatsapp_number
        },
        "email" : {
            "list" : data.getAll("email"),
            "primary" : $primary_email == undefined ? "none" : $primary_email
        }
    };
    $.ajax({
        url: '/employee',
        method: "POST",
        data : {
            _token : data.get("_token"),
            data : $json
        },
        dataType: "JSON",
        success : function($data){
            console.log($data);
        }
    });
    console.log($json);
    event.preventDefault();
});