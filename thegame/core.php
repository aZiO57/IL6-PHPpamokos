<?php

const TOOL_ROCK = 'rock';
const TOOL_PAPER = 'paper';
const TOOL_SCISSORS = 'scissors';

$toolsArray = [
    0 => TOOL_ROCK,
    1 => TOOL_PAPER,
    2 => TOOL_SCISSORS
];

if(isset($_POST['play']));
    $playerChoice = $_POST['tool'];
    echo $playerChoice;
    $pcChoice = rand(0, 2);
    $pcChoice = $toolsArray[$pcChoice];
    echo '<table>';
    echo '<tr><td ><img width="150" src="http://localhost:8000/thegame/image/' . $playerChoice . '.jpg"></td><td>VS</td><td ><img width="150" src="http://localhost:8000/thegame/image/' . $pcChoice . '.jpg"></td></tr>';
    echo '</table>';
    if($playerChoice == $playerChoice){
        echo 'Lygiosios';
    }elseif ($playerChoice == TOOL_ROCK && $pcChoice == TOOL_SCISSORS){
        echo 'Laimejote';
    }elseif ($playerChoice == TOOL_PAPER && $pcChoice == TOOL_ROCK){
        echo 'Laimejote';
    }elseif ($playerChoice == TOOL_SCISSORS && $pcChoice == TOOL_PAPER){
        echo 'Laimejote';
    }else{
        echo 'Pralaimejote';
    }
?>