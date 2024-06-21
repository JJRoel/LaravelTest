@extends('layouts.app')

@section('content')
    <h1>Agenda voor {{ $dayName }} {{ $date->format('d') }} {{ $monthName }} {{ $date->format('Y') }}</h1>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Activiteiten</h5>
            <ul class="list-group">
                @foreach ($agendaItems as $item)
                    <li class="list-group-item">
                        {{ $item->titre }}: {{ $item->details }}
                        <br>
                        <small>Van {{ $item->date->format('d-m-Y') }} tot {{ $item->end_date ? $item->end_date->format('d-m-Y') : 'onbepaald' }}</small>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @if ($birthdays->count())
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Verjaardagen</h5>
                <ul class="list-group">
                    @foreach ($birthdays as $birthday)
                        <li class="list-group-item">{{ $birthday->prenom }} {{ $birthday->nom }} ({{ $birthday->login }})</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Een activiteit toevoegen</h5>
            <form action="{{ url('/agenda') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="titre">Titel:</label>
                    <input type="text" class="form-control" name="titre" id="titre">
                </div>
                <div class="form-group">
                    <label for="details">Details:</label>
                    <textarea class="form-control" name="details" id="details"></textarea>
                </div>
                <div class="form-group">
                    <label for="item_id">Genre:</label>
                    <select class="form-control" name="item_id" id="item_id">
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Begindatum:</label>
                    <input type="date" class="form-control" name="date" id="date">
                </div>
                <div class="form-group">
                    <label for="end_date">Einddatum:</label>
                    <input type="date" class="form-control" name="end_date" id="end_date">
                </div>
                <button type="submit" class="btn btn-primary">Toevoegen</button>
            </form>
        </div>
    </div>
@endsection
