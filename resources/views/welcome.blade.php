<x-guest-layout>
    <div class="h-[calc(100vh-80px)] !bg-gradient-to-b from-watercouse-100 to-watercouse-50 rounded-b-3xl">
        <div class="grid grid-cols-2 max-w-6xl mx-auto h-full ">
            {{-- <div class="flex flex-col items-center justify-center gap-2 px-5">
                <p class="text-center text-xl font-semibold">Anda mengetahui dugaan Korupsi, Penyalahgunaan Wewenang,
                    Pelanggaran Kode
                    Etik/Disiplin, Perbuatan Asusila dan Pelanggaran Hukum Lainnya oleh ASN ?</p>
                <p class="text-center font-medium text-xl bg-watercouse-700 text-white rounded-lg px-3 py-2">Laporkan
                    pada
                    Kami !!</p>
                <p class="text-center font-semibold text-watercouse-700">Mari wujudkan Kabupaten Paser
                </p>
                <p class="text-white bg-watercouse-700 rounded-lg px-2 py-1">
                    Bersih dari Korupsi, Berintegritas dan Patuh dengan Hukum
                </p>
                <a href=""
                    class="!mt-10 border-2 border-watercouse-700 rounded-lg text-watercouse-700 font-medium px-5 py-1 text-3xl hover:bg-watercouse-700 hover:text-white transition-all duration-500">Lapor
                    Sekarang!</a>
            </div> --}}
            {{-- <div class="flex flex-col justify-center gap-2 px-5">
                <p class="text-3xl font-semibold">Apakah Anda mengetahu pelanggaran ASN seperti korupsi, penyalahgunaan
                    wewenang, atau lainnya?
                </p>
                <p class="text-watercouse-700 text-sm font-light">Mari wujudkan Kabupaten Paser
                    <span class="font-extrabold py-1">
                        Bersih dari Korupsi, Berintegritas dan Patuh dengan Hukum
                    </span>
                </p>
                <a href="{{ route('laporan.create') }}"
                    class="!mt-5 border-2 border-watercouse-700 rounded-lg text-watercouse-700 font-semibold px-5 py-1 text-xl hover:bg-watercouse-700 hover:text-white transition-all duration-500 w-min whitespace-nowrap">Lapor
                    Sekarang!</a>
            </div> --}}
            <div class="flex flex-col justify-center gap-2 px-5">
                <p class="text-3xl font-semibold">Laporkan dugaan korupsi, penyalahgunaan wewenang, pelanggaran kode
                    etik/disiplin, asusila, atau pelanggaran hukum lainnya oleh ASN!
                </p>
                <p class="text-watercouse-700 text-sm font-light">Mari wujudkan Kabupaten Paser
                    <span class="font-extrabold py-1">
                        Bersih dari Korupsi, Berintegritas dan Patuh dengan Hukum
                    </span>
                </p>
                <a href="{{ route('laporan.create') }}"
                    class="!mt-5 border-2 border-watercouse-700 rounded-lg text-watercouse-700 font-semibold px-5 py-1 text-xl hover:bg-watercouse-700 hover:text-white transition-all duration-500 w-min whitespace-nowrap">Lapor
                    Sekarang!</a>
            </div>
            <div class="flex items-center justify-center">
                <img src="{{ asset('assets/images/hero-bg.png') }}" alt="">
            </div>
        </div>
    </div>
    <div class="  bg-gradient-to-b from-watercouse-50 to-white mt-10 p-5">
        <div class="flex flex-col items-center justify-center max-w-6xl mx-auto pb-10">
            <dotlottie-wc src="https://lottie.host/4a028cea-11e9-49f3-aa97-f11ea2fab444/3TqaqxNJbX.lottie" autoplay
                speed="0.5" loop></dotlottie-wc>
            <p class="text-center text-2xl font-semibold border-b pb-1">Perlindungan Bagi Pelapor</p>
            <p class="max-w-3xl text-center">Jika Anda memiliki informasi atau bukti terkait pelanggaran yang dilakukan
                oleh ASN, silakan laporkan kepada kami. Kami menjamin kerahasiaan identitas pelapor, selama pelapor
                tidak mengungkapkan laporan tersebut secara publik.</p>

        </div>
    </div>
    <div class="fixed bottom-5 right-5">
        <button id="scrollToTop"> <svg class="svgIcon" viewBox="0 0 384 512">
                <path
                    d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z">
                </path>
            </svg></button>
    </div>
</x-guest-layout>
<script>
    const scrollToTopButton = document.getElementById('scrollToTop');

    scrollToTopButton.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    window.addEventListener('scroll', function() {
        if (window.scrollY > 100) {
            scrollToTopButton.classList.add('show');
        } else {
            scrollToTopButton.classList.remove('show');
        }
    });
</script>
