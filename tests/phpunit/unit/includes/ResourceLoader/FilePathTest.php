<?php

namespace MediaWiki\Tests\Unit\ResourceLoader;

use MediaWiki\ResourceLoader\FilePath;
use MediaWikiUnitTestCase;

/**
 * @covers \MediaWiki\ResourceLoader\FilePath
 */
class FilePathTest extends MediaWikiUnitTestCase {

	public function testConstructor() {
		$path = new FilePath( 'dummy/path', '/local', '/remote' );

		$this->assertInstanceOf( FilePath::class, $path );
	}

	public function testGetterSimple() {
		$path = new FilePath( 'dummy/path', '/local', '/remote' );

		$this->assertSame( '/local/dummy/path', $path->getLocalPath() );
		$this->assertSame( '/remote/dummy/path', $path->getRemotePath() );
		$this->assertSame( '/local', $path->getLocalBasePath() );
		$this->assertSame( '/remote', $path->getRemoteBasePath() );
		$this->assertSame( 'dummy/path', $path->getPath() );
	}

	public function testGetterWebRoot() {
		$path = new FilePath( 'dummy/path', '/local', '/' );

		$this->assertSame( '/local/dummy/path', $path->getLocalPath() );
		// No double slash (T284391)
		$this->assertSame( '/dummy/path', $path->getRemotePath() );
		$this->assertSame( '/local', $path->getLocalBasePath() );
		$this->assertSame( '/', $path->getRemoteBasePath() );
		$this->assertSame( 'dummy/path', $path->getPath() );
	}

	public function testGetterNoBase() {
		$path = new FilePath( 'dummy/path', '', '' );

		// No transformation
		$this->assertSame( 'dummy/path', $path->getLocalPath() );
		$this->assertSame( 'dummy/path', $path->getRemotePath() );
		$this->assertSame( '', $path->getLocalBasePath() );
		$this->assertSame( '', $path->getRemoteBasePath() );
		$this->assertSame( 'dummy/path', $path->getPath() );
	}
}
