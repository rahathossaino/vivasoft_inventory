<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $products = Product::with(['productQties.warehouse','brand', 'category', 'unit', 'tax', 'productQties', 'attachments'])->get();
            return response()->json(['products'=>$products],200);
        }
        catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong while fetching data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try{
            $validatedData = $request->validate(Product::$rules);
            Product::create($validatedData);
            return response()->json(['message'=>'Product added successfully'], 201);
        }
        catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->validator->errors()->all()
            ], 422);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Something went wrong while adding data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $product = Product::with(['productQties.warehouse','brand', 'category', 'unit', 'tax', 'productQties', 'attachments'])->findOrFail($id);
            return response()->json([
                'success'=>true,
                'message'=>'Product showing successfully',
                'data'=>$product,
                'error'=>null
            ],200);
        }
        catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Product not found',
            ], 404);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Something went wrong while showing data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        try{
            $validatedData = $request->validate(Product::$rules);
            $product =Product::findOrFail($id);
            $product->update($validatedData);
            return response()->json(['message'=>'Product updated successfully'], 201);
        }
        catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->validator->errors()->all()
            ], 422);
        }    
        catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Product not found',
            ], 404);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json(['message'=>'Product deleted successfully'], 201);
        }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Product not found'], 404);
        }
    }
}
