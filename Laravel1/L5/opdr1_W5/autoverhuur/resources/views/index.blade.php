@extends('layouts.app')
@section('content')
<td><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-40"><a href="{{ route('cars.create')}}"> Create</a></button></td>
<table class="border-solid border-2 border-indigo-600 ml-40 mt-24">
    <thead>
        <tr class="border-solid border-2 border-indigo-600 text-4xl">
            <th class="border-solid border-2 border-indigo-600">id</th>
            <th>Merk</th>
            <th class="border-solid border-2 border-indigo-600">Type</th>
            <th class="border-solid border-2 border-indigo-600">Bouwjaar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
        <tr class="border-solid border-2 border-indigo-600">
            <td class="border-solid border-2 border-indigo-600 text-3xl">{{$car->id}}</td>
            <td class="border-solid border-2 border-indigo-600 text-3xl">{{$car->merk}}</td>
            <td class="border-solid border-2 border-indigo-600 text-3xl">{{$car->type}}</td>
            <td class="border-solid border-2 border-indigo-600 text-3xl">{{$car->bouwjaar}}</td>
            <td><button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><a href="{{ route('cars.edit',$car->id)}}">Edit</a> </button></td>
            <td><form action="{{ route('cars.destroy', $car->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">Delete</button>
              </form></td>
        </tr>
        @endforeach

    <p>list donw bij bouwjaar</p>
    </tbody>
@endsection
