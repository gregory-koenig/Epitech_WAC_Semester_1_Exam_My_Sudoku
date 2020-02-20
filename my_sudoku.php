<?php

/**
 * [check if a value is already present in a line]
 * @param {$grid [array]}
 * @param {$y [integer]}
 * @param {$value [integer]}
 * @return {$is_present [boolean]}
 */
function check_horizontal($grid, $y, $value) {
    $is_present = false;
    for ($i = 0; $i <= 2; $i++) {
        if ($grid[$y][$i] == $value) {
            $is_present = true;
        }
    }
    return $is_present;
}

/**
 * [check if a value is already present in a column]
 * @param {$grid [array]}
 * @param {$x [integer]}
 * @param {$value [integer]}
 * @return {$is_present [boolean]}
 */
function check_vertical($grid, $x, $value) {
    $is_present = false;
    for ($i = 0; $i <= 2; $i++) {
        if ($grid[$i][$x] == $value) {
            $is_present = true;
        }
    }
    return $is_present;
}

/**
 * [check if a value is already present in his square of 3*3]
 * @param {$grid [array]}
 * @param {$y [integer]}
 * @param {$x [integer]}
 * @param {$value [integer]}
 * @return {$is_present [boolean]}
 */
function check_square($grid, $value) {
    $is_present = false;
    for ($y = 0; $y <= 2; $y++) {
        for ($x = 0; $x <= 2; $x++) {
            if ($grid[$y][$x] == $value) {
                $is_present = true;
            }
        }
    }
    return $is_present;
}

/**
 * [fill a cell with a value]
 * [try each values until check_horizontal, check_vertical, and check_square return true]
 * @param {$grid [array]}
 * @param {$y [integer]}
 * @param {$x [integer]}
 */
function fill_cell(&$grid, $y, $x) {
    for ($value = 1; $value <= 9; $value++) {
        for ($i = 0; $i <= count($grid) - 1; $i++) {
            foreach ($grid[$i] as &$val) {
                $h = check_horizontal($grid, $y, $value);
                $v = check_vertical($grid, $x, $value);
                $s = check_square($grid, $value);
                if ($val == 0 && $h != true && $v != true && $s != true) {
                    $val = $value;
                }
            }
        }
    }
}

/**
 * [draw the grid]
 */
function draw($grid) {
    foreach ($grid as $value) {
        echo "_____________\n";
        $line = implode(' | ', $value);
        echo "| $line |\n";
    }
    echo "_____________\n";
}

/**
 * [fill the grid of cells with values]
 * [this function calls fill_cell for each cells of the grid]
 * [call the draw function at the end of the loops]
 * @param {$grid [array]}
 */
function fill_grid($grid) {
    for ($y = 0; $y <= count($grid) - 1; $y++) {
        for ($x = 0; $x <= count($grid[$y]) - 1; $x++) {
            fill_cell($grid, $y, $x);
        }
    }

    draw($grid);
}

$grid = array(
    array(0, 0, 4),
    array(0, 0, 0),
    array(1, 0, 9)
);

fill_grid($grid);