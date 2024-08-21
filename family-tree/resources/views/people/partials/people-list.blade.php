<ul class="space-y-4">
    @foreach($people as $person)
    <li class="p-4 bg-white rounded-lg shadow-md flex items-center">
        <a href="{{ route('peoples.show', $person->id) }}" class="flex items-center space-x-4">
            @if($person->avatar)
            <img src="{{ asset('storage/' . $person->avatar) }}" alt="Avatar" class="w-24 h-24 rounded-full">
            @endif
            <div>
                <strong class="text-xl font-semibold">{{ $person->first_name }} {{ $person->last_name }}</strong>
                <ul class="flex space-x-2 mt-2">
                    @foreach($person->countries as $country)
                    <li class="flex items-center space-x-1">
                        <img src="{{ asset('storage/' . $country->country_flag) }}" alt="{{ $country->name }} flag" class="w-8 h-5 rounded">
                        <span class="text-gray-600">{{ $country->name }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </a>
    </li>
    @endforeach
</ul>
