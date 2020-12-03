@extends('site.app')
@section('title', 'Orders')
@section('content')
    <div class="flex justify-center my-6">
        <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
            <table class="table-auto">
                <thead>
                <tr>
                    <th>Order No.</th>
                    <th>Order Amount</th>
                    <th>Qty.</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <th>{{ $order->order_number }}</th>
                        <td>RM {{ round($order->grand_total, 2) }}</td>
                        <td>{{ $order->item_count }}</td>
                        <td><span class="badge badge-success">{{ strtoupper($order->status) }}</span></td>
                    </tr>
                @empty
                    <div>
                        <p class="alert alert-warning">No orders to display.</p>
                    </div>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection