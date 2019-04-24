<?php

namespace thesebas\itertools;

function array_pick($array, $keys)
{
    return array_intersect_key($array, array_flip($keys));
}

function array_omit($array, $keys)
{
    return array_diff_key($array, array_flip($keys));
}

function array_any($array, $callable)
{
    return count(array_filter($array, $callable)) > 0;
}

function array_all($array, $callable)
{
    return count(array_filter($array, $callable)) == count($array);
}

function array_zip(...$arrays)
{
    return array_map(null, ...$arrays);
}

function array_assoc_in_order($array, $order)
{
    return array_map(function ($key) use ($array) {
        return $array[$key] ?? null;
    }, $order);
}
/**
 *  selects and returns indexed elements
 *
 * @param $array   - eg [a, b, c, d]
 * @param $key_pos - eg [k1=>3, k2=>1]
 *
 * @return array - eg [k1=>d, k2=>b]
 */
function array_select($array, $key_pos)
{
    $r = [];
    foreach ($key_pos as $k => $v) {
        $r[$k] = $array[$v];
    }
    return $r;
}

function array_reducek($array, $callback, $initial = null)
{
    $ret = $initial;
    foreach ($array as $key => $value) {
        $ret = $callback($ret, $value, $key);
    }
    return $ret;
}

/**
 * @param mixed ...$params
 *
 * @return array
 */
function mkarray(...$params)
{
    return $params;
}