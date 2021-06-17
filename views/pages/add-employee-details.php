<?php
require_once __DIR__ . '/../../helper/init.php';
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
    </head>
    <body>
        <div class="container">
            <form action="<?=BASEURL;?>helper/routing.php" method="POST" id="form">
                <input type="hidden" name="total_contacts" id="total-contacts" value="3">
                <input type="hidden" name="total_whatsapp_numbers" id="total-whatsapp-numbers" value="3">
                <input type="hidden" name="total_emails" id="total-emails" value="3">
                <input type="hidden" name="add_employee_details">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Employee Name</label>
                        <input type="text" class="form-control" placeholder="name" value="john" name="name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Address 1</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="" name="address_1" value="some road xyz">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Address 2</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="" name="address_2" value="some road xyz">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Location</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="" name="location" value="some road xyz">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Postal Code</label>
                        <input type="text" class="form-control" placeholder="Postal Code" name="postal_code" value="897387">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Postal Area</label>
                        <input type="text" class="form-control" placeholder="Postal Area" name="postal_area" value="mumbai">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Taluka</label>
                        <input type="text" class="form-control" placeholder="Taluka" name="taluka" value="kurla">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Suburb</label>
                        <input type="text" class="form-control" placeholder="Postal Area" name="suburb" value="mumbai suburb">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Cardinal Directions [EAST/WEST]</label>
                        <input type="text" class="form-control" placeholder="Postal Area" name="cardinal_directions" value="east">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">City</label>
                        <input type="text" class="form-control" placeholder="Dity" name="city" value="mumbai">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">District</label>
                        <input type="text" class="form-control" placeholder="District" name="district" value="mumbai">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">State</label>
                        <input type="text" class="form-control" placeholder="State" name="state" value="MH">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Country</label>
                        <input type="text" class="form-control" placeholder="Country" name="country" value="india">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="">Mobile number</label>
                    <button type="button" class="btn btn-sm btn-primary" id="contact-field">Add Number Field</button>
                        <div class="form-row mt-3" id="phone-number">
                            <div class="form-group col-md-12" id="contact-div-1">
                                <label for="inputAddress">Mobile Number  | primary</label>
                                <input type="radio" name="contact" id="primary_number" name="contact_primary">
                                <button type="button" class="btn btn-sm btn-danger delete-contact" data-target="1">Delete</button>
                                <input type="number" class="form-control" placeholder="Mobile Number" name="contact_number_1" value="7786378623">
                            </div>
                            <div class="form-group col-md-12" id="contact-div-2">
                                <label for="inputAddress">Mobile Number  | primary</label>
                                <input type="radio" name="contact" id="primary_number" name="contact_primary">
                                <button type="button" class="btn btn-sm btn-danger delete-contact" data-target="2">Delete</button>
                                <input type="number" class="form-control" placeholder="Mobile Number" name="contact_number_2" value="299289893">
                            </div>
                            <div class="form-group col-md-12" id="contact-div-3">
                                <label for="inputAddress">Mobile Number  | primary</label>
                                <input type="radio" name="contact" id="primary_number" name="contact_primary">
                                <button type="button" class="btn btn-sm btn-danger delete-contact" data-target="3">Delete</button>
                                <input type="number" class="form-control" placeholder="Mobile Number" name="contact_number_3" value="983783393">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                    <label for="">Whatsapp number</label>
                    <button type="button" class="btn btn-sm btn-primary" id="whatsapp-number-field">Add Number Field</button>
                        <div class="form-row mt-3" id="whatsapp-number">
                            <div class="form-group col-md-12" id="whatsapp-field-1">
                                <label for="inputAddress">WhatsApp Number  | primary</label>
                                <input type="radio" name="whatsapp_primary" id="primary_number">
                                <button class="btn btn-sm btn-danger" data-target="1">Delete</button>
                                <input type="number" class="form-control" placeholder="Mobile Number" name="whatsapp_number_1" value="897498334">
                            </div>
                            <div class="form-group col-md-12" id="whatsapp-field-2">
                                <label for="inputAddress">WhatsApp Number  | primary</label>
                                <input type="radio" name="whatsapp_primary" id="primary_number">
                                <button class="btn btn-sm btn-danger" data-target="2">Delete</button>
                                <input type="number" class="form-control" placeholder="Mobile Number" name="whatsapp_number_2" value="897273298">
                            </div>
                            <div class="form-group col-md-12" id="whatsapp-field-3">
                                <label for="inputAddress">WhatsApp Number  | primary</label>
                                <input type="radio" name="whatsapp_primary" id="primary_number">
                                <button class="btn btn-sm btn-danger" data-target="3">Delete</button>
                                <input type="number" class="form-control" placeholder="Mobile Number" name="whatsapp_number_3" value="2789712979">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                    <label for="">Email id</label>
                    <button type="button" class="btn btn-sm btn-primary" id="add-email-field">Add Email Field</button>
                        <div class="form-row mt-3" id="email-field">
                            <div class="form-group col-md-12" id="email-field-1">
                                <label for="inputAddress">Email  | primary</label>
                                <input type="radio" id="email" name="email_primary">
                                <button class="btn btn-sm btn-danger" data-target="1">Delete</button>
                                <input type="email" class="form-control" placeholder="Email" name="email_1" value="spam@gmail.com">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputAddress">Email  | primary</label>
                                <input type="radio" name="Primary" id="primary_number" name="email_primary">
                                <button class="btn btn-sm btn-danger">Delete</button>
                                <input type="email" class="form-control" placeholder="Email" name="email_2" value="spam1@gmail.com">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputAddress">Email  | primary</label>
                                <input type="radio" name="Primary" id="primary_number" name="email_primary">
                                <button class="btn btn-sm btn-danger" data-target=>Delete</button>
                                <input type="email" class="form-control" placeholder="Email" name="email_3" value="spam2@gmail.com">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="<?=BASEURL;?>assets/js/pages/add-employee-details.js"></script>
    </body>
</html>