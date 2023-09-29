<x-main-layout>
    <h2>{{ $title }}</h2>
    <form action="/stakeholders/create" method="post">
        @csrf

        <input type="hidden" name="id" value="{{ old('id') }}">
        <div class="form-group">
            <label for="name">{{ __('Name') }}:</label>
            <input type="text"
                   class="form-control"
                   id="name"
                   name="name"
                   value="{{ $stakeholder->name ?? old('name') }}"
            >
        </div>
        <div class="form-group">
            <label for="imprint">{{ __('Impressum') }}:</label>
            <input type="text"
                   class="form-control"
                   id="imprint"
                   name="imprint"
                   value="{{ $stakeholder->imprint ?? old('imprint') }}"
            >
        </div>
        <div class="form-group">
            <label for="urls">{{ __('URLs') }}:</label>
            <textarea class="form-control"
                      id="urls"
                      name="urls"
                      rows="4">{{ implode("\r\n", $stakeholder->urls ?? []) ?: old('urls') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Speichern') }}</button>
    </form>
</x-main-layout>
