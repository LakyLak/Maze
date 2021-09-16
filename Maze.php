<?php 

require './plan.php';

class Maze 
{
    const NORTH = 1;
    const EAST  = 2;
    const SOUTH = 3;
    const WEST  = 4;
    const UP    = 5;
    const DOWN  = 6;

    const MIN       = 0;
    const MAX       = 19;
    const MAX_FLOOR = 2;

    protected $currentLocation  = null;
    protected $checkpoints      = [];

    // lookAround
        // evaluate option
        // choose direction

        // if no move possible - return to last checkpoint
    // move
        // mark field visited
        // iterate steps
        // add log for revert move (to last checkpoint)
    
// - mark options
// - choose direction
// - change location
// - count step
// - add log
// - add ordered options


    public function run()
    {
        $this->getCurrentLocation();
        echo 'current position' . implode(', ', $this->currentLocation) . PHP_EOL;

        $this->lookAround();

        $this->move();
    }

    public function lookAround()
    {
        if ($this->isExit()) {
            echo 'EXIT' . PHP_EOL;
        }

        $direction = $this->evaluateAndGetDirection();
        echo 'direction => ' . implode(', ', $direction) . PHP_EOL;
        echo 'checkpoints' . PHP_EOL;
        print_r($this->checkpoints);

        if (!$direction) {
            $this->revertToLastCheckpoint();
        }
    }

    private function evaluateAndGetDirection()
    {
        $options = 0;
        $nextPosition = null;

        foreach ($this->orderDirection() as $direction) {
            $option = $this->readMaze($direction);

            if (in_array($option, ['R', 'D', 'S', 'E'])) {
                $options++;
                if (!$nextPosition) {
                    $nextPosition = $this->getNextPosition($direction);
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

    private function makeCheckpoint(int $options)
    {
        $this->checkpoints[] = [
            'location' => $this->currentLocation,
            'options'  => $options,
        ];
    }

    private function getNextPosition($direction)
    {
        $floor = $this->currentLocation[0];
        $x     = $this->currentLocation[1];
        $y     = $this->currentLocation[2];

        if ($direction == self::NORTH && $y < self::MAX) {
            return [$floor, $x, $y + 1];
        }
        if ($direction == self::EAST && $x < self::MAX) {
            return [$floor, $x + 1, $y];
        }
        if ($direction == self::SOUTH && $y > self::MIN) {
            return [$floor, $x, $y -1];
        }
        if ($direction == self::WEST && $x > self::MIN) {
            return [$floor, $x - 1, $y];
        }
        if ($direction == self::UP && $floor < self::MAX_FLOOR) {
            return [$floor + 1, $x, $y];
        }
        if ($direction == self::DOWN && $floor > self::MIN) {
            return [$floor - 1, $x, $y];
        }
    }

    private function orderDirection()
    {
        return [self::NORTH, self::EAST, self::SOUTH, self::WEST, self::DOWN, self::UP];
    }

    private function isExit()
    {
        if ($this->readMaze() == 'E') {
            return true;
        }

        return false;
    }

    private function readMaze($direction = null)
    {
        $floor = $this->currentLocation[0];
        $x     = $this->currentLocation[1];
        $y     = $this->currentLocation[2];

        if (!$direction) {
            return $this->maze[$floor][$x][$y];
        }

        if ($direction == self::NORTH && $y < self::MAX) {
            return $this->maze[$floor][$x][$y + 1];
        }
        if ($direction == self::EAST && $x < self::MAX) {
            return $this->maze[$floor][$x + 1][$y];
        }
        if ($direction == self::SOUTH && $y > self::MIN) {
            return $this->maze[$floor][$x][$y -1];
        }
        if ($direction == self::WEST && $x > self::MIN) {
            return $this->maze[$floor][$x - 1][$y];
        }
        if ($direction == self::UP && $floor < self::MAX_FLOOR) {
            return $this->maze[$floor + 1][$x][$y];
        }
        if ($direction == self::DOWN && $floor > self::MIN) {
            return $this->maze[$floor - 1][$x][$y];
        }
    }

    // private function isStaircase()
    // {
    //     if ($this->readMaze() == 'S') {
    //         return true;
    //     }

    //     return false;
    // }

    private function revertToLastCheckpoint()
    {

    }

    private function move()
    {

    }

    private function getCurrentLocation()
    {
        if (!$this->currentLocation) {
            $this->currentLocation = $this->getRandomStartLocation();
        }

        return $this->currentLocation;
    }

    private function getRandomStartLocation()
    {
        return [rand(0, 2), rand(0, 19), rand(0, 19)];
    }

    private $maze = [
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