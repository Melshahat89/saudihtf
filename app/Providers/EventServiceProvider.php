<?php

namespace App\Providers;

use Aacotroneo\Saml2\Events\Saml2LoginEvent;
use App\Application\Model\Futurex;
use App\Application\Model\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Session;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('Aacotroneo\Saml2\Events\Saml2LoginEvent', function (Saml2LoginEvent $event) {
//            $messageId = $event->getSaml2Auth()->getLastMessageId();
            // Add your own code preventing reuse of a $messageId to stop replay attacks

            $user = $event->getSaml2User();
//            $userData = [
////                'id' => $user->getUserId(),
//                'attributes' => $user->getAttributes(),
////                'assertion' => $user->getRawSamlAssertion()
//            ];

            $attributes = $user->getAttributes();

            $email = isset($attributes['email']) ? is_array($attributes['email']) ?$attributes['email'][0]:$attributes['email'] : '' ;
            $uid = isset($attributes['uid']) ? is_array($attributes['uid']) ?$attributes['uid'][0]:$attributes['uid'] : '' ;

            $eppn = isset($attributes['eppn']) ? is_array($attributes['eppn']) ?$attributes['eppn'][0]:$attributes['eppn'] : '' ;
            $arabicFullName = isset($attributes['arabicFullName']) ? is_array($attributes['arabicFullName']) ?$attributes['arabicFullName'][0]:$attributes['arabicFullName'] : '' ;
            $englishFullName = isset($attributes['englishFullName']) ? is_array($attributes['englishFullName']) ?$attributes['englishFullName'][0]:$attributes['englishFullName'] : '' ;
            $arabicFirstName = isset($attributes['arabicFirstName']) ? is_array($attributes['arabicFirstName']) ?$attributes['arabicFirstName'][0]:$attributes['arabicFirstName'] : '' ;
            $arabicLastName = isset($attributes['arabicLastName']) ? is_array($attributes['arabicLastName']) ?$attributes['arabicLastName'][0]:$attributes['arabicLastName'] : '' ;
            $englishFirstName = isset($attributes['englishFirstName']) ? is_array($attributes['englishFirstName']) ?$attributes['englishFirstName'][0]:$attributes['englishFirstName'] : '' ;
            $englishLastName = isset($attributes['englishLastName']) ? is_array($attributes['englishLastName']) ?$attributes['englishLastName'][0]:$attributes['englishLastName'] : '' ;


//            $cn = isset($attributes['cn']) ? is_array($attributes['cn']) ?$attributes['cn'][0]:$attributes['cn']  : '';
//            $displayName = isset($attributes['displayName']) ? is_array($attributes['displayName']) ?$attributes['displayName'][0]:$attributes['displayName'] : ''  ;
//            $givenName = isset($attributes['givenName']) ? is_array($attributes['givenName']) ?$attributes['givenName'][0]:$attributes['givenName']  : '';
//            $sn = isset($attributes['sn']) ? is_array($attributes['sn']) ?$attributes['sn'][0]:$attributes['sn'] : '';
//            $Nationalid = isset($attributes['Nationalid']) ? is_array($attributes['Nationalid']) ?$attributes['Nationalid'][0]:$attributes['Nationalid'] : '' ;
//

            $futurex = Futurex::where('email', $email)->first();

            if ($futurex){
                $user = User::has('futurex')->where('email', $email)->first();
//                $user->guard()->login();
                Auth::login($user);


            }else{
                //Create New User
                $user = new User();
                $user->name = $englishFullName;
                $user->email = $email;
                $user->group_id = env('DEFAULT_GROUP');
                $user->verified = (isset($data['facebook_identifier']) && !empty($data['facebook_identifier'])) ? 1 : 1;
                $user->activated = env('DEFAULT_activated');
                $user->activation_code = str_random(40);
                $user->save();
                //Create New User In Futurex
                $futurex = new Futurex();
                $futurex->uid = $uid;
                $futurex->email = $email;
                $futurex->mail = $email;
                $futurex->eppn = $eppn;
                $futurex->arabicFullName = $arabicFullName;
                $futurex->englishFullName = $englishFullName;
                $futurex->arabicFirstName = $arabicFirstName;
                $futurex->arabicLastName = $arabicLastName;
                $futurex->englishFirstName = $englishFirstName;
                $futurex->englishLastName = $englishLastName;
                $futurex->user_id = $user->id;
                $futurex->save();
                Auth::login($user);

            }
//            $laravelUser = //find user by ID or attribute
                //if it does not exist create it and go on  or show an error message

        });


        Event::listen('Aacotroneo\Saml2\Events\Saml2LogoutEvent', function ($event) {
            Auth::logout();
            Session::save();
        });

//        dd(3323);
        parent::boot();

        //
    }
}
