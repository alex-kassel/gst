<x-main-layout>
    <h2>{{ $title }}</h2>
    <table class="table">
        <tr>
            <th>{{ __('Id')  }}</th>
            <th>{{ __('Name')  }}</th>
            <th>{{ __('Web')  }}</th>
            <th>{{ __('Urls')  }}</th>
            <th>{{ __('Links')  }}</th>
        </tr>
        @foreach($stakeholders as $stakeholder)
            <tr>
                <td>{{ $stakeholder->id  }}</td>
                <td>{{ $stakeholder->name  }}</td>
                <td><a href="{{ $stakeholder->imprint  }}" target="_blank">{{ __('Impressum') }}</a></td>
                <td>{!! implode("<br>", $stakeholder->urls->pluck('url')->toArray()) !!}</td>
                <td><a href="/stakeholders/{{ $stakeholder->id  }}/edit" target="_blank">{{ __('Bearbeiten') }}</a></td>
            </tr>
        @endforeach
    </table>
</x-main-layout>
