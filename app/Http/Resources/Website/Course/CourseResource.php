<?php

namespace App\Http\Resources\Website\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'course' => [
                'id' => $this->id,
                'provider_id' => $this->provider_id,
                'title' => $this->title,
                'featured' => $this->featured,
                'retail_price' => $this->retail_price,
                'course_category' => $this->course_category,
                'course_category_slug' => $this->course_category_slug,
                'excerpt' => $this->excerpt,
                'duration' => $this->duration,
                'main_image' => $this->main_image,
                'provider_reference_id' => $this->provider_reference_id,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'skills_learnt' => $this->skills_learned,
            'also_bought' => $this->categories->map(function($category){
                return CourseSingleResource::collection($category->courses);
            })
        ];
    }
}