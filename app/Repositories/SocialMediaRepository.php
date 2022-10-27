<?php


namespace App\Repositories;
use App\Interfaces\Repositories\SocialMediaRepositoryInterface;
use App\Models\SocialMedia;

class SocialMediaRepository implements SocialMediaRepositoryInterface
{
    public function getAll()
    {
        return SocialMedia::all();
    }

    public function getById($id)
    {
        return SocialMedia::find($id);
    }


    public function create(array $data)
    {
        return SocialMedia::create($data);
    }

    public function update($id, array $data)
    {
        return SocialMedia::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return SocialMedia::destroy($id);
    }
}
