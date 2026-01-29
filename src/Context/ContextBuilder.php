<?php

declare(strict_types=1);

/*
 * This file is part of the docker-php project.
 *
 * (c) 2013 Geoffrey Bachelet <geoffrey.bachelet@gmail.com> and contributors
 * (c) 2019 Joël Wurtz
 * (c) 2026 sigwin.hr
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Docker\Context;

use Symfony\Component\Filesystem\Filesystem;

final class ContextBuilder
{
    /**
     * @var array
     */
    private $commands = [];

    /**
     * @var array
     */
    private $files = [];

    /**
     * @var Filesystem
     */
    private $fs;

    /**
     * @var string
     */
    private $format;

    /**
     * @var string
     */
    private $command;

    /**
     * @var string
     */
    private $entrypoint;

    /**
     * @param Filesystem
     */
    public function __construct(?Filesystem $fs = null)
    {
        $this->fs = $fs ?: new Filesystem();
        $this->format = Context::FORMAT_STREAM;
    }

    /**
     * Sets the format of the Context output.
     *
     * @param string $format
     */
    public function setFormat($format): self
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Add a FROM instruction of Dockerfile.
     *
     * @param string $from From which image we start
     */
    public function from($from): self
    {
        $this->commands[] = ['type' => 'FROM', 'image' => $from];

        return $this;
    }

    /**
     * Set the CMD instruction in the Dockerfile.
     *
     * @param string $command Command to execute
     */
    public function command($command): self
    {
        $this->command = $command;

        return $this;
    }

    /**
     * Set the ENTRYPOINT instruction in the Dockerfile.
     *
     * @param string $entrypoint The entrypoint
     */
    public function entrypoint($entrypoint): self
    {
        $this->entrypoint = $entrypoint;

        return $this;
    }

    /**
     * Add an ADD instruction to Dockerfile.
     *
     * @param string $path    Path wanted on the image
     * @param string $content Content of file
     */
    public function add($path, $content): self
    {
        $this->commands[] = ['type' => 'ADD', 'path' => $path, 'content' => $content];

        return $this;
    }

    /**
     * Add an ADD instruction to Dockerfile.
     *
     * @param string   $path   Path wanted on the image
     * @param resource $stream stream that contains file content
     */
    public function addStream($path, $stream): self
    {
        $this->commands[] = ['type' => 'ADDSTREAM', 'path' => $path, 'stream' => $stream];

        return $this;
    }

    /**
     * Add an ADD instruction to Dockerfile.
     *
     * @param string $path Path wanted on the image
     * @param string $file Source file (or directory) name
     */
    public function addFile($path, $file): self
    {
        $this->commands[] = ['type' => 'ADDFILE', 'path' => $path, 'file' => $file];

        return $this;
    }

    /**
     * Add a RUN instruction to Dockerfile.
     *
     * @param string $command Command to run
     */
    public function run($command): self
    {
        $this->commands[] = ['type' => 'RUN', 'command' => $command];

        return $this;
    }

    /**
     * Add a ENV instruction to Dockerfile.
     *
     * @param string $name  Name of the environment variable
     * @param string $value Value of the environment variable
     */
    public function env($name, $value): self
    {
        $this->commands[] = ['type' => 'ENV', 'name' => $name, 'value' => $value];

        return $this;
    }

    /**
     * Add a COPY instruction to Dockerfile.
     *
     * @param string $from Path of folder or file to copy
     * @param string $to   Path of destination
     */
    public function copy($from, $to): self
    {
        $this->commands[] = ['type' => 'COPY', 'from' => $from, 'to' => $to];

        return $this;
    }

    /**
     * Add a WORKDIR instruction to Dockerfile.
     *
     * @param string $workdir Working directory
     */
    public function workdir($workdir): self
    {
        $this->commands[] = ['type' => 'WORKDIR', 'workdir' => $workdir];

        return $this;
    }

    /**
     * Add a EXPOSE instruction to Dockerfile.
     *
     * @param int $port Port to expose
     */
    public function expose($port): self
    {
        $this->commands[] = ['type' => 'EXPOSE', 'port' => $port];

        return $this;
    }

    /**
     * Adds an USER instruction to the Dockerfile.
     *
     * @param string $user User to switch to
     */
    public function user($user): self
    {
        $this->commands[] = ['type' => 'USER', 'user' => $user];

        return $this;
    }

    /**
     * Adds a VOLUME instruction to the Dockerfile.
     *
     * @param string $volume Volume path to add
     */
    public function volume($volume): self
    {
        $this->commands[] = ['type' => 'VOLUME', 'volume' => $volume];

        return $this;
    }

    /**
     * Create context given the state of builder.
     */
    public function getContext(): Context
    {
        $directory = sys_get_temp_dir().'/ctb-'.microtime();
        $this->fs->mkdir($directory);
        $this->write($directory);

        $result = new Context($directory, $this->format, $this->fs);
        $result->setCleanup(true);

        return $result;
    }

    /**
     * Write docker file and associated files in a directory.
     *
     * @param string $directory Target directory
     *
     * @void
     */
    private function write($directory): void
    {
        $dockerfile = [];
        // Insert a FROM instruction if the file does not start with one.
        if (empty($this->commands) || $this->commands[0]['type'] !== 'FROM') {
            $dockerfile[] = 'FROM base';
        }
        foreach ($this->commands as $command) {
            switch ($command['type']) {
                case 'FROM':
                    $dockerfile[] = 'FROM '.$command['image'];
                    break;
                case 'RUN':
                    $dockerfile[] = 'RUN '.$command['command'];
                    break;
                case 'ADD':
                    $dockerfile[] = 'ADD '.$this->getFile($directory, $command['content']).' '.$command['path'];
                    break;
                case 'ADDFILE':
                    $dockerfile[] = 'ADD '.$this->getFileFromDisk($directory, $command['file']).' '.$command['path'];
                    break;
                case 'ADDSTREAM':
                    $dockerfile[] = 'ADD '.$this->getFileFromStream($directory, $command['stream']).' '.$command['path'];
                    break;
                case 'COPY':
                    $dockerfile[] = 'COPY '.$command['from'].' '.$command['to'];
                    break;
                case 'ENV':
                    $dockerfile[] = 'ENV '.$command['name'].' '.$command['value'];
                    break;
                case 'WORKDIR':
                    $dockerfile[] = 'WORKDIR '.$command['workdir'];
                    break;
                case 'EXPOSE':
                    $dockerfile[] = 'EXPOSE '.$command['port'];
                    break;
                case 'VOLUME':
                    $dockerfile[] = 'VOLUME '.$command['volume'];
                    break;
                case 'USER':
                    $dockerfile[] = 'USER '.$command['user'];
                    break;
            }
        }

        if (! empty($this->entrypoint)) {
            $dockerfile[] = 'ENTRYPOINT '.$this->entrypoint;
        }

        if (! empty($this->command)) {
            $dockerfile[] = 'CMD '.$this->command;
        }

        $this->fs->dumpFile($directory.\DIRECTORY_SEPARATOR.'Dockerfile', implode(\PHP_EOL, $dockerfile));
    }

    /**
     * Generate a file in a directory.
     *
     * @param string $directory Targeted directory
     * @param string $content   Content of file
     *
     * @return string Name of file generated
     */
    private function getFile($directory, $content): string
    {
        $hash = md5($content);

        if (! \array_key_exists($hash, $this->files)) {
            $file = tempnam($directory, '');
            $this->fs->dumpFile($file, $content);
            $this->files[$hash] = basename($file);
        }

        return $this->files[$hash];
    }

    /**
     * Generated a file in a directory from a stream.
     *
     * @param string   $directory Targeted directory
     * @param resource $stream    Stream containing file contents
     *
     * @return string Name of file generated
     */
    private function getFileFromStream($directory, $stream): string
    {
        $file = tempnam($directory, '');
        $target = fopen($file, 'w');
        if (0 === stream_copy_to_stream($stream, $target)) {
            throw new \RuntimeException('Failed to write stream to file');
        }
        fclose($target);

        return basename($file);
    }

    /**
     * Generated a file in a directory from an existing file.
     *
     * @param string $directory Targeted directory
     * @param string $source    Path to the source file
     *
     * @return string Name of file generated
     */
    private function getFileFromDisk($directory, $source): string
    {
        $hash = 'DISK-'.md5(realpath($source));
        if (! \array_key_exists($hash, $this->files)) {
            // Check if source is a directory or a file.
            if (is_dir($source)) {
                $this->fs->mirror($source, $directory.'/'.$hash, null, ['copy_on_windows' => true]);
            } else {
                $this->fs->copy($source, $directory.'/'.$hash);
            }

            $this->files[$hash] = $hash;
        }

        return $this->files[$hash];
    }
}
