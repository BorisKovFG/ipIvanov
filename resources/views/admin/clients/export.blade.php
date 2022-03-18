<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Agreement date</th>
        <th>Delivery cost</th>
        <th>Region</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{{ $client->name }}</td>
            <td>{{ $client->agreement_date }}</td>
            <td>{{ $client->delivery_cost }}</td>
            <td>{{ $client->region }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

