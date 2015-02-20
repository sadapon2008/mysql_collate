<?php

App::uses('Mysql', 'Model/Datasource/Database');

class MysqlCollate extends Mysql {

    protected function _parseKey($key, $value, Model $Model = null) {
        $result = parent::_parseKey($key, $value, $Model);

        if(($Model !== null) && ($Model->Behaviors->loaded('MysqlCollate'))) {
            if(preg_match('/^([^\s]+)/', $key, $matches)) {
                $field = $matches[1];
                $collate = $Model->getMysqlCollate($field);
                if(!empty($collate)) {
                    $result .= ' COLLATE ' . $collate;
                }
            }
        }

        return $result;
    }
}
