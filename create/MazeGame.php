<?php
namespace app\create;

class MazeGame
{
    /**
     * @return Maze
     */
    public static function createMaze()
    {
        $maze = new Maze();
        $room1 = new Room(1);
        $room2 = new Room(2);

        $door = new Door($room1, $room2);

        $maze->addRoom($room1);
        $maze->addRoom($room2);

        $room1->setSide('NORTH', new Wall());
        $room1->setSide('SOUTH', new Wall());
        $room1->setSide('WEST', new Wall());
        $room1->setSide('EAST', new Wall());

        $room2->setSide('NORTH', new Wall());
        $room2->setSide('SOUTH', new Wall());
        $room2->setSide('WEST', new Wall());
        $room2->setSide('EAST', $door);

        return $maze;
    }

    //抽象工厂


    /**
     * $maze = createMazeByFactory(new BoomMazeFactory());
     *
     * @param MazeFactory $factory
     * @return Maze
     */
    public static function createMazeByFactory(MazeFactory $factory)
    {
        $maze = $factory->makeMaze();

        $room1 = $factory->makeRoom(1);
        $room2 = $factory->makeRoom(2);
        $door = $factory->makeDoor();

        $maze->addRoom($room1);
        $maze->addRoom($room2);

        $room1->setSide('NORTH', $factory->makeWall());
        $room1->setSide('SOUTH', $factory->makeWall());
        $room1->setSide('WEST', $factory->makeWall());
        $room1->setSide('EAST', $factory->makeWall());

        $room2->setSide('NORTH', $factory->makeWall());
        $room2->setSide('SOUTH', $factory->makeWall());
        $room2->setSide('WEST', $factory->makeWall());
        $room2->setSide('EAST', $door);

        return $maze;
    }

    /**
     * @param Builder $builder
     * @return mixed
     */
    public static function buildMaze(MazeBuilder $builder)
    {
        $builder->builderMaze();
        $builder->builderRoom(1);
        $builder->builderRoom(2);
        $builder->builderDoor(1, 2);

        $maze = $builder->getMaze();

        return $maze;
    }
}