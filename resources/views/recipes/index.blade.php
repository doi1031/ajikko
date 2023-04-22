@extends('components.layout')

@section('title', 'レシピ一覧')

@section('content')
    <div>
        <form action="{{ route('recipes-index') }}" method="GET" class="form-inline">
            <label for="並び替え" class="block text-sm font-medium leading-6 text-gray-900">並び替え</label>
            <select name="sort" id="sort" onchange="this.form.submit()" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="low_fat" {{ $selected_sort === 'low_fat' ? 'selected' : '' }}>ローファット</option>
                <option value="high_protein" {{ $selected_sort === 'high_protein' ? 'selected' : '' }}>高タンパク</option>
                <option value="newest" {{ $selected_sort === 'newest' ? 'selected' : '' }}>新着順</option>
            </select>
        </form>
    </div>
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
                            <div class="flex flex-1 flex-col justify-end">
{{--                                <p class="text-sm italic text-gray-500">8 colors</p>--}}
                                <p class="text-base font-medium text-gray-900">{{ $recipe->calorie() / $recipe->howMany()  }}kcal / p{{ $recipe->prot() / $recipe->howMany() }} - f{{ $recipe->fat() / $recipe->howMany()  }} - c{{ $recipe->carbo() / $recipe->howMany()  }}
                            </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

{{--            {{ $recipes->links('vendor/pagination/tailwind') }}--}}

        </section>
    </div>
@endsection
