

@component('mail::message')
# activate your account 

> Your account has been Registred! left one step to acivate .

### please click the button for active your account     

@component('mail::button', ['url' => route('confirm_registration') . '?token=' . $user->confirm_token ])
active account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
