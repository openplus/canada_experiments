<?php

namespace Drupal\Tests\canada\Kernel;

use Drupal\Core\Extension\Extension;
use Drupal\KernelTests\KernelTestBase;
use Drupal\canada\ComponentDiscovery;

/**
 * @group canada
 *
 * @coversDefaultClass \Drupal\canada\ComponentDiscovery
 */
class ComponentDiscoveryTest extends KernelTestBase {

  /**
   * The ComponentDiscovery under test.
   *
   * @var \Drupal\canada\ComponentDiscovery
   */
  protected $discovery;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->discovery = new ComponentDiscovery(
      $this->container->get('app.root')
    );
  }

  /**
   * @covers ::getAll
   */
  public function testGetAll() {
    $components = $this->discovery->getAll();

    $this->assertInstanceOf(Extension::class, $components['canada_core']);
  }

  /**
   * @covers ::getMainComponents
   */
  public function testGetMainComponents() {
    $components = $this->discovery->getMainComponents();

    $this->assertInstanceOf(Extension::class, $components['canada_core']);
  }

  /**
   * @covers ::getSubComponents
   */
  public function testGetSubComponents() {
    $components = $this->discovery->getSubComponents();

    $this->assertArrayNotHasKey('canada_core', $components);
  }

}
