@foreach ($runners as $runner)
    {!! QrCode::size(300)->generate($runner->name." ".$runner->last_name." ".$runner->dorsal) !!};
@endforeach
{{-- {!! QrCode::size(300)->generate($text) !!} --}}


