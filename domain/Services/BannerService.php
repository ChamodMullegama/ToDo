<?php
namespace domain\Services;

use App\Models\Banner;

class BannerService
{
    protected $banner;

    public function __construct()
    {
        $this->banner = new Banner();
    }

    public function all()
    {
        return $this->banner->all();

    }

    public function store($data)
    {

        $data['name'] = "test";

        if (isset($data['image'])) {
            $fileService = new FileService();
            $image = $fileService->store($data['image']);
            $data['image_id'] = $image->id;
        }

        $this->banner->create($data);

    }

    public function delete($banner_id)
    {
        $banner = $this->banner->find($banner_id);
        $banner->delete();

    }

    public function status($banner_id)
    {
        $banner = $this->banner->find($banner_id);
        $banner->status = 1;
        $banner->update();

    }
}
