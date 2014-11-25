<?php
/**
 * Created by PhpStorm.
 * User: splitice
 * Date: 25-11-2014
 * Time: 6:22 PM
 */

namespace Radical\Web\Pagination;


interface IPaginationSource {
    function get_where($field, $value);
    function get_limit($start, $count);
    function getCount();
} 