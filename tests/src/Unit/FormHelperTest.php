<?php

namespace Drupal\Tests\canada\Unit;

use Drupal\Core\Render\ElementInfoManagerInterface;
use Drupal\canada\FormHelper;
use Drupal\Tests\UnitTestCase;

/**
 * @group canada
 *
 * @coversDefaultClass \Drupal\canada\FormHelper
 */
class FormHelperTest extends UnitTestCase {

  /**
   * @covers ::applyStandardProcessing
   */
  public function testApplyStandardProcessing() {
    $element_info = $this->prophesize(ElementInfoManagerInterface::class);
    $element_info->getInfo('location')->willReturn([
      '#process' => [
        'process_location',
      ],
    ]);
    $element = ['#type' => 'location'];

    $form_helper = new FormHelper($element_info->reveal());
    $form_helper->applyStandardProcessing($element);

    $this->assertEquals(['process_location'], $element['#process']);
  }

}
