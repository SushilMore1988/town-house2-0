@component('mail::layout')
{{-- Header --}}
@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        {{-- {{ config('app.name') }} --}}
        <a href="#" title="" target="_blank"> <img alt="" src="{{url('/img/logo-with-name.png')}}" width="200" style="max-width:84px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage"> </a>
    @endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
