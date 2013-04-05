<?php

class EasyPost_Address extends EasyPost_Resource {
  public static function constructFrom($values, $apiKey=null) {
    $class = get_class();
    return self::scopedConstructFrom($class, $values, $apiKey);
  }

  public static function retrieve($id, $apiKey=null) {
    $class = get_class();
    return self::_scopedRetrieve($class, $id, $apiKey);
  }

  public static function all($params=null, $apiKey=null) {
    $class = get_class();
    return self::_scopedAll($class, $params, $apiKey);
  }

  public static function create($params=null, $apiKey=null) {
    $class = get_class();
    return self::_scopedCreate($class, $params, $apiKey);
  }
    
  public function save() {
    $class = get_class();
    return self::_scopedSave($class);
  }

  public function verify($params=null) {
    $requestor = new EasyPost_Requestor($this->_apiKey);
    $url = $this->instanceUrl() . '/verify';
    list($response, $apiKey) = $requestor->request('get', $url, $params);
    print_r($response);
    $this->refreshFrom($response, $apiKey);
    return $this;
  }
}