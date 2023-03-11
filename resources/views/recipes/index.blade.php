@extends('components.layout')

@section('title', 'レシピ一覧')

@section('content')
    <div class="pt-12 pb-24 lg:grid lg:grid-cols-3 lg:gap-x-8">
        <section aria-labelledby="product-heading" class="mt-6 lg:col-span-2 lg:mt-0 xl:col-span-3">
            <h2 id="product-heading" class="sr-only">Products</h2>

            <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3">
                @foreach($recipes as $recipe)
                    <div class="group relative flex flex-col overflow-hidden rounded-lg border border-gray-200 bg-white">
                        <div class="aspect-w-3 aspect-h-4 bg-gray-200 group-hover:opacity-75 sm:aspect-none sm:h-46">
                            <img src="{{ $recipe->foodImageUrl }}">
                        </div>
                        <div class="flex flex-1 flex-col space-y-2 p-4">
                            <h3 class="text-sm font-medium text-gray-900">
                                <a href="{{ route('recipes-show', ['id' => $recipe->id]) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $recipe->title }}
                                </a>
                            </h3>
                            <p class="text-sm text-gray-500">{{ $recipe->description }}</p>
                            <div class="flex flex-1 flex-col justify-end">
{{--                                <p class="text-sm italic text-gray-500">8 colors</p>--}}
                                <p class="text-base font-medium text-gray-900">{{ $recipe->calorie() }}kcal</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

{{--            {{ $recipes->links('vendor/pagination/tailwind') }}--}}

        </section>
    </div>
@endsection
