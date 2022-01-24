<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Order</th>
                <th>Date</th>
                <th>Status</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{$order->ordercode }}</td>
                <td>{{\Carbon\Carbon::parse($order->created_at)->format('d M Y')}}</td>
                <td>{{$order->status }}</td>
                <td>£{{$order->total_price }} for {{$order->orderproducts->count() }} items</td>
                <td><a href="{{route('user.orders_detail',$order->id)}}" class="btn btn-fill-out btn-sm">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $orders->links() }}
</div>