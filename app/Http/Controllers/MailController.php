<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailForGroupA;
use App\Jobs\SendEmailForGroupC;
use App\Mail\EmailForGroupA;
use App\Repositories\ActionsRepository;
use App\Repositories\LoginSourceRepository;
use App\Repositories\UsersRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    private $loginSourceRepository;
    private $usersRepository;
    private $actionsRepository;

    public function __construct()
    {
        $this->loginSourceRepository = app(LoginSourceRepository::class);
        $this->usersRepository = app(UsersRepository::class);
        $this->actionsRepository = app(ActionsRepository::class);
    }

    public function index()
    {
        $onceAuthorizedUsers = $this->usersRepository->getOnceAuthorizedUsersId();
        $notAugustActionUsers = $this->usersRepository->getNotAugustActionUsersId();
        $action = $this->actionsRepository->getAction(2);

        $delay = 1;

        foreach ($onceAuthorizedUsers as $user) {
            $userData = $this->getUserFullName($user);

            $delayTime = Carbon::now()->addMinutes($delay);
            $details = ['user' => $userData, 'email' => $user->email];

            $emailJob = (new SendEmailForGroupA($details))->delay($delayTime);

            logs()->info("Письмо для {$user->email} будет отправлено в назначенное время {$delayTime} (Группа отправки - А)");

            $this->dispatch($emailJob);

            $delay++;
        }

        foreach ($notAugustActionUsers as $user) {
            $userData = $this->getUserFullName($user);

            $delayTime = Carbon::now()->addMinutes($delay);
            $details = [
                'user' => $userData,
                'email' => $user->email,
                'actionName' => $action->title,
                'actionEndDate' => $action->date_end,
            ];

            $emailJob = (new SendEmailForGroupC($details))->delay($delayTime);

            logs()->info("Письмо для {$user->email} будет отправлено в назначенное время {$delayTime} (Группа отправки - С)");

            $this->dispatch($emailJob);

            $delay++;
        }
    }

    protected function getUserFullName($user)
    {
        $userData = '';
        $userData .= empty($user->second_name) ? '' : $user->second_name . ' ';
        $userData .= empty($user->first_name) ? '' : $user->first_name . ' ';
        $userData .= empty($user->middle_name) ? '' : $user->middle_name;

        return $userData;
    }
}
