### Introduction

Suppose you want to insert thousands dummy data to your table, how would you do it? Don't tell me you are going use the archaic method of inserting every individual row? 

[Insert-random-automator][githublink] automates this process of inserting X number of rows into your table randomly. This project is an extension of [randomizer][randomizerlink] so it shares some common codes. The reason I did not combine the two is that both have different functionality.

#### Try it

__Define__ values that you want to insert, randomly
```php
    $values = array(
        'first_name' => array('Ram', 'Gopal', 'Hari', 'Ramesh'), 
        'last_name' => array('Shrestha', 'Rajbhandari', 'Singh'), 
        'salary' => array('50000', '25000', '33000', '100000', '12000')
    );
```

__Initialize__ 

```php
    $obj = new Automator("<hostname>", "<username>", "<password>", "<database name>");
```

__Automate Insertion__
```php
    $obj->autoInsertion("<table name>", <value array>, <number of iteration>);
```
`<number of iteration>` is the number of times you want to randomly insert records into your table.


### Full example:
```php
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
```

Do send some pull requests. :)

[@prashishh][twitter]


[githublink]: https://github.com/prashishh/random-insert-automator
[randomizerlink]: https://github.com/prashishh/randomizer
[twitter]: http://twitter.com/prashishh