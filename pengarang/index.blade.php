@extends('adminlte::page')
@section('tittle', 'Data Pengarang')
@section('content_header')
<h1><i class="fa fa-user"> Data Pengarang</i></h1>
@stop

@section('content') {{-- isi konten data Pengarang --}}
@if(session('success'))
<div class="alert alert-info">
    {{ session('success') }}
</div>
@endif

@php
$ar_judul = ['No','Nama','Email','HP', 'Foto','Action'];
$no = 1;
@endphp
<a href="{{ route('pengarang.create') }}" class="btn btn-primary btn-md" role="button"><i class="fa fa-plus"> Tambah pengarang</i></a>
<br/><br/>
<table class="table table-striped">
    <thead>
        <tr>
        @foreach($ar_judul as $jdl)
            <th>{{ $jdl }}</th>
            @endforeach
        </tr>
    </thead>
<tbody>
    @foreach($ar_pengarang as $p)
    <tr>
        <td>{{ $no++ }}</td>    
        <td>{{ $p->nama }}</td>    
        <td>{{ $p->email }}</td>  
        <td>{{ $p->hp }}</td>    
        <td>{{ $p->foto }}</td>  
       
        
        <td>
            <form action="{{ route('pengarang.destroy',$p->id) }}" method="POST">
                @csrf
                @method('delete')
                <a class="btn btn-info"
                href="{{ route('pengarang.show',$p->id) }}"><i class="fa fa-eye"></i> Detail</a>
                <a  class="btn btn-success" 
                href="{{ route('pengarang.edit',$p->id) }}"><i class="fa fa-edit"></i> Edit</a>
               <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data Dihapus')"><i class="fa fa-trash"></i> Hapus</button>

            </form>
        </td>
       
    </tr>
    @endforeach
</tbody>
</table>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi!'); </script>
@stop