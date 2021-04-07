@if ($errors->any())
<div class="w-1/2 mx-auto bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert"">
    <ul>
        @foreach ($errors->all() as $error)
        <li class="text-center">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
        <div class="w-1/2 mx-auto bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
            <p class="text-center">{{session('success')}}</p>
        </div>
@endif