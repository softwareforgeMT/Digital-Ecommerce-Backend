<?php

namespace App\CentralLogics;

use App\Classes\GeniusMailer;
use App\Models\GeneralSetting;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class Helpers
{


     public static function upload(string $dir, string $format, $file = null)
    {
        if($file == null){
            //return 'def.png';
            return null;
        }
        if (!$file->isValid()) {
            throw new \Exception('Invalid file.');
        }
        if (!in_array(strtolower($file->getClientOriginalExtension()), explode('|', $format))) {
            //die('Invalid file format. Allowed formats: '.$format);
            throw new \Exception('Invalid file format. Allowed formats: '.$format);
        }
        
        if (!file_exists(public_path('assets/dynamic/images/' . $dir))) {
            mkdir(public_path('assets/dynamic/images/' . $dir), 0777, true);
        }
        $name = time().$file->getClientOriginalName();
        $name=str_replace(' ','',$name);        
        $file->move(public_path('assets/dynamic/images/'.$dir), $name);
        return $name;
    }
    public static function duplicateFile($filePath, $targetDirectory)
    {
        if ($filePath == null) {
            return null;
        }

        $sourcePath = public_path('assets/dynamic/images/' .$targetDirectory .$filePath);
        if (!file_exists($sourcePath)) {
            throw new \Exception('Source file does not exist.');
        }

        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $fileName = time() . Str::random(8) . '.' . $extension;

        $targetPath = public_path('assets/dynamic/images/' . $targetDirectory . $fileName);
        if (!file_exists(public_path('assets/dynamic/images/' . $targetDirectory))) {
            mkdir(public_path('assets/dynamic/images/' . $targetDirectory), 0777, true);
        }

        // Copy the file to the new location
        copy($sourcePath, $targetPath);

        return $fileName;
    }

    public static function update(string $dir,string $old_image=null, string $format, $file = null)
    {   
        if($file == null){
            return $old_image;
        }
        if($old_image != null && file_exists(public_path('assets/dynamic/images/' . $dir . $old_image))) {
                unlink(public_path('assets/dynamic/images/' . $dir . $old_image));
        }
        return Helpers::upload($dir, $format, $file);
    }
    public static function unlink(string $dir,string $old_image)
    {   

        if($old_image != null && file_exists(public_path('assets/dynamic/images/' . $dir . $old_image))) {
                unlink(public_path('assets/dynamic/images/' . $dir . $old_image));
        };
    }   
    public static function image($file, $dir, $default = 'def.png')
    {
        $image = ($file && file_exists(public_path('/assets/dynamic/images/'.$dir.$file)) )  ? asset('/assets/dynamic/images/'.$dir.$file) : asset('/images/'.$default);
        return $image;
    }
    public static function slug(string $slug)
    {
        //return $slug=Str::slug($slug,'-').'-'.strtolower(Str::random(3));
         return $slug=Str::slug($slug,'-');
    }

    public static function quizSlug($quizGroup,$dataId)
    {
        $quizGroup = implode('', array_map(fn($word) => $word[0], explode(' ', $quizGroup)));

        //$questType = substr($questType, 0, 2);
        $slug = self::slug($quizGroup.'-'.$dataId);
        //return $slug=Str::slug($slug,'-').'-'.strtolower(Str::random(3));
        return $slug;
    }

    public static function getAssessmentType(){
      return $getAssessmentType= ['0'=>'Online Immersive Assessment','1' => 'Video Interview', '2' => 'Game-based Assessment', '3' => 'Assessment Centre'];
    }
    public static function getQuestionTypes(){
      return $getQuestionTypes= ['0'=>'Basic','1' => 'Self-Recorded', '2' => 'Game-based','3'=>'Case Study','Pdf-based'];
    }

   public static function getGames(){
        return [
            '1' => '1-Sequence',
            '2' => '2-Energy',
            '3' => '3-Direction',
            '4' => '4-Team',
            '5' => '5-Ticket',
            '6' => '6-Balloon',
            '7' => '7-Security',
            '8' => '8-MoneyExchange',
            '9' => '9-KeyPresses',
            '10' => '10-Digits',
            '11' => '11-Easy-Hard',
            '12' => '12-Stop',
            '13' => '13-Cards',
            '14' => '14-Lengths',
            '15' => '15-Towers',
            '16' => '16-Faces'
        ];
    }


    public static function getEventTypes(){
      return $getQuestionTypes= ['0'=>'Assessment Simulation','1' => 'Experience Sharing','2'=>'Q&A Sessions','3' => 'Others'];
    }

    public static function  calculateSellerFeedbackScore(int $sellerId): array
    {
        $totalRatedOrders = Rating::where('seller_id', $sellerId)
        ->count();
        $totalPositiveRatings = Rating::where('seller_id', $sellerId)
            ->where('rating', 1)
            ->active()->count();

        $totalNegativeRatings = Rating::where('seller_id', $sellerId)
            ->where('rating', 0)
            ->active()->count();
        $feedbackScore = $totalRatedOrders > 0 ? round(($totalPositiveRatings / $totalRatedOrders) * 100) : 0;
        return [
            'total_rated_orders' => $totalRatedOrders,
            'feedback_score' => $feedbackScore,
        ];
    }

    

    public static function send_verification_otp($email)
    {   
     
        $token=rand(1000, 9999);
        $autopass = Str::random(64);
            DB::table('email_verifications')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            try {
                $gs = GeneralSetting::findOrFail(1);
                if($gs->is_smtp == 1)
                {   
                   $to = $email;
                   $subject = "Verify your email address.";
                   $msg = "Dear Customer,<br> We noticed that you need to verify your email address.This is your  Verification Code " .$token;

                   $data = [
                                'to' => $to,
                                'subject' => $subject,
                                'body' => $msg,
                            ];
                        $mailer = new GeniusMailer();
                        $mailer->sendCustomMail($data);              
                }
                else
                {
                    $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
                    mail($request->email,$subject,$msg,$headers);            
                }
                return $response=array('success' =>'Code Resend SuccessFully');

            } catch (\Exception $e) {
                return $response=array('error'=>$e->getMessage());   
            }

    }

    public static function envUpdate($key, $value, $comma = false)
    {
      $path = base_path('.env');
            $value = trim($value);
            $env = $comma ? '"'.env($key).'"' : env($key);

      if (file_exists($path)) {

          file_put_contents($path, str_replace(
              $key . '=' . $env,
                            $key . '=' . $value,
                            file_get_contents($path)
          ));
      }
    }



    public static function setCurrency($price) {
        $gs = GeneralSetting::findOrFail(1);
        $price = number_format($price,2);
        if($gs->currency_format == 1){
            return '$'.$price;
        }
        else{
            return $price.'$';
        }
    }
    public static function offerPrice($price) {
        $gs = GeneralSetting::findOrFail(1);
        // $price = number_format($price,2);
        if($gs->currency_format == 1){
            return '$'.$price;
        }
        else{
            return $price.'$';
        }
    }
    public static function generalVariables(){
        return [
                
                'currency_symbol'=>'$',
                'currency'=>'USD',
            ];
    }

    public static function getPrice($price,$number_format='') {
        if($number_format==1){
          return $price=number_format($price,2);
        }else{
          return $price=round($price,2);  
        }
        
    }
    public static function setInterval($interval) {
       return ucfirst($interval);
    }
    
    public static function quizName($quiz_slug) {

        $quiz = \App\Models\QuizBank::where('slug', $quiz_slug)->first();
        
        //it will modify $slug = "est-accusantium-non-ba252" with "Est Accusantium Non";
        //$name = ucwords(str_replace('-', ' ', preg_replace('/-\d+$|(?<=\D)\d+$/', '', $quiz_slug)));
        if (!$quiz) {
            return  ''; // or throw an exception if you prefer
        }

        $words = explode(" ", $quiz->quiz_group); // Split the string into an array of words
        $firstLetters = array_map(function($word) {
            return strtoupper($word[0]);
        }, $words);
        $name = implode('', $firstLetters);

        $quizzesInGroup = \App\Models\QuizBank::where('quizbankmanagement_id', $quiz->quizbankmanagement_id)
                                             ->where('quiz_group', $quiz->quiz_group)
                                             ->orderBy('created_at', 'asc')
                                             ->active()
                                             ->get();
                                             
        $index = $quizzesInGroup->search(function ($q) use ($quiz) {
            return $q->id === $quiz->id;
        });

        $position= $index !== false ? $index + 1 : null;

       // Format the position with leading zeros if it's a single-digit number
       $formattedPosition = ($position !== null && $position >= 1 && $position <= 9) ? sprintf('%02d', $position) : $position;

        return $name.' '.$formattedPosition;
        // $quizGroupWords = ucwords(strtolower($request->quiz_group));
       // $name= ucwords(str_replace('-', ' ', $quiz_slug));
       // return $name;
    }

    public static function getLanguages($value='')
    {
       // return $commonLanguages = ['English', 'Chinese', 'Spanish', 'French', 'German'];
            return [
                ['id' => 1, 'name' => 'English'],
                ['id' => 2, 'name' => 'Chinese'],
                ['id' => 3, 'name' => 'Spanish'],
                ['id' => 4, 'name' => 'French'],
                ['id' => 5, 'name' => 'German'],
            ];

    }
    public static function getGreeting($value='')
    {
        $currentTime = Carbon::now();
        $hour = $currentTime->hour;

        if ($hour >= 5 && $hour < 12) {
            return 'Good Morning';
        } elseif ($hour >= 12 && $hour < 18) {
            return 'Good Afternoon';
        } else {
            return 'Good Evening';
        }
    }

    public static function getScheduleInterval($repeat_interval='')
    {
        switch ($repeat_interval) {
            case 'weekly':
                return 'Weekly';
            case 'biweekly':
                return 'Every 2 weeks';
            case 'triweekly':
                return 'Every 3 weeks';
            case 'quadweekly':
                return 'Every 4 weeks';
            default:
                return '';
        }  
    }

    

}


