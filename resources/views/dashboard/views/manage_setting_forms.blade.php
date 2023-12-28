@extends('dashboard.app_dashboard')
@section('breadcrumb')
<ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
    <li class="leading-normal text-sm">
        <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
    </li>
    <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
        aria-current="page">Settings</li>
</ol>
<h6 class="mb-0 font-bold capitalize">Settings</h6>
@endsection
@section('content')
<div class="w-full h-full min-h-[600px]">
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-3xl px-3 mt-0 mb-6 lg:mb-0 lg:flex-none p-4 rounded-md shadow-2xl">
            <div class="p-4">
                <p class="font-bold text-lg">Setting Formulir</p>
                <div class="settings mt-5">
                    <form action="{{ Route('update_setting_form') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        @if (isset($setting_forms))
                            @foreach ($setting_forms as $form)
                            <div class="form_group space-y-2">
                                <div class="type_form">
                                    <p>Tipe Formulir: <span class="font-semibold">{{ preg_replace('/([a-z])([A-Z])/', '$1 $2', $form->form_type) }}</span></p>
                                </div>
                                <div class="setting_form">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="isFormEnabled[{{ $form->form_type }}]" class="sr-only peer" @if ($form->isFormEnabled) {{ 'checked' }} @endif onchange="updateLabel(this)">
                                        <div class="w-11 h-6 bg-gray-50 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-gray-200 after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                        <span class="ms-3 text-xs status-label {{ $form->isFormEnabled ? 'text-green-500' : 'text-rose-500' }}">{{ $form->isFormEnabled ? 'Enable' : 'Disabled' }}</span>
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="form_ids[{{ $form->form_type }}]" value="{{ $form->id }}">
                            @endforeach
                        @endif
                        <div class="btn_submit mt-3">
                            <button type="submit" class="py-2 px-10 rounded-md text-white bg-sky-500">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('dashboard-js')
<script>
    function updateLabel(checkbox) {
        let labelText = checkbox.parentNode.querySelector('.status-label');
        labelText.innerHTML = checkbox.checked ? 'Enable' : 'Disabled';
        labelText.className = 'ms-3 text-xs status-label ' + (checkbox.checked ? 'text-green-500' : 'text-rose-500');
    }
</script>
@endpush
@endsection