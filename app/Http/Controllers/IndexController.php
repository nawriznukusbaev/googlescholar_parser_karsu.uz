<?php

namespace App\Http\Controllers;

//require __DIR__ . "/vendor/autoload.php";
use Goutte\Client;
use GScholarProfileParser\DomCrawler\ProfilePageCrawler;
use GScholarProfileParser\Entity\Statistics;
use GScholarProfileParser\Parser\StatisticsParser;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {

        $client = new Client();

        /** @var ProfilePageCrawler $crawler */
        $crawler = new ProfilePageCrawler($client, '2CjODR8AAAAJ'); // the second parameter is the scholar's profile id

        /** @var StatisticsParser $parser */
        $parser = new StatisticsParser($crawler->getCrawler());

        /** @var Statistics $statistics */
        $statistics = new Statistics($parser->parse());

        $nbCitationsPerYear = $statistics->getNbCitationsPerYear();
        $sinceYear = $statistics->getSinceYear();

        $nbCitationsSinceYear = 0;
        foreach ($nbCitationsPerYear as $year => $nbCitations) {
            if ($year >= $sinceYear) {
                $nbCitationsSinceYear += $nbCitations;
            }
        }

        
        


        return view('index',compact('statistics'));
    } 
}
