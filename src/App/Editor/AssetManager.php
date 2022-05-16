<?php

namespace Dotlogics\Grapesjs\App\Editor;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AssetManager
{
    public array $assets = [];
    public ?string $upload = null;
    public ?string $uploadName = null;
    public array $headers = [];
    public int $autoAdd = 1;
    public string $uploadText = 'Drop files here or click to upload';
    public string $addBtnText = 'Add image';
    public int $dropzone = 1;
    public int $openAssetsOnDrop = 0;
    public string $modalTitle = 'Upload Images';
    public bool $showUrlInput = false;

    function __construct()
    {
        $this->headers['_token'] = csrf_token();
        $this->upload = route('laravel-grapesjs.asset.store');    
        $this->uploadName = 'file';

        $this->assets = Media::all()->map(fn($m) => $m->getFullUrl())->toArray();
    }
}