<?php
namespace Zadacha1;

class Car {
    use Loggable;

    private $brand;
    private $model;
    private $year;

    public function __construct(string $brand, string $model, int $year) {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    public function getCarInfo(): string {
        return "{$this->brand} {$this->model}, {$this->year}";
    }


    public function getYear(): int {
        return $this->year;
    }

    public function setYear(int $year): void {
        $this->year = $year;
    }

    
    public function move(): string {
        return "Машина едет";
    }
}