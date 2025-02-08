<div x-data="{ currentIndex: @entangle('currentIndex'), autoPlay: true }"
     x-init="
        setInterval(() => {
            if(autoPlay) { currentIndex = (currentIndex + 1) % {{ count($images) }} }
        }, {{ $interval }});
     "
     class="relative w-full bg-gray-300 h-[40vh]">

    <!-- Imágenes -->
    <div class="relative w-full overflow-hidden h-[40vh]">
        @foreach ($images as $index => $image)
            <img src="{{ $image }}" alt="Slide {{ $index + 1 }}"
                 class="w-full h-[40vh] object-cover transition-opacity duration-700 ease-in-out absolute inset-0"
                 x-show="currentIndex === {{ $index }}" x-transition.opacity>
        @endforeach
    </div>

    <!-- Botón Anterior -->
    <button @click="currentIndex = (currentIndex - 1 + {{ count($images) }}) % {{ count($images) }}"
        class="absolute w-12 h-12 p-2 text-black transform -translate-y-1/2 bg-white rounded-full shadow-md left-10 top-1/2 hover:bg-gray-300">
        &lt;
    </button>

    <!-- Botón Siguiente -->
    <button @click="currentIndex = (currentIndex + 1) % {{ count($images) }}"
        class="absolute w-12 h-12 p-2 text-black transform -translate-y-1/2 bg-white rounded-full shadow-md right-10 top-1/2 hover:bg-gray-300">
        &gt;
    </button>

    <!-- Indicadores -->
    <div class="absolute flex space-x-2 transform -translate-x-1/2 bottom-4 left-1/2">
        @foreach ($images as $index => $image)
            <button @click="currentIndex = {{ $index }}"
                class="w-3 h-3 rounded-full"
                :class="{ 'bg-white': currentIndex === {{ $index }}, 'bg-gray-500': currentIndex !== {{ $index }} }">
            </button>
        @endforeach
    </div>
</div>
