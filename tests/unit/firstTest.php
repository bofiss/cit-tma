<?php

class FirstTest extends PHPUnit_Framework_TestCase{
  public function testLoginChk(){
    $this->assertEquals(1, user_authenticate('admin', 'admin'));
  }
}
