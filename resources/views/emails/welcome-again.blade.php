@component('mail::message')
# Introduction

Thanks

@component('mail::button', ['url' => 'https://laracasts.com'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => ''])
quoote
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
