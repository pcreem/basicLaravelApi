<?php

namespace App\Http\Controllers;

use App\Models\Dummy;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response as Res;

class DummyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ?? 10;
        $query = Dummy::query();

        $url = $request->url();
        $queryParams = $request->query();
        ksort($queryParams);
        $queryString = http_build_query($queryParams);
        $fullUrl = "{$url}?{$queryString}";

        if(Cache::has($fullUrl)){
            return Cache::get($fullUrl);
        }

        if(isset($request->filters)){
            $filters = explode(',',$request->filters);         
            foreach ($filters as $key => $filter){
                list($key,$value) = explode(':',$filter);
                $query->where($key,'like',"%$value%");
            }
        }

        if(isset($request->sorts)){
            $sorts = explode(',',$request->sorts);         
            foreach ($sorts as $key => $sort){
                list($key,$value) = explode(':',$sort);
                if($value == 'asc' or $value == 'desc'){
                    $query->orderBy($key,$value);
                }
            }
        }else{
            $query->orderBy('id','desc');
        }



        $dummy = $query
        ->paginate($limit)
        ->appends($request->query());

        return Cache::remember($fullUrl,180, function () use ($dummy){
            return response($dummy, Res::HTTP_OK);
        });        
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
        $this->validate($request,[
            'name' => 'required|string|max:255'
        ]);

        $dummy = Dummy::create($request->all());
        $dummy = $dummy->refresh();
        return response($dummy,Res::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dummy  $dummy
     * @return \Illuminate\Http\Response
     */
    public function show(dummy $dummy)
    {
        return response($dummy,RES::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dummy  $dummy
     * @return \Illuminate\Http\Response
     */
    public function edit(dummy $dummy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dummy  $dummy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dummy $dummy)
    {
        $dummy->update($request->all());
        return response($dummy,RES::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dummy  $dummy
     * @return \Illuminate\Http\Response
     */
    public function destroy(dummy $dummy)
    {
        $dummy->delete();
        return response(null, RES::HTTP_NO_CONTENT);
    }
}
