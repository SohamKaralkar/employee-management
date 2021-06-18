<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
    </head>
    <body>
        <div class="container mt-4">
            <form method="POST" id="form">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Employee Name</label>
                        <input type="text" class="form-control" placeholder="name" value="{{$employee->name}}" name="name">
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Address 1</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="" name="address_1" value="{{ $employee->address[0]->address_1 }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Address 2</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="" name="address_2" value="{{ $employee->address[0]->address_2 }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Location</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="" name="location" value="{{ $employee->address[0]->location }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Postal Code</label>
                        <input type="text" class="form-control" placeholder="Postal Code" name="postal_code" value="{{ $employee->address[0]->postal_code }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Postal Area</label>
                        <input type="text" class="form-control" placeholder="Postal Area" name="postal_area" value="{{ $employee->address[0]->postal_area }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Taluka</label>
                        <input type="text" class="form-control" placeholder="Taluka" name="taluka" value="{{ $employee->address[0]->taluka }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Suburb</label>
                        <input type="text" class="form-control" placeholder="Postal Area" name="suburb" value="{{ $employee->address[0]->suburb }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Cardinal Directions</label>
                        <input type="text" class="form-control" placeholder="EAST/WEST" name="cardinal_directions" value="{{ $employee->address[0]->cardinal_directions }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">City</label>
                        <input type="text" class="form-control" placeholder="Dity" name="city" value="{{ $employee->address[0]->city }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">District</label>
                        <input type="text" class="form-control" placeholder="District" name="district" value="{{ $employee->address[0]->district }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">State</label>
                        <input type="text" class="form-control" placeholder="State" name="state" value="{{ $employee->address[0]->state }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Country</label>
                        <input type="text" class="form-control" placeholder="Country" name="country" value="{{ $employee->address[0]->country }}">
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="form-row mt-4" id="contacts">
                    <div class="form-group col-md-4">
                    <label for="">Mobile number</label>
                    <div class="dropdown-divider"></div>
                    <button type="button" class="btn btn-sm btn-primary" id="contact-field">Add Number Field</button>
                        <div class="form-row mt-3" id="phone-number">
                            @foreach($employee->contacts as $contact)
                                <div class="form-group col-md-12">
                                    <label for="inputAddress">Mobile Number  | primary</label>
                                    <input type="radio" id="primary_number" value = "1" name="contact_primary" {{ $contact->isChecked()}}>
                                    <button type="button" class="btn btn-sm btn-danger delete">Delete</button>
                                    <input type="number" class="form-control mt-2" placeholder="Mobile Number" name="contact_number" value="{{ $contact->contact_number }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                    <label for="">Whatsapp number</label>
                    <div class="dropdown-divider"></div>
                    <button type="button" class="btn btn-sm btn-primary" id="whatsapp-number-field">Add Number Field</button>
                        <div class="form-row mt-3" id="whatsapp-number">
                            @foreach($employee->whatsappnumber as $contact)
                                <div class="form-group col-md-12">
                                    <label for="inputAddress">WhatsApp Number  | primary</label>
                                    <input type="radio" name="whatsapp_primary" id="primary_number" {{ $contact->isChecked()}}>
                                    <button class="btn btn-sm btn-danger delete">Delete</button>
                                    <input type="number" class="form-control mt-2" placeholder="WhatsApp Number" name="whatsapp_number" value="{{ $contact->contact_number }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                    <label for="">Email id</label>
                    <div class="dropdown-divider"></div>
                    <button type="button" class="btn btn-sm btn-primary" id="add-email-field">Add Email Field</button>
                        <div class="form-row mt-3" id="email-field">
                            @foreach($employee->emails as $email)
                                <div class="form-group col-md-12">
                                    <label for="inputAddress">Email  | primary</label>
                                    <input type="radio" id="email" name="email_primary" {{ $email->isChecked()}}>
                                    <button class="btn btn-sm btn-danger delete">Delete</button>
                                    <input type="email" class="form-control mt-2" placeholder="Email" name="email" value="{{ $email->email_id }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" id="submit">Submit</button>
                </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            var $url = "/employee/{{$employee->id}}";
        </script>
        <script src="{{ asset('assets/js/edit.js') }}"></script>
    </body>
</html>