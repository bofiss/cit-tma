<?php
require_once '/../_support/step/Acceptance/UserSteps.php';
use Page\Acceptance\LoginPage;
use Page\Acceptance\ArticleNode;

class AuthorPermissionsCest
{
    public function _before(AcceptanceTester $I)
    {
      $this->faker = Faker\Factory::create();
    }
    // tests
    // public function an_author_can_create_article_content(AcceptanceTester $I)
    // {
    //   $I->am('an autho');
    //   $I->wantTo('create an article');
    //   $I->expect('to be able to create an Article node.');
    //
    //   $I->amOnPage('/');
    //   $I->submitForm('#user-login-form', ['name' => "admin", "pass"=>"admin"]);
    //   $I->seeElement('body.logged-in');
    //   $I->click('Add content');
    //   $I->seeInCurrentUrl('/node/add');
    //   $I->seeResponseCodeIs('200');
    //   $I->click('Article');
    //   $I->seeInCurrentUrl('/node/add/article');
    //   $node_title = $this->faker->text(30);
    //   $I->submitForm(
    //     '#article-node-form',
    //     [
    //       'title'=>$node_title,
    //       'body[und][0][value]' => $this->faker->text(400),
    //     ]
    //   );
    //   $I->see($node_title, '#page-title');
    // }

    public function an_author_can_create_article_content(AcceptanceTester $I)
    {
      $I->am('an author');
      $I->wantTo('create an article');
      $I->expect('to be able to create an Article node.');

      $I->login('admin','admn');
      $I->seeElement('body.logged-in');
      $I->click('Add content');
      $I->seeInCurrentUrl('/node/add');
      $I->seeResponseCodeIs('200');
      $I->click('Article');
      $I->seeInCurrentUrl(ArticleNode::$nodeAddFormURL);
      $I->create_article();
      $I->see($node_title, ArticleNode::$pageTitleSelector);
    }
}
