<?php
namespace App\Application\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use Dompdf\Dompdf;
use Omaralalwi\Gpdf\Facade\Gpdf as GpdfFacade;

class Quizstudentsstatus extends Model
{
    public $table = "quizstudentsstatus";
    public function quizstudentsanswers()
    {
        return $this->hasMany(Quizstudentsanswers::class, "quizstudentsstatus_id");
    }
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, "quiz_id");
    }
    protected $fillable = [
        'user_id',
        'quiz_id',
        'start_time', 'end_time', 'pause_time', 'status', 'skipped_question_id', 'passed', 'exam_anytime',
        'certificate',
    ];

    public function getCurrentStudentMarkAttribute()
    {
        return $this->quizstudentsanswers->sum('mark');
    }

    public function getCurrentStudentPercentageAttribute()
    {
        $studentScore = Quiz::currentStudentMark($this->id);
        $percentage = round( (( $studentScore * 100 ) /$this->quiz->quizSum),1 );
        return $percentage;
    }
    // public function getStudentAnswerdQuestionsCountAttribute()
    // {
    //     return $this->quizstudentsanswers->where('answered', 1)->count();
    // }

    // public function getStudentAnswerdCorrectQuestionsCountAttribute()
    // {
    //     return $this->quizstudentsanswers->where('is_correct', 1)->count();
    // }

    public function getStudentAnswerdQuestionsCountAttribute()
    {
        return $this->quizstudentsanswers->where('answered', 1)->groupBy('quizquestionschoice_id')->count();
    }

    public function getStudentAnswerdCorrectQuestionsCountAttribute()
    {
        return $this->quizstudentsanswers->where('is_correct', 1)->groupBy('quizquestionschoice_id')->count();
    }

    public static function generateCertificateOld($course, $name = "", $studentExamStatusID)
    {
        if(isset($course->instructor->partnership->certificates)){

            $extraCertLogos = json_decode($course->instructor->partnership->certificates);
        }elseif(isset($course->certificates)){
            $extraCertLogos = json_decode($course->certificates);

        }
        $title = $course->title_en;
        $randomNo = auth()->user()->id . "R1" . createRandomCode();
        $fileName = 'IGTS-CRT-' . $randomNo;

        $studentExamStatus = Quizstudentsstatus::find($studentExamStatusID);

        // Check if the certificate generated already or not.
        if ($studentExamStatus->certificate) {
            return false;
        }



//        if(isset($extraCertLogos) && count($extraCertLogos) > 0){
//            $viewhtml = \View::make('website.certificates.igtsCertWithLogos', array('course' => $course, 'name' => $name, 'logos' => $extraCertLogos, 'certificateId' => $studentExamStatusID))->render();
//
//        }else{
        $viewhtml = \View::make('website.certificates.igtsCert', array('course' => $course, 'name' => $name, 'certificateId' => $studentExamStatusID))->render();
        $viewhtml = mb_convert_encoding($viewhtml, 'HTML-ENTITIES', 'UTF-8');

//        }

        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('mode', 'utf-8');
//        $options->set('defaultFont', 'Helvetica');


        $fontPath = resource_path('fonts/Cairo/static');


        $options->setFontDir($fontPath);
        $options->setFontCache($fontPath);
        $options->set('defaultFont', 'Cairo');



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



    public static function generateCertificate($course, $name = "", $studentExamStatusID)
    {
        if(isset($course->instructor->partnership->certificates)){
            $extraCertLogos = json_decode($course->instructor->partnership->certificates);
        } elseif(isset($course->certificates)){
            $extraCertLogos = json_decode($course->certificates);
        }

        $title = $course->title_en;
        $randomNo = auth()->user()->id . "R1" . createRandomCode();
        $fileName = 'IGTS-CRT-' . $randomNo;

        $studentExamStatus = Quizstudentsstatus::find($studentExamStatusID);

        if ($studentExamStatus->certificate) {
            return false;
        }

        // 👇 تعديل عرض View باستخدام Gpdf بدون تحويل الترميز
        $viewhtml = \View::make('website.certificates.igtsCert', [
            'course' => $course,
            'name' => $name,
            'certificateId' => $studentExamStatusID
        ])->render();

        // ✅ توليد PDF باستخدام Gpdf
        $pdfContent = GpdfFacade::generate($viewhtml, [
            'paper' => 'A4',
            'orientation' => 'landscape',
        ]);


        // 📁 حفظ الملف
        $filePath = env('UPLOAD_PATH_1') . '/certificate/' . $fileName . '.pdf';
        file_put_contents($filePath, $pdfContent);

        $studentExamStatus->certificate = $fileName . '.pdf';
        $studentExamStatus->save();

        return $studentExamStatus->certificate;
    }




}
