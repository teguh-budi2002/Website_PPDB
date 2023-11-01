@extends('app')
@section('title', "WELCOME")
@section('content')
<section class="info_payment w-full h-full min-h-screen">
    <div class="flex justify-center">
        <div class="w-3/4 p-4 shadow-md bg-white mt-20">
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
                                class="px-6 py-4 whitespace-nowrap">
                                <p class="font-medium text-gray-900 uppercase">{{ $detail_order->invoice }}</p>
                                <p class="text-slate-600 font-thin mt-1 text-sm">{{ $detail_order->created_at->format('d F Y') }}</p>
                            </th>
                            <td class="px-6 py-4">
                                <p class="text-sm text-slate-600 capitalize">{{ $detail_order->description }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <button class="py-1.5 px-4 rounded border-2 {{ $detail_order->status === 'Belum Dibayar' ? 'border-rose-400 bg-rose-100' : 'border-green-400 bg-green-100' }}">
                                  <span class="{{ $detail_order->status === 'Belum Dibayar' ? 'text-rose-500' : 'text-green-500' }}">{{ $detail_order->status }}</span>
                                </button>
                            </td>
                            <td class="px-6 py-4">
                                <p class="font-semibold">Rp. {{ number_format($detail_order->price, 2) }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <button class="py-1.5 px-6 rounded-md bg-blue-500 hover:bg-blue-400 text-white" id="pay-button">Bayar Sekarang</button>
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
        axios.post("{{ Route('midtrans.cb') }}", result).then(res => {
            console.log("RESPONSE", res)
        }).catch(err => {
            console.log("ERROR", err)
        })
      },
      onPending: function(result){
         console.log(result, "pending")
      },
      // Optional
      onError: function(result){
         console.log(result, "error")
      }
    });
  };
</script>
@endpush
@endsection
