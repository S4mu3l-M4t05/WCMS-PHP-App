<?php
class ContactCard {
    private $id;
    private $icon;
    private $title;
    private $text;
    private $size;

    public function __construct($icon, $title, $text, $size, $id) {
        $this->id = $id ?? null;
        $this->icon = $icon ?? null;
        $this->title = $title ?? null;
        $this->text = $text ?? null;
        $this->size = $size ?? '3';
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIcon() {
        return $this->icon;
    }

    public function setIcon($icon) {
        $this->icon = $icon;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getText() {
        return $this->text;
    }

    public function setText($text) {
        $this->text = $text;
    }

    public function getSize() {
        return $this->size;
    }

    public function setSize($size) {
        $this->size = $size;
    }
}

