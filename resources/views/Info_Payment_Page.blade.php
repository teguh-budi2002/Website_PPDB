@extends('app')
@section('title', "WELCOME")
@section('content')
<section class="info_payment w-full h-full min-h-screen">
    <div class="flex justify-center">
        <div class="md:w-3/4 w-full p-4 shadow-md bg-white mt-20">
            <p class="text-2xl font-semibold capitalize">Tagihan Pembayaran</p>

            <div class="relative overflow-x-auto mt-5">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Keterangan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status Pembayaran
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Dibayar
                            </th>
                            <th scope="col" class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b">
                            <th scope="row"
                                class="md:px-6 px-2 md:py-4 py-2 whitespace-nowrap">
                                <p class="font-medium text-gray-900 uppercase">{{ $detail_order->invoice }}</p>
                                <p class="text-slate-600 font-thin mt-1 text-sm">{{ $detail_order->created_at->format('d F Y') }}</p>
                            </th>
                            <td class="md:px-6 px-2 md:py-4 py-2">
                                <p class="text-sm text-slate-600 capitalize truncate">{{ $detail_order->description }}</p>
                            </td>
                            <td class="md:px-6 px-2 md:py-4 py-2">
                                <button class="md:py-1.5 py-0.5 md:px-4 px-1 rounded border-2 {{ $detail_order->status === 'Belum Dibayar' ? 'border-rose-400 bg-rose-100' : 'border-green-400 bg-green-100' }}">
                                  <span class="{{ $detail_order->status === 'Belum Dibayar' ? 'text-rose-500' : 'text-green-500' }} md:text-base text-xs">{{ $detail_order->status }}</span>
                                </button>
                            </td>
                            <td class="md:px-6 px-2 md:py-4 py-2">
                                <p class="font-semibold md:text-base text-sm truncate">Rp. {{ number_format($detail_order->price, 2) }}</p>
                            </td>
                            <td class="md:px-6 px-2 md:py-4 py-2">
                                <button class="py-1.5 px-6 rounded-md bg-blue-500 hover:bg-blue-400 text-white md:text-base text-xs" id="pay-button">Bayar Sekarang</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
@push('js')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.SITE_KEY') }}"></script>
<script type="text/javascript">
  document.getElementById('pay-button').onclick = function(){
  // SnapToken acquired from previous step
  snap.pay("{{ $detail_order->snap_token }}", {
      // Optional
      onSuccess: function(result){
         console.log('success')
      },
      onPending: function(result){
         console.log("pending")
      },
      // Optional
      onError: function(result){
         console.log("error")
      }
    });
  };
</script>
@endpush
@endsection
