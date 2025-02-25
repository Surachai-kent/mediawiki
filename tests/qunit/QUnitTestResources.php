<?php
// These modules are only registered when $wgEnableJavaScriptTest is true
use MediaWiki\ResourceLoader\FilePath;

return [

	'sinonjs' => [
		'scripts' => [
			'tests/qunit/data/sinonjs-local.js',
			'resources/lib/sinonjs/sinon.js',
		],
		'targets' => [ 'desktop', 'mobile' ],
	],

	'mediawiki.qunit-testrunner' => [
		'scripts' => [
			'tests/qunit/data/testrunner.js',
		],
		'dependencies' => [
			'mediawiki.page.ready',
			'sinonjs',
		],
		'targets' => [ 'desktop', 'mobile' ],
	],

	'mediawiki.language.testdata' => [
		'localBasePath' => "{$GLOBALS['IP']}/resources/src/mediawiki.language/languages",
		'remoteBasePath' => "{$GLOBALS['wgResourceBasePath']}/resources/src/mediawiki.language/languages",
		'packageFiles' => [
			[
				'name' => 'mediawiki.jqueryMsg.testdata.js',
				'file' => new FilePath( __DIR__ . '/data/mediawiki.jqueryMsg.testdata.js' ),
			],
			[
				'name' => 'mediawiki.jqueryMsg.data.json',
				'file' => new FilePath( __DIR__ . '/data/mediawiki.jqueryMsg.data.json' ),
			],
			'bs.js',
			'dsb.js',
			'fi.js',
			'ga.js',
			'hsb.js',
			'hu.js',
			'hy.js',
			'la.js',
			'os.js',
			'sl.js',
		]
	],

	'test.MediaWiki' => [
		'scripts' => [
			'tests/qunit/suites/resources/startup/startup.test.js',
			'tests/qunit/suites/resources/startup/mediawiki.test.js',
			'tests/qunit/suites/resources/startup/mw.Map.test.js',
			'tests/qunit/suites/resources/startup/mw.loader.test.js',
			'tests/qunit/suites/resources/startup/mw.requestIdleCallback.test.js',
			'tests/qunit/suites/resources/jquery/jquery.accessKeyLabel.test.js',
			'tests/qunit/suites/resources/jquery/jquery.color.test.js',
			'tests/qunit/suites/resources/jquery/jquery.colorUtil.test.js',
			'tests/qunit/suites/resources/jquery/jquery.highlightText.test.js',
			'tests/qunit/suites/resources/jquery/jquery.lengthLimit.test.js',
			'tests/qunit/suites/resources/jquery/jquery.makeCollapsible.test.js',
			'tests/qunit/suites/resources/jquery/jquery.tablesorter.test.js',
			'tests/qunit/suites/resources/jquery/jquery.tablesorter.parsers.test.js',
			'tests/qunit/suites/resources/jquery/jquery.textSelection.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.errorLogger.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.jqueryMsg.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.jscompat.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.messagePoster.factory.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.String.byteLength.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.String.charAt.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.String.lcFirst.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.String.ucFirst.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.String.trimByteLength.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.storage.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.template.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.template.mustache.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.base.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.html.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.inspect.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.Title.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.toc.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.track.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.Uri.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.user.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.util.test.js',
			'tests/qunit/suites/resources/mediawiki.api/mediawiki.api.test.js',
			'tests/qunit/suites/resources/mediawiki.api/mediawiki.api.category.test.js',
			'tests/qunit/suites/resources/mediawiki.api/mediawiki.api.edit.test.js',
			'tests/qunit/suites/resources/mediawiki.api/mediawiki.api.messages.test.js',
			'tests/qunit/suites/resources/mediawiki.api/mediawiki.api.options.test.js',
			'tests/qunit/suites/resources/mediawiki.api/mediawiki.api.parse.test.js',
			'tests/qunit/suites/resources/mediawiki.api/mediawiki.api.upload.test.js',
			'tests/qunit/suites/resources/mediawiki.api/mediawiki.api.watch.test.js',
			'tests/qunit/suites/resources/mediawiki.api/mediawiki.rest.test.js',
			'tests/qunit/suites/resources/mediawiki.ForeignApi/mediawiki.ForeignApi.test.js',
			'tests/qunit/suites/resources/mediawiki.ForeignApi/mediawiki.ForeignRest.test.js',
			'tests/qunit/suites/resources/mediawiki.rcfilters/dm.FiltersViewModel.test.js',
			'tests/qunit/suites/resources/mediawiki.rcfilters/dm.FilterItem.test.js',
			'tests/qunit/suites/resources/mediawiki.rcfilters/dm.SavedQueryItemModel.test.js',
			'tests/qunit/suites/resources/mediawiki.rcfilters/dm.SavedQueriesModel.test.js',
			'tests/qunit/suites/resources/mediawiki.rcfilters/UriProcessor.test.js',
			'tests/qunit/suites/resources/mediawiki.widgets/MediaSearch/mediawiki.widgets.APIResultsQueue.test.js',
			'tests/qunit/suites/resources/mediawiki.widgets/Table/mediawiki.widgets.TableWidget.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.language.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.cldr.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.cookie.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.experiments.test.js',
			'tests/qunit/suites/resources/mediawiki/mediawiki.visibleTimeout.test.js',
		],
		'dependencies' => [
			'jquery.color',
			'jquery.highlightText',
			'jquery.lengthLimit',
			'jquery.makeCollapsible',
			'jquery.tablesorter',
			'jquery.textSelection',
			'mediawiki.api',
			'mediawiki.ForeignApi.core',
			'mediawiki.jqueryMsg',
			'mediawiki.messagePoster',
			'mediawiki.String',
			'mediawiki.storage',
			'mediawiki.Title',
			'mediawiki.toc',
			'mediawiki.Uri',
			'mediawiki.user',
			'mediawiki.template.mustache',
			'mediawiki.template',
			'mediawiki.util',
			'mediawiki.rcfilters.filters.ui',
			'mediawiki.language',
			'mediawiki.language.testdata',
			'mediawiki.cldr',
			'mediawiki.cookie',
			'mediawiki.experiments',
			'mediawiki.inspect',
			'mediawiki.visibleTimeout',
			'mediawiki.widgets.MediaSearch',
			'mediawiki.widgets.Table',
			'mediawiki.qunit-testrunner',
		],
	]
];
