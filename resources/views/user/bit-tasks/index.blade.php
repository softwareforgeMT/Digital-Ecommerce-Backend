@extends('front.layouts.app')

@section('meta_title', 'Bit Tasks')

@section('css')
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
    /* DataTable wrapper styling */
    .dataTables_wrapper {
        color: #374151;
    }
    .dark .dataTables_wrapper {
        color: #d1d5db;
    }

    /* Search and length controls */
    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter input {
        background-color: white;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        padding: 0.5rem;
        font-size: 0.875rem;
    }
    
    .dark .dataTables_wrapper .dataTables_length select,
    .dark .dataTables_wrapper .dataTables_filter input {
        background-color: #374151;
        border-color: #4b5563;
        color: #f9fafb;
    }

    /* Desktop table styling */
    .desktop-table #bitTasksTable thead th {
        background-color: #f9fafb;
        color: #374151;
        padding: 0.75rem 1rem;
        border-bottom: 1px solid #e5e7eb;
        font-size: 0.875rem;
    }
    
    .dark .desktop-table #bitTasksTable thead th {
        background-color: #374151;
        color: #d1d5db;
        border-bottom-color: #4b5563;
    }

    .desktop-table #bitTasksTable tbody tr {
        background-color: white;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .dark .desktop-table #bitTasksTable tbody tr {
        background-color: #1f2937;
        border-bottom-color: #4b5563;
    }

    .desktop-table #bitTasksTable tbody td {
        padding: 0.75rem 1rem;
        color: #374151;
        font-size: 0.875rem;
    }
    
    .dark .desktop-table #bitTasksTable tbody td {
        color: #d1d5db;
    }

    /* Pagination buttons */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0.25rem 0.75rem;
        margin: 0 0.125rem;
        border: 1px solid #d1d5db;
        background-color: white;
        color: #374151;
        border-radius: 0.375rem;
        font-size: 0.875rem;
    }
    
    .dark .dataTables_wrapper .dataTables_paginate .paginate_button {
        border-color: #4b5563;
        background-color: #374151;
        color: #d1d5db;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background-color: #7c3aed;
        border-color: #7c3aed;
        color: white;
    }

    /* Hide desktop table on mobile */
    @media (max-width: 768px) {
        .desktop-table {
            display: none;
        }
        .mobile-cards {
            display: block;
        }
    }

    /* Show desktop table on larger screens */
    @media (min-width: 769px) {
        .desktop-table {
            display: block;
        }
        .mobile-cards {
            display: none;
        }
    }
</style>
@endsection

@section('content')
<div class="container mx-auto px-2 sm:px-4 py-6 sm:py-12">
    <div class="flex flex-col lg:flex-row gap-4 lg:gap-8">
        <!-- Sidebar -->
        <div class="w-full lg:w-1/4">
            @include('user.partials.sidebar')
        </div>

        <!-- Main Content -->
        <div class="w-full lg:w-3/4">
            <!-- Header -->
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl p-4 sm:p-6 shadow mb-6 sm:mb-8">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div>
                        <h1 class="text-xl sm:text-2xl font-bold text-white">Bit Tasks</h1>
                        <p class="text-white/80 mt-1 text-sm sm:text-base">Complete tasks to earn bits which you can use for discounts!</p>
                    </div>
                    <div class="text-center bg-white/20 rounded-lg p-3 w-full sm:w-auto">
                        <p class="text-xs sm:text-sm text-white/80">Your Balance</p>
                        <p class="text-lg sm:text-xl font-bold text-white">{{ auth()->user()->bit_balance }} Bits</p>
                    </div>
                </div>
            </div>

            <!-- Search and Filter Controls (Mobile) -->
            <div class="block md:hidden mb-4 space-y-3">
                <div class="relative">
                    <input type="text" id="mobileSearch" placeholder="Search tasks..." 
                           class="w-full pl-10 pr-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
                <select id="mobileLength" class="w-full bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 p-2">
                    <option value="5">5 per page</option>
                    <option value="10" selected>10 per page</option>
                    <option value="25">25 per page</option>
                    <option value="50">50 per page</option>
                </select>
            </div>

            <!-- Desktop Table View -->
            <div class="desktop-table bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden">
                <div class="p-6">
                    <table id="bitTasksTable" class="w-full text-left stripe hover">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="whitespace-nowrap">Title</th>
                                <th class="whitespace-nowrap">Bits</th>
                                <th class="whitespace-nowrap">Submissions</th>
                                <th class="whitespace-nowrap">Status</th>
                                <th class="whitespace-nowrap">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <!-- Mobile Card View -->
            <div class="mobile-cards space-y-4" id="mobileTaskCards">
                <!-- Cards will be populated by JavaScript -->
            </div>
            
            <!-- Mobile Pagination -->
            <div class="mobile-cards mt-6">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                    <div class="text-sm text-gray-700 dark:text-gray-300 order-2 sm:order-1" id="mobileInfo">
                        Showing 1 to 10 of 50 entries
                    </div>
                    <div class="flex flex-wrap gap-1 order-1 sm:order-2" id="mobilePagination">
                        <!-- Pagination buttons will be populated by JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
