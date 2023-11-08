<table>
    <thead>
        <tr>
            <th style="text-align: center; font-size:20px; width:min-content;" colspan="{{count($areas)+1}}"><b>Dirección Administrativa</b></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th style="width:100px"></th>
            @foreach ($areas as $area)
                <th style="font-size: 15px;">{{$area->name}}</th>
            @endforeach
        </tr>
        <tr>
            <th style="font-size: 15px;">Atendidos</th>
            @foreach ($data as $da)
                <td>{{$da['Atendidos']}}</td>
            @endforeach
        </tr>
        <tr>
            <th style="font-size: 15px;">Conocimiento</th>
            @foreach ($data as $da)
                <td>{{$da['Conocimiento']}}</td>
            @endforeach
        </tr>
        <tr>
            <th style="font-size: 15px;">Sin Respuesta</th>
            @foreach ($data as $da)
                <td>{{$da['Sin Respuesta']}}</td>
            @endforeach
        </tr>
        <tr>
            <th style="font-size: 15px;">Total</th>
            @foreach ($data as $da)
                <td>{{$da['Total']}}</td>
            @endforeach
        </tr>
    </tbody>
</table>