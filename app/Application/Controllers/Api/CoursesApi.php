<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Categories;
use App\Application\Model\Courses;
use App\Application\Transformers\CoursesTransformers;
use App\Application\Requests\Website\Courses\ApiAddRequestCourses;
use App\Application\Requests\Website\Courses\ApiUpdateRequestCourses;
use App\Application\Transformers\CourseTransformers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoursesApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Courses $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function index()
    {
//        dd(auth('api')->check());
        $limit = request()->has('limit') &&  (int) request()->get('limit') != 0 && (int) request()->get('limit') < 30 ? request()->get('limit') : env('PAGINATE');
        $data = $this->model;

        if (request()->has("type") && request()->get("type") != "") {
            $data = $data->where("type", "=", request()->get("type"));
        }


        if (request()->has('categories_id') && request()->get('categories_id') != '') {
            $data = $data->where("categories_id", "=", request()->get("categories_id"));
        }


        $data = $data->where('published', 1)->orderBy('id' , 'desc')->get();


        $data = initPaginate($data, 8);
//        $data = $$data->paginate($limit);


        if ($data AND count($data) > 0) {
            return response(apiReturn(['items' => array_values(CoursesTransformers::transform($data))] + $this->paginateArray($data)), 200);
        }
        return response(apiReturn('', '', trans('No Data Found')), 200);
    }


    public function inner(Request $request){
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return response(apiReturn(['error'=>$validator->errors()], '', ['error'=>$validator->errors()]), 401);
        }

        $course = $this->model->where('id',$request->course_id)->first();
        if($course){
            return response(apiReturn(CourseTransformers::transform($course)), 200);
        }else{
            return response(apiReturn(['error'=>$validator->errors()], '', trans('No Data Found')), 401);
        }

    }
    public function getBySpecialityCode(Request $request){
        $validator = Validator::make($request->all(), [
            'Speciality_Code' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return response(apiReturn(['error'=>$validator->errors()], '', ['error'=>$validator->errors()]), 401);
        }

        $category = Categories::where('futurecode', $request->Speciality_Code)->first();

        $courses = $this->model->whereHas('categories', function ($query) use ($request) {
            $query->where('futurecode', $request->Speciality_Code);
        });

        if ($category) {
            $courses->orWhereJsonContains('other_categories', (string) $category->id);
        }

        $courses = $courses->get();




        if ($courses->isNotEmpty()) {
            return response(apiReturn(CourseTransformers::transform($courses)), 200);
        }else{
            return response(apiReturn(['error'=>$validator->errors()], '', trans('No Data Found')), 401);
        }

    }
    public function freelanceRegistration(Request $request){

        $messages = [
            'mobile.regex' => 'الرجاء إدخال رقم جوال سعودي صالح مثل 05XXXXXXXX أو +9665XXXXXXXX',
        ];

        $validator = Validator::make($request->all(), [
            'mobile' => [
                'required',
                'regex:/^(05\d{8})$|^(009665\d{8})$|^(\+?9665\d{8})$/'
            ],
            'course_id' => 'integer|required',
        ], $messages);
        if ($validator->fails()) {
            return response(apiReturn(['error'=>$validator->errors()], '', ['error'=>$validator->errors()]), 401);
        }

        $course = $this->model->where('id',$request->course_id)->first();
        if($course){
            return response(apiReturn('لقد تم تسجيل البيانات بنجاح'), 200);

            return response(apiReturn(CourseTransformers::transform($course)), 200);
        }else{
            return response(apiReturn(['error'=>$validator->errors()], '', trans('No Data Found')), 401);
        }

    }


    public function add(ApiAddRequestCourses $validation){
        return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestCourses $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
//       if (request()->has('lang') && request()->get('lang') == 'ar') {
        return response(apiReturn(array_values(CoursesTransformers::transformAr($data) + $paginate)), $status_code);
//       }
//        return response(apiReturn(array_values(CoursesTransformers::transform($data) + $paginate)), $status_code);
    }

}
