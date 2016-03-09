<?php

class TDDtest extends PHPUnit_Framework_TestCase{

  public function setUp(){
    $faker = \Faker\Factory::create();
    $login_form = array('name' => 'admin', 'pass' => 'admin');
    user_authenticate($login_form);
    $this->node = new stdClass();
    $this->node->type = 'article';
    node_object_prepare($this->node);
    $this->node->language = LANGUAGE_NONE;
    $this->node->title = 'Victor bonjour !';
    $this->node->body = $faker->text('85');
    node_save($this->node);
  }


  public function testLogin(){
    $this->assertEquals(1, user_authenticate('admin', 'admin'));
  }

  public function test_tdd_help(){
    $this->assertEquals("<p>Aide pour le module TDD.</p>", tdd_help('admin/content/help#tdd'), "le message d'aide ne correspond pas !");
  }

  public function test_tdd_search_words(){
    $query = "Bonjour";
    $words = tdd_search_word($query);
    $this->assertEquals(count($words), 2);
    foreach($words as $word) {
      $this->assertTrue(stripos($word, $query) >0, "Mot absent ");
    }

  }

  public function test_tdd_for_empty_word_query()
  {
    $words = tdd_search_word(NULL);
    $this->assertEquals(0, count($words));

    $words = tdd_search_word('');
    $this->assertEquals(0, count($words));
  }

  public function teardown()
  {
    node_delete($this->node->nid);
  }

}
