<?php
namespace Step\Acceptance;
use LoginPage;
use ArticleNode;

class UserSteps extends \AcceptanceTester
{

    public function login($name, $pass)
    {
        $I = $this;
        $I->amOnPage(LoginPage::$URL);
        $I->submitForm(LoginPage::$formId,
          [
           LoginPage::$usernameField => $name,
           LoginPage::$passwordField => $pass
          ]
        );
    }

    public function create_article()
    {
        $I = $this;
        $node_title = $this->faker->text(30);
        $I->submitForm(
          ArticleNode::$nodeFormId,
          [
          ArticleNode::$titleEditField => $node_title,
          ArticleNode::$bodyEditField => $this->faker->text(80),
          ]
        );
    }

}
