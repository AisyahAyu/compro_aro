@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-bold" style="color: #343a40;">Benefit List</h5>
                    <a href="{{ route('admin.benefits.create') }}" class="btn btn-success btn-sm px-3">
                        <i class="fas fa-plus mr-1"></i> Add New
                    </a>
                </div>
            </div>
            
            <div class="card-body p-0">
                <table id="benefitTable" class="table table-hover mb-0" style="width:100%; table-layout: fixed;">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center" style="width: 80px;">Order</th>
                            <th class="text-center" style="width: 100px;">Icon</th>
                            <th style="width: auto;">Benefit Title</th> 
                            <th class="text-center" style="width: 120px;">Status</th>
                            <th class="text-center" style="width: 220px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($benefits as $b)
                        <tr>
                            <td class="text-center align-middle text-muted">{{ $b->order }}</td>
                            <td class="text-center align-middle">
                                @if($b->icon)
                                    <img src="{{ asset('storage/'.$b->icon) }}" class="img-thumbnail" style="width: 42px; height: 42px; object-fit: cover; border-radius: 4px;">
                                @else
                                    <i class="fas fa-image text-muted fa-lg"></i>
                                @endif
                            </td>
                            <td class="align-middle">
                                <div class="text-bold" style="font-size: 1rem;">{{ $b->title }}</div>
                                <div class="text-muted small">{{ Str::limit($b->description, 60) }}</div>
                            </td>
                            <td class="text-center align-middle">
                                <span class="badge {{ $b->status == 'active' ? 'badge-success' : 'badge-secondary' }}" style="padding: 6px 10px; border-radius: 4px; text-transform: uppercase; font-size: 10px;">
                                    {{ $b->status }}
                                </span>
                            </td>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center" style="gap: 5px;">
                                    <a href="{{ route('admin.benefits.edit', $b->id) }}" 
                                       class="btn btn-warning btn-sm border-0 rounded-0" 
                                       style="background-color: #ffc107; font-weight: 600; width: 90px; height: 35px; display: inline-flex; align-items: center; justify-content: center; gap: 6px;">
                                         <i class="fas fa-edit" style="font-size: 13px;"></i> Edit
                                    </a>
                                    
                                    <button type="button" 
                                            class="btn btn-danger btn-sm border-0 rounded-0" 
                                            data-toggle="modal" 
                                            data-target="#deleteModal{{ $b->id }}"
                                            style="background-color: #dc3545; font-weight: 600; width: 90px; height: 35px;">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </div>

                                <div class="modal fade" id="deleteModal{{ $b->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content" style="border-radius: 8px; border: none;">
                                            <div class="modal-body text-center p-4">
                                                <i class="fas fa-exclamation-circle text-danger mb-3" style="font-size: 3.5rem;"></i>
                                                <h4 class="text-bold">Delete Benefit?</h4>
                                                <p class="text-muted">Are you sure you want to delete <strong>{{ $b->title }}</strong>? This action cannot be undone.</p>
                                                
                                                <div class="d-flex justify-content-center mt-4" style="gap: 10px;">
                                                    <button type="button" class="btn btn-light px-4" data-dismiss="modal" style="font-weight: 600;">Cancel</button>
                                                    
                                                    <form action="{{ route('admin.benefits.destroy', $b->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger px-4" style="font-weight: 600; background-color: #dc3545;">Yes, Delete It</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection