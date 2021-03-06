<h4>Publish a Francken Vrij</h4>

{!! Form::open(['url' => 'admin/francken-vrij', 'files' => true]) !!}

<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('title', $title, ['class' => 'form-control']) !!}
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('volume', 'Volume:', ['class' => 'control-label']) !!}
            {!! Form::number('volume', $volume, ['class' => 'form-control', 'min' => 1]) !!}
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('edition', 'Edition:', ['class' => 'control-label']) !!}
            {!! Form::number('edition', $edition, ['class' => 'form-control', 'min' => 1, 'max' => 3]) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <p>
        Upload the pdf of the new Francken Vrij. Note we currently only support uploading files which are less than 40MB.
    </p>
    {!! Form::label('pdf', 'Francken Vrij PDF', ['class' => 'control-label']) !!}
    {!! Form::file('pdf') !!}
</div>

{!! Form::submit('Publish', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@include('admin._errors')
