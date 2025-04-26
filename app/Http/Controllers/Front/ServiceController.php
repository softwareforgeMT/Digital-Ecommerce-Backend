<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $categories = ServiceCategory::active()->get();
        
        $query = Service::with('category')->active();
        
        // Filter by category if selected
        if ($request->category) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Add search functionality
        if ($request->search) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('summary', 'like', '%' . $searchTerm . '%')
                  ->orWhere('content', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('category', function($categoryQuery) use ($searchTerm) {
                      $categoryQuery->where('name', 'like', '%' . $searchTerm . '%');
                  });
            });
        }
        
        $services = $query->latest()->paginate(9);
         // Retain search and category filters when paginating
        $services->appends($request->only(['search', 'category']));
        
        return view('front.services.index', compact('categories', 'services'));
    }

    public function show($slug)
    {
        $service = Service::with('category')
            ->active()
            ->where('slug', $slug)
            ->firstOrFail();

        $related = Service::active()
            ->where('category_id', $service->category_id)
            ->where('id', '!=', $service->id)
            ->take(3)
            ->get();

        return view('front.services.show', compact('service', 'related'));
    }
}
