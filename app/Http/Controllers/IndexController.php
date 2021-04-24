<?php

namespace App\Http\Controllers;

//require __DIR__ . "/vendor/autoload.php";
use Goutte\Client;
use GScholarProfileParser\DomCrawler\ProfilePageCrawler;
use GScholarProfileParser\Entity\Statistics;
use GScholarProfileParser\Parser\StatisticsParser;
use Illuminate\Http\Request;
use App\Gsprofile_statistics;

class IndexController extends Controller
{
    public function index()
    {

        $statistics=Gsprofile_statistics::all();
        return view('index',compact('statistics'));
    } 
}
