<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

        protected $fillable = [

    	'category_id',
    	'subcategory_id',
    	'district_id',
    	'subdistrict_id',
    	'title_eng',
    	'title_hind',
    	'image',
    	'details_eng',
    	'details_hind',
    	'tags_eng',
    	'tags_hind',
    	'headline',
    	'first_section',
    	'first_section_thumbnail',
    	'big_thumbnail',

    ];
}
