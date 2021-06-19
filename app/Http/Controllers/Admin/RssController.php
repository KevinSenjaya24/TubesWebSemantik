<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utility;

class RssController extends Controller
{
    public function tribun()
    {
        $tribun = simplexml_load_file("http://www.tribunnews.com/rss");
        return view('admin.rss.tribun',["tribuns"=>$tribun]);
    }

    public function sindonews()
    {
        $sindonews = simplexml_load_file("https://www.sindonews.com/feed");
        return view('admin.rss.sindonews',["sindonews"=>$sindonews]);
    }


    public function sparqlPerson()
    {
       $format = 'json';
     
       $query = 
       "PREFIX f: <http://example.org#> 
       PREFIX rdf: <http://www.w3.org/2001/XMLSchema#> 
       
       SELECT ?s ?p ?o WHERE {?s ?p ?o}";

       $query1 = 
        "PREFIX f: <http://example.org#> 
        PREFIX rdf: <http://www.w3.org/2001/XMLSchema#> 
        
        SELECT ?s ?p ?o WHERE {?s ?p ?o .FILTER (?p = f:loves || ?p = f:hasFriend)}";
     
       $searchUrl = 'http://localhost:3030/praktikum12?'
          .'query='.urlencode($query)
          .'&format='.$format;
    
        $searchUrl1 = 'http://localhost:3030/praktikum12?'
            .'query='.urlencode($query1)
            .'&format='.$format;  

        $searchPeople = 'http://localhost:3030/people?'
        .'query='.urlencode($query)
        .'&format='.$format;  

        $searchEmployement = 'http://localhost:3030/employement?'
        .'query='.urlencode($query)
        .'&format='.$format;    
        
        $searchJobs = 'http://localhost:3030/jobs?'
        .'query='.urlencode($query)
        .'&format='.$format;    
       
        $json = file_get_contents($searchUrl);
        $json = utf8_encode($json);
        $data = json_decode($json, true);

        $json = file_get_contents($searchPeople);
        $json = utf8_encode($json);
        $people = json_decode($json, true);

        $json = file_get_contents($searchEmployement);
        $json = utf8_encode($json);
        $employement = json_decode($json, true);
        
        $json = file_get_contents($searchJobs);
        $json = utf8_encode($json);
        $jobs = json_decode($json, true);

        $json1 = file_get_contents($searchUrl1);
        $json1 = utf8_encode($json1);
        $results1 = json_decode($json1, true);
        return view('admin.sparql.index',["data"=>$data, "peoples"=>$people,  "employements"=>$employement, "jobs"=>$jobs, "results1"=>$results1]);
    }

    public function sparqlUpdate(Request $request)
    {
        $format = 'json';
        $dataset = $request->dataset;
        $prefix1 = $request->prefix1;
        $prefix2 = $request->prefix2;
        $subject = $request->subject;
        $predicate = $request->predicate;
        $object = $request->object;
        $spo = '{'.$subject.' '.$predicate.' '.$object.'}';
        $query =
        "$prefix1 $prefix2 INSERT DATA {$spo}";
        $searchUrl = 'http://localhost:3030/'.$dataset.'?'
            .'update='.urlencode($query)
            .'&format='.$format;
   
        $url = $searchUrl;
        // dd($url);
        $wsResponse = Utility::curl_post($url, array());
        $result = json_decode($wsResponse);

        if(!$result){
            return redirect('/sparql')->with('success', 'Congrats Saved Successfully!');
        }
        return redirect('/sparql')->with('error', 'Fail to Create!');
        
    }

    public function sparqlDelete(Request $request)
    {
        $format = 'json';
        $dataset = $request->dataset;
        $prefix1 = $request->prefix1;
        $prefix2 = $request->prefix2;
        $subject = $request->subject;
        $predicate = $request->predicate;
        $object = $request->object;
        $spo = '{'.$subject.' '.$predicate.' '.$object.'}';
        $query = 
        "$prefix1 $prefix2 DELETE DATA {$spo}";
       
        $searchUrl = 'http://localhost:3030/'.$dataset.'?'
            .'update='.urlencode($query)
            .'&format='.$format;
   
        $url = $searchUrl;
        // dd($url);
        $wsResponse = Utility::curl_post($url, array());
        // dd($wsResponse);
        if($wsResponse){
            return redirect('/sparql')->with('success', 'Congrats Deleted Successfully!');
        }
        return redirect('/sparql')->with('error', 'Fail to Create!');
        
    }

    public function ask(Request $request) {
        $format = 'json';
        $dataset = 'praktikum12';
        $subject = $request->subject;
        $predicate = $request->predicate;
        $object = $request->object;
        $spo = '{ <'.$subject.'> <'.$predicate.'> <'.$object.'> }';
        $query = 
        "ASK WHERE {$spo}";
      
        $searchUrl = 'http://localhost:3030/'.$dataset.'?'
           .'query='.urlencode($query)
           .'&format='.$format;
        
        $url = $searchUrl;
        $wsResponse = Utility::curl_post($url, array());
        
        $result = json_decode($wsResponse, true);
        // dd($url);
        return view('admin.sparqladc.index',["results"=>$result]);
     }

     public function describe(Request $request) {
        $format = 'json';
        $dataset = 'people';
        $model = 'person';
      
        $query = 
        "PREFIX f: <http://example.org#> 
        DESCRIBE ?person WHERE {?person f:$request->predicate f:$request->object}";
      
        $searchUrl = 'http://localhost:3030/'.$dataset.'?'
           .'query='.urlencode($query)
           .'&format='.$format;
        
        $url = $searchUrl;
        $wsResponse = Utility::curl_post($url, array());
        
        $result = json_decode($wsResponse);
        dd($wsResponse);
        return view('admin.sparqladc.index',["results"=>$result]);
     }

     public function construct(Request $request) {
        $format = 'json';
        $dataset = $request->dataset;
        $prefix1 = $request->prefix1;
        $prefix2 = $request->prefix2;
        $subject = $request->subject;
        $predicate = $request->predicate;
        $object = $request->object;
        $spo = '{'.$subject.' '.$predicate.' '.$object.'}';
      
        $query = 
        "$prefix1 $prefix2 CONSTRUCT ?s ?p ?o WHERE {$spo}";
      
        $searchUrl = 'http://localhost:3030/'.$dataset.'?'
           .'query='.urlencode($query)
           .'&format='.$format;
        
        $url = $searchUrl;
        $wsResponse = Utility::curl_post($url, array());
        
        $result = json_decode($wsResponse);
        dd($result);
        return view('admin.sparqladc.index',["results"=>$result]);
     }

    
}
