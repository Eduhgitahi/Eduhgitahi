<?php
namespace App\Http\Controllers\API\V1;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\InvoiceResource;
use App\Http\Resources\V1\InvoiceCollection;
use App\Filters\V1\InvoicesFilter;

class InvoiceController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     * 
     *  @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new InvoicesFilter();
        $queryItems = $filter->transform($request);  //[['column', 'operator', 'value']]

        if (count($queryItems) == 0){
            return new InvoiceCollection(Invoice::paginate());
            
        }
        else{
            $invoices = Invoice::where($queryItems)->paginate();
            return new InvoiceCollection($invoices->appends($request->query()));
        }

    }

    /**
     * show the form for creating a new resource.
     * 
     *  @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * store a newly created resource in storage.
     * 
     *  @param \Illuminate\Http\Request $request
     *  @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
    }
    /**
     * Display the specified resource
     * 
     *  @param \App\Models\Invoice $invoice
     *  @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return new InvoiceResource($invoice);
    }

    /**
     * Show the form for editing the specified resource
     * 
     *  @param \App\Models\Invoice $invoice
     *  @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }
}