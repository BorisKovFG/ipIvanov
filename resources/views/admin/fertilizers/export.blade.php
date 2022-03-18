<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Norm nitrogen</th>
        <th>Norm phosphorus</th>
        <th>Norm potassium</th>
        <th>Culture group</th>
        <th>Region</th>
        <th>Price</th>
        <th>Description</th>
        <th>Purpose</th>
    </tr>
    </thead>
    <tbody>
    @foreach($fertilizers as $fertilizer)
        <tr>
            <td>{{ $fertilizer->name }}</td>
            <td>{{ $fertilizer->norm_nitrogen }}</td>
            <td>{{ $fertilizer->norm_phosphorus }}</td>
            <td>{{ $fertilizer->norm_potassium }}</td>
            <td>{{ $fertilizer->cultureGroup->name }}</td>
            <td>{{ $fertilizer->region }}</td>
            <td>{{ $fertilizer->price }}</td>
            <td>{{ $fertilizer->description }}</td>
            <td>{{ $fertilizer->purpose }}</td>
        </tr>
    @endforeach

    </tbody>
</table>

