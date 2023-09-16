<div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="" data-active="true" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#datatables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-layers">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                            <polyline points="2 17 12 22 22 17"></polyline>
                            <polyline points="2 12 12 17 22 12"></polyline>
                        </svg>
                        <span>Master Data</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="datatables" data-parent="#accordionExample">
                    <li>
                        <a href="{{  route('booking.index')  }}"> Booking</a>
                    </li>
                </ul>
                <ul class="collapse submenu list-unstyled" id="datatables" data-parent="#accordionExample">
                    <li>
                        <a href="{{  route('desa.index')  }}"> Desa</a>
                    </li>
                </ul>
                <ul class="collapse submenu list-unstyled" id="datatables" data-parent="#accordionExample">
                    <li>
                        <a href="#pages-error-tahunan" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">
                            Tahunan<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                        <ul class="collapse list-unstyled sub-submenu" id="pages-error-tahunan"
                            data-parent="#datatables">
                            <li>
                                <a href="{{ route('desaintapak.index') }}"> Desain Tapak Pemanfaatan Jasa Lingkkungan
                                    Wisata ALam </a>
                            </li>
                            <li>
                                <a href="{{  route('kemitraankonservasi.index')  }}"> Kemitraan Konservasi</a>
                            </li>
                            <li>
                                <a href="{{  route('perencanaanpemulihan.index')  }}"> Perencanaan Pemulihan</a>
                            </li>
                            <li>
                                <a href="{{  route('rencanarealisasi.index')  }}">Rencana dan Realisasi </a>
                            </li>
                            <li>
                                <a href="{{  route('daerahpenyangga.index')  }}">Daerah Penyangga </a>
                            </li>
                            <li>
                                <a href="{{  route('desabinaans.index')  }}">Desa Binaan </a>
                            </li>
                            <li>
                                <a href="{{  route('zonablok.index')  }}">Zona dan Blok Tradisional</a>
                            </li>
                            <li>
                                <a href="{{  route('pemanfaatanzona.index')  }}">Pemanfaatan Zona dan Blok Tradisional
                                    Kawasan Konservasi</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#pages-error-kawasan" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">
                            Semester<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                        <ul class="collapse list-unstyled sub-submenu" id="pages-error-kawasan"
                            data-parent="#datatables">
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Perencanaan
                                    Pengelolahaan Kawasan Konservasi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Kawasan Konservasi
                                    yang Mendapat Penetapan Status Internasional sebagai Cagar Biosfer
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Penataan Batas
                                    Kawasan Konservasi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Rekontruksi Batas
                                    Kawasan Konservasi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Sarana Pengamatan
                                    Hutan
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Pemeliharaan Batas
                                    Kawasan Konservasi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Peralatan Tangan
                                    Pengendalihan Kebakaran Hutan
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Peralatan
                                    Transportasi Pengenalan Kebakaran Hutan
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Peralatan Mesin
                                    Pompa dan Kelengkapannya untuk Kebutuhan Pengendalian Kebakaran Hutan
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Penanganan Jenis
                                    Asing Invasif (IAS) di Kawasan Konservasi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Hasil Evaluasi
                                    Kesusaian Fungsi Kawasan Konservasi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Perubahan Fungsi
                                    dan Perubahan Kawasan Knservasi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Ekosistem Kawasan
                                    Konservasi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Penataan Kawasan
                                    Konservasi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}"> Penetapan Kesatuan
                                    Pengelolaan Hutan Konservasi (KPHK) Taman Nasional dan Non Taman Nasional
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}"> Kerjasama
                                    Penyelenggaraan KSA dan KPA
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}"> Promosi dan
                                    Publikasi Jasa Lingkungan Kawasan Konservasi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}"> Sebaran PNS/CPNS
                                    Menurut Tingkat Pendidikan dan Jenis Kelamin
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}"> Sebaran PNS/CPNS
                                    Menurut Golongan dan Jenis Kelamin
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Sebaran Pejabat
                                    Fungsional Tertentu Menurut Fungsi dan Jenjang Jabatan
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Sebaran Pejabat
                                    Fungsional Tertentu Menurut Fungsi dan Jenis Kelamin
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Sebaran PNS/CPNS
                                    Menurut Jabatan dan Jenis Kelamin
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}"> Sebaran Pejabat
                                    Fungsional Tertentu Menurut Fungsi, Tingkat Pendidikan dan Jenis Kelamin
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Sebaran Pegawai
                                    Tidak Tetap Menurut Tingkat Pendidikan dan Jenis Kelamin
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Rincian Barang
                                    Milik Negara (Gabungan Intrakomptabel dan Ekstrakomptabel)
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kawasankonser.index') }}">Kerjasama Teknis Bidang KSDAE
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#pages-error-pembinaan" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">
                            Triwulan<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                        <ul class="collapse list-unstyled sub-submenu" id="pages-error-pembinaan"
                            data-parent="#datatables">
                            <li>
                            <li>
                                <a href="{{ route('pembinaanusaha.index') }}">Pembinaan Usaha Ekonomi Produktif pada
                                    Daerah Penyangga Kawasan Konservasi</a>
                            </li>
                            <li>
                                <a href="{{ route('permasalahankawasan.index') }}">Permasalahan Kawasan Konservasi</a>
                            </li>
                            <li>
                                <a href="{{ route('penanganan_perkara.index') }}">Penanganan Perkara Tindak Pidana</a>
                            </li>
                            <li>
                                <a href="{{ route('tenaga_pengamanan_hutan.index') }}">Tenaga Pengamanan Hutan pada
                                    Kawasan Konservasi</a>
                            </li>
                            <li>
                                <a href="{{  route('tenagapengamansatker.index')  }}">Tenaga Pengamanan Hutan Per Satuan
                                    Kerja</a>
                            </li>
                            <li>
                                <a href="{{  route('tenagakarhut.index')  }}">Tenaga Pengendalian Kebakaran Hutan</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        </li>
        <!-- ... opsi lainnya ... -->
        </ul>
    </nav>
</div>