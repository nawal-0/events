@props(['label', 'type', 'name', 'class' => ''])

<div class="mb-6 {{ $class }}">
    <label for={{ $label }} class="inline-block text-lg mb-2">
        {{ $label }}
    </label>
    <input
        type={{ $type }}
        class="border border-gray-200 rounded p-2 w-full"
        name={{ $name }} value="{{ old($name) }}"
    />

    @error($name)
        <p class="text-red-500 text-sm mt-2">
            {{ $message }}
        </p>
    @enderror
    
</div>