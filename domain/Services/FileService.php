<?php
namespace domain\Services;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class FileService
{
    protected $image;

    public function __construct()
    {
        $this->image = new Image();
    }

    public function store($data)
    {
        $path = Storage::putFile('public/images', $data);
        $url = Storage::url($path);

        return $this->image->create([
            'name' => $data->getClientOriginalName(),
            'path' => $path,
            'url' => $url
        ]);

    }

}
