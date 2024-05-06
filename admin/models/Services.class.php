<?php
class Services {
    private $sectionTitle;
    private $sectionSubheader;
    private $cardTitles;
    private $cardTexts;

    public function __construct($data) {
        $this->sectionTitle = $data['sectionTitle'] ?? null;
        $this->sectionSubheader = $data['sectionSubheader'] ?? null;
        $this->cardTitles = $data['cardTitles'] ?? array_fill(1, 6, null);
        $this->cardTexts = $data['cardTexts'] ?? array_fill(1, 6, null);
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

    public function getCardTitle($number) {
        return $this->cardTitles[$number] ?? null;
    }

    public function setCardTitle($number, $cardTitle) {
        $this->cardTitles[$number] = $cardTitle;
    }

    public function getCardText($number) {
        return $this->cardTexts[$number] ?? null;
    }

    public function setCardText($number, $cardText) {
        $this->cardTexts[$number] = $cardText;
    }

    public function getCardTitles() {
        return $this->cardTitles;
    }

    public function setCardTitles($cardTitles) {
        $this->cardTitles = $cardTitles;
    }

    public function getCardTexts() {
        return $this->cardTexts;
    }

    public function setCardTexts($cardTexts) {
        $this->cardTexts = $cardTexts;
    }
}
