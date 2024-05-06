<?php
class About {
    private $sectionTitle;
    private $sectionSubheader;
    private $articleHeader;
    private $articleSubheader;
    private $paragraph;
    private $listItem1Title;
    private $listItem1Text;
    private $listItem2Title;
    private $listItem2Text;

    public function __construct($data) {
        $this->sectionTitle = $data['sectionTitle'] ?? null;
        $this->sectionSubheader = $data['sectionSubheader'] ?? null;
        $this->articleHeader = $data['articleHeader'] ?? null;
        $this->articleSubheader = $data['articleSubheader'] ?? null;
        $this->paragraph = $data['paragraph'] ?? null;
        $this->listItem1Title = $data['listItem1Title'] ?? null;
        $this->listItem1Text = $data['listItem1Text'] ?? null;
        $this->listItem2Title = $data['listItem2Title'] ?? null;
        $this->listItem2Text = $data['listItem2Text'] ?? null;
    }

    // Getter methods for all properties

    public function getSectionTitle() {
        return $this->sectionTitle;
    }

    public function getSectionSubheader() {
        return $this->sectionSubheader;
    }

    public function getArticleHeader() {
        return $this->articleHeader;
    }

    public function getArticleSubheader() {
        return $this->articleSubheader;
    }

    public function getParagraph() {
        return $this->paragraph;
    }

    public function getListItem1Title() {
        return $this->listItem1Title;
    }

    public function getListItem1Text() {
        return $this->listItem1Text;
    }

    public function getListItem2Title() {
        return $this->listItem2Title;
    }

    public function getListItem2Text() {
        return $this->listItem2Text;
    }

    // Setter methods for all properties
    public function setSectionTitle($sectionTitle) {
        $this->sectionTitle = $sectionTitle;
    }

    public function setSectionSubheader($sectionSubheader) {
        $this->sectionSubheader = $sectionSubheader;
    }

    public function setArticleHeader($articleHeader) {
        $this->articleHeader = $articleHeader;
    }

    public function setArticleSubheader($articleSubheader) {
        $this->articleSubheader = $articleSubheader;
    }

    public function setParagraph($paragraph) {
        $this->paragraph = $paragraph;
    }

    public function setListItem1Title($listItem1Title) {
        $this->listItem1Title = $listItem1Title;
    }

    public function setListItem1Text($listItem1Text) {
        $this->listItem1Text = $listItem1Text;
    }

    public function setListItem2Title($listItem2Title) {
        $this->listItem2Title = $listItem2Title;
    }

    public function setListItem2Text($listItem2Text) {
        $this->listItem2Text = $listItem2Text;
    }
}


