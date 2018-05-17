<?php
    function debug($arr) {
        echo "<pre>" . print_r($arr, true) ."</pre>";
    }

/**
 * @param $arr
 * @return array|null
 */
function fuck($arr) {
        if($arr===null)
        {
            return null;
        }
        else
        {
            $tree = [];
            foreach($arr as $id=>&$node){
                if(!$node['parent_id'])
                    $tree[$id] = &$node;
                else
                    $arr[$node['parent_id']]['childs'][$node['id']] = &$node;
            }
            return $tree;
        }
    }