let dataTable;
let allTasks = [];
let filteredTasks = [];
let currentPage = 1;
let itemsPerPage = 10;
let searchTerm = '';

$(document).ready(function() {
    // Initialize desktop DataTable
    dataTable = $('#bitTasksTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('user.bit-tasks.index') }}",
            data: function(d) {
                // Also fetch all data for mobile view
                fetchMobileData();
                return d;
            }
        },
        columns: [
            {
                data: 'title', 
                name: 'title',
                render: function(data, type, row) {
                    return '<span class="font-medium text-gray-900 dark:text-gray-100">' + data + '</span>';
                }
            },
            {
                data: 'bit_value', 
                name: 'bit_value',
                render: function(data, type, row) {
                    return '<span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300">' + data + ' Bits</span>';
                }
            },
            {
                data: 'total_submissions', 
                name: 'total_submissions',
                render: function(data, type, row) {
                    return '<span class="text-gray-600 dark:text-gray-400">' + data + '</span>';
                }
            },
            {
                data: 'status', 
                name: 'status', 
                orderable: false, 
                searchable: false
            },
            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: false
            }
        ],
        dom: '<"flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-4"lf>rt<"flex flex-col sm:flex-row justify-between items-center mt-4 gap-4"ip>',
        language: {
            search: "Search:",
            lengthMenu: "_MENU_ per page",
            processing: '<div class="flex items-center justify-center p-4"><i class="fas fa-spinner fa-spin mr-2"></i> Loading...</div>',
            paginate: {
                first: '<i class="fas fa-angle-double-left"></i>',
                last: '<i class="fas fa-angle-double-right"></i>',
                next: '<i class="fas fa-angle-right"></i>',
                previous: '<i class="fas fa-angle-left"></i>'
            }
        },
        pageLength: 10,
        lengthMenu: [[5, 10, 25, 50], [5, 10, 25, 50]],
        drawCallback: function() {
            styleBadgesAndButtons();
        }
    });

    // Fetch data for mobile view
    fetchMobileData();

    // Mobile search functionality
    $('#mobileSearch').on('keyup', function() {
        searchTerm = this.value.toLowerCase();
        currentPage = 1; // Reset to first page when searching
        filterAndDisplayMobileTasks();
    });

    // Mobile length change
    $('#mobileLength').on('change', function() {
        itemsPerPage = parseInt(this.value);
        currentPage = 1; // Reset to first page when changing items per page
        filterAndDisplayMobileTasks();
    });
});

// Fetch data for mobile view
function fetchMobileData() {
    $.ajax({
        url: "{{ route('user.bit-tasks.index') }}",
        data: {
            length: -1, // Get all records
            draw: 1,
            start: 0
        },
        success: function(response) {
            allTasks = response.data;
            filterAndDisplayMobileTasks();
        }
    });
}

// Filter and display mobile tasks
function filterAndDisplayMobileTasks() {
    // Filter tasks based on search term
    filteredTasks = allTasks.filter(task => {
        return task.title.toLowerCase().includes(searchTerm);
    });

    // Calculate pagination
    const totalItems = filteredTasks.length;
    const totalPages = Math.ceil(totalItems / itemsPerPage);
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = Math.min(startIndex + itemsPerPage, totalItems);
    const currentTasks = filteredTasks.slice(startIndex, endIndex);

    // Display tasks
    displayMobileTasks(currentTasks);
    
    // Update pagination
    updateMobilePagination(totalPages, currentPage, startIndex + 1, endIndex, totalItems);
}

