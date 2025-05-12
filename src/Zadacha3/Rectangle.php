<?php
namespace Zadacha3;


class Rectangle extends Shape implements Drawable {
    private $width;
    private $height;

    public function __construct(float $width, float $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea(): float {
        return $this->width * $this->height;
    }

    public function draw(): void {
        echo "Рисую прямоугольник шириной {$this->width} и высотой {$this->height}\n";
    }
}