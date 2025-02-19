<footer
    class="bg-gradient-to-r from-primary-500 to-primary-300 py-8  text-white p-5 md:rounded-2xl mx-0 md:mx-8 mb-0 md:mb-5">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Logo and Information -->
        <div>
            <div class="flex items-start gap-4">
                <img src="{{ asset('image/logo.jpg') }}" alt="Logo Desa" class="w-16 h-16">
                <div>
                    <h2 class="text-xl font-bold">Dusun Kretek 1</h2>
                    <p class="text-sm">Kecamatan Borobudur</p>
                    <p class="text-sm">Kabupaten Magelang</p>
                    <p class="text-sm">Provinsi Jawa Tengah</p>
                </div>
            </div>
        </div>

        <!-- Kontak Desa -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Kontak Desa</h3>
            <div class="space-y-3">
                <div class="flex items-center gap-2">

                    <span>082150208664</span>
                </div>
                <div class="flex items-center gap-2">

                    <span>kersik.marangkayu@kutarkab.go.id</span>
                </div>
                <div class="flex items-center gap-2">

                    <span>Senin - Kamis (08.00 - 15.00) & Jum'at (08.00 - 11.00)</span>
                </div>
                <div class="flex items-center gap-2">

                    <span>Jalan Langaseng Dusun Empang RT.003</span>
                </div>
            </div>
        </div>

        <!-- Nomor Telepon Penting -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Nomor Telepon Penting</h3>
            <div class="space-y-3">
                <div>
                    <span class="block">Mufid/Kadus Kretek</span>
                    <span class="block">+6285647638871</span>
                </div>
                <div>
                    <span class="block">Catur/Ambulan Karangrejo</span>
                    <span class="block">+6281392705553</span>
                </div>
            </div>
        </div>

        <!-- Jelajahi -->

        <div class="w-full  h-[300px] rounded-lg shadow-md overflow-hidden">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3212.8895591588016!2d110.18857105353945!3d-7.610484934264316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8ce2c454f2d5%3A0xd4525ff02cc80fb0!2sKretek%201%2C%20Karangrejo%2C%20Borobudur%2C%20Magelang%20Regency%2C%20Central%20Java!5e1!3m2!1sen!2sid!4v1739733126396!5m2!1sen!2sid"
                width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </div>

    <!-- Footer Bottom -->
    <div class="text-center mt-8 pt-8 border-t border-white/10">
        © {{ now()->format('Y') }} Powered by KKN REG III.B.2 Universitas Ahmad Dahlan
    </div>
</footer>
