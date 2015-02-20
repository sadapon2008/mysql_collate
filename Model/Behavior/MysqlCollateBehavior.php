<?php

App::uses('ModelBehavior', 'Model');

class MysqlCollateBehavior extends ModelBehavior {

    public function setup(Model $model, $config = array()) {
        parent::setup($model, $config);
        if (!isset($this->settings[$model->alias])) {
            $this->settings[$model->alias] = array();
        }
        $this->settings[$model->alias] = array_merge($this->settings[$model->alias], (array)$config);
    }

    public function getMysqlCollate(Model $model, $key) {
        if(!isset($key) || !is_string($key)) {
            return null;
        }
        if (!isset($this->settings[$model->alias])) {
            return null;
        }
        if (!isset($this->settings[$model->alias][$key]) || !is_string($this->settings[$model->alias][$key])) {
            return null;
        }
        $value = $this->settings[$model->alias][$key];
        return $value;
    }
}
