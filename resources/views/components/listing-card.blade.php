@props(['listing'])

{{ info("print log in blade")}}

<x-card>
    <div class="flex flex-col md:flex-row justify-center md:justify-start items-center md:items-auto">
        <img class="w-48 mr-6 md:block" src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png')}}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/listing/{{ $listing->id }}">{{ $listing->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i>{{ $listing->location }}
            </div>
        </div>
    </div>
</x-card>
