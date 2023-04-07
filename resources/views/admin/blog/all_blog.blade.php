@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Blog Listesi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Blog İşlemleri </a></li>
                                <li class="breadcrumb-item active">Blog Listesi</li>
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
                                            <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>Başlık</th>
                                                    <th>Yazar</th>
                                                    <th>Yayın Tarihi</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>

                                                @php($i = 1)

                                                @foreach ($blogs as $item)
                                                    <tr class="odd">
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $item->title }}</td>
                                                        <td>{{ $item->user->name }} {{ $item->user->surname }}</td>
                                                        <td>{{ $item->date }}</td>
                                                        <td>
                                                            @if ($item->status == 1)
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Aktif
                                                                </div>
                                                            @else
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-danger align-middle me-2"></i>Aktif
                                                                    Değil
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.edit.blog', $item->id) }}">
                                                                <button class="btn btn-primary btn-sm">
                                                                    <i class="far fa-edit"></i>
                                                                </button>
                                                            </a>

                                                            <a href="{{ route('admin.delete.blog', $item->id) }}" id="delete">
                                                                <button class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </a>
 
                                                            @if ($item->status == 1)
                                                                <a href="{{ route('admin.blog.inactive', $item->id) }}"
                                                                    class="btn btn-danger btn-sm"><i
                                                                        class="fa fa-arrow-down"
                                                                        title="Inactive Now"></i></a>
                                                            @else
                                                                <a href="{{ route('admin.blog.active', $item->id) }}"
                                                                    class="btn btn-success btn-sm"><i class="fa fa-arrow-up"
                                                                        title="Active Now"></i></a>
                                                            @endif
                                                           

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
