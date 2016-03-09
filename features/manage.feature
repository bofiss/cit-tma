Feature: Content Management
  When I log into the website
  As an administrator
  I should be able to create, edit, and delete page content

 @api
  Scenario: An administrative user should be able create page content
    Given I am logged in as a user with the "administrator" role
    When I go to "node/add/page"
    Then I should not see "Access denied"


  Scenario: An administrator should be able to edit page content
    Given "page" nodes:
      | title      | body          | status  |
      | Test page  | test content  | 1       |
    When I go to "admin/content"
    And I click "edit" in the "Test page" row
    Then I should not see "Access denied"

  Scenario: An administrator should be able to delete page content
    Given "page" nodes:
      | title      | body          | status  |
      | Test page  | test content  | 1       |
    When I go to "admin/content"
    And I click "delete" in the "Test page" row
    Then I should not see "Access denied"
