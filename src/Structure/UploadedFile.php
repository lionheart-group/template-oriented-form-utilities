<?php

namespace TofuPlugin\Structure;

use TofuPlugin\Helpers\Uploader;

class UploadedFile
{
    /** @var string */
    public $name;

    /** @var string */
    public $fileName;

    /** @var string */
    public $mimeType;

    /** @var string */
    public $tempName;

    /** @var int */
    public $size;

    /**
     * @param string $name
     * @param string $fileName
     * @param string $mimeType
     * @param string $tempName
     * @param int $size
     */
    public function __construct(
        string $name,
        string $fileName,
        string $mimeType,
        string $tempName,
        int $size
    ) {
        $this->name = $name;
        $this->fileName = $fileName;
        $this->mimeType = $mimeType;
        $this->tempName = $tempName;
        $this->size = $size;

        $tempPath = Uploader::getTempFilePath($this->tempName);

        if (!file_exists($tempPath)) {
            throw new \RuntimeException(sprintf('Temporary file does not exist: %s', $tempPath));
        }
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'fileName' => $this->fileName,
            'mimeType' => $this->mimeType,
            'tempName' => $this->tempName,
            'size' => $this->size,
        ];
    }
}
