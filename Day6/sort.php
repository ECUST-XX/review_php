<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/5
 * Time: 12:56
 */

// 排序算法
// 几个常用的简单算法
function bubble_sort($arr)
{
    $num = count($arr);
    for ($i = 0; $i < $num; $i++) {
        for ($p = 0; $p < $num - $i - 1; $p++) {
            if ($arr[$p] > $arr[$p + 1]) {
                $temp = $arr[$p];
                $arr[$p] = $arr[$p + 1];
                $arr[$p + 1] = $temp;
            }
        }
    }
    return $arr;
}


function select_sort($arr)
{
    $num = count($arr);
    for ($i = 0; $i < $num - 1; $i++) {
        $min = $arr[$i];
        for ($p = $i; $p < $num; $p++) {
            if ($arr[$p] < $min) {
                $temp = $min;
                $min = $arr[$p];
                $arr[$p] = $temp;
            }
        }
        $arr[$i] = $min;
    }
    return $arr;
}


function insert_sort($arr)
{
    $num = count($arr);
    for ($i = 0; $i < $num - 1; $i++) {
        $p = $i + 1;
        while ($p > 0 && $arr[$p] < $arr[$p - 1]) {
            $temp = $arr[$p];
            $arr[$p] = $arr[$p - 1];
            $arr[$p - 1] = $temp;
            $p--;
        }
    }
    return $arr;
}


function quick_sort($arr)
{
    $num = count($arr);
    if ($num < 1) {
        return $arr;
    } else {
        $left = [];
        $right = [];
        $temp = $arr[0];
        for ($i = 1; $i < $num; $i++) {
            if ($arr[$i] > $temp) {
                $right[] = $arr[$i];
            } else {
                $left[] = $arr[$i];
            }
        }

        $left = quick_sort($left);
        $right = quick_sort($right);
        return array_merge($left, [$arr[0]], $right);
    }
}


function bin_search($arr, $min_key, $max_key, $val)
{
    if ($val > $arr[$max_key] || $val < $arr[$min_key]) {
        return -1;
    }
    if ($min_key >= $max_key) {
        return $min_key;
    }
    $mid = (int)(($min_key + $max_key) / 2);
//    echo $min_key, "---", $mid, "----", $max_key, "\n";
    if ($arr[$mid] == $val) {
        return $mid;
    } elseif ($arr[$mid] < $val) {
        return bin_search($arr, $mid + 1, $max_key, $val);
    } else {
        return bin_search($arr, $min_key, $mid - 1, $val);
    }
}

$arr = [49, 38, 65, 97, 76, 13, 27, 49];
print_r(bubble_sort($arr));
print_r(select_sort($arr));
print_r(insert_sort($arr));
print_r(quick_sort($arr));
print_r(bin_search(quick_sort($arr), 0, count($arr) - 1, 97));

$stringOfText = "<p>This is a test</p>";
$expression = "/<(.*?)>(.*?)<\/(.*?)>/";
echo preg_replace($expression, "[url=file://2/]\\2[/url]", $stringOfText);

echo <<< EOF
fds
EOF;

//md5($str); 	sha1($str);
