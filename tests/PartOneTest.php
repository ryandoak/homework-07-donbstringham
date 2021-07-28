<?php
/**
 * Unit-test for Part 1
 *
 * PHP Version 7
 *
 * @category UnitTests
 * @package  Tests
 * @author   Don Stringham <donstringham@weber.edu>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://weber.edu
 */
declare(strict_types=1);
namespace App\Tests;

use PHPUnit\Framework\TestCase;

/**
 * PartOneTest tests database validation
 *
 * @property string _host
 * @property string _port
 * @property string _username
 * @property string _password
 * @property \MySQLi _connection
 * @property string _database
 * @category UnitTests
 * @package  App\Tests
 * @author   Don Stringham <donstringham@weber.edu>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://weber.edu
 */
class PartOneTest extends TestCase
{
    /**
     * Set up data needed for every unit-test
     *
     * @category UnitTests
     * @package  App\Tests
     * @author   Don Stringham <donstringham@weber.edu>
     * @license  MIT https://opensource.org/licenses/MIT
     * @link     https://weber.edu
     * @return   void
     */
    public function setUp(): void
    {
        $this->_host = "143.110.159.170";
        $this->_port = "3306";
        $this->_username = "donstringham";
        $this->_password = "letmein";
        $this->_connection = null;
        $this->_database = 'donstringham';
        $this->_connection = mysqli_connect(
            $this->_host,
            $this->_username,
            $this->_password
        );
        $this->_connection->select_db($this->_database);
    }

    /**
     * Tear down data needed for every unit-test
     *
     * @category UnitTests
     * @package  App\Tests
     * @author   Don Stringham <donstringham@weber.edu>
     * @license  MIT https://opensource.org/licenses/MIT
     * @link     https://weber.edu
     * @return   void
     */
    public function tearDown() : void
    {
        // $query = "TRUNCATE donstringham.test";
        // $this->_connection->query($query);
        $this->_connection->close();
    }

    /**
     * Tests if unit-test can be run
     *
     * @category UnitTests
     * @package  App\Tests
     * @author   Don Stringham <donstringham@weber.edu>
     * @license  MIT https://opensource.org/licenses/MIT
     * @link     https://weber.edu
     * @return   void
     */
    public function testCanary(): void
    {
        // arrange & act & assert
        $this->assertTrue(true);
    }

    /**
     * Tests select all
     *
     * @category UnitTests
     * @package  App\Tests
     * @author   Don Stringham <donstringham@weber.edu>
     * @license  MIT https://opensource.org/licenses/MIT
     * @link     https://weber.edu
     * @return   void
     */
    public function testSelectAll(): void
    {
        // arrange
        $query = "INSERT INTO test (col_number, col_string, col_dttm) VALUES(1, 'One', now())";
        $this->_connection->query($query);
        $query = "SELECT * FROM donstringham.test";
        $result = $this->_connection->query($query);
        // act
        $row = $result->fetch_row();
        // assert
        $this->assertEquals('1', $row[0]);
    }

    /**
     * Tests insert first row
     *
     * @category UnitTests
     * @package  App\Tests
     * @author   Don Stringham <donstringham@weber.edu>
     * @license  MIT https://opensource.org/licenses/MIT
     * @link     https://weber.edu
     * @return   void
     */
    public function testInsertFirstRow(): void
    {
        // arrange
        $query = "INSERT INTO test (col_number, col_string, col_dttm) VALUES(1, 'One', now());";
        // act
        $result = $this->_connection->query($query);
        // assert
        $this->assertTrue($result);
    }

    /**
     * Tests insert first row improper validation
     *
     * @category UnitTests
     * @package  App\Tests
     * @author   Don Stringham <donstringham@weber.edu>
     * @license  MIT https://opensource.org/licenses/MIT
     * @link     https://weber.edu
     * @return   void
     */
    public function testBadValidationStringForInt(): void
    {
        // arrange
        $query = "INSERT INTO test (col_number, col_string, col_dttm) VALUES('One', 'One', now());";
        // act
        $result = $this->_connection->query($query);
        // assert
        $this->assertFalse($result);
    }

    /**
     * Tests insert first row improper validation
     *
     * @category UnitTests
     * @package  App\Tests
     * @author   Don Stringham <donstringham@weber.edu>
     * @license  MIT https://opensource.org/licenses/MIT
     * @link     https://weber.edu
     * @return   void
     */
    public function testBadValidationReversedDTTM(): void
    {
        // arrange
        $query = "INSERT INTO test (col_number, col_string, col_dttm) VALUES(1, 'One', '08:44:44 2020-10-10');";
        // act
        $result = $this->_connection->query($query);
        // assert
        $this->assertFalse($result);
    }
}
