<?php 

include 'plan.php';

class Maze 
{
    const NORTH = 'NORTH';
    const EAST  = 'EAST';
    const SOUTH = 'SOUTH';
    const WEST  = 'WEST';
    const UP    = 'UP';
    const DOWN  = 'DOWN';

    const MIN       = 0;
    const MAX       = 19;
    const MAX_FLOOR = 2;

    protected $currentLocation  = null;
    // protected $startLocation    = null;
    protected $startLocation    = [1, 6, 7];
    protected $checkpoints      = [];
    protected $log              = [];
    protected $shortestTime     = null;
    protected $bestPath         = [];
    protected $blacklist        = [];

    protected $debug = false;

    public function run()
    {
        $this->search();
        
        // $this->drawPath();

        echo 'Shortest time to get out of maze is ' . $this->shortestTime . ' s' . PHP_EOL;
    }

    private function search()
    {
        $count = 0;
        do {
            echo '******* COUNT ' . $count . ' *********' . PHP_EOL;

            $this->getOptionsForBlind($count);
            $this->maze = getMazePlan();


            foreach ($this->blacklist as $location) {
                print_r($location);
                $this->markPositionAsBlind($location);
            }

            $this->checkpoints = [];
            $this->log = [];
            
            $this->startLocation = $this->getStartLocation();
            $this->log[] = $this->currentLocation;
            
            $this->findExit();
            // $this->print('log', $this->log);
            // $this->print('checkpoints', $this->checkpoints);

            $this->drawPath();
            $count++;
        } while (!empty($this->checkpoints) && $count < 100);

        
    }

    private function getOptionsForBlind($counter)
    {
        echo 'getOptionsForBlind ' . $counter . PHP_EOL;

        $checkpoint = $this->getLastCheckpoint();
        $key = array_search($checkpoint, $this->log);
        echo 'key ' . $key  . ' (' . implode(',', $this->log[$key + 1]) . ')' . PHP_EOL;

        $this->blacklist[] = $this->log[$key + 1];
    }

    private function getNextAvailableLocation()
    {
        $checkpoint = $this->getLastCheckpoint();

        $options        = 0;
        $nextPosition   = null;

        foreach ($this->orderDirection() as $direction) {
            $location = $this->getPosition($direction, $checkpoint);

            if (!$location) {
                continue;
            }
            
            $option = $this->readMaze($location);

            echo 'option => ' . $option . ' ' . $direction . PHP_EOL;
            
            if ($this->isAvailable($option)) {
                $options++;
                if (!$nextPosition) {
                    $nextPosition = $location;
                }
            }
        }

        if ($options == 0) {
            return null;
        }

        return $nextPosition;
    }

    private function findExit()
    {
        while (!$this->isExit()) {
            $this->makeStep();
        }

        $this->evaluateResult();

        $this->maze = getMazePlan();
        $timeToFindExit = $this->getTime();
        if (!$this->shortestTime || $this->shortestTime > $timeToFindExit) {
            $this->shortestTime = $timeToFindExit;
            $this->bestPath = $this->log;
        }
        echo 'It took ' . $timeToFindExit . ' s to find the exit' . PHP_EOL;
    }

    private function evaluateResult()
    {   
        $this->optimizeRoute();

        // $this->drawPath();
    }

    private function print($name, $array)
    {
        echo $name . PHP_EOL;
        foreach ($array as $key => $value) 
        {
            echo $key . ' => ' . implode(', ', $value) . PHP_EOL;
        }
    }

    private function optimizeRoute()
    {
        for ($i = 0; $i < count($this->log); $i++) {
            for ($j = $i + 1; $j < count($this->log); $j++) {
                if ($i < $j - 1 && $this->areNeighbours($this->log[$i], $this->log[$j])) {
                    // echo 'REMOVE' . PHP_EOL;
                    $this->removeLogsBetweenSteps($i + 1, $j - 1);
                    // echo '$i => ' . $i . PHP_EOL;
                    // echo '$j => ' . $j . PHP_EOL;
                }
            }
        }

        $this->refreshLog();
    }

    private function removeLogsBetweenSteps($step1, $step2)
    {
        // echo "removeLogsBetweenSteps between " . implode(',', $this->log[$step1]) . " and " . implode(',', $this->log[$step2]) . PHP_EOL;
        while ($step1 <= $step2) {
            unset($this->log[$step1]);
            $step1++;
        }

        $this->refreshLog();
    }

