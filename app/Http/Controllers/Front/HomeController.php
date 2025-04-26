<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Blog;
use App\Models\Service;
use Cache;
use DB;

class HomeController extends Controller
{   
    public function __construct(Request $request)
    {
        $this->middleware('auth')->only(['pickInterests', 'pickInterestStore']);
        $this->request = $request;
    }

    /**
     * Show the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Use cache to improve performance (cache for 1 hour)
        $featuredProducts = Cache::remember('home_featured_products', 60*60, function () {
            return Product::active()
                // ->where('featured', true)
                ->withCount('approvedReviews')
                ->withAvg('approvedReviews', 'rating')
                ->latest()
                ->take(8)
                ->get();
        });
        
        $latestProducts = Cache::remember('home_latest_products', 60*60, function () {
            return Product::active()
                ->withCount('approvedReviews')
                ->withAvg('approvedReviews', 'rating')
                ->latest()
                ->take(8)
                ->get();
        });
        
        $categories = Cache::remember('home_categories', 60*60, function () {
            return ProductCategory::active()
                ->whereNull('parent_id')
                ->with(['subcategories' => function ($query) {
                    $query->active()->latest()->take(3);
                }])
                ->take(5)
                ->get();
        });
        
        // Get services for services section
        $services = Cache::remember('home_services', 60*60, function () {
            return Service::active()
                ->latest()
                ->take(3)
                ->get();
        });
        
        // Get latest blogs for blog section
        $latestBlogs = Cache::remember('home_latest_blogs', 60*60, function () {
            return Blog::with('category')
                ->active()
                ->latest()
                ->take(3)
                ->get();
        });
        
        // Define all section content directly in the controller - no database needed
        
        // Hero section settings
        $heroSection = (object)[
            'badge_text' => 'Where Convenience Meets Innovation',
            'heading_text' => 'Discover Our',
            'heading_highlight' => 'New Collection',
            'description' => 'Elevate your space with our premium collection of products, designed for comfort and sophistication.',
            'button_text' => 'Explore More Products',
            'button_link' => route('front.products.index'),
        ];
        
        // Featured section settings
        $featuredSection = (object)[
            'title' => 'Featured Products',
            'subtitle' => 'Discover our most popular and trending products',
        ];
        
        // Category section settings
        $categorySection = (object)[
            'badge' => 'Featured Categories',
            'title' => 'Discover Our Premium Selections',
            'subtitle' => 'Explore our handpicked categories designed to enhance your digital lifestyle and experience.',
        ];
        
        // Latest products section settings
        $latestSection = (object)[
            'badge' => 'New Arrivals',
            'title' => 'Our Latest Products',
            'subtitle' => 'Check out our newest products added to our collection.',
        ];
        
        // Services section settings
        $servicesSection = (object)[
            'title' => 'Our Featured Services',
            'subtitle' => 'We offer a wide range of services to help you achieve your business goals.'
        ];
        
        // Blog section settings
        $blogSection = (object)[
            'title' => 'Latest Articles',
            'subtitle' => 'Stay updated with our latest news and articles'
        ];
        
        return view('front.index', compact(
            'featuredProducts',
            'latestProducts',
            'categories',
            'services',
            'latestBlogs',
            'heroSection',
            'featuredSection',
            'categorySection',
            'latestSection',
            'servicesSection',
            'blogSection'
        ));
    }

    public function page($slug)
    {
        $page =  DB::table('pages')->where('slug',$slug)->where('status',1)->first();
        if(empty($page))
        {
            return view('errors.404');
        }

        return view('front.page',compact('page'));
    }
    public function pricing()
    {
        return view('front.pricing');
    }
    public function employGuide()
    {
       return view('front.employs-guide');
    }
    public function employDetail()
    {
        return view('front.codetail');
    }


 
    public function getSubcategories($categoryId)
    {
       $subcategories = ProductCategory::where('parent_id', $categoryId)->get();
        return response()->json([
            'success' => true,
            'subcategories' => $subcategories
        ]);
    }



    public function dropzoneStoreMedia(Request $request)
    {
        $path = storage_path('tmp/uploads');       
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($path, $name);
        
        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function pdff(Request $request)
    {
         

        // $quiz = QuizBank::where('slug', $quiz_slug)->active()->firstOrFail();        
        // if($quiz->pdf_file){
            // $token = $this->generateToken();
            return view('front.test', ['token' => '22']);
        // }else{
        //     dd("pdf not found");
        // }
       
    }

    public function servePdf(Request $request, $token)
    {
        // if (!Cache::get($token)) {
        //     abort(403, 'Invalid or expired token');
        // }
        // $quiz = QuizBank::where('slug', $token)->active()->firstOrFail();

        // $imagepath='assets/dynamic/images/quiz/pdf_files/'.$quiz->pdf_file;

        $imagepath = 'assets\sample2.pdf';
        $pdf = new Fpdi();
        $pdf->setSourceFile(public_path($imagepath));
        $totalPages = $pdf->setSourceFile(public_path($imagepath));
  
        // Assuming you want the first 3 pages for now, 
        // Adjust accordingly based on your requirements
        $pagesToExtract = $totalPages;

        for ($pageNo = 1; $pageNo <= $pagesToExtract; $pageNo++) {
            $pdf->AddPage();
            $pdf->setSourceFile(public_path($imagepath));
            $pdf->useTemplate($pdf->importPage($pageNo));
        }

        $pdfContent = $pdf->Output('S');
       
        return response($pdfContent, 200);
    }

}
