<?php

if (isset($_POST['contact'])) {

    require_once 'connect.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone_num'];

    if(empty($name) || empty($email) || empty($phone))
    {
        header("Location: content.html?error=emptyfields&name=" . $name . "&email=" . $email . "&phone_number=" . $phone);
        exit();
    }
    else{
        $sql = "SELECT email from customers WHERE email=?";
        $stmt = $conn->prepare($sql);


        if($stmt === false){
            echo $conn->error;
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result(); 
        
        if($result->num_rows>0){

            $stmt->close();
            $conn->close();

            header("Location: content.html?error=emailalreadyexist&name=" . $name . "&phone_number=" . $phone);
            exit();

        }
        else{

            $insert_sql = "INSERT INTO customers (name, email, phone_num) VALUES (?,?,?)";

            $insert_stmt = $conn->prepare($insert_sql);

            $insert_stmt->bind_param("sss", $name, $email, $phone);

            $result = $insert_stmt->execute();
            
            if(!$result){
                echo $insert_stmt->error;
            }

            $insert_stmt->close();
            $conn->close();

            header("Location: thankyou.html?success=success");
            exit();

        }
    }

}
else{
    header("Location: content.html");
    exit();
}
?>
