{{-- todo container feedback --}}
<div
    class="_component1 overflow-clip w-full flex flex-col gap-4 overflow-y-auto bg-white rounded-[20px] p-[20px] h-full">

    <div class="">
        {{-- todo wrapper judul, search & filter --}}
        <div class="_wrapper-heading-search-filter flex justify-between items-center">
            <div class="_heading">
                <h1 class="text-[20px] font-bold">Data Feedback</h1>
            </div>
        </div>

        {{-- todo wrapper action : check all, reply, delete --}}
        <div class="_wraper-action mt-8 flex justify-between items-center">
            <div class="_checkbox-button-all flex items-center gap-2">

                {{-- todo checkbox komponent --}}
                <div class="_checkbox">
                    <div class="inline-flex items-center">
                        <label class="relative flex items-center rounded-full cursor-pointer" htmlFor="checkbox">
                            <input type="checkbox"
                                class="before:content[''] peer relative w-7 h-7 cursor-pointer appearance-none rounded-lg border-2 border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-[#5038ED] checked:bg-[#5038ED] checked:before:bg-gray-900 hover:before:opacity-10"
                                id="checkbox" />
                            <span
                                class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor" stroke="currentColor" stroke-width="1">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </label>
                    </div>
                </div>

                {{-- todo button component --}}
                <button id="tambah-balasan" class="text-[14px] py-2 gradient-1 px-4 rounded-[7px] text-white">
                    Balas Semua
                </button>
            </div>

            {{-- todo trash icon button komponent --}}
            <div class="_delete-icon-button relative"></div>
            <a class="_button">
                <a href=""
                    class="w-9 h-9 py-2 px-4 rounded-[7px] flex hover:bg-[#EF4444] hover:text-white justify-center items-center bg-[#FEF2F2] text-[#EF4444] text-[20px]"><i
                        class="mt-1 fi fi-rr-trash"></i></a>
            </a>
        </div>
    </div>

    {{-- todo container utama list data card --}}
    <div class="w-full overflow-y-auto p-2">

        {{-- todo wrapper card list feedback --}}
        <div class="_wrapper-card-list-feedback h-full w-full grid grid-cols-2 gap-2">

            {{-- todo list card feedback --}}
            @foreach ($feedback as $item)
                <div
                    class="_card-list-feedback p-[10px] w-full flex flex-col gap-4 justify-between shadow-box-shadow-8 bg-white rounded-[20px]">

                    {{-- todo header card --}}
                    <div class="_header flex justify-between items-center">
                        <div class="_checkbox-rate flex items-center gap-2">
                            <div class="_checkbox">
                                <div class="inline-flex items-center">
                                    <label class="relative flex items-center rounded-full cursor-pointer"
                                        htmlFor="checkbox">
                                        <input type="checkbox"
                                            class="before:content[''] peer relative w-5 h-5 cursor-pointer appearance-none rounded-md border-2 border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-[#5038ED] checked:bg-[#5038ED] checked:before:bg-gray-900 hover:before:opacity-10"
                                            id="checkbox" />
                                        <span
                                            class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                viewBox="0 0 20 20" fill="currentColor" stroke="currentColor"
                                                stroke-width="1">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="_rate bg-yellow-100 flex items-center gap-1 px-2 py-1 rounded-[10px]">
                                <div class="_icon mt-1"><i class="text-yellow-500 fi fi-rr-star"></i></div>
                                <div class="_text text-yellow-500 text-[14px]">{{ $item->kriteria }}</div>
                            </div>
                        </div>
                        <div class="_date flex items-center gap-2">
                            <i class="mt-1 fi fi-rr-clock-three"></i>
                            <p class="text-[14px] text-gray-500">{{ Carbon\Carbon::parse($item->created_at)->format('j M Y') }}</p>
                        </div>
                    </div>

                    {{-- todo body card --}}
                    <div class="_body">
                        {{ $item->deskripsi }}
                    </div>
                    <hr>

                    {{-- todo footer card --}}
                    <div class="_footer flex justify-between items-center">
                        <div class="_profile flex items-center gap-2">
                            <div class="_foto w-[40px] h-[40px] rounded-full overflow-hidden"><img
                                    class="object-cover w-full" src="{{ asset('assets/image/customers/profile/' . $item->foto) }}"
                                    alt=""></div>
                            <div class="_name-alamat">
                                <p class="text-[14px] font-bold">{{ $item->name }}</p>
                                <p class="text-[12px] text-gray-500 font-medium">Customer</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="w-full h-[10px]"></div>
        </div>
    </div>

    {{-- todo penomoran pagination --}}
    {{ $feedback->onEachSide(1)->links('components.paginate.custom-pagination') }}
</div>
