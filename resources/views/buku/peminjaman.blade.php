@extends('layouts.perpus')

@section('content')
    <div class="py-12">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mb-4 d-flex justify-content-between">
                        <a class="btn btn-primary" href="{{route('peminjaman.tambah')}}">Tambah Data Peminjaman</a>
                        <a href="{{ route('print') }}" class="btn btn-primary">
            <i class="fa fa-download"></i>Ekspor PDF</a>
                        </a>
                    </div>

                    <table class="table-auto w-full border-collapse border border-gray-400">
                        
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="px-4 py-2 border">Nama Peminjam</th>
                                <th class="px-4 py-2 border">Buku yang Dipinjam</th>
                                <th class="px-4 py-2 border">Tanggal Peminjaman</th>
                                <th class="px-4 py-2 border">Tanggal Pengembalian</th>
                                <th class="px-4 py-2 border">Status</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($peminjaman as $p)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $p->user->name }}</td>
                                    <td class="px-4 py-2 border">{{ $p->buku->judul }}</td>
                                    <td class="px-4 py-2 border">{{ $p->tanggal_peminjaman }}</td>
                                    <td class="px-4 py-2 border">{{ $p->tanggal_pengembalian }}</td>
                                    <td class="px-4 py-2 border">{{ $p->status }}</td>
                                    <td class="px-4 py-2 border">
                                        @if($p->status === 'Dipinjam')
                                            <form action="{{ route('peminjaman.kembalikan', $p->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black border font-bold py-2 px-4 rounded">
                                                    Kembalikan
                                                </button>
                                            </form>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-2 border text-center">Tidak ada data buku.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection