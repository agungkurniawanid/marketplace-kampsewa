{{-- todo container card --}}
<div class="_card-expenses relative bg-white rounded-[20px] w-full">
    <div class="_wrapper-content-card h-full grid bg-white rounded-[20px] grid-cols-1 p-[1rem] justify-between w-full">

        {{-- todo bagian title card --}}
        <div class="w-full flex justify-between items-center">
            <div class="w-auto">
                <p class="text-[#343B7C] text-[16px]">Pengeluaran</p>
                <div class="flex gap-[10px] items-center">
                    <h1 class="text-[#343B7C] text-[24px]">Rp. 53.000.000</h1>
                    <div class="p-[5px] bg-[#D6FFF3] rounded-full">
                        <p class="font-medium text-[#1ED0A6] text-[12px]">-43%</p>
                    </div>
                </div>
            </div>
            <div
                class="_icon-more flex justify-center items-center cursor-pointer w-[35px] h-[35px] bg-[#F2F5FD] hover:bg-[#CFDCFF] rounded-full">
                <i class="text-[14px] mt-[5px] fi fi-br-arrow-up-right"></i>
            </div>
        </div>

        {{-- todo bagian statistic card --}}
        <div class="_static">
            <p class="text-[12px] mb-[10px] text-[#343B7C]">Maximal <strong>Rp. 100.000.000</strong></p>
            <div class="w-full h-[40px] bg-[#F2F5FD] rounded-[10px]">
                <div class="w-[70%] bg-corak-2 flex justify-center items-center rounded-[10px] h-full">
                    <p class="text-white font-medium text-[16px]">57%</p>
                </div>
            </div>
        </div>
    </div>
</div>
