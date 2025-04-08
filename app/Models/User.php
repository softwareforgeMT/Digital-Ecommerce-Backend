<?php

namespace App\Models;

use App\CentralLogics\Helpers;
use App\CentralLogics\UserAccess;
use App\Helpers\AppHelper;
use App\Models\Appointment;
use App\Models\CareerEventRegistration;
use App\Models\Country;
use App\Models\Favorite;
use App\Models\GeneralSetting;
use App\Models\SubPlan;
use App\Models\Subscriptions;
use App\Models\Transaction;
use App\Models\UserQuizBankAccess;
use Auth;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Database\Query\Builder;
class User extends Authenticatable
{ 
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'affiliate_code',
        'phone',
        'role_id',
        'referred_by',
        'niche',
        'country_id',
        'oauth_uid',
        'oauth_provider',
        // 'language',
        'tags','about','coaching_services','faqs','price'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', '=', 1);
    }
    public function scopeUser( $query)
    {
        return $query->where('role_type', 'user');
    }

    public function scopeAdmin( $query)
    {
        return $query->where('role_type', 'admin');
    }

    public function IsSuperUser(){
        if ($this->id == 2 && $this->email=='fayexxj@gmail.com') {
           return true;
        }
        return false;
    }

    public function favorites()
    {
          return $this->hasMany(Favorite::class, 'user_id');
    }

    public function country()
    {
          return $this->belongsTo(Country::class, 'country_id');
    }
   
    public function careerEventRegistrations()
    {
      return $this->hasMany(CareerEventRegistration::class,'user_id');
    }

    public function studentAppointments()
    {
      return $this->hasMany(Appointment::class,'student_id');
    }
    public function tutorAppointments()
    {
      return $this->hasMany(Appointment::class,'tutor_id');
    }

    public function UserQuizBankAccess()
    {
      return $this->hasMany(UserQuizBankAccess::class,'user_id');
    }

   

    // public function subscriptionsActive()
    // {   // Get the latest subscription for the user
    //     $activeSubscription = $this->userSubscriptions()->orderBy('id', 'desc')->first();
    //     // Check if the user has an active subscription
    //     if ($activeSubscription) {
    //         $plan = SubPlan::find($activeSubscription->subplan_id);
    //         if ($plan) {
    //             // Validate subscription with time interval
    //             $interval = UserAccess::getTimeIntervalInDays($plan->interval);
    //             if ($plan->interval === 'unlimited' || Carbon::now()->diffInDays($activeSubscription->created_at) <= $interval) {
    //                 return true; // Active subscription
    //             }
    //         }
    //     }
    //     return false; // No active subscription
    // }
    public function userSubscriptions()
    {
      return $this->hasMany(Subscriptions::class);
    }
    public function activeuserSubscriptions()
    {
        return $this->hasMany(Subscriptions::class)
            ->where('ends_at', '>=', now()->subMinutes(2));
    }

    public function subscriptionsActive()
    {
        $activeSubscription = $this->userSubscriptions()
                             //->where('ends_at', '>=', Carbon::now()->subMinutes(2))
                             ->latest('id')
                             ->first();
        if($activeSubscription && $activeSubscription->ends_at>=Carbon::now()->subMinutes(2)){
              return  $activeSubscription;   
        }   else{
            return null;
        }                  
        //return $activeSubscription;
        // if ($activeSubscription) {
        //     $plan = SubPlan::find($activeSubscription->subplan_id);
        //     if ($plan && ($plan->interval === 'unlimited' || Carbon::now()->diffInDays($activeSubscription->created_at) <= UserAccess::getTimeIntervalInDays($plan->interval))) {
        //         return $plan;
        //     }
        // }

        // return '';
    }

    public function freetrial($value='')
    {
        if(auth()->user()->userSubscriptions()->exists()){
            return false;
        }else{
            return true;
        }
    }
    
    //****************User Transaction & Balance Modules****************//
    protected  function activeTransaction() {
        $gs=GeneralSetting::find(1);
        $user=Auth::user();
        $datenow=Carbon::now()->subDays($gs->withdrawl_after_days);

        return $earning_net_user=Transaction::where('referrer_link',$user->affiliate_code)
               ->where('status','active')
               ->where('created_at','<=',$datenow)
               ->where('is_cleared',0); //2<=-25
               // ->where('is_cleared',0)
               // ->sum('earning_net_user');
    }
    public  function userbalance($withCurrency='') {

        $activeTransaction=$this->activeTransaction();
        $earning_net_user=0;
        if($activeTransaction){
            $earning_net_user=$activeTransaction->sum('earning_net_user');
        }

        if($withCurrency && $withCurrency==1){
          return Helpers::setCurrency($earning_net_user);
        }else{
            return $earning_net_user;
        }                      
    }
    public function userbalancedecrement($value='')
    {  
        $activeTransaction=$this->activeTransaction();
        if($activeTransaction){
            $activeTransaction->update(['is_cleared'=>1]);
        }
    }
    //****************User Transaction & Balance Modules****************//



    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function IsSuper(){
        if ($this->id == 1) {
           return true;
        }
        return false;
    }

    public function sectionCheck($value){
        $sections = explode(" , ", $this->role->section);
        if (in_array($value, $sections)){
            return true;
        }else{
            return false;
        }
    }


}
