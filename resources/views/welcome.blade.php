@extends('layouts.app')

@section('content')
<div class="w-full mx-auto md:w-1/3 md:mx-auto">
    <form class="w-full max-w-lg bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-8"
        action="{{route('addCalculation')}}" method="POST" enctype="multipart/form-data" id="calculationForm">
        @csrf
        <header class="w-full mb-6">
            <h2 class="text-center text-gray-700 text-xl underline font-bold">Calculator</h2>
        </header>
        <div class="flex flex-wrap mb-6">
            <div class="w-full lg:w-1/3 px-3 mb-6">
                <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="number_1">
                    Number 1
                </label>
                <input
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{old('number_1')}}" name="number_1" id="number_1" type="number" placeholder="Number 1" required>
            </div>
            <div class="w-1/2 lg:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="calculation">
                    Calculation
                </label>
                <select
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="calculation" id="calculation" required>
                    <option value="add" title="add">+</option>
                    <option value="subtract" title="subtract">-</option>
                    <option value="multiply" title="multiply">*</option>
                    <option value="divide" title="divide">%</option>
                </select>
            </div>
            <div class="w-full lg:w-1/3 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="number_2">
                    Number 2
                </label>
                <input
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{old('number_2')}}" name="number_2" id="number_2" type="number" placeholder="Number 2" required>
            </div>
        </div>
        <div class="flex flex-wrap content-center">
            <button
                class="mx-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Calculate
            </button>
        </div>
    </form>
</div>
@isset($calculations)
<div class="mx-auto w-full max-w-lg bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-8">
    <table class="table-auto stripe">
        <thead class="mx-auto">
            <header class="w-full mb-6">
                <h2 class="text-center text-gray-700 text-xl underline font-bold">Calculation History</h2>
            </header>
            <tr>
                <th class="w-1/2">Description</th>
                <th class="w-1/4 ml-1">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($calculations as $calculation)
            <tr>
                <td class="text-center">{{$calculation->value}}</td>
                <td class="text-center">{{Carbon\Carbon::parse($calculation->created_at)->format('M d Y')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endisset
@endsection