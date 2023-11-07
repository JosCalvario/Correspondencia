<table>
    <thead>
        <tr>
            <th>Folio</th>
            <th>Fecha</th>
            <th>Emisor</th>
            <th>Puesto del emisor</th>
            <th>Tema</th>
            <th>Área asignada</th>
            <th>Estado</th>
            <th>Es de conocimiento?</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
            <tr>
                <td>{{$d->folio}}</td>
                <td>{{$d->date}}</td>
                <td>{{$d->sender}}</td>
                <td>{{$d->sender_position}}</td>
                <td>{{$d->subject}}</td>
                <td>{{$d->area->name}}</td>
                <td>{{$d->status}}</td>
                <td>{{$d->knowledge}}</td>
            </tr>
        @endforeach
    </tbody>
</table>