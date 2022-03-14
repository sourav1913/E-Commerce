<?php

namespace App\Http\Controllers\Backend;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductGallery;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', "desc")->get();
        $sizes = Size::all();
        $colors = Color::all();
        return view('backend.product.create', compact('categories','sizes','colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $this->validate($request, [
        //     "name" => 'required|unique:products,name,',
        //     "price" => "numeric", 
        //     "sale_price" => "numeric", 
        //     "categories" => "required", 
        //     "size" => "required", 
        //     "color" => "required",
        //     "photo" => "required|image|mimes:jpg,png,webp,jpeg|max:512",
        // ]);

        $photo = $request->file('photo');
        if(!empty($photo)){
            $photo_name = Str::slug($request->name).time().".".$photo->getClientOriginalExtension();
            $upload_photo = Image::make($photo)->crop(800, 609)->save(public_path('storage/products/'.$photo_name));
            if($upload_photo){
                $product = new Product();
                $product->title = $request->name;
                $product->slug = Str::slug($request->name);
                $product->user_id = auth()->user()->id;
                $product->short_description = $request->short_description;
                $product->description = $request->description;
                $product->additional_info = $request->additional_info;
                $product->price = $request->price;
                $product->sale_price = $request->sale_price;
                $product->quantity = $request->quantity;
                $product->photo = $photo_name;
                $product->save();

                $product->categories()->attach(request('categories'));
                $product->sizes()->attach(request('sizes'));
                $product->colors()->attach(request('colors'));
                
            }
            
        }

        if(isset( $product->id)){
            $gallery_photos = $request->file('gallery_photo');

            foreach($gallery_photos as $gallery_photo){
               $gallery_photo_name = Str::slug($request->name)."_".uniqid().".".$gallery_photo->getClientOriginalExtension();
    
               $upload_photo = Image::make($gallery_photo)->crop(800, 609)->save(public_path('storage/product_gallery/'.$gallery_photo_name));
               if($upload_photo){
                    $gallery = new ProductGallery();
                    $gallery->product_id = $product->id;
                    $gallery->photo = $gallery_photo_name;
                    $gallery->save();
               }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
