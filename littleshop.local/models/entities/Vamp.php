<?php

class Vamp {
    private $vamp_data = [];

    public function __construct($id, $name, $type, $rarity, $hp, $defense, $stage, $imageURL) {
        $this->vamp_data = [
            'id' => $id,
            'name' => $name,
            'type' => $type,
            'rarity' => $rarity,
            'hp' => $hp,
            'defense' => $defense,
            'stage' => $stage,
            'image_url' => $imageURL
        ];
    }

    public function getData() {
        return $this->vamp_data;
    }

    public function __get($name) {
        return $this->vamp_data[$name] ?? null;
    }

    public function __set($name, $value) {
        $this->vamp_data[$name] = $value;
    }
}

?>
