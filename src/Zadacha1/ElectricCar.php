<?php

namespace Zadacha1;

class ElectricCar extends Car {
    private $batteryCapacity;

    public function __construct(string $brand, string $model, int $year, int $batteryCapacity) {
        parent::__construct($brand, $model, $year);
        $this->batteryCapacity = $batteryCapacity;
    }

    public function getBatteryInfo(): string {
        return "Батарея: {$this->batteryCapacity} kWh";
    }
}