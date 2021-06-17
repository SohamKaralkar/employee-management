<?php
require_once __DIR__."/../helper/requirements.php";
require_once __DIR__ . '/../helper/init.php';
class Employee{
    private $table="employees";
    private $database;
    protected $di;

    public function __construct($di)
    {
        $this->di = $di;
        $this->database = $this->di->get("database");
    }

    public function addEmployeeData($data)
    {
        try{
            $this->database->beginTransaction();
            $employeeId = $this->database->insert("employees", ["name" => $data["name"]]);
            $this->insertContactNumbersFromRequest("mobile_numbers", $employeeId, $data);
            $this->insertWhatsappNumbersFromRequest("whatsapp_numbers", $employeeId, $data);
            $this->insertEmailFromRequest("email_address", $employeeId, $data);
            $this->insertAddressFromRequest("address", $employeeId, $data);
            $this->database->commit();
            return "success";

        }catch(Exception $e){
            $this->database->rollback();
            dd($e);
            return "error";
        }
    }

    public function insertContactNumbersFromRequest($table, $employeeId, $data)
    {
        for($i = 1 ; $i <= $data["total_contacts"] ; $i++)
        {
            $this->database->insert($table, ["contact_number" => $data["contact_number_".$i], "employee_id" => $employeeId]);
        }
    }

    public function insertWhatsappNumbersFromRequest($table, $employeeId, $data)
    {
        for($i = 1 ; $i <= $data["total_whatsapp_numbers"] ; $i++)
        {
            $this->database->insert($table, ["contact_number" => $data["whatsapp_number_".$i], "employee_id" => $employeeId]);
        }
    }

    public function insertEmailFromRequest($table, $employeeId, $data)
    {
        for($i = 1 ; $i <= $data["total_emails"] ; $i++)
        {
            $this->database->insert($table, ["email_id" => $data["email_".$i], "employee_id" => $employeeId]);
        }
    }

    public function insertAddressFromRequest($table, $employeeId, $data)
    {
        $this->database->insert($table, ["employee_id" => $employeeId, "address_1" => $data["address_1"], "address_2" => $data["address_2"], "location" => $data["location"], "postal_code" => $data["postal_code"], "postal_area" => $data["postal_area"], "taluka" => $data["taluka"], "suburb" => $data["suburb"], "cardinal_directions" => $data["cardinal_directions"], "city" => $data["city"], "district" => $data["district"], "state" => $data["state"], "country" => $data["country"]]);
    }
}