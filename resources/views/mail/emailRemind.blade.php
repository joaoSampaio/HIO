<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Link</th>
        <th>Date</th>
    </tr>
    @foreach($data_email as $data)
        <tr>
            <td>{{$data['name']}}</td>
            <td>{{$data['email']}}</td>
            <td>{{$data['link']}}</td>
            <td>{{$data['date']}}</td>
        </tr>
    @endforeach

</table>