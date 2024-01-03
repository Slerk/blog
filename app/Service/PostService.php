<?php

namespace App\Service;

use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{

    public function store($data){

        try {
            Db::beginTransaction();
            if (isset($data['tags_id'])){
                $tag_id = $data['tags_id'];
                unset($data['tags_id']);
            }

            $data['preview_img'] = Storage::disk('public')->put('/images', $data['preview_img']);
            $data['main_img'] = Storage::disk('public')->put('/images', $data['main_img']);


            $post = Post::firstOrCreate($data);

            if (isset($tag_id)){
                $post->tags()->attach($tag_id);
            }


            DB::commit();
        }catch (Exception $exception){
            DB::rollBack();
            abort(500);
        };

    }

    public function update($data,$post){

        try {

            Db::beginTransaction();

            if (isset($data['tags_id'])){
                $tag_id = $data['tags_id'];
                unset($data['tags_id']);
            }

        if (isset( $data['preview_img'])){
        $data['preview_img'] = Storage::disk('public')->put('/images', $data['preview_img']);
        }
            if (isset( $data['main_img'])){
                $data['main_img'] = Storage::disk('public')->put('/images', $data['main_img']);
            }


        $post->update($data);
            if (isset($tag_id)){
                $post->tags()->sync($tag_id);
            }

            DB::commit();
        }catch (Exception $exception){
            DB::rollBack();
            abort(500);
        }
        return $post;

    }

}
