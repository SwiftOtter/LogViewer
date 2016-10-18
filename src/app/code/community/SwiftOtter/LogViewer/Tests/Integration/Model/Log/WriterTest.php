<?php
/**
 * SwiftOtter_Base is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * SwiftOtter_Base is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with SwiftOtter_Base. If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Joseph Maxwell
 * @copyright SwiftOtter Studios, 10/18/16
 * @package default
 **/

class SwiftOtter_LogViewer_Tests_Integration_Model_Log_WriterTest extends PHPUnit_Framework_TestCase
{
    const REGISTRY_KEY = '_resource_singleton/SwiftOtter_LogViewer/Storage';

    /**
     * @var PHPUnit_Framework_MockObject_Stub
     */
    protected $storageClass;

    protected function setUp()
    {
        if (Mage::registry(self::REGISTRY_KEY) !== null) {
            Mage::unregister(self::REGISTRY_KEY);
        }

        parent::setUp();
    }


    protected function tearDown()
    {
        if (Mage::registry(self::REGISTRY_KEY) !== null) {
            Mage::unregister(self::REGISTRY_KEY);
        }

        parent::tearDown();
    }

    public function testLogFeaturesCapturesInput()
    {
        $storageResource = $this->getMockBuilder(SwiftOtter_LogViewer_Model_Resource_Storage::class)
            ->setMethods(['write'])
            ->getMock();

        $storageResource->expects($this->atLeastOnce())
            ->method('write')
            ->with('Test');

        Mage::register(self::REGISTRY_KEY, $storageResource);

        Mage::log('Test');
    }
}