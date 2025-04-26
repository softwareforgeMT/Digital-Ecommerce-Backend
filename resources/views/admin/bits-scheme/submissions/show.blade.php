@extends('admin.layouts.master')

@section('title')
    Review Submission
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Review Submission</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.bit-submissions.index') }}">Bit Submissions</a></li>
                        <li class="breadcrumb-item active">Review</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Submission Details</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <h5>Submission Information</h5>
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row" width="30%">Submission ID</th>
                                            <td>{{ $data->id }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Submitted On</th>
                                            <td>{{ $data->created_at->format('M d, Y h:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Status</th>
                                            <td>
                                                @if($data->status == 'approved')
                                                    <span class="badge badge-soft-success">Approved</span>
                                                @elseif($data->status == 'rejected')
                                                    <span class="badge badge-soft-danger">Rejected</span>
                                                @else
                                                    <span class="badge badge-soft-warning">Pending</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @if($data->status != 'pending')
                                        <tr>
                                            <th scope="row">Reviewed On</th>
                                            <td>{{ $data->approved_at ? $data->approved_at->format('M d, Y h:i A') : 'N/A' }}</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h5>User Information</h5>
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row" width="30%">User ID</th>
                                            <td>{{ $data->user->id }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Name</th>
                                            <td>{{ $data->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>{{ $data->user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Bit Balance</th>
                                            <td>{{ $data->user->bit_balance }} bits</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h5>Task Information</h5>
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row" width="20%">Task ID</th>
                                        <td>{{ $data->task->id }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Title</th>
                                        <td>{{ $data->task->title }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bit Value</th>
                                        <td>{{ $data->task->bit_value }} bits</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h5>Submission Content</h5>
                        <div class="border rounded p-3 bg-light">
                            {!! nl2br(e($data->submission_content)) !!}
                        </div>
                    </div>
                    
                    @if($data->proof)
                    <div class="mb-4">
                        <h5>Proof Submission</h5>
                        <div class="border rounded p-3">
                            @php
                                $extension = pathinfo($data->proof, PATHINFO_EXTENSION);
                                $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                                $isPdf = strtolower($extension) == 'pdf';
                            @endphp
                            
                            @if($isImage)
                                <img src="{{ $data->proof_url }}" alt="Proof" class="img-fluid rounded" style="max-height: 300px;">
                            @elseif($isPdf)
                                <a href="{{ $data->proof_url }}" target="_blank" class="btn btn-outline-primary">
                                    <i class="ri-file-pdf-line me-1"></i> View PDF
                                </a>
                            @else
                                <a href="{{ $data->proof_url }}" target="_blank" class="btn btn-outline-primary">
                                    <i class="ri-file-line me-1"></i> View File
                                </a>
                            @endif
                        </div>
                    </div>
                    @endif
                    
                    @if($data->status != 'pending')
                    <div class="mb-4">
                        <h5>Admin Notes</h5>
                        <div class="border rounded p-3 bg-light">
                            {{ $data->admin_notes ?: 'No notes provided' }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            @if($data->status == 'pending')
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Review Action</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.bit-submissions.review', $data->id) }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Decision <span class="text-danger">*</span></label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="status" id="approve" value="approved" checked>
                                <label class="form-check-label" for="approve">
                                    <span class="text-success">Approve</span> - Award {{ $data->task->bit_value }} bits to user
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="reject" value="rejected">
                                <label class="form-check-label" for="reject">
                                    <span class="text-danger">Reject</span> - No bits will be awarded
                                </label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="admin_notes" class="form-label">Admin Notes</label>
                            <textarea id="admin_notes" name="admin_notes" class="form-control" rows="4" 
                                      placeholder="Optional notes about your decision"></textarea>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.bit-submissions.index') }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Task Description</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        {!! $data->task->description !!}
                    </div>
                    
                    <div class="mb-0 mt-4">
                        <h6>Requirements</h6>
                        @if($data->task->required_proof)
                            <div class="alert alert-info mb-0">
                                <i class="ri-information-line me-2"></i> {{ $data->task->required_proof }}
                            </div>
                        @else
                            <div class="alert alert-light mb-0">
                                No specific proof requirements
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
