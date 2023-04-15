@if(session()->has('success'))
    <x-alert alertType="success" message="{{session()->get('success')}}"/>
@endif

@if(session()->has('error'))
    <x-alert alertType="danger" message="{{session()->get('error')}}"/>
@endif

@if(session()->has('warning'))
    <x-alert alertType="warning" message="{{session()->get('warning')}}"/>
@endif
