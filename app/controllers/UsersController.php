<?php


use Saurio\Entities\User;
use Saurio\Entities\Avatar;
use Saurio\Entities\Confirmations;
use Saurio\Managers\ProfileManager;
use Saurio\Managers\PasswordManager;
use Saurio\Managers\PaymentManager;
use Saurio\Managers\AvatarManager;
use Saurio\Managers\EmailManager;
use Saurio\Managers\UserManager;
use Saurio\Managers\RegisterManager;
use Saurio\Managers\ConfirmationsManager;
use Saurio\Repositories\UserRepo;
use Saurio\Repositories\AvatarRepo;
use Saurio\Repositories\ApplyRepo;
use Saurio\Repositories\ConfirmationsRepo;

class UsersController extends BaseController
{
	protected $userRepo;
	protected $avatarRepo;
	protected $applyRepo;
	protected $confirmationsRepo;

	public function __construct(UserRepo $userRepo, AvatarRepo $avatarRepo, ApplyRepo $applyRepo, ConfirmationsRepo $confirmationsRepo)
	{
		$this->userRepo = $userRepo;
		$this->avatarRepo = $avatarRepo;
		$this->applyRepo = $applyRepo;
		$this->confirmationsRepo = $confirmationsRepo;
	}

	//Register user
	public function signup()
	{
		$title =  "Registrarse";
		$description = $title;

		return View::make('users/signup',compact('title','description'));
	}

	public function signup_register()
	{
		$user = $this->userRepo->newUser();
		$manager = new UserManager($user, Input::all());
		$manager->saveUser();

		return Redirect::route('welcome');
	}

	//Register apply
	public function apply()
	{
		$title =  "Solicitud de Partners";
		$description = $title;

		$send_apply="";
        if(Saurio\Entities\Apply::where('user_id', '=', Auth::user()->id)->exists())
        {
            $send_apply = true;
        }else
        {
            $send_apply = false;
        }
        
		return View::make('users/apply', compact('send_apply','title','description'));
	}

	public function apply_register()
	{
		$apply = $this->applyRepo->newApply();
		$manager = new RegisterManager($apply, Input::all());
		$manager->save();

		return Redirect::back();
	}

	//Settings profile
	public function settings_profile()
	{
		$title =  "Configuración de Perfil";
		$description = $title;

		$user = Auth::user();
		return View::make('users/settings/profile', compact('user','title','description'));

	}

	public function settings_profile_update()
	{
		$user = Auth::user();
		$manager = new ProfileManager($user, Input::all());
		$manager->save();

		return Redirect::route('settings_profile')
                        ->with('message', 'Tu perfil se actualizó correctamente.');
	}

	//Settings password
	public function settings_password()
	{
		$title =  "Configuración de Contraseña";
		$description = $title;

		$user = Auth::user();
		return View::make('users/settings/password', compact('user','title','description'));

	}

	public function settings_password_update()
	{
		$user = Auth::user();
		$manager = new PasswordManager($user, Input::all());
		$manager->save();

		return Redirect::route('settings_password')
		                ->with('message', 'Tu perfil se actualizó correctamente.');
	}

	//Settings password
	public function settings_payment()
	{
		$title =  "Configuración de Pagos";
		$description = $title;

		$payment = User::find(Auth::user()->id)->payment;
		return View::make('users/settings/payment', compact('payment','title','description'));

	}

	public function settings_payment_update()
	{
		$payment = User::find(Auth::user()->id)->payment;
		$payment->approved = 0;
		$manager = new PaymentManager($payment, Input::all());
		$manager->save();

		return Redirect::route('settings_payment_update')
		                ->with('message', 'Tu perfil se actualizó correctamente.');
	}

	//Settings avatar
	public function settings_avatar()
	{
		$title =  "Configuración de Avatar";
		$description = $title;

		$avatar = User::find(Auth::user()->id)->avatar;
		return View::make('users/settings/avatar', compact('avatar','title','description'));

	}

	public function settings_avatar_update()
	{
		$file = Input::file('file');
		$validation = Validator::make(['file'=> $file], ['file' => 'required|image|max:3000']);
        
        if(!$validation->fails())
        {
        	//Rename file
            $extension = $file->getClientOriginalExtension(); 
            $newName = str_random(20).".".$extension;

            //Move file to images avatar
            $file->move('images/avatar/', $newName);

            //Update database and delete old image
            $avatar = $this->avatarRepo->findByUserID(Auth::user()->id);
            if($avatar->name != 'default.png')//Nunca se elimina la default
            {
                if(File::exists('images/avatar/'.$avatar->name)) 
                {
                    File::delete('images/avatar/'.$avatar->name);
                } 
            }
            $avatar->name = $newName;   
            $avatar->save();

            return Redirect::back()->with('message', 'Tu perfil se actualizó correctamente.');
        }else 
        {
        	return Redirect::back()->withErrors($validation);
        }

	}

	public function confirm_email()
	{
		$title =  "Confirmación de Email";
		$description = $title;

		return View::make('users/settings/confirmemail', compact('title','description'));
	}

	public function confirm_email_update()
	{
		$confirm = $this->confirmationsRepo->newConfirmation();
		$manager = new ConfirmationsManager($confirm, Input::all());
		$manager->confirmEmail();

		return Redirect::back();
	}

}