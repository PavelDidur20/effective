<?php
namespace Zadacha3;
class Circle extends Shape implements Drawable {
    private $radius;

    public function __construct(float $radius) {
        $this->radius = $radius;
    }

    public function getArea(): float {
        return M_PI * pow($this->radius, 2);
    }

    public function draw(): void {
        echo "Рисую круг радиусом {$this->radius}\n";
    }
}
