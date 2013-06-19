<?php 

    include('automator.php');

    $values = array(
        'first_name' => array('Ram', 'Gopal', 'Hari', 'Ramesh'), 
        'last_name' => array('Shrestha', 'Rajbhandari', 'Singh'), 
        'salary' => array('50000', '25000', '33000', '100000', '12000')
    );
    
    $obj = new Automator("localhost", "root", "root", "shop_dashboard");
    $obj->autoInsertion("test", $values, 5);
    echo $obj->insert_error();

?>