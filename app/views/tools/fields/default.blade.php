<div class="form-group">
    {{ Form::label($name, $label) }}
    {{ $control }}
    @if ($error)
        </br><div class="alert alert-danger" role="alert"><p>{{ $error }}</p></div>
    @endif
</div>