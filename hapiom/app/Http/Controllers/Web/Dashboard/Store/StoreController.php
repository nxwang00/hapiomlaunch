<?php

namespace App\Http\Controllers\Web\Dashboard\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Store;
use App\Models\Product;
use App\Models\Cart;
use Auth;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return view('dashboard.pages.store.index', compact('stores'));
    }

    public function detail($id)
    {
        $store = Store::find($id);
        $goods = Product::where('store_id', $id)->where('type', 'good')->get();
        $services = Product::where('store_id', $id)->where('type', 'service')->get();
        $courses = Product::where('store_id', $id)->where('type', 'course')->get();
        // product ids in cart table
        $cartIds = Cart::where('user_id', Auth::id())->pluck('product_id')->toArray();

        // getting thumbnails of vimeo videos
        $regex = "/[0-9]+/";
        foreach($courses as $course)
        {
            $string = $course->image_video;
            preg_match($regex, $string, $match);

            $videoId = $match[0];

            $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$videoId.php"));
            $thumbnail = $hash[0]['thumbnail_medium'];
            $course->thumbnail = $thumbnail;
        }

        return view('dashboard.pages.store.detail', compact('store', 'goods', 'courses', 'services', 'cartIds'));
    }

    public function indexAdmin(Request $request)
    {
        $store = Store::where('user_id', Auth::id())->first();
        if (!isset($store))
        {
            flashWebResponse('store-error');
            return redirect()->route('user-profile', encrypt(Auth::user()->id));
        }

        $products = Product::where('store_id', $store->id)->paginate(5);
        return view('dashboard.pages.store.admin_index', compact('store', 'products'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'store_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $storeName = $request->store_name;
        $storeDescription = $request->store_description;

        $storeId = $request->store_id;

        // update
        if (isset($storeId))
        {
            $store = Store::find($storeId);
            if (isset($request->store_image))
            {
                // delete existing file
                $filePath = "images/store/".$store->image;
                File::delete($filePath);

                $filenameWithExt = $request->store_image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $imageName = $filename."_".time().'.'.$request->store_image->extension();

                $request->store_image->move(public_path('images/store'), $imageName);
                $store->image = $imageName;
            }
        }
        // create
        else
        {
            $filenameWithExt = $request->store_image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $imageName = $filename."_".time().'.'.$request->store_image->extension();

            $request->store_image->move(public_path('images/store'), $imageName);

            $store = new Store;
            $store->image = $imageName;
        }

        $store->sname = $storeName;
        $store->description = $storeDescription;
        $store->user_id = Auth::id();
        $store->save();

        if (isset($store->id))
            return response()->json('ok');

        return response()->json('error');
    }

    public function createProduct()
    {
        return view('dashboard.pages.store.admin_create');
    }

    public function saveProduct(Request $request)
    {
        $productName = $request->product_name;
        $productType = $request->product_type;
        $productPrice = $request->product_price;
        $productDescription = $request->product_description;
        $productStatus = $request->product_status;

        $product = new Product;
        if ($productType !== 'course')
        {
            $request->validate([
                'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $filenameWithExt = $request->product_image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $imageName = $filename."_".time().'.'.$request->product_image->extension();

            $request->product_image->move(public_path('images/product'), $imageName);

            $product->image_video = $imageName;
        }
        else
        {
            $videoLink = $request->product_video_link;
            $product->image_video = $videoLink;
        }

        $product->name = $productName;
        $product->description = $productDescription;
        $product->type = $productType;
        $product->price = $productPrice;
        $product->status = $productStatus;
        $product->store_id = Auth::user()->store->id;
        $product->save();

        if (isset($product->id))
        {
            flashWebResponse('created', 'Product');
            return redirect()->route('store-index-admin');
        }

        flashWebResponse('error');
        return redirect()->back();
    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        return view('dashboard.pages.store.admin_edit', compact('product'));
    }

    public function updateProduct(Request $request)
    {
        $productId = $request->product_id;
        $productName = $request->product_name;
        $productType = $request->product_type;
        $productPrice = $request->product_price;
        $productDescription = $request->product_description;
        $productStatus = $request->product_status;

        $product = Product::find($productId);
        if ($productType !== 'course')
        {

            $request->validate([
                'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if (isset($request->product_image))
            {
                // delete existing file
                $filePath = "images/product/".$product->image_video;
                File::delete($filePath);

                $filenameWithExt = $request->product_image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $imageName = $filename."_".time().'.'.$request->product_image->extension();

                $request->product_image->move(public_path('images/product'), $imageName);

                $product->image_video = $imageName;
            }
        }
        else
        {
            $videoLink = $request->product_video_link;
            $product->image_video = $videoLink;
        }

        $product->name = $productName;
        $product->description = $productDescription;
        $product->type = $productType;
        $product->price = $productPrice;
        $product->status = $productStatus;
        $product->save();

        if (isset($product->id))
        {
            flashWebResponse('updated', 'Product');
            return redirect()->route('store-index-admin');
        }

        flashWebResponse('error');
        return redirect()->back();
    }

    public function deleteProduct(Request $request)
    {
        $productId = $request->del_prod_id;
        Product::destroy($productId);

        flashWebResponse('trashed', 'Product');
        return redirect()->route('store-index-admin');
    }

    public function detailProduct($id)
    {
        $product = Product::find($id);
        $cart = Cart::where('product_id', $id)->first();
        if ($product->type === 'course') {
            $regex = "/[0-9]+/";
            $string = $product->image_video;
            preg_match($regex, $string, $match);

            $videoId = $match[0];

            $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$videoId.php"));
            $thumbnail = $hash[0]['thumbnail_medium'];
            $product->thumbnail = $thumbnail;
        }
        return view('dashboard.pages.store.product_detail', compact('product', 'cart'));
    }
}
