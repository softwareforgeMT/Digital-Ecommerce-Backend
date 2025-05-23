<?php

namespace App\Models;

use App\Models\AdminSettings;
use App\Models\SubPlan;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Notifications;
// use Mail;

class Subscriptions extends Model
{

	protected $guarded = array();
    protected $table = 'subscriptions';
	public function user()
	{
		return $this->belongsTo(User::class)->first();
	}

	public function relateduser()
	{
		// return $this->belongsTo(User::class);
		return $this->belongsTo('App\Models\User','user_id');
	}

	public function subplan()
	{
		return $this->belongsTo(SubPlan::class, 'subplan_id');
	}
		// public function subscribed()
		// {
		// 	return $this->belongsToMany(
		// 				User::class,
		// 				Plans::class,
		// 				'name',
		// 				'user_id',
		// 				'stripe_price',
		// 				'id'
		// 			)->first();
		// }

		// public static function sendEmailAndNotify($subscriber, $user)
		// {
		// 	$user = User::find($user);
		// 	$settings = AdminSettings::first();
		// 	$titleSite = $settings->title;
		// 	$sender    = $settings->email_no_reply;
		// 	$emailUser   = $user->email;
		// 	$fullNameUser = $user->name;
		// 	$subject = $subscriber.' '.trans('users.has_subscribed');

		// 	if ($user->email_new_subscriber == 'yes') {
		// 		//<------ Send Email to User ---------->>>
		// 		Mail::send('emails.new_subscriber', [
		// 			'body' => $subject,
		// 			'title_site' => $titleSite,
		// 			'fullname'   => $fullNameUser
		// 		],
		// 			function($message) use ($sender, $subject, $fullNameUser, $titleSite, $emailUser)
		// 				{
		// 			    $message->from($sender, $titleSite)
		// 								  ->to($emailUser, $fullNameUser)
		// 									->subject($subject.' - '.$titleSite);
		// 				});
		// 			//<------ End Send Email to User ---------->>>
		// 	}

		// 	if ($user->notify_new_subscriber == 'yes') {
		// 		// Send Notification to User --- destination, author, type, target
		// 		Notifications::send($user->id, auth()->user()->id, '1', $user->id);
		// 	}
		// }
}
