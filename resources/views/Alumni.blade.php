<x-layout>
    <h3 class="text-xl">
        <x-slot:title>{{ $title }}</x-slot:title>

    </h3>
    <x-modals></x-modals>
    <button type="button" class="btn-grad" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambahkan Data
    </button>
    <table id="example" class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Tahun</th>
                <th scope="col">Jurusan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumni as $a)
                <tr>
                    <th scope="row">3</th>
                    <td>{{ $a->Nama }}</td>
                    <td>{{ $a->angkatans->Tahun }}</td>
                    <td>{{ $a->jurusans->Jurusan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
