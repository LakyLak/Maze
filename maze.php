<?php

require './Maze.php';

// echo '+--+--+--+--+' . PHP_EOL;
// echo '         |VV|' . PHP_EOL;
// echo '+--+--+  +--+' . PHP_EOL;
// echo '|VV|VV|  |VV|' . PHP_EOL;
// echo '+--+--+  +--+' . PHP_EOL;
// echo '|VV|     |VV|' . PHP_EOL;
// echo '+--+  +--+--+' . PHP_EOL;
// echo '|VV|  |VV|VV|' . PHP_EOL;
// echo '+--+  +--+--+' . PHP_EOL;
// echo '|VV|        |' . PHP_EOL;
// echo '+--+--+--+  +' . PHP_EOL;
// echo PHP_EOL;

// $percent = 0;
// for ($i = 0; $i <= 10; $i++) {
//     echo '+--+--+--+--+' . PHP_EOL;
//     echo '         |VV|' . PHP_EOL;
//     echo '+--+--+  +--+' . PHP_EOL;
//     echo '|VV|VV|  |VV|' . PHP_EOL;
//     echo '+--+--+  +--+' . PHP_EOL;
//     echo '|VV|     |VV|' . PHP_EOL;
//     echo '+--+  +--+--+' . PHP_EOL;
//     echo '|VV|  |VV|VV|' . PHP_EOL;
//     echo '+--+  +--+--+' . PHP_EOL;
//     echo '|VV|        |' . PHP_EOL;
//     echo '+--+--+--+  +' . PHP_EOL;
    
//     echo "\r"."\r"."\r"."\r"."\r"."\r"."\r"."\r"."\r"."\r"."\r";
//     sleep(0.5);
//     $percent++;
// }

// $percent = 0;
// for ($i = 0; $i <= 100; $i++) {
//     echo "HEllo" . "\n";
//     echo $percent;
//     echo "\r"."\r";
//     sleep(1);
//     $percent++;
// }


echo colorLog(">>>>", 'e') . PHP_EOL;

$maze = new Maze();

$maze->run();

function colorLog($str, $type = 'i'){
    switch ($type) {
        case 'e': //error
            echo "\033[31m$str \033[0m\n";
        break;
        case 's': //success
            echo "\033[32m$str \033[0m\n";
        break;
        case 'w': //warning
            echo "\033[33m$str \033[0m\n";
        break;  
        case 'i': //info
            echo "\033[36m$str \033[0m\n";
        break;      
        default:
        # code...
        break;
    }
}
