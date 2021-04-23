<?php
//include('/simplehtmldom_1_9_1/simple_html_dom.php');
require __DIR__ . '/../vendor/autoload.php';
//require __DIR__ . "/vendor/autoload.php";
use Goutte\Client;
use GScholarProfileParser\DomCrawler\ProfilePageCrawler;
use GScholarProfileParser\Entity\Statistics;
use GScholarProfileParser\Parser\StatisticsParser;

        class stat
        { 
            public $fullname, $citations, $hIndex, $h10Index;
                        
        }        

        function getBingLink($link){
            $url="https://scholar.google.com/citations?hl=ru&user=";
        //получаем контент сайта
            $content=  file_get_contents($url.$link);
            //убираем вывод ошибок 
            libxml_use_internal_errors(true); 
        //получаем объект класса DOMDocument
            $mydom = new DOMDocument();
        //задаём настройки
            $mydom->preserveWhiteSpace = false;
            $mydom->resolveExternals = false; 
            $mydom->validateOnParse = false;
        //разбираем HTML
            $mydom->loadHTML($content);
            $links = $mydom->getElementById('gsc_prf_in')->textContent;
            
            return $links;
        /* //получаем объект класса DOMXpath
            $xpath = new DOMXpath($mydom);
        //делаем выборку с помощью xpath 
            $items=$xpath->query("//*[@class='b_algo']/h2/a");
            //выводим в цикле полученные ссылк
            static $a=1;
            foreach ($items as $item){
                $link=$item->find('div#gsc_prf_in', 0)->plaintext;
                echo $link;
                $a++;
            } */
        }
    

       

        $client = new Client();
        $array=array("2CjODR8AAAAJ","vCyTXyoAAAAJ","AXVYjNQAAAAJ");
        
        $statisticsG=new stat();
            $stat=array();
        /** @var ProfilePageCrawler $crawler */
            for($i=0; $i<count($array); $i++)
            {
                $crawler = new ProfilePageCrawler($client, $array[$i]); // the second parameter is the scholar's profile id
                
                /** @var StatisticsParser $parser */
                /** @var Statistics $statistics */
                $parser = new StatisticsParser($crawler->getCrawler());
                $statistics = new Statistics($parser->parse());

                $statisticsG->fullname[$i]=getBingLink($array[$i]);
                $statisticsG->citations[$i]=$statistics->getNbCitations();
                $statisticsG->hIndex[$i]=$statistics->getHIndex();
                $statisticsG->h10Index[$i]=$statistics->getI10Index();
                $stat=$statisticsG;
            }
            
            dd($stat);
         
          
            

            
           
            
           
           


/* $client = new Client();


$crawler = new ProfilePageCrawler($client, '2CjODR8AAAAJ'); // the second parameter is the scholar's profile id


$parser = new StatisticsParser($crawler->getCrawler());


$statistics = new Statistics($parser->parse());
 */
$nbCitationsPerYear = $statistics->getNbCitationsPerYear();
$sinceYear = $statistics->getSinceYear();

$nbCitationsSinceYear = 0;
foreach ($nbCitationsPerYear as $year => $nbCitations) {
    if ($year >= $sinceYear) {
        $nbCitationsSinceYear += $nbCitations;
    }
}

// display statistics
/* echo sprintf("           All\t%4d\n", $sinceYear);
echo '<br>';
echo sprintf("Citations: %4d\t%4d\n", $statistics->getNbCitations(), $nbCitationsSinceYear);
echo '<br>';
echo sprintf("h-index  : %4d\t%4d\n", $statistics->getHIndex(), $statistics->getHIndexSince());
echo '<br>';
echo sprintf("i10-index: %4d\t%4d\n", $statistics->getI10Index(), $statistics->getI10IndexSince());
echo '<br>';
echo implode("\t", array_keys($nbCitationsPerYear));
echo '<br>';
echo implode("\t", array_values($nbCitationsPerYear));
echo '<br>';
 */


