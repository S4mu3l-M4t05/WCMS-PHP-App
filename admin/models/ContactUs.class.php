<?php
class ContactUs {
    private $id;
    private $header;
    private $subheader;
    private $map;

    public function __construct($data) {
        $this->id = $data['id'] ?? null;
        $this->header = $data['header'] ?? null;
        $this->subheader = $data['subheader'] ?? null;
        $this->map = $data['map'] ?? null;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getHeader() {
        return $this->header;
    }

    public function setHeader($header) {
        $this->header = $header;
    }

    public function getSubheader() {
        return $this->subheader;
    }

    public function setSubheader($subheader) {
        $this->subheader = $subheader;
    }

    public function getMap() {
        return $this->map;
    }

    public function setMap($map) {
        $this->map = $map;
    }
}
