<?php
class Home {
    private $id;
    private $heading;
    private $subheading;
    private $btnText;
    private $btnLink;
    private $video;
    private $videoText;
    private $bgd_image;
    private $footer;

    public function __construct(array $homeData) {
        $this->id = $homeData['id'] ?? null;
        $this->heading = $homeData['heading'] ?? null;
        $this->subheading = $homeData['subheading'] ?? null;
        $this->btnText = $homeData['btnText'] ?? null;
        $this->btnLink = $homeData['btnLink'] ?? null;
        $this->video = $homeData['video'] ?? null;
        $this->videoText = $homeData['videoText'] ?? null;
        $this->bgd_image = $homeData['bgd_image'] ?? null;
        $this->footer = $homeData['footer'] ?? null;
    }

    public function getid() {
        return $this->id;
    }

    public function setid($id) {
        $this->id = $id;
    }

    public function getHeading() {
        return $this->heading;
    }

    public function setHeading($heading) {
        $this->heading = $heading;
    }

    public function getSubheading() {
        return $this->subheading;
    }

    public function setSubheading($subheading) {
        $this->subheading = $subheading;
    }

    public function getVideo() {
        return $this->video;
    }

    public function setVideo($video) {
        $this->video = $video;
    }

    public function getBtnText() {
        return $this->btnText;
    }

    public function setBtnText($btnText) {
        $this->btnText = $btnText;
    }

    public function getBtnLink() {
        return $this->btnLink;
    }

    public function setBtnLink($btnLink) {
        $this->btnLink = $btnLink;
    }

    public function getVideoText() {
        return $this->videoText;
    }

    public function setVideoText($videoText) {
        $this->videoText = $videoText;
    }
    public function getBgdImage() {
        return $this->bgd_image;
    }

    public function setBgdImage($bgd_image) {
        $this->bgd_image = $bgd_image;
    }
    
    public function getFooter() {
        return $this->footer;
    }

    public function setFooter($footer) {
        $this->footer = $footer;
    }
}

