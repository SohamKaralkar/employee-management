<?php
require_once 'init.php';

if(isset($_POST['add_employee_details']))
{
    $result = $di->get("employee")->addEmployeeData($_POST);
}