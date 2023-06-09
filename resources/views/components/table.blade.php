@if ($typetable == 'movil')
    <table {{ $attributes->merge(['class' => "d-table d-lg-none table $class"]) }}>
        <thead>
            <tr>
                <td class="text-end">
                    <span class="d-inline-flex">
                        {{$head}}
                    </span>
                </td>
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
@else
    <table {{ $attributes->merge(['class' => "d-none d-lg-table table $class"]) }}>
        <thead>
            <tr class="text-center {{ $theadclass }}">
                @for ($i = 0; $i < count($thead); $i++)
                    <th class="{{($i == count($thead) -1) ? 'text-center' : ''}}" scope="col">{{ $thead[$i] }}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
@endif
