<div class="_component2 w-full overflow-clip overflow-y-auto bg-white rounded-[20px] h-full">
    {{-- todo container feedback sudah dibalas --}}
    <div class="_container w-full h-full p-[20px] overflow-y-auto flex flex-col gap-4 justify-between">
        <div class="_heading w-full">
            <div class="_title-filter w-full flex justify-between items-center">
                <div class="_title">
                    <h1 class="text-[20px] font-bold">Feedback Reply</h1>
                </div>
            </div>
            <div class="_checkall-delete flex items-center  gap-4 mt-8">
                <div class="_checkall">
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
                <div class="_delete">
                    <a href=""
                        class="text-[14px] py-2 hover:text-white text-[#EF4444] hover:bg-[#EF4444] bg-[#FEF2F2] px-4 rounded-[7px]">Hapus
                        Semua</a>
                </div>
            </div>
        </div>
        <div class="_body w-full overflow-y-auto h-full">
            <div class="_wrapper-card-list-feedback p-2 overflow-y-auto h-full w-full flex flex-col gap-2">
                {{-- todo card list feedback sudah dibalas --}}
                @foreach ($reply as $item)
                    <div
                        class="_card-list-feedback p-[10px] w-full flex flex-col gap-4 justify-between shadow-box-shadow-8 bg-white rounded-[20px]">
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
                                    <div class="_text text-yellow-500 text-[14px]">{{ $item->status }}</div>
                                </div>
                            </div>
                            <div class="_date flex items-center gap-2">
                                <i class="mt-1 fi fi-rr-clock-three"></i>
                                <p class="text-[14px] text-gray-500">
                                    {{ Carbon\Carbon::parse($item->created_at)->format('j M Y') }}</p>
                            </div>
                        </div>
                        <div class="_body">
                            {{ $item->deskripsi }}
                        </div>
                        <hr>
                        <div class="_footer flex justify-between items-center">
                            <div class="_profile flex items-center gap-2">
                                <div class="_foto w-[40px] h-[40px] rounded-full overflow-hidden"><img
                                        class="object-cover w-full"
                                        src="{{ asset('assets/image/customers/profile/' . $item->foto) }}"
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
        <div class="_footer w-full">
            {{-- todo penomoran pagination --}}
            {{ $reply->onEachSide(1)->links('components.paginate.custom-pagination') }}
        </div>
    </div>
</div>
