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
</ul>
