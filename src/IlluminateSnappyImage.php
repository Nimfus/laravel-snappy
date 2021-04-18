<?php namespace Barryvdh\Snappy;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Knp\Snappy\Image;
use Illuminate\Filesystem\Filesystem;

class IlluminateSnappyImage extends Image
{
    /**
     * @var Filesystem
     */
    private $fs;

    /**
     * @param Filesystem $fs
     * @param string $binary
     * @param array $options
     * @param array $env
     */
	public function __construct(Filesystem $fs, $binary, array $options, array $env)
	{
		parent::__construct($binary, $options, $env);

		$this->fs = $fs;
	}

    /**
     * Wrapper for the "file_get_contents" function
     *
     * @param string $filename
     *
     * @return string
     * @throws FileNotFoundException
     */
    protected function getFileContents(string $filename): string
    {
        return $this->fs->get($filename);
    }

    /**
     * Wrapper for the "file_exists" function
     *
     * @param string $filename
     *
     * @return boolean
     */
    protected function fileExists(string $filename): bool
    {
        return $this->fs->exists($filename);
    }

    /**
     * Wrapper for the "is_file" method
     *
     * @param string $filename
     *
     * @return boolean
     */
    protected function isFile(string $filename): bool
    {
        return $this->fs->isFile($filename);
    }

    /**
     * Wrapper for the "filesize" function
     *
     * @param string $filename
     *
     * @return integer or FALSE on failure
     */
    protected function filesize(string $filename): int
    {
        return $this->fs->size($filename);
    }

    /**
     * Wrapper for the "unlink" function
     *
     * @param string $filename
     *
     * @return boolean
     */
    protected function unlink(string $filename): bool
    {
        return $this->fs->delete($filename);
    }

    /**
     * Wrapper for the "is_dir" function
     *
     * @param string $filename
     *
     * @return boolean
     */
    protected function isDir(string $filename): bool
    {
        return $this->fs->isDirectory($filename);
    }

    /**
     * Wrapper for the mkdir function
     *
     * @param string $pathname
     *
     * @return boolean
     */
    protected function mkdir(string $pathname): bool
    {
        return $this->fs->makeDirectory($pathname, 0777, true, true);
    }

}
