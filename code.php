<?php
session_start();

// Call the database connection here
require 'dbconn.php';

// ----------------------------------------------------------------------------------- //

// UPDATE RECORD
if(isset($_POST['update_employee'])){

    $employee_id = mysqli_real_escape_string($conn, $_POST['id']);

    // Set mysqli real escape string to removes special characters to be input from a form that may interfere with the SQL query later on
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);

    $query_update = "UPDATE employee SET fullname='$name', email='$email', phone='$phone', position='$position' WHERE id = '$employee_id' ";

    $query_run = mysqli_query($conn, $query_update);

    if($query_run){
        $_SESSION['message'] = "Employee updated successfully!";
        header("Location: index.php");
        exit(0);
    } else{
        $_SESSION['message'] = "Updating employee data failed.";
        header("Location: index.php");
        exit(0);
    }
}
// UPDATE RECORD

// ----------------------------------------------------------------------------------- //

// INSERT RECORD
if(isset($_POST['save_employee'])){

    // Set mysqli real escape string to removes special characters to be input from a form that may interfere with the SQL query later on
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);

    // Set a mysql insert code to the employee table
    $query_insert = "INSERT INTO employee (fullname, email, phone, position) 
                VALUES ('$name', '$email', '$phone', '$position') ";

    // Run the query insert
    $query_run = mysqli_query($conn, $query_insert);

    if($query_run){
        $_SESSION['message'] = "Employee added successfully!";
        header("Location: create.php");
        exit(0);
    } else{
        $_SESSION['message'] = "Adding new employee failed.";
        header("Location: create.php");
        exit(0);
    }
}
// INSERT RECORD

// ----------------------------------------------------------------------------------- //

// DELETE RECORD
if(isset($_POST['delete_record'])){

    $employee_id = mysqli_real_escape_string($conn, $_POST['delete_record']);

    // set a mysqli delete code to the specific id
    $query_delete = "DELETE FROM employee WHERE id = '$employee_id' ";

    // Run the query delete using mysqli_query, first connect to db and perform the delete query
    $query_del = mysqli_query($conn, $query_delete);

    // If deleted successfully perform this 
    if($query_run){
        $_SESSION['message'] = "Employee deleted successfully!";
        header("Location: index.php");
        exit(0);
        
        // otherwise, print the failed delete
    } else{
        $_SESSION['message'] = "Delete the employee failed.";
        header("Location: index.php");
        exit(0);
    }
}

// DELETE RECORD

?>