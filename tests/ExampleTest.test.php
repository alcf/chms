<?php 
	class ExampleTest extends PHPUnit_Framework_TestCase {
		/**
		 * If the method name begins with "test", phpunit will recognize the method.
		 */
		public function testExampleOne() {
			$this->assertEquals(0, 0);
			$this->assertNotEquals(0, 1);
		}


		/**
		 * @test If the method's docblock has the test annotation, php unit will also recognize this method.
		 */
		public function anExampleUsingTheAnnotation() {
			$this->assertEquals(0, 0);
			$this->assertNotEquals(0, 1);
		}
	}
?>