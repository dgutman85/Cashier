<table class="table table-striped table-bordered">
    <tr>
        <th>Valor</th>
        <th>Cantidad</th>
        <th>SubTotal</th>
    </tr>
    @foreach($box->money as $money)
        <tr>
            <td>{{ $money->name }}</td>
            @if($money->name == 'Monedas')
                <td>{{ $money->pivot->quantity }}</td>
            @else
                <td>{{ number_format($money->pivot->quantity, 0, '', '') }}</td>
            @endif

            <td>{{ $money->value * $money->pivot->quantity }}</td>
        </tr>
    @endforeach
    <tr>
        <th colspan="2">Total</th>
        <th>
            ${{ $box->money->sum(function($money){ return $money->value * $money->pivot->quantity; }) }}
        </th>
    </tr>
</table>