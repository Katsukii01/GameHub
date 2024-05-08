@extends('layouts.app')
@section('content')
<div class="container bg-light" style="margin-top: 50px; box-shadow: 2px 2px 15px 5px white; border-radius:25px;">

<h4 class="text-center ">Zarządaj osiągnięciami</h4><br>

<h5>Edytuj osiągnięcie</h5>
<div class="card card-default">
    <div class="card-body p-5">
        <form id="editachivment"  action="{{url('update-achivments/'.$key)}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <input value="{{$editdata['name']}}" id="name" type="text" class="form-control" name="name" placeholder="Nazwa" required autofocus><br>
            <select name="game" class="form-control">
                @foreach($games as $key2 => $g)
                @if($key2 == $editdata['gid'])
                    <option value="{{ $key2 }}" selected>
                    {{$g['name']}}
                    </option>
                @else
                <option value="{{ $key2 }}">
                    {{$g['name']}}
                    </option>
                @endif
                @endforeach
            </select><br>
            <input type="file" class="form-control"  name="image"><br>
            <textarea  id="desc" class="form-control" rows="3" name="desc" placeholder="Opis gry" required>{{$editdata['desc']}}</textarea><br>
            <button  type="submit"  class="btn btn-warning mb-2">Zmień</button>
            <a    href="/admin/achivments" class="btn btn-danger mb-2">Porzuć</a>
        </form>
    </div>
</div>

<br>

@endsection