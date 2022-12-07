<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';

    protected $fillable = [
        'title',
        'mini_description',
        'description',
    ];

    public static function create(string $title,string $mini, string $description){
        $newsID = News::query()->insertGetId([
           'title' => $title,
           'mini_description' => $mini,
           'description' => $description,
        ]);
        if (!$newsID){
            return response()->fail('Попробуйте позже');
        }
        return response()->success([
            'id' => $newsID,
            'title' => $title,
            'mini_description' => $mini,
            'description' => $description
        ]);
    }

    public static function remove(int $newsID){
        $delete = News::where('id',$newsID)->delete();
        if (!$delete){
            return response()->fail('Попробуйте позже');
        }
        return response()->success([]);
    }

    public static function edit(int $newsID,string $title,string $mini,string $description){
        $news = News::where('id',$newsID)->update([
            'title' => $title,
            'mini_description' => $mini,
            'description' => $description,
        ]);
        if (!$news){
            return response()->fail('Попробуйте позже');
        }
        return response()->success([]);
    }
}
