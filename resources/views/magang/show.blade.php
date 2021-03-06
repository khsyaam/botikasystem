@extends('users.master')
@section('title', 'Magang - Dashboard Management')

@section('content')
<!-- Header -->
<div class="header bg-default pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/magang">Magang</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Delete</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Content -->
<div class="container-fluid mt--6">
    @include('layouts.message')
    <div class="row">
        <div class="col-xl-4 order-xl-2">
            <div class="card card-profile">
                <div class="row justify-content-center pt-7">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="{{asset('storage/cover_images/'.$magang->cover_image)}}"
                                    class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-7">
                    <div class="text-center">
                        <h5 class="h3">{{ $magang->name }}<span class="font-weight-light"></span>
                        </h5>
                        <div>
                            <i class="ni business_briefcase-24 mr-2"></i>{{ $magang->created_at }}
                        </div>
                        <div>
                            <i class="ni business_briefcase-24 mr-2"></i>{{ $magang->updated_at }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Delete {{ $magang->name }}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="name">Fullname</label>
                            <input required type="text" class="form-control" id="name" name="name"
                                value="{{ $magang->name }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nim">NIM</label>
                            <input required type="text" class="form-control" id="nim" name="nim"
                                placeholder="Nomor Induk" value="{{ $magang->nim }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="role">Role</label>
                            <input required type="text" class="form-control" id="role" name="role"
                                value="{{ $magang->role }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="division">Division</label>
                            <input required type="text" class="form-control" id="division" name="division"
                                value="{{ $magang->division }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="start">Mulai Magang</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input name="start" id="start" class="date form-control datepicker" placeholder="Select date" type="text" value="{{ $magang->start }}">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="finish">Selesai Magang</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input name="finish" id="finish" class="date form-control datepicker" placeholder="Select date" type="text" value="{{ $magang->finish }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telephone">Telephone</label>
                            <input name="telephone" required type="number" class="form-control" id="telephone"
                                value="{{ $magang->telephone}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <input name="status" required type="text" class="form-control" id="status"
                                value="{{ $magang->status }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input required type="text" class="form-control" id="address" placeholder="Alamat"
                            name="address" value="{{ $magang->address }}">
                    </div>
                    <form class="" action="{{ route('magang.delete',$magang->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @endsection
    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="{{ route('magang.delete',$args->id) }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $magang->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <h5>Nama Divisi: {{ $magang->name }}</h5>
                        <h5>Kepala Divisi: {{ $magang->headof }}</h5>
                        <h5>Status Divisi: {{ $magang->status }}</h5>
                        <h5>Last Updated: {{ $magang->updated_at }}</h5><br>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form class="" action="{{ route('magang.edit',$magang->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
