<div class="table-responsive">
    @if($tickets->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Topic</th>
                <th>Status</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $item)
                <tr>
                    <td>{{$item->title}}</td>
                    <td>{{$item->topic}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <a href="{{route('user.tickets_detail', $item->id)}}">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else

    <div class="alert alert-warning">
        No tickets found
    </div>
    @endif
</div>
