<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if($conn ) {
   echo 'Connected successfully';
    $sql = 'CREATE Database vehicle_service_center';
    $retval = mysqli_query($conn,$sql);
    $sql = 'create table customer (cust_id int primary key auto_increment, cust_name varchar(20), cust_address varchar(20), cust_phone varchar(20), cust_vehicle_no varchar(10));';
    $retval = mysqli_query($conn, $sql);
    if(! $retval)
    {
      echo '';
    }
    $sql = 'create table vehicle(vehicle_number varchar(10) primary key, vehicle_type varchar(20), RCbook varchar(20), customer_id int);';
    $retval = mysqli_query($conn, $sql);
    $sql = 'create table parts(part_no int primary key, part_name varchar(20), part_cost int, par_manufacturedate DATE, part_warrantyperiod DATE);';
    $retval = mysqli_query($conn, $sql);
    $sql = 'create table employee(emp_id int primary key auto_increment, emp_name varchar(20), emp_address varchar(50), emp_phone varchar(20), emp_salary int,emp_emailid varchar(50),emp_password varchar(20));';
    $retval = mysqli_query($conn, $sql);
    $sql = 'create table invoice(invoice_number int primary key, invoice_date DATE, invoice_amount int, vehicle_no varchar(10), emp_id int);';
    $retval = mysqli_query($conn, $sql);
    mysqli_close($conn);
 
   }
   
   
   