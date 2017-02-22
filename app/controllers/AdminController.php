<?php

use Saurio\Entities\Apply;
use Saurio\Entities\Payment;
use Saurio\Entities\User;
use Saurio\Entities\Partner;
use Saurio\Entities\Subscriber;

class AdminController extends BaseController 
{
	public function home()
    {
        $title =  "Administrador";
        $description = $title;

        $u = new User;
        $conteo = $u->count();
        $admins_count = User::where('type', '=', 'admin')->count();
        
        return View::make('users/admin/home')
                    ->with('title',$title)
                    ->with('description',$description)
                    ->with('conteo',$conteo)
                    ->with('admins_count',$admins_count)
                    ->with('users',User::orderBy('created_at', 'desc')
                                            ->take(30)->paginate(22));
    }

    public function partners()
    {
        $title =  "Administrador Partners";
        $description = $title;

        $u = new Partner;
        $conteo_partners = $u->count();
        $v = new Apply;
        $conteo_applies = $v->count();

        return View::make('users/admin/partners')
                    ->with('title',$title)
                    ->with('description',$description)
                    ->with('conteo_partners',$conteo_partners)
                    ->with('conteo_applies',$conteo_applies)
                    ->with('applies',Apply::orderBy('id', 'desc')
                                            ->paginate(22));
    }

    public function numbers()
    {
        $title =  "Administrador Numbers";
        $description = $title;

        $conteo_payments = Payment::where('approved', '=', 1)->count();

        return View::make('users/admin/numbers')
                    ->with('title',$title)
                    ->with('conteo_payments',$conteo_payments)
                    ->with('description',$description)
                    ->with('payments',Payment::where('approved','=','0')->with('user')->orderBy('id', 'desc')->paginate(22));
    }

    public function email_marketing()
    {
        $title =  "Administrador Email Marketing";
        $description = $title;
        
        return View::make('users/admin/marketing')
                    ->with('title',$title)
                    ->with('description',$description);

    }

    public function email_marketing_send()
    {
        $rules = ['content' => 'required','subject' => 'required'];
        $validation = \Validator::make(Input::all(), $rules);

        if(!$validation->fails())
        {
            $subject = Input::get('subject');
            $content = Input::get('content');
            $params = [
                'subject'=>$subject,
                'content'=>$content
            ];

            $sends=0;
            //Ciclo para enviar los emails
            foreach (Subscriber::all() as $subscriber)
            {
                $email = $subscriber->email;

                \Mail::send('emails.marketing', $params, function($message) use ($subject,$email)
                {
                    $message->from('marketing@icerlly.com', 'FanPlusPlus.com');
                    $message->to($email)->subject($subject);
                });
                $sends++;
            }

            return Redirect::back()->with('message', 'Emails enviados: '.$sends);
        }else 
        {
            return Redirect::back()->withErrors($validation);
        }

    }

    public function email()
    {
        $title =  "Administrador Email";
        $description = $title;
        
        return View::make('users/admin/email')
                    ->with('title',$title)
                    ->with('description',$description);

    }

    public function email_send()
    {
        $rules = ['content' => 'required','to' => 'required','subject' => 'required'];
        $validation = \Validator::make(Input::all(), $rules);

        if(!$validation->fails())
        {
            $subject = Input::get('subject');
            $content = Input::get('content');
            $params = [
                'subject'=>$subject,
                'content'=>$content
            ];

            $to = Input::get('to');

            \Mail::send('emails.marketing', $params, function($message) use ($subject,$to)
            {
                $message->from('contacto@icerlly.com', 'Icerlly.com');
                $message->to($to)->subject($subject);
            });

            return Redirect::back()->with('message', 'Email enviado');
        }else 
        {
            return Redirect::back()->withErrors($validation);
        }

    }

    public function email_users()
    {
        $title =  "Administrador Email para Usuario";
        $description = $title;
        
        return View::make('users/admin/users')
                    ->with('title',$title)
                    ->with('description',$description);

    }

    public function email_users_send()
    {
        $rules = ['content' => 'required','subject' => 'required'];
        $validation = \Validator::make(Input::all(), $rules);

        if(!$validation->fails())
        {
            $subject = Input::get('subject');
            $content = Input::get('content');
            $params = [
                'subject'=>$subject,
                'content'=>$content
            ];

            $sends=0;
            //Ciclo para enviar los emails
            foreach (User::all() as $user)
            {
                $email = $user->email;

                \Mail::send('emails.marketing', $params, function($message) use ($subject,$email)
                {
                    $message->from('contacto@icerlly.com', 'FanPlusPlus.com');
                    $message->to($email)->subject($subject);
                });
                $sends++;
            }

            return Redirect::back()->with('message', 'Emails enviados: '.$sends);
        }else 
        {
            return Redirect::back()->withErrors($validation);
        }

    }

}