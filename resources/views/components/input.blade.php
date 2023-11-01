 @props([
   'type' => null,
   'name' => null,
   'id' => null,
   'labelName' => null,
   'value' => null
 ])
 <div class="form_group relative">
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" class="block px-2.5 pb-2.5 pt-1 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-400 appearance-none focus:outline-none focus:ring-0 focus:border-blue-primary peer" value="{{ $value }}" placeholder=" " />
    <label for="{{ $id }}" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">{{ $labelName }}</label>
</div>