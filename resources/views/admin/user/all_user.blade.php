@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Kullanıcılar</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Kullanıcılar </a></li>
                                <li class="breadcrumb-item active">Kullanıcılar</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable"
                                            class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                            style="border-collapse: collapse; border-spacing: 0px; width: 100%;"
                                            role="grid" aria-describedby="datatable_info">
                                            <span>Toplam Kullanıcı Sayısı : {{ count($users) }} </span>
                                            <hr>
                                            <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>Ad Soyad</th>
                                                    <th>Kullanıcı Adı</th>
                                                    <th>Email</th>
                                                    <th>Kayıt Tarihi</th>
                                                    <th>Durum</th>
                                                    <th>İşlemler</th>
                                                </tr>
                                            </thead>


                                            <tbody>

                                                @php($i = 1)

                                                @foreach ($users as $user)
                                                    <tr class="odd">
                                                        <td>{{ $i++ }}</td>

                                                        <td>{{ $user->name }} {{ $user->surname }}</td>
                                                        <td>{{ $user->username }}</td>
                                                        <td>{{ $user->email }}</td>

                                                        <td>
                                                            {{ Carbon\Carbon::parse($user->created_at)->format('D, d F Y') }}
                                                        </td>

                                                        <td>
                                                            @if ($user->status == 1)
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Aktif
                                                                </div>
                                                            @else
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-danger align-middle me-2"></i>Aktif
                                                                    Değil
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if ($user->status == 1)
                                                                <a href="{{ route('user.inactive', $user->id) }}"
                                                                    class="btn btn-danger btn-sm"><i
                                                                        class="fa fa-arrow-down"
                                                                        title="Inactive Now"></i></a>
                                                            @else
                                                                <a href="{{ route('user.active', $user->id) }}"
                                                                    class="btn btn-success btn-sm"><i class="fa fa-arrow-up"
                                                                        title="Active Now"></i></a>
                                                            @endif

                                                            <a href="{{ route('delete.user', $user->id) }}" id="delete">
                                                                <button class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </a>


                                                        </td>

                                                    </tr>
                                                @endforeach





                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->








        </div> <!-- container-fluid -->
    </div>
@endsection