    private function areNeighbours($pos1, $pos2)
    {
        // echo 'areNeighbours' .  ' POS1 ' . implode(',', $pos1) . ' POS2 ' . implode(',', $pos2) . PHP_EOL;

        $floor = $x = $y = false;

        if ($pos1[0] == $pos2[0]) {
            // echo 'floor' . PHP_EOL;
            $floor = true;
        }
        if ($pos1[1] == $pos2[1]) {
            // echo 'x' . PHP_EOL;
            $x = true;
        }
        if ($pos1[2] == $pos2[2]) {
            // echo 'y' . PHP_EOL;
            $y = true;
        }

        if ($floor) {
            if ($x && abs($pos1[2] - $pos2[2]) == 1) {
                // echo 'neighbours on X' . PHP_EOL;
                return true;
            }
            if ($y && abs($pos1[1] - $pos2[1]) == 1) {
                // echo 'neighbours on Y' . PHP_EOL;
                return true;
            }
        }

        if ($x && $y && $this->isStaircase($pos1) && $this->isStaircase($pos2) && abs($pos1[0] - $pos2[0]) == 1) {
            return true;
        }

        return false;
    }

    private function drawPath()
    {
        $this->maze = getMazePlan();

        foreach ($this->log as $key => $log) 
        {
            if ($log == reset($this->log)) {
                $this->markPosition($log, 'F');
                continue;
            }

            if ($log == end($this->log)) {
                continue;
            }

            if (in_array($this->readMaze($log), ['S', 'D'])) {
                $this->markPosition($log, strtolower($this->readMaze($log)));
                continue;
            }

            $this->markPositionAsVisited($log);
        }        

        $plan = $this->maze[1];

        echo '   00 01 02 03 04 05 06 07 08 09 10 11 12 13 14 15 16 17 18 19 ' . PHP_EOL;
        echo '  +--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;

        foreach ($plan as $key => $row) {
            echo str_pad($key, 2, "0", STR_PAD_LEFT);
            foreach ($row as $char) {
                echo '|';
                switch ($char) {
                    case 'B': // blind
                        echo "\033[35m88\033[0m";
                        break;
                    case 'W': // wall
                        echo "\033[31m88\033[0m";
                    break;
                    case 'D': // dark spot
                        echo "\033[94mDD\033[0m";
                    break;
                    case 'd': // dark spot
                        echo "\033[94mXX\033[0m";
                    break;
                    case 'E': // exit
                        echo "\033[34mEx\033[0m";
                    break;  
                    case 'F': // enter
                        echo "\033[96mEn\033[0m";
                    break;
                    case 'S': // stairways
                        echo "\033[33mSS\033[0m";
                    break;
                    case 's': // stairways
                        echo "\033[33mXX\033[0m";
                    break;
                    case 'V': // visited
                        echo "\033[32mXX\033[0m";
                    break;      
                    default:
                        echo "  ";
                    break;
                }
            
            }
            echo '|' . PHP_EOL;
            echo '  +--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+' . PHP_EOL;
        }
    }

    private function makeStep()
    {
        $nextLocation = $this->getNextLocation();
        $this->move($nextLocation);
    }

    public function getNextLocation()
    {
        $direction = $this->evaluateAndGetDirection();

        if (!$direction) {
            $direction = $this->revertToLastCheckpoint();
        }
        
        // echo 'next location => ' . implode(', ', $direction) . PHP_EOL;

        return $direction;
    }

    private function evaluateAndGetDirection()
    {
        $options        = 0;
        $nextPosition   = null;

        foreach ($this->orderDirection() as $direction) {
            $location = $this->getPosition($direction);

            if (!$location) {
                continue;
            }
            
            $option = $this->readMaze($location);

            if (!$option) {
                echo 'no option current (' . implode(', ', $this->currentLocation) . ') location (' . implode(', ', $location) . ')  direction => ' . $direction . PHP_EOL;
            }

            // echo 'option => ' . $option . ' ' . $direction . PHP_EOL;
            
            if ($this->isAvailable($option)) {
                $options++;
                if (!$nextPosition) {
                    $nextPosition = $location;
                }
            }
        }

        if ($options == 0) {
            return null;
        }

        if ($options > 1) {
            $this->makeCheckpoint($options);
        }

        return $nextPosition;
    }

    private function isAvailable(string $option)
    {
        return in_array($option, ['R', 'D', 'S', 'E']);
    }

    private function makeCheckpoint(int $options)
    {
        $this->checkpoints[] = $this->currentLocation;
    }

