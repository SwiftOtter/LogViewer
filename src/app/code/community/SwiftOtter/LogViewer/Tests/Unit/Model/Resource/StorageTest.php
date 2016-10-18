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

class SwiftOtter_LogViewer_Tests_Unit_Model_Resource_StorageTest extends PHPUnit_Framework_TestCase
{
    public function testStoreFunctionKeepsValue()
    {
        $storageResource = new SwiftOtter_LogViewer_Model_Resource_Storage();
        $storageResource->write('test');

        $value = $this->getValueOfProperty($storageResource, 'logs');

        $this->assertTrue(is_array($value));
        $this->assertTrue(count($value) > 0);
    }

    protected function getValueOfProperty($class, $property)
    {
        $storeProperty = new ReflectionProperty($class, $property);
        $storeProperty->setAccessible(true);

        return $storeProperty->getValue($class);
    }
}