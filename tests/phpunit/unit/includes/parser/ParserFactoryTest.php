<?php

use MediaWiki\BadFileLookup;
use MediaWiki\Config\ServiceOptions;
use MediaWiki\Http\HttpRequestFactory;
use MediaWiki\Languages\LanguageConverterFactory;
use MediaWiki\Linker\LinkRendererFactory;
use MediaWiki\Preferences\SignatureValidatorFactory;
use MediaWiki\SpecialPage\SpecialPageFactory;
use MediaWiki\Tidy\TidyDriverBase;
use MediaWiki\User\UserFactory;
use MediaWiki\User\UserNameUtils;
use MediaWiki\User\UserOptionsLookup;
use MediaWiki\Utils\UrlUtils;
use Wikimedia\TestingAccessWrapper;

/**
 * @covers ParserFactory
 */
class ParserFactoryTest extends MediaWikiUnitTestCase {
	private function createFactory() {
		$options = new ServiceOptions(
			Parser::CONSTRUCTOR_OPTIONS,
			array_combine(
				Parser::CONSTRUCTOR_OPTIONS,
				array_fill( 0, count( Parser::CONSTRUCTOR_OPTIONS ), null )
			)
		);

		// Stub out a MagicWordFactory so the Parser can initialize its
		// function hooks when it is created.
		$mwFactory = $this->getMockBuilder( MagicWordFactory::class )
			->disableOriginalConstructor()
			->onlyMethods( [ 'get', 'getVariableIDs' ] )
			->getMock();
		$mwFactory
			->method( 'get' )->will( $this->returnCallback( function ( $arg ) {
				$mw = $this->getMockBuilder( MagicWord::class )
					->disableOriginalConstructor()
					->onlyMethods( [ 'getSynonyms' ] )
					->getMock();
				$mw->method( 'getSynonyms' )->willReturn( [] );
				return $mw;
			} ) );
		$mwFactory
			->method( 'getVariableIDs' )->willReturn( [] );

		$languageConverterFactory = $this->getMockBuilder( LanguageConverterFactory::class )
			->disableOriginalConstructor()
			->getMock();

		$urlUtils = $this->createMock( UrlUtils::class );
		$urlUtils->method( 'validProtocols' )->willReturn( 'http:\/\/|https:\/\/' );
		$urlUtils->expects( $this->never() )->method( $this->anythingBut( 'validProtocols' ) );

		$factory = new ParserFactory(
			$options,
			$mwFactory,
			$this->createNoOpMock( Language::class ),
			$urlUtils,
			$this->createNoOpMock( SpecialPageFactory::class ),
			$this->createNoOpMock( LinkRendererFactory::class ),
			$this->createNoOpMock( NamespaceInfo::class ),
			new TestLogger(),
			$this->createNoOpMock( BadFileLookup::class ),
			$languageConverterFactory,
			$this->createHookContainer(),
			$this->createNoOpMock( TidyDriverBase::class ),
			$this->createNoOpMock( WANObjectCache::class ),
			$this->createNoOpMock( UserOptionsLookup::class ),
			$this->createNoOpMock( UserFactory::class ),
			$this->createNoOpMock( TitleFormatter::class ),
			$this->createNoOpMock( HttpRequestFactory::class ),
			$this->createNoOpMock( TrackingCategories::class ),
			$this->createNoOpMock( SignatureValidatorFactory::class ),
			$this->createNoOpMock( UserNameUtils::class )
		);
		return $factory;
	}

	/**
	 * @covers ParserFactory::__construct
	 */
	public function testConstructor() {
		$factory = $this->createFactory();
		$this->assertNotNull( $factory, "Factory should be created correctly" );
	}

	/**
	 * @covers ParserFactory::create
	 */
	public function testCreate() {
		$factory = $this->createFactory();
		$parser = $factory->create();
		$this->assertNotNull( $factory, "Factory should be created correctly" );
		$this->assertNotNull( $parser, "Factory should create parser correctly" );
		$this->assertInstanceOf( Parser::class, $parser );

		$parserWrapper = TestingAccessWrapper::newFromObject( $parser );
		$factoryWrapper = TestingAccessWrapper::newFromObject( $factory );
		$this->assertSame(
			$factoryWrapper->languageConverterFactory, $parserWrapper->languageConverterFactory
		);
		$this->assertSame(
			$factory, $parserWrapper->factory
		);
	}
}
