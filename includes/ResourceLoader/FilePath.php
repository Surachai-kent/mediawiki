<?php
/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 */

namespace MediaWiki\ResourceLoader;

/**
 * An object to represent a path to a JavaScript/CSS file, along with a remote
 * and local base path, for use with ResourceLoaderFileModule.
 *
 * @ingroup ResourceLoader
 * @since 1.17
 */
class FilePath {
	/** @var string Local base path */
	protected $localBasePath;

	/** @var string Remote base path */
	protected $remoteBasePath;

	/** @var string Path to the file */
	protected $path;

	/**
	 * @param string $path Relative path to the file, no leading slash.
	 * @param string $localBasePath Base path to prepend when generating a local path.
	 * @param string $remoteBasePath Base path to prepend when generating a remote path.
	 *   Should not have a trailing slash unless at web document root.
	 */
	public function __construct( $path, $localBasePath = '', $remoteBasePath = '' ) {
		$this->path = $path;
		$this->localBasePath = $localBasePath;
		$this->remoteBasePath = $remoteBasePath;
	}

	/** @return string */
	public function getLocalPath() {
		return $this->localBasePath === '' ?
			$this->path :
			"{$this->localBasePath}/{$this->path}";
	}

	/** @return string */
	public function getRemotePath() {
		if ( $this->remoteBasePath === '' ) {
			// No base path configured
			return $this->path;
		}
		if ( $this->remoteBasePath === '/' ) {
			// In document root
			// Don't insert another slash (T284391).
			return $this->remoteBasePath . $this->path;
		}
		return "{$this->remoteBasePath}/{$this->path}";
	}

	/** @return string */
	public function getLocalBasePath() {
		return $this->localBasePath;
	}

	/** @return string */
	public function getRemoteBasePath() {
		return $this->remoteBasePath;
	}

	/** @return string */
	public function getPath() {
		return $this->path;
	}
}

/** @deprecated since 1.39 */
class_alias( FilePath::class, 'ResourceLoaderFilePath' );
