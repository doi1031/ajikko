@extends('components.layout')

@section('title', 'レシピ一覧')

@section('content')
    <div class="pt-12 pb-24 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4">
        <aside>
            <h2 class="sr-only">Filters</h2>

            <!-- Mobile filter dialog toggle, controls the 'mobileFilterDialogOpen' state. -->
            <button type="button" class="inline-flex items-center lg:hidden">
                <span class="text-sm font-medium text-gray-700">Filters</span>
                <!-- Heroicon name: mini/plus -->
                <svg class="ml-1 h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
            </button>

            <div class="hidden lg:block">
                <form class="space-y-10 divide-y divide-gray-200">
                    <div>
                        <fieldset>
                            <legend class="block text-sm font-medium text-gray-900">Color</legend>
                            <div class="space-y-3 pt-6">
                                <div class="flex items-center">
                                    <input id="color-0" name="color[]" value="white" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="color-0" class="ml-3 text-sm text-gray-600">White</label>
                                </div>

                                <div class="flex items-center">
                                    <input id="color-1" name="color[]" value="beige" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="color-1" class="ml-3 text-sm text-gray-600">Beige</label>
                                </div>

                                <div class="flex items-center">
                                    <input id="color-2" name="color[]" value="blue" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="color-2" class="ml-3 text-sm text-gray-600">Blue</label>
                                </div>

                                <div class="flex items-center">
                                    <input id="color-3" name="color[]" value="brown" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="color-3" class="ml-3 text-sm text-gray-600">Brown</label>
                                </div>

                                <div class="flex items-center">
                                    <input id="color-4" name="color[]" value="green" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="color-4" class="ml-3 text-sm text-gray-600">Green</label>
                                </div>

                                <div class="flex items-center">
                                    <input id="color-5" name="color[]" value="purple" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="color-5" class="ml-3 text-sm text-gray-600">Purple</label>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="pt-10">
                        <fieldset>
                            <legend class="block text-sm font-medium text-gray-900">Category</legend>
                            <div class="space-y-3 pt-6">
                                <div class="flex items-center">
                                    <input id="category-0" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="category-0" class="ml-3 text-sm text-gray-600">All New Arrivals</label>
                                </div>

                                <div class="flex items-center">
                                    <input id="category-1" name="category[]" value="tees" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="category-1" class="ml-3 text-sm text-gray-600">Tees</label>
                                </div>

                                <div class="flex items-center">
                                    <input id="category-2" name="category[]" value="crewnecks" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="category-2" class="ml-3 text-sm text-gray-600">Crewnecks</label>
                                </div>

                                <div class="flex items-center">
                                    <input id="category-3" name="category[]" value="sweatshirts" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="category-3" class="ml-3 text-sm text-gray-600">Sweatshirts</label>
                                </div>

                                <div class="flex items-center">
                                    <input id="category-4" name="category[]" value="pants-shorts" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="category-4" class="ml-3 text-sm text-gray-600">Pants &amp; Shorts</label>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="pt-10">
                        <fieldset>
                            <legend class="block text-sm font-medium text-gray-900">Sizes</legend>
                            <div class="space-y-3 pt-6">
                                <div class="flex items-center">
                                    <input id="sizes-0" name="sizes[]" value="xs" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="sizes-0" class="ml-3 text-sm text-gray-600">XS</label>
                                </div>

                                <div class="flex items-center">
                                    <input id="sizes-1" name="sizes[]" value="s" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="sizes-1" class="ml-3 text-sm text-gray-600">S</label>
                                </div>

                                <div class="flex items-center">
                                    <input id="sizes-2" name="sizes[]" value="m" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="sizes-2" class="ml-3 text-sm text-gray-600">M</label>
                                </div>

                                <div class="flex items-center">
                                    <input id="sizes-3" name="sizes[]" value="l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="sizes-3" class="ml-3 text-sm text-gray-600">L</label>
                                </div>

                                <div class="flex items-center">
                                    <input id="sizes-4" name="sizes[]" value="xl" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="sizes-4" class="ml-3 text-sm text-gray-600">XL</label>
                                </div>

                                <div class="flex items-center">
                                    <input id="sizes-5" name="sizes[]" value="2xl" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="sizes-5" class="ml-3 text-sm text-gray-600">2XL</label>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </aside>

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
