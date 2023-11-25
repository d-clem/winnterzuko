<?php

class SongCard
{

    const COVER_SIZE = 200;

    const prefs = [
        "Off",
        "Trotski",
        "Serpentard",
        "Deep Girl",
        "Oxygène",
        "Jeep",
        "Network"
    ];

    private $id;
    private $title;
    private $project;
    private $duration;
    private $feats;
    private $cover_url;
    private $mp3_url;
    private $class;

    public function __construct(array $json_data) 
    {
        $this->id = $json_data['SNG_ID'];
        $this->title = self::getTitleFromJson($json_data);
        $this->project = $json_data['ALB_TITLE'];
        $this->duration = $json_data['DURATION'];
        $this->feats = self::getFeatsFromJson($json_data['ARTISTS']);
        
        // $this->cover_url = self::getCoverUrlFromDeeze($this->id);
        $this->cover_url = self::getCover($json_data['ALB_PICTURE']);

        $this->mp3_url = $json_data['MEDIA'][0]['HREF'];

        if (in_array($this->title, self::prefs)) {
            $this->class = "green-card";
        }

    }

    public function getHtml() : string
    {

        $html = "<div class='$this->class'>";

        $html .= "<div>";

        $html .= "<h4>" . $this->title . "</h4>";

        $html .= "<span> <h6> Album : </h6>" . $this->project . "</span>";

        $html .= "<br>";

        $minutes = floor($this->duration / 60);
        $seconds = $this->duration % 60;

        if ($seconds < 10) {
            $seconds = "0" . $seconds;
        } else {
            $seconds = "" . $seconds;
        }



        // format the duration from seconds to minutes:seconds
        $html .= "<span> <h6> Durée : </h6>0" 
            . $minutes . ":" . $seconds
            . "</span>";

        $feat = empty(implode(", ", $this->feats)) ? "Aucun" : implode(", ", $this->feats);

        $html .= "<span> <h6> Feats : </h6>" 
                . $feat
                . "</span>";

        $html .= "</div>";

        // $html .= $this->cover_url;

         // wrap the cover in a link to the deezer page

        $html .= "<a href=\"https://www.deezer.com/fr/track/"
                . $this->id
                . "\" target=\"_blank\">";

        $html .= "<img src=\""
                . $this->cover_url
                . "\" class=\"cover\" alt=\"cover de l'album Off\">";

        $html .= "</a>";

        $html .= "<audio controls src=\""
            . $this->mp3_url
            . "\"></audio>";

        $html .= "</div> <!-- end of card --> \n\n\t\t";

        return $html;
    }


    public static function getTitleFromJson(array $json_data) : string
    {
        $title = $json_data['SNG_TITLE'];
        // remove parenthesis and what's after
        $title = preg_replace("/\s*\(.*\)/", "", $title);
        
        return $title;

    }

    public static function getFeatsFromJson(array $json_data) : array
    {
        $feats = [];
        foreach ($json_data as $feat) {
            if ($feat['ART_NAME'] != "winnterzuko") {
                $feats[] = $feat['ART_NAME'];

            }
        }
        return $feats;
    }

    public static function getCoverUrlFromDeeze(string $cover_id) : string
    {

        $url = "<iframe title=\"deezer-widget\" src=\"https://widget.deezer.com/widget/auto/track/" 
            . $cover_id  
            ."?tracklist=false\" width=\"210\" height=\"200\" frameborder=\"0\" allowtransparency=\"true\" allow=\"encrypted-media; clipboard-write\"></iframe>";

        return $url;
    }

    public static function getCover(string $cover_id) : string
    {
        $url = "https://e-cdns-images.dzcdn.net/images/cover/"
            . $cover_id
            . "/"
            . self::COVER_SIZE
            . "x"
            . self::COVER_SIZE
            . "-000000-80-0-0.jpg";

        return $url;
    }
    
}
