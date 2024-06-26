<div id="balas-feedback" class="hidden">
    <div
        class="_container w-full h-full flex justify-center items-center z-20 fixed top-0 left-0 bg-white/0 backdrop-blur-sm">
        <div
            class="_card w-[500px] flex flex-col h-[500px] overflow-clip bg-white p-[20px] rounded-[20px] shadow-box-shadow-11">
            <div class="_header w-full">
                <div class="_title flex items-center gap-2">
                    <div class="w-[35px] h-[35px] rounded-full flex justify-center items-center text-white gradient-1"><i
                            class="bi bi-currency-bitcoin"></i></div>
                    <span class="text-[16px] font-bold">Balas Semua Feedback</span>
                </div>
                <div class="_close"></div>
            </div>
            <div class="_body w-full mt-4 flex-grow p-2 overflow-y-auto">
                <form method="POST" id="form-balas-feedback" action="{{ route('notification.balas-semua-feedback') }}" class="w-full flex flex-col gap-2">
                    @csrf
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Balasan
                        Anda!</label>
                    <textarea name="balasan" id="message" rows="8"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Ketik balasan anda disini!">Terima kasih atas feedback Anda! Kami sangat menghargai masukan yang Anda berikan. Kami akan segera mempertimbangkan masukan Anda untuk meningkatkan pengalaman pengguna kami. Jangan ragu untuk mengirimkan feedback lebih lanjut jika Anda memiliki saran atau pertanyaan lainnya.</textarea>
                </form>
            </div>
            <hr>
            <div class="_footer w-full p-2 flex gap-2">
                <button id="simpan-balas-feedback"
                    class="gradient-1 text-white text-[14px] py-2 px-4 rounded-full">Simpan</button>
                <button class="text-[14px] shadow-box-shadow-8 py-2 px-4 rounded-full"
                    id="cancel-balas-feedback">Cancel</button>
            </div>
        </div>
    </div>
</div>
