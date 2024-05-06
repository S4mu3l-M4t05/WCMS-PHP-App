<?php
class Team {
    private $id;
    private $sectionTitle;
    private $sectionSubheader;
    private $members;

    public function __construct($data) {
        $this->id = $data['id'] ?? null;
        $this->sectionTitle = $data['sectionTitle'] ?? null;
        $this->sectionSubheader = $data['sectionSubheader'] ?? null;
        $this->members = $data['members'] ?? [];
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

    public function getMembers() {
        return $this->members;
    }

    public function setMembers($members) {
        $this->members = $members;
    }
}

class TeamMember {
    private $id;
    private $name;
    private $title;
    private $bio;
    private $picture;

    public function __construct($data) {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->title = $data['title'] ?? null;
        $this->bio = $data['bio'] ?? null;
        $this->picture = $data['picture'] ?? null;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getBio() {
        return $this->bio;
    }

    public function setBio($bio) {
        $this->bio = $bio;
    }

    public function getPicture() {
        return $this->picture;
    }

    public function setPicture($picture) {
        $this->picture = $picture;
    }
}
