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
                <th scope="col">Tahun</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Prestasi</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumni as $a)
                <tr>
                    <th scope="row">3</th>
                    <td>{{ $a->Nama }}</td>
                    <td>{{ $a->angkatan }}</td>
                    <td>{{ $a->jurusan }}</td>
                    <td>
                        @if ($a->prestasi->count() >= 1)
                            <a href="{{ route('Prestasi.show', $a->id) }}">lihat prestasi</a>
                        @else
                            <button type="button" class="badgeTambah-grad" data-bs-toggle="modal"
                                data-bs-target="#modalTambahPrestasi" data-id="{{ $a->id }}"
                                data-nama="{{ $a->Nama }}" data-jurusan="{{ $a->jurusan }}"
                                data-angkatan="{{ $a->angkatan }}">
                                tambah
                            </button>
                        @endif
                    </td>
                    <td>
                        <!-- Tombol Edit -->
                        <button type="button" class="badgeEdit-grad" data-bs-toggle="modal"
                            data-bs-target="#exampleModalEdit" data-id="{{ $a->id }}"
                            data-nama="{{ $a->Nama }}" data-jurusan="{{ $a->jurusan }}"
                            data-angkatan="{{ $a->angkatan }}">
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
