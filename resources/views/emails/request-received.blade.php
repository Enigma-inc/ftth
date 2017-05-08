@component('mail::message')
#FTTH request received from {{$survey->name}} 
@component('mail::panel')
Below are the details of submission
@endcomponent


@component('mail::table')
|                |    |
| -------------  | --------:|
| **Name**  | {{$survey->name}}      |
| **Surname**  | {{$survey->surname}}      |
| **Home Phone**  | {{$survey->phone_home}}      |
| **Office Phone**  | {{$survey->phone_office}}      |
| **Mobile Phone**  | {{$survey->phone_mobile}}     |
| **Request For**  | {{$survey->type}}    |
@endcomponent
@component('mail::button', ['url' => './ftth-requests', 'color' => 'blue'])
View All Submitted Requests
@endcomponent
@endcomponent