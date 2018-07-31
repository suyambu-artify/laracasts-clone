@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => route('confirm_registration') . '?token=' . $user->confirm_token ])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
