<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Courses;
use App\Application\Model\Quizstudentsstatus;
use App\Application\Model\User;
use App\Application\Transformers\QuizstudentsstatusTransformers;
use App\Application\Requests\Website\Quizstudentsstatus\ApiAddRequestQuizstudentsstatus;
use App\Application\Requests\Website\Quizstudentsstatus\ApiUpdateRequestQuizstudentsstatus;
use Illuminate\Support\Facades\Auth;

class QuizstudentsstatusApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Quizstudentsstatus $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestQuizstudentsstatus $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestQuizstudentsstatus $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(QuizstudentsstatusTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(QuizstudentsstatusTransformers::transform($data) + $paginate), $status_code);
    }


    public function createAppCertificate(){

        $course =  Courses::findOrFail($_POST['course_id']);
        $name = $_POST['name'];
        $user_id = $_POST['user_id'];
        $studentExamStatusID = $_POST['studentExamStatusID'];
        if(isset($course->instructor->partnership->certificates)){
            $extraCertLogos = json_decode($course->instructor->partnership->certificates);
        }elseif(isset($course->certificates)){
            $extraCertLogos = json_decode($course->certificates);
        }
        $randomNo = $user_id. "R1" . createRandomCode();
        $fileName = 'IGTS-CRT-' . $randomNo;
        $studentExamStatus = Quizstudentsstatus::find($studentExamStatusID);
        // Check if the certificate generated already or not.
        if ($studentExamStatus->certificate) {
            return false;
        }
        if(isset($extraCertLogos) && count($extraCertLogos) > 0){
            $viewhtml = \View::make('website.certificates.igtsCertWithLogos', array('course' => $course, 'name' => $name, 'logos' => $extraCertLogos, 'certificateId' => $studentExamStatusID))->render();

        }else{
            $viewhtml = \View::make('website.certificates.igtsCert', array('course' => $course, 'name' => $name, 'certificateId' => $studentExamStatusID))->render();

        }

        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('mode', 'utf-8');
        $options->set('defaultFont', 'Helvetica');

        // $options->setIsRemoteEnabled(true);
        $options->setDpi(100);
        $options->setIsHtml5ParserEnabled(true);
        $options->setIsJavascriptEnabled(true);
        $options->setIsPhpEnabled(true);

        $mpdf = new \Dompdf\Dompdf($options);
        $mpdf->set_paper('A4', 'landscape');
//        $mpdf->setBasePath(get_template_directory() . '/style.css');
        $mpdf->loadHTML($viewhtml);
        $mpdf->render();
        // $mpdf->stream();

        $content = $mpdf->output();

        $image = $content;
        file_put_contents(env('UPLOAD_PATH_1') . '/certificate/' . $fileName . '.pdf', $image);

        // $image = base64_decode($content);
        // file_put_contents(public_path(env('UPLOAD_PATH_1')) . '/certificate/' . $fileName . '.jpg', $image);

        $studentExamStatus->certificate = $fileName . '.pdf';
        $studentExamStatus->save();

//        User::addNotification([auth()->user()->id], trans('messages.notificationNewCertificateTitle'), trans('messages.notificationNewCertificateDescription'), '/account/myCertificates');
        return $studentExamStatus->certificate;

    }

}
