Feature: Login

  Scenario: Ensure the login link is available for anonymous users
    Given I am an anonymous user
     When I am on the homepage
     Then I should see an "input#edit-name" element
      And I should see an "input#edit-pass" element


  Scenario: A user should see "Facere a provident ipsum." on the homepage
    Given I am on the homepage
     Then I should see the text "Facere a provident ipsum."

  @api
  Scenario: Ensure as a logged in user, I can log out.
    Given I am logged in as a user with the "authenticated user" role
     When I click "Log out"
     Then I should be on the homepage
      And I should see "User login"
