<x-layout>
    <h3 class="text-xl">
        <x-slot:title>{{ $title }}</x-slot:title>

    </h3>
    <x-modals></x-modals>
    <x-filter :angkatan="$angkatan" :jurusan="$jurusan" />
    <button type="button" class="mb-3 btn-grad" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambahkan Data
    </button>
    <table id="example" class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Prestasi</th>
                <th scope="col">Tingkatan</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Prestasi</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prestasi as $a)
                <tr>
                    <th scope="row">3</th>
                    <td>{{ $a->alumni->Nama }}</td>
                    <td>{{ $a->prestasi }}</td>
                    <td>
                        @if ($a->grade == 1)
                            desa
                        @elseif($a->grade == 2)
                            kecamatan
                        @elseif($a->grade == 3)
                            Kota
                        @elseif($a->grade == 4)
                            Provinsi
                        @elseif($a->grade == 5)
                            Nasional
                        @elseif($a->grade == 6)
                            Internasional
                        @endif
                    </td>
                    <td>{{ $a->alumni?->angkatan ?? 'Tidak tersedia' }}</td>
                    <td>{{ $a->alumni?->jurusan ?? 'Tidak tersedia' }}</td>
                    <!-- Tombol Edit -->
                    <td>
                        <button type="button" class="badgeEdit-grad" data-bs-toggle="modal"
                            data-bs-target="#exampleModalEdit" data-id="{{ $a->id }}"
                            data-nama="{{ $a->alumni->nama }}" data-jurusan="{{ $a->alumni->jurusan }}"
                            data-angkatan="{{ $a->alumni->angkatan }}">
                            Edit
                        </button>
                        <!-- Tombol Hapus -->
                        <button type="button" class="badgeHapus-grad" id="hapus" data-bs-toggle="modal"
                            data-bs-target="#exampleModalDelete" data-id="{{ $a->id }}">
                            Hapus
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
