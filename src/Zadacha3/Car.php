<?php
namespace Zadacha3;

class Car extends Vehicle implements Fuelable {
    public function move(): void {
        echo "Машина едет\n";
    }

    public function refuel(): void {
        echo "Машина заправлена\n";
    }

    public function __construct(){}
}
