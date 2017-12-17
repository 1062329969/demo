<?php
/**
 * Created by PhpStorm.
 * User: 16444
 * Date: 2017/12/16
 * Time: 22:21
 */

if(!function_exists('getLastSql'))
{
    function getLastSql() {
        DB::listen(function ($sql) {
            foreach ($sql->bindings as $i => $binding) {
                if ($binding instanceof \DateTime) {
                    $sql->bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
                } else {
                    if (is_string($binding)) {
                        $sql->bindings[$i] = "'$binding'";
                    }
                }
            }
            $query = str_replace(array('%', '?'), array('%%', '%s'), $sql->sql);
            $query = vsprintf($query, $sql->bindings);
            print_r($query);
            echo '<br />';
        });
    }
}

