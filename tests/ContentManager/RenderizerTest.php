<?php

/*
 * This file is part of the Yosymfony\Spress.
 *
 * (c) YoSymfony <http://github.com/yosymfony>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Yosymfony\Spress\Tests;

use Symfony\Component\Finder\SplFileInfo;

use Yosymfony\Spress\Application;
use Yosymfony\Spress\ContentLocator\FileItem;
use Yosymfony\Spress\ContentManager\PageItem;

class RenderizerTest extends \PHPUnit_Framework_TestCase
{
    protected $app;
    protected $renderizer;
    protected $configuration;
    protected $pagesDir;
    
    public function setUp()
    {
        $this->app = new Application();
        $this->configuration = $this->app['spress.config'];
        $this->configuration->loadLocal('./tests/fixtures/project');
        $this->renderizer = $this->app['spress.cms.renderizer'];
        $this->pagesDir = realpath(__DIR__ .'/../fixtures/project/');
    }
    
    public function testRenderString()
    {
        $result = $this->renderizer->renderString('Hi {{ name }}', ['name' => 'Yo! Symfony']);
        
        $this->assertEquals('Hi Yo! Symfony', $result);
    }
    
    public function testRenderItem()
    {
        
        $path = $this->pagesDir . '/about/index.html';
        $fileInfo = new SplFileInfo($path, '', 'index.html');
        $fileItem = new FileItem($fileInfo, FileItem::TYPE_PAGE);
        $item = new PageItem($fileItem, $this->configuration);
        $this->renderizer->renderItem($item);
        
        $this->assertStringStartsWith('<!DOCTYPE HTML>', $item->getContent());
    }
    
    public function testExistsLayout()
    {
        $result = $this->renderizer->existsLayout('default');
        
        $this->assertTrue($result);
    }
    
    public function testNotExistsLayout()
    {
        $result = $this->renderizer->existsLayout('not-exists-layout');
        
        $this->assertFalse($result);
    }
}