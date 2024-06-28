@extends('layouts.dashboard')

@section('title', 'Admin BPKM')

@push('addon-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

    <style>
        .notify {
            z-index: 99999;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid page-body-wrapper">
        <x-notify::notify style="z-index: 99999;" />

        @include('includes.sidebar-detail')

        <div class="main-panel">
            <div class="content-wrapper">

                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Document Types </h4>
                                <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                    data-target="#addDocumentTypeModal">Add Document Type</button>

                                <div class="table-responsive">
                                    <table id="documentTypesTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($documentTypes as $documentType)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $documentType->name }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#editDocumentTypeModal{{ $documentType->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#deleteDocumentTypeModal{{ $documentType->id }}">Delete</button>
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
            </div>

            @include('includes.footer')
        </div>
    </div>

    <!-- Add Document Type Modal -->
    <div class="modal fade" id="addDocumentTypeModal" tabindex="-1" role="dialog"
        aria-labelledby="addDocumentTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDocumentTypeModalLabel">Add Document Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addDocumentTypeForm" method="POST" action="{{ route('document-types.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="add_name">Name</label>
                            <input type="text" class="form-control" id="add_name" name="name" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="addDocumentTypeForm" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Document Type Modal -->
    @foreach ($documentTypes as $documentType)
        <div class="modal fade" id="editDocumentTypeModal{{ $documentType->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editDocumentTypeModalLabel{{ $documentType->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editDocumentTypeModalLabel{{ $documentType->id }}">Edit Document Type
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editDocumentTypeForm{{ $documentType->id }}" method="POST"
                            action="{{ route('document-types.update', $documentType->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="edit_name{{ $documentType->id }}">Name</label>
                                <input type="text" class="form-control" id="edit_name{{ $documentType->id }}"
                                    name="name" value="{{ $documentType->name }}" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" form="editDocumentTypeForm{{ $documentType->id }}"
                            class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Delete Document Type Modal -->
    @foreach ($documentTypes as $documentType)
        <div class="modal fade" id="deleteDocumentTypeModal{{ $documentType->id }}" tabindex="-1" role="dialog"
            aria-labelledby="deleteDocumentTypeModalLabel{{ $documentType->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteDocumentTypeModalLabel{{ $documentType->id }}">Delete Document
                            Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this document type?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form id="deleteDocumentTypeForm{{ $documentType->id }}" method="POST"
                            action="{{ route('document-types.destroy', $documentType->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" form="deleteDocumentTypeForm{{ $documentType->id }}"
                                class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('addon-script')
    <!-- Tambahkan link script DataTables di sini -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            $('#documentTypesTable').DataTable();

            // Fokus input saat modal tambah ditampilkan
            $('#addDocumentTypeModal').on('shown.bs.modal', function() {
                $('#add_name').focus();
            });

            // Reset form saat modal ditutup
            $('.modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });
        });
    </script>
@endpush