    private function getPosition($direction, $location = null)
    {
        $location = $location ?? $this->currentLocation;

        $floor = $location[0];
        $x     = $location[1];
        $y     = $location[2];

        if ($direction == self::NORTH && $x > self::MIN) {
            return [$floor, $x - 1, $y];
        }
        if ($direction == self::EAST && $y < self::MAX) {
            return [$floor, $x, $y + 1];
        }
        if ($direction == self::SOUTH && $x < self::MAX) {
            return [$floor, $x + 1, $y];
        }
        if ($direction == self::WEST && $y > self::MIN) {
            return [$floor, $x, $y - 1];
        }
        if ($direction == self::UP && $floor < self::MAX_FLOOR) {
            return [$floor + 1, $x, $y];
        }
        if ($direction == self::DOWN && $floor > self::MIN) {
            return [$floor - 1, $x, $y];
        }
    }

    private function readMaze($location)
    {
        $floor = $location[0];
        $x     = $location[1];
        $y     = $location[2];

        return $this->maze[$floor][$x][$y];
    }

    private function orderDirection()
    {
        $directions = [self::NORTH, self::EAST, self::SOUTH, self::WEST];

        if ($this->isStaircase()) {
            $directions[] = self::DOWN;
            $directions[] = self::UP;
        }

        return $directions;
    }

    private function isExit($location = null)
    {
        $location = $location ?? $this->currentLocation;

        if ($this->readMaze($location) == 'E') {
            // echo 'EXIT' . PHP_EOL;
            return true;
        }

        return false;
    }

    private function isStaircase($location = null)
    {
        $location = $location ?? $this->currentLocation;

        if ($this->readMaze($location) == 'S') {
            return true;
        }

        return false;
    }

    private function revertToLastCheckpoint()
    {
        
        $location = $this->getLastCheckpoint();
        
        $this->changeCurrentLocation($location);
        
        $count = $this->markBlindSpots($location);
        // echo 'REVERTING ' . $count . PHP_EOL;

        return $location;
    }

    private function markBlindSpots($location)
    {
        $index = array_search($location, $this->log);
        $counter = 0;

        foreach ($this->log as $key => $log) {
            if ($key > $index) {
                $this->markPositionAsBlind($log);
                unset($this->log[$key]);
                $counter++;
            }
        }

        $this->refreshLog();

        return $counter;
    }

    private function getLastCheckpoint()
    {
        if (!empty($this->checkpoints)) {
            return array_pop($this->checkpoints);
        }

        return [];
    }

    private function refreshLog()
    {
        $this->log = array_values($this->log);
    }

    private function move(array $direction)
    {
        $this->markPositionAsVisited();
        $this->changeCurrentLocation($direction);
        $this->log[] = $this->currentLocation;
    }

    private function getTime()
    {
        $time = 0;
        foreach ($this->log as $log) {
            $field = $this->readMaze($log);

            if ($field == 'S') {
                $time += 2;
            } else if ($field == 'D') {
                $time += 1;
            } else {
                $time += 0.5;
            }
        }
        
        return $time;
    }

    private function markPosition($location = null, $type = null)
    {
        $location = $location ?? $this->currentLocation;

        $floor = $location[0];
        $x     = $location[1];
        $y     = $location[2];

        // echo 'markPosition => (' . implode(',', $location) . ') => ' . $this->readMaze($location) . PHP_EOL;

        $this->maze[$floor][$x][$y] = $type;
    }

    private function markPositionAsVisited($location = null)
    {
        $location = $location ?? $this->currentLocation;

        $floor = $location[0];
        $x     = $location[1];
        $y     = $location[2];

        $this->maze[$floor][$x][$y] = 'V';
    }

    private function markPositionAsBlind($location)
    {
        $floor = $location[0];
        $x     = $location[1];
        $y     = $location[2];

        $this->maze[$floor][$x][$y] = 'B';
    }

    private function getStartLocation()
    {
        if (!$this->startLocation) {
            $this->currentLocation = $this->getRandomStartLocation();
        } else {
            $this->currentLocation = $this->startLocation;
        }

        return $this->currentLocation;
    }

    private function getRandomStartLocation()
    {
        // TODO do-while to get available start posiion
        $randomLocation = [rand(0, 2), rand(0, 19), rand(0, 19)];

        echo 'random start => ' . implode(', ', $randomLocation) . PHP_EOL;
        
        return $randomLocation;
    }

    private function changeCurrentLocation($direction)
    {
        $this->currentLocation = $direction;
    }
}