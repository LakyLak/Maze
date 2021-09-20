<?php 

function getMazePlan() 
{
    return [
        [
            ['R','R','R','R','R','R','W','W','R','E','R','R','R','R','R','R','R','R','R','R'],
            ['R','W','W','W','R','R','W','R','R','R','R','R','R','R','R','R','R','R','R','R'],
            ['R','R','R','W','R','R','W','R','W','W','R','R','W','W','W','W','W','W','R','R'],
            ['R','W','R','W','W','W','W','R','R','W','R','R','R','W','D','R','S','W','R','R'],
            ['R','W','R','R','R','R','R','R','R','W','R','R','D','D','D','W','R','R','R','R'],
            ['R','W','R','R','W','W','R','D','D','W','W','W','W','W','W','W','W','W','R','R'],
            ['R','W','R','R','W','W','W','D','D','R','R','W','R','R','R','R','W','W','W','R'],
            ['R','R','R','R','R','R','W','W','W','R','R','R','R','R','R','R','W','R','R','R'],
            ['W','W','R','W','R','R','R','D','W','W','R','R','R','R','R','R','W','R','W','W'],
            ['D','D','D','W','R','R','R','D','D','R','R','R','R','R','R','R','W','R','R','R'],
            ['D','W','W','W','R','R','R','D','D','R','R','R','R','R','R','R','R','R','R','R'],
            ['R','R','R','W','W','W','W','W','W','R','W','W','W','W','W','W','W','R','R','R'],
            ['R','R','R','R','R','W','R','R','R','R','R','R','W','R','R','R','R','R','R','R'],
            ['R','R','R','W','D','W','R','R','R','R','R','R','W','R','R','R','R','R','R','R'],
            ['R','D','D','W','D','W','R','R','R','W','R','R','R','S','R','R','R','R','R','R'],
            ['R','D','S','W','R','R','R','R','W','W','W','W','W','W','W','W','W','W','R','R'],
            ['R','D','D','W','R','R','R','R','R','R','R','W','R','W','R','R','R','R','R','R'],
            ['R','R','R','W','R','R','R','R','R','R','R','W','R','W','R','W','R','R','D','R'],
            ['R','R','R','W','W','W','W','W','R','R','R','W','R','W','R','W','R','D','D','R'],
            ['R','R','R','R','R','R','R','R','R','R','R','W','R','R','R','W','R','R','R','R'],
        ],
        [
            ['R','R','R','W','R','R','R','R','R','D','D','D','R','R','R','R','R','R','R','R'],
            ['R','W','W','W','R','R','R','W','R','R','R','R','W','R','R','W','R','R','R','R'],
            ['R','R','R','R','R','R','R','W','R','R','R','R','W','R','R','W','R','W','W','W'],
            ['R','W','W','W','W','W','R','W','R','R','R','R','W','R','R','W','S','R','R','D'],
            ['R','R','R','R','R','R','R','W','R','D','D','R','W','W','R','W','W','W','W','D'],
            ['R','R','R','R','R','R','R','W','W','D','D','W','W','W','R','W','R','R','R','R'],
            ['R','R','W','R','R','R','R','W','R','R','R','R','R','R','R','W','D','W','W','W'],
            ['R','R','R','W','R','R','W','R','R','R','R','R','R','R','R','W','D','R','R','R'],
            ['R','R','R','R','W','R','R','R','R','W','W','W','W','W','W','W','W','W','R','R'],
            ['R','R','R','R','R','W','R','R','R','R','R','W','R','R','R','R','R','R','R','R'],
            ['W','W','W','R','R','W','R','R','R','R','R','W','R','R','R','W','W','W','W','W'],
            ['R','R','W','R','R','W','R','R','R','R','R','W','R','R','W','R','R','R','R','R'],
            ['R','R','W','R','R','W','R','R','W','R','R','W','R','W','R','R','R','R','R','R'],
            ['R','R','W','R','W','W','W','W','W','R','R','R','R','W','W','W','D','W','W','R'],
            ['R','R','W','R','R','R','R','R','R','R','R','R','R','S','R','D','D','W','R','E'],
            ['R','R','S','W','W','R','W','R','W','W','W','W','W','W','W','W','D','W','W','R'],
            ['R','R','R','R','W','R','W','R','W','R','R','R','W','R','R','W','R','R','R','R'],
            ['R','R','R','W','D','D','W','R','W','R','R','R','W','R','R','R','W','R','R','R'],
            ['R','R','R','D','D','D','W','R','W','R','R','R','R','R','W','R','W','W','W','R'],
            ['R','R','R','R','W','W','W','R','R','R','R','R','R','R','W','R','R','R','R','R'],
        ],
        [
            ['R','R','R','W','R','R','R','W','R','R','R','R','R','D','D','D','R','R','R','R'],
            ['W','W','R','R','R','W','R','R','R','W','R','R','R','D','D','D','W','W','R','R'],
            ['R','W','R','R','W','W','W','W','W','W','R','W','W','W','R','R','W','R','R','R'],
            ['R','W','R','W','R','R','R','R','R','R','R','R','R','W','R','R','S','W','W','W'],
            ['R','W','R','W','R','R','R','W','W','R','R','R','R','W','R','R','R','R','R','R'],
            ['R','W','W','W','W','W','R','R','W','R','R','R','R','W','R','R','R','R','R','R'],
            ['R','R','R','R','R','R','R','R','W','R','R','R','R','W','W','W','W','W','R','R'],
            ['R','R','W','R','R','R','R','R','W','R','D','D','D','R','R','R','R','R','R','R'],
            ['R','R','W','R','R','W','W','W','W','R','D','D','D','R','R','W','W','W','W','R'],
            ['R','R','W','R','R','W','R','R','R','R','W','R','R','R','R','R','R','R','W','R'],
            ['W','W','W','W','R','R','R','R','R','R','W','R','R','R','R','R','R','R','W','R'],
            ['R','R','R','R','R','R','R','R','R','W','W','R','R','R','R','R','W','W','W','R'],
            ['R','R','R','R','W','W','W','W','W','W','W','W','W','R','R','R','W','R','R','R'],
            ['W','W','W','R','R','R','R','R','R','R','R','R','R','R','R','W','W','R','R','R'],
            ['R','R','R','R','W','W','W','W','W','W','R','W','R','S','R','R','W','R','R','R'],
            ['R','R','S','R','W','R','R','R','R','R','R','R','W','W','R','R','W','W','W','R'],
            ['D','D','R','R','W','R','R','R','R','R','R','W','W','R','R','R','R','R','R','R'],
            ['D','W','W','W','R','R','R','R','W','W','W','W','W','D','D','W','R','W','R','R'],
            ['R','R','R','W','W','R','R','R','R','R','R','R','R','R','R','W','R','R','W','R'],
            ['E','R','R','R','R','R','R','R','R','R','R','R','R','R','R','W','R','R','R','W'],
        ],
    ];
}

function printBlueprint() 
{
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    echo '|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|' . PHP_EOL;
    echo '+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
    
}

function blueprint()
{
    return [
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+'],
        ['|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|XX|'],
        ['+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+']
    ];
}