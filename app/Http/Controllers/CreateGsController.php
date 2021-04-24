<?php

namespace App\Http\Controllers;
use Goutte\Client;
use GScholarProfileParser\DomCrawler\ProfilePageCrawler;
use GScholarProfileParser\Entity\Statistics;
use GScholarProfileParser\Parser\StatisticsParser;
use Illuminate\Http\Request;
use App\Gsusers;
use App\Gsprofile_statistics;

class CreateGsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('createuser');      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_code = GSusers::create(['user_code'=>$request->input('user_code')]);

        return redirect()->route('user_code');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
           
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
                  
            Gsprofile_statistics::truncate();
            
            function getBingLink($link){
                $url="https://scholar.google.com/citations?hl=ru&user=";
            //получаем контент сайта
                $content=  file_get_contents($url.$link);
                //убираем вывод ошибок 
                libxml_use_internal_errors(true); 
            //получаем объект класса DOMDocument
                $mydom = new \DOMDocument();
            //задаём настройки
                $mydom->preserveWhiteSpace = false;
                $mydom->resolveExternals = false; 
                $mydom->validateOnParse = false;
            //разбираем HTML
                $mydom->loadHTML($content);
                $links = $mydom->getElementById('gsc_prf_in')->textContent;
                
                $arr=array();
                $arr[0]=$links;
                $xpath = new \DOMXpath($mydom);
                $items=$xpath->query("//*[contains(@class, 'gsc_rsb_std')]");
                foreach ($items as $key=>$image)
                {
                    $arr[$key+1]=$image->textContent;
                }

                return $arr;

            }

            $user_code=Gsusers::all();
            
            $stat=array();
        /** @var ProfilePageCrawler $crawler */
            foreach($user_code as $user)
            {
               // $crawler = new ProfilePageCrawler($client, $array[$i]); // the second parameter is the scholar's profile id
                
                $st=getBingLink($user->user_code);
                /* $parser = new StatisticsParser($crawler->getCrawler());
                $statistics = new Statistics($parser->parse()); */
                
                Gsprofile_statistics::create(['fullname'=>$st[0],'citations'=>$st[1],'hIndex'=>$st[3],'i10Index'=>$st[5]]);
                    
                
                
            } 




    
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
}
