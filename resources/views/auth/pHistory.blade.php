@extends('layouts.app')

@section('content')

<br>
<div class="container " style="box-shadow: 2px 2px 15px 5px orange; border-radius:25px;">
    <br>
    <div class="row justify-content-center ">
        <div class="col-lg-4 text-light">
            <h4>Zdjęcie profilowe</h5>
                @if($user->photoUrl != NULL)
                <img style="width: 150px; height: 150px; border-radius:180px; padding-bottom: 5px; border: 5px solid white" src="{{$user->photoUrl}}" alt="">
                @else
                <img style="width: 150px; height: 150px; border-radius:180px; padding-bottom: 5px; border: 5px solid white" src="https://firebasestorage.googleapis.com/v0/b/centrumgier-a08cf.appspot.com/o/pfp%2Fdefault.jpg?alt=media" alt="">
                @endif
        </div>
 

        <div class="col-lg-8 text-center pt-0" style="color: white;">
            <h4>Nazwa użytkownika</h5>
                <div class="card py-4 mb-5 mt-md-3 bg-white rounded " style="box-shadow: 2px 2px 15px 5px white; color: black;">

                    <div class="form-group px-3">

                        <h1 class=" col-12 text-center pl-0">{{$user->displayName}}</h1>
                    </div>

                </div>
        </div>
    </div>
    <div class="border-bottom border-grey"></div>

    <BR></BR>
    <div class="row justify-content-center ">
        <div class="col-lg-4 text-light">
            <h4>Historia gier</h5>
                <span class="text-justify mb-3 " style="padding-top:-3px;">Sprawdzisz tutaj ostatnio rozegrane gry. Jaki i ich wyniki</span>
                <br>
                <br>
                <a href="/prof/{{$user->uid}}" class="btn btn-warning">Wróć do profilu</a>
                <br>
                <br>
        </div>

        <div class="col-lg-8 text-center pt-0 ">
            <div class="card py-4 mb-5 mt-md-3 bg-white rounded " style="box-shadow: 2px 2px 15px 5px white;">
                <div class="form-group px-3 ">
                    <table class="table" style="margin: 15px; border-collapse: separate; padding: 30px;">
                        <tr>
                            <th>Gra</th>
                            <th>Data</th>
                            <th>Godzina</th>
                            <th>Wynik</th>
                        </tr>
                        @if($historyPaginated)
                        @foreach($historyPaginated as $h)
                        <tr>
                            <td>
                                @foreach($games as $key2 => $g)
                                @if($key2==$h['gid'])
                                <img style="width: 50px; height: 50px; border-radius:180px; padding-bottom: 5px; border: 5px solid white" src="{{$g['image']}}" alt="">
                                {{$g['name']}}
                                @endif
                                @endforeach
                            </td>
                            <td>
                                {{$h['date']}}
                            </td>
                            <td>{{$h['time']}}</td>
                            <td>{{$h['score']}}</td>
                        </tr>
                        @endforeach
                        </table>
                        @if ($totalPages > 1)                   
                        <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center flex-wrap d-flex">
                        @if ($page > 1)
                            <li class="page-item">
                                <a class="page-link" href="?page={{ $page - 1 }}">Poprzednia</a>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $totalPages; $i++)
                            <li class="page-item {{ $i == $page ? 'active' : '' }}">
                                <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($page < $totalPages)
                            <li class="page-item">
                                <a class="page-link" href="?page={{ $page + 1 }}">Następna</a>
                            </li>
                        @endif
                    </ul>
                </nav>
                @endif
                        @else
                        </table>
                        <h1>Brak gier!!</h1>
                        @endif
                      
                </div>
            </div>
        </div>

    </div>
    <div class="border-bottom border-grey"></div>
</div>


@endsection