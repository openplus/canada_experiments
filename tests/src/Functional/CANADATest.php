<?php

namespace Drupal\Tests\canada_experiments\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests Canada installation profile expectations.
 *
 * @group canada
 */
class CANADATest extends BrowserTestBase {

  /**
   * Installation profile.
   *
   * @var string
   */
  protected $profile = 'canada';

  /**
   * Test for the login.
   */
  public function testOpenDataLogin() {
    // Create a user to check the login.
    $user = $this->createUser();

    // Log in our user.
    $this->drupalLogin($user);

    // Verify that logged in user can access the logout link.
    $this->drupalGet('user');

    $this->assertLinkByHref('/user/logout');
  }

}
