<?php
include 'formHelper.php';
$inputs = [
    [
        'type' => 'text',
        'name' => 'name',
        'placeholder' => 'Vardas'
    ],
    [
        'type' => 'text',
        'name' => 'last_name',
        'placeholder' => 'Pavarde'
    ],
    [
        'type' => 'password',
        'name' => 'password',
        'placeholder' => '*******'
    ],
    [
        'type' => 'password',
        'name' => 'password2',
        'placeholder' => '*******'
    ],
    [
        'type' => 'submit',
        'name' => 'register',
        'value' => 'Registruotis'
    ],
    [
        'type' => 'select',
        'name' => 'childrens_number',
        'options' => [0,1,2,3, '4+']
    ],
    [
        'type' => 'textarea',
        'name' => 'textarea',
        'placeholder' => "Cia rasomas tekstas",
        'maxlength' => '30',
        'rows' => '3'
    ],
];

echo '<form action="registration.php" method="post">';

foreach ($inputs as $input){
    if($input['type'] === 'select'){
        echo generateSelect($input).'<br>';
    }elseif($input['type'] === 'textarea'){
        echo generateTextarea($input).'<br>';
    }else{
        echo generateInput($input).'<br>';
    }
}

echo '</form>';