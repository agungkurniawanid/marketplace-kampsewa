<div class="_wrapper-table w-full p-5 bg-white rounded-[20px]">
    <div class="_heading mb-4 text-[20px] font-medium capitalize">
        <h1>Daftar Pengguna Online</h1>
    </div>
    <!-- component -->
    <div class="overflow-x-auto rounded-lg h-[500px] overflow-y-auto">
        @if (count($customer_online) == 0)
            <div class="w-full h-full flex justify-center items-center">Tidak ada data</div>
        @else
            <table class="w-full border-collapse table-auto bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">No</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nama</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Role</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Waktu Aktif</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    @foreach ($customer_online as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                <div class="relative h-10 w-10">
                                    <img class="h-full w-full rounded-full object-cover object-center"
                                        src="{{ asset('assets/image/customers/profile/' . $item->foto) }}"
                                        alt="" />
                                    <span
                                        class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                                </div>
                                <div class="text-sm">
                                    <div class="font-medium text-gray-700">{{ $item->name }}</div>
                                    <div class="text-gray-400">{{ $item->email }}</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                    <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4">Customer</td>
                            <td class="px-6 py-4">
                                {{ $item->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