// Display mobile task cards
function displayMobileTasks(tasks) {
    const container = $('#mobileTaskCards');
    container.empty();

    if (tasks.length === 0) {
        container.html(`
            <div class="text-center py-8">
                <div class="text-gray-500 dark:text-gray-400">
                    <i class="fas fa-inbox text-4xl mb-4"></i>
                    <p>No tasks found</p>
                </div>
            </div>
        `);
        return;
    }

    tasks.forEach(task => {
        const card = `
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-4">
                <div class="flex justify-between items-start mb-3">
                    <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100 pr-2">${task.title}</h3>
                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300 whitespace-nowrap">
                        ${task.bit_value} Bits
                    </span>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                    <div>
                        <span class="text-gray-500 dark:text-gray-400 block">Submissions</span>
                        <span class="text-gray-900 dark:text-gray-100 font-medium">${task.total_submissions}</span>
                    </div>
                    <div>
                        <span class="text-gray-500 dark:text-gray-400 block">Status</span>
                        <div class="mt-1">${task.status}</div>
                    </div>
                </div>
                
                <div class="flex justify-end pt-3 border-t border-gray-200 dark:border-gray-700">
                    ${task.action}
                </div>
            </div>
        `;
        container.append(card);
    });

    // Style badges and buttons after adding to DOM
    setTimeout(styleBadgesAndButtons, 100);
}

// Update mobile pagination
function updateMobilePagination(totalPages, currentPage, startIndex, endIndex, totalItems) {
    // Update info
    $('#mobileInfo').text(`Showing ${startIndex} to ${endIndex} of ${totalItems} entries`);

    // Update pagination buttons
    const pagination = $('#mobilePagination');
    pagination.empty();

    // Always show pagination container, even if only one page
    if (totalPages <= 1) {
        pagination.html('<span class="text-sm text-gray-500 dark:text-gray-400">Page 1 of 1</span>');
        return;
    }

    // Previous button
    const prevButton = `
        <button class="px-2 py-1 text-sm font-medium rounded border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 ${currentPage === 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-50 dark:hover:bg-gray-600'}"
                onclick="${currentPage > 1 ? 'changeMobilePage(' + (currentPage - 1) + ')' : ''}"
                ${currentPage === 1 ? 'disabled' : ''}>
            <i class="fas fa-angle-left"></i>
        </button>
    `;
    pagination.append(prevButton);

    // Show limited page numbers for mobile
    if (totalPages <= 5) {
        // Show all pages if 5 or fewer
        for (let i = 1; i <= totalPages; i++) {
            const pageButton = `
                <button class="px-2 py-1 text-sm font-medium rounded border min-w-[32px] ${i === currentPage ? 'bg-purple-600 text-white border-purple-600' : 'border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600'}"
                        onclick="changeMobilePage(${i})">
                    ${i}
                </button>
            `;
            pagination.append(pageButton);
        }
    } else {
        // Show smart pagination for many pages
        if (currentPage > 2) {
            pagination.append(`<button class="px-2 py-1 text-sm font-medium rounded border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 min-w-[32px]" onclick="changeMobilePage(1)">1</button>`);
            if (currentPage > 3) {
                pagination.append(`<span class="px-2 py-1 text-gray-500">...</span>`);
            }
        }

        // Current page and adjacent
        const startPage = Math.max(1, currentPage - 1);
        const endPage = Math.min(totalPages, currentPage + 1);

        for (let i = startPage; i <= endPage; i++) {
            const pageButton = `
                <button class="px-2 py-1 text-sm font-medium rounded border min-w-[32px] ${i === currentPage ? 'bg-purple-600 text-white border-purple-600' : 'border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600'}"
                        onclick="changeMobilePage(${i})">
                    ${i}
                </button>
            `;
            pagination.append(pageButton);
        }

        if (currentPage < totalPages - 1) {
            if (currentPage < totalPages - 2) {
                pagination.append(`<span class="px-2 py-1 text-gray-500">...</span>`);
            }
            pagination.append(`<button class="px-2 py-1 text-sm font-medium rounded border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 min-w-[32px]" onclick="changeMobilePage(${totalPages})">${totalPages}</button>`);
        }
    }

    // Next button
    const nextButton = `
        <button class="px-2 py-1 text-sm font-medium rounded border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 ${currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-50 dark:hover:bg-gray-600'}"
                onclick="${currentPage < totalPages ? 'changeMobilePage(' + (currentPage + 1) + ')' : ''}"
                ${currentPage === totalPages ? 'disabled' : ''}>
            <i class="fas fa-angle-right"></i>
        </button>
    `;
    pagination.append(nextButton);
}

// Change mobile page
function changeMobilePage(page) {
    currentPage = page;
    filterAndDisplayMobileTasks();
}

// Style badges and buttons
function styleBadgesAndButtons() {
    $('.btn-primary').removeClass('btn-primary').addClass('inline-flex items-center px-3 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg text-xs font-medium transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2');
    
    $('.badge.bg-success').removeClass('badge bg-success').addClass('inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300');
    $('.badge.bg-danger').removeClass('badge bg-danger').addClass('inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300');
    $('.badge.bg-warning').removeClass('badge bg-warning').addClass('inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300');
    $('.badge.bg-info').removeClass('badge bg-info').addClass('inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300');
}
</script>
@endsection