<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Course\StoreCourseRequest;
use App\Http\Requests\Api\Course\UpdateCourseRequest;
use App\Http\Resources\Api\Course\CourseResource;
use App\Http\SearchFilters\Api\Course\CourseSearch;
use App\Models\Course;
use App\Services\CourseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{

    protected $service;

    public function __construct(CourseService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('list', Course::class);
        return CourseResource::collection(CourseSearch::apply($request));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        $this->authorize('create', Course::class);

        $attributes = $request->all();

//        try{
            $this->service->store($attributes);
            return response()->success('This action has been completed successfully');
//        }catch (\Exception $e){
//            Log::info($e->getMessage());
//            return response()->error('This action could not be completed');
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Course::class);
        return new CourseResource($this->service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateCourseRequest $request)
    {
        $this->authorize('update', Course::class);

        $attributes = $request->all();

        try{
            $this->service->update($id, $attributes);
            return response()->success('This action has been completed successfully');
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->error('This action could not be completed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->authorize('delete', Course::class);

        $attributes = $request->json()->all();

        return $this->service->delete($attributes);
    }

}
