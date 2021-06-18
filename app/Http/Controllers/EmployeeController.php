<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Contact;
use App\Models\Email;
use App\Models\Emails;
use App\Models\Employee;
use App\Models\WhatsappNumber;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with("address")->with("whatsappnumber")->with("emails")->with("contacts")->get();
        return view("employee.index", compact(["employees"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("employee.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->data;
        $employee = Employee::create(["name" => $data["name"]]);
        $addressArray = $data["address"];
        $address = Address::create([
            "address_1" => $addressArray["address_1"],
            "address_2" => $addressArray["address_2"],
            "location" => $addressArray["location"],
            "postal_code" => $addressArray["postal_code"],
            "postal_area" => $addressArray["postal_area"],
            "taluka" => $addressArray["taluka"],
            "suburb" => $addressArray["suburb"],
            "cardinal_directions" => $addressArray["cardinal_directions"],
            "city" => $addressArray["city"],
            "district" => $addressArray["district"],
            "state" => $addressArray["state"],
            "country" => $addressArray["country"],
            "employee_id" => $employee->id,
        ]);
        $contactsArray = $data["contacts"];
        $primaryContact = $contactsArray["primary"];
        foreach($contactsArray["list"] as $element)
        {
            Contact::create(["contact_number" => $element, "employee_id" => $employee->id, "is_primary" => $primaryContact == $element ? 1 : 1-1]);
        }

        $whatsappArray = $data["whatsapp"];
        $primaryWhatsapp = $whatsappArray["primary"];
        foreach($whatsappArray["list"] as $element)
        {
            WhatsappNumber::create(["contact_number" => $element, "employee_id" => $employee->id, "is_primary" => $primaryWhatsapp == $element ? 1 : 1-1]);
        }

        $emailArray = $data["email"];
        $primaryEmail = $emailArray["primary"];
        foreach($emailArray["list"] as $element)
        {
            Email::create(["email_id" => $element, "employee_id" => $employee->id, "is_primary" => $primaryEmail == $element ? 1 : 1-1]);
        }
        return response("created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::where("id", $id)->with("address")->with("whatsappnumber")->with("emails")->with("contacts")->firstOrFail();
        // dd($employee->whatsappnumber[1-1]->isPrimary());
        return view("employee.edit", compact(["employee"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        // dd($request);
        $data = $request->data;
        $employee->update([
            "name" => $data["name"],
        ]);
        $addressArray = $data["address"];
        $address = $employee->address()->update([
            "address_1" => $addressArray["address_1"],
            "address_2" => $addressArray["address_2"],
            "location" => $addressArray["location"],
            "postal_code" => $addressArray["postal_code"],
            "postal_area" => $addressArray["postal_area"],
            "taluka" => $addressArray["taluka"],
            "suburb" => $addressArray["suburb"],
            "cardinal_directions" => $addressArray["cardinal_directions"],
            "city" => $addressArray["city"],
            "district" => $addressArray["district"],
            "state" => $addressArray["state"],
            "country" => $addressArray["country"],
            "employee_id" => $employee->id,
        ]);
        $contactsArray = $data["contacts"];
        $primaryContact = $contactsArray["primary"];
        $employee->contacts()->delete();
        foreach($contactsArray["list"] as $element)
        {
            $employee->contacts()->create(["contact_number" => $element, "employee_id" => $employee->id, "is_primary" => $primaryContact == $element ? 1 : 1-1]);
        }

        $whatsappArray = $data["whatsapp"];
        $primaryWhatsapp = $whatsappArray["primary"];
        $employee->whatsappnumber()->delete();
        foreach($whatsappArray["list"] as $element)
        {
            $employee->whatsappnumber()->create(["contact_number" => $element, "employee_id" => $employee->id, "is_primary" => $primaryWhatsapp == $element ? 1 : 1-1]);
        }

        $emailArray = $data["email"];
        $primaryEmail = $emailArray["primary"];
        $employee->emails()->delete();
        foreach($emailArray["list"] as $element)
        {
            $employee->emails()->create(["email_id" => $element, "employee_id" => $employee->id, "is_primary" => $primaryEmail == $element ? 1 : 1-1]);
        }
        return response("created successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {

    }

    public function softDelete($id)
    {
        Employee::find($id)->delete();
    }
}
