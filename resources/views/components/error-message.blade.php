<div>
    <div class="mt-1 mb-1">
        <span class="text-danger {{ $errorName }}">
            @error($errorName)
                {{ $message }}
            @enderror
        </span>
    </div>
</div>
