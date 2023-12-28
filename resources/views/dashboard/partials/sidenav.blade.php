<ul class="flex flex-col pl-0 mb-0">
    <li class="mt-0.5 w-full">
        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg {{ Request::is('dashboard') ? 'bg-white  shadow-soft-xl' : '' }} px-4 font-semibold text-slate-700 transition-colors"
            href="{{ Route('db.index') }}">
            <div
                class="{{ Request::is('dashboard') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa fa-solid fa-chart-pie {{ Request::is('dashboard') ? 'text-white' : '' }}"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
        </a>
    </li>

    <li class="mt-0.5 w-full">
        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 {{ Request::is('dashboard/manage-data-students*') ? 'bg-white  shadow-soft-xl' : '' }} flex items-center whitespace-nowrap px-4 transition-colors text-slate-700 font-semibold rounded-lg" href="{{ Route('manage.data_students') }}">
            <div class="{{ Request::is('dashboard/manage-data-students*') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa fa-solid fa-graduation-cap {{ Request::is('dashboard/manage-data-students*') ? 'text-white' : '' }}"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Manage Data Students</span>
        </a>
    </li>
    <li class="mt-0.5 w-full">
        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 {{ Request::is('dashboard/settings*') ? 'bg-white  shadow-soft-xl' : '' }} flex items-center whitespace-nowrap px-4 transition-colors text-slate-700 font-semibold rounded-lg" href="{{ Route('manage_settings') }}">
            <div class="{{ Request::is('dashboard/settings*') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 {{ Request::is('dashboard/settings*') ? 'text-white' : '' }}">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                </svg>
                {{-- <i class="fa fa-reguler fa-newspaper "></i> --}}
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Setting Forms</span>
        </a>
    </li>
</ul>
