<?php
namespace app\create;
//迷宫组件

interface MazeBuilder
{
    function builderMaze();

    function builderDoor($r1, $r2);

    function builderRoom($num);

    function getMaze();
}