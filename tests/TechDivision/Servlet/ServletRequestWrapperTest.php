<?php

/**
 * TechDivision\Servlet\ServletRequestWrapperTest
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @category  Appserver
 * @package   TechDivision_Servlet
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.appserver.io
 */

namespace TechDivision\Servlet;

/**
 * Test for servlet request wrapper implementation.
 *
 * @category  Appserver
 * @package   TechDivision_Servlet
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.appserver.io
 */
class ServletRequestWrapperTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test if the request version is returned correctly.
     *
     * @return void
     */
    public function testGetVersion()
    {
        
        // create a stub for the ServletRequest interface
        $stub = $this->getMock('\TechDivision\Servlet\ServletRequest');
        
        // Configure the stub.
        $stub->expects($this->any())
             ->method('getVersion')
             ->will($this->returnValue($version = 'HTTP/1.1'));

        // create a new wrapper instance
        $wrapper = new ServletRequestWrapper();
        $wrapper->injectRequest($stub);
        
        // check if the version has been returned
        $this->assertSame($version, $wrapper->getVersion());
    }
}
