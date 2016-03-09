<?php
namespace Page\Acceptance;

class ArticleNode
{

   public static $nodeAddFormURL = '/node/add/article';
   public static $pageTitleSelector = '#page-title';
   public static $nodeFormId = '#article-node-form';
   public static $titleEditField = '#edit-title';
   public static $bodyField = '#edit-body-und-0-value';
   public static $Login= 'body.logged-in';
   protected $acceptanceTester;



   public static function route()
   {
       return static::$nodeAddFormURL;
   }



   public function __construct(\AcceptanceTester $I)
   {
       $this->acceptanceTester = $I;
   }

}
