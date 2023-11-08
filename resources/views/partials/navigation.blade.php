<nav class="w-full bg-blue-primary p-1 py-3">
    <div class="flex justify-center">
        <div class="w-11/12">
          <ul class="flex items-center md:space-x-6 space-x-2">
            <li>
              <a href="{{ Route('home') }}" class="text-white px-3 md:text-base text-xs">Beranda</a>
            </li>
            @if (!Auth::check())
              <li>
                <a href="{{ Route('register') }}" class="border-2 border-white p-1 hover:bg-white hover:text-blue-primary rounded text-white px-3 transition-colors duration-150">Register</a>
              </li>
              <li>
                <a href="{{ Route('login') }}" class="border-2 border-white p-1 hover:bg-white hover:text-blue-primary rounded text-white px-3 transition-colors duration-150">Login</a>
              </li>
              @else
              <li>
                <a href="{{ Route('after.login') }}" class="text-white px-3 md:text-base text-xs truncate">Portal PPDB</a>
              </li>
              <li>
                <a href="{{ Route('info.payment') }}" class="text-white px-3 md:text-base text-xs">Informasi Pembayaran</a>
              </li>
              <li>
                <form action="{{ Route('logout.process') }}" method="POST">
                  @csrf
                  <button type="submit" class="md:border-2 md:bg-transparent bg-rose-500 border-white hover:border-rose-400 p-1 hover:bg-rose-500 rounded text-white px-3 transition-colors duration-150">Logout</button>
                </form>
              </li>
            @endif
          </ul>
        </div>
    </div>
</nav>
