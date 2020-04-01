<?php
namespace app\create;
//迷宫组件

class MazeFactory
{
    function makeMaze()
    {
        return new Maze();
    }

    function makeDoor($r1, $r2)
    {
        return new Door($r1, $r2);
    }

    function makeRoom($num)
    {
        return new Room($num);
    }

    function makeWall()
    {
        return new Wall();
    }
}