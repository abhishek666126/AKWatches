@extends('backend.layout.main')
@section('title','dashboard')
@section('heading','Dashboard')
@section('main.content')

<!-- Dashboard Cards Row -->
<div class="row">
    <!-- Total Products Card -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4 mt-4">
        <div class="card shadow-sm border-0" style="background-color: #007bff; color: white; border-radius: 0.75rem;">
            <div class="card-body text-center py-3">
                <span style="font-size: 0.95rem; opacity: 0.9;">Total Products</span>
                <h4 style="font-size: 2rem; font-weight: 700; margin: 0.5rem 0;">12</h4>
            </div>
            <div class="d-flex justify-content-around pb-3">
                <a href="" class="text-white" title="Add New Blog">
                    <i class="ti-plus" style="font-size: 1.6rem;"></i>
                </a>
                <a href="" class="text-white" title="View Blog List">
                    <i class="ti-list" style="font-size: 1.6rem;"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Total Products Category Card -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4 mt-4">
        <div class="card shadow-sm border-0" style="background-color: #6c757d; color: white; border-radius: 0.75rem;">
            <div class="card-body text-center py-3">
                <span style="font-size: 0.95rem; opacity: 0.9;">Total Products Category</span>
                <h4 style="font-size: 2rem; font-weight: 700; margin: 0.5rem 0;">85</h4>
            </div>
            <div class="d-flex justify-content-around pb-3">
                <a href="" class="text-white" title="Add New Blog">
                    <i class="ti-plus" style="font-size: 1.6rem;"></i>
                </a>
                <a href="" class="text-white" title="View Blog List">
                    <i class="ti-list" style="font-size: 1.6rem;"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Total Tags Card -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4 mt-4">
        <div class="card shadow-sm border-0" style="background-color: #17a2b8; color: white; border-radius: 0.75rem;">
            <div class="card-body text-center py-3">
                <span style="font-size: 0.95rem; opacity: 0.9;">Total Tags</span>
                <h4 style="font-size: 2rem; font-weight: 700; margin: 0.5rem 0;">18</h4>
            </div>
            <div class="d-flex justify-content-around pb-3">
                <a href="" class="text-white" title="Add New Blog">
                    <i class="ti-plus" style="font-size: 1.6rem;"></i>
                </a>
                <a href="" class="text-white" title="View Blog List">
                    <i class="ti-list" style="font-size: 1.6rem;"></i>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
