@component('mail::message')
# Greetings {{$data->name}}

You have been invited to this task by a team member

View your task by clicking here

@component('mail::button', ['url' => ''])
Task Link

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
