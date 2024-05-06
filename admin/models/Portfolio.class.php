<?php
class Portfolio {
    private $id;
    private $sectionTitle;
    private $sectionSubheader;
    private $img;

    public function __construct($data) {
        $this->id = $data['id'] ?? null;
        $this->sectionTitle = $data['sectionTitle'] ?? '';
        $this->sectionSubheader = $data['sectionSubheader'] ?? '';
        $this->img = $data['img'] ?? [];
    }

    public function getId() {
        return $this->id;
    }

    public function getSectionTitle() {
        return $this->sectionTitle;
    }

    public function setSectionTitle($sectionTitle) {
        $this->sectionTitle = $sectionTitle;
    }

    public function getSectionSubheader() {
        return $this->sectionSubheader;
    }

    public function setSectionSubheader($sectionSubheader) {
        $this->sectionSubheader = $sectionSubheader;
    }

    public function getImg() {
        return $this->img;
    }

    public function setImg($img) {
        $this->img = $img;
    }
}
