<?php

namespace App\Http\Controllers;

use App\Price;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prices.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $price = Price::find($id);
        $price->amount = $request->amount;
        $price->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function action(Request $request)
    {


        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('product')
                    ->leftJoin('price', 'product.id', '=', 'price.productId')
                    ->select('product.*', 'price.amount')
                    ->where('product.name', 'like', '%' . $query . '%')
                    ->orderBy('product.name', 'asc')
                    ->get();
            } else {
                $data = DB::table('product')
                    ->leftJoin('price', 'product.id', '=', 'price.productId')
                    ->select('product.*', 'price.amount')
                    ->orderBy('product.name', 'asc')
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
        <tr>
         <td>' . $row->id . '</td>
         <td class="w-25">' . '<img src="/storage/img/product_images/' . $row->image . '"' . 'class="img-fluid img-thumbnail img-max" alt="Sheep">' . '</td>
         <td>' . $row->name . '</td>
         <td>' . $row->amount . '</td>
         <td>' . '<a href="/prices/' . $row->id . '/edit"><btn class="btn btn-primary"><i class="fas fa-edit" btn-primary></i> Change Price</btn></a>' . '</td>
        </tr>
        ';
                }
            } else {
                $output = '
       <tr>
        <td align="center" colspan="">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            return json_encode($data);
        }
    }
}
