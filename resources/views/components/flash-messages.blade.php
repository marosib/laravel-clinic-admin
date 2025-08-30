<div class="absolute top-2 right-4 z-40">
    @if (session()->has('error'))
        <div
            x-data="{show: true}"
            x-effect="setTimeout(() => show = false, 8000)"
            x-show="show"
            x-transition.opacity
            class="flex items-center justify-between w-[300px] p-4 bg-red-600 text-white text-sm font-bold rounded-lg"
        >
            <p>
                {{ session('error') }}
            </p>
            <i x-on:click="show=false" class="lni lni-xmark-circle ml-2 text-white text-xl font-bold cursor-pointer"></i>
        </div>
    @endif
    @if (session()->has('success'))
        <div
            x-data="{show: true}"
            x-effect="setTimeout(() => show = false, 8000)"
            x-show="show"
            x-transition.opacity
            class="flex items-center justify-between w-[300px] p-4 bg-green-600 text-white text-sm font-bold rounded-lg"
        >
            <p>
                {{ session('success') }}
            </p>
            <i x-on:click="show=false" class="lni lni-xmark-circle ml-2 text-white text-xl font-bold cursor-pointer"></i>
        </div>
    @endif
</div>