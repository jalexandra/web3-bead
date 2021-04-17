<div>
    <label for="{{ $codedName }}">{{ $label }}:</label>
    <input
        type="{{ $type }}"
        class="@error('{{ $codedName }}') is-invalid @enderror"
        id="{{ $codedName }}"
        name="{{ $codedName }}"
        value="{{ old($codedName) ?? $defaultValue }}"
        @if($required) required @endif
        @if($readonly) readonly disabled @endif
    />
    @error($codedName)
    <div>
        <span>{{ $message }}</span>
    </div>
    @enderror
</div>
