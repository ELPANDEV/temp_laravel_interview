<?php 

function x_unique_array_by_key(array $arr, string $key)
{
    $temp = array_unique(array_column($arr, $key));

	return array_values(array_intersect_key($arr, $temp));
}

function x_remove_accents($string)
{
    return preg_replace('~&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8'));
}